<x-app-layout>

<style>

    /* =========================================================
       BASE
    ========================================================= */

    .bulk-email-page {
        min-height: calc(100vh - 64px);
        background: #f5f6f8;
    }

    .bulk-email-container {
        max-width: 1100px;
        margin: 0 auto;
        padding: 24px 28px;
    }


    /* =========================================================
       HEADER
    ========================================================= */

    .bulk-email-header {
        margin-bottom: 20px;
    }

    .bulk-email-title {
        margin: 0;

        font-size: 23px;

        font-weight: 600;

        color: #1f2937;
    }

    .bulk-email-subtitle {
        margin-top: 5px;

        font-size: 12px;

        color: #6b7280;
    }


    /* =========================================================
       RESUMEN
    ========================================================= */

    .bulk-summary {
        display: grid;

        grid-template-columns:
            repeat(3, 1fr);

        gap: 10px;

        margin-bottom: 16px;
    }

    .bulk-summary-card {
        background: white;

        border: 1px solid #e5e7eb;

        border-radius: 7px;

        padding: 13px 15px;
    }

    .bulk-summary-label {
        font-size: 10px;

        color: #9ca3af;

        text-transform: uppercase;

        letter-spacing: .04em;

        font-weight: 600;
    }

    .bulk-summary-value {
        margin-top: 4px;

        font-size: 19px;

        font-weight: 600;

        color: #1f2937;
    }


    /* =========================================================
       ESTADO
    ========================================================= */

    .bulk-status {
        display: inline-flex;

        align-items: center;

        padding: 4px 8px;

        border-radius: 4px;

        font-size: 10px;

        font-weight: 600;
    }

    .bulk-status-pending {
        background: #fef3c7;

        color: #92400e;
    }

    .bulk-status-process {
        background: #dbeafe;

        color: #1e40af;
    }

    .bulk-status-paid {
        background: #dcfce7;

        color: #166534;
    }


    /* =========================================================
       COMPAÑÍA
    ========================================================= */

    .company-card {
        background: white;

        border: 1px solid #e5e7eb;

        border-radius: 7px;

        margin-bottom: 14px;

        overflow: hidden;
    }

    .company-header {
        display: flex;

        justify-content: space-between;

        align-items: center;

        gap: 12px;

        padding: 13px 16px;

        background: #f9fafb;

        border-bottom: 1px solid #e5e7eb;
    }

    .company-name {
        font-size: 14px;

        font-weight: 600;

        color: #1f2937;
    }

    .company-invoice-count {
        font-size: 11px;

        color: #6b7280;
    }


    /* =========================================================
       FACTURAS
    ========================================================= */

    .company-invoices {
        padding: 0;
    }

    .invoice-row {
        display: flex;

        align-items: center;

        justify-content: space-between;

        gap: 12px;

        padding: 10px 16px;

        border-bottom: 1px solid #f0f1f3;
    }

    .invoice-row:last-child {
        border-bottom: none;
    }

    .invoice-number {
        font-size: 12px;

        font-weight: 600;

        color: #1f2937;
    }

    .invoice-total {
        font-size: 11px;

        color: #6b7280;
    }


    /* =========================================================
       CORREOS
    ========================================================= */

    .recipients-section {
        padding: 14px 16px;

        border-top: 1px solid #e5e7eb;

        background: #fcfcfd;
    }

    .section-label {
        display: block;

        margin-bottom: 8px;

        font-size: 10px;

        font-weight: 600;

        color: #6b7280;

        text-transform: uppercase;

        letter-spacing: .04em;
    }

    .recipient-list {
        display: flex;

        flex-direction: column;

        gap: 6px;

        margin-bottom: 10px;
    }

    .recipient-item {
        display: flex;

        align-items: center;

        gap: 8px;

        min-height: 32px;

        padding: 5px 8px;

        background: white;

        border: 1px solid #e5e7eb;

        border-radius: 5px;
    }

    .recipient-item input[type="checkbox"] {
        width: 14px;

        height: 14px;

        cursor: pointer;

        accent-color: #1f2937;
    }

    .recipient-email {
        flex: 1;

        min-width: 0;

        font-size: 11px;

        color: #374151;

        overflow: hidden;

        text-overflow: ellipsis;

        white-space: nowrap;
    }

    .remove-recipient {
        padding: 3px 6px;

        border: 1px solid #e5e7eb;

        border-radius: 4px;

        background: white;

        color: #6b7280;

        font-size: 10px;

        cursor: pointer;
    }

    .remove-recipient:hover {
        background: #f9fafb;

        color: #111827;
    }


    /* =========================================================
       AGREGAR CORREO
    ========================================================= */

    .add-recipient {
        display: flex;

        align-items: center;

        gap: 7px;
    }

    .add-recipient input {
        flex: 1;

        min-width: 0;

        padding: 7px 9px;

        border: 1px solid #d1d5db;

        border-radius: 5px;

        background: white;

        color: #374151;

        font-size: 11px;

        outline: none;
    }

    .add-recipient input:focus {
        border-color: #9ca3af;
    }

    .add-recipient button {
        padding: 7px 10px;

        border: 1px solid #1f2937;

        border-radius: 5px;

        background: #1f2937;

        color: white;

        font-size: 10px;

        cursor: pointer;
    }

    .add-recipient button:hover {
        background: #111827;
    }

    .no-recipients {
        margin-bottom: 10px;

        font-size: 11px;

        color: #9ca3af;
    }


    /* =========================================================
       DOCUMENTOS
    ========================================================= */

    .documents-card {
        background: white;

        border: 1px solid #e5e7eb;

        border-radius: 7px;

        padding: 15px 16px;

        margin-top: 16px;
    }

    .documents-title {
        margin-bottom: 10px;

        font-size: 12px;

        font-weight: 600;

        color: #1f2937;
    }

    .document-options {
        display: flex;

        align-items: center;

        gap: 16px;

        flex-wrap: wrap;
    }

    .document-option {
        display: inline-flex;

        align-items: center;

        gap: 6px;

        font-size: 11px;

        color: #374151;

        cursor: pointer;
    }

    .document-option input {
        width: 14px;

        height: 14px;

        cursor: pointer;

        accent-color: #1f2937;
    }


    /* =========================================================
       MENSAJE AUTOMÁTICO
    ========================================================= */

    .automatic-message {
        margin-top: 16px;

        padding: 12px 14px;

        background: #f9fafb;

        border: 1px solid #e5e7eb;

        border-radius: 6px;
    }

    .automatic-message-label {
        font-size: 10px;

        font-weight: 600;

        color: #9ca3af;

        text-transform: uppercase;

        letter-spacing: .04em;
    }

    .automatic-message-text {
        margin-top: 5px;

        font-size: 11px;

        color: #4b5563;

        line-height: 1.5;
    }


    /* =========================================================
       ACCIONES
    ========================================================= */

    .bulk-actions {
        display: flex;

        justify-content: flex-end;

        align-items: center;

        gap: 8px;

        margin-top: 18px;
    }

    .btn-secondary {
        display: inline-flex;

        align-items: center;

        justify-content: center;

        padding: 8px 12px;

        border: 1px solid #e5e7eb;

        border-radius: 5px;

        background: white;

        color: #4b5563;

        font-size: 11px;

        text-decoration: none;

        cursor: pointer;
    }

    .btn-secondary:hover {
        background: #f9fafb;

        color: #111827;
    }

    .btn-send {
        display: inline-flex;

        align-items: center;

        justify-content: center;

        padding: 8px 13px;

        border: 1px solid #1f2937;

        border-radius: 5px;

        background: #1f2937;

        color: white;

        font-size: 11px;

        cursor: pointer;
    }

    .btn-send:hover {
        background: #111827;
    }


    /* =========================================================
       RESPONSIVE
    ========================================================= */

    @media (max-width: 700px) {

        .bulk-email-container {
            padding: 16px;
        }

        .bulk-summary {
            grid-template-columns: 1fr;
        }

        .company-header {
            align-items: flex-start;

            flex-direction: column;

            gap: 4px;
        }

        .invoice-row {
            align-items: flex-start;

            flex-direction: column;

            gap: 4px;
        }

        .add-recipient {
            align-items: stretch;

            flex-direction: column;
        }

        .bulk-actions {
            align-items: stretch;

            flex-direction: column;
        }

        .btn-secondary,
        .btn-send {
            width: 100%;
        }

    }

