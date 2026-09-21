<x-app-layout>

<style>
/* =========================================================
   SFA - GENERAR FACTURA
========================================================= */

.sfa-page {
    padding: 24px;
}

.sfa-container {
    max-width: 1500px;
    margin: 0 auto;
}

.page-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 22px;
}

.page-title {
    font-size: 25px;
    font-weight: 700;
    color: #111827;
}

.page-subtitle {
    margin-top: 4px;
    font-size: 13px;
    color: #6b7280;
}

/* =========================================================
   PANELES
========================================================= */

.panel {
    background: #ffffff;
    border: 1px solid #e5e7eb;
    border-radius: 10px;
    margin-bottom: 18px;
    overflow: hidden;
}

.panel-header {
    padding: 13px 17px;
    border-bottom: 1px solid #e5e7eb;
    background: #f9fafb;
}

.panel-title {
    font-size: 14px;
    font-weight: 700;
    color: #111827;
}

.panel-body {
    padding: 17px;
}

/* =========================================================
   FORMULARIOS
========================================================= */

.form-grid {
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 15px;
}

.form-grid-2 {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 15px;
}

.form-group {
    min-width: 0;
}

.form-label {
    display: block;
    margin-bottom: 6px;
    font-size: 12px;
    font-weight: 700;
    color: #374151;
}

.form-input,
.form-select,
.form-textarea {
    width: 100%;
    border: 1px solid #d1d5db;
    border-radius: 7px;
    padding: 9px 11px;
    font-size: 13px;
    background: #ffffff;
    color: #111827;
    outline: none;
    transition: .15s ease;
}

.form-input:focus,
.form-select:focus,
.form-textarea:focus {
    border-color: #6b7280;
    box-shadow: 0 0 0 2px rgba(107,114,128,.10);
}

.form-textarea {
    min-height: 85px;
    resize: vertical;
}

/* =========================================================
   SELECTOR + BOTON +
========================================================= */

.selector-with-button {
    display: flex;
    gap: 7px;
    align-items: stretch;
}

.selector-with-button .form-select {
    flex: 1;
    min-width: 0;
}

.btn-add-selector {
    width: 38px;
    min-width: 38px;
    border: 1px solid #d1d5db;
    border-radius: 7px;
    background: #f9fafb;
    color: #374151;
    font-size: 20px;
    line-height: 1;
    font-weight: 600;
    cursor: pointer;
    transition: .15s ease;
}

.btn-add-selector:hover {
    background: #f3f4f6;
    border-color: #9ca3af;
}

.btn-add-selector:active {
    transform: scale(.97);
}

/* =========================================================
   TIPO DE FACTURACION
========================================================= */

.billing-type {
    display: flex;
    gap: 8px;
    margin-top: 8px;
}

.billing-type label {
    flex: 1;
    cursor: pointer;
}

.billing-type input {
    display: none;
}

.billing-type span {
    display: block;
    text-align: center;
    padding: 9px;
    border: 1px solid #d1d5db;
    border-radius: 7px;
    font-size: 12px;
    font-weight: 600;
    color: #4b5563;
    background: #ffffff;
}

.billing-type input:checked + span {
    background: #f3f4f6;
    border-color: #6b7280;
    color: #111827;
}

/* =========================================================
   EMPRESAS
========================================================= */

.companies-selector {
    margin-top: 15px;
    padding: 13px;
    border: 1px solid #e5e7eb;
    border-radius: 8px;
    background: #f9fafb;
}

.companies-selector-title {
    font-size: 12px;
    font-weight: 700;
    color: #374151;
    margin-bottom: 10px;
}

.options-grid {
    display: grid;
    grid-template-columns: repeat(4, minmax(0, 1fr));
    gap: 8px;
}

.option-check {
    display: flex;
    align-items: center;
    gap: 7px;
    font-size: 12px;
    color: #374151;
}

/* =========================================================
   OPCIONES
========================================================= */

.option-row {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 13px;
}

.option-row:last-child {
    margin-bottom: 0;
}

.option-row input[type="checkbox"] {
    width: 16px;
    height: 16px;
}

.option-row label {
    font-size: 13px;
    font-weight: 600;
    color: #374151;
}

.option-rate {
    width: 100px;
    margin-left: auto;
}

/* =========================================================
   TABLA
========================================================= */

.records-table-wrapper {
    overflow-x: auto;
}

.records-table {
    width: 100%;
    border-collapse: collapse;
    font-size: 12px;
}

.records-table th {
    padding: 9px 8px;
    background: #f9fafb;
    border-bottom: 1px solid #e5e7eb;
    text-align: left;
    white-space: nowrap;
    color: #374151;
    font-weight: 700;
}

.records-table td {
    padding: 8px;
    border-bottom: 1px solid #f0f0f0;
    color: #4b5563;
    vertical-align: middle;
}

.records-table tr:hover td {
    background: #fafafa;
}

.records-table input,
.records-table select {
    width: 100%;
    min-width: 80px;
    border: 1px solid #d1d5db;
    border-radius: 5px;
    padding: 6px 7px;
    font-size: 11px;
}

.records-table .check-cell {
    width: 35px;
    text-align: center;
}

.records-table .check-cell input {
    width: 15px;
    min-width: 15px;
}

/* =========================================================
   CANTIDAD
========================================================= */

.billing-quantity {
    width: 100%;
}

.quantity-type-label {
    margin-top: 4px;
    font-size: 11px;
    color: #6b7280;
    text-transform: capitalize;
}

/* =========================================================
   SERVICIOS
========================================================= */

.service-item {
    padding: 7px 0;
    border-bottom: 1px solid #f3f4f6;
}

.service-item:last-child {
    border-bottom: 0;
}

.service-name {
    font-weight: 700;
    color: #374151;
    margin-bottom: 3px;
}

.service-base {
    font-size: 11px;
    color: #6b7280;
}

.service-tax {
    font-size: 11px;
    color: #92400e;
}

.service-total {
    font-size: 11px;
    font-weight: 700;
    color: #111827;
}

/* =========================================================
   CARGO ADICIONAL
========================================================= */

.additional-charge-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 5px;
}

.additional-total {
    margin-top: 4px;
    font-size: 11px;
    color: #6b7280;
}

/* =========================================================
   ESTADOS
========================================================= */

.empty-state {
    padding: 35px 15px;
    text-align: center;
    color: #9ca3af;
    font-size: 13px;
}

.loading-state {
    padding: 25px;
    text-align: center;
    color: #6b7280;
    font-size: 13px;
}

/* =========================================================
   RESUMEN
========================================================= */

.summary-grid {
    display: grid;
    grid-template-columns: repeat(5, minmax(0, 1fr));
    gap: 12px;
}

.summary-box {
    border: 1px solid #e5e7eb;
    border-radius: 8px;
    padding: 13px;
    background: #ffffff;
}

.summary-label {
    font-size: 11px;
    color: #6b7280;
    margin-bottom: 4px;
}

.summary-value {
    font-size: 18px;
    font-weight: 700;
    color: #111827;
}

.summary-service-tax {
    color: #92400e;
}

.summary-tax {
    color: #7f1d1d;
}

.summary-total {
    color: #111827;
}

/* =========================================================
   BOTONES
========================================================= */

