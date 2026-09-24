<x-app-layout>
<style>

    /* =========================================================
       BASE
    ========================================================= */

    .sfa-page {
        min-height: calc(100vh - 64px);
        background: #f5f6f8;
    }

    .sfa-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 24px 28px;
    }


    /* =========================================================
       HEADER
    ========================================================= */

    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    .page-title {
        margin: 0;
        font-size: 23px;
        font-weight: 600;
        color: #1f2937;
    }

    .page-subtitle {
        margin-top: 4px;
        font-size: 12px;
        color: #6b7280;
    }


    /* =========================================================
       BOTONES
    ========================================================= */

    .btn-primary {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 7px;

        padding: 9px 14px;

        border: none;
        border-radius: 6px;

        background: #1f2937;
        color: white;

        font-size: 12px;
        text-decoration: none;

        cursor: pointer;

        transition:
            background .15s ease,
            transform .1s ease;
    }

    .btn-primary:hover {
        background: #111827;
    }

    .btn-primary:active {
        transform: translateY(1px);
    }


    /* =========================================================
       RESUMEN
    ========================================================= */

    .summary-grid {
        display: grid;

        grid-template-columns:
            repeat(4, 1fr);

        gap: 10px;

        margin-bottom: 12px;
    }

    .summary-card {
        background: white;

        border: 1px solid #e5e7eb;

        border-radius: 7px;

        padding: 14px 15px;
    }

    .summary-label {
        font-size: 10px;

        text-transform: uppercase;

        letter-spacing: .04em;

        color: #9ca3af;

        font-weight: 600;
    }

    .summary-number {
        margin-top: 5px;

        font-size: 22px;

        font-weight: 600;

        color: #1f2937;
    }

    .summary-amount {
        margin-top: 2px;

        font-size: 11px;

        color: #6b7280;
    }

    .summary-pending {
        border-left: 3px solid #f59e0b;
    }

    .summary-process {
        border-left: 3px solid #3b82f6;
    }

    .summary-paid {
        border-left: 3px solid #22c55e;
    }

    .summary-cancelled {
        border-left: 3px solid #ef4444;
    }


    /* =========================================================
       FINANZAS
    ========================================================= */

    .financial-grid {
        display: grid;

        grid-template-columns:
            repeat(3, 1fr);

        gap: 10px;

        margin-bottom: 18px;
    }

    .financial-card {
        background: white;

        border: 1px solid #e5e7eb;

        border-radius: 7px;

        padding: 13px 15px;
    }

    .financial-label {
        font-size: 10px;

        color: #9ca3af;

        text-transform: uppercase;

        letter-spacing: .04em;
    }

    .financial-value {
        margin-top: 4px;

        font-size: 18px;

        font-weight: 600;

        color: #1f2937;
    }


    /* =========================================================
       FILTROS
    ========================================================= */

    .filters {
        display: flex;

        align-items: center;

        gap: 6px;

        margin-bottom: 12px;

        flex-wrap: wrap;
    }

    .filter-btn {
        display: inline-flex;

        align-items: center;

        padding: 6px 10px;

        border-radius: 5px;

        border: 1px solid #e5e7eb;

        background: white;

        color: #6b7280;

        font-size: 11px;

        text-decoration: none;

        transition:
            background .15s ease,
            color .15s ease,
            border-color .15s ease;
    }

    .filter-btn:hover {
        background: #f9fafb;

        color: #111827;
    }

    .filter-btn.active {
        background: #1f2937;

        border-color: #1f2937;

        color: white;
    }


    /* =========================================================
       BARRA DE ENVÍO MASIVO
    ========================================================= */

    .bulk-toolbar {
        display: flex;

        align-items: center;

        justify-content: space-between;

        gap: 10px;

        margin-bottom: 12px;

        padding: 10px 12px;

        background: white;

        border: 1px solid #e5e7eb;

        border-radius: 7px;
    }

    .bulk-info {
        font-size: 11px;

        color: #6b7280;
    }

    .bulk-info strong {
        color: #1f2937;
    }

    .bulk-email-button {
        display: inline-flex;

        align-items: center;

        justify-content: center;

        gap: 6px;

        padding: 7px 11px;

        border: 1px solid #1f2937;

        border-radius: 5px;

        background: #1f2937;

        color: white;

        font-size: 11px;

        cursor: pointer;

        transition:
            background .15s ease,
            opacity .15s ease;
    }

    .bulk-email-button:hover:not(:disabled) {
        background: #111827;
    }

    .bulk-email-button:disabled {
        opacity: .45;

        cursor: not-allowed;
    }


    /* =========================================================
       CHECKBOX
    ========================================================= */

    .invoice-checkbox,
    .select-all-checkbox {
        width: 15px;

        height: 15px;

        cursor: pointer;

        accent-color: #1f2937;
    }

    .checkbox-cell {
        width: 42px;

        text-align: center !important;
    }


    /* =========================================================
       TABLA
    ========================================================= */

    .records-section {
        background: white;

        border: 1px solid #e5e7eb;

        border-radius: 7px;

        overflow: hidden;
    }

    .records-header {
        padding: 12px 16px;

        border-bottom: 1px solid #e5e7eb;

        font-size: 14px;

        font-weight: 600;

        color: #1f2937;
    }

    .records-table-wrapper {
        width: 100%;

        overflow-x: auto;
    }

    .records-table {
        width: 100%;

        min-width: 1100px;

        border-collapse: collapse;

        font-size: 12px;
    }

    .records-table th {
        padding: 9px 14px;

        background: #f9fafb;

        border-bottom: 1px solid #e5e7eb;

        color: #6b7280;

        font-size: 10px;

        font-weight: 600;

        text-transform: uppercase;

        letter-spacing: .04em;

        text-align: left;

        white-space: nowrap;
    }

    .records-table td {
        padding: 10px 14px;

        border-bottom: 1px solid #f0f1f3;

        color: #374151;

        white-space: nowrap;

        vertical-align: middle;
    }

    .records-table tbody tr:last-child td {
        border-bottom: none;
    }

    .records-table tbody tr:hover {
        background: #fafafa;
    }


    /* =========================================================
       FACTURA
    ========================================================= */

    .invoice-link {
        color: #1f2937;

        font-weight: 600;

        text-decoration: none;
    }

    .invoice-link:hover {
        text-decoration: underline;
    }


    /* =========================================================
       TOTAL
    ========================================================= */

    .total {
        font-weight: 600;

        color: #111827;
    }


    /* =========================================================
       ESTADOS
    ========================================================= */

    .status {
        display: inline-flex;

        align-items: center;

        padding: 4px 8px;

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
       ACCIONES
    ========================================================= */

    .actions {
        display: flex;

        align-items: center;

        gap: 6px;
    }

    .btn-action {
        display: inline-flex;

        align-items: center;

        justify-content: center;

        padding: 5px 8px;

        border: 1px solid #e5e7eb;

        border-radius: 5px;

        background: white;

        color: #4b5563;

        font-size: 11px;

        text-decoration: none;

        cursor: pointer;
    }

    .btn-action:hover {
        background: #f9fafb;

        color: #111827;
    }


    /* =========================================================
       EMPTY
    ========================================================= */

    .empty {
        padding: 40px;

        text-align: center;

        color: #9ca3af;

        font-size: 12px;
    }


    /* =========================================================
       MODAL COMPROBANTE
    ========================================================= */

    .payment-proof-modal {
        display: none;

        position: fixed;

        inset: 0;

        z-index: 9999;

        background: rgba(0, 0, 0, .55);

        align-items: center;

        justify-content: center;

        padding: 20px;
    }

    .payment-proof-modal-content {
        width: 100%;

        max-width: 600px;

        max-height: 90vh;

        overflow-y: auto;

        background: #ffffff;

        border-radius: 12px;

        padding: 24px;

        box-shadow:
            0 10px 40px
            rgba(0, 0, .25);
    }

    .payment-proof-header {
        display: flex;

        align-items: center;

        justify-content: space-between;

        gap: 15px;

        margin-bottom: 20px;
    }

    .payment-proof-title {
        margin: 0;

        font-size: 20px;

        font-weight: 700;

        color: #1f2937;
    }

    .payment-proof-invoice-label {
        margin: 5px 0 0;

        color: #666;

        font-size: 14px;
    }

    .payment-proof-close {
        border: none;

        background: transparent;

        font-size: 24px;

        cursor: pointer;

        line-height: 1;

        color: #4b5563;
    }

    .payment-proof-section {
        margin-bottom: 20px;
    }

    .payment-proof-label {
        display: block;

        margin-bottom: 8px;

        font-weight: 600;

        color: #1f2937;

        font-size: 13px;
    }

    .payment-proof-current {
        display: block;

        border: 1px solid #ddd;

        border-radius: 8px;

        padding: 10px;

        background: #f8f8f8;
    }

    .payment-proof-current img {
        display: block;

        width: 100%;

        max-height: 300px;

        object-fit: contain;

        border-radius: 6px;

        background: #ffffff;
    }


    /* =========================================================
       VISTA PREVIA DE NUEVA FOTO
    ========================================================= */

    .payment-proof-preview {
        display: none;

        margin-top: 12px;

        border: 1px solid #ddd;

        border-radius: 8px;

        padding: 10px;

        background: #f8f8f8;
    }

    .payment-proof-preview img {
        display: block;

        width: 100%;

        max-height: 300px;

        object-fit: contain;

        border-radius: 6px;

        background: #ffffff;
    }


    /* =========================================================
       INPUTS DE ARCHIVO
    ========================================================= */

    .payment-proof-camera-input,
    .payment-proof-file-input,
    .payment-proof-hidden-input {
        display: none;
    }


    /* =========================================================
       OPCIONES DE FOTO
    ========================================================= */

    .payment-proof-options {
        display: flex;

        gap: 10px;

        flex-wrap: wrap;
    }

    .payment-proof-selected-file {
        margin-top: 10px;

        color: #555;

        font-size: 14px;
    }

    .payment-proof-help {
        display: block;

        margin-top: 6px;

        color: #777;

        font-size: 11px;
    }

    .payment-proof-textarea {
        width: 100%;

        padding: 10px;

        border: 1px solid #ccc;

        border-radius: 6px;

        resize: vertical;

        box-sizing: border-box;

        font-family: inherit;

        font-size: 13px;
    }

    .payment-proof-actions {
        display: flex;

        justify-content: flex-end;

        gap: 10px;

        flex-wrap: wrap;
    }


    /* =========================================================
       RESPONSIVE
    ========================================================= */

    @media (max-width: 900px) {

        .summary-grid {
            grid-template-columns:
                repeat(2, 1fr);
        }

        .financial-grid {
            grid-template-columns:
                1fr;
        }

    }


    @media (max-width: 700px) {

        .sfa-container {
            padding: 16px;
        }

        .page-header {
            align-items: flex-start;

            gap: 12px;
        }

        .page-title {
            font-size: 20px;
        }

        .summary-grid {
            grid-template-columns:
                1fr 1fr;
        }

        .btn-primary {
            padding: 8px 11px;
        }

        .bulk-toolbar {
            align-items: flex-start;

            flex-direction: column;
        }

        .payment-proof-modal {
            padding: 12px;
        }

        .payment-proof-modal-content {
            padding: 18px;
        }

    }

</style>


<div class="sfa-page">

    <div class="sfa-container">


        {{-- =====================================================
             ENCABEZADO
        ====================================================== --}}

        <div class="page-header">

            <div>

                <h1 class="page-title">
                    {{ __('invoices.title') }}
                </h1>

                <p class="page-subtitle">
                    {{ __('invoices.subtitle') }}
                </p>

            </div>


            <a
                href="{{ route('invoices.create') }}"
                class="btn-primary"
            >
                + {{ __('invoices.new_invoice') }}
            </a>

        </div>


        {{-- =====================================================
             RESUMEN DE ESTADOS
        ====================================================== --}}

        <div class="summary-grid">


            <div class="summary-card summary-pending">

                <div class="summary-label">
                    {{ __('invoices.payment_status.pending') }}
                </div>

                <div class="summary-number">
                    {{ $pendingCount }}
                </div>

            </div>


            <div class="summary-card summary-process">

                <div class="summary-label">
                    {{ __('invoices.payment_status.in_process') }}
                </div>

                <div class="summary-number">
                    {{ $inProcessCount }}
                </div>

            </div>


            <div class="summary-card summary-paid">

                <div class="summary-label">
                    {{ __('invoices.payment_status.paid') }}
                </div>

                <div class="summary-number">
                    {{ $paidCount }}
                </div>

            </div>


            <div class="summary-card summary-cancelled">

                <div class="summary-label">
                    {{ __('invoices.payment_status.cancelled') }}
                </div>

                <div class="summary-number">
                    {{ $cancelledCount }}
                </div>

            </div>

        </div>


        {{-- =====================================================
             RESUMEN FINANCIERO
        ====================================================== --}}

        <div class="financial-grid">


            <div class="financial-card">

                <div class="financial-label">
                    {{ __('invoices.financial.pending_collection') }}
                </div>

                <div class="financial-value">

                    $

                    {{ number_format(
                        $pendingAmount,
                        2
                    ) }}

                </div>

            </div>


            <div class="financial-card">

                <div class="financial-label">
                    {{ __('invoices.financial.total_collected') }}
                </div>

                <div class="financial-value">

                    $

                    {{ number_format(
                        $paidAmount,
                        2
                    ) }}

                </div>

            </div>


            <div class="financial-card">

                <div class="financial-label">
                    {{ __('invoices.financial.total_invoiced') }}
                </div>

                <div class="financial-value">

                    $

                    {{ number_format(
                        $totalAmount,
                        2
                    ) }}

                </div>

            </div>

        </div>


        {{-- =====================================================
             FILTROS
        ====================================================== --}}

        <div class="filters">


            <a
                href="{{ route('invoices.index') }}"
                class="
                    filter-btn
                    {{ !$paymentStatus ? 'active' : '' }}
                "
            >
                {{ __('invoices.filters.all') }}
            </a>


            <a
                href="{{ route(
                    'invoices.index',
                    ['payment_status' => 'pending']
                ) }}"
                class="
                    filter-btn
                    {{
                        $paymentStatus === 'pending'
                            ? 'active'
                            : ''
                    }}
                "
            >
                {{ __('invoices.payment_status.pending') }}
            </a>


            <a
                href="{{ route(
                    'invoices.index',
                    ['payment_status' => 'in_process']
                ) }}"
                class="
                    filter-btn
                    {{
                        $paymentStatus === 'in_process'
                            ? 'active'
                            : ''
                    }}
                "
            >
                {{ __('invoices.payment_status.in_process') }}
            </a>


            <a
                href="{{ route(
                    'invoices.index',
                    ['payment_status' => 'paid']
                ) }}"
                class="
                    filter-btn
                    {{
                        $paymentStatus === 'paid'
                            ? 'active'
                            : ''
                    }}
                "
            >
                {{ __('invoices.payment_status.paid') }}
            </a>


            <a
                href="{{ route(
                    'invoices.index',
                    ['payment_status' => 'cancelled']
                ) }}"
                class="
                    filter-btn
                    {{
                        $paymentStatus === 'cancelled'
                            ? 'active'
                            : ''
                    }}
                "
            >
                {{ __('invoices.payment_status.cancelled') }}
            </a>

        </div>


        {{-- =====================================================
             ENVÍO MASIVO
        ====================================================== --}}

        @if(
            in_array(
                $paymentStatus,
                [
                    'pending',
                    'in_process',
                    'paid',
                ],
                true
            )
        )

            <form
                method="POST"
                action="{{ route('invoices.bulk-email') }}"
                id="bulkInvoicesForm"
            >

                @csrf

                <input
                    type="hidden"
                    name="payment_status"
                    value="{{ $paymentStatus }}"
                >


                <div class="bulk-toolbar">

                    <div class="bulk-info">

                        <strong id="selectedInvoicesCount">
                            0
                        </strong>

                        factura(s) seleccionada(s)

                        @if($paymentStatus === 'pending')

                            · Se enviará como

                            <strong>
                                {{ __('invoices.payment_status.pending') }}
                            </strong>

                        @elseif($paymentStatus === 'in_process')

                            · Se enviará como

                            <strong>
                                {{ __('invoices.payment_status.in_process') }}
                            </strong>

                        @elseif($paymentStatus === 'paid')

                            · Se enviará como

                            <strong>
                                {{ __('invoices.payment_status.paid') }}
                            </strong>

                        @endif

                    </div>


                    <button
                        type="submit"
                        id="bulkEmailButton"
                        class="bulk-email-button"
                        disabled
                    >
                        📧
                        {{ __('invoices.send_email') }}
                    </button>

                </div>

            </form>

        @endif


        {{-- =====================================================
             TABLA
        ====================================================== --}}

        <div class="records-section">


            <div class="records-header">

                {{ __('invoices.table.title') }}

            </div>


            <div class="records-table-wrapper">

                <table class="records-table">


                    <thead>

                        <tr>


                            @if(
                                in_array(
                                    $paymentStatus,
                                    [
                                        'pending',
                                        'in_process',
                                        'paid',
                                    ],
                                    true
                                )
                            )

                                <th class="checkbox-cell">

                                    <input
                                        type="checkbox"
                                        id="selectAllInvoices"
                                        class="select-all-checkbox"
                                        title="{{ __('invoices.table.actions') }}"
                                    >

                                </th>

                            @endif


                            <th>
                                {{ __('invoices.table.invoice') }}
                            </th>

                            <th>
                                {{ __('invoices.table.company') }}
                            </th>

                            <th>
                                {{ __('invoices.table.period') }}
                            </th>

                            <th>
                                {{ __('invoices.table.subtotal') }}
                            </th>

                            <th>
                                {{ __('invoices.table.tax') }}
                            </th>

                            <th>
                                {{ __('invoices.table.total') }}
                            </th>

                            <th>
                                {{ __('invoices.table.payment_status') }}
                            </th>

                            <th>
                                {{ __('invoices.table.generated_by') }}
                            </th>

                            <th>
                                {{ __('invoices.table.actions') }}
                            </th>

                        </tr>

                    </thead>


                    <tbody>


                        @forelse(
                            $invoices
                            as $invoice
                        )

                            <tr>


                                @if(
                                    in_array(
                                        $paymentStatus,
                                        [
                                            'pending',
                                            'in_process',
                                            'paid',
                                        ],
                                        true
                                    )
                                )

                                    <td class="checkbox-cell">

                                        <input
                                            type="checkbox"
                                            name="invoice_ids[]"
                                            value="{{ $invoice->id }}"
                                            class="invoice-checkbox"
                                            form="bulkInvoicesForm"
                                        >

                                    </td>

                                @endif


                                <td>

                                    <a
                                        href="{{ route(
                                            'invoices.show',
                                            $invoice
                                        ) }}"
                                        class="invoice-link"
                                    >

                                        {{ $invoice->invoice_number }}

                                    </a>

                                </td>


                                <td>

                                    {{
                                        $invoice
                                            ->company
                                            ->name
                                        ?? __('invoices.no_data')
                                    }}

                                </td>


                                <td>

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

                                </td>


                                <td>

                                    $

                                    {{
                                        number_format(
                                            $invoice->subtotal,
                                            2
                                        )
                                    }}

                                </td>


                                <td>

                                    $

                                    {{
                                        number_format(
                                            $invoice->tax,
                                            2
                                        )
                                    }}

                                </td>


                                <td class="total">

                                    $

                                    {{
                                        number_format(
                                            $invoice->total,
                                            2
                                        )
                                    }}

                                </td>


                                <td>

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


                                    @else

                                        <span
                                            class="
                                                status
                                                status-pending
                                            "
                                        >
                                            {{ __('invoices.payment_status.pending') }}
                                        </span>

                                    @endif

                                </td>


                                <td>

                                    {{
                                        $invoice
                                            ->generatedBy
                                            ->name
                                        ?? __('invoices.no_data')
                                    }}

                                </td>


                                <td>

                                    <div class="actions">


                                        {{-- =====================================================
                                             VER FACTURA
                                        ====================================================== --}}

                                        <a
                                            href="{{ route(
                                                'invoices.show',
                                                $invoice
                                            ) }}"
                                            class="btn-action"
                                        >
                                            {{ __('invoices.actions.view') }}
                                        </a>


                                        {{-- =====================================================
                                             COMPROBANTE DE PAGO
                                             SOLO FACTURAS PAGADAS
                                        ====================================================== --}}

                                        @if(
                                            $invoice->payment_status === 'paid'
                                        )

                                            <button
                                                type="button"
                                                class="btn-action"
                                                onclick="openPaymentProofModal(
                                                    {{ $invoice->id }},
                                                    @js($invoice->invoice_number),
                                                    @js($invoice->payment_proof),
                                                    @js($invoice->payment_notes)
                                                )"
                                            >
                                                💳
                                                {{ __('invoices.payment_proof.title') }}
                                            </button>

                                        @endif


                                        {{-- =====================================================
                                             RECORDATORIO DE PAGO INDIVIDUAL
                                        ====================================================== --}}

                                        @if(
                                            in_array(
                                                $invoice->payment_status,
                                                [
                                                    'pending',
                                                    'in_process',
                                                ],
                                                true
                                            )
                                        )

                                            <form
                                                method="POST"
                                                action="{{ route(
                                                    'invoices.send-reminder',
                                                    $invoice
                                                ) }}"
                                                onsubmit="
                                                    return confirm(
                                                        '¿Deseas enviar un recordatorio de pago a todos los correos registrados de esta compañía?'
                                                    );
                                                "
                                            >

                                                @csrf

                                                <button
                                                    type="submit"
                                                    class="btn-action"
                                                    title="Enviar recordatorio de pago"
                                                >
                                                    🔔
                                                    Recordatorio
                                                </button>

                                            </form>

                                        @endif

                                    </div>

                                </td>


                            </tr>


                        @empty

                            <tr>

                                <td
                                    colspan="{{ in_array(
                                        $paymentStatus,
                                        [
                                            'pending',
                                            'in_process',
                                            'paid',
                                        ],
                                        true
                                    ) ? 10 : 9 }}"
                                >

                                    <div class="empty">

                                        {{ __('invoices.no_invoices') }}

                                    </div>

                                </td>

                            </tr>

                        @endforelse


                    </tbody>

                </table>

            </div>

        </div>


    </div>

