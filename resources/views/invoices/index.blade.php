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


            {{-- POR PAGAR --}}

            <div class="summary-card summary-pending">

                <div class="summary-label">
                    {{ __('invoices.payment_status.pending') }}
                </div>

                <div class="summary-number">
                    {{ $pendingCount }}
                </div>

            </div>


            {{-- EN TRÁMITE --}}

            <div class="summary-card summary-process">

                <div class="summary-label">
                    {{ __('invoices.payment_status.in_process') }}
                </div>

                <div class="summary-number">
                    {{ $inProcessCount }}
                </div>

            </div>


            {{-- PAGADAS --}}

            <div class="summary-card summary-paid">

                <div class="summary-label">
                    {{ __('invoices.payment_status.paid') }}
                </div>

                <div class="summary-number">
                    {{ $paidCount }}
                </div>

            </div>


            {{-- CANCELADAS --}}

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


            {{-- PENDIENTE DE COBRO --}}

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


            {{-- COBRADO --}}

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


            {{-- TOTAL FACTURADO --}}

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


                                {{-- FACTURA --}}

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


                                {{-- EMPRESA --}}

                                <td>

                                    {{
                                        $invoice
                                            ->company
                                            ->name
                                        ?? '—'
                                    }}

                                </td>


                                {{-- PERIODO --}}

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


                                {{-- SUBTOTAL --}}

                                <td>

                                    $
                                    {{
                                        number_format(
                                            $invoice->subtotal,
                                            2
                                        )
                                    }}

                                </td>


                                {{-- IVA --}}

                                <td>

                                    $
                                    {{
                                        number_format(
                                            $invoice->tax,
                                            2
                                        )
                                    }}

                                </td>


                                {{-- TOTAL --}}

                                <td class="total">

                                    $
                                    {{
                                        number_format(
                                            $invoice->total,
                                            2
                                        )
                                    }}

                                </td>


                                {{-- ESTADO DE PAGO --}}

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


                                {{-- USUARIO --}}

                                <td>

                                    {{
                                        $invoice
                                            ->generatedBy
                                            ->name
                                        ?? '—'
                                    }}

                                </td>


                                {{-- ACCIONES --}}

                                <td>

                                    <div class="actions">

                                        <a
                                            href="{{ route(
                                                'invoices.show',
                                                $invoice
                                            ) }}"
                                            class="btn-action"
                                        >
                                            {{ __('invoices.actions.view') }}
                                        </a>

                                    </div>

                                </td>


                            </tr>

                        @empty

                            <tr>

                                <td colspan="9">

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

</x-app-layout>
