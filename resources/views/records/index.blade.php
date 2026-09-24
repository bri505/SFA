<x-app-layout>

<style>

/* =========================================================
   BASE
========================================================= */

.sfa-records {
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

.records-page-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 20px;
}

.records-page-title {
    margin: 0;
    font-size: 23px;
    font-weight: 600;
    color: #1f2937;
}

.records-page-subtitle {
    margin-top: 4px;
    font-size: 12px;
    color: #6b7280;
}


/* =========================================================
   BOTON NUEVO
========================================================= */

.new-record-button {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    padding: 9px 14px;
    border: none;
    border-radius: 6px;
    background: #1f2937;
    color: white;
    font-size: 12px;
    font-weight: 500;
    text-decoration: none;
    cursor: pointer;
    transition: .2s ease;
}

.new-record-button:hover {
    background: #111827;
}

.new-record-button svg {
    width: 15px;
    height: 15px;
}


/* =========================================================
   SUCCESS
========================================================= */

.success-message {
    display: flex;
    align-items: center;
    gap: 8px;
    margin-bottom: 15px;
    padding: 10px 13px;
    border: 1px solid #bbf7d0;
    border-radius: 6px;
    background: #f0fdf4;
    color: #166534;
    font-size: 12px;
}


/* =========================================================
   TABLA
========================================================= */

.records-table-wrapper {
    width: 100%;
    overflow-x: auto;
    background: white;
    border: 1px solid #e5e7eb;
    border-radius: 7px;
}

.records-table {
    width: 100%;
    min-width: 1200px;
    border-collapse: collapse;
    font-size: 12px;
}

.records-table th {
    padding: 9px 12px;
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
    padding: 10px 12px;
    border-bottom: 1px solid #f0f1f3;
    color: #374151;
    white-space: nowrap;
    vertical-align: middle;
}

.records-table tbody tr {
    cursor: pointer;
    transition: background .15s ease;
}

.records-table tbody tr:hover {
    background: #fafafa;
}

.records-table tbody tr:last-child td {
    border-bottom: none;
}

.table-main {
    font-weight: 500;
    color: #1f2937;
}

.table-secondary {
    margin-top: 3px;
    color: #9ca3af;
    font-size: 10px;
}

.record-id {
    display: inline-flex;
    align-items: center;
    padding: 3px 7px;
    border-radius: 4px;
    background: #f3f4f6;
    color: #6b7280;
    font-size: 10px;
    font-weight: 600;
}


/* =========================================================
   ACCIONES TABLA
========================================================= */

.action-buttons {
    display: flex;
    align-items: center;
    gap: 5px;
}

.action-button {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 6px 9px;
    border: 1px solid #d1d5db;
    border-radius: 5px;
    background: white;
    color: #374151;
    font-size: 10px;
    font-weight: 500;
    cursor: pointer;
    transition: .15s ease;
}

.action-button:hover {
    background: #f3f4f6;
    border-color: #9ca3af;
}

.action-button.primary {
    border-color: #1f2937;
    background: #1f2937;
    color: white;
}

.action-button.primary:hover {
    background: #111827;
}

.action-button.service {
    border-color: #d1d5db;
    background: #f9fafb;
    color: #374151;
}

.action-button.service:hover {
    background: #f3f4f6;
}


/* =========================================================
   BOTON SERVICIO TABLA
========================================================= */

.service-table-button {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 6px 9px;
    border: 1px solid #d1d5db;
    border-radius: 5px;
    background: #f9fafb;
    color: #374151;
    font-size: 10px;
    font-weight: 500;
    cursor: pointer;
    transition: .15s ease;
}

.service-table-button:hover {
    background: #f3f4f6;
    border-color: #9ca3af;
}


/* =========================================================
   EMPTY
========================================================= */

.empty-state {
    padding: 40px 20px !important;
    text-align: center !important;
    color: #9ca3af !important;
}

.empty-state-title {
    margin-bottom: 4px;
    color: #6b7280;
    font-size: 13px;
    font-weight: 600;
}

.empty-state-text {
    color: #9ca3af;
    font-size: 11px;
}


/* =========================================================
   MODAL
========================================================= */

.record-modal {
    position: fixed;
    inset: 0;
    z-index: 9999;
    display: none;
    align-items: center;
    justify-content: center;
    padding: 20px;
    background: rgba(17, 24, 39, .45);
}

.record-modal.active {
    display: flex;
}

.record-modal-box {
    width: 100%;
    max-width: 780px;
    max-height: 92vh;
    overflow-y: auto;
    background: white;
    border-radius: 8px;
    box-shadow: 0 20px 50px rgba(0, 0, 0, .20);
    position: relative;
}

.record-modal-box.small {
    max-width: 500px;
}


/* =========================================================
   MODAL HEADER
========================================================= */

.modal-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 15px 20px;
    border-bottom: 1px solid #e5e7eb;
}

.modal-title {
    font-size: 16px;
    font-weight: 600;
    color: #1f2937;
}

.modal-subtitle {
    margin-top: 2px;
    font-size: 11px;
    color: #6b7280;
}

.modal-close {
    width: 30px;
    height: 30px;
    display: flex;
    align-items: center;
    justify-content: center;
    border: none;
    border-radius: 5px;
    background: transparent;
    color: #6b7280;
    font-size: 21px;
    cursor: pointer;
}

.modal-close:hover {
    background: #f3f4f6;
    color: #111827;
}


/* =========================================================
   MODAL BODY
========================================================= */

.modal-body {
    padding: 18px 20px;
}


/* =========================================================
   SECCIONES
========================================================= */

.form-section {
    margin-bottom: 20px;
}

.detail-section {
    margin-bottom: 20px;
}

.detail-section-title,
.form-section-title,
.service-form-title {
    margin-bottom: 11px;
    padding-bottom: 7px;
    border-bottom: 1px solid #e5e7eb;
    font-size: 11px;
    font-weight: 600;
    color: #374151;
    text-transform: uppercase;
    letter-spacing: .04em;
}


/* =========================================================
   GRID
========================================================= */

.detail-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 11px 18px;
}

.form-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 13px 16px;
}

.form-grid.three {
    grid-template-columns: repeat(3, 1fr);
}

.detail-item,
.form-group {
    min-width: 0;
}

.form-group.full {
    grid-column: 1 / -1;
}


/* =========================================================
   DETALLE
========================================================= */

.detail-label {
    display: block;
    margin-bottom: 3px;
    font-size: 10px;
    color: #9ca3af;
    text-transform: uppercase;
    letter-spacing: .03em;
}

.detail-value {
    font-size: 12px;
    font-weight: 500;
    color: #374151;
    word-break: break-word;
}

.detail-notes {
    padding: 10px 12px;
    min-height: 40px;
    border: 1px solid #e5e7eb;
    border-radius: 6px;
    background: #f9fafb;
    color: #4b5563;
    font-size: 12px;
    line-height: 1.5;
    white-space: pre-wrap;
}


/* =========================================================
   IMAGEN DETALLE
========================================================= */

.detail-image-section {
    margin-bottom: 20px;
}

.detail-images-container {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
    gap: 15px;
    padding: 10px;
    background: #f9fafb;
    border: 1px solid #e5e7eb;
    border-radius: 7px;
}

.detail-image-item {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 6px;
}

.detail-image {
    display: block;
    width: 100%;
    height: 180px;
    border-radius: 7px;
    object-fit: contain;
    background: white;
    border: 1px solid #e5e7eb;
    cursor: pointer;
}


/* =========================================================
   IMAGEN EDICION
========================================================= */

.edit-image-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 10px;
    padding: 12px;
    background: #f9fafb;
    border: 1px solid #e5e7eb;
    border-radius: 7px;
}

.edit-image-preview {
    display: none;
    width: 100%;
    padding-top: 10px;
    text-align: center;
}

.edit-image-preview img {
    display: block;
    max-width: 100%;
    max-height: 260px;
    margin: 0 auto;
    border-radius: 7px;
    object-fit: contain;
}

.edit-image-empty {
    width: 100%;
    padding: 35px 15px;
    text-align: center;
    color: #9ca3af;
    font-size: 11px;
}

.edit-image-current-label {
    font-size: 10px;
    color: #6b7280;
}


/* =========================================================
   FORMULARIO
========================================================= */

#editRecordForm {
    width: 100%;
    pointer-events: auto;
}

#editRecordForm * {
    pointer-events: auto;
}

.form-label {
    display: block;
    margin-bottom: 5px;
    font-size: 11px;
    font-weight: 500;
    color: #4b5563;
}

.form-required {
    color: #dc2626;
}

.form-input,
.form-textarea,
.form-select {
    width: 100%;
    box-sizing: border-box;
    border: 1px solid #d1d5db;
    border-radius: 5px;
    padding: 8px 10px;
    background: white;
    color: #1f2937;
    font-size: 12px;
    outline: none;
}

.form-input {
    height: 34px;
}

.form-textarea {
    min-height: 70px;
    resize: vertical;
}

.form-input:focus,
.form-textarea:focus,
.form-select:focus {
    border-color: #6b7280;
    box-shadow: 0 0 0 2px rgba(107, 114, 128, .10);
}

.form-input[type="file"] {
    height: auto;
    padding: 7px;
    cursor: pointer;
}


/* =========================================================
   AUTOCOMPLETE
========================================================= */

.autocomplete {
    position: relative;
    width: 100%;
}

.autocomplete-list {
    position: absolute;
    top: calc(100% + 2px);
    left: 0;
    right: 0;
    z-index: 10001;
    display: none;
    max-height: 180px;
    overflow-y: auto;
    background: white;
    border: 1px solid #d1d5db;
    border-radius: 5px;
    box-shadow: 0 8px 20px rgba(0, 0, 0, .10);
}

.autocomplete-list.active {
    display: block;
}

.autocomplete-item {
    padding: 8px 10px;
    border-bottom: 1px solid #f0f1f3;
    color: #374151;
    font-size: 12px;
    cursor: pointer;
}

.autocomplete-item:last-child {
    border-bottom: none;
}

.autocomplete-item:hover {
    background: #f3f4f6;
}

.autocomplete-empty {
    padding: 9px 10px;
    color: #9ca3af;
    font-size: 11px;
    font-style: italic;
}


/* =========================================================
   FOOTER
========================================================= */

.modal-footer {
    display: flex;
    justify-content: flex-end;
    gap: 8px;
    padding: 12px 20px;
    border-top: 1px solid #e5e7eb;
}


/* =========================================================
   SERVICIOS
========================================================= */

.edit-services-container {
    display: flex;
    flex-direction: column;
    gap: 10px;
    margin-bottom: 10px;
}

.edit-service-row {
    display: grid;
    grid-template-columns: 2fr .8fr 1fr 1fr auto;
    gap: 8px;
    align-items: end;
    padding: 10px;
    border: 1px solid #e5e7eb;
    border-radius: 6px;
    background: #f9fafb;
}

.service-row-field {
    min-width: 0;
}

.service-row-field label {
    display: block;
    margin-bottom: 4px;
    color: #6b7280;
    font-size: 9px;
    text-transform: uppercase;
}

.service-row-field input,
.service-row-field select {
    width: 100%;
    height: 32px;
    box-sizing: border-box;
    padding: 6px 8px;
    border: 1px solid #d1d5db;
    border-radius: 5px;
    background: white;
    color: #374151;
    font-size: 11px;
    outline: none;
}

.service-row-field input:focus,
.service-row-field select:focus {
    border-color: #6b7280;
}

.service-remove-button {
    width: 32px;
    height: 32px;
    border: 1px solid #d1d5db;
    border-radius: 5px;
    background: white;
    color: #6b7280;
    font-size: 18px;
    cursor: pointer;
}

.service-remove-button:hover {
    background: #f3f4f6;
    color: #111827;
}

.add-service-button {
    padding: 7px 10px;
    border: 1px dashed #c7cbd1;
    border-radius: 5px;
    background: white;
    color: #4b5563;
    font-size: 10px;
    cursor: pointer;
}

.add-service-button:hover {
    background: #f9fafb;
    border-color: #9ca3af;
}

.services-total {
    margin-top: 10px;
    text-align: right;
    color: #1f2937;
    font-size: 12px;
    font-weight: 600;
}

.services-list {
    display: flex;
    flex-direction: column;
    gap: 7px;
}

.service-view-item {
    display: grid;
    grid-template-columns: 1fr auto auto;
    gap: 15px;
    align-items: center;
    padding: 9px 10px;
    border: 1px solid #e5e7eb;
    border-radius: 5px;
    background: #f9fafb;
}

.service-view-name {
    color: #374151;
    font-size: 12px;
    font-weight: 500;
}

.service-view-qty {
    color: #6b7280;
    font-size: 11px;
}

.service-view-price {
    color: #1f2937;
    font-size: 12px;
    font-weight: 600;
}


/* =========================================================
   SERVICIO ADMIN
========================================================= */

.service-form-section {
    margin-bottom: 20px;
}

.service-record-info {
    display: grid;
    grid-template-columns: 1fr;
    gap: 12px;
    margin-bottom: 18px;
    padding: 12px;
    border: 1px solid #e5e7eb;
    border-radius: 6px;
    background: #f9fafb;
}

.service-info-label {
    display: block;
    margin-bottom: 3px;
    font-size: 9px;
    color: #9ca3af;
    text-transform: uppercase;
}

.service-info-value {
    font-size: 12px;
    font-weight: 500;
    color: #374151;
}

.service-form-grid {
    display: grid;
    grid-template-columns: 2fr 1fr;
    gap: 13px 16px;
}

.service-form-group.full {
    grid-column: 1 / -1;
}

.service-form-label {
    display: block;
    margin-bottom: 5px;
    font-size: 11px;
    font-weight: 500;
    color: #4b5563;
}

