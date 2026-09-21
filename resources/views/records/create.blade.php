<x-app-layout>

<style>

    /* =========================================================
       BASE
    ========================================================= */

    .record-page {
        padding: 30px 20px;
    }

    .record-container {
        max-width: 1200px;
        margin: 0 auto;
    }


    /* =========================================================
       HEADER
    ========================================================= */

    .record-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
    }

    .record-title {
        font-size: 25px;
        font-weight: 700;
        color: #111827;
        margin: 0;
    }

    .record-subtitle {
        color: #6b7280;
        margin-top: 4px;
        font-size: 13px;
    }


    /* =========================================================
       BOTON REGRESAR
    ========================================================= */

    .back-button {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 9px 15px;
        border-radius: 8px;
        background: #f3f4f6;
        color: #374151;
        text-decoration: none;
        font-size: 14px;
        transition: .2s;
    }

    .back-button:hover {
        background: #e5e7eb;
    }


    /* =========================================================
       CARD
    ========================================================= */

    .record-card {
        background: white;
        border-radius: 12px;
        box-shadow: 0 2px 10px rgba(0,0,0,.06);
        overflow: visible;
    }

    .record-card-header {
        padding: 20px 24px;
        border-bottom: 1px solid #e5e7eb;
    }

    .record-card-title {
        font-size: 18px;
        font-weight: 700;
        color: #111827;
    }

    .record-card-subtitle {
        font-size: 13px;
        color: #6b7280;
        margin-top: 4px;
    }

    .record-body {
        padding: 24px;
    }


    /* =========================================================
       SECCIONES
    ========================================================= */

    .form-section-title {
        font-size: 14px;
        font-weight: 700;
        color: #374151;
        margin-bottom: 15px;
        padding-bottom: 8px;
        border-bottom: 1px solid #e5e7eb;
    }


    /* =========================================================
       GRID
    ========================================================= */

    .form-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 18px;
    }

    .form-group {
        min-width: 0;
    }

    .form-group.full {
        grid-column: 1 / -1;
    }


    /* =========================================================
       LABEL
    ========================================================= */

    .form-label {
        display: block;
        margin-bottom: 6px;
        font-size: 13px;
        font-weight: 600;
        color: #374151;
    }

    .form-required {
        color: #dc2626;
    }


    /* =========================================================
       INPUTS
    ========================================================= */

    .form-input,
    .form-textarea,
    select.form-input {

        width: 100%;
        box-sizing: border-box;
        border: 1px solid #d1d5db;
        border-radius: 8px;
        padding: 10px 12px;
        font-size: 14px;
        background: white;
        color: #111827;
        outline: none;
        transition: .2s;
    }

    .form-input,
    select.form-input {
        height: 40px;
    }

    .form-textarea {
        min-height: 90px;
        resize: vertical;
    }

    .form-input:focus,
    .form-textarea:focus,
    select.form-input:focus {

        border-color: #6b7280;

        box-shadow:
            0 0 0 2px rgba(107,114,128,.10);
    }


    /* =========================================================
       AUTOCOMPLETE
    ========================================================= */

    .autocomplete {
        position: relative;
    }

    .autocomplete-options {

        display: none;

        position: absolute;

        left: 0;
        right: 0;

        top: calc(100% + 3px);

        z-index: 1000;

        background: white;

        border: 1px solid #d1d5db;

        border-radius: 8px;

        box-shadow:
            0 8px 20px rgba(0,0,0,.10);

        max-height: 220px;

        overflow-y: auto;
    }

    .autocomplete-option {

        padding: 10px 12px;

        cursor: pointer;

        font-size: 14px;

        color: #374151;

        border-bottom: 1px solid #f3f4f6;

    }

    .autocomplete-option:last-child {
        border-bottom: none;
    }

    .autocomplete-option:hover {
        background: #f3f4f6;
    }

    .autocomplete-option.hidden {
        display: none;
    }

    .new-entry-hint {

        margin-top: 5px;

        font-size: 11px;

        color: #6b7280;
    }


    /* =========================================================
       IMAGEN
    ========================================================= */

    .image-upload-container {

        border: 1px dashed #d1d5db;

        border-radius: 10px;

        padding: 15px;

        background: #fafafa;
    }

    .image-upload-button {

        display: inline-flex;

        align-items: center;

        justify-content: center;

        gap: 8px;

        cursor: pointer;

        padding: 9px 14px;

        border-radius: 8px;

        background: #f3f4f6;

        color: #374151;

        font-size: 13px;

        font-weight: 600;

        transition: .2s;
    }

    .image-upload-button:hover {
        background: #e5e7eb;
    }

    /* =========================================================
   MENU DE ORIGEN DE IMAGEN
========================================================= */

