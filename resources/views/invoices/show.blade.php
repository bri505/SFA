<x-app-layout>

<style>

    .sfa-page {
        min-height: calc(100vh - 64px);
        background: #f5f6f8;
    }

    .sfa-container {
        max-width: 1100px;
        margin: 0 auto;
        padding: 24px 28px;
    }


    /* =========================================================
       HEADER
    ========================================================= */

    .header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    .title {
        font-size: 23px;
        font-weight: 600;
        color: #1f2937;
    }

    .subtitle {
        margin-top: 4px;
        font-size: 12px;
        color: #6b7280;
    }

    .actions {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
    }

    .btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;

        padding: 8px 13px;

        border-radius: 5px;

        font-size: 11px;

        text-decoration: none;

        cursor: pointer;
    }

    .btn-back {
        background: white;

        border: 1px solid #d1d5db;

        color: #4b5563;
    }

    .btn-back:hover {
        background: #f9fafb;
    }

    .btn-pdf {
        background: #1f2937;

        color: white;
    }

    .btn-pdf:hover {
        background: #111827;
    }

    /* =========================================================
       XML
    ========================================================= */

    .btn-xml {
        background: #2563eb;

        color: white;
    }

    .btn-xml:hover {
        background: #1d4ed8;
    }


    /* =========================================================
       ALERTA
    ========================================================= */

    .alert-success {
        margin-bottom: 15px;

        padding: 10px 13px;

        background: #dcfce7;

        border: 1px solid #bbf7d0;

        border-radius: 6px;

        color: #166534;

        font-size: 12px;
    }


    /* =========================================================
       PANEL
    ========================================================= */

    .panel {
        background: white;

        border: 1px solid #e5e7eb;

        border-radius: 7px;

        overflow: hidden;

        margin-bottom: 16px;
    }

    .panel-header {
        padding: 13px 16px;

        border-bottom: 1px solid #e5e7eb;
    }

    .panel-title {
        font-size: 14px;

        font-weight: 600;

        color: #1f2937;
    }

    .panel-body {
        padding: 16px;
    }


    /* =========================================================
       INFORMACIÓN
    ========================================================= */

    .info-grid {
        display: grid;

        grid-template-columns:
            repeat(4, 1fr);

        gap: 16px;
    }

    .label {
        font-size: 10px;

        color: #9ca3af;

        text-transform: uppercase;
    }

    .value {
        margin-top: 3px;

        font-size: 12px;

        font-weight: 500;

        color: #374151;
    }


    /* =========================================================
       ESTADOS
    ========================================================= */

    .status {
        display: inline-flex;

        padding: 5px 8px;

        border-radius: 4px;

        font-size: 10px;

        font-weight: 600;
    }

    .status-pending {
        background: #fef3c7;

        color: #92400e;
    }

    .status-process {
        background: #dbeafe;

        color: #1e40af;
    }

    .status-paid {
        background: #dcfce7;

        color: #166534;
    }

    .status-cancelled {
        background: #fee2e2;

        color: #991b1b;
    }


    /* =========================================================
       ESTADO DE PAGO
    ========================================================= */

    .payment-box {
        display: flex;

        align-items: center;

        justify-content: space-between;

        gap: 15px;

        padding: 14px 16px;

        background: #fafafa;

        border: 1px solid #e5e7eb;

        border-radius: 6px;
    }

    .payment-info {
        display: flex;

        align-items: center;

        gap: 10px;
    }

    .payment-label {
        font-size: 11px;

        color: #6b7280;
    }

    .payment-select {
        min-width: 160px;

        padding: 7px 9px;

        border: 1px solid #d1d5db;

        border-radius: 5px;

        background: white;

        color: #374151;

        font-size: 11px;

        outline: none;
    }

    .payment-select:focus {
        border-color: #9ca3af;
    }

    .btn-save {
        border: none;

        background: #1f2937;

        color: white;
    }

    .btn-save:hover {
        background: #111827;
    }


    /* =========================================================
       TABLAS
    ========================================================= */

    table {
        width: 100%;

        border-collapse: collapse;

        font-size: 12px;
    }

    th {
        padding: 9px 12px;

        background: #f9fafb;

        border-bottom: 1px solid #e5e7eb;

        color: #6b7280;

        font-size: 10px;

        text-align: left;

        text-transform: uppercase;
    }

    td {
        padding: 10px 12px;

        border-bottom: 1px solid #f0f1f3;

        color: #374151;

        vertical-align: top;
    }

    .money {
        text-align: right;

        white-space: nowrap;
    }

    .total {
        font-weight: 600;

        color: #111827;
    }


    /* =========================================================
       SERVICIOS
    ========================================================= */

    .service-item {
        margin-bottom: 5px;
    }

    .service-item:last-child {
        margin-bottom: 0;
    }

    .service-name {
        font-size: 11px;

        font-weight: 500;

        color: #374151;
    }

    .service-price {
        font-size: 10px;

        color: #6b7280;
    }

    .additional-charge {
        margin-top: 7px;

        padding-top: 7px;

        border-top: 1px solid #e5e7eb;
    }

    .additional-charge-name {
        font-size: 11px;

        font-weight: 500;

        color: #374151;
    }

    .additional-charge-detail {
        margin-top: 2px;

        font-size: 10px;

        color: #6b7280;
    }

    .no-services {
        color: #9ca3af;
    }


    /* =========================================================
       RESUMEN
    ========================================================= */

    .summary {
        display: flex;

        justify-content: flex-end;
    }

    .summary-box {
        width: 300px;
    }

    .summary-row {
        display: flex;

        justify-content: space-between;

        padding: 5px 0;

        font-size: 12px;

        color: #4b5563;

        gap: 20px;
    }

    .summary-row strong {
        white-space: nowrap;
    }

    .summary-total {
        margin-top: 7px;

        padding-top: 9px;

        border-top: 1px solid #d1d5db;

        font-size: 15px;

        font-weight: 600;

        color: #111827;
    }


    /* =========================================================
       RESPONSIVE
    ========================================================= */

    @media(max-width:700px) {

        .header {
            align-items: flex-start;

            flex-direction: column;

            gap: 12px;
        }

        .info-grid {
            grid-template-columns:
                1fr 1fr;
        }

        .sfa-container {
            padding: 18px 14px;
        }

        table {
            font-size: 11px;
        }

        th,
        td {
            padding: 8px;
        }

        .payment-box {
            align-items: flex-start;

            flex-direction: column;
        }

        .payment-info {
            width: 100%;

            align-items: flex-start;

            flex-direction: column;
        }

        .payment-select {
            width: 100%;
        }

    }

    /* =========================================================
   CORREO
========================================================= */

