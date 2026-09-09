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

.detail-image-container {
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 10px;
    background: #f9fafb;
    border: 1px solid #e5e7eb;
    border-radius: 7px;
}

.detail-image {
    display: block;
    max-width: 100%;
    max-height: 350px;
    margin: 0 auto;
    border-radius: 7px;
    object-fit: contain;
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

</style>


{{-- ============================================================
     DATOS PARA JAVASCRIPT
============================================================ --}}

@php

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


    $serviceTypesData = $serviceTypes->map(function ($serviceType) {
        return [
            'id' => $serviceType->id,
            'name' => $serviceType->name,
            'price' => $serviceType->price,
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

                        $imageUrl = $record->image
                            ? \Illuminate\Support\Facades\Storage::disk('public')->url($record->image)
                            : null;


                        $services = $record->services ?? collect();


                        $servicesData = $services->map(function ($service) {

                            return [
                                'id' => $service->id,
                                'service_type_id' => $service->service_type_id,
                                'name' => $service->serviceType->name ?? 'Servicio',
                                'quantity' => $service->quantity,
                                'unit_price' => $service->unit_price,
                                'subtotal' => $service->subtotal,
                                'notes' => $service->notes,
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
                            @js($imageUrl),
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
                                        @js($imageUrl),
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
                                        @js($imageUrl)
                                    )"
                                >
                                {{ __('records.modal.edit_record') }}
                                </button>

                            </div>

                        </td>


                        @if(auth()->user()->role === 'admin')

                            <td
                                onclick="event.stopPropagation()"
                            >

                                <button
                                    type="button"
                                    class="action-button service"
                                    onclick="openServiceModal({{ $record->id }})"
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
                            {{ __('records.records.create') }}
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

                <div class="detail-image-container">

                    <img
                        id="detailImage"
                        class="detail-image"
                        src=""
                        alt="{{ __('records.modal.current_image') }}"
                    >

                </div>

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
                                required
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



                {{-- IMAGEN --}}

                <div class="form-section">

                    <div class="form-section-title">
                    {{ __('records.modal.image') }}
                    </div>

                    <div class="form-group">

                        <label class="form-label">
                        {{ __('records.modal.replace_image') }}
                        </label>

                        <input
                            type="file"
                            id="editImage"
                            name="image"
                            class="form-input"
                            accept="image/jpeg,image/png,image/webp"
                            capture="environment"
                        >

                        <div
                            id="editImagePreview"
                            class="edit-image-preview"
                        >

                            <img
                                id="editImagePreviewImg"
                                src=""
                                alt="{{ __('records.modal.preview_alt') }}"
                            >

                        </div>

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
                                name="quantity_type"
                                class="form-select"
                            >

                                <option value="">
                                {{ __('records.modal.select') }}
                                </option>

                                <option value="palets">
                                {{ __('records.modal.palets') }}
                                </option>

                                <option value="contenedores">
                                {{ __('records.modal.containers') }}
                                </option>

                                <option value="piezas">
                                {{ __('records.modal.pieces') }}
                                </option>

                            </select>

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
                            {{ __('records.modal_shipper') }}
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
                        required
                    >

                        <option value="">
                        {{ __('records.modal.select_service') }}
                        </option>

                        @foreach($serviceTypes as $serviceType)

                            <option value="{{ $serviceType->id }}">
                                {{ $serviceType->name }}
                                — ${{ number_format($serviceType->price, 2) }}
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

let currentRecordImageUrl = null;


/* ============================================================
   CATÁLOGOS
============================================================ */

const autocompleteData = @json($autocompleteData);


/* ============================================================
   TIPOS DE SERVICIO
============================================================ */

const serviceTypesData = @json($serviceTypesData);


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

    if (value === null || value === undefined) {
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
   AUTOCOMPLETE
============================================================ */

function setupAutocomplete(type) {

    const config = autocompleteConfig[type];

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
            input.value.trim().toLowerCase();


        /*
         * Si el usuario escribe algo,
         * se considera que puede ser un nuevo valor.
         *
         * Por eso se limpia el ID.
         */

        hiddenId.value = '';

        hiddenName.value =
            input.value.trim();


        let results =
            autocompleteData[type].filter(function(item) {

                return String(item.value)
                    .toLowerCase()
                    .includes(search);

            });


        if (search === '') {

            results =
                autocompleteData[type].slice(0, 10);

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

Object.keys(
    autocompleteConfig
).forEach(function(type) {

    setupAutocomplete(type);

});


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
    imageUrl,
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


    currentRecordImageUrl =
        imageUrl || null;


    document.getElementById(
        'detailModalTitle'
    ).textContent =
        `{{ __('records.table.record') }} #${recordId}`;


    document.getElementById(
        'detailModalSubtitle'
    ).textContent =
        invoice
            ? `{{ __('records.invoice') }}: ${invoice}`
            : '{{ __('records.modal.information') }}';


    document.getElementById(
        'detailDate'
    ).textContent =
        cleanDetailValue(date);


    document.getElementById(
        'detailRecordId'
    ).textContent =
        `#${recordId}`;


    document.getElementById(
        'detailInvoice'
    ).textContent =
        cleanDetailValue(invoice);


    document.getElementById(
        'detailPaps'
    ).textContent =
        cleanDetailValue(paps);


    document.getElementById(
        'detailOrigin'
    ).textContent =
        cleanDetailValue(origin);


    document.getElementById(
        'detailDestination'
    ).textContent =
        cleanDetailValue(destination);


    document.getElementById(
        'detailQuantity'
    ).textContent =
        cleanDetailValue(quantity);


    document.getElementById(
        'detailQuantityType'
    ).textContent =
        cleanDetailValue(quantityType);


    document.getElementById(
        'detailCompany'
    ).textContent =
        cleanDetailValue(companyName);


    document.getElementById(
        'detailDriver'
    ).textContent =
        cleanDetailValue(driverName);


    document.getElementById(
        'detailTrailer'
    ).textContent =
        cleanDetailValue(trailerNumber);


    document.getElementById(
        'detailBroker'
    ).textContent =
        cleanDetailValue(brokerName);


    document.getElementById(
        'detailShipper'
    ).textContent =
        cleanDetailValue(shipperName);


    document.getElementById(
        'detailConsignee'
    ).textContent =
        cleanDetailValue(consigneeName);


    document.getElementById(
        'detailRegisteredBy'
    ).textContent =
        cleanDetailValue(registeredBy);


    document.getElementById(
        'detailCreatedAt'
    ).textContent =
        cleanDetailValue(createdAt);


    document.getElementById(
        'detailNotes'
    ).textContent =
        cleanDetailValue(notes);


    const imageSection =
        document.getElementById(
            'detailImageSection'
        );

    const image =
        document.getElementById(
            'detailImage'
        );


    if (imageUrl) {

        image.src =
            imageUrl;

        imageSection.style.display =
            'block';

    } else {

        image.src =
            '';

        imageSection.style.display =
            'none';

    }


    renderServices(
        currentRecordServices
    );


    const modal =
        document.getElementById(
            'recordDetailModal'
        );


    document.getElementById(
        'recordViewMode'
    ).style.display =
        'block';


    document.getElementById(
        'editRecordForm'
    ).style.display =
        'none';


    document.getElementById(
        'detailModalFooter'
    ).style.display =
        'flex';


    modal.classList.add(
        'active'
    );


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
    imageUrl
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


    currentRecordImageUrl =
        imageUrl || null;


    document.getElementById(
        'editDate'
    ).value =
        date ?? '';


    document.getElementById(
        'editRecordId'
    ).value =
        recordId;


    document.getElementById(
        'editInvoice'
    ).value =
        invoice ?? '';


    document.getElementById(
        'editPaps'
    ).value =
        paps ?? '';


    document.getElementById(
        'editOrigin'
    ).value =
        origin ?? '';


    document.getElementById(
        'editDestination'
    ).value =
        destination ?? '';


    document.getElementById(
        'editQuantity'
    ).value =
        quantity ?? '';


    document.getElementById(
        'editQuantityType'
    ).value =
        quantityType ?? '';


    document.getElementById(
        'editNotes'
    ).value =
        notes ?? '';


    document.getElementById(
        'editRegisteredBy'
    ).value =
        registeredBy ?? '';


    document.getElementById(
        'editCreatedAt'
    ).value =
        createdAt ?? '';


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
       IMAGEN
    ======================================================== */

    const preview =
        document.getElementById(
            'editImagePreview'
        );

    const previewImg =
        document.getElementById(
            'editImagePreviewImg'
        );


    if (imageUrl) {

        previewImg.src =
            imageUrl;

        preview.style.display =
            'block';

    } else {

        previewImg.src =
            '';

        preview.style.display =
            'none';

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


    form.action =
        `/records/${recordId}`;


    /* ========================================================
       MOSTRAR EDITAR
    ======================================================== */

    document.getElementById(
        'recordViewMode'
    ).style.display =
        'none';


    document.getElementById(
        'detailModalFooter'
    ).style.display =
        'none';


    form.style.display =
        'block';


    document.getElementById(
        'recordDetailModal'
    ).classList.add(
        'active'
    );


    document.body.style.overflow =
        'hidden';

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


    const notes =
        service.notes ?? '';


    /* ========================================================
       OPCIONES DE SERVICIO
    ======================================================== */

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


        serviceOptions += `
            <option
                value="${escapeHtml(serviceType.id)}"
                ${selected}
            >
                ${escapeHtml(serviceType.name)}
            </option>
        `;

    });


    /* ========================================================
       CREAR FILA
    ======================================================== */

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
                required
            >
                ${serviceOptions}
            </select>

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
                required
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
                required
            >

        </div>


        <div class="service-row-field">

            <label>
                Subtotal
            </label>

            <input
                type="text"
                class="service-subtotal"
                value="${Number(subtotal).toFixed(2)}"
                readonly
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
   SUBTOTAL
============================================================ */

function updateServiceRowSubtotal(
    row
) {

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


    const subtotal =
        quantity *
        unitPrice;


    const subtotalInput =
        row.querySelector(
            '.service-subtotal'
        );


    if (subtotalInput) {

        subtotalInput.value =
            subtotal.toFixed(2);

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


    let total =
        0;


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


        total +=
            quantity *
            unitPrice;

    });


    totalElement.textContent =
        `Total: $${total.toFixed(2)}`;

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


        item.innerHTML = `

            <div>

                <div class="service-view-name">
                    ${escapeHtml(
                        service.name ||
                        '{{ __('records.service') }}'
                    )}
                </div>

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

            </div>


            <div class="service-view-qty">
                x${escapeHtml(
                    service.quantity ?? 1
                )}
            </div>


            <div class="service-view-price">
                $${subtotal.toFixed(2)}
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


    const match =
        String(value).match(
            /^(\d{2})\/(\d{2})\/(\d{4})$/
        );


    if (match) {

        return `${match[3]}-${match[2]}-${match[1]}`;

    }


    return value;

}


/* ============================================================
   DOM READY
============================================================ */

document.addEventListener(
    'DOMContentLoaded',
    function() {


        /* ====================================================
           CERRAR MODAL
        ==================================================== */

        document.getElementById(
            'closeRecordDetailModal'
        )?.addEventListener(
            'click',
            closeRecordDetailModal
        );


        document.getElementById(
            'closeDetailButton'
        )?.addEventListener(
            'click',
            closeRecordDetailModal
        );


        /* ====================================================
           EDITAR DESDE DETALLE
        ==================================================== */

        document.getElementById(
            'editDetailButton'
        )?.addEventListener(
            'click',
            function() {

                openEditRecordModal(

                    currentRecordId,


                    convertDateToInput(
                        document.getElementById(
                            'detailDate'
                        ).textContent
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


                    currentRecordImageUrl

                );

            }
        );


        /* ====================================================
           CANCELAR EDICIÓN
        ==================================================== */

        document.getElementById(
            'cancelEditButton'
        )?.addEventListener(
            'click',
            cancelEditRecord
        );


        /* ====================================================
           AGREGAR SERVICIO
        ==================================================== */

        document.getElementById(
            'addEditServiceButton'
        )?.addEventListener(
            'click',
            function() {

                addEditServiceRow();

            }
        );


        /* ====================================================
           SERVICIO DESDE DETALLE
        ==================================================== */

        document.getElementById(
            'detailServiceButton'
        )?.addEventListener(
            'click',
            function() {

                if (currentRecordId) {

                    openServiceModal(
                        currentRecordId
                    );

                }

            }
        );


        /* ====================================================
           PREVIEW IMAGEN
        ==================================================== */

        document.getElementById(
            'editImage'
        )?.addEventListener(
            'change',
            function() {

                const file =
                    this.files?.[0];


                const preview =
                    document.getElementById(
                        'editImagePreview'
                    );


                const image =
                    document.getElementById(
                        'editImagePreviewImg'
                    );


                if (!file) {

                    preview.style.display =
                        'none';

                    image.src =
                        '';

                    return;

                }


                if (
                    !file.type.startsWith(
                        'image/'
                    )
                ) {

                    alert(
                        '{{ __('records.modal.valid_image') }}'
                    );


                    this.value =
                        '';


                    return;

                }


                if (
                    file.size >
                    10 * 1024 * 1024
                ) {

                    alert(
                        '{{ __('records.modal.image_mb') }}'
                    );


                    this.value =
                        '';


                    return;

                }


                const reader =
                    new FileReader();


                reader.onload =
                    function(event) {

                        image.src =
                            event.target.result;


                        preview.style.display =
                            'block';

                    };


                reader.readAsDataURL(
                    file
                );

            }
        );


        /* ====================================================
           CERRAR SERVICIO
        ==================================================== */

        document.getElementById(
            'closeServiceModal'
        )?.addEventListener(
            'click',
            closeServiceModal
        );


        document.getElementById(
            'cancelServiceButton'
        )?.addEventListener(
            'click',
            closeServiceModal
        );


        /* ====================================================
           CLICK FUERA MODAL REGISTRO
        ==================================================== */

        document.getElementById(
            'recordDetailModal'
        )?.addEventListener(
            'click',
            function(event) {

                if (
                    event.target === this
                ) {

                    closeRecordDetailModal();

                }

            }
        );


        /* ====================================================
           CLICK FUERA MODAL SERVICIO
        ==================================================== */

        document.getElementById(
            'serviceModal'
        )?.addEventListener(
            'click',
            function(event) {

                if (
                    event.target === this
                ) {

                    closeServiceModal();

                }

            }
        );


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


                const serviceModal =
                    document.getElementById(
                        'serviceModal'
                    );


                const detailModal =
                    document.getElementById(
                        'recordDetailModal'
                    );


                if (
                    serviceModal?.classList.contains(
                        'active'
                    )
                ) {

                    closeServiceModal();

                    return;

                }


                if (
                    detailModal?.classList.contains(
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