.image-source-modal {

position: fixed;

inset: 0;

z-index: 99999;

display: flex;

align-items: center;

justify-content: center;

background: rgba(0,0,0,.45);

padding: 20px;

}

.image-source-box {

width: 100%;

max-width: 360px;

background: white;

border-radius: 14px;

padding: 20px;

box-shadow:
    0 15px 40px rgba(0,0,0,.20);

}

.image-source-title {

font-size: 17px;

font-weight: 700;

color: #111827;

margin-bottom: 15px;

text-align: center;

}

.image-source-option {

width: 100%;

border: 1px solid #e5e7eb;

background: #f9fafb;

color: #374151;

border-radius: 9px;

padding: 13px 15px;

margin-bottom: 10px;

font-size: 14px;

font-weight: 600;

cursor: pointer;

text-align: left;

}

.image-source-option:hover {

background: #f3f4f6;

}

.image-source-cancel {

width: 100%;

border: none;

background: transparent;

color: #6b7280;

padding: 10px;

font-size: 13px;

cursor: pointer;

}

.image-source-cancel:hover {

color: #111827;

}

    .image-preview-container {
    margin-top: 15px;
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
    gap: 15px;
}

    .image-preview {

        max-width: 250px;

        max-height: 180px;

        border-radius: 8px;

        object-fit: cover;

        display: block;
    }

    .image-preview-actions {

        display: flex;

        align-items: center;

        gap: 12px;

        margin-top: 8px;
    }

    .image-name {

        font-size: 12px;

        color: #6b7280;
    }

    .image-remove-button {

        border: none;

        background: transparent;

        color: #dc2626;

        cursor: pointer;

        font-size: 12px;
    }

    .image-remove-button:hover {
        text-decoration: underline;
    }


    /* =========================================================
       ERROR
    ========================================================= */

    .error-box {

        background: #fef2f2;

        border: 1px solid #fecaca;

        color: #991b1b;

        padding: 12px 15px;

        border-radius: 8px;

        margin-bottom: 20px;

        font-size: 13px;
    }

    .error-box strong {
        font-weight: 700;
    }

    .error-box ul {

        margin: 7px 0 0 18px;

        padding: 0;
    }

    .error-box li {
        margin-bottom: 3px;
    }


    /* =========================================================
       FOOTER
    ========================================================= */

    .form-footer {

        display: flex;

        justify-content: flex-end;

        gap: 10px;

        padding-top: 25px;

        margin-top: 25px;

        border-top: 1px solid #e5e7eb;
    }

    .btn-cancel,
    .btn-save {

        border: none;

        border-radius: 8px;

        padding: 10px 17px;

        cursor: pointer;

        font-size: 13px;

        text-decoration: none;
    }

    .btn-cancel {

        background: #f3f4f6;

        color: #374151;
    }

    .btn-cancel:hover {
        background: #e5e7eb;
    }

    .btn-save {

        background: #111827;

        color: white;
    }

    .btn-save:hover {
        background: #1f2937;
    }


    /* =========================================================
       RESPONSIVE
    ========================================================= */

    @media(max-width: 750px) {

        .form-grid {
            grid-template-columns: 1fr;
        }

        .form-group.full {
            grid-column: auto;
        }

        .record-header {

            align-items: flex-start;

            gap: 15px;

            flex-direction: column;
        }

    }

    @media(max-width: 600px) {

        .record-page {
            padding: 18px 12px;
        }

        .record-body {
            padding: 18px;
        }

        .record-card-header {
            padding: 18px;
        }

        .record-title {
            font-size: 21px;
        }

    }

