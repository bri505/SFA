<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Mail\InvoiceMail;
use App\Models\Company;
use App\Models\Invoice;
use App\Models\Record;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Broker;
use App\Models\Consignee;
use Illuminate\Support\Facades\Response;

class InvoiceController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | LISTADO DE FACTURAS
    |--------------------------------------------------------------------------
    */

    public function index(Request $request)
    {
        $paymentStatus = $request->get('payment_status');

        $invoicesQuery = Invoice::with([
            'company',
            'generatedBy',
        ])
        ->latest();

        /*
        |--------------------------------------------------------------------------
        | FILTRO POR ESTADO DE PAGO
        |--------------------------------------------------------------------------
        */

        if ($paymentStatus === 'pending') {

            $invoicesQuery->where(function ($query) {

                $query->where(
                    'payment_status',
                    'pending'
                )
                ->orWhereNull(
                    'payment_status'
                );

            });

        } elseif (
            in_array(
                $paymentStatus,
                [
                    'in_process',
                    'paid',
                    'cancelled',
                ],
                true
            )
        ) {

            $invoicesQuery->where(
                'payment_status',
                $paymentStatus
            );
        }

        $invoices = $invoicesQuery->get();

        /*
        |--------------------------------------------------------------------------
        | RESUMEN DE ESTADOS
        |--------------------------------------------------------------------------
        */

        $pendingCount = Invoice::where(function ($query) {

            $query->where(
                'payment_status',
                'pending'
            )
            ->orWhereNull(
                'payment_status'
            );

        })->count();

        $inProcessCount = Invoice::where(
            'payment_status',
            'in_process'
        )->count();

        $paidCount = Invoice::where(
            'payment_status',
            'paid'
        )->count();

        $cancelledCount = Invoice::where(
            'payment_status',
            'cancelled'
        )->count();

        /*
        |--------------------------------------------------------------------------
        | RESUMEN FINANCIERO
        |--------------------------------------------------------------------------
        */

        $pendingAmount = Invoice::where(function ($query) {

            $query->whereIn(
                'payment_status',
                [
                    'pending',
                    'in_process',
                ]
            )
            ->orWhereNull(
                'payment_status'
            );

        })->sum('total');

        $paidAmount = Invoice::where(
            'payment_status',
            'paid'
        )->sum('total');

        $totalAmount = Invoice::sum('total');

        return view(
            'invoices.index',
            compact(
                'invoices',
                'paymentStatus',
                'pendingCount',
                'inProcessCount',
                'paidCount',
                'cancelledCount',
                'pendingAmount',
                'paidAmount',
                'totalAmount'
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | FORMULARIO PARA GENERAR FACTURA
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        $companies = Company::where(
            'active',
            true
        )
        ->orderBy('name')
        ->get();

        $brokers = Broker::where(
            'active',
            true
        )
        ->orderBy('name')
        ->get();

        $consignees = Consignee::where(
            'active',
            true
        )
        ->orderBy('name')
        ->get();

        return view(
            'invoices.create',
            compact(
                'companies',
                'brokers',
                'consignees'
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | BUSCAR REGISTROS PARA FACTURAR
    |--------------------------------------------------------------------------
    */

    public function records(Request $request)
    {
        $validated = $request->validate([

            'company_id' => [
                'required',
                'exists:companies,id',
            ],

            'period_start' => [
                'required',
                'date',
            ],

            'period_end' => [
                'required',
                'date',
                'after_or_equal:period_start',
            ],

        ]);

        $records = Record::with([

            'company',

            'services.serviceType',

            'invoices',

        ])
        ->where(
            'company_id',
            $validated['company_id']
        )
        ->whereBetween(
            'date',
            [
                $validated['period_start'],
                $validated['period_end'],
            ]
        )
        ->orderBy('date')
        ->get();

        return response()->json([

            'records' => $records,

        ]);
    }


    /*
    |--------------------------------------------------------------------------
    | GENERAR FACTURA
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $validated = $request->validate([

            /*
             * EMPRESA ENCARGADA
             */

            'company_id' => [
                'required',
                'exists:companies,id'
            ],

            /*
             * EMPRESAS DE LOS REGISTROS
             */

            'record_companies' => [
                'required',
                'array',
                'min:1'
            ],

            'record_companies.*' => [
                'required',
                'integer',
                'exists:companies,id'
            ],

            /*
             * PERIODO
             */

            'period_start' => [
                'required',
                'date'
            ],

            'period_end' => [
                'required',
                'date',
                'after_or_equal:period_start'
            ],

            /*
             * OPCIONES
             */

            'tax_rate' => [
                'nullable',
                'numeric',
                'min:0',
                'max:100'
            ],

            'shipping_handling_rate' => [
                'nullable',
                'numeric',
                'min:0',
                'max:100'
            ],

            'comments' => [
                'nullable',
                'string',
                'max:5000'
            ],

            /*
             * REGISTROS
             */

            'records' => [
                'required',
                'array',
                'min:1'
            ],

            'records.*.id' => [
                'required',
                'integer',
                'exists:records,id'
            ],

            'records.*.billing_invoice' => [
                'nullable',
                'string',
                'max:255'
            ],

            'records.*.billing_paps' => [
                'nullable',
                'string',
                'max:255'
            ],

            'records.*.pallets' => [
                'nullable',
                'numeric',
                'min:0'
            ],

            'records.*.additional_charge_type' => [
                'nullable',
                'string',
                'max:255'
            ],

            'records.*.additional_charge_quantity' => [
                'nullable',
                'numeric',
                'min:0'
            ],

            'records.*.additional_charge_unit_price' => [
                'nullable',
                'numeric',
                'min:0'
            ],

            /*
             * BROKER / CONSIGNATARIO
             */

            'broker_id' => [
                'nullable',
                'exists:brokers,id'
            ],

            'consignee_id' => [
                'nullable',
                'exists:consignees,id'
            ],
        ]);


        $invoice = DB::transaction(function () use ($validated) {

            /*
             |--------------------------------------------------------------------------
             | EMPRESAS DE LOS REGISTROS
             |--------------------------------------------------------------------------
             */

            $recordCompanyIds = collect(
                $validated['record_companies']
            )
            ->map(fn ($id) => (int) $id)
            ->unique()
            ->values();


            /*
             |--------------------------------------------------------------------------
             | IDS DE LOS REGISTROS
             |--------------------------------------------------------------------------
             */

            $recordIds = collect(
                $validated['records']
            )
            ->pluck('id')
            ->map(fn ($id) => (int) $id)
            ->unique()
            ->values();


            /*
             |--------------------------------------------------------------------------
             | BUSCAR REGISTROS
             |--------------------------------------------------------------------------
             */

            $records = Record::with('services')
                ->whereIn('id', $recordIds)
                ->whereIn('company_id', $recordCompanyIds)
                ->whereDoesntHave('invoices')
                ->get();


            /*
             |--------------------------------------------------------------------------
             | VALIDAR REGISTROS
             |--------------------------------------------------------------------------
             */

            if ($records->count() !== $recordIds->count()) {

                abort(
                    422,
                    'Uno o más registros ya fueron facturados, no existen o no pertenecen a las empresas seleccionadas.'
                );
            }


            /*
             |--------------------------------------------------------------------------
             | SUBTOTAL DE SERVICIOS
             |--------------------------------------------------------------------------
             */

            $subtotal = 0;

            foreach ($records as $record) {

                foreach ($record->services as $service) {

                    $subtotal += (float) $service->subtotal;
                }
            }


            /*
             |--------------------------------------------------------------------------
             | CARGOS ADICIONALES
             |--------------------------------------------------------------------------
             */

            $additionalTotal = 0;

            foreach ($validated['records'] as $billingRecord) {

                $quantity = (float) (
                    $billingRecord['additional_charge_quantity'] ?? 0
                );

                $unitPrice = (float) (
                    $billingRecord['additional_charge_unit_price'] ?? 0
                );

                $additionalAmount = round(
                    $quantity * $unitPrice,
                    2
                );

                $additionalTotal += $additionalAmount;
            }


            /*
             |--------------------------------------------------------------------------
             | SUBTOTAL FINAL
             |--------------------------------------------------------------------------
             */

            $subtotal = round(
                $subtotal + $additionalTotal,
                2
            );


            /*
             |--------------------------------------------------------------------------
             | IVA
             |--------------------------------------------------------------------------
             */

            $taxRate = (float) (
                $validated['tax_rate'] ?? 0
            );

            $taxEnabled = $taxRate > 0;


            /*
             |--------------------------------------------------------------------------
             | SHIPPING / HANDLING
             |--------------------------------------------------------------------------
             */

            $shippingRate = (float) (
                $validated['shipping_handling_rate'] ?? 0
            );

            $shippingEnabled = $shippingRate > 0;

            $shippingAmount = 0;

            if ($shippingEnabled) {

                $shippingAmount = round(
                    $subtotal * ($shippingRate / 100),
                    2
                );
            }


            /*
             |--------------------------------------------------------------------------
             | IMPUESTO
             |--------------------------------------------------------------------------
             */

            $tax = 0;

            if ($taxEnabled) {

                $taxBase =
                    $subtotal +
                    $shippingAmount;

                $tax = round(
                    $taxBase * ($taxRate / 100),
                    2
                );
            }


            /*
             |--------------------------------------------------------------------------
             | TOTAL
             |--------------------------------------------------------------------------
             */

            $total = round(
                $subtotal +
                $shippingAmount +
                $tax,
                2
            );


            /*
             |--------------------------------------------------------------------------
             | NÚMERO DE FACTURA
             |--------------------------------------------------------------------------
             */

            $lastInvoice = Invoice::latest('id')->first();

            $nextNumber = $lastInvoice
                ? $lastInvoice->id + 1
                : 1;

            $invoiceNumber =
                'SFA-' .
                now()->format('Y') .
                '-' .
                str_pad(
                    $nextNumber,
                    4,
                    '0',
                    STR_PAD_LEFT
                );


            /*
             |--------------------------------------------------------------------------
             | CREAR FACTURA
             |--------------------------------------------------------------------------
             */

            $invoice = Invoice::create([

                'company_id' =>
                    $validated['company_id'],

                'broker_id' =>
                    $validated['broker_id'] ?? null,

                'consignee_id' =>
                    $validated['consignee_id'] ?? null,

                'invoice_number' =>
                    $invoiceNumber,

                'period_start' =>
                    $validated['period_start'],

                'period_end' =>
                    $validated['period_end'],

                'subtotal' =>
                    $subtotal,

                'tax_enabled' =>
                    $taxEnabled,

                'tax_rate' =>
                    $taxRate,

                'tax' =>
                    $tax,

                'shipping_handling_enabled' =>
                    $shippingEnabled,

                'shipping_handling_rate' =>
                    $shippingRate,

                'shipping_handling_amount' =>
                    $shippingAmount,

                'total' =>
                    $total,

                'comments' =>
                    $validated['comments'] ?? null,

                'status' =>
                    'generated',

                'payment_status' =>
                    'pending',

                'generated_by' =>
                    auth()->id(),

                'generated_at' =>
                    now(),

            ]);


            /*
             |--------------------------------------------------------------------------
             | RELACIONAR REGISTROS
             |--------------------------------------------------------------------------
             */

            foreach ($records as $record) {

                $billingData = collect(
                    $validated['records']
                )->firstWhere(
                    'id',
                    $record->id
                );

                $quantity = (float) (
                    $billingData['additional_charge_quantity']
                    ?? 0
                );

                $unitPrice = (float) (
                    $billingData['additional_charge_unit_price']
                    ?? 0
                );

                $additionalAmount = round(
                    $quantity * $unitPrice,
                    2
                );

                $invoice->records()->attach(
                    $record->id,
                    [

                        'billing_invoice' =>
                            $billingData['billing_invoice']
                            ?? null,

                        'billing_paps' =>
                            $billingData['billing_paps']
                            ?? null,

                        'pallets' =>
                            $billingData['pallets']
                            ?? null,

                        'additional_charge_type' =>
                            $billingData['additional_charge_type']
                            ?? null,

                        'additional_charge_quantity' =>
                            $quantity,

                        'additional_charge_unit_price' =>
                            $unitPrice,

                        'additional_charge_amount' =>
                            $additionalAmount,

                    ]
                );
            }


            return $invoice;
        });


        /*
         |--------------------------------------------------------------------------
         | REDIRECCIÓN
         |--------------------------------------------------------------------------
         */

        return redirect()
            ->route(
                'invoices.show',
                $invoice
            )
            ->with(
                'success',
                'Factura generada correctamente.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | CREAR BROKER
    |--------------------------------------------------------------------------
    */

    public function storeBroker(Request $request)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255'
            ],
        ]);

        $broker = Broker::create([
            'name' =>
                trim($validated['name']),

            'active' =>
                true,
        ]);

        return response()->json([
            'success' => true,

            'broker' => [
                'id' =>
                    $broker->id,

                'name' =>
                    $broker->name,
            ],
        ]);
    }


    /*
    |--------------------------------------------------------------------------
    | CREAR CONSIGNEE
    |--------------------------------------------------------------------------
    */

    public function storeConsignee(Request $request)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255'
            ],
        ]);

        $consignee = Consignee::create([
            'name' =>
                trim($validated['name']),

            'active' =>
                true,
        ]);

        return response()->json([
            'success' => true,

            'consignee' => [
                'id' =>
                    $consignee->id,

                'name' =>
                    $consignee->name,
            ],
        ]);
    }


    /*
    |--------------------------------------------------------------------------
    | CREAR COMPANY
    |--------------------------------------------------------------------------
    */

    public function storeCompany(Request $request)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255'
            ],

            'code' => [
                'nullable',
                'string',
                'max:50',
                'unique:companies,code'
            ],

            'tax_id' => [
                'nullable',
                'string',
                'max:50'
            ],
        ]);

        $company = Company::create([
            'name' =>
                trim($validated['name']),

            'code' =>
                $validated['code'] ?? null,

            'tax_id' =>
                $validated['tax_id'] ?? null,

            'active' =>
                true,
        ]);

        return response()->json([
            'success' => true,

            'company' => [
                'id' =>
                    $company->id,

                'name' =>
                    $company->name,

                'code' =>
                    $company->code,

                'tax_id' =>
                    $company->tax_id,
            ],
        ]);
    }


    /*
    |--------------------------------------------------------------------------
    | MOSTRAR FACTURA
    |--------------------------------------------------------------------------
    */

    public function show(Invoice $invoice)
{
    $invoice->load([
        'company.emails',
        'broker',
        'consignee',
        'generatedBy',
        'records.company',
        'records.services.serviceType',
    ]);

    return view(
        'invoices.show',
        compact('invoice')
    );
}

    /*
    |--------------------------------------------------------------------------
    | CAMBIAR ESTADO DE PAGO
    |--------------------------------------------------------------------------
    */

    public function updatePaymentStatus(
        Request $request,
        Invoice $invoice
    ) {

        $validated = $request->validate([

            'payment_status' => [
                'required',
                'in:pending,in_process,paid,cancelled',
            ],

        ]);

        $invoice->update([

            'payment_status' =>
                $validated['payment_status'],

        ]);

        return redirect()
            ->route(
                'invoices.show',
                $invoice
            )
            ->with(
                'success',
                'Estado de pago actualizado correctamente.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | PDF
    |--------------------------------------------------------------------------
    */

    public function pdf(Invoice $invoice)
{
    $pdfContent = $this->generatePdfContent($invoice);

    return response($pdfContent, 200, [
        'Content-Type' => 'application/pdf',
        'Content-Disposition' =>
            'attachment; filename="' .
            $invoice->invoice_number .
            '.pdf"',
    ]);
}


private function generatePdfContent(Invoice $invoice): string
{
    $invoice->load([
        'company',
        'generatedBy',
        'records.company',
        'records.services.serviceType',
    ]);

    $pdf = Pdf::loadView(
        'invoices.pdf',
        compact('invoice')
    );

    $pdf->setPaper(
        'letter',
        'portrait'
    );

    return $pdf->output();
}


    /*
    |--------------------------------------------------------------------------
    | XML
    |--------------------------------------------------------------------------
    |
    | GENERA UN XML GENÉRICO DE LA FACTURA
    |
    | Este XML contiene:
    |
    | - Información de la factura
    | - Empresa / Bill To
    | - Broker
    | - Consignee
    | - Periodo
    | - Registros
    | - Invoice/PAPS de cada registro
    | - Servicios
    | - Cargos adicionales
    | - Subtotal
    | - Shipping / Handling
    | - Tax
    | - Total
    |
    |--------------------------------------------------------------------------
    */
    public function xml(Invoice $invoice)
{
    $xmlContent = $this->generateXmlContent($invoice);

    return Response::make(
        $xmlContent,
        200,
        [
            'Content-Type' =>
                'application/xml; charset=UTF-8',

            'Content-Disposition' =>
                'attachment; filename="' .
                $invoice->invoice_number .
                '.xml"',
        ]
    );
}

    private function generateXmlContent(Invoice $invoice): string
{
        $invoice->load([
            'company',
            'broker',
            'consignee',
            'generatedBy',
            'records.company',
            'records.services.serviceType',
        ]);


        /*
        |--------------------------------------------------------------------------
        | CREAR DOCUMENTO XML
        |--------------------------------------------------------------------------
        */

        $xml = new \DOMDocument(
            '1.0',
            'UTF-8'
        );

        $xml->formatOutput = true;


        /*
        |--------------------------------------------------------------------------
        | ELEMENTO PRINCIPAL
        |--------------------------------------------------------------------------
        */

        $root = $xml->createElement(
            'Invoice'
        );

        $root->setAttribute(
            'version',
            '1.0'
        );

        $root->setAttribute(
            'source',
            'SFA'
        );

        $xml->appendChild(
            $root
        );


        /*
        |--------------------------------------------------------------------------
        | INFORMACIÓN GENERAL
        |--------------------------------------------------------------------------
        */

        $information = $xml->createElement(
            'InvoiceInformation'
        );

        $root->appendChild(
            $information
        );


        $this->appendXmlElement(
            $xml,
            $information,
            'InvoiceNumber',
            $invoice->invoice_number
        );

        $this->appendXmlElement(
            $xml,
            $information,
            'InvoiceDate',
            optional($invoice->generated_at)
                ?->format('Y-m-d')
        );

        $this->appendXmlElement(
            $xml,
            $information,
            'GeneratedAt',
            optional($invoice->generated_at)
                ?->format('Y-m-d\TH:i:s')
        );

        $this->appendXmlElement(
            $xml,
            $information,
            'Status',
            $invoice->status
        );

        $this->appendXmlElement(
            $xml,
            $information,
            'PaymentStatus',
            $invoice->payment_status
        );


        /*
        |--------------------------------------------------------------------------
        | BILL TO
        |--------------------------------------------------------------------------
        */

        $billTo = $xml->createElement(
            'BillTo'
        );

        $root->appendChild(
            $billTo
        );


        $company = $invoice->company;

        $this->appendXmlElement(
            $xml,
            $billTo,
            'CompanyId',
            $company?->id
        );

        $this->appendXmlElement(
            $xml,
            $billTo,
            'Name',
            $company?->name
        );

        $this->appendXmlElement(
            $xml,
            $billTo,
            'Code',
            $company?->code
        );

        $this->appendXmlElement(
            $xml,
            $billTo,
            'TaxId',
            $company?->tax_id
        );

        $this->appendXmlElement(
            $xml,
            $billTo,
            'Address',
            $company?->address
        );

        $this->appendXmlElement(
            $xml,
            $billTo,
            'City',
            $company?->city
        );

        $this->appendXmlElement(
            $xml,
            $billTo,
            'State',
            $company?->state
        );

        $this->appendXmlElement(
            $xml,
            $billTo,
            'PostalCode',
            $company?->postal_code
        );

        $this->appendXmlElement(
            $xml,
            $billTo,
            'Colony',
            $company?->colony
        );

        $this->appendXmlElement(
            $xml,
            $billTo,
            'Phone',
            $company?->phone
        );

        $this->appendXmlElement(
            $xml,
            $billTo,
            'Email',
            $company?->email
        );

        $this->appendXmlElement(
            $xml,
            $billTo,
            'Contact',
            $company?->contact
        );


        /*
        |--------------------------------------------------------------------------
        | BROKER
        |--------------------------------------------------------------------------
        */

        if ($invoice->broker) {

            $broker = $xml->createElement(
                'Broker'
            );

            $root->appendChild(
                $broker
            );

            $this->appendXmlElement(
                $xml,
                $broker,
                'Id',
                $invoice->broker->id
            );

            $this->appendXmlElement(
                $xml,
                $broker,
                'Name',
                $invoice->broker->name
            );
        }


        /*
        |--------------------------------------------------------------------------
        | CONSIGNEE
        |--------------------------------------------------------------------------
        */

        if ($invoice->consignee) {

            $consignee = $xml->createElement(
                'Consignee'
            );

            $root->appendChild(
                $consignee
            );

            $this->appendXmlElement(
                $xml,
                $consignee,
                'Id',
                $invoice->consignee->id
            );

            $this->appendXmlElement(
                $xml,
                $consignee,
                'Name',
                $invoice->consignee->name
            );
        }


        /*
        |--------------------------------------------------------------------------
        | PERIODO DE FACTURACIÓN
        |--------------------------------------------------------------------------
        */

        $billingPeriod = $xml->createElement(
            'BillingPeriod'
        );

        $root->appendChild(
            $billingPeriod
        );

        $this->appendXmlElement(
            $xml,
            $billingPeriod,
            'Start',
            optional($invoice->period_start)
                ?->format('Y-m-d')
        );

        $this->appendXmlElement(
            $xml,
            $billingPeriod,
            'End',
            optional($invoice->period_end)
                ?->format('Y-m-d')
        );


        /*
        |--------------------------------------------------------------------------
        | REGISTROS
        |--------------------------------------------------------------------------
        */

        $recordsElement = $xml->createElement(
            'Records'
        );

        $root->appendChild(
            $recordsElement
        );


        foreach ($invoice->records as $record) {

            $recordElement = $xml->createElement(
                'Record'
            );

            $recordsElement->appendChild(
                $recordElement
            );


            /*
            |--------------------------------------------------------------------------
            | DATOS DEL REGISTRO
            |--------------------------------------------------------------------------
            */

            $this->appendXmlElement(
                $xml,
                $recordElement,
                'Id',
                $record->id
            );

            $this->appendXmlElement(
                $xml,
                $recordElement,
                'Date',
                optional($record->date)
                    ?->format('Y-m-d')
            );


            /*
            |--------------------------------------------------------------------------
            | COMPANY DEL REGISTRO
            |--------------------------------------------------------------------------
            */

            $recordCompany = $record->company;

            if ($recordCompany) {

                $recordCompanyElement =
                    $xml->createElement(
                        'Company'
                    );

                $recordElement->appendChild(
                    $recordCompanyElement
                );

                $this->appendXmlElement(
                    $xml,
                    $recordCompanyElement,
                    'Id',
                    $recordCompany->id
                );

                $this->appendXmlElement(
                    $xml,
                    $recordCompanyElement,
                    'Name',
                    $recordCompany->name
                );

                $this->appendXmlElement(
                    $xml,
                    $recordCompanyElement,
                    'Code',
                    $recordCompany->code
                );
            }


            /*
            |--------------------------------------------------------------------------
            | DATOS DE BILLING
            |--------------------------------------------------------------------------
            */

            $billing = $xml->createElement(
                'BillingInformation'
            );

            $recordElement->appendChild(
                $billing
            );

            $this->appendXmlElement(
                $xml,
                $billing,
                'InvoiceNumber',
                $record->pivot->billing_invoice
                    ?? $record->invoice_number
            );

            $this->appendXmlElement(
                $xml,
                $billing,
                'PAPS',
                $record->pivot->billing_paps
                    ?? $record->paps_number
            );

            $this->appendXmlElement(
                $xml,
                $billing,
                'Pallets',
                $record->pivot->pallets
            );


            /*
            |--------------------------------------------------------------------------
            | SERVICIOS
            |--------------------------------------------------------------------------
            */

            $servicesElement = $xml->createElement(
                'Services'
            );

            $recordElement->appendChild(
                $servicesElement
            );


            $servicesTotal = 0;

            foreach ($record->services as $service) {

                $serviceElement = $xml->createElement(
                    'Service'
                );

                $servicesElement->appendChild(
                    $serviceElement
                );


                $serviceName =
                    $service->serviceType?->name
                    ?? 'Service';


                $serviceAmount =
                    (float) $service->subtotal;


                $servicesTotal +=
                    $serviceAmount;


                $this->appendXmlElement(
                    $xml,
                    $serviceElement,
                    'Id',
                    $service->id
                );

                $this->appendXmlElement(
                    $xml,
                    $serviceElement,
                    'Name',
                    $serviceName
                );

                $this->appendXmlElement(
                    $xml,
                    $serviceElement,
                    'Amount',
                    number_format(
                        $serviceAmount,
                        2,
                        '.',
                        ''
                    )
                );
            }


            /*
            |--------------------------------------------------------------------------
            | CARGO ADICIONAL
            |--------------------------------------------------------------------------
            */

            $additionalQuantity =
                (float) (
                    $record->pivot
                        ->additional_charge_quantity
                    ?? 0
                );


            $additionalUnitPrice =
                (float) (
                    $record->pivot
                        ->additional_charge_unit_price
                    ?? 0
                );


            $additionalAmount =
                (float) (
                    $record->pivot
                        ->additional_charge_amount
                    ??
                    (
                        $additionalQuantity *
                        $additionalUnitPrice
                    )
                );


            if ($additionalAmount > 0) {

                $additionalElement =
                    $xml->createElement(
                        'AdditionalCharge'
                    );

                $recordElement->appendChild(
                    $additionalElement
                );


                $this->appendXmlElement(
                    $xml,
                    $additionalElement,
                    'Type',
                    $record->pivot
                        ->additional_charge_type
                );

                $this->appendXmlElement(
                    $xml,
                    $additionalElement,
                    'Quantity',
                    number_format(
                        $additionalQuantity,
                        2,
                        '.',
                        ''
                    )
                );

                $this->appendXmlElement(
                    $xml,
                    $additionalElement,
                    'UnitPrice',
                    number_format(
                        $additionalUnitPrice,
                        2,
                        '.',
                        ''
                    )
                );

                $this->appendXmlElement(
                    $xml,
                    $additionalElement,
                    'Amount',
                    number_format(
                        $additionalAmount,
                        2,
                        '.',
                        ''
                    )
                );
            }


            /*
            |--------------------------------------------------------------------------
            | TOTAL DEL REGISTRO
            |--------------------------------------------------------------------------
            */

            $recordTotal =
                $servicesTotal +
                $additionalAmount;


            $this->appendXmlElement(
                $xml,
                $recordElement,
                'Total',
                number_format(
                    $recordTotal,
                    2,
                    '.',
                    ''
                )
            );
        }


        /*
        |--------------------------------------------------------------------------
        | TOTALES
        |--------------------------------------------------------------------------
        */

        $totals = $xml->createElement(
            'Totals'
        );

        $root->appendChild(
            $totals
        );


        $this->appendXmlElement(
            $xml,
            $totals,
            'Subtotal',
            number_format(
                (float) $invoice->subtotal,
                2,
                '.',
                ''
            )
        );


        /*
        |--------------------------------------------------------------------------
        | SHIPPING / HANDLING
        |--------------------------------------------------------------------------
        */

        $shippingHandling =
            $xml->createElement(
                'ShippingHandling'
            );

        $totals->appendChild(
            $shippingHandling
        );


        $this->appendXmlElement(
            $xml,
            $shippingHandling,
            'Enabled',
            $invoice->shipping_handling_enabled
                ? 'true'
                : 'false'
        );

        $this->appendXmlElement(
            $xml,
            $shippingHandling,
            'Rate',
            number_format(
                (float) (
                    $invoice->shipping_handling_rate
                    ?? 0
                ),
                2,
                '.',
                ''
            )
        );

        $this->appendXmlElement(
            $xml,
            $shippingHandling,
            'Amount',
            number_format(
                (float) (
                    $invoice->shipping_handling_amount
                    ?? 0
                ),
                2,
                '.',
                ''
            )
        );


        /*
        |--------------------------------------------------------------------------
        | TAX
        |--------------------------------------------------------------------------
        */

        $tax = $xml->createElement(
            'Tax'
        );

        $totals->appendChild(
            $tax
        );


        $this->appendXmlElement(
            $xml,
            $tax,
            'Enabled',
            $invoice->tax_enabled
                ? 'true'
                : 'false'
        );

        $this->appendXmlElement(
            $xml,
            $tax,
            'Rate',
            number_format(
                (float) (
                    $invoice->tax_rate
                    ?? 0
                ),
                2,
                '.',
                ''
            )
        );

        $this->appendXmlElement(
            $xml,
            $tax,
            'Amount',
            number_format(
                (float) (
                    $invoice->tax
                    ?? 0
                ),
                2,
                '.',
                ''
            )
        );


        /*
        |--------------------------------------------------------------------------
        | TOTAL FINAL
        |--------------------------------------------------------------------------
        */

        $this->appendXmlElement(
            $xml,
            $totals,
            'Total',
            number_format(
                (float) $invoice->total,
                2,
                '.',
                ''
            )
        );


        /*
        |--------------------------------------------------------------------------
        | COMENTARIOS
        |--------------------------------------------------------------------------
        */

        if (!empty($invoice->comments)) {

            $this->appendXmlElement(
                $xml,
                $root,
                'Comments',
                $invoice->comments
            );
        }


        /*
        |--------------------------------------------------------------------------
        | INFORMACIÓN DE GENERACIÓN
        |--------------------------------------------------------------------------
        */

        if ($invoice->generatedBy) {

            $generatedBy =
                $xml->createElement(
                    'GeneratedBy'
                );

            $root->appendChild(
                $generatedBy
            );

            $this->appendXmlElement(
                $xml,
                $generatedBy,
                'Id',
                $invoice->generatedBy->id
            );

            $this->appendXmlElement(
                $xml,
                $generatedBy,
                'Name',
                $invoice->generatedBy->name
            );

            $this->appendXmlElement(
                $xml,
                $generatedBy,
                'Email',
                $invoice->generatedBy->email
            );
        }


        /*
        |--------------------------------------------------------------------------
        | DESCARGAR XML
        |--------------------------------------------------------------------------
        */

        return $xml->saveXML();
    }


    /*
    |--------------------------------------------------------------------------
    | MÉTODO AUXILIAR PARA XML
    |--------------------------------------------------------------------------
    */

    private function appendXmlElement(
        \DOMDocument $xml,
        \DOMElement $parent,
        string $name,
        mixed $value
    ): void {

        if ($value === null) {
            return;
        }

        $element = $xml->createElement(
            $name
        );

        $element->appendChild(
            $xml->createTextNode(
                (string) $value
            )
        );

        $parent->appendChild(
            $element
        );
    }

    /*
|--------------------------------------------------------------------------
| ENVIAR FACTURA POR CORREO
|--------------------------------------------------------------------------
*/

public function sendEmail(
    Request $request,
    Invoice $invoice
) {
    /*
    |--------------------------------------------------------------------------
    | VALIDAR DATOS
    |--------------------------------------------------------------------------
    */

    $validated = $request->validate([

        'subject' => [
            'required',
            'string',
            'max:255',
        ],

        'documents' => [
            'required',
            'array',
            'min:1',
        ],

        'documents.*' => [
            'required',
            'in:pdf,xml',
        ],

    ]);


    /*
    |--------------------------------------------------------------------------
    | CARGAR EMPRESA Y CORREOS
    |--------------------------------------------------------------------------
    */

    $invoice->load([
        'company.emails',
        'broker',
        'consignee',
        'generatedBy',
        'records.company',
        'records.services.serviceType',
    ]);


    $emails = $invoice->company
        ?->emails
        ?->pluck('email')
        ->map(fn ($email) => strtolower(trim($email)))
        ->filter()
        ->unique()
        ->values()
        ->all();


    /*
    |--------------------------------------------------------------------------
    | VALIDAR QUE EXISTAN DESTINATARIOS
    |--------------------------------------------------------------------------
    */

    if (empty($emails)) {

        return redirect()
            ->route(
                'invoices.show',
                $invoice
            )
            ->with(
                'error',
                'La empresa no tiene correos registrados.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | DOCUMENTOS
    |--------------------------------------------------------------------------
    */

    $pdfContent = null;
    $xmlContent = null;


    if (
        in_array(
            'pdf',
            $validated['documents'],
            true
        )
    ) {

        $pdfContent =
            $this->generatePdfContent(
                $invoice
            );
    }


    if (
        in_array(
            'xml',
            $validated['documents'],
            true
        )
    ) {

        $xmlContent =
            $this->generateXmlContent(
                $invoice
            );
    }


    /*
    |--------------------------------------------------------------------------
    | ENVIAR CORREO
    |--------------------------------------------------------------------------
    */

    Mail::to($emails)->send(

        new InvoiceMail(
            emailSubject:
                $validated['subject'],

            pdfContent:
                $pdfContent,

            xmlContent:
                $xmlContent,

            invoiceNumber:
                $invoice->invoice_number,
        )

    );


    /*
    |--------------------------------------------------------------------------
    | REGRESAR A LA FACTURA
    |--------------------------------------------------------------------------
    */

    return redirect()
        ->route(
            'invoices.show',
            $invoice
        )
        ->with(
            'success',
            'La factura fue enviada correctamente por correo.'
        );
}
}