</style>


<div class="bulk-email-page">

    <div class="bulk-email-container">


        {{-- =====================================================
             ENCABEZADO
        ====================================================== --}}

        <div class="bulk-email-header">

            <h1 class="bulk-email-title">
                Envío masivo de facturas
            </h1>

            <p class="bulk-email-subtitle">

                Las facturas se enviarán agrupadas por compañía.
                Se generará un solo correo por cada compañía.

            </p>

        </div>


        {{-- =====================================================
             RESUMEN
        ====================================================== --}}

        @php

            $companyCount =
                $invoices
                    ->groupBy('company_id')
                    ->count();

            $invoiceCount =
                $invoices->count();

        @endphp


        <div class="bulk-summary">

            <div class="bulk-summary-card">

                <div class="bulk-summary-label">
                    Compañías
                </div>

                <div class="bulk-summary-value">
                    {{ $companyCount }}
                </div>

            </div>


            <div class="bulk-summary-card">

                <div class="bulk-summary-label">
                    Facturas
                </div>

                <div class="bulk-summary-value">
                    {{ $invoiceCount }}
                </div>

            </div>


            <div class="bulk-summary-card">

                <div class="bulk-summary-label">
                    Estado del envío
                </div>

                <div class="bulk-summary-value">

                    @if($paymentStatus === 'pending')

                        <span class="bulk-status bulk-status-pending">
                            {{ __('invoices.payment_status.pending') }}
                        </span>

                    @elseif($paymentStatus === 'in_process')

                        <span class="bulk-status bulk-status-process">
                            {{ __('invoices.payment_status.in_process') }}
                        </span>

                    @elseif($paymentStatus === 'paid')

                        <span class="bulk-status bulk-status-paid">
                            {{ __('invoices.payment_status.paid') }}
                        </span>

                    @endif

                </div>

            </div>

        </div>


        {{-- =====================================================
             FORMULARIO
        ====================================================== --}}

        <form
            method="POST"
            action="{{ route('invoices.bulk-email.send') }}"
            id="bulkEmailSendForm"
        >

            @csrf


            {{-- ESTADO --}}

            <input
                type="hidden"
                name="payment_status"
                value="{{ $paymentStatus }}"
            >


            {{-- =================================================
                 DOCUMENTOS
            ================================================== --}}

            <div class="documents-card">

                <div class="documents-title">
                    Documentos a enviar
                </div>


                <div class="document-options">

                    <label class="document-option">

                        <input
                            type="checkbox"
                            name="documents[]"
                            value="pdf"
                            checked
                        >

                        PDF

                    </label>


                    <label class="document-option">

                        <input
                            type="checkbox"
                            name="documents[]"
                            value="xml"
                            checked
                        >

                        XML

                    </label>

                </div>

            </div>


            {{-- =================================================
                 COMPAÑÍAS
            ================================================== --}}

            @foreach(
                $invoices->groupBy('company_id')
                as $companyId => $companyInvoices
            )

                @php

                    $company =
                        $companyInvoices->first()->company;

                @endphp


                <div
                    class="company-card"
                    data-company-id="{{ $companyId }}"
                >


                    {{-- HEADER --}}

                    <div class="company-header">

                        <div>

                            <div class="company-name">

                                {{
                                    $company?->name
                                    ?? 'Compañía sin nombre'
                                }}

                            </div>

                            <div class="company-invoice-count">

                                {{ $companyInvoices->count() }}
                                factura(s) seleccionada(s)

                            </div>

                        </div>


                        <span class="bulk-status">

                            @if($paymentStatus === 'pending')

                                <span class="bulk-status-pending">
                                    {{ __('invoices.payment_status.pending') }}
                                </span>

                            @elseif($paymentStatus === 'in_process')

                                <span class="bulk-status-process">
                                    {{ __('invoices.payment_status.in_process') }}
                                </span>

                            @elseif($paymentStatus === 'paid')

                                <span class="bulk-status-paid">
                                    {{ __('invoices.payment_status.paid') }}
                                </span>

                            @endif

                        </span>

                    </div>


                    {{-- FACTURAS --}}

                    <div class="company-invoices">

                        @foreach($companyInvoices as $invoice)

                            <div class="invoice-row">

                                <div>

                                    <div class="invoice-number">

                                        Factura
                                        {{ $invoice->invoice_number }}

                                    </div>

                                    <div class="invoice-total">

                                        Total:
                                        $
                                        {{
                                            number_format(
                                                $invoice->total,
                                                2
                                            )
                                        }}

                                    </div>

                                </div>

                            </div>


                            {{-- ID FACTURA --}}

                            <input
                                type="hidden"
                                name="invoice_ids[]"
                                value="{{ $invoice->id }}"
                            >

                        @endforeach

                    </div>


                    {{-- =================================================
                         DESTINATARIOS
                    ================================================== --}}

                    <div class="recipients-section">

                        <span class="section-label">
                            Destinatarios
                        </span>


                        <div
                            class="recipient-list"
                            data-company-id="{{ $companyId }}"
                        >

                            @php

                                $companyEmails =
                                    $company?->emails ?? [];

                            @endphp


                            @forelse(
                                $companyEmails
                                as $email
                            )

                                <div class="recipient-item">

                                    <input
                                        type="checkbox"
                                        name="recipients[{{ $companyId }}][]"
                                        value="{{ $email->email }}"
                                        checked
                                    >

                                    <span class="recipient-email">
                                        {{ $email->email }}
                                    </span>

                                    <button
                                        type="button"
                                        class="remove-recipient"
                                    >
                                        Quitar
                                    </button>

                                </div>

                            @empty

                                <div class="no-recipients">
                                    Esta compañía no tiene correos registrados.
                                </div>

                            @endforelse

                        </div>


                        {{-- AGREGAR CORREO --}}

                        <div class="add-recipient">

                            <input
                                type="email"
                                class="new-recipient-email"
                                data-company-id="{{ $companyId }}"
                                placeholder="Agregar correo temporal"
                            >

                            <button
                                type="button"
                                class="add-recipient-button"
                                data-company-id="{{ $companyId }}"
                            >
                                + Agregar
                            </button>

                        </div>

                    </div>

                </div>

            @endforeach


            {{-- =================================================
                 MENSAJE AUTOMÁTICO
            ================================================== --}}

            <div class="automatic-message">

                <div class="automatic-message-label">
                    Mensaje automático
                </div>


                <div class="automatic-message-text">

                    @if($paymentStatus === 'pending')

                        El correo indicará que el pago correspondiente
                        a las facturas seleccionadas se encuentra pendiente.

                    @elseif($paymentStatus === 'in_process')

                        El correo indicará que el pago correspondiente
                        a las facturas seleccionadas se encuentra en proceso.

                    @elseif($paymentStatus === 'paid')

                        El correo indicará que el pago correspondiente
                        a las facturas seleccionadas ha sido recibido correctamente.

                    @endif

                </div>

            </div>


            {{-- =================================================
                 ACCIONES
            ================================================== --}}

            <div class="bulk-actions">

                <a
                    href="{{ route(
                        'invoices.index',
                        ['payment_status' => $paymentStatus]
                    ) }}"
                    class="btn-secondary"
                >
                    ← Regresar
                </a>


                <button
                    type="submit"
                    class="btn-send"
                    id="sendBulkEmailButton"
                >
                    📧 Enviar correos
                </button>

            </div>

        </form>

    </div>