</style>


<div class="record-page">

    <div class="record-container">


        {{-- =====================================================
             ENCABEZADO
        ====================================================== --}}

        <div class="record-header">

            <div>

                <h1 class="record-title">
                {{ __('records.new_record') }}
                </h1>

                <p class="record-subtitle">
                {{ __('records.capture_information') }}
                </p>

            </div>


            <a
                href="{{ route('records.index') }}"
                class="back-button"
            >
                ← {{ __('records.return') }}
            </a>

        </div>


        {{-- =====================================================
             TARJETA
        ====================================================== --}}

        <div class="record-card">


            <div class="record-card-header">

                <div class="record-card-title">
                {{ __('records.modal.information') }}
                </div>

                <div class="record-card-subtitle">
                {{ __('records.modal.complete_data') }}
                </div>

            </div>


            {{-- =================================================
                 ERRORES
            ================================================== --}}

            @if($errors->any())

                <div style="padding:20px 24px 0;">

                    <div class="error-box">

                        <strong>
                        {{ __('records.modal.fix_errors') }}
                        </strong>

                        <ul>

                            @foreach($errors->all() as $error)

                                <li>
                                    {{ $error }}
                                </li>

                            @endforeach

                        </ul>

                    </div>

                </div>

            @endif


            {{-- =================================================
                 FORMULARIO
            ================================================== --}}

            <form
                method="POST"
                action="{{ route('records.store') }}"
                enctype="multipart/form-data"
            >

                @csrf


                <div class="record-body">


                    {{-- =================================================
                         DATOS DEL EMBARQUE
                    ================================================== --}}

                    <div class="form-section-title">
                    {{ __('records.modal.shipment_data') }}
                    </div>


                    <div class="form-grid">


                        {{-- =================================================
                             IMAGEN
                        ================================================== --}}

                        <div class="form-group full">

                            <label class="form-label">
                            {{ __('records.modal.image') }}
                            </label>


                            <div class="image-upload-container">

                            <button
    type="button"
    id="addImageButton"
    class="image-upload-button"
>
    📷 {{ __('records.modal.add_image') }}
</button>

<input
    type="file"
    name="images[]"
    id="recordImages"
    accept="image/jpeg,image/png,image/webp"
    multiple
    hidden
>

<input
    type="file"
    id="recordCameraInput"
    accept="image/jpeg,image/png,image/webp"
    capture="environment"
    hidden
>
<div
    id="imageSourceModal"
    class="image-source-modal"
    style="display:none;"
>
    <div class="image-source-box">

        <div class="image-source-title">
            {{ __('records.modal.add_image') }}
        </div>

        <button
            type="button"
            id="takePhotoButton"
            class="image-source-option"
        >
            📷 Tomar foto
        </button>

        <button
            type="button"
            id="chooseGalleryButton"
            class="image-source-option"
        >
            🖼️ Seleccionar de galería / archivos
        </button>

        <button
            type="button"
            id="cancelImageSource"
            class="image-source-cancel"
        >
            {{ __('records.modal.cancel') }}
        </button>

    </div>
