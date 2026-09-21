<x-app-layout>

<style>
    .sfa-page {
        min-height: 100vh;
        background: #f8fafc;
        padding: 30px;
    }

    .sfa-container {
        max-width: 1400px;
        margin: 0 auto;
    }

    .sfa-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 20px;
        margin-bottom: 25px;
    }

    .sfa-title {
        font-size: 28px;
        font-weight: 700;
        color: #111827;
    }

    .sfa-subtitle {
        margin-top: 5px;
        color: #6b7280;
        font-size: 14px;
    }

    .header-actions {
        display: flex;
        align-items: center;
        gap: 10px;
        flex-wrap: wrap;
    }

    .iva-general-display {
        background: #f3f4f6;
        border: 1px solid #e5e7eb;
        padding: 10px 14px;
        border-radius: 8px;
        color: #374151;
        font-size: 14px;
        font-weight: 600;
    }

    .btn-new {
        border: none;
        background: #111827;
        color: white;
        padding: 10px 16px;
        border-radius: 8px;
        cursor: pointer;
        font-size: 14px;
        font-weight: 600;
    }

    .btn-new:hover {
        background: #1f2937;
    }

    .btn-iva {
        background: #2563eb;
    }

    .btn-iva:hover {
        background: #1d4ed8;
    }

    .panel {
        background: white;
        border-radius: 12px;
        border: 1px solid #e5e7eb;
        overflow: hidden;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
    }

    .table-wrapper {
        width: 100%;
        overflow-x: auto;
    }

    .services-table {
        width: 100%;
        border-collapse: collapse;
        min-width: 1000px;
    }

    .services-table th {
        background: #f9fafb;
        color: #374151;
        font-size: 13px;
        font-weight: 700;
        text-align: left;
        padding: 14px 16px;
        border-bottom: 1px solid #e5e7eb;
        white-space: nowrap;
    }

    .services-table td {
        padding: 14px 16px;
        border-bottom: 1px solid #f0f0f0;
        vertical-align: middle;
        color: #374151;
        font-size: 14px;
    }

    .services-table tr:last-child td {
        border-bottom: none;
    }

    .services-table tr:hover {
        background: #fafafa;
    }

    .input {
        width: 100%;
        border: 1px solid #d1d5db;
        border-radius: 7px;
        padding: 8px 10px;
        font-size: 14px;
        background: white;
    }

    .input:focus {
        outline: none;
        border-color: #2563eb;
        box-shadow: 0 0 0 2px rgba(37, 99, 235, 0.1);
    }

    .input-small {
        width: 110px;
    }

    .service-name-input {
        min-width: 170px;
    }

    .description-input {
        min-width: 220px;
    }

    .tax-checkbox {
        width: 18px;
        height: 18px;
        cursor: pointer;
    }

    .iva-cell {
        text-align: center;
        white-space: nowrap;
    }

    .iva-percent {
        font-weight: 700;
        color: #2563eb;
    }

    .iva-empty {
        color: #9ca3af;
    }

    .total-cell {
        font-weight: 700;
        color: #111827;
        white-space: nowrap;
    }

    .status {
        border: 1px solid #d1d5db;
        border-radius: 7px;
        padding: 8px 10px;
        font-size: 13px;
        background: white;
        cursor: pointer;
    }

    .status:focus {
        outline: none;
        border-color: #2563eb;
        box-shadow: 0 0 0 2px rgba(37, 99, 235, 0.1);
    }

    .btn-save {
        border: none;
        background: #16a34a;
        color: white;
        padding: 8px 12px;
        border-radius: 7px;
        cursor: pointer;
        font-size: 13px;
        font-weight: 600;
    }

    .btn-save:hover {
        background: #15803d;
    }

    .empty-state {
        text-align: center;
        padding: 45px 20px;
        color: #6b7280;
    }

    .alert-success {
        margin-bottom: 20px;
        padding: 12px 15px;
        border-radius: 8px;
        background: #dcfce7;
        color: #166534;
        border: 1px solid #bbf7d0;
    }

    .alert-error {
        margin-bottom: 20px;
        padding: 12px 15px;
        border-radius: 8px;
        background: #fee2e2;
        color: #991b1b;
        border: 1px solid #fecaca;
    }

    .alert-error ul {
        margin: 0;
        padding-left: 20px;
    }

    /* =========================================================
       MODALES
    ========================================================= */

    .modal-overlay {
        position: fixed;
        inset: 0;
        background: rgba(0, 0, 0, 0.45);
        display: none;
        align-items: center;
        justify-content: center;
        z-index: 9999;
        padding: 20px;
    }

    .modal {
        width: 100%;
        max-width: 550px;
        background: white;
        border-radius: 12px;
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.2);
        overflow: hidden;
    }

    .modal-small {
        max-width: 380px;
    }

    .modal-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 18px 20px;
        border-bottom: 1px solid #e5e7eb;
    }

    .modal-title {
        font-size: 18px;
        font-weight: 700;
        color: #111827;
    }

    .modal-close {
        border: none;
        background: transparent;
        font-size: 24px;
        color: #6b7280;
        cursor: pointer;
        line-height: 1;
    }

    .modal-body {
        padding: 20px;
    }

    .form-group {
        margin-bottom: 16px;
    }

    .form-label {
        display: block;
        margin-bottom: 7px;
        font-size: 13px;
        font-weight: 700;
        color: #374151;
    }

    .modal-footer {
        display: flex;
        justify-content: flex-end;
        gap: 10px;
        padding: 15px 20px;
        border-top: 1px solid #e5e7eb;
    }

    .btn-cancel {
        border: 1px solid #d1d5db;
        background: white;
        color: #374151;
        padding: 9px 15px;
        border-radius: 7px;
        cursor: pointer;
        font-size: 14px;
        font-weight: 600;
    }

    .btn-cancel:hover {
        background: #f9fafb;
    }

    .btn-primary {
        border: none;
        background: #2563eb;
        color: white;
        padding: 9px 15px;
        border-radius: 7px;
        cursor: pointer;
        font-size: 14px;
        font-weight: 600;
    }

    .btn-primary:hover {
        background: #1d4ed8;
    }

    .checkbox-row {
        display: flex;
        align-items: center;
        gap: 9px;
        margin-top: 5px;
    }

    .checkbox-row label {
        font-size: 14px;
        color: #374151;
        cursor: pointer;
    }

    .preview-box {
        margin-top: 15px;
        padding: 14px;
        border-radius: 8px;
        background: #f9fafb;
        border: 1px solid #e5e7eb;
    }

    .preview-row {
        display: flex;
        justify-content: space-between;
        margin-bottom: 7px;
        font-size: 14px;
    }

    .preview-row:last-child {
        margin-bottom: 0;
        padding-top: 8px;
        border-top: 1px solid #e5e7eb;
        font-weight: 700;
    }

    .iva-preview-label {
        color: #2563eb;
        font-weight: 600;
    }