</div>


{{-- ============================================================
     MODAL — COMPROBANTE DE PAGO
============================================================ --}}

<div
    id="paymentProofModal"
    class="payment-proof-modal"
>

    <div class="payment-proof-modal-content">


        {{-- =====================================================
             ENCABEZADO
        ====================================================== --}}

        <div class="payment-proof-header">

            <div>

                <h2 class="payment-proof-title">

                    {{ __('invoices.payment_proof.title') }}

                </h2>


                <p
                    id="paymentProofInvoiceLabel"
                    class="payment-proof-invoice-label"
                ></p>

            </div>


            <button
                type="button"
                class="payment-proof-close"
                onclick="closePaymentProofModal()"
                aria-label="{{ __('invoices.payment_proof.close') }}"
            >
                ×
            </button>

        </div>


        {{-- =====================================================
             FORMULARIO
        ====================================================== --}}

        <form
            id="paymentProofForm"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf


            {{-- =====================================================
                 COMPROBANTE ACTUAL
            ====================================================== --}}

            <div
                id="paymentProofCurrentContainer"
                class="payment-proof-section"
                style="display: none;"
            >

                <label class="payment-proof-label">

                    {{ __('invoices.payment_proof.current') }}

                </label>


                <div class="payment-proof-current">

                    <img
                        id="paymentProofCurrentImage"
                        src=""
                        alt="{{ __('invoices.payment_proof.image_alt') }}"
                    >

                </div>

            </div>


            {{-- =====================================================
                 NUEVO COMPROBANTE
            ====================================================== --}}

            <div class="payment-proof-section">

                <label class="payment-proof-label">

                    {{ __('invoices.payment_proof.photo') }}

                </label>


                <div class="payment-proof-options">


                    {{-- =================================================
                         BOTÓN CÁMARA
                    ================================================== --}}

                    <button
                        type="button"
                        class="btn-action"
                        onclick="openPaymentCamera()"
                    >
                        📷
                        {{ __('invoices.payment_proof.take-photo') }}
                    </button>


                    {{-- =================================================
                         BOTÓN ARCHIVO
                    ================================================== --}}

                    <button
                        type="button"
                        class="btn-action"
                        onclick="openPaymentFile()"
                    >
                        📁
                        {{ __('invoices.payment_proof.choose_file') }}
                    </button>

                </div>


                {{-- =====================================================
                     INPUT CÁMARA
                ====================================================== --}}

                <input
                    type="file"
                    id="paymentProofCameraInput"
                    class="payment-proof-camera-input"
                    accept="image/jpeg,image/png,image/webp"
                    capture="environment"
                >


                {{-- =====================================================
                     INPUT ARCHIVO
                ====================================================== --}}

                <input
                    type="file"
                    id="paymentProofFileInput"
                    class="payment-proof-file-input"
                    accept="image/jpeg,image/png,image/webp"
                >


                {{-- =====================================================
                     INPUT REAL QUE SE ENVÍA AL SERVIDOR
                ====================================================== --}}

                <input
                    type="file"
                    id="paymentProofInput"
                    name="payment_proof"
                    class="payment-proof-hidden-input"
                    accept="image/jpeg,image/png,image/webp"
                >


                {{-- =====================================================
                     ARCHIVO SELECCIONADO
                ====================================================== --}}

                <div
                    id="paymentProofSelectedFile"
                    class="payment-proof-selected-file"
                ></div>


                {{-- =====================================================
                     VISTA PREVIA DE LA NUEVA FOTO
                ====================================================== --}}

                <div
                    id="paymentProofPreview"
                    class="payment-proof-preview"
                >

                    <img
                        id="paymentProofPreviewImage"
                        src=""
                        alt="{{ __('invoices.payment_proof.image_alt') }}"
                    >

                </div>


                <small class="payment-proof-help">
                    {{ __('invoices.payment_proof.file_help') }}
                </small>

            </div>


            {{-- =====================================================
                 NOTAS
            ====================================================== --}}

            <div class="payment-proof-section">

                <label
                    for="paymentNotesInput"
                    class="payment-proof-label"
                >

                    {{ __('invoices.payment_proof.notes') }}

                </label>


                <textarea
                    id="paymentNotesInput"
                    name="payment_notes"
                    rows="5"
                    maxlength="5000"
                    class="payment-proof-textarea"
                    placeholder="{{ __('invoices.payment_proof.notes_placeholder') }}"
                ></textarea>

            </div>


            {{-- =====================================================
                 BOTONES
            ====================================================== --}}

            <div class="payment-proof-actions">

                <button
                    type="button"
                    onclick="closePaymentProofModal()"
                    class="btn-action"
                >
                    {{ __('invoices.payment_proof.cancel') }}
                </button>


                <button
                    type="submit"
                    class="btn-action"
                >
                    💾
                    {{ __('invoices.payment_proof.save') }}
                </button>

            </div>

        </form>

    </div>