.actions {
    display: flex;
    justify-content: flex-end;
    gap: 9px;
    margin-top: 20px;
}

.btn {
    border: 1px solid #d1d5db;
    border-radius: 7px;
    padding: 9px 15px;
    font-size: 12px;
    font-weight: 700;
    cursor: pointer;
    transition: .15s ease;
}

.btn-secondary {
    background: #ffffff;
    color: #374151;
}

.btn-secondary:hover {
    background: #f9fafb;
}

.btn-primary {
    background: #111827;
    border-color: #111827;
    color: #ffffff;
}

.btn-primary:hover {
    background: #1f2937;
}

.btn:disabled {
    opacity: .55;
    cursor: not-allowed;
}

/* =========================================================
   MODALES
========================================================= */

.sfa-modal {
    display: none;
    position: fixed;
    inset: 0;
    z-index: 9999;
    background: rgba(17, 24, 39, .48);
    align-items: center;
    justify-content: center;
    padding: 20px;
}

.sfa-modal.active {
    display: flex;
}

.sfa-modal-box {
    width: 100%;
    max-width: 500px;
    background: #ffffff;
    border-radius: 11px;
    box-shadow: 0 20px 50px rgba(0,0,0,.18);
    overflow: hidden;
}

.sfa-modal-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 15px 18px;
    border-bottom: 1px solid #e5e7eb;
    background: #f9fafb;
}

.sfa-modal-title {
    font-size: 15px;
    font-weight: 700;
    color: #111827;
}

.sfa-modal-close {
    width: 30px;
    height: 30px;
    border: 0;
    border-radius: 6px;
    background: transparent;
    color: #6b7280;
    font-size: 20px;
    cursor: pointer;
}

.sfa-modal-close:hover {
    background: #e5e7eb;
    color: #111827;
}

.sfa-modal-body {
    padding: 18px;
}

.sfa-modal-footer {
    display: flex;
    justify-content: flex-end;
    gap: 8px;
    padding: 13px 18px;
    border-top: 1px solid #e5e7eb;
    background: #f9fafb;
}

.modal-form-grid {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 13px;
}

.modal-full {
    grid-column: 1 / -1;
}

/* =========================================================
   ALERTA
========================================================= */

.sfa-alert {
    display: none;
    padding: 10px 12px;
    margin-bottom: 14px;
    border-radius: 7px;
    font-size: 12px;
}

.sfa-alert.error {
    display: block;
    background: #fef2f2;
    border: 1px solid #fecaca;
    color: #991b1b;
}

.sfa-alert.success {
    display: block;
    background: #f0fdf4;
    border: 1px solid #bbf7d0;
    color: #166534;
}

/* =========================================================
   RESPONSIVE
========================================================= */

@media (max-width: 1000px) {

    .form-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }

    .summary-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }

    .options-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }

}

@media (max-width: 700px) {

    .sfa-page {
        padding: 12px;
    }

    .form-grid,
    .form-grid-2,
    .modal-form-grid {
        grid-template-columns: 1fr;
    }

    .summary-grid {
        grid-template-columns: 1fr;
    }

    .options-grid {
        grid-template-columns: 1fr;
    }

    .page-header {
        align-items: flex-start;
    }

    .billing-type {
        flex-direction: column;
    }

    .additional-charge-grid {
        grid-template-columns: 1fr;
    }

}

</style>


<div class="sfa-page">