.service-form-input,
.service-form-select,
.service-form-textarea {
    width: 100%;
    box-sizing: border-box;
    border: 1px solid #d1d5db;
    border-radius: 5px;
    padding: 8px 10px;
    background: white;
    color: #1f2937;
    font-size: 12px;
    outline: none;
}

.service-form-input,
.service-form-select {
    height: 34px;
}

.service-form-textarea {
    min-height: 70px;
    resize: vertical;
}


/* =========================================================
   RESPONSIVE
========================================================= */

@media (max-width: 900px) {

    .form-grid.three {
        grid-template-columns: repeat(2, 1fr);
    }

    .edit-service-row {
        grid-template-columns: repeat(2, 1fr);
    }

    .service-remove-button {
        align-self: end;
    }
}

@media (max-width: 800px) {

    .sfa-container {
        padding: 18px;
    }

    .detail-grid,
    .form-grid,
    .service-form-grid {
        grid-template-columns: 1fr;
    }

    .form-grid.three {
        grid-template-columns: 1fr;
    }

    .form-group.full,
    .service-form-group.full {
        grid-column: auto;
    }

    .edit-service-row {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 600px) {

    .sfa-container {
        padding: 14px;
    }

    .records-page-header {
        align-items: flex-start;
        gap: 10px;
    }

    .new-record-button span:last-child {
        display: none;
    }

    .record-modal {
        padding: 10px;
    }

    .record-modal-box {
        max-height: 95vh;
    }

    .modal-body {
        padding: 15px;
    }

    .modal-footer {
        padding: 10px 15px;
    }

    .service-view-item {
        grid-template-columns: 1fr auto;
    }

    .service-view-price {
        grid-column: 2;
    }
}

.edit-images-container {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
    gap: 15px;
    margin-top: 15px;
}

.edit-image-item {
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 8px;
    background: #f9fafb;
    border: 1px solid #e5e7eb;
    border-radius: 7px;
}

.edit-image-gallery {
    display: block;
    width: 100%;
    height: 180px;
    object-fit: contain;
    border-radius: 7px;
    background: white;
    cursor: pointer;
}
/* ============================================================
   ALINEACIÓN DE LA COLUMNA DE SERVICIOS
============================================================ */

.record-table td:last-child {
    text-align: center;
    vertical-align: middle;
    padding-left: 8px;
    padding-right: 8px;
}

.record-table td:last-child .action-button.service {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto;
    white-space: nowrap;
}

</style>


{{-- ============================================================
     DATOS PARA JAVASCRIPT
============================================================ --}}

@php

    /*
    |--------------------------------------------------------------------------
    | DATOS PARA AUTOCOMPLETE
    |--------------------------------------------------------------------------
    */

    $autocompleteData = [

        'company' => $companies->map(function ($item) {
            return [
                'id' => $item->id,
                'value' => $item->name,
            ];
        })->values()->all(),

        'driver' => $drivers->map(function ($item) {
            return [
                'id' => $item->id,
                'value' => $item->name,
            ];
        })->values()->all(),

        'trailer' => $trailers->map(function ($item) {
            return [
                'id' => $item->id,
                'value' => $item->number,
            ];
        })->values()->all(),

        'broker' => $brokers->map(function ($item) {
            return [
                'id' => $item->id,
                'value' => $item->name,
            ];
        })->values()->all(),

        'shipper' => $shippers->map(function ($item) {
            return [
                'id' => $item->id,
                'value' => $item->name,
            ];
        })->values()->all(),

        'consignee' => $consignees->map(function ($item) {
            return [
                'id' => $item->id,
                'value' => $item->name,
            ];
        })->values()->all(),

    ];


    /*
    |-------------------------------------------------------------------------- 
    | IVA GENERAL
    |--------------------------------------------------------------------------
    |
    | El porcentaje se obtiene desde:
    |
    | app_settings
    | key = iva_general
    |
    | Este valor es el IVA que se utilizará para todos los servicios
    | que tengan tax_enabled = true.
    |
    */

    $ivaGeneral = \App\Models\AppSetting::where(
        'key',
        'iva_general'
    )->value('value');

    $ivaGeneral = $ivaGeneral !== null
        ? (float) $ivaGeneral
        : 0;


    /*
    |-------------------------------------------------------------------------- 
    | TIPOS DE SERVICIO
    |--------------------------------------------------------------------------
    |
    | tax_enabled:
    |   true  = el servicio causa IVA
    |   false = el servicio no causa IVA
    |
    | IMPORTANTE:
    | Ya NO utilizamos service_types.tax_rate para determinar
    | el porcentaje del IVA.
    |
    | El porcentaje siempre viene de iva_general.
    |
    */

    $serviceTypesData = $serviceTypes->map(function ($serviceType) {

        return [

            'id' => $serviceType->id,

            'name' => $serviceType->name,

            'price' => (float) $serviceType->price,

            'tax_enabled' => (bool) $serviceType->tax_enabled,

            /*
            |--------------------------------------------------------------------------
            | PESO CONFIGURADO DEL SERVICIO
            |--------------------------------------------------------------------------
            |
            | Es únicamente informativo.
            |
            | Ejemplo:
            | Precio $50 → corresponde a 100 kg.
            |
            | NO se realiza ningún cálculo con este valor.
            |
            */

            'weight' => $serviceType->weight !== null
                ? (float) $serviceType->weight
                : null,

            'weight_unit' => $serviceType->weight_unit,

        ];

    })->values()->all();

@endphp



<div class="sfa-records">

    <div class="sfa-container">

        {{-- =====================================================
             HEADER
        ====================================================== --}}

        <div class="records-page-header">

            <div>

                <h1 class="records-page-title">
                    {{ __('records.title') }}
                </h1>

                <div class="records-page-subtitle">
                    {{ __('records.subtitle') }}
                </div>

            </div>


            <a
                href="{{ route('records.create') }}"
                class="new-record-button"
            >
                <span>＋</span>
                <span>{{ __('records.new_record') }}</span>
            </a>

        </div>


        {{-- =====================================================
             SUCCESS
        ====================================================== --}}

        @if(session('success'))

            <div class="success-message">
                {{ session('success') }}
            </div>

        @endif


        {{-- =====================================================
             TABLA
        ====================================================== --}}

        <div class="records-table-wrapper">

            <table class="records-table">

                <thead>

                    <tr>

                        <th>{{ __('records.table.date') }}</th>
                        <th>{{ __('records.table.company') }}</th>
                        <th>{{ __('records.table.driver') }}</th>
                        <th>{{ __('records.table.trailer') }}</th>
                        <th>{{ __('records.table.invoice_number') }}</th>
                        <th>{{ __('records.table.paps') }}#</th>
                        <th>{{ __('records.table.shipper') }}</th>
                        <th>{{ __('records.table.consignee') }}</th>
                        <th>{{ __('records.table.broker') }}</th>
                        <th>{{ __('records.table.record') }}</th>
                        <th>{{ __('records.table.registered_by') }}</th>
                        <th>{{ __('records.table.actions') }}</th>

                        @if(auth()->user()->role === 'admin')
                            <th>{{ __('records.table.services') }}</th>
                        @endif

                    </tr>

                </thead>

                <tbody>

                    @forelse($records as $record)

                        @php

                            /*
                            |-------------------------------------------------------------------------- 
                            | IMÁGENES DEL REGISTRO
                            |--------------------------------------------------------------------------
                            */

                            $imageUrls = $record->images->map(function ($image) {

                                return [
                                    'id' => $image->id,
                                    'url' => \Illuminate\Support\Facades\Storage::disk('public')->url(
                                        $image->image_path
                                    ),
                                ];

                            })->values();


                            /*
                            |-------------------------------------------------------------------------- 
                            | SERVICIOS DEL REGISTRO
                            |--------------------------------------------------------------------------
                            */

                            $services = $record->services ?? collect();


                            /*
                            |-------------------------------------------------------------------------- 
                            | DATOS DE SERVICIOS PARA JAVASCRIPT
                            |--------------------------------------------------------------------------
                            |
                            | El IVA se determina mediante:
                            |
                            | 1. service_types.tax_enabled
                            | 2. app_settings.iva_general
                            |
                            | Ya NO se utiliza service_types.tax_rate.
                            |
                            */

                            $servicesData = $services->map(function ($service) use ($ivaGeneral) {

                                $serviceType = $service->serviceType;


                                /*
                                |----------------------------------------------------------------------
                                | ¿EL SERVICIO CAUSA IVA?
                                |----------------------------------------------------------------------
                                */

                                $taxEnabled = $serviceType
                                    ? (bool) $serviceType->tax_enabled
                                    : false;


                                /*
                                |----------------------------------------------------------------------
                                | IVA EFECTIVO
                                |----------------------------------------------------------------------
                                */

                                $taxRate = $taxEnabled
                                    ? (float) $ivaGeneral
                                    : 0;


                                /*
                                |----------------------------------------------------------------------
                                | SUBTOTAL
                                |----------------------------------------------------------------------
                                */

                                $subtotal = round(
                                    (float) $service->subtotal,
                                    2
                                );


                                /*
                                |----------------------------------------------------------------------
                                | IVA
                                |----------------------------------------------------------------------
                                */

                                $taxAmount = round(
                                    $subtotal * ($taxRate / 100),
                                    2
                                );


                                /*
                                |----------------------------------------------------------------------
                                | TOTAL
                                |----------------------------------------------------------------------
                                */

                                $total = round(
                                    $subtotal + $taxAmount,
                                    2
                                );


                                return [

                                    'id' => $service->id,

                                    'service_type_id' => $service->service_type_id,

                                    'name' => $serviceType?->name ?? 'Servicio',

                                    'quantity' => (float) $service->quantity,

                                    'unit_price' => (float) $service->unit_price,

                                    'subtotal' => $subtotal,

                                    'tax_enabled' => $taxEnabled,

                                    'tax_rate' => $taxRate,

                                    'tax_amount' => $taxAmount,

                                    'total' => $total,

                                    'notes' => $service->notes,

                                    /*
                                    |--------------------------------------------------------------------------
                                    | PESO CONFIGURADO DEL SERVICIO
                                    |--------------------------------------------------------------------------
                                    |
                                    | Es únicamente informativo.
                                    |
                                    | NO se multiplica por quantity.
                                    | NO modifica subtotal.
                                    | NO modifica IVA.
                                    | NO modifica total.
                                    |
                                    */

                                    'weight' => $serviceType?->weight !== null
                                        ? (float) $serviceType->weight
                                        : null,

                                    'weight_unit' => $serviceType?->weight_unit,

                                ];

                            })->values();

                        @endphp


                        <tr
                            onclick="openRecordDetailModal(
                                {{ $record->id }},
                                @js(optional($record->date)->format('d/m/Y')),
                                @js($record->invoice_number),
                                @js($record->company_id),
                                @js($record->company->name ?? ''),
                                @js($record->driver_id),
                                @js($record->driver->name ?? ''),
                                @js($record->trailer_id),
                                @js($record->trailer->number ?? ''),
                                @js($record->paps_number),
                                @js($record->shipper_id),
                                @js($record->shipper->name ?? ''),
                                @js($record->consignee_id),
                                @js($record->consignee->name ?? ''),
                                @js($record->broker_id),
                                @js($record->broker->name ?? ''),
                                @js($record->registeredBy->name ?? ''),
                                @js(optional($record->created_at)->format('d/m/Y H:i')),
                                @js($record->origin),
                                @js($record->destination),
                                @js($record->quantity),
                                @js($record->quantity_type),
                                @js($imageUrls),
                                @js($record->notes),
                                @js($servicesData)
                            )"
                        >

                            <td>
                                {{ optional($record->date)->format('d/m/Y') }}
                            </td>


                            <td>
                                <span class="table-main">
                                    {{ $record->company->name ?? '—' }}
                                </span>
                            </td>


                            <td>
                                {{ $record->driver->name ?? '—' }}
                            </td>


                            <td>
                                {{ $record->trailer->number ?? '—' }}
                            </td>


                            <td>
                                {{ $record->invoice_number ?? '—' }}
                            </td>


                            <td>
                                {{ $record->paps_number ?? '—' }}
                            </td>


                            <td>
                                {{ $record->shipper->name ?? '—' }}
                            </td>


                            <td>
                                {{ $record->consignee->name ?? '—' }}
                            </td>


                            <td>
                                {{ $record->broker->name ?? '—' }}
                            </td>


                            <td>

                                <span class="record-id">
                                    #{{ $record->id }}
                                </span>

                            </td>


                            <td>
                                {{ $record->registeredBy->name ?? '—' }}
                            </td>


                            <td
                                onclick="event.stopPropagation()"
                            >

                                <div class="action-buttons">

                                    {{-- VER --}}

                                    <button
                                        type="button"
                                        class="action-button"
                                        onclick="openRecordDetailModal(
                                            {{ $record->id }},
                                            @js(optional($record->date)->format('d/m/Y')),
                                            @js($record->invoice_number),
                                            @js($record->company_id),
                                            @js($record->company->name ?? ''),
                                            @js($record->driver_id),
                                            @js($record->driver->name ?? ''),
                                            @js($record->trailer_id),
                                            @js($record->trailer->number ?? ''),
                                            @js($record->paps_number),
                                            @js($record->shipper_id),
                                            @js($record->shipper->name ?? ''),
                                            @js($record->consignee_id),
                                            @js($record->consignee->name ?? ''),
                                            @js($record->broker_id),
                                            @js($record->broker->name ?? ''),
                                            @js($record->registeredBy->name ?? ''),
                                            @js(optional($record->created_at)->format('d/m/Y H:i')),
                                            @js($record->origin),
                                            @js($record->destination),
                                            @js($record->quantity),
                                            @js($record->quantity_type),
                                            @js($imageUrls),
                                            @js($record->notes),
                                            @js($servicesData)
                                        )"
                                    >
                                        {{ __('records.view_records') }}
                                    </button>


                                    {{-- EDITAR --}}

                                    <button
                                        type="button"
                                        class="action-button primary"
                                        onclick="openEditRecordModal(
                                            {{ $record->id }},
                                            @js(optional($record->date)->format('Y-m-d')),
                                            @js($record->invoice_number),
                                            @js($record->paps_number),
                                            @js($record->company_id),
                                            @js($record->company->name ?? ''),
                                            @js($record->driver_id),
                                            @js($record->driver->name ?? ''),
                                            @js($record->trailer_id),
                                            @js($record->trailer->number ?? ''),
                                            @js($record->broker_id),
                                            @js($record->broker->name ?? ''),
                                            @js($record->shipper_id),
                                            @js($record->shipper->name ?? ''),
                                            @js($record->consignee_id),
                                            @js($record->consignee->name ?? ''),
                                            @js($record->origin),
                                            @js($record->destination),
                                            @js($record->quantity),
                                            @js($record->quantity_type),
                                            @js($record->notes),
                                            @js($servicesData),
                                            @js($record->registeredBy->name ?? ''),
                                            @js(optional($record->created_at)->format('d/m/Y H:i')),
                                            @js($imageUrls)
                                        )"
                                    >
                                        {{ __('records.modal.edit_record') }}
                                    </button>

                                </div>

                            </td>

                                @if(auth()->user()->role === 'admin')

    <td onclick="event.stopPropagation()">

        <button
            type="button"
            class="action-button service"
            onclick="openServiceFromIndex(
                {{ $record->id }},
                @js($record->date?->format('Y-m-d') ?? ''),
                @js($record->invoice_number ?? ''),
                @js($record->paps_number ?? ''),
                @js($record->company_id),
                @js($record->company?->name ?? ''),
                @js($record->driver_id),
                @js($record->driver?->name ?? ''),
                @js($record->trailer_id),
                @js($record->trailer?->trailer_number ?? ''),
                @js($record->broker_id),
                @js($record->broker?->name ?? ''),
                @js($record->shipper_id),
                @js($record->shipper?->name ?? ''),
                @js($record->consignee_id),
                @js($record->consignee?->name ?? ''),
                @js($record->origin ?? ''),
                @js($record->destination ?? ''),
                @js($record->quantity ?? ''),
                @js($record->quantity_type ?? ''),
                @js($record->notes ?? ''),
                @js($servicesData),
                @js($record->registeredBy?->name ?? ''),
                @js($record->created_at?->format('d/m/Y H:i') ?? ''),
                @js($imageUrls)
            )"
        >
            + {{ __('records.service') }}
        </button>

    </td>

