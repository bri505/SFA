<x-app-layout>

<style>

/* =========================================================
   SFA - DETALLE DE FACTURA
========================================================= */

.sfa-page {
    min-height: calc(100vh - 64px);
    background: #f5f6f8;
}

.sfa-container {
    max-width: 1250px;
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
    gap: 15px;
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
    border: 1px solid transparent;
    font-size: 11px;
    text-decoration: none;
    cursor: pointer;
}

.btn-back {
    background: white;
    border-color: #d1d5db;
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

.btn-xml {
    background: #2563eb;
    color: white;
}

.btn-xml:hover {
    background: #1d4ed8;
}

.btn-email {
    background: #059669;
    color: white;
}

.btn-email:hover {
    background: #047857;
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
    background: #ffffff;
}

.panel-title {
    font-size: 14px;
    font-weight: 600;
    color: #1f2937;
}

.panel-subtitle {
    margin-top: 3px;
    font-size: 10px;
    color: #9ca3af;
}

.panel-body {
    padding: 16px;
}


/* =========================================================
   INFORMACIÓN
========================================================= */

.info-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 18px;
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

.value-secondary {
    margin-top: 2px;
    font-size: 10px;
    color: #9ca3af;
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
   PAYMENT
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


/* =========================================================
   CANCELACIÓN
========================================================= */

.cancellation-box {
    margin-top: 12px;
    padding: 12px 14px;
    background: #fef2f2;
    border: 1px solid #fecaca;
    border-radius: 6px;
}

.cancellation-title {
    font-size: 10px;
    font-weight: 700;
    color: #991b1b;
    text-transform: uppercase;
}

.cancellation-text {
    margin-top: 5px;
    font-size: 12px;
    line-height: 1.5;
    color: #7f1d1d;
}

.cancellation-reason {
    display: none;
    width: 100%;
    margin-top: 12px;
}

.cancellation-reason.active {
    display: block;
}

.cancellation-reason-label {
    display: block;
    margin-bottom: 6px;
    font-size: 10px;
    font-weight: 600;
    color: #6b7280;
    text-transform: uppercase;
}

.cancellation-reason textarea {
    width: 100%;
    min-height: 90px;
    padding: 9px 10px;
    border: 1px solid #d1d5db;
    border-radius: 5px;
    background: white;
    color: #374151;
    font-size: 12px;
    resize: vertical;
    outline: none;
}

.cancellation-reason textarea:focus {
    border-color: #9ca3af;
}


/* =========================================================
   TABLA
========================================================= */

.table-wrapper {
    overflow-x: auto;
}

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
    white-space: nowrap;
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
   REGISTRO
========================================================= */

.record-id {
    font-weight: 600;
    color: #111827;
}

.record-detail {
    margin-top: 3px;
    font-size: 10px;
    color: #9ca3af;
}


/* =========================================================
   CANTIDAD
========================================================= */

.quantity-box {
    display: inline-flex;
    flex-direction: column;
    gap: 2px;
}

.quantity-number {
    font-size: 12px;
    font-weight: 600;
    color: #374151;
}

.quantity-type {
    font-size: 10px;
    color: #6b7280;
}


/* =========================================================
   SERVICIOS
========================================================= */

.service-item {
    margin-bottom: 10px;
    padding-bottom: 9px;
    border-bottom: 1px solid #f0f1f3;
}

.service-item:last-child {
    margin-bottom: 0;
    padding-bottom: 0;
    border-bottom: none;
}

.service-name {
    font-size: 11px;
    font-weight: 600;
    color: #374151;
}

.service-line {
    display: flex;
    justify-content: space-between;
    gap: 15px;
    margin-top: 3px;
    font-size: 10px;
    color: #6b7280;
}

.service-line strong {
    white-space: nowrap;
}

.service-base {
    color: #6b7280;
}

.service-tax {
    color: #92400e;
}

.service-total {
    color: #111827;
    font-weight: 600;
}

.additional-charge {
    margin-top: 9px;
    padding-top: 9px;
    border-top: 1px dashed #d1d5db;
}

.additional-charge-name {
    font-size: 11px;
    font-weight: 600;
    color: #374151;
}

.additional-charge-detail {
    margin-top: 3px;
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
    width: 390px;
}

.summary-row {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    padding: 6px 0;
    font-size: 12px;
    color: #4b5563;
    gap: 20px;
}

.summary-row strong {
    white-space: nowrap;
}

.summary-description {
    display: flex;
    flex-direction: column;
    gap: 2px;
}

.summary-rate {
    font-size: 10px;
    color: #9ca3af;
}

.summary-service-tax {
    color: #92400e;
}

.summary-sales-tax {
    color: #7f1d1d;
}

.summary-total {
    margin-top: 7px;
    padding-top: 10px;
    border-top: 1px solid #d1d5db;
    font-size: 16px;
    font-weight: 600;
    color: #111827;
}


/* =========================================================
   TOTALES POR REGISTRO
========================================================= */

.record-summary {
    margin-top: 7px;
    padding-top: 7px;
    border-top: 1px solid #f0f1f3;
}

.record-summary-row {
    display: flex;
    justify-content: space-between;
    gap: 10px;
    font-size: 10px;
    color: #6b7280;
    padding: 2px 0;
}

.record-summary-row strong {
    white-space: nowrap;
}

.record-summary-total {
    color: #111827;
    font-weight: 600;
}


/* =========================================================
   CORREO
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
    max-height: 90vh;
    background: white;
    border-radius: 8px;
    border: 1px solid #e5e7eb;
    box-shadow: 0 20px 50px rgba(0, 0, 0, .15);
    overflow: hidden;
}

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

#sendInvoiceForm {
    padding: 18px;
    max-height: calc(90vh - 75px);
    overflow-y: auto;
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


/* =========================================================
   DESTINATARIOS
========================================================= */

.email-recipients {
    display: flex;
    flex-direction: column;
    gap: 6px;
    padding: 10px;
    background: #f9fafb;
    border: 1px solid #e5e7eb;
    border-radius: 6px;
    max-height: 180px;
    overflow-y: auto;
}

.email-recipient {
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 8px;
    background: white;
    border: 1px solid #e5e7eb;
    border-radius: 5px;
    font-size: 11px;
    color: #374151;
    cursor: pointer;
    transition: background .15s, border-color .15s;
}

.email-recipient:hover {
    background: #f9fafb;
    border-color: #d1d5db;
}

.email-recipient input {
    width: 15px;
    height: 15px;
    cursor: pointer;
    flex-shrink: 0;
}

.email-recipient-text {
    flex: 1;
    min-width: 0;
    word-break: break-word;
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
    flex-shrink: 0;
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


/* =========================================================
   AGREGAR CORREO
========================================================= */

.email-add-row {
    display: flex;
    gap: 7px;
    align-items: stretch;
}

.email-add-row .email-input {
    flex: 1;
}

.email-add-button {
    flex-shrink: 0;
    padding: 9px 12px;
    border: 1px solid #d1d5db;
    border-radius: 5px;
    background: #f9fafb;
    color: #374151;
    font-size: 11px;
    font-weight: 600;
    cursor: pointer;
}

.email-add-button:hover {
    background: #f3f4f6;
    border-color: #9ca3af;
}

.email-added-list {
    display: flex;
    flex-direction: column;
    gap: 6px;
    margin-top: 8px;
}

.email-added-recipient {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 8px;
    padding: 7px 9px;
    background: #eff6ff;
    border: 1px solid #bfdbfe;
    border-radius: 5px;
    font-size: 11px;
    color: #1e3a8a;
}

.email-added-recipient span {
    min-width: 0;
    word-break: break-word;
}

.email-remove-button {
    flex-shrink: 0;
    width: 24px;
    height: 24px;
    border: none;
    border-radius: 4px;
    background: transparent;
    color: #6b7280;
    cursor: pointer;
    font-size: 16px;
    line-height: 1;
}

.email-remove-button:hover {
    background: #dbeafe;
    color: #1e40af;
}

.email-recipient-help {
    margin-top: 6px;
    font-size: 10px;
    color: #9ca3af;
}


/* =========================================================
   DOCUMENTOS
========================================================= */

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


/* =========================================================
   FOOTER MODAL
========================================================= */

.email-modal-footer {
    display: flex;
    justify-content: flex-end;
    gap: 8px;
    padding-top: 4px;
}


/* =========================================================
   RESPONSIVE
========================================================= */

@media(max-width:900px) {

    .info-grid {
        grid-template-columns: repeat(2, 1fr);
    }

}

@media(max-width:700px) {

    .sfa-container {
        padding: 18px 14px;
    }

    .header {
        align-items: flex-start;
        flex-direction: column;
    }

    .info-grid {
        grid-template-columns: 1fr 1fr;
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

    .summary {
        justify-content: stretch;
    }

    .summary-box {
        width: 100%;
    }

    .email-add-row {
        flex-direction: column;
    }

    .email-add-button {
        width: 100%;
    }

}

@media(max-width:500px) {

    .info-grid {
        grid-template-columns: 1fr;
    }

    .email-documents {
        grid-template-columns: 1fr;
    }

}

</style>


<div class="sfa-page">

<div class="sfa-container">


{{-- =========================================================
    MENSAJE
========================================================= --}}

@if(session('success'))

    <div class="alert-success">

        {{ session('success') }}

    </div>

@endif


{{-- =========================================================
    HEADER
========================================================= --}}

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

        <a
            href="{{ route('invoices.index') }}"
            class="btn btn-back"
        >
            {{ __('invoices.back') }}
        </a>


        <a
            href="{{ route('invoices.pdf', $invoice) }}"
            target="_blank"
            class="btn btn-pdf"
        >
            {{ __('invoices.pdf_button') }}
        </a>


        <a
            href="{{ route('invoices.xml', $invoice) }}"
            class="btn btn-xml"
        >
            XML
        </a>


        <button
            type="button"
            class="btn btn-email"
            id="openEmailModal"
        >
            {{ __('invoices.send_email') }}
        </button>

    </div>

</div>


{{-- =========================================================
    INFORMACIÓN DE FACTURA
========================================================= --}}

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


            {{-- BROKER --}}

            <div>

                <div class="label">
                    Broker
                </div>

                <div class="value">

                    {{
                        $invoice->broker->name
                        ?? __('invoices.no_data')
                    }}

                </div>

            </div>


            {{-- CONSIGNEE --}}

            <div>

                <div class="label">
                    Consignee
                </div>

                <div class="value">

                    {{
                        $invoice->consignee->name
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

            </div>


            {{-- FECHA GENERACIÓN --}}

            <div>

                <div class="label">
                    Fecha de generación
                </div>

                <div class="value">

                    {{
                        $invoice->generated_at
                            ?->format(
                                app()->getLocale() === 'en'
                                    ? 'm/d/Y'
                                    : 'd/m/Y'
                            )
                        ?? __('invoices.no_data')
                    }}

                </div>

            </div>


            {{-- GENERADA POR --}}

            <div>

                <div class="label">
                    Generada por
                </div>

                <div class="value">

                    {{
                        $invoice->generatedBy->name
                        ?? __('invoices.no_data')
                    }}

                </div>

            </div>


            {{-- ESTADO --}}

            <div>

                <div class="label">
                    {{ __('invoices.status') }}
                </div>

                <div class="value">

                    @if($invoice->status === 'generated')

                        <span class="status status-process">
                            {{ __('invoices.generated') }}
                        </span>

                    @elseif($invoice->status === 'paid')

                        <span class="status status-paid">
                            {{ __('invoices.payment_status.paid') }}
                        </span>

                    @elseif($invoice->status === 'cancelled')

                        <span class="status status-cancelled">
                            {{ __('invoices.payment_status.cancelled') }}
                        </span>

                    @else

                        {{ strtoupper($invoice->status) }}

                    @endif

                </div>

            </div>

        </div>

    </div>

</div>


{{-- =========================================================
    ESTADO DE PAGO
========================================================= --}}

<div class="panel">

    <div class="panel-header">

        <div class="panel-title">
            {{ __('invoices.payment_status_label') }}
        </div>

    </div>


    <div class="panel-body">

        <form
            method="POST"
            action="{{ route('invoices.payment-status', $invoice) }}"
            id="paymentStatusForm"
        >

            @csrf


            <div class="payment-box">


                <div class="payment-info">

                    <span class="payment-label">
                        {{ __('invoices.current_status') }}:
                    </span>


                    @if($invoice->payment_status === 'pending')

                        <span class="status status-pending">
                            {{ __('invoices.payment_status.pending') }}
                        </span>

                    @elseif($invoice->payment_status === 'in_process')

                        <span class="status status-process">
                            {{ __('invoices.payment_status.in_process') }}
                        </span>

                    @elseif($invoice->payment_status === 'paid')

                        <span class="status status-paid">
                            {{ __('invoices.payment_status.paid') }}
                        </span>

                    @elseif($invoice->payment_status === 'cancelled')

                        <span class="status status-cancelled">
                            {{ __('invoices.payment_status.cancelled') }}
                        </span>

                    @endif

                </div>


                <select
                    name="payment_status"
                    id="paymentStatus"
                    class="payment-select"
                    required
                >

                    <option
                        value="pending"
                        {{ $invoice->payment_status === 'pending' ? 'selected' : '' }}
                    >
                        {{ __('invoices.payment_status.pending') }}
                    </option>

                    <option
                        value="in_process"
                        {{ $invoice->payment_status === 'in_process' ? 'selected' : '' }}
                    >
                        {{ __('invoices.payment_status.in_process') }}
                    </option>

                    <option
                        value="paid"
                        {{ $invoice->payment_status === 'paid' ? 'selected' : '' }}
                    >
                        {{ __('invoices.payment_status.paid') }}
                    </option>

                    <option
                        value="cancelled"
                        {{ $invoice->payment_status === 'cancelled' ? 'selected' : '' }}
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


            {{-- MOTIVO ACTUAL --}}

            @if(
                $invoice->payment_status === 'cancelled'
                && $invoice->cancellation_reason
            )

                <div class="cancellation-box">

                    <div class="cancellation-title">
                        Motivo de cancelación
                    </div>

                    <div class="cancellation-text">
                        {{ $invoice->cancellation_reason }}
                    </div>

                </div>

            @endif


            {{-- NUEVO MOTIVO --}}

            <div
                id="cancellationReason"
                class="cancellation-reason
                    {{ $invoice->payment_status === 'cancelled'
                        ? 'active'
                        : ''
                    }}"
            >

                <label
                    for="cancellationReasonInput"
                    class="cancellation-reason-label"
                >
                    Motivo de cancelación *
                </label>


                <textarea
                    name="cancellation_reason"
                    id="cancellationReasonInput"
                    placeholder="Escriba el motivo por el cual se cancela esta factura..."
                    maxlength="2000"
                    {{ $invoice->payment_status === 'cancelled'
                        ? 'required'
                        : ''
                    }}
                >{{ $invoice->cancellation_reason }}</textarea>

            </div>

        </form>

    </div>

</div>


{{-- =========================================================
    REGISTROS
========================================================= --}}

<div class="panel">

    <div class="panel-header">

        <div class="panel-title">
            {{ __('invoices.included_records') }}
        </div>

        <div class="panel-subtitle">
            Servicios, cargos adicionales y cantidades
        </div>

    </div>


    <div class="table-wrapper">

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
                        Cantidad
                    </th>

                    <th>
                        {{ __('invoices.services') }}
                    </th>

                    <th class="money">
                        Importe
                    </th>

                </tr>

            </thead>


            <tbody>

            @forelse($invoice->records as $record)

                @php

                    $servicesBaseTotal = 0;

                    $servicesGrandTotal = 0;

                @endphp


                @foreach($record->services as $service)

                    @php

                        $serviceBase =
                            round(
                                (float) $service->subtotal,
                                2
                            );


                        $serviceTotal =
                            $serviceBase;


                        $servicesBaseTotal +=
                            $serviceBase;


                        $servicesGrandTotal +=
                            $serviceTotal;

                    @endphp

                @endforeach


                @php

                    /*
                    |--------------------------------------------------------------------------
                    | CARGO ADICIONAL
                    |--------------------------------------------------------------------------
                    */

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
                        round(
                            $servicesGrandTotal +
                            $additionalAmount,
                            2
                        );


                    /*
                    |--------------------------------------------------------------------------
                    | FACTURA / PAPS
                    |--------------------------------------------------------------------------
                    */

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


                    /*
                    |--------------------------------------------------------------------------
                    | CANTIDAD
                    |--------------------------------------------------------------------------
                    */

                    $quantity =
                        $record
                            ->pivot
                            ->quantity
                        ??
                        $record
                            ->quantity
                        ??
                        null;


                    $quantityType =
                        $record
                            ->pivot
                            ->quantity_type
                        ??
                        $record
                            ->quantity_type
                        ??
                        null;


                    $quantityTypeLabel =
                        match($quantityType) {

                            'palets' =>
                                'Pallets',

                            'contenedores' =>
                                'Contenedores',

                            'piezas' =>
                                'Piezas',

                            default =>
                                $quantityType
                                ?: __('invoices.no_data'),

                        };


                    /*
                    |--------------------------------------------------------------------------
                    | TIPO DE CARGO ADICIONAL
                    |--------------------------------------------------------------------------
                    */

                    $additionalType =
                        $record
                            ->pivot
                            ->additional_charge_type
                        ??
                        '';

                @endphp


                <tr>


                    {{-- ID --}}

                    <td>

                        <div class="record-id">
                            #{{ $record->id }}
                        </div>

                    </td>


                    {{-- FECHA --}}

                    <td>

                        {{
                            $record->date
                                ?->format(
                                    app()->getLocale() === 'en'
                                        ? 'm/d/Y'
                                        : 'd/m/Y'
                                )
                        }}

                    </td>


                    {{-- FACTURA --}}

                    <td>
                        {{ $billingInvoice }}
                    </td>


                    {{-- PAPS --}}

                    <td>
                        {{ $billingPaps }}
                    </td>


                    {{-- CANTIDAD --}}

                    <td>

                        @if($quantity !== null)

                            <div class="quantity-box">

                                <span class="quantity-number">

                                    {{
                                        number_format(
                                            (float) $quantity,
                                            2
                                        )
                                    }}

                                </span>

                                <span class="quantity-type">

                                    {{ $quantityTypeLabel }}

                                </span>

                            </div>

                        @else

                            <span class="no-services">
                                {{ __('invoices.no_data') }}
                            </span>

                        @endif

                    </td>


                    {{-- SERVICIOS --}}

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


                                /*
                                |--------------------------------------------------------------------------
                                | SIN IVA DE SERVICIOS
                                |--------------------------------------------------------------------------
                                */

                                $serviceTotal =
                                    $serviceBase;

                            @endphp


                            <div class="service-item">


                                {{-- NOMBRE --}}

                                <div class="service-name">

                                    {{
                                        $service
                                            ->serviceType
                                            ->name
                                        ??
                                        __('invoices.service')
                                    }}

                                </div>


                                {{-- TOTAL SERVICIO --}}

                                <div class="service-line">

                                    <span class="service-total">
                                        Total servicio
                                    </span>

                                    <strong class="service-total">

                                        $

                                        {{
                                            number_format(
                                                $serviceTotal,
                                                2
                                            )
                                        }}

                                    </strong>

                                </div>


                            </div>


                        @empty

                            <span class="no-services">
                                {{ __('invoices.no_services') }}
                            </span>

                        @endforelse


                        {{-- CARGO ADICIONAL --}}

                        @if($additionalAmount > 0)

                            <div class="additional-charge">

                                <div class="additional-charge-name">

                                    {{
                                        $additionalType
                                        ?:
                                        __('invoices.additional_charge')
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

                                    =

                                    <strong>

                                        $

                                        {{
                                            number_format(
                                                $additionalAmount,
                                                2
                                            )
                                        }}

                                    </strong>

                                </div>

                            </div>

                        @endif


                        {{-- RESUMEN DEL REGISTRO --}}

                        <div class="record-summary">

                            <div class="record-summary-row">

                                <span>
                                    Servicios
                                </span>

                                <strong>
                                    $
                                    {{
                                        number_format(
                                            $servicesBaseTotal,
                                            2
                                        )
                                    }}
                                </strong>

                            </div>


                            {{-- CARGO ADICIONAL --}}

                            @if($additionalAmount > 0)

                                <div class="record-summary-row">

                                    <span>
                                        Cargo adicional
                                    </span>

                                    <strong>
                                        $
                                        {{
                                            number_format(
                                                $additionalAmount,
                                                2
                                            )
                                        }}
                                    </strong>

                                </div>

                            @endif


                            {{-- TOTAL REGISTRO --}}

                            <div
                                class="
                                    record-summary-row
                                    record-summary-total
                                "
                            >

                                <span>
                                    Total registro
                                </span>

                                <strong>

                                    $

                                    {{
                                        number_format(
                                            $recordTotal,
                                            2
                                        )
                                    }}

                                </strong>

                            </div>

                        </div>

                    </td>


                    {{-- IMPORTE --}}

                    <td class="money">

                        <div class="total">

                            $

                            {{
                                number_format(
                                    $recordTotal,
                                    2
                                )
                            }}

                        </div>

                    </td>


                </tr>


            @empty

                <tr>

                    <td
                        colspan="7"
                        style="text-align:center;"
                    >
                        {{ __('invoices.no_records') }}
                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>


{{-- =========================================================
    RESUMEN FINANCIERO COMPLETO
========================================================= --}}

<div class="panel">

    <div class="panel-header">

        <div class="panel-title">
            Resumen financiero
        </div>

        <div class="panel-subtitle">
            Desglose completo de cargos e impuestos
        </div>

    </div>


    <div class="panel-body">

        <div class="summary">

            <div class="summary-box">


                {{-- SUBTOTAL --}}

                <div class="summary-row">

                    <div class="summary-description">

                        <span>
                            {{ __('invoices.subtotal') }}
                        </span>

                        <span class="summary-rate">
                            Servicios + cargos adicionales antes de impuestos
                        </span>

                    </div>

                    <strong>

                        $

                        {{
                            number_format(
                                (float) $invoice->subtotal,
                                2
                            )
                        }}

                    </strong>

                </div>


                {{-- SHIPPING / HANDLING --}}

                <div class="summary-row">

                    <div class="summary-description">

                        <span>
                            {{ __('invoices.shipping_handling') }}
                        </span>

                        <span class="summary-rate">

                            {{
                                number_format(
                                    (float) (
                                        $invoice
                                            ->shipping_handling_rate
                                        ?? 0
                                    ),
                                    2
                                )
                            }}%

                        </span>

                    </div>


                    <strong>

                        $

                        {{
                            number_format(
                                (float) (
                                    $invoice
                                        ->shipping_handling_amount
                                    ?? 0
                                ),
                                2
                            )
                        }}

                    </strong>

                </div>


                {{-- SALES TAX --}}

                <div class="summary-row">

                    <div class="summary-description">

                        <span class="summary-sales-tax">
                            Sales Tax
                        </span>

                        <span class="summary-rate">

                            {{
                                number_format(
                                    (float) (
                                        $invoice->tax_rate
                                        ?? 0
                                    ),
                                    2
                                )
                            }}%

                        </span>

                    </div>


                    <strong class="summary-sales-tax">

                        $

                        {{
                            number_format(
                                (float) (
                                    $invoice->tax
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
    MODAL ENVIAR CORREO
========================================================= --}}

<div
    id="emailModal"
    class="email-modal"
>

    <div
        class="email-modal-box"
        role="dialog"
        aria-modal="true"
        aria-labelledby="emailModalTitle"
    >


        {{-- HEADER --}}

        <div class="email-modal-header">

            <div>

                <div
                    class="email-modal-title"
                    id="emailModalTitle"
                >
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
                aria-label="Cerrar"
            >
                ×
            </button>

        </div>


        {{-- FORMULARIO --}}

        <form
            method="POST"
            action="{{ route(
                'invoices.send-email',
                $invoice
            ) }}"
            id="sendInvoiceForm"
        >

            @csrf


            {{-- =================================================
                 ASUNTO
            ================================================== --}}

            <div class="email-form-group">

                <label
                    for="emailSubject"
                    class="email-label"
                >

                    {{ __('invoices.email_subject') }}

                </label>


                <input
                    type="text"
                    name="subject"
                    id="emailSubject"
                    class="email-input"
                    value="{{ __('invoices.default_email_subject', [
                        'invoice' => $invoice->invoice_number
                    ]) }}"
                    required
                    maxlength="255"
                >

            </div>


            {{-- =================================================
                 DESTINATARIOS GUARDADOS
            ================================================== --}}

            <div class="email-form-group">

                <label class="email-label">

                    {{ __('invoices.recipients') }}

                </label>


                <div class="email-recipients">

                    @forelse(
                        $invoice->company->emails ?? []
                        as $companyEmail
                    )

                        <label
                            class="email-recipient"
                            for="companyEmail{{ $companyEmail->id }}"
                        >

                            <input
                                type="checkbox"
                                name="recipients[]"
                                value="{{ $companyEmail->email }}"
                                id="companyEmail{{ $companyEmail->id }}"
                                class="company-email-checkbox"
                                checked
                            >

                            <span class="email-recipient-icon">
                                ✓
                            </span>

                            <span class="email-recipient-text">
                                {{ $companyEmail->email }}
                            </span>

                        </label>

                    @empty

                        <div class="email-no-recipients">

                            {{ __('invoices.no_company_emails') }}

                        </div>

                    @endforelse

                </div>

            </div>


            {{-- =================================================
                 AGREGAR CORREOS TEMPORALES
            ================================================== --}}

            <div class="email-form-group">

                <label
                    for="additionalEmailInput"
                    class="email-label"
                >

                    Agregar otro correo

                </label>


                <div class="email-add-row">

                    <input
                        type="email"
                        id="additionalEmailInput"
                        class="email-input"
                        placeholder="correo@ejemplo.com"
                        maxlength="255"
                        autocomplete="email"
                    >


                    <button
                        type="button"
                        id="addAdditionalEmail"
                        class="email-add-button"
                    >
                        + Agregar
                    </button>

                </div>


                <div
                    id="additionalEmailList"
                    class="email-added-list"
                ></div>


                <div class="email-recipient-help">

                    Los correos agregados aquí solo se utilizarán
                    para este envío y no modificarán los correos
                    guardados de la compañía.

                </div>

            </div>


            {{-- =================================================
                 DOCUMENTOS
            ================================================== --}}

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


            {{-- =================================================
                 FOOTER
            ================================================== --}}

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

document.addEventListener(
    'DOMContentLoaded',
    function () {


        /* =====================================================
           PAYMENT STATUS
        ===================================================== */

        const paymentStatus =
            document.getElementById(
                'paymentStatus'
            );


        const cancellationReason =
            document.getElementById(
                'cancellationReason'
            );


        const cancellationReasonInput =
            document.getElementById(
                'cancellationReasonInput'
            );


        function updateCancellationReason() {

            if (
                !paymentStatus ||
                !cancellationReason ||
                !cancellationReasonInput
            ) {

                return;

            }


            const isCancelled =
                paymentStatus.value ===
                'cancelled';


            if (isCancelled) {

                cancellationReason
                    .classList
                    .add('active');


                cancellationReasonInput.required =
                    true;

            } else {

                cancellationReason
                    .classList
                    .remove('active');


                cancellationReasonInput.required =
                    false;

            }

        }


        if (paymentStatus) {

            paymentStatus.addEventListener(
                'change',
                updateCancellationReason
            );


            updateCancellationReason();

        }


        /* =====================================================
           EMAIL MODAL
        ===================================================== */

        const emailModal =
            document.getElementById(
                'emailModal'
            );


        const openEmailModal =
            document.getElementById(
                'openEmailModal'
            );


        const closeEmailModal =
            document.getElementById(
                'closeEmailModal'
            );


        const cancelEmailModal =
            document.getElementById(
                'cancelEmailModal'
            );


        function openModal() {

            if (!emailModal) {
                return;
            }


            emailModal
                .classList
                .add('active');


            document.body.style.overflow =
                'hidden';

        }


        function closeModal() {

            if (!emailModal) {
                return;
            }


            emailModal
                .classList
                .remove('active');


            document.body.style.overflow =
                '';

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


        if (emailModal) {

            emailModal.addEventListener(
                'click',
                function (event) {

                    if (
                        event.target ===
                        emailModal
                    ) {

                        closeModal();

                    }

                }
            );

        }


        document.addEventListener(
            'keydown',
            function (event) {

                if (
                    event.key === 'Escape' &&
                    emailModal &&
                    emailModal.classList.contains(
                        'active'
                    )
                ) {

                    closeModal();

                }

            }
        );


        /* =====================================================
           CORREOS ADICIONALES TEMPORALES
        ===================================================== */

        const additionalEmailInput =
            document.getElementById(
                'additionalEmailInput'
            );


        const addAdditionalEmail =
            document.getElementById(
                'addAdditionalEmail'
            );


        const additionalEmailList =
            document.getElementById(
                'additionalEmailList'
            );


        const sendInvoiceForm =
            document.getElementById(
                'sendInvoiceForm'
            );


        /*
         * Guarda únicamente los correos agregados
         * temporalmente para este envío.
         */
        const additionalEmails = [];


        function normalizeEmail(email) {

            return String(email || '')
                .trim()
                .toLowerCase();

        }


        function getSelectedEmails() {

            const selected = [];


            document
                .querySelectorAll(
                    '.company-email-checkbox:checked'
                )
                .forEach(function (checkbox) {

                    const email =
                        normalizeEmail(
                            checkbox.value
                        );


                    if (
                        email &&
                        !selected.includes(email)
                    ) {

                        selected.push(email);

                    }

                });


            additionalEmails.forEach(
                function (email) {

                    const normalized =
                        normalizeEmail(email);


                    if (
                        normalized &&
                        !selected.includes(normalized)
                    ) {

                        selected.push(normalized);

                    }

                }
            );


            return selected;

        }


        function emailExists(email) {

            const normalized =
                normalizeEmail(email);


            if (!normalized) {
                return false;
            }


            const companyEmailExists =
                Array.from(
                    document.querySelectorAll(
                        '.company-email-checkbox'
                    )
                ).some(
                    function (checkbox) {

                        return normalizeEmail(
                            checkbox.value
                        ) === normalized;

                    }
                );


            const additionalEmailExists =
                additionalEmails.some(
                    function (existingEmail) {

                        return normalizeEmail(
                            existingEmail
                        ) === normalized;

                    }
                );


            return (
                companyEmailExists ||
                additionalEmailExists
            );

        }


        function renderAdditionalEmails() {

            if (!additionalEmailList) {
                return;
            }


            additionalEmailList.innerHTML = '';


            additionalEmails.forEach(
                function (email, index) {

                    const item =
                        document.createElement(
                            'div'
                        );


                    item.className =
                        'email-added-recipient';


                    const emailText =
                        document.createElement(
                            'span'
                        );


                    emailText.textContent =
                        email;


                    const removeButton =
                        document.createElement(
                            'button'
                        );


                    removeButton.type =
                        'button';


                    removeButton.className =
                        'email-remove-button';


                    removeButton.setAttribute(
                        'aria-label',
                        'Eliminar correo'
                    );


                    removeButton.textContent =
                        '×';


                    removeButton.addEventListener(
                        'click',
                        function () {

                            additionalEmails
                                .splice(
                                    index,
                                    1
                                );


                            renderAdditionalEmails();

                        }
                    );


                    item.appendChild(
                        emailText
                    );


                    item.appendChild(
                        removeButton
                    );


                    additionalEmailList
                        .appendChild(item);

                }
            );

        }


        function addEmail() {

            if (
                !additionalEmailInput
            ) {

                return;

            }


            const email =
                normalizeEmail(
                    additionalEmailInput.value
                );


            if (!email) {

                additionalEmailInput.focus();

                return;

            }


            /*
             * Valida formato de correo.
             */
            const emailPattern =
                /^[^\s@]+@[^\s@]+\.[^\s@]+$/;


            if (!emailPattern.test(email)) {

                alert(
                    'Escriba un correo electrónico válido.'
                );


                additionalEmailInput.focus();

                return;

            }


            if (emailExists(email)) {

                alert(
                    'Ese correo ya está agregado.'
                );


                additionalEmailInput.focus();

                return;

            }


            additionalEmails.push(email);


            additionalEmailInput.value =
                '';


            renderAdditionalEmails();


            additionalEmailInput.focus();

        }


        if (addAdditionalEmail) {

            addAdditionalEmail.addEventListener(
                'click',
                addEmail
            );

        }


        if (additionalEmailInput) {

            additionalEmailInput.addEventListener(
                'keydown',
                function (event) {

                    if (
                        event.key ===
                        'Enter'
                    ) {

                        event.preventDefault();

                        addEmail();

                    }

                }
            );

        }


        /* =====================================================
           VALIDACIÓN DE DESTINATARIOS
        ===================================================== */

        if (sendInvoiceForm) {

            sendInvoiceForm.addEventListener(
                'submit',
                function (event) {

                    /*
                     * Los correos adicionales se agregan
                     * como inputs hidden al momento del envío.
                     *
                     * Así permanecen temporales y no modifican
                     * la información de la compañía.
                     */

                    sendInvoiceForm
                        .querySelectorAll(
                            '.temporary-email-input'
                        )
                        .forEach(
                            function (input) {

                                input.remove();

                            }
                        );


                    additionalEmails.forEach(
                        function (email) {

                            const input =
                                document.createElement(
                                    'input'
                                );


                            input.type =
                                'hidden';


                            input.name =
                                'recipients[]';


                            input.value =
                                email;


                            input.className =
                                'temporary-email-input';


                            sendInvoiceForm
                                .appendChild(
                                    input
                                );

                        }
                    );


                    const selectedEmails =
                        getSelectedEmails();


                    if (
                        selectedEmails.length ===
                        0
                    ) {

                        event.preventDefault();


                        alert(
                            'Seleccione al menos un correo electrónico al cual enviar la factura.'
                        );


                        return;

                    }


                    /*
                     * Evita doble envío.
                     */

                    const sendButton =
                        document.getElementById(
                            'sendEmailButton'
                        );


                    if (sendButton) {

                        sendButton.disabled =
                            true;


                        sendButton.textContent =
                            'Enviando...';

                    }

                }
            );

        }

    }
);

</script>

</x-app-layout>