<div class="sfa-container">

    {{-- =====================================================
         HEADER
    ====================================================== --}}

    <div class="page-header">

        <div>

            <div class="page-title">
                {{ __('invoices.create.title') }}
            </div>

            <div class="page-subtitle">
                {{ __('invoices.create.subtitle') }}
            </div>

        </div>

    </div>


    {{-- =====================================================
         CONFIGURACIÓN
    ====================================================== --}}

    <div class="panel">

        <div class="panel-header">

            <div class="panel-title">
                {{ __('invoices.create.configuration') }}
            </div>

        </div>

        <div class="panel-body">

            <div class="form-grid">

                {{-- EMPRESA ENCARGADA --}}

                <div class="form-group">

                    <label class="form-label">
                        {{ __('invoices.create.billing_company') }}
                    </label>

                    <div class="selector-with-button">

                        <select
                            id="billingCompany"
                            class="form-select"
                        >

                            <option value="">
                                {{ __('invoices.create.select_company') }}
                            </option>

                            @foreach($companies as $company)

                                <option value="{{ $company->id }}">

                                    {{ $company->name }}

                                    @if($company->code)
                                        — {{ $company->code }}
                                    @endif

                                </option>

                            @endforeach

                        </select>

                        <button
                            type="button"
                            class="btn-add-selector"
                            id="openCompanyModal"
                            title="{{ __('invoices.create.add_company') }}"
                        >
                            +
                        </button>

                    </div>

                </div>


                {{-- BROKER --}}

                <div class="form-group">

                    <label class="form-label">
                        {{ __('invoices.create.broker') }}
                    </label>

                    <div class="selector-with-button">

                        <select
                            id="billingBroker"
                            class="form-select"
                        >

                            <option value="">
                                {{ __('invoices.create.without_broker') }}
                            </option>

                            @foreach($brokers as $broker)

                                <option value="{{ $broker->id }}">
                                    {{ $broker->name }}
                                </option>

                            @endforeach

                        </select>

                        <button
                            type="button"
                            class="btn-add-selector"
                            id="openBrokerModal"
                            title="{{ __('invoices.create.add_broker') }}"
                        >
                            +
                        </button>

                    </div>

                </div>


                {{-- CONSIGNATARIO --}}

                <div class="form-group">

                    <label class="form-label">
                        {{ __('invoices.create.consignee') }}
                    </label>

                    <div class="selector-with-button">

                        <select
                            id="billingConsignee"
                            class="form-select"
                        >

                            <option value="">
                                {{ __('invoices.create.without_consignee') }}
                            </option>

                            @foreach($consignees as $consignee)

                                <option value="{{ $consignee->id }}">
                                    {{ $consignee->name }}
                                </option>

                            @endforeach

                        </select>

                        <button
                            type="button"
                            class="btn-add-selector"
                            id="openConsigneeModal"
                            title="{{ __('invoices.create.add_consignee') }}"
                        >
                            +
                        </button>

                    </div>

                </div>

            </div>


            {{-- TIPO DE FACTURACIÓN --}}

            <div style="margin-top:16px;">

                <label class="form-label">
                    {{ __('invoices.create.billing_type') }}
                </label>

                <div class="billing-type">

                    <label>

                        <input
                            type="radio"
                            name="billing_type"
                            value="single"
                            id="billingSingle"
                            checked
                        >

                        <span>
                            {{ __('invoices.create.single_company') }}
                        </span>

                    </label>


                    <label>

                        <input
                            type="radio"
                            name="billing_type"
                            value="multiple"
                            id="billingMultiple"
                        >

                        <span>
                            {{ __('invoices.create.multiple_companies') }}
                        </span>

                    </label>

                </div>

            </div>


            {{-- EMPRESA DE LOS REGISTROS --}}

            <div
                id="singleCompanyGroup"
                style="margin-top:15px;"
            >

                <div class="form-group">

                    <label class="form-label">
                        {{ __('invoices.create.record_company') }}
                    </label>

                    <select
                        id="recordCompany"
                        class="form-select"
                    >

                        <option value="">
                            {{ __('invoices.create.select_company') }}
                        </option>

                        @foreach($companies as $company)

                            <option value="{{ $company->id }}">

                                {{ $company->name }}

                                @if($company->code)
                                    — {{ $company->code }}
                                @endif

                            </option>

                        @endforeach

                    </select>

                </div>

            </div>


            {{-- VARIAS EMPRESAS --}}

            <div
                id="multipleCompaniesGroup"
                class="companies-selector"
                style="display:none;"
            >

                <div class="companies-selector-title">
                    {{ __('invoices.create.record_companies') }}
                </div>

                <div class="options-grid">

                    @foreach($companies as $company)

                        <label class="option-check">

                            <input
                                type="checkbox"
                                class="record-company-checkbox"
                                value="{{ $company->id }}"
                            >

                            <span>
                                {{ $company->name }}
                            </span>

                        </label>

                    @endforeach

                </div>

            </div>


            {{-- PERIODO --}}

            <div
                class="form-grid-2"
                style="margin-top:15px;"
            >

                <div class="form-group">

                    <label class="form-label">
                        {{ __('invoices.create.period_start') }}
                    </label>

                    <input
                        type="date"
                        id="periodStart"
                        class="form-input"
                        required
                    >

                </div>


                <div class="form-group">

                    <label class="form-label">
                        {{ __('invoices.create.period_end') }}
                    </label>

                    <input
                        type="date"
                        id="periodEnd"
                        class="form-input"
                        required
                    >

                </div>

            </div>

        </div>

    </div>


    {{-- =====================================================
         OPCIONES
    ====================================================== --}}

    <div class="panel">

        <div class="panel-header">

            <div class="panel-title">
                {{ __('invoices.create.invoice_options') }}
            </div>

        </div>

        <div class="panel-body">

            <div class="form-grid-2">

                {{-- SALES TAX --}}

                <div>

                    <div class="option-row">

                        <input
                            type="checkbox"
                            id="taxEnabled"
                        >

                        <label for="taxEnabled">
                            {{ __('invoices.create.apply_tax') }}
                        </label>

                        <input
                            type="number"
                            id="taxRate"
                            class="form-input option-rate"
                            min="0"
                            max="100"
                            step="0.01"
                            value="0"
                            placeholder="{{ __('invoices.create.percent') }}"
                            disabled
                        >

                    </div>

                </div>


                {{-- SHIPPING --}}

                <div>

                    <div class="option-row">

                        <input
                            type="checkbox"
                            id="shippingEnabled"
                        >

                        <label for="shippingEnabled">
                            {{ __('invoices.create.shipping_handling') }}
                        </label>

                        <input
                            type="number"
                            id="shippingRate"
                            class="form-input option-rate"
                            min="0"
                            max="100"
                            step="0.01"
                            value="0"
                            placeholder="{{ __('invoices.create.percent') }}"
                            disabled
                        >

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- =====================================================
         BUSCAR REGISTROS
    ====================================================== --}}

    <div class="panel">

        <div class="panel-header">

            <div class="panel-title">
                {{ __('invoices.create.search_records') }}
            </div>

        </div>

        <div class="panel-body">

            <button
                type="button"
                id="searchRecords"
                class="btn btn-primary"
            >
                {{ __('invoices.create.search_records') }}
            </button>

        </div>

    </div>


    {{-- =====================================================
         REGISTROS
    ====================================================== --}}

    <div class="panel">

        <div class="panel-header">

            <div class="panel-title">
                {{ __('invoices.create.available_records') }}
            </div>

        </div>

        <div class="panel-body">

            <div class="records-table-wrapper">

                <table class="records-table">

                    <thead>

                        <tr>

                            <th class="check-cell">
                                <input
                                    type="checkbox"
                                    id="selectAllRecords"
                                >
                            </th>

                            <th>
                                {{ __('invoices.create.table.date') }}
                            </th>

                            <th>
                                {{ __('invoices.create.table.company') }}
                            </th>

                            <th>
                                {{ __('invoices.create.table.invoice_number') }}
                            </th>

                            <th>
                                {{ __('invoices.create.table.paps') }}
                            </th>

                            <th>
                                {{ __('invoices.create.table.fact') }}
                            </th>

                            <th>
                                {{ __('invoices.create.table.origin') }}
                            </th>

                            <th>
                                {{ __('invoices.create.table.destination') }}
                            </th>

                            <th>
                                {{ __('invoices.create.table.services') }}
                            </th>

                            <th>
                                {{ __('invoices.create.table.billing_invoice') }}
                            </th>

                            <th>
                                {{ __('invoices.create.table.billing_paps') }}
                            </th>

                            {{-- CANTIDAD --}}
                            <th>
                                Cantidad
                            </th>

                            <th>
                                {{ __('invoices.create.table.additional_charge') }}
                            </th>

                            <th>
                                {{ __('invoices.create.table.amount') }}
                            </th>

                        </tr>

                    </thead>


                    <tbody id="recordsTableBody">

                        <tr>

                            <td
                                colspan="14"
                                class="empty-state"
                            >
                                {{ __('invoices.create.select_company_period') }}
                            </td>

                        </tr>

                    </tbody>

                </table>

            </div>

        </div>

    </div>


    {{-- =====================================================
         RESUMEN
    ====================================================== --}}

    <div class="panel">

        <div class="panel-header">

            <div class="panel-title">
                {{ __('invoices.create.summary') }}
            </div>

        </div>

        <div class="panel-body">

            <div class="summary-grid">

                <div class="summary-box">

                    <div class="summary-label">
                        {{ __('invoices.create.selected_records') }}
                    </div>

                    <div
                        class="summary-value"
                        id="summaryRecords"
                    >
                        0
                    </div>

                </div>


                <div class="summary-box">

                    <div class="summary-label">
                        {{ __('invoices.create.subtotal') }}
                    </div>

                    <div
                        class="summary-value"
                        id="summarySubtotal"
                    >
                        $0.00
                    </div>

                </div>


                <div class="summary-box">

                    <div class="summary-label">
                        IVA servicios
                    </div>

                    <div
                        class="summary-value summary-service-tax"
                        id="summaryServiceTax"
                    >
                        $0.00
                    </div>

                </div>


                <div class="summary-box">

                    <div class="summary-label">
                        Sales Tax
                    </div>

                    <div
                        class="summary-value summary-tax"
                        id="summaryTax"
                    >
                        $0.00
                    </div>

                </div>


                <div class="summary-box">

                    <div class="summary-label">
                        {{ __('invoices.create.total') }}
                    </div>

                    <div
                        class="summary-value summary-total"
                        id="summaryTotal"
                    >
                        $0.00
                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- =====================================================
         COMENTARIOS
    ====================================================== --}}

    <div class="panel">

        <div class="panel-header">

            <div class="panel-title">
                {{ __('invoices.create.comments') }}
            </div>

        </div>

        <div class="panel-body">

            <textarea
                id="comments"
                class="form-textarea"
                placeholder="{{ __('invoices.create.comments_placeholder') }}"
            ></textarea>

        </div>

    </div>


    {{-- =====================================================
         ACCIONES
    ====================================================== --}}

    <div class="actions">

        <a
            href="{{ route('invoices.index') }}"
            class="btn btn-secondary"
        >
            {{ __('invoices.create.cancel') }}
        </a>

        <button
            type="button"
            id="generateInvoice"
            class="btn btn-primary"
        >
            {{ __('invoices.create.generate_invoice') }}
        </button>

    </div>