</div>


{{-- =========================================================
     JAVASCRIPT SELECCIÓN MASIVA
========================================================= --}}

@if(
    in_array(
        $paymentStatus,
        [
            'pending',
            'in_process',
            'paid',
        ],
        true
    )
)

<script>

document.addEventListener('DOMContentLoaded', function () {

    const form =
        document.getElementById('bulkInvoicesForm');

    const selectAll =
        document.getElementById('selectAllInvoices');

    const checkboxes =
        document.querySelectorAll('.invoice-checkbox');

    const button =
        document.getElementById('bulkEmailButton');

    const counter =
        document.getElementById('selectedInvoicesCount');


    if (
        !form ||
        !selectAll ||
        !button ||
        !counter
    ) {
        return;
    }


    function updateBulkState() {

        const selected =
            document.querySelectorAll(
                '.invoice-checkbox:checked'
            );

        const selectedCount =
            selected.length;


        counter.textContent =
            selectedCount;


        button.disabled =
            selectedCount === 0;


        if (
            checkboxes.length > 0 &&
            selectedCount === checkboxes.length
        ) {

            selectAll.checked = true;

            selectAll.indeterminate = false;

        } else if (
            selectedCount > 0
        ) {

            selectAll.checked = false;

            selectAll.indeterminate = true;

        } else {

            selectAll.checked = false;

            selectAll.indeterminate = false;

        }

    }


    selectAll.addEventListener(
        'change',
        function () {

            checkboxes.forEach(
                function (checkbox) {

                    checkbox.checked =
                        selectAll.checked;

                }
            );


            updateBulkState();

        }
    );


    checkboxes.forEach(
        function (checkbox) {

            checkbox.addEventListener(
                'change',
                updateBulkState
            );

        }
    );


    form.addEventListener(
        'submit',
        function (event) {

            const selected =
                document.querySelectorAll(
                    '.invoice-checkbox:checked'
                );


            if (
                selected.length === 0
            ) {

                event.preventDefault();

                alert(
                    'Selecciona al menos una factura.'
                );

                return;

            }


            const status =
                @json($paymentStatus);


            let message = '';


            if (
                status === 'pending'
            ) {

                message =
                    '¿Deseas preparar el envío de las facturas seleccionadas como pago pendiente?';

            } else if (
                status === 'in_process'
            ) {

                message =
                    '¿Deseas preparar el envío de las facturas seleccionadas como pago en proceso?';

            } else if (
                status === 'paid'
            ) {

                message =
                    '¿Deseas preparar el envío de las facturas seleccionadas como pago recibido?';

            }


            if (
                message &&
                !confirm(message)
            ) {

                event.preventDefault();

            }

        }
    );


    updateBulkState();

});