.btn-email {
    background: #059669;
    color: white;
    border: none;
}

.btn-email:hover {
    background: #047857;
}

    /* =========================================================
   MODAL ENVIAR CORREO
========================================================= */

.email-modal {
    position: fixed;

    inset: 0;

    display: none;

    align-items: center;

    justify-content: center;

    padding: 20px;

    background: rgba(15, 23, 42, .45);

    z-index: 9999;
}

.email-modal.active {
    display: flex;
}

.email-modal-box {
    width: 100%;

    max-width: 520px;

    background: white;

    border-radius: 8px;

    border: 1px solid #e5e7eb;

    box-shadow:
        0 20px 50px rgba(0, 0, 0, .15);

    overflow: hidden;
}


/* HEADER */

.email-modal-header {
    display: flex;

    align-items: center;

    justify-content: space-between;

    padding: 16px 18px;

    border-bottom: 1px solid #e5e7eb;
}

.email-modal-title {
    font-size: 15px;

    font-weight: 600;

    color: #1f2937;
}

.email-modal-subtitle {
    margin-top: 3px;

    font-size: 11px;

    color: #6b7280;
}

.email-modal-close {
    width: 30px;

    height: 30px;

    border: none;

    background: transparent;

    color: #6b7280;

    font-size: 22px;

    cursor: pointer;

    border-radius: 5px;
}

.email-modal-close:hover {
    background: #f3f4f6;

    color: #111827;
}