</div>

</div>


{{-- =========================================================
MODAL NUEVA EMPRESA
========================================================= --}}

<div
    id="companyModal"
    class="sfa-modal"
>

<div class="sfa-modal-box">

    <div class="sfa-modal-header">

        <div class="sfa-modal-title">
            {{ __('invoices.create.company_modal.title') }}
        </div>

        <button
            type="button"
            class="sfa-modal-close"
            data-close-modal="companyModal"
        >
            ×
        </button>

    </div>

    <form id="companyForm">

        <div class="sfa-modal-body">

            <div
                id="companyModalAlert"
                class="sfa-alert"
            ></div>

            <div class="modal-form-grid">

                <div class="form-group modal-full">

                    <label class="form-label">
                        {{ __('invoices.create.company_modal.name') }}
                    </label>

                    <input
                        type="text"
                        name="name"
                        class="form-input"
                        maxlength="255"
                        required
                    >

                </div>


                <div class="form-group">

                    <label class="form-label">
                        {{ __('invoices.create.company_modal.code') }}
                    </label>

                    <input
                        type="text"
                        name="code"
                        class="form-input"
                        maxlength="50"
                    >

                </div>


                <div class="form-group">

                    <label class="form-label">
                        {{ __('invoices.create.company_modal.tax_id') }}
                    </label>

                    <input
                        type="text"
                        name="tax_id"
                        class="form-input"
                        maxlength="50"
                    >

                </div>

            </div>

        </div>

        <div class="sfa-modal-footer">

            <button
                type="button"
                class="btn btn-secondary"
                data-close-modal="companyModal"
            >
                {{ __('invoices.create.cancel') }}
            </button>

            <button
                type="submit"
                class="btn btn-primary"
            >
                {{ __('invoices.create.company_modal.save') }}
            </button>

        </div>

    </form>

</div>

</div>


{{-- =========================================================
MODAL NUEVO BROKER
========================================================= --}}

<div
    id="brokerModal"
    class="sfa-modal"
>

<div class="sfa-modal-box">

    <div class="sfa-modal-header">

        <div class="sfa-modal-title">
            {{ __('invoices.create.broker_modal.title') }}
        </div>

        <button
            type="button"
            class="sfa-modal-close"
            data-close-modal="brokerModal"
        >
            ×
        </button>

    </div>

    <form id="brokerForm">

        <div class="sfa-modal-body">

            <div
                id="brokerModalAlert"
                class="sfa-alert"
            ></div>

            <div class="form-group">

                <label class="form-label">
                    {{ __('invoices.create.broker_modal.name') }}
                </label>

                <input
                    type="text"
                    name="name"
                    class="form-input"
                    maxlength="255"
                    required
                >

            </div>

        </div>

        <div class="sfa-modal-footer">

            <button
                type="button"
                class="btn btn-secondary"
                data-close-modal="brokerModal"
            >
                {{ __('invoices.create.cancel') }}
            </button>

            <button
                type="submit"
                class="btn btn-primary"
            >
                {{ __('invoices.create.broker_modal.save') }}
            </button>

        </div>

    </form>

</div>

</div>


{{-- =========================================================
MODAL NUEVO CONSIGNATARIO
========================================================= --}}

<div
    id="consigneeModal"
    class="sfa-modal"
>

<div class="sfa-modal-box">

    <div class="sfa-modal-header">

        <div class="sfa-modal-title">
            {{ __('invoices.create.consignee_modal.title') }}
        </div>

        <button
            type="button"
            class="sfa-modal-close"
            data-close-modal="consigneeModal"
        >
            ×
        </button>

    </div>

    <form id="consigneeForm">

        <div class="sfa-modal-body">

            <div
                id="consigneeModalAlert"
                class="sfa-alert"
            ></div>

            <div class="form-group">

                <label class="form-label">
                    {{ __('invoices.create.consignee_modal.name') }}
                </label>

                <input
                    type="text"
                    name="name"
                    class="form-input"
                    maxlength="255"
                    required
                >

            </div>

        </div>

        <div class="sfa-modal-footer">

            <button
                type="button"
                class="btn btn-secondary"
                data-close-modal="consigneeModal"
            >
                {{ __('invoices.create.cancel') }}
            </button>

            <button
                type="submit"
                class="btn btn-primary"
            >
                {{ __('invoices.create.consignee_modal.save') }}
            </button>

        </div>

    </form>

</div>

</div>


{{-- =========================================================
FORMULARIO REAL
========================================================= --}}

<form
    id="invoiceForm"
    method="POST"
    action="{{ route('invoices.store') }}"
    style="display:none;"
>

@csrf

<input
    type="hidden"
    name="company_id"
    id="formCompany"
>

<input
    type="hidden"
    name="broker_id"
    id="formBroker"
>

<input
    type="hidden"
    name="consignee_id"
    id="formConsignee"
>

<input
    type="hidden"
    name="period_start"
    id="formPeriodStart"
>

<input
    type="hidden"
    name="period_end"
    id="formPeriodEnd"
>

<input
    type="hidden"
    name="tax_rate"
    id="formTaxRate"
>

<input
    type="hidden"
    name="shipping_handling_rate"
    id="formShippingRate"
>

<input
    type="hidden"
    name="comments"
    id="formComments"
>

<input
    type="hidden"
    name="billing_type"
    id="formBillingType"
>

<div id="formRecordCompanies"></div>

<div id="formRecords"></div>

</form>


<script>