@endif


                        </tr>


                    @empty

                        <tr>

                            <td
                                colspan="{{ auth()->user()->role === 'admin' ? 13 : 12 }}"
                                class="empty-state"
                            >

                                <div class="empty-state-title">
                                    {{ __('records.no_records') }}
                                </div>

                                <div class="empty-state-text">
                                    {{ __('records.create') }}
                                </div>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>


{{-- ============================================================
     MODAL VER / EDITAR REGISTRO
============================================================ --}}

<div
    id="recordDetailModal"
    class="record-modal"
>

    <div
        class="record-modal-box"
        role="dialog"
        aria-modal="true"
    >

        {{-- HEADER --}}

        <div class="modal-header">

            <div>

                <div
                    id="detailModalTitle"
                    class="modal-title"
                >
                    {{ __('records.table.record') }}
                </div>

                <div
                    id="detailModalSubtitle"
                    class="modal-subtitle"
                >
                    {{ __('records.modal.information') }}
                </div>

            </div>

            <button
                type="button"
                id="closeRecordDetailModal"
                class="modal-close"
            >
                ×
            </button>

        </div>


        {{-- =====================================================
             MODO VER
        ====================================================== --}}

        <div
            id="recordViewMode"
            class="modal-body"
        >

            {{-- DATOS EMBARQUE --}}

            <div class="form-section">

                <div class="form-section-title">
                    {{ __('records.modal.shipment_data') }}
                </div>

                <div class="detail-grid">

                    <div class="detail-item">

                        <div class="detail-label">
                            {{ __('records.modal.date') }}
                        </div>

                        <div
                            id="detailDate"
                            class="detail-value"
                        >
                            —
                        </div>

                    </div>


                    <div class="detail-item">

                        <div class="detail-label">
                            {{ __('records.modal.record') }}
                        </div>

                        <div
                            id="detailRecordId"
                            class="detail-value"
                        >
                            —
                        </div>

                    </div>


                    <div class="detail-item">

                        <div class="detail-label">
                            {{ __('records.modal.invoice_number') }}
                        </div>

                        <div
                            id="detailInvoice"
                            class="detail-value"
                        >
                            —
                        </div>

                    </div>


                    <div class="detail-item">

                        <div class="detail-label">
                            {{ __('records.modal.paps') }} #
                        </div>

                        <div
                            id="detailPaps"
                            class="detail-value"
                        >
                            —
                        </div>

                    </div>

                </div>

            </div>


            {{-- IMAGEN --}}

            <div
                id="detailImageSection"
                class="detail-image-section"
                style="display:none;"
            >

                <div class="form-section-title">
                    {{ __('records.modal.image') }}
                </div>

                <div
                    id="detailImagesContainer"
                    class="detail-images-container"
                ></div>

            </div>


            {{-- DATOS TRASLADO --}}

            <div class="form-section">

                <div class="form-section-title">
                    {{ __('records.modal.transport_data') }}
                </div>

                <div class="detail-grid">

                    <div class="detail-item">

                        <div class="detail-label">
                            {{ __('records.modal.origin') }}
                        </div>

                        <div
                            id="detailOrigin"
                            class="detail-value"
                        >
                            —
                        </div>

                    </div>


                    <div class="detail-item">

                        <div class="detail-label">
                            {{ __('records.modal.destination') }}
                        </div>

                        <div
                            id="detailDestination"
                            class="detail-value"
                        >
                            —
                        </div>

                    </div>


                    <div class="detail-item">

                        <div class="detail-label">
                            {{ __('records.modal.quantity') }}
                        </div>

                        <div
                            id="detailQuantity"
                            class="detail-value"
                        >
                            —
                        </div>

                    </div>


                    <div class="detail-item">

                        <div class="detail-label">
                            {{ __('records.modal.type') }}
                        </div>

                        <div
                            id="detailQuantityType"
                            class="detail-value"
                        >
                            —
                        </div>

                    </div>

                </div>

            </div>


            {{-- PARTICIPANTES --}}

            <div class="form-section">

                <div class="form-section-title">
                    {{ __('records.modal.participants') }}
                </div>

                <div class="detail-grid">

                    <div class="detail-item">

                        <div class="detail-label">
                            {{ __('records.modal.company') }}
                        </div>

                        <div
                            id="detailCompany"
                            class="detail-value"
                        >
                            —
                        </div>

                    </div>


                    <div class="detail-item">

                        <div class="detail-label">
                            {{ __('records.modal.driver') }}
                        </div>

                        <div
                            id="detailDriver"
                            class="detail-value"
                        >
                            —
                        </div>

                    </div>


                    <div class="detail-item">

                        <div class="detail-label">
                            {{ __('records.modal.trailer') }}
                        </div>

                        <div
                            id="detailTrailer"
                            class="detail-value"
                        >
                            —
                        </div>

                    </div>


                    <div class="detail-item">

                        <div class="detail-label">
                            {{ __('records.modal.broker') }}
                        </div>

                        <div
                            id="detailBroker"
                            class="detail-value"
                        >
                            —
                        </div>

                    </div>


                    <div class="detail-item">

                        <div class="detail-label">
                            {{ __('records.modal.shipper') }}
                        </div>

                        <div
                            id="detailShipper"
                            class="detail-value"
                        >
                            —
                        </div>

                    </div>


                    <div class="detail-item">

                        <div class="detail-label">
                            {{ __('records.modal.consignee') }}
                        </div>

                        <div
                            id="detailConsignee"
                            class="detail-value"
                        >
                            —
                        </div>

                    </div>

                </div>

            </div>


            {{-- SERVICIOS --}}

            <div class="form-section">

                <div class="form-section-title">
                    {{ __('records.table.services') }}
                </div>

                <div
                    id="detailServicesList"
                    class="services-list"
                ></div>

            </div>


            {{-- CONTROL --}}

            <div class="form-section">

                <div class="form-section-title">
                    {{ __('records.modal.control') }}
                </div>

                <div class="detail-grid">

                    <div class="detail-item">

                        <div class="detail-label">
                            {{ __('records.table.registered_by') }}
                        </div>

                        <div
                            id="detailRegisteredBy"
                            class="detail-value"
                        >
                            —
                        </div>

                    </div>


                    <div class="detail-item">

                        <div class="detail-label">
                            {{ __('records.modal.date_record') }}
                        </div>

                        <div
                            id="detailCreatedAt"
                            class="detail-value"
                        >
                            —
                        </div>

                    </div>

                </div>

            </div>


            {{-- NOTAS --}}

            <div class="form-section">

                <div class="form-section-title">
                    {{ __('records.modal.notes') }}
                </div>

                <div class="detail-item">

                    <div
                        id="detailNotes"
                        class="detail-value detail-notes"
                    >
                        —
                    </div>

                </div>

            </div>


            {{-- ADMIN --}}

            @if(auth()->user()->role === 'admin')

                <button
                    type="button"
                    id="detailServiceButton"
                    class="action-button service"
                    style="margin-top:12px;"
                >
                    + {{ __('records.modal.add_service') }}
                </button>

            @endif

        </div>


        {{-- =====================================================
             MODO EDITAR
        ====================================================== --}}

        <form
            id="editRecordForm"
            method="POST"
            enctype="multipart/form-data"
            style="display:none;"
        >

            @csrf

            @method('PUT')


            <div class="modal-body">

                {{-- DATOS EMBARQUE --}}

                <div class="form-section">

                    <div class="form-section-title">
                        {{ __('records.modal.shipment_data') }}
                    </div>

                    <div class="form-grid three">

                        <div class="form-group">

                            <label class="form-label">
                                {{ __('records.modal.date') }}
                                <span class="form-required">*</span>
                            </label>

                            <input
                                type="date"
                                id="editDate"
                                name="date"
                                class="form-input"
                                required
                            >

                        </div>


                        <div class="form-group">

                            <label class="form-label">
                                {{ __('records.modal.record') }}
                            </label>

                            <input
                                type="text"
                                id="editRecordId"
                                class="form-input"
                                readonly
                            >

                        </div>


                        <div class="form-group">

                            <label class="form-label">
                                {{ __('records.modal.invoice_number') }}
                                <span class="form-required">*</span>
                            </label>

                            <input
                                type="text"
                                id="editInvoice"
                                name="invoice_number"
                                class="form-input"
                            >

                        </div>


                        <div class="form-group">

                            <label class="form-label">
                                {{ __('records.modal.paps') }}#
                            </label>

                            <input
                                type="text"
                                id="editPaps"
                                name="paps_number"
                                class="form-input"
                            >

                        </div>

                    </div>

                </div>


                {{-- =====================================================
                     IMAGENES EDITAR
                ====================================================== --}}

                <div class="form-section">

                    <div class="form-section-title">
                        {{ __('records.modal.image') }}
                    </div>

                    <div class="form-group">

                        <label class="form-label">
                            {{ __('records.modal.replace_image') }}
                        </label>


                        {{-- INPUT REAL QUE SE ENVIA AL SERVIDOR --}}

                        <input
                            type="file"
                            id="editImages"
                            name="images[]"
                            accept="image/jpeg,image/png,image/webp"
                            multiple
                            hidden
                        >


                        {{-- INPUT PARA CAMARA --}}

                        <input
                            type="file"
                            id="editCameraInput"
                            accept="image/jpeg,image/png,image/webp"
                            capture="environment"
                            hidden
                        >


                        {{-- INPUT PARA ARCHIVOS --}}

                        <input
                            type="file"
                            id="editFileInput"
                            accept="image/jpeg,image/png,image/webp"
                            multiple
                            hidden
                        >


                        {{-- BOTONES --}}

                        <div
                            style="
                                display:flex;
                                gap:10px;
                                flex-wrap:wrap;
                                margin-top:8px;
                            "
                        >

                            <button
                                type="button"
                                id="editTakePhotoButton"
                                class="image-upload-button"
                            >
                                📷 Tomar foto
                            </button>


                            <button
                                type="button"
                                id="editChooseFileButton"
                                class="image-upload-button"
                            >
                                📁 Elegir archivo
                            </button>

                        </div>


                        {{-- IMAGENES EXISTENTES + NUEVAS --}}

                        <div
                            id="editImagesContainer"
                            class="edit-images-container"
                        ></div>

                    </div>

                </div>


                {{-- TRASLADO --}}

                <div class="form-section">

                    <div class="form-section-title">
                        {{ __('records.modal.transport_data') }}
                    </div>

                    <div class="form-grid">

                        <div class="form-group">

                            <label class="form-label">
                                {{ __('records.modal.origin') }}
                            </label>

                            <input
                                type="text"
                                id="editOrigin"
                                name="origin"
                                class="form-input"
                            >

                        </div>


                        <div class="form-group">

                            <label class="form-label">
                                {{ __('records.modal.destination') }}
                            </label>

                            <input
                                type="text"
                                id="editDestination"
                                name="destination"
                                class="form-input"
                            >

                        </div>


                        <div class="form-group">

                            <label class="form-label">
                                {{ __('records.modal.quantity') }}
                            </label>

                            <input
                                type="number"
                                id="editQuantity"
                                name="quantity"
                                class="form-input"
                                min="0"
                            >

                        </div>


                        <div class="form-group">

                            <label class="form-label">
                                {{ __('records.modal.type') }}
                            </label>

                            <select
                                id="editQuantityType"
                                class="form-select"
                            >

                                <option value="">
                                    {{ __('records.modal.select') }}
                                </option>

                                @foreach($quantityTypes as $quantityType)

                                    <option value="{{ $quantityType }}">

                                        @if($quantityType === 'palets')

                                            {{ __('records.modal.palets') }}

                                        @elseif($quantityType === 'contenedores')

                                            {{ __('records.modal.containers') }}

                                        @elseif($quantityType === 'piezas')

                                            {{ __('records.modal.pieces') }}

                                        @else

                                            {{ $quantityType }}

                                        @endif

                                    </option>

                                @endforeach

                                <option value="__new__">
                                    + Agregar nuevo tipo
                                </option>

                            </select>


                            <input
                                type="hidden"
                                name="quantity_type"
                                id="editQuantityTypeValue"
                                value=""
                            >


                            <input
                                type="text"
                                id="editQuantityTypeInput"
                                class="form-input"
                                placeholder="Escribe el nuevo tipo"
                                maxlength="100"
                                style="display:none; margin-top:8px;"
                            >

                        </div>

                    </div>

                </div>


                {{-- PARTICIPANTES --}}

                <div class="form-section">

                    <div class="form-section-title">
                        {{ __('records.modal.participants') }}
                    </div>

                    <div class="form-grid">

                        {{-- CLIENTE --}}

                        <div class="form-group">

                            <label class="form-label">
                                {{ __('records.modal.company') }}
                            </label>

                            <div
                                class="autocomplete"
                                data-autocomplete-type="company"
                            >

                                <input
                                    type="text"
                                    id="editCompanySearch"
                                    class="form-input autocomplete-input"
                                    autocomplete="off"
                                    placeholder="{{ __('records.modal.search_company') }}"
                                >

                                <input
                                    type="hidden"
                                    id="editCompanyId"
                                    name="company_id"
                                >

                                <input
                                    type="hidden"
                                    id="editCompanyName"
                                    name="company_name"
                                >

                                <div
                                    id="editCompanyList"
                                    class="autocomplete-list"
                                ></div>

                            </div>

                        </div>


                        {{-- CHOFER --}}

                        <div class="form-group">

                            <label class="form-label">
                                {{ __('records.modal.driver') }}
                            </label>

                            <div
                                class="autocomplete"
                                data-autocomplete-type="driver"
                            >

                                <input
                                    type="text"
                                    id="editDriverSearch"
                                    class="form-input autocomplete-input"
                                    autocomplete="off"
                                    placeholder="{{ __('records.modal.search_or_write_driver') }}"
                                >

                                <input
                                    type="hidden"
                                    id="editDriverId"
                                    name="driver_id"
                                >

                                <input
                                    type="hidden"
                                    id="editDriverName"
                                    name="driver_name"
                                >

                                <div
                                    id="editDriverList"
                                    class="autocomplete-list"
                                ></div>

                            </div>

                        </div>


                        {{-- TRAILER --}}

                        <div class="form-group">

                            <label class="form-label">
                                {{ __('records.modal.trailer') }}
                            </label>

                            <div
                                class="autocomplete"
                                data-autocomplete-type="trailer"
                            >

                                <input
                                    type="text"
                                    id="editTrailerSearch"
                                    class="form-input autocomplete-input"
                                    autocomplete="off"
                                    placeholder="{{ __('records.modal.search_or_write_trailer') }}"
                                >

                                <input
                                    type="hidden"
                                    id="editTrailerId"
                                    name="trailer_id"
                                >

                                <input
                                    type="hidden"
                                    id="editTrailerNumber"
                                    name="trailer_number"
                                >

                                <div
                                    id="editTrailerList"
                                    class="autocomplete-list"
                                ></div>

                            </div>

                        </div>


                        {{-- AGENTE --}}

                        <div class="form-group">

                            <label class="form-label">
                                {{ __('records.modal.broker') }}
                            </label>

                            <div
                                class="autocomplete"
                                data-autocomplete-type="broker"
                            >

                                <input
                                    type="text"
                                    id="editBrokerSearch"
                                    class="form-input autocomplete-input"
                                    autocomplete="off"
                                    placeholder="{{ __('records.modal.search_broker') }}"
                                >

                                <input
                                    type="hidden"
                                    id="editBrokerId"
                                    name="broker_id"
                                >

                                <input
                                    type="hidden"
                                    id="editBrokerName"
                                    name="broker_name"
                                >

                                <div
                                    id="editBrokerList"
                                    class="autocomplete-list"
                                ></div>

                            </div>

                        </div>


                        {{-- TRANSPORTISTA --}}

                        <div class="form-group">

                            <label class="form-label">
                                {{ __('records.modal.shipper') }}
                            </label>

                            <div
                                class="autocomplete"
                                data-autocomplete-type="shipper"
                            >

                                <input
                                    type="text"
                                    id="editShipperSearch"
                                    class="form-input autocomplete-input"
                                    autocomplete="off"
                                    placeholder="{{ __('records.modal.search_shipper') }}"
                                >

                                <input
                                    type="hidden"
                                    id="editShipperId"
                                    name="shipper_id"
                                >

                                <input
                                    type="hidden"
                                    id="editShipperName"
                                    name="shipper_name"
                                >

                                <div
                                    id="editShipperList"
                                    class="autocomplete-list"
                                ></div>

                            </div>

                        </div>


                        {{-- CONSIGNATARIO --}}

                        <div class="form-group">

                            <label class="form-label">
                                {{ __('records.modal.consignee') }}
                            </label>

                            <div
                                class="autocomplete"
                                data-autocomplete-type="consignee"
                            >

                                <input
                                    type="text"
                                    id="editConsigneeSearch"
                                    class="form-input autocomplete-input"
                                    autocomplete="off"
                                    placeholder="{{ __('records.modal.search_consignee') }}"
                                >

                                <input
                                    type="hidden"
                                    id="editConsigneeId"
                                    name="consignee_id"
                                >

                                <input
                                    type="hidden"
                                    id="editConsigneeName"
                                    name="consignee_name"
                                >

                                <div
                                    id="editConsigneeList"
                                    class="autocomplete-list"
                                ></div>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- SERVICIOS ADMIN --}}

                @if(auth()->user()->role === 'admin')

                    <div class="form-section">

                        <div class="form-section-title">
                            {{ __('records.table.services') }}
                        </div>

                        <div
                            id="editServicesContainer"
                            class="edit-services-container"
                        ></div>

                        <button
                            type="button"
                            id="addEditServiceButton"
                            class="add-service-button"
                        >
                            + {{ __('records.modal.add_service') }}
                        </button>

                        <div
                            id="editServicesTotal"
                            class="services-total"
                        >
                            Total: $0.00
                        </div>

                    </div>

                @endif


                {{-- CONTROL --}}

                <div class="form-section">

                    <div class="form-section-title">
                        {{ __('records.modal.control') }}
                    </div>

                    <div class="form-grid">

                        <div class="form-group">

                            <label class="form-label">
                                {{ __('records.table.registered_by') }}
                            </label>

                            <input
                                type="text"
                                id="editRegisteredBy"
                                class="form-input"
                                readonly
                            >

                        </div>


                        <div class="form-group">

                            <label class="form-label">
                                {{ __('records.modal.date_record') }}
                            </label>

                            <input
                                type="text"
                                id="editCreatedAt"
                                class="form-input"
                                readonly
                            >

                        </div>

                    </div>

                </div>


                {{-- NOTAS --}}

                <div class="form-section">

                    <div class="form-section-title">
                        {{ __('records.modal.notes') }}
                    </div>

                    <textarea
                        id="editNotes"
                        name="notes"
                        class="form-textarea"
                        placeholder="{{ __('records.view') }}"
                    ></textarea>

                </div>

            </div>


            {{-- FOOTER EDITAR --}}

            <div class="modal-footer">

                <button
                    type="button"
                    id="cancelEditButton"
                    class="action-button"
                >
                    {{ __('records.modal.cancel') }}
                </button>

                <button
                    type="submit"
                    class="action-button primary"
                >
                    {{ __('records.modal.save_changes') }}
                </button>

            </div>

        </form>


        {{-- FOOTER VER --}}

        <div
            id="detailModalFooter"
            class="modal-footer"
        >

            <button
                type="button"
                id="closeDetailButton"
                class="action-button"
            >
                {{ __('records.modal.close') }}
            </button>

            <button
                type="button"
                id="editDetailButton"
                class="action-button primary"
            >
                {{ __('records.modal.edit_record') }}
            </button>

        </div>

    </div>

