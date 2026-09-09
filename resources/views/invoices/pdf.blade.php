<!DOCTYPE html>

<html
    lang="{{ app()->getLocale() }}"
>

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
           ENCABEZADO
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
           INFORMACIÓN DEL CLIENTE
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
           PERIODO
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
           TABLA DE REGISTROS
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
           SERVICIOS
        ========================================================= */

        .service {
            margin-bottom: 4px;
        }

        .service-name {
            font-weight: bold;
            color: #333;
        }

        .service-price {
            font-size: 7px;
            color: #666;
        }

        .additional-charge {
            margin-top: 5px;
            padding-top: 5px;
            border-top: 1px solid #ddd;
        }

        .additional-charge-name {
            font-weight: bold;
            color: #333;
        }

        .additional-charge-detail {
            margin-top: 2px;
            font-size: 7px;
            color: #666;
        }

        .no-data {
            color: #999;
        }

        .money {
            text-align: right;
            white-space: nowrap;
        }

        /* =========================================================
           COMENTARIOS
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
           TOTALES
        ========================================================= */

        .totals-wrapper {
            width: 100%;
            margin-top: 18px;
        }

        .totals-table {
            width: 280px;
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
         ENCABEZADO
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
                        {{ __('invoices.pdf.invoice') }}
                    </div>

                    <div class="invoice-info">

                        <strong>
                            {{ __('invoices.pdf.invoice_date') }}
                        </strong>

                        {{
                            $invoice->generated_at
                                ? $invoice->generated_at->format(
                                    'F d, Y'
                                )
                                : now()->format('F d, Y')
                        }}

                        <br>


                        <strong>
                            {{ __('invoices.pdf.receiving_date') }}
                        </strong>

                        {{
                            $invoice->period_end
                                ? $invoice->period_end->format(
                                    'F d, Y'
                                )
                                : '—'
                        }}

                        <br>


                        <strong>
                            {{ __('invoices.pdf.invoice_number') }}
                        </strong>

                        {{ $invoice->invoice_number }}

                    </div>

                </td>

            </tr>

        </table>

    </div>


    {{-- =========================================================
         INFORMACIÓN DE FACTURACIÓN
    ========================================================== --}}

    <table class="info-table">

        <tr>


            {{-- =================================================
                 BILL TO
            ================================================== --}}

            <td class="info-box">

                <div class="info-title">
                    {{ __('invoices.pdf.bill_to') }}
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

                            {{ __('invoices.pdf.phone') }}

                            {{ $invoice->company->phone }}

                        </div>

                    @endif


                    @if(!empty($invoice->company->tax_id))

                        <div class="info-text">

                            {{ __('invoices.pdf.tax_id') }}

                            {{ $invoice->company->tax_id }}

                        </div>

                    @endif

                @else

                    <div class="no-data">
                        {{ __('invoices.no_billing_company') }}
                    </div>

                @endif

            </td>


            {{-- =================================================
                 INFORMACIÓN DE LA FACTURA
            ================================================== --}}

            <td class="info-box">

                <div class="info-title">

                    {{ __('invoices.pdf.invoice_information') }}

                </div>


                <div class="info-text">

                    <strong>
                        {{ __('invoices.pdf.invoice') }}:
                    </strong>

                    {{ $invoice->invoice_number }}

                </div>


                <div class="info-text">

                    <strong>
                        {{ __('invoices.pdf.period') }}
                    </strong>

                    {{
                        $invoice->period_start
                            ?->format(
                                app()->getLocale() === 'en'
                                    ? 'm/d/Y'
                                    : 'd/m/Y'
                            )
                    }}

                    -

                    {{
                        $invoice->period_end
                            ?->format(
                                app()->getLocale() === 'en'
                                    ? 'm/d/Y'
                                    : 'd/m/Y'
                            )
                    }}

                </div>


                <div class="info-text">

                    <strong>
                        {{ __('invoices.pdf.generated_by') }}
                    </strong>

                    {{ $invoice->generatedBy->name ?? '—' }}

                </div>


            </td>

        </tr>

    </table>


    {{-- =========================================================
         PERIODO
    ========================================================== --}}

    <div class="period">

        <strong>
            {{ __('invoices.pdf.billing_period') }}
        </strong>

        {{
            $invoice->period_start
                ?->format('F d, Y')
        }}

        &nbsp; - &nbsp;

        {{
            $invoice->period_end
                ?->format('F d, Y')
        }}

    </div>


    {{-- =========================================================
         REGISTROS
    ========================================================== --}}

    <table class="records-table">

        <thead>

            <tr>

                <th style="width:9%;">
                    {{ __('invoices.pdf.date') }}
                </th>

                <th style="width:13%;">
                    {{ __('invoices.pdf.company') }}
                </th>

                <th style="width:15%;">
                    {{ __('invoices.pdf.invoice') }}
                </th>

                <th style="width:12%;">
                    {{ __('invoices.pdf.paps') }}
                </th>

                <th style="width:25%;">
                    {{ __('invoices.pdf.services') }}
                </th>

                <th style="width:14%;">
                    {{ __('invoices.pdf.comments') }}
                </th>

                <th
                    style="
                        width:12%;
                        text-align:right;
                    "
                >
                    {{ __('invoices.pdf.amount') }}
                </th>

            </tr>

        </thead>


        <tbody>

            @forelse($invoice->records as $record)

                @php

                    /*
                    |--------------------------------------------------------------------------
                    | TOTAL DE SERVICIOS DEL REGISTRO
                    |--------------------------------------------------------------------------
                    */

                    $servicesTotal =
                        $record->services->sum(
                            fn ($service) =>
                                (float) $service->subtotal
                        );


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


                    /*
                    |--------------------------------------------------------------------------
                    | TOTAL DEL REGISTRO
                    |--------------------------------------------------------------------------
                    */

                    $recordTotal =
                        $servicesTotal +
                        $additionalAmount;


                    /*
                    |--------------------------------------------------------------------------
                    | DATOS DE FACTURACIÓN
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


                    {{-- FECHA --}}

                    <td>

                        {{
                            $record->date
                                ? $record->date->format(
                                    app()->getLocale() === 'en'
                                        ? 'm/d/Y'
                                        : 'd/m/Y'
                                )
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


                    {{-- SERVICIOS --}}

                    <td>

                        @forelse(
                            $record->services
                            as $service
                        )

                            <div class="service">

                                <span class="service-name">

                                    {{
                                        $service
                                            ->serviceType
                                            ->name
                                        ??
                                        __('invoices.pdf.service')
                                    }}

                                </span>

                                <br>

                                <span class="service-price">

                                    $

                                    {{
                                        number_format(
                                            (float)
                                            $service->subtotal,
                                            2
                                        )
                                    }}

                                </span>

                            </div>

                        @empty

                            <span class="no-data">

                                {{ __('invoices.pdf.no_service') }}

                            </span>

                        @endforelse


                        {{-- CARGO ADICIONAL --}}

                        @if($additionalAmount > 0)

                            <div class="additional-charge">

                                <div class="additional-charge-name">

                                    {{
                                        $additionalType
                                        ?:
                                        __('invoices.pdf.additional_charge')
                                    }}

                                </div>


                                <div class="additional-charge-detail">

                                    {{
                                        number_format(
                                            $additionalQuantity,
                                            2
                                        )
                                    }}

                                    ×

                                    $

                                    {{
                                        number_format(
                                            $additionalUnitPrice,
                                            2
                                        )
                                    }}

                                </div>

                            </div>

                        @endif

                    </td>


                    {{-- NOTAS DEL REGISTRO --}}

                    <td>

                        @if(!empty($record->notes))

                            {{ $record->notes }}

                        @else

                            <span class="no-data">
                                —
                            </span>

                        @endif

                    </td>


                    {{-- TOTAL DEL REGISTRO --}}

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

                        {{ __('invoices.pdf.no_records') }}

                    </td>

                </tr>

            @endforelse

        </tbody>

    </table>


    {{-- =========================================================
         NOTAS GENERALES DE LA FACTURA
    ========================================================== --}}

    @if(!empty($invoice->comments))

        <div class="invoice-comments">

            <div class="invoice-comments-title">

                {{ __('invoices.pdf.notes') }}

            </div>

            <div class="invoice-comments-text">

                {{ $invoice->comments }}

            </div>

        </div>

    @endif


    {{-- =========================================================
         TOTALES
    ========================================================== --}}

    <div class="totals-wrapper">

        <table class="totals-table">


            {{-- SUBTOTAL --}}

            <tr>

                <td class="totals-label">

                    {{ __('invoices.pdf.records_subtotal') }}

                </td>

                <td class="totals-value">

                    $

                    {{
                        number_format(
                            (float) $invoice->subtotal,
                            2
                        )
                    }}

                </td>

            </tr>


            {{-- SHIPPING --}}

            <tr>

                <td class="totals-label">

                    {{ __('invoices.pdf.shipping') }}

                    @if(
                        $invoice->shipping_handling_enabled &&
                        (float) $invoice->shipping_handling_rate > 0
                    )

                        {{
                            number_format(
                                (float)
                                $invoice->shipping_handling_rate,
                                2
                            )
                        }}%

                    @else

                        0.00%

                    @endif

                </td>


                <td class="totals-value">

                    $

                    {{
                        number_format(
                            (float)
                            $invoice->shipping_handling_amount,
                            2
                        )
                    }}

                </td>

            </tr>


            {{-- HANDLING --}}

            <tr>

                <td class="totals-label">

                    {{ __('invoices.pdf.handling') }}

                    @if(
                        $invoice->shipping_handling_enabled &&
                        (float) $invoice->shipping_handling_rate > 0
                    )

                        {{
                            number_format(
                                (float)
                                $invoice->shipping_handling_rate,
                                2
                            )
                        }}%

                    @else

                        0.00%

                    @endif

                </td>


                <td class="totals-value">

                    $

                    {{
                        number_format(
                            0,
                            2
                        )
                    }}

                </td>

            </tr>


            {{-- TAX --}}

            <tr>

                <td class="totals-label">

                    {{ __('invoices.pdf.tax_rate') }}

                    @if(
                        $invoice->tax_enabled &&
                        (float) $invoice->tax_rate > 0
                    )

                        {{
                            number_format(
                                (float)
                                $invoice->tax_rate,
                                2
                            )
                        }}%

                    @else

                        0.00%

                    @endif

                </td>


                <td class="totals-value">

                    $

                    {{
                        number_format(
                            (float)
                            $invoice->tax,
                            2
                        )
                    }}

                </td>

            </tr>


            {{-- TOTAL --}}

            <tr class="total-row">

                <td>
                    {{ __('invoices.pdf.total') }}
                </td>

                <td class="money">

                    $

                    {{
                        number_format(
                            (float)
                            $invoice->total,
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

                    {{ __('invoices.pdf.invoice_footer') }}

                    {{ $invoice->invoice_number }}

                </td>

            </tr>

        </table>

    </div>


</div>

</body>

</html>