document.addEventListener('DOMContentLoaded', function () {

    /* =====================================================
       ELEMENTOS
    ===================================================== */

    const billingCompany =
        document.getElementById('billingCompany');

    const billingBroker =
        document.getElementById('billingBroker');

    const billingConsignee =
        document.getElementById('billingConsignee');

    const recordCompany =
        document.getElementById('recordCompany');

    const billingSingle =
        document.getElementById('billingSingle');

    const billingMultiple =
        document.getElementById('billingMultiple');

    const singleCompanyGroup =
        document.getElementById('singleCompanyGroup');

    const multipleCompaniesGroup =
        document.getElementById('multipleCompaniesGroup');

    const searchRecords =
        document.getElementById('searchRecords');

    const recordsTableBody =
        document.getElementById('recordsTableBody');

    const selectAllRecords =
        document.getElementById('selectAllRecords');

    const taxEnabled =
        document.getElementById('taxEnabled');

    const taxRate =
        document.getElementById('taxRate');

    const shippingEnabled =
        document.getElementById('shippingEnabled');

    const shippingRate =
        document.getElementById('shippingRate');

    const periodStart =
        document.getElementById('periodStart');

    const periodEnd =
        document.getElementById('periodEnd');

    const comments =
        document.getElementById('comments');

    const generateInvoice =
        document.getElementById('generateInvoice');

    const formCompany =
        document.getElementById('formCompany');

    const formBroker =
        document.getElementById('formBroker');

    const formConsignee =
        document.getElementById('formConsignee');

    const formPeriodStart =
        document.getElementById('formPeriodStart');

    const formPeriodEnd =
        document.getElementById('formPeriodEnd');

    const formTaxRate =
        document.getElementById('formTaxRate');

    const formShippingRate =
        document.getElementById('formShippingRate');

    const formComments =
        document.getElementById('formComments');

    const formBillingType =
        document.getElementById('formBillingType');

    const formRecordCompanies =
        document.getElementById('formRecordCompanies');

    const formRecords =
        document.getElementById('formRecords');


    /* =====================================================
       DATOS
    ===================================================== */

    let loadedRecords = [];


    /* =====================================================
       MODALES
    ===================================================== */

    function openModal(id) {

        const modal =
            document.getElementById(id);

        if (modal) {
            modal.classList.add('active');
        }

    }


    function closeModal(id) {

        const modal =
            document.getElementById(id);

        if (modal) {
            modal.classList.remove('active');
        }

    }


    document
        .querySelectorAll('[data-close-modal]')
        .forEach(button => {

            button.addEventListener('click', function () {

                closeModal(
                    this.dataset.closeModal
                );

            });

        });


    document
        .querySelectorAll('.sfa-modal')
        .forEach(modal => {

            modal.addEventListener('click', function (event) {

                if (event.target === modal) {

                    modal.classList.remove('active');

                }

            });

        });


    document
        .getElementById('openCompanyModal')
        .addEventListener('click', function () {

            openModal('companyModal');

        });


    document
        .getElementById('openBrokerModal')
        .addEventListener('click', function () {

            openModal('brokerModal');

        });


    document
        .getElementById('openConsigneeModal')
        .addEventListener('click', function () {

            openModal('consigneeModal');

        });


    /* =====================================================
       ALERTAS
    ===================================================== */

    function showModalAlert(
        elementId,
        message,
        type = 'error'
    ) {

        const alert =
            document.getElementById(elementId);

        if (!alert) return;

        alert.className =
            'sfa-alert ' + type;

        alert.textContent =
            message;

    }


    function clearModalAlert(elementId) {

        const alert =
            document.getElementById(elementId);

        if (!alert) return;

        alert.className =
            'sfa-alert';

        alert.textContent =
            '';

    }


    /* =====================================================
       AGREGAR EMPRESA
    ===================================================== */

    document
        .getElementById('companyForm')
        .addEventListener('submit', async function (event) {

            event.preventDefault();

            clearModalAlert('companyModalAlert');

            const form =
                this;

            const formData =
                new FormData(form);

            try {

                const response =
                    await fetch(
                        "{{ route('invoices.companies.store') }}",
                        {
                            method: 'POST',

                            headers: {
                                'X-CSRF-TOKEN':
                                    document
                                        .querySelector(
                                            'meta[name="csrf-token"]'
                                        )
                                        ?.getAttribute('content'),

                                'Accept':
                                    'application/json'
                            },

                            body: formData
                        }
                    );


                const data =
                    await response.json();


                if (!response.ok) {

                    let message =
                        @json(__('invoices.create.js.company_create_error'));

                    if (data.errors) {

                        message =
                            Object.values(data.errors)
                                .flat()
                                .join(' ');

                    } else if (data.message) {

                        message =
                            data.message;

                    }

                    showModalAlert(
                        'companyModalAlert',
                        message
                    );

                    return;

                }


                const company =
                    data.company;


                const option =
                    document.createElement('option');

                option.value =
                    company.id;

                option.textContent =
                    company.name +
                    (
                        company.code
                            ? ' — ' + company.code
                            : ''
                    );


                billingCompany.appendChild(option);

                billingCompany.value =
                    company.id;


                form.reset();

                closeModal('companyModal');

            } catch (error) {

                showModalAlert(
                    'companyModalAlert',
                    @json(__('invoices.create.js.company_create_exception'))
                );

                console.error(error);

            }

        });


    /* =====================================================
       AGREGAR BROKER
    ===================================================== */

    document
        .getElementById('brokerForm')
        .addEventListener('submit', async function (event) {

            event.preventDefault();

            clearModalAlert('brokerModalAlert');

            const form =
                this;

            const formData =
                new FormData(form);

            try {

                const response =
                    await fetch(
                        "{{ route('invoices.brokers.store') }}",
                        {
                            method: 'POST',

                            headers: {
                                'X-CSRF-TOKEN':
                                    document
                                        .querySelector(
                                            'meta[name="csrf-token"]'
                                        )
                                        ?.getAttribute('content'),

                                'Accept':
                                    'application/json'
                            },

                            body: formData
                        }
                    );


                const data =
                    await response.json();


                if (!response.ok) {

                    let message =
                        @json(__('invoices.create.js.broker_create_error'));

                    if (data.errors) {

                        message =
                            Object.values(data.errors)
                                .flat()
                                .join(' ');

                    } else if (data.message) {

                        message =
                            data.message;

                    }

                    showModalAlert(
                        'brokerModalAlert',
                        message
                    );

                    return;

                }


                const broker =
                    data.broker;


                const option =
                    document.createElement('option');

                option.value =
                    broker.id;

                option.textContent =
                    broker.name;


                billingBroker.appendChild(option);

                billingBroker.value =
                    broker.id;


                form.reset();

                closeModal('brokerModal');

            } catch (error) {

                showModalAlert(
                    'brokerModalAlert',
                    @json(__('invoices.create.js.broker_create_exception'))
                );

                console.error(error);

            }

        });


    /* =====================================================
       AGREGAR CONSIGNATARIO
    ===================================================== */

    document
        .getElementById('consigneeForm')
        .addEventListener('submit', async function (event) {

            event.preventDefault();

            clearModalAlert('consigneeModalAlert');

            const form =
                this;

            const formData =
                new FormData(form);

            try {

                const response =
                    await fetch(
                        "{{ route('invoices.consignees.store') }}",
                        {
                            method: 'POST',

                            headers: {
                                'X-CSRF-TOKEN':
                                    document
                                        .querySelector(
                                            'meta[name="csrf-token"]'
                                        )
                                        ?.getAttribute('content'),

                                'Accept':
                                    'application/json'
                            },

                            body: formData
                        }
                    );


                const data =
                    await response.json();


                if (!response.ok) {

                    let message =
                        @json(__('invoices.create.js.consignee_create_error'));

                    if (data.errors) {

                        message =
                            Object.values(data.errors)
                                .flat()
                                .join(' ');

                    } else if (data.message) {

                        message =
                            data.message;

                    }

                    showModalAlert(
                        'consigneeModalAlert',
                        message
                    );

                    return;

                }


                const consignee =
                    data.consignee;


                const option =
                    document.createElement('option');

                option.value =
                    consignee.id;

                option.textContent =
                    consignee.name;


                billingConsignee.appendChild(option);

                billingConsignee.value =
                    consignee.id;


                form.reset();

                closeModal('consigneeModal');

            } catch (error) {

                showModalAlert(
                    'consigneeModalAlert',
                    @json(__('invoices.create.js.consignee_create_exception'))
                );

                console.error(error);

            }

        });


    /* =====================================================
       TIPO DE FACTURACIÓN
    ===================================================== */

    function updateBillingType() {

        if (billingMultiple.checked) {

            singleCompanyGroup.style.display =
                'none';

            multipleCompaniesGroup.style.display =
                'block';

        } else {

            singleCompanyGroup.style.display =
                'block';

            multipleCompaniesGroup.style.display =
                'none';

        }

    }


    billingSingle.addEventListener(
        'change',
        updateBillingType
    );

    billingMultiple.addEventListener(
        'change',
        updateBillingType
    );


    /* =====================================================
       SALES TAX
    ===================================================== */

    taxEnabled.addEventListener(
        'change',
        function () {

            taxRate.disabled =
                !this.checked;

            if (!this.checked) {

                taxRate.value =
                    0;

            }

            calculateSummary();

        }
    );


    taxRate.addEventListener(
        'input',
        calculateSummary
    );


    /* =====================================================
       SHIPPING
    ===================================================== */

    shippingEnabled.addEventListener(
        'change',
        function () {

            shippingRate.disabled =
                !this.checked;

            if (!this.checked) {

                shippingRate.value =
                    0;

            }

            calculateSummary();

        }
    );


    shippingRate.addEventListener(
        'input',
        calculateSummary
    );


    /* =====================================================
       EMPRESAS PARA REGISTROS
    ===================================================== */

    function getRecordCompanyIds() {

        if (billingMultiple.checked) {

            return Array.from(
                document.querySelectorAll(
                    '.record-company-checkbox:checked'
                )
            ).map(
                checkbox =>
                    checkbox.value
            );

        }


        if (recordCompany.value) {

            return [
                recordCompany.value
            ];

        }


        return [];

    }


    /* =====================================================
       BUSCAR REGISTROS
    ===================================================== */

    searchRecords.addEventListener(
        'click',
        async function () {

            const companyIds =
                getRecordCompanyIds();


            if (!companyIds.length) {

                alert(
                    @json(__('invoices.create.js.select_company'))
                );

                return;

            }


            if (
                !periodStart.value ||
                !periodEnd.value
            ) {

                alert(
                    @json(__('invoices.create.js.select_period'))
                );

                return;

            }


            recordsTableBody.innerHTML = `
                <tr>
                    <td colspan="14" class="loading-state">
                        ${@json(__('invoices.create.js.searching_records'))}
                    </td>
                </tr>
            `;


            loadedRecords = [];


            try {

                for (const companyId of companyIds) {

                    const url =
                        new URL(
                            "{{ route('invoices.records') }}",
                            window.location.origin
                        );


                    url.searchParams.set(
                        'company_id',
                        companyId
                    );

                    url.searchParams.set(
                        'period_start',
                        periodStart.value
                    );

                    url.searchParams.set(
                        'period_end',
                        periodEnd.value
                    );


                    const response =
                        await fetch(
                            url.toString(),
                            {
                                headers: {
                                    'Accept':
                                        'application/json'
                                }
                            }
                        );


                    const data =
                        await response.json();


                    if (!response.ok) {

                        throw new Error(
                            data.message ||
                            @json(__('invoices.create.js.get_records_error'))
                        );

                    }


                    if (
                        Array.isArray(
                            data.records
                        )
                    ) {

                        loadedRecords =
                            loadedRecords.concat(
                                data.records
                            );

                    }

                }


                renderRecords();

            } catch (error) {

                console.error(error);

                recordsTableBody.innerHTML = `
                    <tr>
                        <td colspan="14" class="empty-state">
                            ${escapeHtml(error.message)}
                        </td>
                    </tr>
                `;

            }

        }
    );


    /* =====================================================
       OBTENER NOMBRE DE LA UNIDAD
    ===================================================== */

    function getQuantityTypeLabel(quantityType) {

        switch (quantityType) {

            case 'palets':
                return 'Pallets';

            case 'contenedores':
                return 'Contenedores';

            case 'piezas':
                return 'Piezas';

            default:
                return quantityType || '';

        }

    }


    /* =====================================================
       RENDERIZAR REGISTROS
    ===================================================== */

    function renderRecords() {

        if (!loadedRecords.length) {

            recordsTableBody.innerHTML = `
                <tr>
                    <td colspan="14" class="empty-state">
                        ${@json(__('invoices.create.js.no_records_found'))}
                    </td>
                </tr>
            `;

            calculateSummary();

            return;

        }


        recordsTableBody.innerHTML =
            loadedRecords.map(
                record => {

                    const services =
                        Array.isArray(record.services)
                            ? record.services
                            : [];


                    const companyName =
                        record.company?.name ||
                        '';


                    const consignee =
                        record.consignee?.name ||
                        record.destination ||
                        '';


                    /* =================================================
                       SERVICIOS
                    ================================================= */

                    const servicesHtml =
                        services.length
                            ? services.map(service => {

                                const serviceName =
                                    service.service_type?.name ||
                                    service.serviceType?.name ||
                                    service.name ||
                                    @json(__('invoices.create.js.service'));


                                const base =
                                    Number(
                                        service.subtotal || 0
                                    );


                                const taxRate =
                                    Number(
                                        service.service_type?.tax_rate ??
                                        service.serviceType?.tax_rate ??
                                        0
                                    );


                                const taxAmount =
                                    Math.round(
                                        (
                                            base *
                                            (taxRate / 100)
                                        ) * 100
                                    ) / 100;


                                const serviceTotal =
                                    Math.round(
                                        (
                                            base +
                                            taxAmount
                                        ) * 100
                                    ) / 100;


                                return `
                                    <div class="service-item">

                                        <div class="service-name">
                                            ${escapeHtml(serviceName)}
                                        </div>

                                        <div class="service-base">
                                            Base:
                                            $${formatMoney(base)}
                                        </div>

                                        <div class="service-tax">
                                            IVA ${formatMoney(taxRate)}%:
                                            $${formatMoney(taxAmount)}
                                        </div>

                                        <div class="service-total">
                                            Total:
                                            $${formatMoney(serviceTotal)}
                                        </div>

                                    </div>
                                `;

                            }).join('')
                            : @json(__('invoices.create.js.no_services'));


                    /* =================================================
                       CANTIDAD
                    ================================================= */

                    const quantity =
                        record.quantity ?? '';


                    const quantityType =
                        getQuantityTypeLabel(
                            record.quantity_type
                        );


                    /* =================================================
                       TOTAL DE SERVICIOS
                    ================================================= */

                    const serviceTotal =
                        services.reduce(
                            (sum, service) => {

                                const base =
                                    Number(
                                        service.subtotal || 0
                                    );


                                const taxRate =
                                    Number(
                                        service.service_type?.tax_rate ??
                                        service.serviceType?.tax_rate ??
                                        0
                                    );


                                const tax =
                                    Math.round(
                                        (
                                            base *
                                            (taxRate / 100)
                                        ) * 100
                                    ) / 100;


                                return sum + base + tax;

                            },
                            0
                        );


                    return `

                        <tr data-record-id="${record.id}">

                            {{-- CHECKBOX --}}

                            <td class="check-cell">

                                <input
                                    type="checkbox"
                                    class="record-checkbox"
                                    value="${record.id}"
                                >

                            </td>


                            {{-- FECHA --}}

                            <td>

                                ${escapeHtml(
                                    formatDate(record.date)
                                )}

                            </td>


                            {{-- EMPRESA --}}

                            <td>

                                ${escapeHtml(
                                    companyName
                                )}

                            </td>


                            {{-- FACTURA --}}

                            <td>

                                ${escapeHtml(
                                    record.invoice_number || ''
                                )}

                            </td>


                            {{-- PAPS --}}

                            <td>

                                ${escapeHtml(
                                    record.paps_number || ''
                                )}

                            </td>


                            {{-- FACT --}}

                            <td>

                                ${escapeHtml(
                                    record.fact_number || ''
                                )}

                            </td>


                            {{-- ORIGEN --}}

                            <td>

                                ${escapeHtml(
                                    record.origin || ''
                                )}

                            </td>


                            {{-- DESTINO --}}

                            <td>

                                ${escapeHtml(
                                    consignee
                                )}

                            </td>


                            {{-- SERVICIOS --}}

                            <td>

                                ${servicesHtml}

                            </td>


                            {{-- FACTURA DE COBRO --}}

                            <td>

                                <input
                                    type="text"
                                    class="billing-invoice"
                                    data-record-id="${record.id}"
                                    value="${escapeHtml(
                                        record.invoice_number || ''
                                    )}"
                                >

                            </td>


                            {{-- PAPS DE COBRO --}}

                            <td>

                                <input
                                    type="text"
                                    class="billing-paps"
                                    data-record-id="${record.id}"
                                    value="${escapeHtml(
                                        record.paps_number || ''
                                    )}"
                                >

                            </td>


                            {{-- CANTIDAD Y TIPO --}}

                            <td>

                                <input
                                    type="number"
                                    class="billing-quantity"
                                    data-record-id="${record.id}"
                                    min="0"
                                    step="0.01"
                                    value="${escapeHtml(quantity)}"
                                >

                                <div class="quantity-type-label">

                                    ${escapeHtml(
                                        quantityType
                                    )}

                                </div>

                            </td>


                            {{-- CARGO ADICIONAL --}}

                            <td>

                                <div class="additional-charge-grid">

                                    <input
                                        type="number"
                                        class="additional-quantity"
                                        data-record-id="${record.id}"
                                        min="0"
                                        step="0.01"
                                        value="0"
                                        placeholder="Qty"
                                    >

                                    <input
                                        type="number"
                                        class="additional-unit-price"
                                        data-record-id="${record.id}"
                                        min="0"
                                        step="0.01"
                                        value="0"
                                        placeholder="Price"
                                    >

                                </div>

                                <div
                                    class="additional-total"
                                    data-record-id="${record.id}"
                                >
                                    $0.00
                                </div>

                            </td>


                            {{-- TOTAL --}}

                            <td>

                                <div
                                    style="
                                        font-size:11px;
                                        color:#6b7280;
                                    "
                                >
                                    ${@json(__('invoices.create.js.services_label'))}
                                    $${formatMoney(serviceTotal)}
                                </div>

                            </td>

                        </tr>

                    `;

                }
            ).join('');


        attachRecordEvents();

        calculateSummary();

    }


    /* =====================================================
       EVENTOS DE REGISTROS
    ===================================================== */

    function attachRecordEvents() {

        document
            .querySelectorAll('.record-checkbox')
            .forEach(checkbox => {

                checkbox.addEventListener(
                    'change',
                    function () {

                        calculateSummary();

                    }
                );

            });


        document
            .querySelectorAll(
                '.additional-quantity, .additional-unit-price'
            )
            .forEach(input => {

                input.addEventListener(
                    'input',
                    function () {

                        updateAdditionalTotal(
                            this.dataset.recordId
                        );

                        calculateSummary();

                    }
                );

            });

    }


    /* =====================================================
       CARGO ADICIONAL
    ===================================================== */

    function updateAdditionalTotal(recordId) {

        const quantityInput =
            document.querySelector(
                `.additional-quantity[data-record-id="${recordId}"]`
            );


        const priceInput =
            document.querySelector(
                `.additional-unit-price[data-record-id="${recordId}"]`
            );


        const totalElement =
            document.querySelector(
                `.additional-total[data-record-id="${recordId}"]`
            );


        if (
            !quantityInput ||
            !priceInput ||
            !totalElement
        ) {

            return;

        }


        const quantity =
            parseFloat(
                quantityInput.value || 0
            );


        const price =
            parseFloat(
                priceInput.value || 0
            );


        const total =
            quantity * price;


        totalElement.textContent =
            '$' + formatMoney(total);

    }


    /* =====================================================
       SELECCIONAR TODOS
    ===================================================== */

    selectAllRecords.addEventListener(
        'change',
        function () {

            document
                .querySelectorAll('.record-checkbox')
                .forEach(checkbox => {

                    checkbox.checked =
                        this.checked;

                });


            calculateSummary();

        }
    );


    /* =====================================================
       CALCULAR RESUMEN
    ===================================================== */

    function calculateSummary() {

        const selectedIds =
            Array.from(
                document.querySelectorAll(
                    '.record-checkbox:checked'
                )
            ).map(
                checkbox =>
                    parseInt(
                        checkbox.value
                    )
            );


        let subtotal = 0;

        let serviceTaxTotal = 0;


        selectedIds.forEach(id => {

            const record =
                loadedRecords.find(
                    item =>
                        parseInt(item.id) === id
                );


            if (!record) return;


            const services =
                Array.isArray(record.services)
                    ? record.services
                    : [];


            /* ==========================================
               SERVICIOS
            ========================================== */

            services.forEach(service => {

                const base =
                    Number(
                        service.subtotal || 0
                    );


                const taxRate =
                    Number(
                        service.service_type?.tax_rate ??
                        service.serviceType?.tax_rate ??
                        0
                    );


                const serviceTax =
                    Math.round(
                        (
                            base *
                            (taxRate / 100)
                        ) * 100
                    ) / 100;


                subtotal +=
                    base;


                serviceTaxTotal +=
                    serviceTax;

            });


            /* ==========================================
               CARGO ADICIONAL
            ========================================== */

            const quantityInput =
                document.querySelector(
                    `.additional-quantity[data-record-id="${id}"]`
                );


            const priceInput =
                document.querySelector(
                    `.additional-unit-price[data-record-id="${id}"]`
                );


            const quantity =
                Number(
                    quantityInput?.value || 0
                );


            const price =
                Number(
                    priceInput?.value || 0
                );


            const additionalAmount =
                Math.round(
                    (
                        quantity *
                        price
                    ) * 100
                ) / 100;


            subtotal +=
                additionalAmount;

        });


        /* ==============================================
           SHIPPING / HANDLING
        ============================================== */

        const shippingRateValue =
            shippingEnabled.checked
                ? Number(
                    shippingRate.value || 0
                )
                : 0;


        const shipping =
            Math.round(
                (
                    subtotal *
                    (shippingRateValue / 100)
                ) * 100
            ) / 100;


        /* ==============================================
           SALES TAX
        ============================================== */

        const salesTaxRate =
            taxEnabled.checked
                ? Number(
                    taxRate.value || 0
                )
                : 0;


        const salesTaxBase =
            subtotal +
            shipping;


        const salesTax =
            Math.round(
                (
                    salesTaxBase *
                    (salesTaxRate / 100)
                ) * 100
            ) / 100;


        /* ==============================================
           TOTAL
        ============================================== */

        const total =
            Math.round(
                (
                    subtotal +
                    serviceTaxTotal +
                    shipping +
                    salesTax
                ) * 100
            ) / 100;


        /* ==============================================
           MOSTRAR
        ============================================== */

        document.getElementById(
            'summaryRecords'
        ).textContent =
            selectedIds.length;


        document.getElementById(
            'summarySubtotal'
        ).textContent =
            '$' +
            formatMoney(subtotal);


        document.getElementById(
            'summaryServiceTax'
        ).textContent =
            '$' +
            formatMoney(serviceTaxTotal);


        document.getElementById(
            'summaryTax'
        ).textContent =
            '$' +
            formatMoney(salesTax);


        document.getElementById(
            'summaryTotal'
        ).textContent =
            '$' +
            formatMoney(total);

    }


    /* =====================================================
       GENERAR FACTURA
    ===================================================== */

    generateInvoice.addEventListener(
        'click',
        function () {

            const selectedIds =
                Array.from(
                    document.querySelectorAll(
                        '.record-checkbox:checked'
                    )
                ).map(
                    checkbox =>
                        parseInt(
                            checkbox.value
                        )
                );


            if (!selectedIds.length) {

                alert(
                    @json(__('invoices.create.js.select_record'))
                );

                return;

            }


            if (
                !periodStart.value ||
                !periodEnd.value
            ) {

                alert(
                    @json(__('invoices.create.js.select_period'))
                );

                return;

            }


            /* ==========================================
               DATOS GENERALES
            ========================================== */

            formCompany.value =
                billingCompany.value || '';


            formBroker.value =
                billingBroker.value || '';


            formConsignee.value =
                billingConsignee.value || '';


            formPeriodStart.value =
                periodStart.value;


            formPeriodEnd.value =
                periodEnd.value;


            formTaxRate.value =
                taxEnabled.checked
                    ? parseFloat(
                        taxRate.value || 0
                    )
                    : 0;


            formShippingRate.value =
                shippingEnabled.checked
                    ? parseFloat(
                        shippingRate.value || 0
                    )
                    : 0;


            formComments.value =
                comments.value || '';


            formBillingType.value =
                billingMultiple.checked
                    ? 'multiple'
                    : 'single';


            /* ==========================================
               EMPRESAS
            ========================================== */

            formRecordCompanies.innerHTML =
                '';


            getRecordCompanyIds()
                .forEach(companyId => {

                    addHiddenInput(
                        formRecordCompanies,
                        'record_companies[]',
                        companyId
                    );

                });


            /* ==========================================
               REGISTROS
            ========================================== */

            formRecords.innerHTML =
                '';


            selectedIds.forEach(id => {

                const record =
                    loadedRecords.find(
                        item =>
                            parseInt(item.id) === id
                    );


                if (!record) return;


                const billingInvoice =
                    document.querySelector(
                        `.billing-invoice[data-record-id="${id}"]`
                    )?.value || '';


                const billingPaps =
                    document.querySelector(
                        `.billing-paps[data-record-id="${id}"]`
                    )?.value || '';


                const quantity =
                    document.querySelector(
                        `.billing-quantity[data-record-id="${id}"]`
                    )?.value || '';


                const quantityType =
                    record.quantity_type || '';


                const additionalQuantity =
                    document.querySelector(
                        `.additional-quantity[data-record-id="${id}"]`
                    )?.value || 0;


                const additionalUnitPrice =
                    document.querySelector(
                        `.additional-unit-price[data-record-id="${id}"]`
                    )?.value || 0;


                const additionalChargeType =
                    @json(__('invoices.create.js.additional_charge'));


                /* ======================================
                   ID
                ====================================== */

                addHiddenInput(
                    formRecords,
                    `records[${id}][id]`,
                    id
                );


                /* ======================================
                   FACTURA
                ====================================== */

                addHiddenInput(
                    formRecords,
                    `records[${id}][billing_invoice]`,
                    billingInvoice
                );


                /* ======================================
                   PAPS
                ====================================== */

                addHiddenInput(
                    formRecords,
                    `records[${id}][billing_paps]`,
                    billingPaps
                );


                /* ======================================
                   CANTIDAD
                ====================================== */

                addHiddenInput(
                    formRecords,
                    `records[${id}][quantity]`,
                    quantity
                );


                /* ======================================
                   TIPO DE CANTIDAD
                ====================================== */

                addHiddenInput(
                    formRecords,
                    `records[${id}][quantity_type]`,
                    quantityType
                );


                /* ======================================
                   CARGO ADICIONAL
                ====================================== */

                addHiddenInput(
                    formRecords,
                    `records[${id}][additional_charge_type]`,
                    additionalChargeType
                );


                addHiddenInput(
                    formRecords,
                    `records[${id}][additional_charge_quantity]`,
                    additionalQuantity
                );


                addHiddenInput(
                    formRecords,
                    `records[${id}][additional_charge_unit_price]`,
                    additionalUnitPrice
                );

            });


            /* ==========================================
               ENVIAR
            ========================================== */

            generateInvoice.disabled =
                true;


            generateInvoice.textContent =
                @json(__('invoices.create.js.generating'));


            document
                .getElementById('invoiceForm')
                .submit();

        }
    );


    /* =====================================================
       HIDDEN INPUT
    ===================================================== */

    function addHiddenInput(
        container,
        name,
        value
    ) {

        const input =
            document.createElement('input');


        input.type =
            'hidden';


        input.name =
            name;


        input.value =
            value ?? '';


        container.appendChild(
            input
        );

    }


    /* =====================================================
       FORMATO MONEDA
    ===================================================== */

    function formatMoney(value) {

        return Number(
            value || 0
        ).toLocaleString(
            'en-US',
            {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            }
        );

    }


    /* =====================================================
       FORMATO FECHA
    ===================================================== */

    function formatDate(date) {

        if (!date) {
            return '';
        }


        const parts =
            String(date).split('-');


        if (parts.length !== 3) {
            return date;
        }


        if (
            @json(app()->getLocale()) === 'en'
        ) {

            return `${parts[1]}/${parts[2]}/${parts[0]}`;

        }


        return `${parts[2]}/${parts[1]}/${parts[0]}`;

    }


    /* =====================================================
       ESCAPE HTML
    ===================================================== */

    function escapeHtml(value) {

        return String(
            value ?? ''
        )
        .replace(
            /&/g,
            '&amp;'
        )
        .replace(
            /</g,
            '&lt;'
        )
        .replace(
            />/g,
            '&gt;'
        )
        .replace(
            /"/g,
            '&quot;'
        )
        .replace(
            /'/g,
            '&#039;'
        );

    }


    /* =====================================================
       INICIALIZACIÓN
    ===================================================== */

    updateBillingType();


    taxRate.disabled =
        !taxEnabled.checked;


    shippingRate.disabled =
        !shippingEnabled.checked;


    calculateSummary();

});

</script>

</x-app-layout>