</script>

@endif


{{-- =========================================================
     JAVASCRIPT COMPROBANTE DE PAGO
     
     FUERA DEL IF DEL ENVÍO MASIVO
     PARA QUE FUNCIONE EN CUALQUIER FILTRO.
========================================================= --}}

<script>

document.addEventListener('DOMContentLoaded', function () {


    /* =========================================================
       ELEMENTOS
    ========================================================= */

    const modal =
        document.getElementById(
            'paymentProofModal'
        );


    const form =
        document.getElementById(
            'paymentProofForm'
        );


    const currentContainer =
        document.getElementById(
            'paymentProofCurrentContainer'
        );


    const currentImage =
        document.getElementById(
            'paymentProofCurrentImage'
        );


    const notesInput =
        document.getElementById(
            'paymentNotesInput'
        );


    const cameraInput =
        document.getElementById(
            'paymentProofCameraInput'
        );


    const fileInput =
        document.getElementById(
            'paymentProofFileInput'
        );


    const paymentProofInput =
        document.getElementById(
            'paymentProofInput'
        );


    const selectedFile =
        document.getElementById(
            'paymentProofSelectedFile'
        );


    const previewContainer =
        document.getElementById(
            'paymentProofPreview'
        );


    const previewImage =
        document.getElementById(
            'paymentProofPreviewImage'
        );


    const invoiceLabel =
        document.getElementById(
            'paymentProofInvoiceLabel'
        );


    /* =========================================================
       COPIAR ARCHIVO AL INPUT REAL
    ========================================================= */

    function setPaymentProofFile(file) {

        if (
            !file ||
            !paymentProofInput
        ) {
            return;
        }


        /*
        |----------------------------------------------------------
        | VALIDAR QUE SEA UNA IMAGEN
        |----------------------------------------------------------
        */

        const allowedTypes = [
            'image/jpeg',
            'image/png',
            'image/webp'
        ];


        if (
            !allowedTypes.includes(
                file.type
            )
        ) {

            alert(
                'El archivo seleccionado no es una imagen válida.'
            );

            return;

        }


        /*
        |----------------------------------------------------------
        | VALIDAR TAMAÑO
        | Máximo 10 MB
        |----------------------------------------------------------
        */

        const maxSize =
            10 * 1024 * 1024;


        if (
            file.size > maxSize
        ) {

            alert(
                'La imagen no puede superar los 10 MB.'
            );

            return;

        }


        /*
        |----------------------------------------------------------
        | PREPARAR ARCHIVO PARA EL FORMULARIO
        |----------------------------------------------------------
        */

        try {

            const dataTransfer =
                new DataTransfer();


            dataTransfer.items.add(
                file
            );


            paymentProofInput.files =
                dataTransfer.files;


        } catch (error) {

            console.error(
                'No fue posible preparar el archivo.',
                error
            );

            return;

        }


        /*
        |----------------------------------------------------------
        | MOSTRAR NOMBRE DEL ARCHIVO
        |----------------------------------------------------------
        */

        if (selectedFile) {

            selectedFile.textContent =
                file.name;

        }


        /*
        |----------------------------------------------------------
        | MOSTRAR VISTA PREVIA
        |----------------------------------------------------------
        */

        if (
            previewContainer &&
            previewImage
        ) {

            const reader =
                new FileReader();


            reader.onload =
                function (event) {

                    previewImage.src =
                        event.target.result;


                    previewContainer.style.display =
                        'block';

                };


            reader.onerror =
                function () {

                    previewImage.src =
                        '';

                    previewContainer.style.display =
                        'none';

                };


            reader.readAsDataURL(
                file
            );

        }

    }


    /* =========================================================
       ABRIR CÁMARA
    ========================================================= */

    window.openPaymentCamera =
        function () {

            if (!cameraInput) {
                return;
            }


            cameraInput.value =
                '';


            cameraInput.click();

        };


    /* =========================================================
       ABRIR SELECTOR DE ARCHIVOS
    ========================================================= */

    window.openPaymentFile =
        function () {

            if (!fileInput) {
                return;
            }


            fileInput.value =
                '';


            fileInput.click();

        };


    /* =========================================================
       FOTO TOMADA CON CÁMARA
    ========================================================= */

    if (cameraInput) {

        cameraInput.addEventListener(
            'change',
            function () {

                if (
                    this.files &&
                    this.files.length > 0
                ) {

                    setPaymentProofFile(
                        this.files[0]
                    );

                }

            }
        );

    }


    /* =========================================================
       ARCHIVO ELEGIDO
    ========================================================= */

    if (fileInput) {

        fileInput.addEventListener(
            'change',
            function () {

                if (
                    this.files &&
                    this.files.length > 0
                ) {

                    setPaymentProofFile(
                        this.files[0]
                    );

                }

            }
        );

    }


    /* =========================================================
       ABRIR MODAL
    ========================================================= */

    window.openPaymentProofModal =
        function (
            invoiceId,
            invoiceNumber,
            paymentProof,
            paymentNotes
        ) {


            if (
                !modal ||
                !form
            ) {
                return;
            }


            /*
            |----------------------------------------------------------
            | RUTA DEL FORMULARIO
            |----------------------------------------------------------
            */

            form.action =
                "{{ url('/invoices') }}/" +
                invoiceId +
                "/payment-proof";


            /*
            |----------------------------------------------------------
            | FACTURA
            |----------------------------------------------------------
            */

            invoiceLabel.textContent =
                "{{ __('invoices.invoice') }} #" +
                invoiceNumber;


            /*
            |----------------------------------------------------------
            | NOTAS EXISTENTES
            |----------------------------------------------------------
            */

            notesInput.value =
                paymentNotes || '';


            /*
            |----------------------------------------------------------
            | LIMPIAR INPUT DE CÁMARA
            |----------------------------------------------------------
            */

            if (cameraInput) {

                cameraInput.value =
                    '';

            }


            /*
            |----------------------------------------------------------
            | LIMPIAR INPUT DE ARCHIVO
            |----------------------------------------------------------
            */

            if (fileInput) {

                fileInput.value =
                    '';

            }


            /*
            |----------------------------------------------------------
            | LIMPIAR INPUT REAL
            |----------------------------------------------------------
            */

            if (paymentProofInput) {

                paymentProofInput.value =
                    '';

            }


            /*
            |----------------------------------------------------------
            | LIMPIAR NOMBRE DE ARCHIVO
            |----------------------------------------------------------
            */

            if (selectedFile) {

                selectedFile.textContent =
                    '';

            }


            /*
            |----------------------------------------------------------
            | LIMPIAR VISTA PREVIA
            |----------------------------------------------------------
            */

            if (previewImage) {

                previewImage.src =
                    '';

            }


            if (previewContainer) {

                previewContainer.style.display =
                    'none';

            }


            /*
            |----------------------------------------------------------
            | MOSTRAR COMPROBANTE YA GUARDADO
            |----------------------------------------------------------
            */

            if (paymentProof) {

                currentImage.src =
                    "{{ asset('storage') }}/" +
                    paymentProof;


                currentContainer.style.display =
                    'block';

            } else {

                currentImage.src =
                    '';


                currentContainer.style.display =
                    'none';

            }


            /*
            |----------------------------------------------------------
            | MOSTRAR MODAL
            |----------------------------------------------------------
            */

            modal.style.display =
                'flex';

        };


    /* =========================================================
       CERRAR MODAL
    ========================================================= */

    window.closePaymentProofModal =
        function () {

            if (!modal) {
                return;
            }


            modal.style.display =
                'none';

        };


    /* =========================================================
       CERRAR AL HACER CLIC FUERA
    ========================================================= */

    if (modal) {

        modal.addEventListener(
            'click',
            function (event) {

                if (
                    event.target === modal
                ) {

                    closePaymentProofModal();

                }

            }
        );

    }


    /* =========================================================
       ESC PARA CERRAR
    ========================================================= */

    document.addEventListener(
        'keydown',
        function (event) {

            if (
                event.key === 'Escape' &&
                modal &&
                modal.style.display === 'flex'
            ) {

                closePaymentProofModal();

            }

        }
    );


});

</script>


</x-app-layout>