/* BODY */

#sendInvoiceForm {
    padding: 18px;
}

.email-form-group {
    margin-bottom: 18px;
}

.email-label {
    display: block;

    margin-bottom: 7px;

    font-size: 10px;

    font-weight: 600;

    color: #6b7280;

    text-transform: uppercase;
}

.email-input {
    width: 100%;

    padding: 9px 10px;

    border: 1px solid #d1d5db;

    border-radius: 5px;

    background: white;

    color: #374151;

    font-size: 12px;

    outline: none;
}

.email-input:focus {
    border-color: #9ca3af;
}


/* DESTINATARIOS */

.email-recipients {
    display: flex;

    flex-direction: column;

    gap: 6px;

    padding: 10px;

    background: #f9fafb;

    border: 1px solid #e5e7eb;

    border-radius: 6px;

    max-height: 140px;

    overflow-y: auto;
}

.email-recipient {
    display: flex;

    align-items: center;

    gap: 8px;

    padding: 7px 8px;

    background: white;

    border: 1px solid #e5e7eb;

    border-radius: 5px;

    font-size: 11px;

    color: #374151;
}

.email-recipient-icon {
    display: inline-flex;

    align-items: center;

    justify-content: center;

    width: 17px;

    height: 17px;

    border-radius: 50%;

    background: #dcfce7;

    color: #166534;

    font-size: 10px;

    font-weight: 700;
}

.email-no-recipients {
    padding: 8px;

    text-align: center;

    font-size: 11px;

    color: #991b1b;

    background: #fef2f2;

    border: 1px solid #fecaca;

    border-radius: 5px;
}


/* DOCUMENTOS */

.email-documents {
    display: grid;

    grid-template-columns: 1fr 1fr;

    gap: 8px;
}

.email-document {
    display: flex;

    align-items: center;

    gap: 10px;

    padding: 11px;

    border: 1px solid #e5e7eb;

    border-radius: 6px;

    cursor: pointer;

    transition: .15s;
}

.email-document:hover {
    background: #f9fafb;

    border-color: #d1d5db;
}

.email-document input {
    width: 15px;

    height: 15px;

    cursor: pointer;
}

.email-document-name {
    font-size: 12px;

    font-weight: 600;

    color: #374151;
}

.email-document-description {
    margin-top: 2px;

    font-size: 10px;

    color: #9ca3af;
}


/* FOOTER */

.email-modal-footer {
    display: flex;

    justify-content: flex-end;

    gap: 8px;

    padding-top: 4px;
}


@media(max-width:600px) {

    .email-documents {
        grid-template-columns: 1fr;
    }

    .email-modal-box {
        max-width: 100%;
    }

}
}

</style>