</div>



{{-- ============================================================
     MODAL SERVICIO
============================================================ --}}

@if(auth()->user()->role === 'admin')

<div
    id="serviceModal"
    class="record-modal"
>

    <div class="record-modal-box small">

        <div class="modal-header">

            <div>

                <div class="modal-title">
                    {{ __('records.modal.add_service') }}
                </div>

                <div class="modal-subtitle">
                    {{ __('records.modal.add_service_record') }}
                </div>

            </div>

            <button
                type="button"
                id="closeServiceModal"
                class="modal-close"
            >
                ×
            </button>

        </div>


        <form
            id="serviceForm"
            method="POST"
        >

            @csrf

            <div class="modal-body">

                <div class="form-group">

                    <label class="form-label">
                        {{ __('records.service') }}
                    </label>

                    <select
                        name="service_type_id"
                        class="form-select"
                    >

                        <option value="">
                            {{ __('records.modal.select_service') }}
                        </option>

                        @foreach($serviceTypes as $serviceType)

                            @php

                                $serviceTaxRate = $serviceType->tax_rate !== null
                                    ? (float) $serviceType->tax_rate
                                    : 0;

                                $servicePrice = (float) $serviceType->price;

                                $serviceTaxAmount = round(
                                    $servicePrice * ($serviceTaxRate / 100),
                                    2
                                );

                                $serviceTotal = round(
                                    $servicePrice + $serviceTaxAmount,
                                    2
                                );

                            @endphp

                            <option value="{{ $serviceType->id }}">

                                {{ $serviceType->name }}
                                — ${{ number_format($servicePrice, 2) }}

                                @if($serviceTaxRate > 0)

                                    + IVA {{ number_format($serviceTaxRate, 2) }}%
                                    = ${{ number_format($serviceTotal, 2) }}

                                @endif

                            </option>

                        @endforeach

                    </select>

                </div>


                <div
                    class="form-group"
                    style="margin-top:13px;"
                >

                    <label class="form-label">
                        {{ __('records.modal.notes') }}
                    </label>

                    <textarea
                        name="notes"
                        class="form-textarea"
                    ></textarea>

                </div>

            </div>


            <div class="modal-footer">

                <button
                    type="button"
                    id="cancelServiceButton"
                    class="action-button"
                >
                    {{ __('records.modal.cancel') }}
                </button>

                <button
                    type="submit"
                    class="action-button primary"
                >
                    {{ __('records.modal.add_service') }}
                </button>

            </div>

        </form>

    </div>

</div>

@endif


<script>

/* ============================================================
   VARIABLES GLOBALES
============================================================ */

let currentRecordId = null;

let currentRecordCompanyId = null;
let currentRecordDriverId = null;
let currentRecordTrailerId = null;
let currentRecordBrokerId = null;
let currentRecordShipperId = null;
let currentRecordConsigneeId = null;

let currentRecordCompanyName = '';
let currentRecordDriverName = '';
let currentRecordTrailerNumber = '';
let currentRecordBrokerName = '';
let currentRecordShipperName = '';
let currentRecordConsigneeName = '';

let currentRecordServices = [];

let currentRecordImageUrls = [];


/* ============================================================
   ARCHIVOS NUEVOS PARA EDITAR
============================================================ */

let selectedEditFiles = [];


/* ============================================================
   ELEMENTOS IMAGENES EDITAR
============================================================ */

let editImagesInput = null;
let editCameraInput = null;
let editFileInput = null;
let editImagesContainer = null;
let editTakePhotoButton = null;
let editChooseFileButton = null;


/* ============================================================
   CONTROL DE INICIALIZACION
============================================================ */

let editImagesInitialized = false;
let editQuantityTypeInitialized = false;
let editFormInitialized = false;




/* ============================================================
   CATÁLOGOS
============================================================ */

const autocompleteData = @json($autocompleteData);


/* ============================================================
   TIPOS DE SERVICIO
============================================================ */

const serviceTypesData = @json($serviceTypesData);


/* ============================================================
   IVA GENERAL
============================================================ */

const ivaGeneral =
    Number(@json($ivaGeneral ?? 0));


/* ============================================================
   CONFIGURACIÓN AUTOCOMPLETE
============================================================ */

const autocompleteConfig = {

    company: {
        input: 'editCompanySearch',
        id: 'editCompanyId',
        name: 'editCompanyName',
        list: 'editCompanyList',
    },

    driver: {
        input: 'editDriverSearch',
        id: 'editDriverId',
        name: 'editDriverName',
        list: 'editDriverList',
    },

    trailer: {
        input: 'editTrailerSearch',
        id: 'editTrailerId',
        name: 'editTrailerNumber',
        list: 'editTrailerList',
    },

    broker: {
        input: 'editBrokerSearch',
        id: 'editBrokerId',
        name: 'editBrokerName',
        list: 'editBrokerList',
    },

    shipper: {
        input: 'editShipperSearch',
        id: 'editShipperId',
        name: 'editShipperName',
        list: 'editShipperList',
    },

    consignee: {
        input: 'editConsigneeSearch',
        id: 'editConsigneeId',
        name: 'editConsigneeName',
        list: 'editConsigneeList',
    }

};


