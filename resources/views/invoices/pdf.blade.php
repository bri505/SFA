<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <title>
        {{ $invoice->invoice_number }}
    </title>


    <style>

        * {
            box-sizing: border-box;
        }

        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 9px;
            color: #222;
            margin: 0;
            padding: 0;
        }

        .page {
            padding: 28px 35px;
        }


        /* =========================================================
           HEADER
        ========================================================= */

        .header {
            width: 100%;
            margin-bottom: 22px;
        }

        .header-table {
            width: 100%;
            border-collapse: collapse;
        }

        .logo-cell {
            width: 55%;
            vertical-align: top;
        }

        .logo {
            width: 150px;
            max-height: 70px;
            object-fit: contain;
        }

        .company-name {
            margin-top: 5px;
            font-size: 16px;
            font-weight: bold;
            color: #222;
        }

        .company-info {
            margin-top: 4px;
            font-size: 8px;
            line-height: 1.5;
            color: #444;
        }

        .invoice-title-cell {
            width: 45%;
            vertical-align: top;
            text-align: right;
        }

        .invoice-title {
            font-size: 22px;
            font-weight: bold;
            color: #222;
            margin-bottom: 10px;
        }

        .invoice-info {
            font-size: 8px;
            line-height: 1.7;
            color: #333;
        }

        .invoice-info strong {
            font-weight: bold;
        }


        /* =========================================================
           BILLING INFORMATION
        ========================================================= */

        .info-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 18px;
        }

        .info-box {
            width: 50%;
            vertical-align: top;
            padding: 9px 10px;
            border: 1px solid #ddd;
        }

        .info-title {
            font-size: 8px;
            font-weight: bold;
            text-transform: uppercase;
            color: #777;
            margin-bottom: 5px;
        }

        .client-name {
            font-size: 11px;
            font-weight: bold;
            color: #222;
            margin-bottom: 3px;
        }

        .info-text {
            font-size: 8px;
            line-height: 1.45;
            color: #444;
        }

        .info-text strong {
            color: #222;
        }


        /* =========================================================
           PERIOD
        ========================================================= */

        .period {
            margin-bottom: 15px;
            padding: 8px 10px;
            border: 1px solid #ddd;
            background: #fafafa;
        }

        .period strong {
            color: #222;
        }


        /* =========================================================
           RECORDS TABLE
        ========================================================= */

        .records-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 8px;
        }

        .records-table th {
            padding: 7px 5px;
            background: #222;
            color: white;
            font-size: 7px;
            text-transform: uppercase;
            text-align: left;
        }

        .records-table td {
            padding: 7px 5px;
            border-bottom: 1px solid #ddd;
            vertical-align: top;
            font-size: 8px;
        }

        .records-table tr:nth-child(even) td {
            background: #fafafa;
        }


        /* =========================================================
           SERVICES
        ========================================================= */

        .service {
            margin-bottom: 7px;
            padding-bottom: 5px;
            border-bottom: 1px dotted #ddd;
        }

        .service:last-child {
            border-bottom: none;
        }

        .service-name {
            font-weight: bold;
            color: #333;
        }

        .service-price {
            font-size: 7px;
            color: #666;
        }

        .service-detail {
            margin-top: 2px;
            font-size: 7px;
            line-height: 1.45;
            color: #666;
        }

        .service-tax {
            color: #444;
        }

        .service-total {
            margin-top: 2px;
            font-size: 7px;
            font-weight: bold;
            color: #222;
        }


        /* =========================================================
           ADDITIONAL CHARGE
        ========================================================= */

        .additional-charge {
            margin-top: 7px;
            padding-top: 6px;
            border-top: 1px solid #bbb;
        }

        .additional-charge-name {
            font-weight: bold;
            color: #333;
        }

        .additional-charge-detail {
            margin-top: 2px;
            font-size: 7px;
            color: #666;
            line-height: 1.45;
        }


        /* =========================================================
           RECORD BREAKDOWN
        ========================================================= */

        .record-breakdown {
            margin-top: 5px;
            padding-top: 4px;
            border-top: 1px dotted #ddd;
            font-size: 7px;
            line-height: 1.5;
            color: #666;
        }

        .record-breakdown strong {
            color: #333;
        }


        /* =========================================================
           GENERAL
        ========================================================= */

        .no-data {
            color: #999;
        }

        .money {
            text-align: right;
            white-space: nowrap;
        }


        /* =========================================================
           COMMENTS
        ========================================================= */

        .invoice-comments {
            margin-top: 15px;
            margin-bottom: 15px;
            padding: 9px 11px;
            border: 1px solid #ddd;
        }

        .invoice-comments-title {
            margin-bottom: 5px;
            font-size: 8px;
            font-weight: bold;
            text-transform: uppercase;
            color: #777;
        }

        .invoice-comments-text {
            font-size: 8px;
            line-height: 1.5;
            color: #333;
            white-space: pre-line;
        }


        /* =========================================================
           TOTALS
        ========================================================= */

        .totals-wrapper {
            width: 100%;
            margin-top: 18px;
        }

        .totals-table {
            width: 330px;
            margin-left: auto;
            border-collapse: collapse;
        }

        .totals-table td {
            padding: 5px 7px;
            border-bottom: 1px solid #ddd;
            font-size: 9px;
        }

        .totals-label {
            text-align: left;
            color: #555;
        }

        .totals-value {
            text-align: right;
            color: #222;
        }

        .totals-rate {
            text-align: right;
            color: #777;
            font-size: 7px;
            white-space: nowrap;
        }

        .subtotal-section td {
            font-weight: bold;
        }

        .tax-section td {
            background: #fafafa;
        }

        .total-row td {
            padding-top: 9px;
            border-top: 2px solid #222;
            border-bottom: none;
            font-size: 13px;
            font-weight: bold;
            color: #222;
        }


        /* =========================================================
           FOOTER
        ========================================================= */

        .footer {
            margin-top: 35px;
            padding-top: 9px;
            border-top: 1px solid #ddd;
            font-size: 7px;
            color: #999;
        }

        .footer-table {
            width: 100%;
            border-collapse: collapse;
        }

        .footer-right {
            text-align: right;
        }

    </style>