<div class="sfa-page">

    <div class="sfa-container">


        {{-- =====================================================
             MENSAJE
        ====================================================== --}}

        @if(session('success'))

            <div class="alert-success">

                {{ session('success') }}

            </div>

        @endif


        {{-- =====================================================
             HEADER
        ====================================================== --}}

        <div class="header">

            <div>

                <div class="title">

                    {{ $invoice->invoice_number }}

                </div>

                <div class="subtitle">

                    {{ __('invoices.detail') }}

                </div>

            </div>


            <div class="actions">

                {{-- VOLVER --}}

                <a
                    href="{{ route('invoices.index') }}"
                    class="btn btn-back"
                >
                    {{ __('invoices.back') }}
                </a>


                {{-- PDF --}}

                <a
                    href="{{ route(
                        'invoices.pdf',
                        $invoice
                    ) }}"
                    target="_blank"
                    class="btn btn-pdf"
                >
                    {{ __('invoices.pdf_button') }}
                </a>


                {{-- XML --}}

                <a
                    href="{{ route(
                        'invoices.xml',
                        $invoice
                    ) }}"
                    class="btn btn-xml"
                >
                    XML
                </a>

                {{-- ENVIAR POR CORREO --}}

                <button
                    type="button"
                    class="btn btn-email"
                    id="openEmailModal"
                >
                    {{ __('invoices.send_email') }}
                </button>

            </div>

        </div>


        {{-- =====================================================
             INFORMACIÓN
        ====================================================== --}}

        <div class="panel">

            <div class="panel-header">

                <div class="panel-title">

                    {{ __('invoices.invoice_information') }}

                </div>

            </div>


            <div class="panel-body">

                <div class="info-grid">


                    {{-- FACTURA --}}

                    <div>

                        <div class="label">
                            {{ __('invoices.invoice') }}
                        </div>

                        <div class="value">

                            {{ $invoice->invoice_number }}

                        </div>

                    </div>


                    {{-- EMPRESA --}}

                    <div>

                        <div class="label">
                            {{ __('invoices.company') }}
                        </div>

                        <div class="value">

                            {{
                                $invoice->company->name
                                ?? __('invoices.no_data')
                            }}

                        </div>

                    </div>


                    {{-- PERIODO --}}

                    <div>

                        <div class="label">
                            {{ __('invoices.period') }}
                        </div>

                        <div class="value">

                            {{
                                $invoice
                                    ->period_start
                                    ?->format(
                                        app()->getLocale() === 'en'
                                            ? 'm/d/Y'
                                            : 'd/m/Y'
                                    )
                            }}

                            -

                            {{
                                $invoice
                                    ->period_end
                                    ?->format(
                                        app()->getLocale() === 'en'
                                            ? 'm/d/Y'
                                            : 'd/m/Y'
                                    )
                            }}

                        </div>

                    </div>


                    {{-- ESTADO --}}

                    <div>

                        <div class="label">
                            {{ __('invoices.status') }}
                        </div>

                        <div class="value">

                            @if(
                                $invoice->status
                                === 'generated'
                            )

                                <span
                                    class="
                                        status
                                        status-process
                                    "
                                >
                                    {{ __('invoices.generated') }}
                                </span>

                            @elseif(
                                $invoice->status
                                === 'paid'
                            )

                                <span
                                    class="
                                        status
                                        status-paid
                                    "
                                >
                                    {{ __('invoices.payment_status.paid') }}
                                </span>

                            @elseif(
                                $invoice->status
                                === 'cancelled'
                            )

                                <span
                                    class="
                                        status
                                        status-cancelled
                                    "
                                >
                                    {{ __('invoices.payment_status.cancelled') }}
                                </span>

                            @else

                                {{ strtoupper(
                                    $invoice->status
                                ) }}

                            @endif

                        </div>

                    </div>


                </div>

            </div>

        </div>


        {{-- =====================================================
             ESTADO DE PAGO
        ====================================================== --}}

        <div class="panel">

            <div class="panel-header">

                <div class="panel-title">

                    {{ __('invoices.payment_status_label') }}

                </div>

            </div>


            <div class="panel-body">


                <form
                    method="POST"
                    action="{{ route(
                        'invoices.payment-status',
                        $invoice
                    ) }}"
                >

                    @csrf


                    <div class="payment-box">


                        <div class="payment-info">

                            <span class="payment-label">
                                {{ __('invoices.current_status') }}:
                            </span>


                            @if(
                                $invoice->payment_status
                                === 'pending'
                            )

                                <span
                                    class="
                                        status
                                        status-pending
                                    "
                                >
                                    {{ __('invoices.payment_status.pending') }}
                                </span>


                            @elseif(
                                $invoice->payment_status
                                === 'in_process'
                            )

                                <span
                                    class="
                                        status
                                        status-process
                                    "
                                >
                                    {{ __('invoices.payment_status.in_process') }}
                                </span>


                            @elseif(
                                $invoice->payment_status
                                === 'paid'
                            )

                                <span
                                    class="
                                        status
                                        status-paid
                                    "
                                >
                                    {{ __('invoices.payment_status.paid') }}
                                </span>


                            @elseif(
                                $invoice->payment_status
                                === 'cancelled'
                            )

                                <span
                                    class="
                                        status
                                        status-cancelled
                                    "
                                >
                                    {{ __('invoices.payment_status.cancelled') }}
                                </span>

                            @endif


                        </div>


                        <select
                            name="payment_status"
                            class="payment-select"
                            required
                        >

                            <option
                                value="pending"
                                {{
                                    $invoice
                                        ->payment_status
                                        === 'pending'
                                        ? 'selected'
                                        : ''
                                }}
                            >
                                {{ __('invoices.payment_status.pending') }}
                            </option>


                            <option
                                value="in_process"
                                {{
                                    $invoice
                                        ->payment_status
                                        === 'in_process'
                                        ? 'selected'
                                        : ''
                                }}
                            >
                                {{ __('invoices.payment_status.in_process') }}
                            </option>


                            <option
                                value="paid"
                                {{
                                    $invoice
                                        ->payment_status
                                        === 'paid'
                                        ? 'selected'
                                        : ''
                                }}
                            >
                                {{ __('invoices.payment_status.paid') }}
                            </option>


                            <option
                                value="cancelled"
                                {{
                                    $invoice
                                        ->payment_status
                                        === 'cancelled'
                                        ? 'selected'
                                        : ''
                                }}
                            >
                                {{ __('invoices.payment_status.cancelled') }}
                            </option>

                        </select>


                        <button
                            type="submit"
                            class="btn btn-save"
                        >
                            {{ __('invoices.save_status') }}
                        </button>


                    </div>

                </form>

            </div>

        </div>


        {{-- =====================================================
             REGISTROS
        ====================================================== --}}

        <div class="panel">

            <div class="panel-header">

                <div class="panel-title">

                    {{ __('invoices.included_records') }}

                </div>

            </div>


            <div style="overflow-x:auto;">

                <table>

                    <thead>

                        <tr>

                            <th>
                                {{ __('invoices.record') }}
                            </th>

                            <th>
                                {{ __('invoices.date') }}
                            </th>

                            <th>
                                {{ __('invoices.invoice_field') }}
                            </th>

                            <th>
                                {{ __('invoices.paps') }}
                            </th>

                            <th>
                                {{ __('invoices.services') }}
                            </th>

                            <th class="money">
                                {{ __('invoices.amount') }}
                            </th>

                        </tr>

                    </thead>


                    <tbody>


                        @forelse(
                            $invoice->records
                            as $record
                        )


                            @php

                                $servicesTotal =
                                    $record
                                        ->services
                                        ->sum(
                                            fn ($service) =>
                                                (float)
                                                $service
                                                    ->subtotal
                                        );


                                $additionalQuantity =
                                    (float) (
                                        $record
                                            ->pivot
                                            ->additional_charge_quantity
                                        ?? 0
                                    );


                                $additionalUnitPrice =
                                    (float) (
                                        $record
                                            ->pivot
                                            ->additional_charge_unit_price
                                        ?? 0
                                    );


                                $additionalAmount =
                                    (float) (
                                        $record
                                            ->pivot
                                            ->additional_charge_amount
                                        ??
                                        (
                                            $additionalQuantity *
                                            $additionalUnitPrice
                                        )
                                    );


                                $recordTotal =
                                    $servicesTotal +
                                    $additionalAmount;


                                $billingInvoice =
                                    $record
                                        ->pivot
                                        ->billing_invoice
                                    ??
                                    $record
                                        ->invoice_number
                                    ??
                                    __('invoices.no_data');


                                $billingPaps =
                                    $record
                                        ->pivot
                                        ->billing_paps
                                    ??
                                    $record
                                        ->paps_number
                                    ??
                                    __('invoices.no_data');


                                $additionalType =
                                    $record
                                        ->pivot
                                        ->additional_charge_type
                                    ??
                                    '';

                            @endphp


                            <tr>


                                <td>

                                    <strong>
                                        #{{ $record->id }}
                                    </strong>

                                </td>


                                <td>

                                    {{
                                        $record
                                            ->date
                                            ?->format(
                                                app()->getLocale() === 'en'
                                                    ? 'm/d/Y'
                                                    : 'd/m/Y'
                                            )
                                    }}

                                </td>


                                <td>

                                    {{ $billingInvoice }}

                                </td>


                                <td>

                                    {{ $billingPaps }}

                                </td>


                                <td>


                                    @forelse(
                                        $record->services
                                        as $service
                                    )

                                        <div
                                            class="service-item"
                                        >

                                            <div
                                                class="
                                                    service-name
                                                "
                                            >

                                                {{
                                                    $service
                                                        ->serviceType
                                                        ->name
                                                    ??
                                                    __('invoices.service')
                                                }}

                                            </div>


                                            <div
                                                class="
                                                    service-price
                                                "
                                            >

                                                $

                                                {{
                                                    number_format(
                                                        (float)
                                                        $service
                                                            ->subtotal,
                                                        2
                                                    )
                                                }}

                                            </div>

                                        </div>

                                    @empty

                                        <span
                                            class="no-services"
                                        >
                                            {{ __('invoices.no_services') }}
                                        </span>

                                    @endforelse


                                    @if(
                                        $additionalAmount > 0
                                    )

                                        <div
                                            class="
                                                additional-charge
                                            "
                                        >

                                            <div
                                                class="
                                                    additional-charge-name
                                                "
                                            >

                                                {{
                                                    $additionalType
                                                    ?:
                                                    __('invoices.additional_charge')
                                                }}

                                            </div>


                                            <div
                                                class="
                                                    additional-charge-detail
                                                "
                                            >

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
                                    colspan="6"
                                    style="
                                        text-align:center;
                                    "
                                >
                                    {{ __('invoices.no_records') }}
                                </td>

                            </tr>

                        @endforelse


                    </tbody>

                </table>

            </div>

        </div>


        {{-- =====================================================
             RESUMEN
        ====================================================== --}}

        <div class="panel">

            <div class="panel-body">

                <div class="summary">

                    <div class="summary-box">


                        {{-- SUBTOTAL --}}

                        <div class="summary-row">

                            <span>
                                {{ __('invoices.subtotal') }}
                            </span>

                            <strong>

                                $

                                {{
                                    number_format(
                                        (float)
                                        $invoice->subtotal,
                                        2
                                    )
                                }}

                            </strong>

                        </div>


                        {{-- SHIPPING --}}

                        <div class="summary-row">

                            <span>

                                {{ __('invoices.shipping_handling') }}

                                {{
                                    number_format(
                                        (float)
                                        (
                                            $invoice
                                                ->shipping_handling_rate
                                            ?? 0
                                        ),
                                        2
                                    )
                                }}%

                            </span>


                            <strong>

                                $

                                {{
                                    number_format(
                                        (float)
                                        (
                                            $invoice
                                                ->shipping_handling_amount
                                            ?? 0
                                        ),
                                        2
                                    )
                                }}

                            </strong>

                        </div>


                        {{-- TAX --}}

                        <div class="summary-row">

                            <span>

                                {{ __('invoices.tax_rate') }}

                                {{
                                    number_format(
                                        (float)
                                        (
                                            $invoice
                                                ->tax_rate
                                            ?? 0
                                        ),
                                        2
                                    )
                                }}%

                            </span>


                            <strong>

                                $

                                {{
                                    number_format(
                                        (float)
                                        (
                                            $invoice
                                                ->tax
                                            ?? 0
                                        ),
                                        2
                                    )
                                }}

                            </strong>

                        </div>


                        {{-- TOTAL --}}

                        <div
                            class="
                                summary-row
                                summary-total
                            "
                        >

                            <span>
                                {{ __('invoices.total') }}
                            </span>

                            <strong>

                                $

                                {{
                                    number_format(
                                        (float)
                                        $invoice->total,
                                        2
                                    )
                                }}

                            </strong>

                        </div>


                    </div>

                </div>

            </div>

        </div>


    </div>