</div>


                                <div
                                    id="imagePreviewContainer"
                                    class="image-preview-container"
                                    style="display:none;"
                                >

                                    <img
                                        id="imagePreview"
                                        class="image-preview"
                                        src=""
                                        alt="{{ __('records.modal.preview_alt') }}"
                                    >


                                    <div class="image-preview-actions">

                                        <span
                                            id="imageName"
                                            class="image-name"
                                        ></span>


                                        <button
                                            type="button"
                                            id="removeImage"
                                            class="image-remove-button"
                                        >
                                        {{ __('records.modal.remove_image') }}
                                        </button>

                                    </div>

                                </div>

                            </div>

                        </div>


                        {{-- =================================================
                             FECHA
                        ================================================== --}}

                        <div class="form-group">

                            <label class="form-label">

                            {{ __('records.table.date') }}

                                <span class="form-required">
                                    *
                                </span>

                            </label>


                            <input
                                type="date"
                                name="date"
                                class="form-input"
                                value="{{ old('date', date('Y-m-d')) }}"
                                required
                            >

                        </div>


                        {{-- =================================================
                             NÚMERO DE FACTURA
                        ================================================== --}}

                        <div class="form-group">

                            <label class="form-label">

                            {{ __('records.table.invoice_number') }}

                                

                            </label>


                            <input
                                type="text"
                                name="invoice_number"
                                class="form-input"
                                value="{{ old('invoice_number') }}"
                                placeholder="{{ __('records.table.invoice_number') }}"
                                
                            >

                        </div>


                        {{-- =================================================
                             PAPS
                        ================================================== --}}

                        <div class="form-group">

                            <label class="form-label">
                            {{ __('records.table.paps') }}
                            </label>


                            <input
                                type="text"
                                name="paps_number"
                                class="form-input"
                                value="{{ old('paps_number') }}"
                                placeholder="{{ __('records.table.paps') }}"
                            >

                        </div>


                    </div>


                    <br>


                    {{-- =================================================
                         DATOS DE TRASLADO
                    ================================================== --}}

                    <div class="form-section-title">
                    {{ __('records.modal.transport_data') }}
                    </div>


                    <div class="form-grid">


                        {{-- =================================================
                             LUGAR DE SALIDA
                        ================================================== --}}

                        <div class="form-group">

                            <label class="form-label">
                            {{ __('records.modal.origin') }}
                            </label>


                            <input
                                type="text"
                                name="origin"
                                class="form-input"
                                value="{{ old('origin') }}"
                                placeholder="{{ __('records.modal.origin') }}"
                            >

                        </div>


                        {{-- =================================================
                             LUGAR DE LLEGADA
                        ================================================== --}}

                        <div class="form-group">

                            <label class="form-label">
                            {{ __('records.modal.destination') }}
                            </label>


                            <input
                                type="text"
                                name="destination"
                                class="form-input"
                                value="{{ old('destination') }}"
                                placeholder="{{ __('records.modal.destination') }}"
                            >

                        </div>


                        {{-- =================================================
                             CANTIDAD
                        ================================================== --}}

                        <div class="form-group">

                            <label class="form-label">
                            {{ __('records.modal.quantity') }}
                            </label>


                            <input
                                type="number"
                                name="quantity"
                                class="form-input"
                                value="{{ old('quantity') }}"
                                min="0"
                                step="1"
                            >

                        </div>


                        {{-- =================================================
                             TIPO DE CANTIDAD
                        ================================================== --}}

                        <div class="form-group">

                            <label class="form-label">
                            {{ __('records.modal.type') }}
                            </label>


                            <select
                                name="quantity_type"
                                class="form-input"
                            >

                                <option value="">
                                {{ __('records.modal.select') }}
                                </option>


                                <option
                                    value="palets"
                                    @selected(old('quantity_type') === 'palets')
                                >
                                {{ __('records.modal.palets') }}
                                </option>


                                <option
                                    value="contenedores"
                                    @selected(old('quantity_type') === 'contenedores')
                                >
                                {{ __('records.modal.containers') }}
                                </option>


                                <option
                                    value="piezas"
                                    @selected(old('quantity_type') === 'piezas')
                                >
                                {{ __('records.modal.pieces') }}
                                </option>

                            </select>

                        </div>

                    </div>


                    <br>


                    {{-- =================================================
                         TRANSPORTE Y PARTICIPANTES
                    ================================================== --}}

                    <div class="form-section-title">
                    {{ __('records.modal.participants') }}
                    </div>


                    <div class="form-grid">


                        {{-- =================================================
                             CLIENTE
                        ================================================== --}}

                        <div class="form-group">

                            <label class="form-label">

                            {{ __('records.modal.company') }}

                                

                            </label>


                            <div class="autocomplete">


                                <input
                                    type="text"
                                    id="companySearch"
                                    name="company_name"
                                    class="form-input"
                                    placeholder="{{ __('records.modal.search_company') }}"
                                    autocomplete="off"
                                    value="{{ old('company_name') }}"
                                    
                                >


                                <input
                                    type="hidden"
                                    name="company_id"
                                    id="companyId"
                                    value="{{ old('company_id') }}"
                                >


                                <div
                                    id="companyOptions"
                                    class="autocomplete-options"
                                >

                                    @foreach($companies as $company)

                                        <div
                                            class="autocomplete-option"
                                            data-id="{{ $company->id }}"
                                            data-name="{{ $company->name }}"
                                        >
                                            {{ $company->name }}
                                        </div>

                                    @endforeach

                                </div>

                            </div>


                            <div class="new-entry-hint">
                            {{ __('records.modal.autocomplete_edit_help') }}
                            </div>

                        </div>


                        {{-- =================================================
                             CHOFER
                        ================================================== --}}

                        <div class="form-group">

                            <label class="form-label">

                            {{ __('records.table.driver') }}


                            </label>


                            <div class="autocomplete">


                                <input
                                    type="text"
                                    id="driverSearch"
                                    name="driver_name"
                                    class="form-input"
                                    placeholder="{{ __('records.modal.search_or_write_driver') }}"
                                    autocomplete="off"
                                    value="{{ old('driver_name') }}"
                                    
                                >


                                <input
                                    type="hidden"
                                    name="driver_id"
                                    id="driverId"
                                    value="{{ old('driver_id') }}"
                                >


                                <div
                                    id="driverOptions"
                                    class="autocomplete-options"
                                >

                                    @foreach($drivers as $driver)

                                        <div
                                            class="autocomplete-option"
                                            data-id="{{ $driver->id }}"
                                            data-name="{{ $driver->name }}"
                                        >
                                            {{ $driver->name }}
                                        </div>

                                    @endforeach

                                </div>

                            </div>


                            <div class="new-entry-hint">
                            {{ __('records.modal.autocomplete_edit_help') }}
                            </div>

                        </div>


                        {{-- =================================================
                             TRACTOR
                        ================================================== --}}

                        <div class="form-group">

                            <label class="form-label">

                            {{ __('records.table.trailer') }}


                            </label>


                            <div class="autocomplete">


                                <input
                                    type="text"
                                    id="trailerSearch"
                                    name="trailer_number"
                                    class="form-input"
                                    placeholder="{{ __('records.modal.search_or_write_trailer') }}"
                                    autocomplete="off"
                                    value="{{ old('trailer_number') }}"
                                    
                                >


                                <input
                                    type="hidden"
                                    name="trailer_id"
                                    id="trailerId"
                                    value="{{ old('trailer_id') }}"
                                >


                                <div
                                    id="trailerOptions"
                                    class="autocomplete-options"
                                >

                                    @foreach($trailers as $trailer)

                                        <div
                                            class="autocomplete-option"
                                            data-id="{{ $trailer->id }}"
                                            data-name="{{ $trailer->number }}"
                                        >
                                            {{ $trailer->number }}
                                        </div>

                                    @endforeach

                                </div>

                            </div>


                            <div class="new-entry-hint">
                            {{ __('records.modal.autocomplete_edit_help') }}
                            </div>

                        </div>


                        {{-- =================================================
                             AGENTE COMERCIAL
                        ================================================== --}}

                        <div class="form-group">

                            <label class="form-label">
                            {{ __('records.table.broker') }}
                            </label>


                            <div class="autocomplete">


                                <input
                                    type="text"
                                    id="brokerSearch"
                                    name="broker_name"
                                    class="form-input"
                                    placeholder="{{ __('records.modal.search_broker') }}"
                                    autocomplete="off"
                                    value="{{ old('broker_name') }}"
                                >


                                <input
                                    type="hidden"
                                    name="broker_id"
                                    id="brokerId"
                                    value="{{ old('broker_id') }}"
                                >


                                <div
                                    id="brokerOptions"
                                    class="autocomplete-options"
                                >

                                    @foreach($brokers as $broker)

                                        <div
                                            class="autocomplete-option"
                                            data-id="{{ $broker->id }}"
                                            data-name="{{ $broker->name }}"
                                        >
                                            {{ $broker->name }}
                                        </div>

                                    @endforeach

                                </div>

                            </div>


                            <div class="new-entry-hint">
                            {{ __('records.modal.autocomplete_edit_help') }}
                            </div>

                        </div>


                        {{-- =================================================
                             TRANSPORTISTA
                        ================================================== --}}

                        <div class="form-group">

                            <label class="form-label">
                            {{ __('records.modal.shipper') }}
                            </label>


                            <div class="autocomplete">


                                <input
                                    type="text"
                                    id="shipperSearch"
                                    name="shipper_name"
                                    class="form-input"
                                    placeholder="{{ __('records.modal.search_shipper') }}"
                                    autocomplete="off"
                                    value="{{ old('shipper_name') }}"
                                >


                                <input
                                    type="hidden"
                                    name="shipper_id"
                                    id="shipperId"
                                    value="{{ old('shipper_id') }}"
                                >


                                <div
                                    id="shipperOptions"
                                    class="autocomplete-options"
                                >

                                    @foreach($shippers as $shipper)

                                        <div
                                            class="autocomplete-option"
                                            data-id="{{ $shipper->id }}"
                                            data-name="{{ $shipper->name }}"
                                        >
                                            {{ $shipper->name }}
                                        </div>

                                    @endforeach

                                </div>

                            </div>


                            <div class="new-entry-hint">
                            {{ __('records.modal.autocomplete_edit_help') }}
                            </div>

                        </div>


                        {{-- =================================================
                             CONSIGNATARIO
                        ================================================== --}}

                        <div class="form-group">

                            <label class="form-label">
                            {{ __('records.table.consignee') }}
                            </label>


                            <div class="autocomplete">


                                <input
                                    type="text"
                                    id="consigneeSearch"
                                    name="consignee_name"
                                    class="form-input"
                                    placeholder="{{ __('records.modal.search_consignee') }}"
                                    autocomplete="off"
                                    value="{{ old('consignee_name') }}"
                                >


                                <input
                                    type="hidden"
                                    name="consignee_id"
                                    id="consigneeId"
                                    value="{{ old('consignee_id') }}"
                                >


                                <div
                                    id="consigneeOptions"
                                    class="autocomplete-options"
                                >

                                    @foreach($consignees as $consignee)

                                        <div
                                            class="autocomplete-option"
                                            data-id="{{ $consignee->id }}"
                                            data-name="{{ $consignee->name }}"
                                        >
                                            {{ $consignee->name }}
                                        </div>

                                    @endforeach

                                </div>

                            </div>


                            <div class="new-entry-hint">
                            {{ __('records.modal.autocomplete_edit_help') }}
                            </div>

                        </div>


                        {{-- =================================================
                             NOTAS
                        ================================================== --}}

                        <div class="form-group full">

                            <label class="form-label">
                            {{ __('records.modal.notes') }}
                            </label>


                            <textarea
                                name="notes"
                                class="form-textarea"
                                rows="3"
                                placeholder="{{ __('records.modal.observations') }}"
                            >{{ old('notes') }}</textarea>

                        </div>

                    </div>


                    {{-- =================================================
                         PIE DEL FORMULARIO
                    ================================================== --}}

                    <div class="form-footer">


                        <a
                            href="{{ route('records.index') }}"
                            class="btn-cancel"
                        >
                        {{ __('records.modal.cancel') }}
                        </a>


                        <button
                            type="submit"
                            class="btn-save"
                        >
                        {{ __('records.modal.save_record') }}
                        </button>

                    </div>


                </div>

            </form>

        </div>

    </div>