</head>


<body>

<div class="page">


    {{-- =========================================================
         PREPARE TOTALS
    ========================================================== --}}

    @php

        /*
        |--------------------------------------------------------------------------
        | SERVICES
        |--------------------------------------------------------------------------
        */

        $servicesBaseTotal = 0;

        $serviceTaxTotalCalculated = 0;

        $serviceTaxRates = [];


        /*
        |--------------------------------------------------------------------------
        | ADDITIONAL CHARGES
        |--------------------------------------------------------------------------
        */

        $additionalChargesTotal = 0;


        foreach ($invoice->records as $record) {

            foreach ($record->services as $service) {

                $serviceBase =
                    round(
                        (float) $service->subtotal,
                        2
                    );


                $serviceTaxRate =
                    (float) (
                        $service->serviceType?->tax_rate
                        ?? 0
                    );


                $serviceTaxAmount =
                    round(
                        $serviceBase *
                        ($serviceTaxRate / 100),
                        2
                    );


                $servicesBaseTotal +=
                    $serviceBase;


                $serviceTaxTotalCalculated +=
                    $serviceTaxAmount;


                if ($serviceTaxRate >= 0) {

                    $rateKey =
                        number_format(
                            $serviceTaxRate,
                            2,
                            '.',
                            ''
                        );

                    $serviceTaxRates[$rateKey] =
                        $serviceTaxRate;

                }

            }


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
                $record->pivot
                    ->additional_charge_amount;


            if ($additionalAmount === null) {

                $additionalAmount =
                    $additionalQuantity *
                    $additionalUnitPrice;

            }


            $additionalChargesTotal +=
                (float) $additionalAmount;

        }


        /*
        |--------------------------------------------------------------------------
        | SERVICE TAX
        |--------------------------------------------------------------------------
        |
        | If the invoice has a stored service_tax value, use it.
        | Otherwise use the calculated amount from the services.
        |
        */

        $serviceTaxTotal =
            $invoice->service_tax !== null
                ? (float) $invoice->service_tax
                : $serviceTaxTotalCalculated;


        /*
        |--------------------------------------------------------------------------
        | SERVICE TAX RATE LABEL
        |--------------------------------------------------------------------------
        */

        ksort($serviceTaxRates);


        $serviceTaxRateLabel =
            count($serviceTaxRates) > 0
                ? collect($serviceTaxRates)
                    ->map(
                        fn ($rate) =>
                            number_format(
                                (float) $rate,
                                2
                            ) . '%'
                    )
                    ->implode(', ')
                : '0.00%';


        /*
        |--------------------------------------------------------------------------
        | INVOICE LEVEL TAXES
        |--------------------------------------------------------------------------
        */

        $shippingEnabled =
            (bool) (
                $invoice->shipping_handling_enabled
                ?? false
            );


        $shippingRate =
            $shippingEnabled
                ? (float) (
                    $invoice->shipping_handling_rate
                    ?? 0
                )
                : 0;


        $shippingAmount =
            (float) (
                $invoice->shipping_handling_amount
                ?? 0
            );


        /*
        |--------------------------------------------------------------------------
        | HANDLING
        |--------------------------------------------------------------------------
        |
        | Currently the system stores Shipping/Handling as one percentage.
        | Handling amount is therefore shown separately as 0.00.
        |
        */

        $handlingRate =
            $shippingEnabled
                ? $shippingRate
                : 0;


        $handlingAmount = 0;


        /*
        |--------------------------------------------------------------------------
        | SALES TAX
        |--------------------------------------------------------------------------
        */

        $taxEnabled =
            (bool) (
                $invoice->tax_enabled
                ?? false
            );


        $taxRate =
            $taxEnabled
                ? (float) (
                    $invoice->tax_rate
                    ?? 0
                )
                : 0;


        $taxAmount =
            (float) (
                $invoice->tax
                ?? 0
            );


        /*
        |--------------------------------------------------------------------------
        | INVOICE SUBTOTAL
        |--------------------------------------------------------------------------
        */

        $invoiceSubtotal =
            (float) (
                $invoice->subtotal
                ?? (
                    $servicesBaseTotal +
                    $additionalChargesTotal
                )
            );


        /*
        |--------------------------------------------------------------------------
        | SALES TAX BASE
        |--------------------------------------------------------------------------
        */

        $salesTaxBase =
            $invoiceSubtotal +
            $shippingAmount;


        /*
        |--------------------------------------------------------------------------
        | TOTAL
        |--------------------------------------------------------------------------
        */

        $invoiceTotal =
            (float) (
                $invoice->total
                ?? (
                    $invoiceSubtotal +
                    $serviceTaxTotal +
                    $shippingAmount +
                    $taxAmount
                )
            );

    @endphp



    {{-- =========================================================
         HEADER
    ========================================================== --}}

    <div class="header">

        <table class="header-table">

            <tr>

                <td class="logo-cell">

                    <img
                        src="{{ public_path('images/alfonsos-logo.png') }}"
                        class="logo"
                    >


                    <div class="company-name">
                        Alfonso's Warehouse
                    </div>


                    <div class="company-info">

                        840 N. Douglas Avenue<br>

                        Douglas, AZ 85607<br>

                        Phone/Fax:
                        (520) 364-3579;
                        (520) 805-1865

                    </div>

                </td>


                <td class="invoice-title-cell">

                    <div class="invoice-title">
                        INVOICE
                    </div>


                    <div class="invoice-info">

                        <strong>
                            Invoice Date:
                        </strong>

                        {{
                            $invoice->generated_at
                                ? $invoice->generated_at
                                    ->locale('en')
                                    ->translatedFormat('F d, Y')
                                : now()
                                    ->locale('en')
                                    ->translatedFormat('F d, Y')
                        }}

                        <br>


                        <strong>
                            Receiving Date:
                        </strong>

                        {{
                            $invoice->period_end
                                ? $invoice->period_end
                                    ->locale('en')
                                    ->translatedFormat('F d, Y')
                                : '—'
                        }}

                        <br>


                        <strong>
                            Invoice Number:
                        </strong>

                        {{ $invoice->invoice_number }}

                    </div>

                </td>

            </tr>

        </table>

    </div>



    {{-- =========================================================
         BILL TO / INVOICE INFORMATION
    ========================================================== --}}

    <table class="info-table">

        <tr>


            {{-- BILL TO --}}

            <td class="info-box">

                <div class="info-title">
                    BILL TO
                </div>


                @if($invoice->company)

                    <div class="client-name">

                        {{ $invoice->company->name }}

                    </div>


                    @if(!empty($invoice->company->address))

                        <div class="info-text">

                            {{ $invoice->company->address }}

                        </div>

                    @endif


                    @if(
                        !empty($invoice->company->city) ||
                        !empty($invoice->company->state) ||
                        !empty($invoice->company->postal_code)
                    )

                        <div class="info-text">

                            @if(!empty($invoice->company->city))
                                {{ $invoice->company->city }}
                            @endif


                            @if(!empty($invoice->company->state))

                                @if(!empty($invoice->company->city))
                                    ,
                                @endif

                                {{ $invoice->company->state }}

                            @endif


                            @if(!empty($invoice->company->postal_code))

                                {{ $invoice->company->postal_code }}

                            @endif

                        </div>

                    @endif


                    @if(!empty($invoice->company->phone))

                        <div class="info-text">

                            Phone:
                            {{ $invoice->company->phone }}

                        </div>

                    @endif


                    @if(!empty($invoice->company->tax_id))

                        <div class="info-text">

                            Tax ID:
                            {{ $invoice->company->tax_id }}

                        </div>

                    @endif

                @else

                    <div class="no-data">
                        No billing company
                    </div>

                @endif

            </td>



            {{-- INVOICE INFORMATION --}}

            <td class="info-box">

                <div class="info-title">
                    INVOICE INFORMATION
                </div>


                <div class="info-text">

                    <strong>
                        Invoice:
                    </strong>

                    {{ $invoice->invoice_number }}

                </div>


                <div class="info-text">

                    <strong>
                        Period:
                    </strong>

                    {{
                        $invoice->period_start
                            ?->format('m/d/Y')
                    }}

                    -

                    {{
                        $invoice->period_end
                            ?->format('m/d/Y')
                    }}

                </div>


                @if(!empty($invoice->billing_type))

                    <div class="info-text">

                        <strong>
                            Billing Type:
                        </strong>

                        {{ $invoice->billing_type }}

                    </div>

                @endif


                @if($invoice->broker)

                    <div class="info-text">

                        <strong>
                            Broker:
                        </strong>

                        {{ $invoice->broker->name ?? '—' }}

                    </div>

                @endif


                @if($invoice->consignee)

                    <div class="info-text">

                        <strong>
                            Consignee:
                        </strong>

                        {{ $invoice->consignee->name ?? '—' }}

                    </div>

                @endif


                <div class="info-text">

                    <strong>
                        Generated By:
                    </strong>

                    {{ $invoice->generatedBy->name ?? '—' }}

                </div>


                @if($invoice->generated_at)

                    <div class="info-text">

                        <strong>
                            Generated:
                        </strong>

                        {{
                            $invoice->generated_at
                                ->locale('en')
                                ->translatedFormat('F d, Y h:i A')
                        }}

                    </div>

                @endif

            </td>

        </tr>

    </table>



    {{-- =========================================================
         BILLING PERIOD
    ========================================================== --}}

    <div class="period">

        <strong>
            Billing Period:
        </strong>


        {{
            $invoice->period_start
                ? $invoice->period_start
                    ->locale('en')
                    ->translatedFormat('F d, Y')
                : '—'
        }}


        &nbsp; - &nbsp;


        {{
            $invoice->period_end
                ? $invoice->period_end
                    ->locale('en')
                    ->translatedFormat('F d, Y')
                : '—'
        }}

    </div>



    {{-- =========================================================
         RECORDS
    ========================================================== --}}

    <table class="records-table">

        <thead>

            <tr>

                <th style="width:8%;">
                    DATE
                </th>

                <th style="width:12%;">
                    COMPANY
                </th>

                <th style="width:13%;">
                    INVOICE
                </th>

                <th style="width:10%;">
                    PAPS
                </th>

                <th style="width:29%;">
                    SERVICES / CHARGES
                </th>

                <th style="width:16%;">
                    COMMENTS
                </th>

                <th
                    style="
                        width:12%;
                        text-align:right;
                    "
                >
                    AMOUNT
                </th>

            </tr>

        </thead>


        <tbody>


            @forelse($invoice->records as $record)


                @php

                    /*
                    |--------------------------------------------------------------------------
                    | RECORD TOTALS
                    |--------------------------------------------------------------------------
                    */

                    $recordServicesBase =
                        0;

                    $recordServiceTax =
                        0;


                    foreach ($record->services as $service) {

                        $base =
                            round(
                                (float) $service->subtotal,
                                2
                            );


                        $rate =
                            (float) (
                                $service
                                    ->serviceType
                                    ?->tax_rate
                                ?? 0
                            );


                        $tax =
                            round(
                                $base *
                                ($rate / 100),
                                2
                            );


                        $recordServicesBase +=
                            $base;


                        $recordServiceTax +=
                            $tax;

                    }


                    /*
                    |--------------------------------------------------------------------------
                    | ADDITIONAL CHARGE
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
                        $record->pivot
                            ->additional_charge_amount;


                    if ($additionalAmount === null) {

                        $additionalAmount =
                            $additionalQuantity *
                            $additionalUnitPrice;

                    }


                    $additionalAmount =
                        (float) $additionalAmount;


                    /*
                    |--------------------------------------------------------------------------
                    | RECORD SUBTOTAL
                    |--------------------------------------------------------------------------
                    */

                    $recordSubtotal =
                        $recordServicesBase +
                        $additionalAmount;


                    /*
                    |--------------------------------------------------------------------------
                    | RECORD TOTAL
                    |--------------------------------------------------------------------------
                    */

                    $recordTotal =
                        $recordSubtotal +
                        $recordServiceTax;


                    /*
                    |--------------------------------------------------------------------------
                    | BILLING DATA
                    |--------------------------------------------------------------------------
                    */

                    $billingInvoice =
                        $record->pivot
                            ->billing_invoice
                        ??
                        $record->invoice_number
                        ??
                        '—';


                    $billingPaps =
                        $record->pivot
                            ->billing_paps
                        ??
                        $record->paps_number
                        ??
                        '—';


                    $additionalType =
                        $record->pivot
                            ->additional_charge_type
                        ??
                        '';

                @endphp



                <tr>


                    {{-- DATE --}}

                    <td>

                        {{
                            $record->date
                                ? $record->date->format('m/d/Y')
                                : '—'
                        }}

                    </td>



                    {{-- COMPANY --}}

                    <td>

                        @if($record->company)

                            <strong>

                                {{
                                    $record->company->code
                                    ?: $record->company->name
                                }}

                            </strong>


                            @if(
                                $record->company->code &&
                                $record->company->name
                            )

                                <br>

                                <span class="service-price">

                                    {{ $record->company->name }}

                                </span>

                            @endif

                        @else

                            <span class="no-data">
                                —
                            </span>

                        @endif

                    </td>



                    {{-- INVOICE --}}

                    <td>

                        {{ $billingInvoice }}

                    </td>



                    {{-- PAPS --}}

                    <td>

                        {{ $billingPaps }}

                    </td>



                    {{-- SERVICES --}}

                    <td>


                        @forelse(
                            $record->services
                            as $service
                        )


                            @php

                                $serviceBase =
                                    round(
                                        (float)
                                        $service->subtotal,
                                        2
                                    );


                                $serviceRate =
                                    (float) (
                                        $service
                                            ->serviceType
                                            ?->tax_rate
                                        ?? 0
                                    );


                                $serviceTax =
                                    round(
                                        $serviceBase *
                                        ($serviceRate / 100),
                                        2
                                    );


                                $serviceTotal =
                                    $serviceBase +
                                    $serviceTax;

                            @endphp


                            <div class="service">


                                {{-- SERVICE NAME --}}

                                <span class="service-name">

                                    {{
                                        $service
                                            ->serviceType
                                            ?->name
                                        ??
                                        'Service'
                                    }}

                                </span>


                                {{-- QUANTITY / UNIT PRICE --}}

                                @if(
                                    $service->quantity !== null ||
                                    $service->unit_price !== null
                                )

                                    <div class="service-detail">

                                        @if($service->quantity !== null)

                                            Qty:
                                            {{
                                                number_format(
                                                    (float)
                                                    $service->quantity,
                                                    2
                                                )
                                            }}

                                        @endif


                                        @if(
                                            $service->quantity !== null &&
                                            $service->unit_price !== null
                                        )

                                            ×

                                        @endif


                                        @if($service->unit_price !== null)

                                            Unit:
                                            $

                                            {{
                                                number_format(
                                                    (float)
                                                    $service->unit_price,
                                                    2
                                                )
                                            }}

                                        @endif

                                    </div>

                                @endif


                                {{-- BASE --}}

                                <div class="service-detail">

                                    Base:

                                    $

                                    {{
                                        number_format(
                                            $serviceBase,
                                            2
                                        )
                                    }}

                                </div>


                                {{-- SERVICE IVA --}}

                                <div class="service-detail service-tax">

                                    Service Tax / IVA:

                                    {{
                                        number_format(
                                            $serviceRate,
                                            2
                                        )
                                    }}%

                                    &nbsp;

                                    $

                                    {{
                                        number_format(
                                            $serviceTax,
                                            2
                                        )
                                    }}

                                </div>


                                {{-- SERVICE TOTAL --}}

                                <div class="service-total">

                                    Service Total:

                                    $

                                    {{
                                        number_format(
                                            $serviceTotal,
                                            2
                                        )
                                    }}

                                </div>


                            </div>


                        @empty

                            <span class="no-data">

                                No service

                            </span>

                        @endforelse



                        {{-- =================================================
                             ADDITIONAL CHARGE
                        ================================================== --}}

                        @if($additionalAmount > 0)

                            <div class="additional-charge">


                                <div class="additional-charge-name">

                                    {{
                                        $additionalType
                                        ?:
                                        'Additional Charge'
                                    }}

                                </div>


                                <div class="additional-charge-detail">

                                    Quantity:

                                    {{
                                        number_format(
                                            $additionalQuantity,
                                            2
                                        )
                                    }}


                                    <br>


                                    Unit Price:

                                    $

                                    {{
                                        number_format(
                                            $additionalUnitPrice,
                                            2
                                        )
                                    }}


                                    <br>


                                    Amount:

                                    $

                                    {{
                                        number_format(
                                            $additionalAmount,
                                            2
                                        )
                                    }}

                                </div>


                            </div>

                        @endif



                        {{-- =================================================
                             RECORD BREAKDOWN
                        ================================================== --}}

                        <div class="record-breakdown">

                            <strong>
                                Services Base:
                            </strong>

                            $

                            {{
                                number_format(
                                    $recordServicesBase,
                                    2
                                )
                            }}


                            <br>


                            <strong>
                                Service Tax:
                            </strong>

                            $

                            {{
                                number_format(
                                    $recordServiceTax,
                                    2
                                )
                            }}


                            <br>


                            <strong>
                                Additional Charges:
                            </strong>

                            $

                            {{
                                number_format(
                                    $additionalAmount,
                                    2
                                )
                            }}


                            <br>


                            <strong>
                                Record Total:
                            </strong>

                            $

                            {{
                                number_format(
                                    $recordTotal,
                                    2
                                )
                            }}

                        </div>


                    </td>



                    {{-- RECORD NOTES --}}

                    <td>

                        @if(!empty($record->notes))

                            {{ $record->notes }}

                        @else

                            <span class="no-data">
                                —
                            </span>

                        @endif

                    </td>



                    {{-- RECORD TOTAL --}}

                    <td class="money">

                        $

                        {{
                            number_format(
                                $recordTotal,
                                2
                            )
                        }}

                    </td>

                </tr>


            @empty


                <tr>

                    <td
                        colspan="7"
                        style="text-align:center;"
                    >

                        No records

                    </td>

                </tr>


            @endforelse


        </tbody>

    </table>



    {{-- =========================================================
         GENERAL INVOICE NOTES
    ========================================================== --}}

    @if(!empty($invoice->comments))

        <div class="invoice-comments">

            <div class="invoice-comments-title">

                NOTES

            </div>


            <div class="invoice-comments-text">

                {{ $invoice->comments }}

            </div>

        </div>

    @endif



    {{-- =========================================================
         TOTALS
    ========================================================== --}}

    <div class="totals-wrapper">

        <table class="totals-table">


            {{-- =================================================
                 SERVICES BASE
            ================================================== --}}

            <tr>

                <td class="totals-label">

                    Services Subtotal

                </td>

                <td class="totals-value">

                    $

                    {{
                        number_format(
                            $servicesBaseTotal,
                            2
                        )
                    }}

                </td>

            </tr>



            {{-- =================================================
                 SERVICE TAX
            ================================================== --}}

            <tr class="tax-section">

                <td class="totals-label">

                    Service Tax / IVA

                    <br>

                    <span style="font-size:7px;color:#777;">

                        Rates:
                        {{ $serviceTaxRateLabel }}

                    </span>

                </td>


                <td class="totals-value">

                    $

                    {{
                        number_format(
                            $serviceTaxTotal,
                            2
                        )
                    }}

                </td>

            </tr>



            {{-- =================================================
                 ADDITIONAL CHARGES
            ================================================== --}}

            <tr>

                <td class="totals-label">

                    Additional Charges

                </td>


                <td class="totals-value">

                    $

                    {{
                        number_format(
                            $additionalChargesTotal,
                            2
                        )
                    }}

                </td>

            </tr>



            {{-- =================================================
                 RECORDS SUBTOTAL
            ================================================== --}}

            <tr class="subtotal-section">

                <td class="totals-label">

                    Records Subtotal

                </td>


                <td class="totals-value">

                    $

                    {{
                        number_format(
                            $invoiceSubtotal,
                            2
                        )
                    }}

                </td>

            </tr>



            {{-- =================================================
                 SHIPPING
            ================================================== --}}

            <tr>

                <td class="totals-label">

                    Shipping

                    <br>

                    <span style="font-size:7px;color:#777;">

                        Rate:

                        {{
                            number_format(
                                $shippingRate,
                                2
                            )
                        }}%

                    </span>

                </td>


                <td class="totals-value">

                    $

                    {{
                        number_format(
                            $shippingAmount,
                            2
                        )
                    }}

                </td>

            </tr>



            {{-- =================================================
                 HANDLING
            ================================================== --}}

            <tr>

                <td class="totals-label">

                    Handling

                    <br>

                    <span style="font-size:7px;color:#777;">

                        Rate:

                        {{
                            number_format(
                                $handlingRate,
                                2
                            )
                        }}%

                    </span>

                </td>


                <td class="totals-value">

                    $

                    {{
                        number_format(
                            $handlingAmount,
                            2
                        )
                    }}

                </td>

            </tr>



            {{-- =================================================
                 SALES TAX BASE
            ================================================== --}}

            <tr>

                <td class="totals-label">

                    Sales Taxable Base

                </td>


                <td class="totals-value">

                    $

                    {{
                        number_format(
                            $salesTaxBase,
                            2
                        )
                    }}

                </td>

            </tr>



            {{-- =================================================
                 SALES TAX
            ================================================== --}}

            <tr class="tax-section">

                <td class="totals-label">

                    Sales Tax

                    <br>

                    <span style="font-size:7px;color:#777;">

                        Rate:

                        {{
                            number_format(
                                $taxRate,
                                2
                            )
                        }}%

                    </span>

                </td>


                <td class="totals-value">

                    $

                    {{
                        number_format(
                            $taxAmount,
                            2
                        )
                    }}

                </td>

            </tr>



            {{-- =================================================
                 TOTAL
            ================================================== --}}

            <tr class="total-row">

                <td>
                    TOTAL
                </td>


                <td class="money">

                    $

                    {{
                        number_format(
                            $invoiceTotal,
                            2
                        )
                    }}

                </td>

            </tr>


        </table>

    </div>



    {{-- =========================================================
         FOOTER
    ========================================================== --}}

    <div class="footer">

        <table class="footer-table">

            <tr>

                <td>

                    Alfonso's Warehouse

                </td>


                <td class="footer-right">

                    Invoice
                    {{ $invoice->invoice_number }}

                </td>

            </tr>

        </table>

    </div>


</div>

</body>

</html>