</style>


<div class="sfa-page">

    <div class="sfa-container">

        {{-- MENSAJES --}}

        @if (session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert-error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        {{-- HEADER --}}

        <div class="sfa-header">

            <div>
                <div class="sfa-title">
                    {{ __('services.title') }}
                </div>

                <div class="sfa-subtitle">
                    {{ __('services.subtitle') }}
                </div>
            </div>

            <div class="header-actions">

                <div class="iva-general-display">
                    IVA general:
                    <span id="ivaGeneralDisplay">
                        {{ number_format($ivaGeneral, 2) }}%
                    </span>
                </div>

                <button
                    type="button"
                    class="btn-new btn-iva"
                    onclick="openIvaModal()"
                >
                    + Agregar IVA
                </button>

                <button
                    type="button"
                    class="btn-new"
                    onclick="openServiceModal()"
                >
                    + {{ __('services.new_service') }}
                </button>

            </div>

        </div>


        {{-- TABLA --}}

        <div class="panel">

            <div class="table-wrapper">

                <table class="services-table">

                    <thead>
                        <tr>
                            <th>Servicio</th>
                            <th>Descripción</th>
                            <th>Precio</th>
                            <th>IVA</th>
                            <th>IVA (%)</th>
                            <th>Total</th>
                            <th>Peso</th>
                            <th>Estado</th>
                            <th>Acción</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse ($services as $service)

                            @php
                                $ivaPorcentaje = $service->tax_enabled
                                    ? (float) $ivaGeneral
                                    : 0;

                                $ivaAmount = $service->tax_enabled
                                    ? ((float) $service->price * $ivaPorcentaje / 100)
                                    : 0;

                                $total = (float) $service->price + $ivaAmount;
                            @endphp

                            <tr>

                                {{-- SERVICIO --}}

                                <td>
                                    <input
                                        type="text"
                                        name="name"
                                        form="service-form-{{ $service->id }}"
                                        class="input service-name-input"
                                        value="{{ $service->name }}"
                                        required
                                    >
                                </td>


                                {{-- DESCRIPCIÓN --}}

                                <td>
                                    <input
                                        type="text"
                                        name="description"
                                        form="service-form-{{ $service->id }}"
                                        class="input description-input"
                                        value="{{ $service->description }}"
                                    >
                                </td>


                                {{-- PRECIO --}}

                                <td>
                                    <input
                                        type="number"
                                        name="price"
                                        form="service-form-{{ $service->id }}"
                                        class="input input-small service-price"
                                        value="{{ $service->price }}"
                                        min="0"
                                        step="0.01"
                                        required
                                    >
                                </td>


                                {{-- IVA --}}

                                <td class="iva-cell">

                                    <input
                                        type="checkbox"
                                        name="tax_enabled"
                                        value="1"
                                        form="service-form-{{ $service->id }}"
                                        class="tax-checkbox service-tax-enabled"
                                        {{ $service->tax_enabled ? 'checked' : '' }}
                                    >

                                </td>


                                {{-- IVA (%) AUTOMÁTICO --}}

                                <td class="iva-cell">

                                    <span
                                        class="iva-percent service-tax-percent {{ $service->tax_enabled ? '' : 'iva-empty' }}"
                                    >
                                        {{ $service->tax_enabled
                                            ? number_format($ivaGeneral, 2) . '%'
                                            : '—'
                                        }}
                                    </span>

                                </td>


                                {{-- TOTAL --}}

                                <td class="total-cell">

                                    <span class="service-total">
                                        ${{ number_format($total, 2) }}
                                    </span>

                                </td>


                                {{-- PESO --}}

                                <td>

                                    <input
                                        type="number"
                                        name="weight"
                                        form="service-form-{{ $service->id }}"
                                        class="input input-small"
                                        value="{{ $service->weight }}"
                                        min="0"
                                        step="0.01"
                                    >

                                </td>


                                {{-- ESTADO
                                     ESTE ES EL CONTROL QUE YA TENÍAS
                                --}}

                                <td>

                                    <select
                                        name="active"
                                        form="service-form-{{ $service->id }}"
                                        class="status"
                                    >

                                        <option
                                            value="1"
                                            {{ $service->active ? 'selected' : '' }}
                                        >
                                            Activo
                                        </option>

                                        <option
                                            value="0"
                                            {{ !$service->active ? 'selected' : '' }}
                                        >
                                            Inactivo
                                        </option>

                                    </select>

                                </td>


                                {{-- ACCIÓN --}}

                                <td>

                                    <form
                                        id="service-form-{{ $service->id }}"
                                        method="POST"
                                        action="{{ route('service-types.update', $service) }}"
                                    >

                                        @csrf

                                        @method('PUT')

                                        <button
                                            type="submit"
                                            class="btn-save"
                                        >
                                            Guardar
                                        </button>

                                    </form>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="9">

                                    <div class="empty-state">
                                        No hay servicios registrados.
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


{{-- =========================================================
     MODAL IVA GENERAL
========================================================== --}}

<div
    id="ivaModal"
    class="modal-overlay"
>

    <div class="modal modal-small">

        <div class="modal-header">

            <div class="modal-title">
                IVA general
            </div>

            <button
                type="button"
                class="modal-close"
                onclick="closeIvaModal()"
            >
                &times;
            </button>

        </div>

        <form
            method="POST"
            action="{{ route('service-types.save-iva') }}"
        >

            @csrf

            <div class="modal-body">

                <div class="form-group">

                    <label class="form-label">
                        Porcentaje de IVA
                    </label>

                    <div style="display:flex; align-items:center; gap:8px;">

                        <input
                            type="number"
                            id="ivaGeneralInput"
                            name="iva_general"
                            class="input"
                            value="{{ $ivaGeneral }}"
                            min="0"
                            max="100"
                            step="0.01"
                            required
                        >

                        <strong>%</strong>

                    </div>

                </div>

                <div style="font-size:13px; color:#6b7280;">

                    Este porcentaje será utilizado automáticamente
                    en todos los servicios que tengan activada la casilla IVA.

                </div>

            </div>

            <div class="modal-footer">

                <button
                    type="button"
                    class="btn-cancel"
                    onclick="closeIvaModal()"
                >
                    Cancelar
                </button>

                <button
                    type="submit"
                    class="btn-primary"
                >
                    Guardar IVA
                </button>

            </div>

        </form>

    </div>

</div>


{{-- =========================================================
     MODAL NUEVO SERVICIO
========================================================== --}}

<div
    id="serviceModal"
    class="modal-overlay"
>

    <div class="modal">

        <div class="modal-header">

            <div class="modal-title">
                {{ __('services.new_service') }}
            </div>

            <button
                type="button"
                class="modal-close"
                onclick="closeServiceModal()"
            >
                &times;
            </button>

        </div>

        <form
            method="POST"
            action="{{ route('service-types.store') }}"
        >

            @csrf

            <div class="modal-body">

                <div class="form-group">

                    <label class="form-label">
                        Nombre del servicio
                    </label>

                    <input
                        type="text"
                        name="name"
                        class="input"
                        required
                    >

                </div>


                <div class="form-group">

                    <label class="form-label">
                        Descripción
                    </label>

                    <input
                        type="text"
                        name="description"
                        class="input"
                    >

                </div>


                <div class="form-group">

                    <label class="form-label">
                        Precio
                    </label>

                    <input
                        type="number"
                        id="newServicePrice"
                        name="price"
                        class="input"
                        min="0"
                        step="0.01"
                        value="0"
                        required
                        oninput="calculateNewServiceTotal()"
                    >

                </div>


                <div class="form-group">

                    <div class="checkbox-row">

                        <input
                            type="checkbox"
                            id="newServiceTaxEnabled"
                            name="tax_enabled"
                            value="1"
                            class="tax-checkbox"
                            onchange="calculateNewServiceTotal()"
                        >

                        <label for="newServiceTaxEnabled">
                            Aplicar IVA
                        </label>

                    </div>

                </div>


                <div class="preview-box">

                    <div class="preview-row">

                        <span>
                            IVA general:
                        </span>

                        <span
                            id="newServiceIvaPercent"
                            class="iva-preview-label"
                        >
                            —
                        </span>

                    </div>


                    <div class="preview-row">

                        <span>
                            IVA calculado:
                        </span>

                        <span id="newServiceIvaAmount">
                            $0.00
                        </span>

                    </div>


                    <div class="preview-row">

                        <span>
                            Total:
                        </span>

                        <span id="newServiceTotal">
                            $0.00
                        </span>

                    </div>

                </div>


                <div
                    class="form-group"
                    style="margin-top:16px;"
                >

                    <label class="form-label">
                        Peso
                    </label>

                    <input
                        type="number"
                        name="weight"
                        class="input"
                        min="0"
                        step="0.01"
                    >

                </div>

            </div>


            <div class="modal-footer">

                <button
                    type="button"
                    class="btn-cancel"
                    onclick="closeServiceModal()"
                >
                    Cancelar
                </button>

                <button
                    type="submit"
                    class="btn-primary"
                >
                    Guardar servicio
                </button>

            </div>

        </form>

    </div>

</div>


<script>

    /*
    |--------------------------------------------------------------------------
    | IVA GENERAL
    |--------------------------------------------------------------------------
    */

    const ivaGeneral =
        {{ json_encode((float) $ivaGeneral) }};


    /*
    |--------------------------------------------------------------------------
    | MODAL IVA
    |--------------------------------------------------------------------------
    */

    function openIvaModal() {

        const modal =
            document.getElementById('ivaModal');

        if (modal) {
            modal.style.display = 'flex';
        }

    }


    function closeIvaModal() {

        const modal =
            document.getElementById('ivaModal');

        if (modal) {
            modal.style.display = 'none';
        }

    }


    /*
    |--------------------------------------------------------------------------
    | MODAL NUEVO SERVICIO
    |--------------------------------------------------------------------------
    */

    function openServiceModal() {

        const modal =
            document.getElementById('serviceModal');

        if (modal) {
            modal.style.display = 'flex';
        }

        calculateNewServiceTotal();

    }


    function closeServiceModal() {

        const modal =
            document.getElementById('serviceModal');

        if (modal) {
            modal.style.display = 'none';
        }

    }


    /*
    |--------------------------------------------------------------------------
    | CALCULAR NUEVO SERVICIO
    |--------------------------------------------------------------------------
    */

    function calculateNewServiceTotal() {

        const priceInput =
            document.getElementById('newServicePrice');

        const taxCheckbox =
            document.getElementById('newServiceTaxEnabled');

        const ivaPercentElement =
            document.getElementById('newServiceIvaPercent');

        const ivaAmountElement =
            document.getElementById('newServiceIvaAmount');

        const totalElement =
            document.getElementById('newServiceTotal');


        if (!priceInput) {
            return;
        }


        const price =
            parseFloat(priceInput.value) || 0;


        const taxEnabled =
            taxCheckbox
                ? taxCheckbox.checked
                : false;


        const ivaAmount =
            taxEnabled
                ? price * ivaGeneral / 100
                : 0;


        const total =
            price + ivaAmount;


        if (ivaPercentElement) {

            ivaPercentElement.textContent =
                taxEnabled
                    ? ivaGeneral.toFixed(2) + '%'
                    : '—';

        }


        if (ivaAmountElement) {

            ivaAmountElement.textContent =
                '$' + ivaAmount.toFixed(2);

        }


        if (totalElement) {

            totalElement.textContent =
                '$' + total.toFixed(2);

        }

    }


    /*
    |--------------------------------------------------------------------------
    | ACTUALIZAR IVA DE CADA SERVICIO
    |--------------------------------------------------------------------------
    */

    function updateServiceRow(row) {

        const priceInput =
            row.querySelector('.service-price');

        const taxCheckbox =
            row.querySelector('.service-tax-enabled');

        const percentElement =
            row.querySelector('.service-tax-percent');

        const totalElement =
            row.querySelector('.service-total');


        if (!priceInput || !taxCheckbox) {
            return;
        }


        const price =
            parseFloat(priceInput.value) || 0;


        const taxEnabled =
            taxCheckbox.checked;


        const ivaAmount =
            taxEnabled
                ? price * ivaGeneral / 100
                : 0;


        const total =
            price + ivaAmount;


        if (percentElement) {

            if (taxEnabled) {

                percentElement.textContent =
                    ivaGeneral.toFixed(2) + '%';

                percentElement.classList.remove(
                    'iva-empty'
                );

            } else {

                percentElement.textContent =
                    '—';

                percentElement.classList.add(
                    'iva-empty'
                );

            }

        }


        if (totalElement) {

            totalElement.textContent =
                '$' + total.toFixed(2);

        }

    }


    /*
    |--------------------------------------------------------------------------
    | EVENTOS DE LOS SERVICIOS
    |--------------------------------------------------------------------------
    */

    document.addEventListener(
        'DOMContentLoaded',
        function () {

            const rows =
                document.querySelectorAll(
                    '.services-table tbody tr'
                );


            rows.forEach(function (row) {

                const priceInput =
                    row.querySelector(
                        '.service-price'
                    );

                const taxCheckbox =
                    row.querySelector(
                        '.service-tax-enabled'
                    );


                if (priceInput) {

                    priceInput.addEventListener(
                        'input',
                        function () {

                            updateServiceRow(row);

                        }
                    );

                }


                if (taxCheckbox) {

                    taxCheckbox.addEventListener(
                        'change',
                        function () {

                            updateServiceRow(row);

                        }
                    );

                }


                updateServiceRow(row);

            });

        }
    );


    /*
    |--------------------------------------------------------------------------
    | CERRAR MODALES AL HACER CLICK AFUERA
    |--------------------------------------------------------------------------
    */

    document.addEventListener(
        'click',
        function (event) {

            const ivaModal =
                document.getElementById('ivaModal');

            const serviceModal =
                document.getElementById('serviceModal');


            if (event.target === ivaModal) {

                closeIvaModal();

            }


            if (event.target === serviceModal) {

                closeServiceModal();

            }

        }
    );

</script>

</x-app-layout>