</div>


<script>

    document.addEventListener(
        'DOMContentLoaded',
        function () {

/* =====================================================
   IMAGEN
===================================================== */

const imagePreview =
    document.getElementById('imagePreview');

const imageName =
    document.getElementById('imageName');

const removeImage =
    document.getElementById('removeImage');


   /* =====================================================
   IMAGENES
===================================================== */

const imageInput =
    document.getElementById('recordImages');

const cameraInput =
    document.getElementById('recordCameraInput');

const addImageButton =
    document.getElementById('addImageButton');

const imagePreviewContainer =
    document.getElementById('imagePreviewContainer');


if (
    imageInput &&
    cameraInput &&
    addImageButton &&
    imagePreviewContainer
) {

    let selectedFiles = [];


    /* =====================================================
       BOTON AGREGAR IMAGEN
    ===================================================== */

    /* =====================================================
   MENU PARA ELEGIR ORIGEN DE IMAGEN
===================================================== */

const imageSourceModal =
    document.getElementById(
        'imageSourceModal'
    );

const takePhotoButton =
    document.getElementById(
        'takePhotoButton'
    );

const chooseGalleryButton =
    document.getElementById(
        'chooseGalleryButton'
    );

const cancelImageSource =
    document.getElementById(
        'cancelImageSource'
    );


/* =====================================================
   ABRIR MENU
===================================================== */

addImageButton.addEventListener(
    'click',
    function () {

        if (!imageSourceModal) {
            return;
        }

        imageSourceModal.style.display =
            'flex';

    }
);


/* =====================================================
   TOMAR FOTO
===================================================== */

takePhotoButton.addEventListener(
    'click',
    function () {

        imageSourceModal.style.display =
            'none';

        cameraInput.click();

    }
);


/* =====================================================
   GALERIA / ARCHIVOS
===================================================== */

chooseGalleryButton.addEventListener(
    'click',
    function () {

        imageSourceModal.style.display =
            'none';

        imageInput.click();

    }
);


/* =====================================================
   CANCELAR
===================================================== */

cancelImageSource.addEventListener(
    'click',
    function () {

        imageSourceModal.style.display =
            'none';

    }
);


/* =====================================================
   CERRAR TOCANDO FUERA
===================================================== */

imageSourceModal.addEventListener(
    'click',
    function (event) {

        if (
            event.target ===
            imageSourceModal
        ) {

            imageSourceModal.style.display =
                'none';

        }

    }
);


    /* =====================================================
       ARCHIVOS / GALERIA
    ===================================================== */

    imageInput.addEventListener(
    'change',
    function () {

        const newFiles =
            Array.from(
                this.files || []
            );

        /*
         * Limpiamos el input ANTES de
         * reconstruirlo con DataTransfer.
         */
        this.value = '';

        addFiles(newFiles);

    }
);


    /* =====================================================
       CAMARA
    ===================================================== */

    cameraInput.addEventListener(
        'change',
        function () {

            const newFiles =
                Array.from(
                    this.files || []
                );

            addFiles(newFiles);

            /*
             * Limpiamos el input de cámara.
             */

            this.value = '';

        }
    );


    /* =====================================================
       AGREGAR ARCHIVOS
    ===================================================== */

    function addFiles(files) {

        const allowedTypes = [
            'image/jpeg',
            'image/png',
            'image/webp'
        ];


        for (const file of files) {

            if (
                !allowedTypes.includes(
                    file.type
                )
            ) {

                alert(
                    '{{ __('records.modal.image_jpg_png_webp') }}'
                );

                continue;
            }


            if (
                file.size >
                10 * 1024 * 1024
            ) {

                alert(
                    '{{ __('records.modal.image_mb') }}'
                );

                continue;
            }


            selectedFiles.push(file);

        }


        updateImagePreview();

        updateFileInput();

    }


    /* =====================================================
       ACTUALIZAR PREVIEW
    ===================================================== */

    function updateImagePreview() {

        imagePreviewContainer.innerHTML = '';


        if (
            selectedFiles.length === 0
        ) {

            imagePreviewContainer.style.display =
                'none';

            return;

        }


        imagePreviewContainer.style.display =
            'grid';


        selectedFiles.forEach(
            function (file, index) {

                const wrapper =
                    document.createElement(
                        'div'
                    );


                wrapper.style.position =
                    'relative';

                wrapper.style.width =
                    '180px';


                const image =
                    document.createElement(
                        'img'
                    );


                image.className =
                    'image-preview';

                image.style.width =
                    '180px';

                image.style.height =
                    '130px';

                image.style.objectFit =
                    'cover';


                const name =
                    document.createElement(
                        'div'
                    );


                name.className =
                    'image-name';

                name.textContent =
                    file.name;

                name.style.marginTop =
                    '5px';

                name.style.wordBreak =
                    'break-word';


                const removeButton =
                    document.createElement(
                        'button'
                    );


                removeButton.type =
                    'button';

                removeButton.className =
                    'image-remove-button';

                removeButton.textContent =
                    '{{ __('records.modal.remove_image') }}';

                removeButton.style.marginTop =
                    '5px';


                removeButton.addEventListener(
                    'click',
                    function () {

                        selectedFiles.splice(
                            index,
                            1
                        );

                        updateImagePreview();

                        updateFileInput();

                    }
                );


                wrapper.appendChild(
                    image
                );

                wrapper.appendChild(
                    name
                );

                wrapper.appendChild(
                    removeButton
                );


                imagePreviewContainer.appendChild(
                    wrapper
                );


                const reader =
                    new FileReader();


                reader.onload =
                    function (event) {

                        image.src =
                            event.target.result;

                    };


                reader.readAsDataURL(
                    file
                );

            }
        );

    }


    /* =====================================================
       ACTUALIZAR INPUT PRINCIPAL
    ===================================================== */

    function updateFileInput() {

        const dataTransfer =
            new DataTransfer();


        selectedFiles.forEach(
            function (file) {

                dataTransfer.items.add(
                    file
                );

            }
        );


        imageInput.files =
            dataTransfer.files;

    }

}



            /* =====================================================
               AUTOCOMPLETE
            ===================================================== */

            function setupAutocomplete(
                inputId,
                hiddenId,
                optionsId
            ) {

                const input =
                    document.getElementById(
                        inputId
                    );

                const hidden =
                    document.getElementById(
                        hiddenId
                    );

                const options =
                    document.getElementById(
                        optionsId
                    );


                if (
                    !input ||
                    !hidden ||
                    !options
                ) {
                    return;
                }


                function filterOptions() {

                    const search =
                        input.value
                            .toLowerCase()
                            .trim();


                    let hasResults = false;


                    options
                        .querySelectorAll(
                            '.autocomplete-option'
                        )
                        .forEach(
                            function (option) {

                                const name =
                                    (
                                        option
                                            .dataset
                                            .name ||
                                        ''
                                    )
                                    .toLowerCase();


                                if (
                                    search === '' ||
                                    name.includes(
                                        search
                                    )
                                ) {

                                    option.classList
                                        .remove(
                                            'hidden'
                                        );

                                    hasResults =
                                        true;

                                } else {

                                    option.classList
                                        .add(
                                            'hidden'
                                        );

                                }

                            }
                        );


                    options.style.display =
                        hasResults
                            ? 'block'
                            : 'none';

                }


                input.addEventListener(
                    'focus',
                    function () {

                        filterOptions();

                    }
                );


                input.addEventListener(
                    'input',
                    function () {

                        /*
                         * Si el usuario modifica
                         * el texto, eliminamos
                         * el ID seleccionado.
                         */

                        hidden.value = '';

                        filterOptions();

                    }
                );


                options.addEventListener(
                    'click',
                    function (event) {

                        const option =
                            event.target.closest(
                                '.autocomplete-option'
                            );


                        if (!option) {
                            return;
                        }


                        input.value =
                            option.dataset.name;


                        hidden.value =
                            option.dataset.id;


                        options.style.display =
                            'none';

                    }
                );


                document.addEventListener(
                    'click',
                    function (event) {

                        if (
                            !event.target.closest(
                                '#' + inputId
                            ) &&
                            !event.target.closest(
                                '#' + optionsId
                            )
                        ) {

                            options.style.display =
                                'none';

                        }

                    }
                );

            }


            /* =====================================================
               CONFIGURAR AUTOCOMPLETE
            ===================================================== */

            setupAutocomplete(
                'companySearch',
                'companyId',
                'companyOptions'
            );


            setupAutocomplete(
                'driverSearch',
                'driverId',
                'driverOptions'
            );


            setupAutocomplete(
                'trailerSearch',
                'trailerId',
                'trailerOptions'
            );


            setupAutocomplete(
                'brokerSearch',
                'brokerId',
                'brokerOptions'
            );


            setupAutocomplete(
                'shipperSearch',
                'shipperId',
                'shipperOptions'
            );


            setupAutocomplete(
                'consigneeSearch',
                'consigneeId',
                'consigneeOptions'
            );

        }
    );

</script>

</x-app-layout>