</div>

{{-- =========================================================
     MODAL ENVIAR FACTURA POR CORREO
========================================================= --}}

<div
    id="emailModal"
    class="email-modal"
>

    <div
        class="email-modal-box"
        role="dialog"
        aria-modal="true"
    >

        {{-- HEADER --}}

        <div class="email-modal-header">

            <div>

                <div class="email-modal-title">
                    {{ __('invoices.send_invoice') }}
                </div>

                <div class="email-modal-subtitle">
                    {{ $invoice->invoice_number }}
                </div>

            </div>

            <button
                type="button"
                id="closeEmailModal"
                class="email-modal-close"
            >
                ×
            </button>

        </div>


        {{-- BODY --}}

        <form
            method="POST"
            action="{{ route('invoices.send-email', $invoice) }}"
            id="sendInvoiceForm"
        >

            @csrf


            {{-- ASUNTO --}}

            <div class="email-form-group">

                <label class="email-label">
                    {{ __('invoices.email_subject') }}
                </label>

                <input
                    type="text"
                    name="subject"
                    class="email-input"
                    value="{{ __('invoices.default_email_subject', [
                        'invoice' => $invoice->invoice_number
                    ]) }}"
                    required
                    maxlength="255"
                >

            </div>


            {{-- DESTINATARIOS --}}

            <div class="email-form-group">

                <label class="email-label">
                    {{ __('invoices.recipients') }}
                </label>

                <div class="email-recipients">

                    @forelse(
                        $invoice->company->emails ?? []
                        as $companyEmail
                    )

                        <div class="email-recipient">

                            <span class="email-recipient-icon">
                                ✓
                            </span>

                            <span>
                                {{ $companyEmail->email }}
                            </span>

                        </div>

                    @empty

                        <div class="email-no-recipients">

                            {{ __('invoices.no_company_emails') }}

                        </div>

                    @endforelse

                </div>

            </div>


            {{-- DOCUMENTOS --}}

            <div class="email-form-group">

                <label class="email-label">
                    {{ __('invoices.documents_to_send') }}
                </label>


                <div class="email-documents">


                    {{-- PDF --}}

                    <label class="email-document">

                        <input
                            type="checkbox"
                            name="documents[]"
                            value="pdf"
                            checked
                        >

                        <div>

                            <div class="email-document-name">
                                PDF
                            </div>

                            <div class="email-document-description">
                                {{ __('invoices.pdf_document') }}
                            </div>

                        </div>

                    </label>


                    {{-- XML --}}

                    <label class="email-document">

                        <input
                            type="checkbox"
                            name="documents[]"
                            value="xml"
                            checked
                        >

                        <div>

                            <div class="email-document-name">
                                XML
                            </div>

                            <div class="email-document-description">
                                {{ __('invoices.xml_document') }}
                            </div>

                        </div>

                    </label>


                </div>

            </div>


            {{-- FOOTER --}}

            <div class="email-modal-footer">

                <button
                    type="button"
                    class="btn btn-back"
                    id="cancelEmailModal"
                >
                    {{ __('common.cancel') }}
                </button>

                <button
                    type="submit"
                    class="btn btn-email"
                    id="sendEmailButton"
                >
                    {{ __('invoices.send_email') }}
                </button>

            </div>

        </form>

    </div>

</div>

<script>

document.addEventListener('DOMContentLoaded', function () {

    const emailModal =
        document.getElementById('emailModal');

    const openEmailModal =
        document.getElementById('openEmailModal');

    const closeEmailModal =
        document.getElementById('closeEmailModal');

    const cancelEmailModal =
        document.getElementById('cancelEmailModal');


    function openModal() {

        emailModal.classList.add('active');

        document.body.style.overflow = 'hidden';

    }


    function closeModal() {

        emailModal.classList.remove('active');

        document.body.style.overflow = '';

    }


    if (openEmailModal) {

        openEmailModal.addEventListener(
            'click',
            openModal
        );

    }


    if (closeEmailModal) {

        closeEmailModal.addEventListener(
            'click',
            closeModal
        );

    }


    if (cancelEmailModal) {

        cancelEmailModal.addEventListener(
            'click',
            closeModal
        );

    }


    emailModal.addEventListener(
        'click',
        function (event) {

            if (event.target === emailModal) {

                closeModal();

            }

        }
    );


    document.addEventListener(
        'keydown',
        function (event) {

            if (
                event.key === 'Escape' &&
                emailModal.classList.contains('active')
            ) {

                closeModal();

            }

        }
    );

});

</script>

</x-app-layout>