</div>


<script>

document.addEventListener(
    'DOMContentLoaded',
    function () {

        const form =
            document.getElementById(
                'bulkEmailSendForm'
            );


        if (!form) {
            return;
        }


        /*
        |--------------------------------------------------------------------------
        | QUITAR DESTINATARIO
        |--------------------------------------------------------------------------
        */

        document
            .querySelectorAll(
                '.remove-recipient'
            )
            .forEach(
                function (button) {

                    button.addEventListener(
                        'click',
                        function () {

                            const item =
                                button.closest(
                                    '.recipient-item'
                                );


                            if (item) {

                                item.remove();

                            }

                        }
                    );

                }
            );


        /*
        |--------------------------------------------------------------------------
        | AGREGAR DESTINATARIO TEMPORAL
        |--------------------------------------------------------------------------
        */

        document
            .querySelectorAll(
                '.add-recipient-button'
            )
            .forEach(
                function (button) {

                    button.addEventListener(
                        'click',
                        function () {

                            const companyId =
                                button.dataset.companyId;


                            const input =
                                document.querySelector(
                                    '.new-recipient-email[data-company-id="' +
                                    companyId +
                                    '"]'
                                );


                            if (!input) {
                                return;
                            }


                            const email =
                                input.value
                                    .trim()
                                    .toLowerCase();


                            if (!email) {

                                alert(
                                    'Escribe un correo electrónico.'
                                );

                                return;

                            }


                            /*
                            |--------------------------------------------------------------------------
                            | VALIDACIÓN BÁSICA
                            |--------------------------------------------------------------------------
                            */

                            const emailPattern =
                                /^[^\s@]+@[^\s@]+\.[^\s@]+$/;


                            if (
                                !emailPattern.test(
                                    email
                                )
                            ) {

                                alert(
                                    'Escribe un correo electrónico válido.'
                                );

                                return;

                            }


                            /*
                            |--------------------------------------------------------------------------
                            | EVITAR DUPLICADOS EN ESTA COMPAÑÍA
                            |--------------------------------------------------------------------------
                            */

                            const existing =
                                Array.from(
                                    document.querySelectorAll(
                                        '.recipient-list[data-company-id="' +
                                        companyId +
                                        '"] input[type="checkbox"]'
                                    )
                                )
                                .map(
                                    function (checkbox) {

                                        return checkbox.value
                                            .trim()
                                            .toLowerCase();

                                    }
                                );


                            if (
                                existing.includes(
                                    email
                                )
                            ) {

                                alert(
                                    'Ese correo ya está agregado.'
                                );

                                return;

                            }


                            /*
                            |--------------------------------------------------------------------------
                            | CREAR DESTINATARIO
                            |--------------------------------------------------------------------------
                            */

                            const list =
                                document.querySelector(
                                    '.recipient-list[data-company-id="' +
                                    companyId +
                                    '"]'
                                );


                            if (!list) {
                                return;
                            }


                            const noRecipients =
                                list.querySelector(
                                    '.no-recipients'
                                );


                            if (noRecipients) {

                                noRecipients.remove();

                            }


                            const item =
                                document.createElement(
                                    'div'
                                );


                            item.className =
                                'recipient-item';


                            item.innerHTML = `

                                <input
                                    type="checkbox"
                                    name="recipients[${companyId}][]"
                                    value="${email}"
                                    checked
                                >

                                <span class="recipient-email">
                                    ${email}
                                </span>

                                <button
                                    type="button"
                                    class="remove-recipient"
                                >
                                    Quitar
                                </button>

                            `;


                            list.appendChild(
                                item
                            );


                            const removeButton =
                                item.querySelector(
                                    '.remove-recipient'
                                );


                            removeButton.addEventListener(
                                'click',
                                function () {

                                    item.remove();

                                }
                            );


                            input.value = '';

                        }
                    );

                }
            );


        /*
        |--------------------------------------------------------------------------
        | VALIDAR ENVÍO
        |--------------------------------------------------------------------------
        */

        form.addEventListener(
            'submit',
            function (event) {

                const documents =
                    form.querySelectorAll(
                        'input[name="documents[]"]:checked'
                    );


                if (
                    documents.length === 0
                ) {

                    event.preventDefault();

                    alert(
                        'Selecciona al menos un documento: PDF o XML.'
                    );

                    return;

                }


                const companies =
                    form.querySelectorAll(
                        '.company-card'
                    );


                for (
                    const company
                    of companies
                ) {

                    const recipients =
                        company.querySelectorAll(
                            'input[type="checkbox"][name^="recipients["]:checked'
                        );


                    if (
                        recipients.length === 0
                    ) {

                        event.preventDefault();

                        const companyName =
                            company.querySelector(
                                '.company-name'
                            )?.textContent.trim()
                            ?? 'esta compañía';


                        alert(
                            'La compañía "' +
                            companyName +
                            '" no tiene ningún destinatario seleccionado.'
                        );

                        return;

                    }

                }


                const status =
                    @json($paymentStatus);


                let message =
                    '';


                if (
                    status === 'pending'
                ) {

                    message =
                        '¿Deseas enviar las facturas seleccionadas como pago pendiente?';

                } else if (
                    status === 'in_process'
                ) {

                    message =
                        '¿Deseas enviar las facturas seleccionadas como pago en proceso?';

                } else if (
                    status === 'paid'
                ) {

                    message =
                        '¿Deseas enviar las facturas seleccionadas como pago recibido?';

                }


                if (
                    message &&
                    !confirm(message)
                ) {

                    event.preventDefault();

                }

            }
        );

    }
);

</script>

</x-app-layout>