/* ============================================================
   ESCAPE HTML
============================================================ */

function escapeHtml(value) {

    if (
        value === null ||
        value === undefined
    ) {
        return '';
    }

    return String(value)
        .replace(/&/g, '&amp;')
        .replace(/</g, '&lt;')
        .replace(/>/g, '&gt;')
        .replace(/"/g, '&quot;')
        .replace(/'/g, '&#039;');

}


/* ============================================================
   FORMATO DINERO
============================================================ */

function formatMoney(value) {

    const number =
        Number(value || 0);

    return `$${number.toFixed(2)}`;

}


/* ============================================================
   CONVERTIR BOOLEANOS
============================================================ */

function toBoolean(value) {

    if (
        value === true ||
        value === 1
    ) {
        return true;
    }


    if (
        value === false ||
        value === 0 ||
        value === null ||
        value === undefined
    ) {
        return false;
    }


    if (
        typeof value === 'string'
    ) {

        const normalized =
            value
                .trim()
                .toLowerCase();


        return (
            normalized === 'true' ||
            normalized === '1' ||
            normalized === 'yes' ||
            normalized === 'si' ||
            normalized === 'sí'
        );

    }


    return Boolean(value);

}


/* ============================================================
   AUTOCOMPLETE
============================================================ */

function setupAutocomplete(type) {

    const config =
        autocompleteConfig[type];

    if (!config) {
        return;
    }


    const input =
        document.getElementById(config.input);

    const hiddenId =
        document.getElementById(config.id);

    const hiddenName =
        document.getElementById(config.name);

    const list =
        document.getElementById(config.list);


    if (
        !input ||
        !hiddenId ||
        !hiddenName ||
        !list
    ) {
        return;
    }


    function renderList() {

        const search =
            input.value
                .trim()
                .toLowerCase();


        hiddenId.value = '';

        hiddenName.value =
            input.value.trim();


        const sourceData =
            Array.isArray(
                autocompleteData[type]
            )
                ? autocompleteData[type]
                : [];


        let results =
            sourceData.filter(function(item) {

                return String(item.value)
                    .toLowerCase()
                    .includes(search);

            });


        if (search === '') {

            results =
                sourceData.slice(0, 10);

        } else {

            results =
                results.slice(0, 10);

        }


        let html = '';


        results.forEach(function(item) {

            html += `
                <div
                    class="autocomplete-item"
                    data-id="${escapeHtml(item.id)}"
                    data-value="${escapeHtml(item.value)}"
                >
                    ${escapeHtml(item.value)}
                </div>
            `;

        });


        if (
            search !== '' &&
            results.length === 0
        ) {

            html += `
                <div class="autocomplete-empty">
                    {{ __('records.modal.not_found') }}
                </div>
            `;

        }


        list.innerHTML =
            html;


        if (html.trim() !== '') {

            list.classList.add('active');

        } else {

            list.classList.remove('active');

        }


        list.querySelectorAll(
            '.autocomplete-item'
        ).forEach(function(item) {

            item.addEventListener(
                'mousedown',
                function(event) {

                    event.preventDefault();


                    const selectedId =
                        this.dataset.id;

                    const selectedValue =
                        this.dataset.value;


                    input.value =
                        selectedValue;

                    hiddenId.value =
                        selectedId;

                    hiddenName.value =
                        selectedValue;


                    list.classList.remove(
                        'active'
                    );

                }
            );

        });

    }


    input.addEventListener(
        'input',
        function() {

            hiddenId.value = '';

            hiddenName.value =
                input.value.trim();

            renderList();

        }
    );


    input.addEventListener(
        'focus',
        function() {

            renderList();

        }
    );


    input.addEventListener(
        'blur',
        function() {

            setTimeout(
                function() {

                    list.classList.remove(
                        'active'
                    );

                },
                150
            );

        }
    );

}


/* ============================================================
   INICIALIZAR AUTOCOMPLETE
============================================================ */

function initializeAutocomplete() {

    Object.keys(
        autocompleteConfig
    ).forEach(function(type) {

        setupAutocomplete(type);

    });

}


/* ============================================================
   ASIGNAR VALOR AUTOCOMPLETE
============================================================ */

function setAutocompleteValue(
    type,
    id,
    value
) {

    const config =
        autocompleteConfig[type];

    if (!config) {
        return;
    }


    const input =
        document.getElementById(config.input);

    const hiddenId =
        document.getElementById(config.id);

    const hiddenName =
        document.getElementById(config.name);


    if (
        !input ||
        !hiddenId ||
        !hiddenName
    ) {
        return;
    }


    input.value =
        value ?? '';

    hiddenId.value =
        id ?? '';

    hiddenName.value =
        value ?? '';

}


/* ============================================================
   CALCULAR IVA DE SERVICIO
============================================================ */

function calculateServiceTax(
    subtotal,
    taxRate
) {

    const base =
        Number(subtotal || 0);

    const rate =
        Number(taxRate || 0);

    return base *
        (rate / 100);

}


/* ============================================================
   OBTENER TIPO DE SERVICIO
============================================================ */

function getServiceType(
    serviceTypeId
) {

    return serviceTypesData.find(function(serviceType) {

        return Number(serviceType.id) ===
            Number(serviceTypeId);

    }) || null;

}


/* ============================================================
   IMAGENES NUEVAS AL EDITAR
============================================================ */

function syncEditFiles() {

    if (!editImagesInput) {
        return;
    }


    const dataTransfer =
        new DataTransfer();


    selectedEditFiles.forEach(
        function(file) {

            dataTransfer.items.add(file);

        }
    );


    editImagesInput.files =
        dataTransfer.files;

}


/* ============================================================
   RENDERIZAR IMAGENES NUEVAS
============================================================ */

function renderNewEditImages() {

    if (!editImagesContainer) {
        return;
    }


    editImagesContainer
        .querySelectorAll('.new-edit-image')
        .forEach(function(element) {

            element.remove();

        });


    selectedEditFiles.forEach(
        function(file, index) {

            const item =
                document.createElement('div');

            item.className =
                'edit-image-item new-edit-image';

            item.style.position =
                'relative';


            const image =
                document.createElement('img');

            image.className =
                'edit-image-gallery';

            image.alt =
                'Nueva imagen';


            const reader =
                new FileReader();


            reader.onload =
                function(event) {

                    image.src =
                        event.target.result;

                };


            reader.readAsDataURL(file);


            const deleteButton =
                document.createElement('button');

            deleteButton.type =
                'button';

            deleteButton.textContent =
                '×';

            deleteButton.title =
                'Eliminar imagen';

            deleteButton.style.position =
                'absolute';

            deleteButton.style.top =
                '8px';

            deleteButton.style.right =
                '8px';

            deleteButton.style.zIndex =
                '10';

            deleteButton.style.cursor =
                'pointer';


            deleteButton.addEventListener(
                'click',
                function(event) {

                    event.preventDefault();

                    event.stopPropagation();


                    selectedEditFiles.splice(
                        index,
                        1
                    );


                    syncEditFiles();

                    renderNewEditImages();

                }
            );


            item.appendChild(
                image
            );

            item.appendChild(
                deleteButton
            );


            editImagesContainer.appendChild(
                item
            );

        }
    );

}


/* ============================================================
   AGREGAR IMAGENES NUEVAS
============================================================ */

function addEditImages(files) {

    if (!files || files.length === 0) {
        return;
    }


    const allowedTypes = [
        'image/jpeg',
        'image/png',
        'image/webp'
    ];


    Array.from(files).forEach(
        function(file) {

            if (
                !allowedTypes.includes(
                    file.type
                )
            ) {

                alert(
                    'Solo se permiten imágenes JPG, PNG o WEBP.'
                );

                return;

            }


            if (
                file.size >
                10 * 1024 * 1024
            ) {

                alert(
                    'La imagen no puede superar los 10 MB.'
                );

                return;

            }


            selectedEditFiles.push(
                file
            );

        }
    );


    syncEditFiles();

    renderNewEditImages();

}


/* ============================================================
   INICIALIZAR IMAGENES DE EDICION
============================================================ */

function initializeEditImages() {

    if (editImagesInitialized) {
        return;
    }


    editImagesInput =
        document.getElementById(
            'editImages'
        );

    editCameraInput =
        document.getElementById(
            'editCameraInput'
        );

    editFileInput =
        document.getElementById(
            'editFileInput'
        );

    editImagesContainer =
        document.getElementById(
            'editImagesContainer'
        );

    editTakePhotoButton =
        document.getElementById(
            'editTakePhotoButton'
        );

    editChooseFileButton =
        document.getElementById(
            'editChooseFileButton'
        );


    if (!editImagesInput) {

        console.warn(
            'No se encontró editImages.'
        );

        return;

    }


    editImagesInitialized = true;


    /* ========================================================
       TOMAR FOTO
    ======================================================== */

    if (editTakePhotoButton && editCameraInput) {

        editTakePhotoButton.addEventListener(
            'click',
            function() {

                editCameraInput.click();

            }
        );

    }


    /* ========================================================
       ELEGIR ARCHIVO
    ======================================================== */

    if (editChooseFileButton && editFileInput) {

        editChooseFileButton.addEventListener(
            'click',
            function() {

                editFileInput.click();

            }
        );

    }


    /* ========================================================
       CAMARA
    ======================================================== */

    if (editCameraInput) {

        editCameraInput.addEventListener(
            'change',
            function() {

                addEditImages(
                    this.files
                );


                this.value =
                    '';

            }
        );

    }


    /* ========================================================
       ARCHIVO
    ======================================================== */

    if (editFileInput) {

        editFileInput.addEventListener(
            'change',
            function() {

                addEditImages(
                    this.files
                );


                this.value =
                    '';

            }
        );

    }


    /* ========================================================
       INPUT REAL images[]
       Por seguridad también se controla directamente.
    ======================================================== */

    editImagesInput.addEventListener(
        'change',
        function() {

            const files =
                Array.from(
                    this.files || []
                );


            if (files.length === 0) {
                return;
            }


            selectedEditFiles = [];


            addEditImages(
                files
            );

        }
    );

}


/* ============================================================
   TIPO DE CANTIDAD - EDITAR
============================================================ */

function initializeEditQuantityType() {

    if (editQuantityTypeInitialized) {
        return;
    }


    const select =
        document.getElementById(
            'editQuantityType'
        );

    const hiddenValue =
        document.getElementById(
            'editQuantityTypeValue'
        );

    const textInput =
        document.getElementById(
            'editQuantityTypeInput'
        );


    if (
        !select ||
        !hiddenValue ||
        !textInput
    ) {
        return;
    }


    editQuantityTypeInitialized = true;


    function updateEditQuantityType() {

        const selectedValue =
            select.value;


        if (
            selectedValue === '__new__'
        ) {

            textInput.style.display =
                'block';

            textInput.value =
                '';

            hiddenValue.value =
                '';

            textInput.focus();

        } else {

            textInput.style.display =
                'none';

            textInput.value =
                '';

            hiddenValue.value =
                selectedValue;

        }

    }


    select.addEventListener(
        'change',
        function() {

            updateEditQuantityType();

        }
    );


    textInput.addEventListener(
        'input',
        function() {

            hiddenValue.value =
                this.value.trim();

        }
    );

}


/* ============================================================
   VALIDAR / PREPARAR TIPO DE CANTIDAD
============================================================ */

function prepareEditQuantityType() {

    const select =
        document.getElementById(
            'editQuantityType'
        );

    const hiddenValue =
        document.getElementById(
            'editQuantityTypeValue'
        );

    const textInput =
        document.getElementById(
            'editQuantityTypeInput'
        );


    if (
        !select ||
        !hiddenValue ||
        !textInput
    ) {
        return true;
    }


    if (
        select.value === '__new__'
    ) {

        const newType =
            textInput.value.trim();


        if (newType === '') {

            alert(
                'Escribe el nuevo tipo de cantidad.'
            );

            textInput.focus();

            return false;

        }


        hiddenValue.value =
            newType;

    } else {

        hiddenValue.value =
            select.value;

    }


    return true;

}


/* ============================================================
   MODAL DETALLE
============================================================ */

function openRecordDetailModal(
    recordId,
    date,
    invoice,
    companyId,
    companyName,
    driverId,
    driverName,
    trailerId,
    trailerNumber,
    paps,
    shipperId,
    shipperName,
    consigneeId,
    consigneeName,
    brokerId,
    brokerName,
    registeredBy,
    createdAt,
    origin,
    destination,
    quantity,
    quantityType,
    imageUrls,
    notes,
    services
) {

    currentRecordId =
        recordId;


    currentRecordCompanyId =
        companyId;

    currentRecordDriverId =
        driverId;

    currentRecordTrailerId =
        trailerId;

    currentRecordBrokerId =
        brokerId;

    currentRecordShipperId =
        shipperId;

    currentRecordConsigneeId =
        consigneeId;


    currentRecordCompanyName =
        companyName ?? '';

    currentRecordDriverName =
        driverName ?? '';

    currentRecordTrailerNumber =
        trailerNumber ?? '';

    currentRecordBrokerName =
        brokerName ?? '';

    currentRecordShipperName =
        shipperName ?? '';

    currentRecordConsigneeName =
        consigneeName ?? '';


    currentRecordServices =
        Array.isArray(services)
            ? services
            : [];


    currentRecordImageUrls =
        Array.isArray(imageUrls)
            ? imageUrls
            : [];


    const title =
        document.getElementById(
            'detailModalTitle'
        );

    if (title) {

        title.textContent =
            `{{ __('records.table.record') }} #${recordId}`;

    }


    const subtitle =
        document.getElementById(
            'detailModalSubtitle'
        );

    if (subtitle) {

        subtitle.textContent =
            invoice
                ? `{{ __('records.invoice') }}: ${invoice}`
                : '{{ __('records.modal.information') }}';

    }


    const detailDate =
        document.getElementById(
            'detailDate'
        );

    if (detailDate) {

        detailDate.textContent =
            cleanDetailValue(date);

    }


    const detailRecordId =
        document.getElementById(
            'detailRecordId'
        );

    if (detailRecordId) {

        detailRecordId.textContent =
            `#${recordId}`;

    }


    const detailInvoice =
        document.getElementById(
            'detailInvoice'
        );

    if (detailInvoice) {

        detailInvoice.textContent =
            cleanDetailValue(invoice);

    }


    const detailPaps =
        document.getElementById(
            'detailPaps'
        );

    if (detailPaps) {

        detailPaps.textContent =
            cleanDetailValue(paps);

    }


    const detailOrigin =
        document.getElementById(
            'detailOrigin'
        );

    if (detailOrigin) {

        detailOrigin.textContent =
            cleanDetailValue(origin);

    }


    const detailDestination =
        document.getElementById(
            'detailDestination'
        );

    if (detailDestination) {

        detailDestination.textContent =
            cleanDetailValue(destination);

    }


    const detailQuantity =
        document.getElementById(
            'detailQuantity'
        );

    if (detailQuantity) {

        detailQuantity.textContent =
            cleanDetailValue(quantity);

    }


    const detailQuantityType =
        document.getElementById(
            'detailQuantityType'
        );

    if (detailQuantityType) {

        detailQuantityType.textContent =
            cleanDetailValue(quantityType);

    }


    const detailCompany =
        document.getElementById(
            'detailCompany'
        );

    if (detailCompany) {

        detailCompany.textContent =
            cleanDetailValue(companyName);

    }


    const detailDriver =
        document.getElementById(
            'detailDriver'
        );

    if (detailDriver) {

        detailDriver.textContent =
            cleanDetailValue(driverName);

    }


    const detailTrailer =
        document.getElementById(
            'detailTrailer'
        );

    if (detailTrailer) {

        detailTrailer.textContent =
            cleanDetailValue(trailerNumber);

    }


    const detailBroker =
        document.getElementById(
            'detailBroker'
        );

    if (detailBroker) {

        detailBroker.textContent =
            cleanDetailValue(brokerName);

    }


    const detailShipper =
        document.getElementById(
            'detailShipper'
        );

    if (detailShipper) {

        detailShipper.textContent =
            cleanDetailValue(shipperName);

    }


    const detailConsignee =
        document.getElementById(
            'detailConsignee'
        );

    if (detailConsignee) {

        detailConsignee.textContent =
            cleanDetailValue(consigneeName);

    }


    const detailRegisteredBy =
        document.getElementById(
            'detailRegisteredBy'
        );

    if (detailRegisteredBy) {

        detailRegisteredBy.textContent =
            cleanDetailValue(registeredBy);

    }


    const detailCreatedAt =
        document.getElementById(
            'detailCreatedAt'
        );

    if (detailCreatedAt) {

        detailCreatedAt.textContent =
            cleanDetailValue(createdAt);

    }


    const detailNotes =
        document.getElementById(
            'detailNotes'
        );

    if (detailNotes) {

        detailNotes.textContent =
            cleanDetailValue(notes);

    }


    /* ========================================================
       IMAGENES
    ======================================================== */

    const imageSection =
        document.getElementById(
            'detailImageSection'
        );


    const detailImagesContainer =
        document.getElementById(
            'detailImagesContainer'
        );


    if (
        detailImagesContainer &&
        currentRecordImageUrls.length > 0
    ) {

        detailImagesContainer.innerHTML =
            '';


        currentRecordImageUrls.forEach(
            function(imageData) {

                const item =
                    document.createElement('div');

                item.className =
                    'detail-image-item';


                const image =
                    document.createElement('img');

                image.className =
                    'detail-image';

                image.src =
                    imageData.url;

                image.alt =
                    '{{ __('records.modal.current_image') }}';


                image.addEventListener(
                    'click',
                    function() {

                        window.open(
                            imageData.url,
                            '_blank'
                        );

                    }
                );


                item.appendChild(
                    image
                );


                detailImagesContainer.appendChild(
                    item
                );

            }
        );


        if (imageSection) {

            imageSection.style.display =
                'block';

        }

    } else if (detailImagesContainer) {

        detailImagesContainer.innerHTML =
            '';


        if (imageSection) {

            imageSection.style.display =
                'none';

        }

    }


    renderServices(
        currentRecordServices
    );


    const modal =
        document.getElementById(
            'recordDetailModal'
        );


    const recordViewMode =
        document.getElementById(
            'recordViewMode'
        );


    const editRecordForm =
        document.getElementById(
            'editRecordForm'
        );


    const detailModalFooter =
        document.getElementById(
            'detailModalFooter'
        );


    if (recordViewMode) {

        recordViewMode.style.display =
            'block';

    }


    if (editRecordForm) {

        editRecordForm.style.display =
            'none';

    }


    if (detailModalFooter) {

        detailModalFooter.style.display =
            'flex';

    }


    if (modal) {

        modal.classList.add(
            'active'
        );

    }


    document.body.style.overflow =
        'hidden';

}


/* ============================================================
   ABRIR EDITAR
============================================================ */

function openEditRecordModal(
    recordId,
    date,
    invoice,
    paps,
    companyId,
    companyName,
    driverId,
    driverName,
    trailerId,
    trailerNumber,
    brokerId,
    brokerName,
    shipperId,
    shipperName,
    consigneeId,
    consigneeName,
    origin,
    destination,
    quantity,
    quantityType,
    notes,
    services,
    registeredBy,
    createdAt,
    imageUrls
) {

    currentRecordId =
        recordId;


    currentRecordCompanyId =
        companyId;

    currentRecordDriverId =
        driverId;

    currentRecordTrailerId =
        trailerId;

    currentRecordBrokerId =
        brokerId;

    currentRecordShipperId =
        shipperId;

    currentRecordConsigneeId =
        consigneeId;


    currentRecordCompanyName =
        companyName ?? '';

    currentRecordDriverName =
        driverName ?? '';

    currentRecordTrailerNumber =
        trailerNumber ?? '';

    currentRecordBrokerName =
        brokerName ?? '';

    currentRecordShipperName =
        shipperName ?? '';

    currentRecordConsigneeName =
        consigneeName ?? '';


    currentRecordServices =
        Array.isArray(services)
            ? services
            : [];


    currentRecordImageUrls =
        Array.isArray(imageUrls)
            ? imageUrls
            : [];


    /* ========================================================
       LIMPIAR ARCHIVOS NUEVOS
    ======================================================== */

    selectedEditFiles = [];


    if (editImagesInput) {

        editImagesInput.value =
            '';

    }


    if (editCameraInput) {

        editCameraInput.value =
            '';

    }


    if (editFileInput) {

        editFileInput.value =
            '';

    }


    /* ========================================================
       DATOS
    ======================================================== */

    const editDate =
        document.getElementById(
            'editDate'
        );

    if (editDate) {

        editDate.value =
            convertDateToInput(date);

    }


    const editRecordId =
        document.getElementById(
            'editRecordId'
        );

    if (editRecordId) {

        editRecordId.value =
            recordId;

    }


    const editInvoice =
        document.getElementById(
            'editInvoice'
        );

    if (editInvoice) {

        editInvoice.value =
            invoice ?? '';

    }


    const editPaps =
        document.getElementById(
            'editPaps'
        );

    if (editPaps) {

        editPaps.value =
            paps ?? '';

    }


    const editOrigin =
        document.getElementById(
            'editOrigin'
        );

    if (editOrigin) {

        editOrigin.value =
            origin ?? '';

    }


    const editDestination =
        document.getElementById(
            'editDestination'
        );

    if (editDestination) {

        editDestination.value =
            destination ?? '';

    }


    const editQuantity =
        document.getElementById(
            'editQuantity'
        );

    if (editQuantity) {

        editQuantity.value =
            quantity ?? '';

    }


    /* ========================================================
       TIPO DE CANTIDAD
    ======================================================== */

    const quantityTypeSelect =
        document.getElementById(
            'editQuantityType'
        );

    const quantityTypeHidden =
        document.getElementById(
            'editQuantityTypeValue'
        );

    const quantityTypeInput =
        document.getElementById(
            'editQuantityTypeInput'
        );


    if (
        quantityTypeSelect &&
        quantityTypeHidden &&
        quantityTypeInput
    ) {

        const currentQuantityType =
            (quantityType ?? '')
                .toString()
                .trim();


        quantityTypeHidden.value =
            currentQuantityType;


        const hasOption =
            Array.from(
                quantityTypeSelect.options
            ).some(
                function(option) {

                    return (
                        option.value ===
                        currentQuantityType
                    );

                }
            );


        if (
            currentQuantityType !== '' &&
            !hasOption
        ) {

            quantityTypeSelect.value =
                '__new__';

            quantityTypeInput.style.display =
                'block';

            quantityTypeInput.value =
                currentQuantityType;

        } else {

            quantityTypeSelect.value =
                currentQuantityType;

            quantityTypeInput.style.display =
                'none';

            quantityTypeInput.value =
                '';

        }

    }


    const editNotes =
        document.getElementById(
            'editNotes'
        );

    if (editNotes) {

        editNotes.value =
            notes ?? '';

    }


    const editRegisteredBy =
        document.getElementById(
            'editRegisteredBy'
        );

    if (editRegisteredBy) {

        editRegisteredBy.value =
            registeredBy ?? '';

    }


    const editCreatedAt =
        document.getElementById(
            'editCreatedAt'
        );

    if (editCreatedAt) {

        editCreatedAt.value =
            createdAt ?? '';

    }


    /* ========================================================
       AUTOCOMPLETE
    ======================================================== */

    setAutocompleteValue(
        'company',
        companyId,
        companyName
    );


    setAutocompleteValue(
        'driver',
        driverId,
        driverName
    );


    setAutocompleteValue(
        'trailer',
        trailerId,
        trailerNumber
    );


    setAutocompleteValue(
        'broker',
        brokerId,
        brokerName
    );


    setAutocompleteValue(
        'shipper',
        shipperId,
        shipperName
    );


    setAutocompleteValue(
        'consignee',
        consigneeId,
        consigneeName
    );


    /* ========================================================
       IMAGENES EXISTENTES
    ======================================================== */

    if (editImagesContainer) {

        editImagesContainer.innerHTML =
            '';


        currentRecordImageUrls.forEach(
            function(imageData) {

                const item =
                    document.createElement('div');

                item.className =
                    'edit-image-item';

                item.style.position =
                    'relative';


                const image =
                    document.createElement('img');

                image.className =
                    'edit-image-gallery';

                image.src =
                    imageData.url;

                image.alt =
                    '{{ __('records.modal.current_image') }}';


                image.addEventListener(
                    'click',
                    function() {

                        window.open(
                            imageData.url,
                            '_blank'
                        );

                    }
                );


                const deleteButton =
                    document.createElement('button');

                deleteButton.type =
                    'button';

                deleteButton.textContent =
                    '🗑️';

                deleteButton.title =
                    'Eliminar imagen';

                deleteButton.style.position =
                    'absolute';

                deleteButton.style.top =
                    '8px';

                deleteButton.style.right =
                    '8px';

                deleteButton.style.zIndex =
                    '10';

                deleteButton.style.cursor =
                    'pointer';


                deleteButton.addEventListener(
                    'click',
                    async function(event) {

                        event.preventDefault();

                        event.stopPropagation();


                        const confirmed =
                            confirm(
                                '¿Deseas eliminar esta imagen?'
                            );


                        if (!confirmed) {
                            return;
                        }


                        try {

                            const response =
                                await fetch(
                                    `/record-images/${imageData.id}`,
                                    {
                                        method: 'DELETE',

                                        headers: {
                                            'X-CSRF-TOKEN':
                                                '{{ csrf_token() }}',

                                            'Accept':
                                                'application/json'
                                        }
                                    }
                                );


                            if (!response.ok) {

                                throw new Error(
                                    'No se pudo eliminar la imagen.'
                                );

                            }


                            currentRecordImageUrls =
                                currentRecordImageUrls.filter(
                                    function(image) {

                                        return image.id !==
                                            imageData.id;

                                    }
                                );


                            item.remove();


                        } catch (error) {

                            console.error(
                                error
                            );

                            alert(
                                'No se pudo eliminar la imagen.'
                            );

                        }

                    }
                );


                item.appendChild(
                    image
                );

                item.appendChild(
                    deleteButton
                );


                editImagesContainer.appendChild(
                    item
                );

            }
        );


        renderNewEditImages();

    }


    /* ========================================================
       SERVICIOS
    ======================================================== */

    renderEditServices(
        currentRecordServices
    );


    /* ========================================================
       FORM ACTION
    ======================================================== */

    const form =
        document.getElementById(
            'editRecordForm'
        );


    if (!form) {

        console.error(
            'No se encontró editRecordForm.'
        );

        return;

    }


    form.action =
        `/records/${recordId}`;


    console.log(
        'Formulario de edición preparado:',
        form.action
    );


    /* ========================================================
       MOSTRAR EDITAR
    ======================================================== */

    const recordViewMode =
        document.getElementById(
            'recordViewMode'
        );


    const detailModalFooter =
        document.getElementById(
            'detailModalFooter'
        );


    const modal =
        document.getElementById(
            'recordDetailModal'
        );


    if (recordViewMode) {

        recordViewMode.style.display =
            'none';

    }


    if (detailModalFooter) {

        detailModalFooter.style.display =
            'none';

    }


    form.style.display =
        'block';


    if (modal) {

        modal.classList.add(
            'active'
        );

    }


    document.body.style.overflow =
        'hidden';

}

/* ============================================================
   ABRIR EDICION DESDE EL REGISTRO ACTUAL
   USADO PARA AGREGAR SERVICIO
============================================================ */

function openEditRecordFromCurrentRecord(
    addNewService = false
) {

    if (!currentRecordId) {
        return;
    }


    const date =
        document.getElementById(
            'detailDate'
        )?.textContent || '';


    const invoice =
        getDetailValue(
            'detailInvoice'
        );


    const paps =
        getDetailValue(
            'detailPaps'
        );


    const origin =
        getDetailValue(
            'detailOrigin'
        );


    const destination =
        getDetailValue(
            'detailDestination'
        );


    const quantity =
        getDetailValue(
            'detailQuantity'
        );


    const quantityType =
        getDetailValue(
            'detailQuantityType'
        );


    const notes =
        getDetailValue(
            'detailNotes'
        );


    const registeredBy =
        getDetailValue(
            'detailRegisteredBy'
        );


    const createdAt =
        getDetailValue(
            'detailCreatedAt'
        );


    openEditRecordModal(

        currentRecordId,

        convertDateToInput(
            date
        ),

        invoice,

        paps,


        currentRecordCompanyId,
        currentRecordCompanyName,


        currentRecordDriverId,
        currentRecordDriverName,


        currentRecordTrailerId,
        currentRecordTrailerNumber,


        currentRecordBrokerId,
        currentRecordBrokerName,


        currentRecordShipperId,
        currentRecordShipperName,


        currentRecordConsigneeId,
        currentRecordConsigneeName,


        origin,

        destination,

        quantity,

        quantityType,

        notes,

        currentRecordServices,

        registeredBy,

        createdAt,

        currentRecordImageUrls

    );


    if (addNewService) {

        addEditServiceRow();

        updateEditServicesTotal();

    }

}

/* ============================================================
   AGREGAR SERVICIO DESDE EL INDICE
============================================================ */

function openServiceFromIndex(
    recordId,
    date,
    invoice,
    paps,
    companyId,
    companyName,
    driverId,
    driverName,
    trailerId,
    trailerNumber,
    brokerId,
    brokerName,
    shipperId,
    shipperName,
    consigneeId,
    consigneeName,
    origin,
    destination,
    quantity,
    quantityType,
    notes,
    services,
    registeredBy,
    createdAt,
    imageUrls
) {

    if (!recordId) {
        console.error('No se recibió el ID del registro.');
        return;
    }

    openEditRecordModal(
        recordId,
        date,
        invoice,
        paps,

        companyId,
        companyName,

        driverId,
        driverName,

        trailerId,
        trailerNumber,

        brokerId,
        brokerName,

        shipperId,
        shipperName,

        consigneeId,
        consigneeName,

        origin,
        destination,

        quantity,
        quantityType,

        notes,

        Array.isArray(services)
            ? services
            : [],

        registeredBy,
        createdAt,

        Array.isArray(imageUrls)
            ? imageUrls
            : []
    );

    /*
     * Agregamos una nueva fila de servicio
     * utilizando EXACTAMENTE la misma función
     * que utiliza el botón "+ Servicio" de Editar.
     */

    addEditServiceRow();

    updateEditServicesTotal();
}


/* ============================================================
   SERVICIOS - EDITAR
============================================================ */

function renderEditServices(
    services
) {

    const container =
        document.getElementById(
            'editServicesContainer'
        );


    if (!container) {
        return;
    }


    container.innerHTML =
        '';


    if (
        !Array.isArray(services) ||
        services.length === 0
    ) {

        updateEditServicesTotal();

        return;

    }


    services.forEach(function(service) {

        addEditServiceRow(
            service
        );

    });


    updateEditServicesTotal();

}


/* ============================================================
   AGREGAR FILA SERVICIO
============================================================ */

function addEditServiceRow(
    service = {}
) {

    const container =
        document.getElementById(
            'editServicesContainer'
        );


    if (!container) {
        return;
    }


    const index =
        container.children.length;


    const serviceId =
        service.id ?? '';


    const serviceTypeId =
        service.service_type_id ?? '';


    const quantity =
        service.quantity ?? 1;


    const unitPrice =
        service.unit_price ?? 0;


    const subtotal =
        service.subtotal ??
        (
            Number(quantity) *
            Number(unitPrice)
        );


    const selectedServiceType =
        getServiceType(
            serviceTypeId
        );


    /* ========================================================
       PESO SOLO INFORMATIVO
    ======================================================== */

    const serviceWeight =
        selectedServiceType?.weight !== null &&
        selectedServiceType?.weight !== undefined
            ? Number(selectedServiceType.weight)
            : null;


    const serviceWeightUnit =
        selectedServiceType?.weight_unit ?? '';


    /* ========================================================
       IVA
    ======================================================== */

    const taxEnabled =
        service.tax_enabled !== undefined
            ? toBoolean(service.tax_enabled)
            : toBoolean(
                selectedServiceType?.tax_enabled
            );


    const taxRate =
        taxEnabled
            ? ivaGeneral
            : 0;


    const taxAmount =
        calculateServiceTax(
            subtotal,
            taxRate
        );


    const total =
        Number(subtotal) +
        taxAmount;


    const notes =
        service.notes ?? '';


    let serviceOptions = `
        <option value="">
            {{ __('records.modal.select') }}
        </option>
    `;


    serviceTypesData.forEach(function(serviceType) {

        const selected =
            Number(serviceTypeId) ===
            Number(serviceType.id)
                ? 'selected'
                : '';


        const serviceTaxEnabled =
            toBoolean(
                serviceType.tax_enabled
            );


        const serviceTaxRate =
            serviceTaxEnabled
                ? ivaGeneral
                : 0;


        serviceOptions += `
            <option
                value="${escapeHtml(serviceType.id)}"
                ${selected}
            >
                ${escapeHtml(serviceType.name)}
                — $${Number(serviceType.price || 0).toFixed(2)}
                ${
                    serviceTaxEnabled
                        ? ` + IVA ${serviceTaxRate.toFixed(2)}%`
                        : ''
                }
            </option>
        `;

    });


    const row =
        document.createElement(
            'div'
        );


    row.className =
        'edit-service-row';


    row.innerHTML = `

        <input
            type="hidden"
            name="services[${index}][id]"
            value="${escapeHtml(serviceId)}"
        >

        <div class="service-row-field">

            <label>
                {{ __('records.service') }}
            </label>

            <select
                name="services[${index}][service_type_id]"
                class="service-type-select"
            >

                ${serviceOptions}

            </select>

            ${
                serviceWeight !== null &&
                serviceWeightUnit
                    ? `
                        <div
                            class="table-secondary service-weight-info"
                            style="margin-top:5px;"
                        >
                            ${escapeHtml(serviceWeight)}
                            ${escapeHtml(serviceWeightUnit)}
                        </div>
                    `
                    : `
                        <div
                            class="table-secondary service-weight-info"
                            style="margin-top:5px;"
                        ></div>
                    `
            }

        </div>


        <div class="service-row-field">

            <label>
                {{ __('records.modal.quantity') }}
            </label>

            <input
                type="number"
                name="services[${index}][quantity]"
                class="service-quantity"
                value="${escapeHtml(quantity)}"
                min="1"
                step="1"
            >

        </div>


        <div class="service-row-field">

            <label>
                {{ __('records.modal.unit_price') }}
            </label>

            <input
                type="number"
                name="services[${index}][unit_price]"
                class="service-unit-price"
                value="${escapeHtml(unitPrice)}"
                min="0"
                step="0.01"
            >

        </div>


        <button
            type="button"
            class="service-remove-button"
            title="{{ __('records.modal.delete_service') }}"
        >
            ×
        </button>


        <div
            class="service-row-field"
            style="grid-column:1 / -1;"
        >

            <label>
                {{ __('records.modal.notes') }}
            </label>

            <input
                type="text"
                name="services[${index}][notes]"
                value="${escapeHtml(notes)}"
            >

        </div>

    `;


    container.appendChild(
        row
    );


    const serviceTypeSelect =
        row.querySelector(
            '.service-type-select'
        );


    const quantityInput =
        row.querySelector(
            '.service-quantity'
        );


    const priceInput =
        row.querySelector(
            '.service-unit-price'
        );


    const removeButton =
        row.querySelector(
            '.service-remove-button'
        );


    serviceTypeSelect.addEventListener(
        'change',
        function() {

            const serviceType =
                getServiceType(
                    this.value
                );


            if (serviceType) {

                priceInput.value =
                    Number(
                        serviceType.price || 0
                    ).toFixed(2);

            }


            const weightInfo =
                row.querySelector(
                    '.service-weight-info'
                );


            if (weightInfo) {

                const weight =
                    serviceType?.weight !== null &&
                    serviceType?.weight !== undefined
                        ? Number(serviceType.weight)
                        : null;


                const weightUnit =
                    serviceType?.weight_unit ?? '';


                weightInfo.textContent =
                    weight !== null &&
                    weightUnit
                        ? `${weight} ${weightUnit}`
                        : '';

            }


            updateServiceRowSubtotal(
                row
            );

        }
    );


    quantityInput.addEventListener(
        'input',
        function() {

            updateServiceRowSubtotal(
                row
            );

        }
    );


    priceInput.addEventListener(
        'input',
        function() {

            updateServiceRowSubtotal(
                row
            );

        }
    );


    removeButton.addEventListener(
        'click',
        function() {

            row.remove();

            reindexEditServices();

            updateEditServicesTotal();

        }
    );


    updateServiceRowSubtotal(
        row
    );

}


/* ============================================================
   ACTUALIZAR FILA DE SERVICIO
============================================================ */

function updateServiceRowSubtotal(
    row
) {

    if (!row) {
        return;
    }


    const quantity =
        Number(
            row.querySelector(
                '.service-quantity'
            )?.value || 0
        );


    const unitPrice =
        Number(
            row.querySelector(
                '.service-unit-price'
            )?.value || 0
        );


    const serviceTypeId =
        row.querySelector(
            '.service-type-select'
        )?.value || '';


    const serviceType =
        getServiceType(
            serviceTypeId
        );


    const subtotal =
        quantity *
        unitPrice;


    const taxEnabled =
        toBoolean(
            serviceType?.tax_enabled
        );


    const taxRate =
        taxEnabled
            ? ivaGeneral
            : 0;


    const taxAmount =
        calculateServiceTax(
            subtotal,
            taxRate
        );


    const total =
        subtotal +
        taxAmount;


    const subtotalInput =
        row.querySelector(
            '.service-subtotal'
        );


    const taxRateInput =
        row.querySelector(
            '.service-tax-rate'
        );


    const taxAmountInput =
        row.querySelector(
            '.service-tax-amount'
        );


    const totalInput =
        row.querySelector(
            '.service-total'
        );


    if (subtotalInput) {

        subtotalInput.value =
            subtotal.toFixed(2);

    }


    if (taxRateInput) {

        taxRateInput.value =
            `${taxRate.toFixed(2)}%`;

    }


    if (taxAmountInput) {

        taxAmountInput.value =
            taxAmount.toFixed(2);

    }


    if (totalInput) {

        totalInput.value =
            total.toFixed(2);

    }


    updateEditServicesTotal();

}


/* ============================================================
   TOTAL SERVICIOS
============================================================ */

function updateEditServicesTotal() {

    const container =
        document.getElementById(
            'editServicesContainer'
        );


    const totalElement =
        document.getElementById(
            'editServicesTotal'
        );


    if (
        !container ||
        !totalElement
    ) {
        return;
    }


    let grandTotal = 0;


    container.querySelectorAll(
        '.edit-service-row'
    ).forEach(function(row) {

        const quantity =
            Number(
                row.querySelector(
                    '.service-quantity'
                )?.value || 0
            );


        const unitPrice =
            Number(
                row.querySelector(
                    '.service-unit-price'
                )?.value || 0
            );


        const serviceTypeId =
            row.querySelector(
                '.service-type-select'
            )?.value || '';


        const serviceType =
            getServiceType(
                serviceTypeId
            );


        const taxEnabled =
            toBoolean(
                serviceType?.tax_enabled
            );


        const taxRate =
            taxEnabled
                ? ivaGeneral
                : 0;


        const subtotal =
            quantity *
            unitPrice;


        const tax =
            calculateServiceTax(
                subtotal,
                taxRate
            );


        grandTotal +=
            subtotal + tax;

    });


    totalElement.textContent =
        `Total: ${formatMoney(grandTotal)}`;

}


/* ============================================================
   REINDEXAR SERVICIOS
============================================================ */

function reindexEditServices() {

    const container =
        document.getElementById(
            'editServicesContainer'
        );


    if (!container) {
        return;
    }


    Array.from(
        container.children
    ).forEach(function(row, index) {

        row.querySelectorAll(
            'input, select'
        ).forEach(function(field) {

            const name =
                field.getAttribute(
                    'name'
                );


            if (!name) {
                return;
            }


            field.setAttribute(
                'name',
                name.replace(
                    /services\[\d+\]/,
                    `services[${index}]`
                )
            );

        });

    });

}


/* ============================================================
   MOSTRAR SERVICIOS
============================================================ */

function renderServices(
    services
) {

    const container =
        document.getElementById(
            'detailServicesList'
        );


    if (!container) {
        return;
    }


    container.innerHTML =
        '';


    if (
        !Array.isArray(services) ||
        services.length === 0
    ) {

        container.innerHTML = `
            <div class="detail-item">

                <div class="detail-value">
                    {{ __('records.modal.no_registered_service') }}
                </div>

            </div>
        `;

        return;

    }


    services.forEach(function(service) {

        const item =
            document.createElement(
                'div'
            );


        item.className =
            'service-view-item';


        const quantity =
            Number(
                service.quantity || 0
            );


        const unitPrice =
            Number(
                service.unit_price || 0
            );


        const subtotal =
            Number(
                service.subtotal ??
                (
                    quantity *
                    unitPrice
                )
            );


        const serviceType =
            getServiceType(
                service.service_type_id
            );


        const serviceWeight =
            service.weight !== null &&
            service.weight !== undefined
                ? Number(service.weight)
                : (
                    serviceType?.weight !== null &&
                    serviceType?.weight !== undefined
                        ? Number(serviceType.weight)
                        : null
                );


        const serviceWeightUnit =
            service.weight_unit ??
            serviceType?.weight_unit ??
            '';


        const taxEnabled =
            service.tax_enabled !== undefined
                ? toBoolean(service.tax_enabled)
                : toBoolean(
                    serviceType?.tax_enabled
                );


        const taxRate =
            taxEnabled
                ? ivaGeneral
                : 0;


        const taxAmount =
            service.tax_amount !== undefined
                ? Number(
                    service.tax_amount || 0
                )
                : calculateServiceTax(
                    subtotal,
                    taxRate
                );


        const total =
            service.total !== undefined
                ? Number(
                    service.total || 0
                )
                : subtotal + taxAmount;


        item.innerHTML = `

            <div>

                <div class="service-view-name">
                    ${escapeHtml(
                        service.name ||
                        '{{ __('records.service') }}'
                    )}
                </div>


                ${
                    serviceWeight !== null &&
                    serviceWeightUnit
                        ? `
                            <div class="table-secondary">
                                ${escapeHtml(serviceWeight)}
                                ${escapeHtml(serviceWeightUnit)}
                            </div>
                        `
                        : ''
                }


                ${
                    service.notes
                        ? `
                            <div class="table-secondary">
                                ${escapeHtml(
                                    service.notes
                                )}
                            </div>
                        `
                        : ''
                }


                <div class="table-secondary">
                    Base:
                    $${subtotal.toFixed(2)}
                </div>


                ${
                    taxEnabled
                        ? `
                            <div class="table-secondary">
                                IVA ${taxRate.toFixed(2)}%:
                                +$${taxAmount.toFixed(2)}
                            </div>
                        `
                        : ''
                }

            </div>


            <div class="service-view-qty">
                x${escapeHtml(
                    service.quantity ?? 1
                )}
            </div>


            <div class="service-view-price">

                <strong>
                    $${total.toFixed(2)}
                </strong>

            </div>

        `;


        container.appendChild(
            item
        );

    });

}


/* ============================================================
   MODAL SERVICIO
============================================================ */

function openServiceModal(
    recordId
) {

    currentRecordId =
        recordId;


    const modal =
        document.getElementById(
            'serviceModal'
        );


    const form =
        document.getElementById(
            'serviceForm'
        );


    if (
        !modal ||
        !form
    ) {
        return;
    }


    form.action =
        `/records/${recordId}/services`;


    modal.classList.add(
        'active'
    );


    document.body.style.overflow =
        'hidden';

}


/* ============================================================
   CERRAR SERVICIO
============================================================ */

function closeServiceModal() {

    const modal =
        document.getElementById(
            'serviceModal'
        );


    if (!modal) {
        return;
    }


    modal.classList.remove(
        'active'
    );


    const detailModal =
        document.getElementById(
            'recordDetailModal'
        );


    if (
        !detailModal ||
        !detailModal.classList.contains(
            'active'
        )
    ) {

        document.body.style.overflow =
            '';

    }

}


/* ============================================================
   CERRAR MODAL REGISTRO
============================================================ */

function closeRecordDetailModal() {

    const modal =
        document.getElementById(
            'recordDetailModal'
        );


    if (!modal) {
        return;
    }


    modal.classList.remove(
        'active'
    );


    document.body.style.overflow =
        '';

}


/* ============================================================
   CANCELAR EDICIÓN
============================================================ */

function cancelEditRecord() {

    const form =
        document.getElementById(
            'editRecordForm'
        );


    const view =
        document.getElementById(
            'recordViewMode'
        );


    const footer =
        document.getElementById(
            'detailModalFooter'
        );


    if (form) {

        form.style.display =
            'none';

    }


    if (view) {

        view.style.display =
            'block';

    }


    if (footer) {

        footer.style.display =
            'flex';

    }


    selectedEditFiles = [];


    if (editImagesInput) {

        editImagesInput.value =
            '';

    }


    if (editCameraInput) {

        editCameraInput.value =
            '';

    }


    if (editFileInput) {

        editFileInput.value =
            '';

    }


    if (editImagesContainer) {

        editImagesContainer
            .querySelectorAll(
                '.new-edit-image'
            )
            .forEach(function(element) {

                element.remove();

            });

    }

}


/* ============================================================
   PREPARAR FORMULARIO DE EDICION
============================================================ */

function prepareEditFormSubmit() {

    const form =
        document.getElementById(
            'editRecordForm'
        );


    if (!form) {

        console.error(
            'No se encontró editRecordForm al intentar guardar.'
        );

        return false;

    }


    /* ========================================================
       VERIFICAR ID
    ======================================================== */

    if (!currentRecordId) {

        alert(
            'No se pudo identificar el registro que se desea actualizar.'
        );

        return false;

    }


    /* ========================================================
       ASEGURAR ACTION
    ======================================================== */

    form.action =
        `/records/${currentRecordId}`;


    /* ========================================================
       PREPARAR TIPO DE CANTIDAD
    ======================================================== */

    if (!prepareEditQuantityType()) {

        return false;

    }


    /* ========================================================
       SINCRONIZAR IMAGENES
    ======================================================== */

    syncEditFiles();


    /* ========================================================
       REINDEXAR SERVICIOS
    ======================================================== */

    reindexEditServices();


    console.log(
        'Guardando registro:',
        currentRecordId
    );

    console.log(
        'URL:',
        form.action
    );

    console.log(
        'Imágenes nuevas:',
        selectedEditFiles.length
    );


    return true;

}


/* ============================================================
   INICIALIZAR FORMULARIO DE EDICION
============================================================ */

function initializeEditForm() {

    if (editFormInitialized) {
        return;
    }


    const form =
        document.getElementById(
            'editRecordForm'
        );


    if (!form) {

        console.warn(
            'No se encontró editRecordForm para inicializar.'
        );

        return;

    }


    editFormInitialized = true;


    form.addEventListener(
        'submit',
        function(event) {

            const valid =
                prepareEditFormSubmit();


            if (!valid) {

                event.preventDefault();

                return;

            }


            /*
             * IMPORTANTE:
             *
             * NO hacemos preventDefault aquí.
             *
             * Laravel recibirá el formulario normalmente
             * mediante POST + _method=PUT.
             */

        }
    );

}


/* ============================================================
   VALOR DETALLE
============================================================ */

function cleanDetailValue(
    value
) {

    if (
        value === null ||
        value === undefined ||
        String(value).trim() === ''
    ) {

        return '—';

    }


    return value;

}


/* ============================================================
   OBTENER VALOR DETALLE
============================================================ */

function getDetailValue(
    id
) {

    const element =
        document.getElementById(
            id
        );


    if (!element) {
        return '';
    }


    const value =
        element.textContent.trim();


    return value === '—'
        ? ''
        : value;

}


/* ============================================================
   CONVERTIR FECHA
============================================================ */

function convertDateToInput(
    value
) {

    if (!value) {
        return '';
    }


    const stringValue =
        String(value).trim();


    const match =
        stringValue.match(
            /^(\d{2})\/(\d{2})\/(\d{4})$/
        );


    if (match) {

        return `${match[3]}-${match[2]}-${match[1]}`;

    }


    return stringValue;

}


/* ============================================================
   DOM READY
============================================================ */

document.addEventListener(
    'DOMContentLoaded',
    function() {

        /* ====================================================
           INICIALIZAR AUTOCOMPLETE
        ==================================================== */

        initializeAutocomplete();


        /* ====================================================
           INICIALIZAR IMAGENES
        ==================================================== */

        initializeEditImages();


        /* ====================================================
           INICIALIZAR TIPO DE CANTIDAD
        ==================================================== */

        initializeEditQuantityType();


        /* ====================================================
           INICIALIZAR FORMULARIO
        ==================================================== */

        initializeEditForm();


        /* ====================================================
           CERRAR MODAL
        ==================================================== */

        const closeRecordDetailModalButton =
            document.getElementById(
                'closeRecordDetailModal'
            );


        if (closeRecordDetailModalButton) {

            closeRecordDetailModalButton.addEventListener(
                'click',
                closeRecordDetailModal
            );

        }


        const closeDetailButton =
            document.getElementById(
                'closeDetailButton'
            );


        if (closeDetailButton) {

            closeDetailButton.addEventListener(
                'click',
                closeRecordDetailModal
            );

        }


        /* ====================================================
           EDITAR DESDE DETALLE
        ==================================================== */

        const editDetailButton =
            document.getElementById(
                'editDetailButton'
            );


        if (editDetailButton) {

            editDetailButton.addEventListener(
                'click',
                function() {

                    openEditRecordModal(

                        currentRecordId,

                        convertDateToInput(
                            document.getElementById(
                                'detailDate'
                            )?.textContent || ''
                        ),

                        getDetailValue(
                            'detailInvoice'
                        ),

                        getDetailValue(
                            'detailPaps'
                        ),

                        currentRecordCompanyId,
                        currentRecordCompanyName,

                        currentRecordDriverId,
                        currentRecordDriverName,

                        currentRecordTrailerId,
                        currentRecordTrailerNumber,

                        currentRecordBrokerId,
                        currentRecordBrokerName,

                        currentRecordShipperId,
                        currentRecordShipperName,

                        currentRecordConsigneeId,
                        currentRecordConsigneeName,

                        getDetailValue(
                            'detailOrigin'
                        ),

                        getDetailValue(
                            'detailDestination'
                        ),

                        getDetailValue(
                            'detailQuantity'
                        ),

                        getDetailValue(
                            'detailQuantityType'
                        ),

                        getDetailValue(
                            'detailNotes'
                        ),

                        currentRecordServices,

                        getDetailValue(
                            'detailRegisteredBy'
                        ),

                        getDetailValue(
                            'detailCreatedAt'
                        ),

                        currentRecordImageUrls

                    );

                }
            );

        }


        /* ====================================================
           CANCELAR EDICIÓN
        ==================================================== */

        const cancelEditButton =
            document.getElementById(
                'cancelEditButton'
            );


        if (cancelEditButton) {

            cancelEditButton.addEventListener(
                'click',
                cancelEditRecord
            );

        }


        /* ====================================================
           AGREGAR SERVICIO
        ==================================================== */

        const addEditServiceButton =
            document.getElementById(
                'addEditServiceButton'
            );


        if (addEditServiceButton) {

            addEditServiceButton.addEventListener(
                'click',
                function() {

                    addEditServiceRow();

                }
            );

        }


        /* ====================================================
           SERVICIO DESDE DETALLE
        ==================================================== */

        const detailServiceButton =
            document.getElementById(
                'detailServiceButton'
            );


        if (detailServiceButton) {

            detailServiceButton.addEventListener(
                'click',
                function() {

                    if (!currentRecordId) {
                        return;
                    }


                    openEditRecordFromCurrentRecord(
                        true
                    );

                }
            );

        }


        /* ====================================================
           CERRAR SERVICIO
        ==================================================== */

        const closeServiceModalButton =
            document.getElementById(
                'closeServiceModal'
            );


        if (closeServiceModalButton) {

            closeServiceModalButton.addEventListener(
                'click',
                closeServiceModal
            );

        }


        const cancelServiceButton =
            document.getElementById(
                'cancelServiceButton'
            );


        if (cancelServiceButton) {

            cancelServiceButton.addEventListener(
                'click',
                closeServiceModal
            );

        }


        /* ====================================================
           CLICK FUERA MODAL REGISTRO
        ==================================================== */

        const recordDetailModal =
            document.getElementById(
                'recordDetailModal'
            );


        if (recordDetailModal) {

            recordDetailModal.addEventListener(
                'click',
                function(event) {

                    if (
                        event.target === this
                    ) {

                        closeRecordDetailModal();

                    }

                }
            );

        }


        /* ====================================================
           CLICK FUERA MODAL SERVICIO
        ==================================================== */

        const serviceModal =
            document.getElementById(
                'serviceModal'
            );


        if (serviceModal) {

            serviceModal.addEventListener(
                'click',
                function(event) {

                    if (
                        event.target === this
                    ) {

                        closeServiceModal();

                    }

                }
            );

        }


        /* ====================================================
           ESC
        ==================================================== */

        document.addEventListener(
            'keydown',
            function(event) {

                if (
                    event.key !== 'Escape'
                ) {

                    return;

                }


                const currentServiceModal =
                    document.getElementById(
                        'serviceModal'
                    );


                const currentDetailModal =
                    document.getElementById(
                        'recordDetailModal'
                    );


                if (
                    currentServiceModal &&
                    currentServiceModal.classList.contains(
                        'active'
                    )
                ) {

                    closeServiceModal();

                    return;

                }


                if (
                    currentDetailModal &&
                    currentDetailModal.classList.contains(
                        'active'
                    )
                ) {

                    closeRecordDetailModal();

                }

            }
        );

    }
);

</script>
</x-app-layout>