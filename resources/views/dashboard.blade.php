<x-app-layout>

<style>

    /* =========================================================
       BASE
    ========================================================= */

    .sfa-dashboard {
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

    .dashboard-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 20px;
    }

    .dashboard-title {
        margin: 0;
        font-size: 23px;
        font-weight: 600;
        color: #1f2937;
    }

    .dashboard-subtitle {
        margin-top: 4px;
        font-size: 12px;
        color: #6b7280;
    }


    /* =========================================================
       BOTON NUEVO REGISTRO
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
        cursor: pointer;
        transition: background .2s ease;
    }

    .new-record-button:hover {
        background: #111827;
    }

    .new-record-button svg {
        width: 15px;
        height: 15px;
    }


    /* =========================================================
       ESTADISTICAS
    ========================================================= */

    .stats-row {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        background: white;
        border-top: 1px solid #e5e7eb;
        border-bottom: 1px solid #e5e7eb;
        margin-bottom: 20px;
    }

    .stat-item {
        padding: 12px 18px;
        border-right: 1px solid #e5e7eb;
    }

    .stat-item:last-child {
        border-right: none;
    }

    .stat-label {
        font-size: 10px;
        color: #6b7280;
        text-transform: uppercase;
        letter-spacing: .04em;
    }

    .stat-value {
        margin-top: 3px;
        font-size: 20px;
        font-weight: 600;
        color: #1f2937;
        line-height: 1.2;
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
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 12px 16px;
        border-bottom: 1px solid #e5e7eb;
    }

    .records-title {
        font-size: 14px;
        font-weight: 600;
        color: #1f2937;
    }

    .records-link {
        font-size: 12px;
        color: #6b7280;
        text-decoration: none;
    }

    .records-link:hover {
        color: #111827;
        text-decoration: underline;
    }

    .records-table-wrapper {
        width: 100%;
        overflow-x: auto;
    }

    .records-table {
        width: 100%;
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
    }

    .records-table tbody tr:last-child td {
        border-bottom: none;
    }

    .record-row {
        cursor: pointer;
        transition: background .15s ease;
    }

    .record-row:hover {
        background: #f8fafc;
    }


    /* =========================================================
       SIN REGISTROS
    ========================================================= */

    .empty-records {
        padding: 35px 20px;
        text-align: center;
        color: #9ca3af;
        font-size: 12px;
    }


    /* =========================================================
       MODAL GENERAL
    ========================================================= */

    .record-modal {
        position: fixed;
        inset: 0;
        z-index: 9999;
        display: none;
        align-items: center;
        justify-content: center;
        padding: 20px;
        background: rgba(0, 0, 0, .45);
    }

    .record-modal.active {
        display: flex;
    }

    .record-modal-box {
        width: 100%;
        max-width: 760px;
        max-height: 92vh;
        overflow-y: auto;
        background: white;
        border-radius: 8px;
        box-shadow: 0 20px 50px rgba(0, 0, 0, .20);
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
       ESTADO
    ========================================================= */

    .modal-status-box {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 18px;
        padding: 12px 14px;
        border: 1px solid #e5e7eb;
        border-radius: 6px;
        background: #f9fafb;
    }

    .modal-status-left {
        display: flex;
        align-items: center;
        gap: 9px;
    }

    .modal-status-dot {
        width: 10px;
        height: 10px;
        border-radius: 50%;
    }

    .modal-status-text {
        font-size: 12px;
        font-weight: 600;
    }

    .modal-status-red .modal-status-dot {
        background: #ef4444;
    }

    .modal-status-red .modal-status-text {
        color: #991b1b;
    }

    .modal-status-yellow .modal-status-dot {
        background: #f59e0b;
    }

    .modal-status-yellow .modal-status-text {
        color: #92400e;
    }

    .modal-status-green .modal-status-dot {
        background: #22c55e;
    }

    .modal-status-green .modal-status-text {
        color: #166534;
    }


    /* =========================================================
       INFORMACION
    ========================================================= */

    .detail-section {
        margin-bottom: 20px;
    }

    .detail-section-title {
        margin-bottom: 11px;
        padding-bottom: 7px;
        border-bottom: 1px solid #e5e7eb;
        font-size: 11px;
        font-weight: 600;
        color: #374151;
        text-transform: uppercase;
        letter-spacing: .04em;
    }

    .detail-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 11px 18px;
    }

    .detail-item {
        min-width: 0;
    }

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

    .detail-value.empty {
        color: #9ca3af;
        font-weight: 400;
    }


    /* =========================================================
       ACCIONES
    ========================================================= */

    .record-action-area {
        margin-top: 18px;
        padding-top: 15px;
        border-top: 1px solid #e5e7eb;
    }

    .record-action-title {
        margin-bottom: 8px;
        font-size: 11px;
        font-weight: 600;
        color: #6b7280;
    }

    .review-action {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        padding: 8px 13px;
        border: 1px solid #fcd34d;
        border-radius: 5px;
        background: #fffbeb;
        color: #92400e;
        font-size: 11px;
        font-weight: 500;
        cursor: pointer;
    }

    .review-action:hover {
        background: #fef3c7;
    }

    .release-action {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        padding: 8px 13px;
        border: 1px solid #86efac;
        border-radius: 5px;
        background: #f0fdf4;
        color: #166534;
        font-size: 11px;
        font-weight: 500;
        cursor: pointer;
    }

    .release-action:hover {
        background: #dcfce7;
    }

    .already-released {
        font-size: 11px;
        color: #6b7280;
    }


    /* =========================================================
       MODAL FOOTER
    ========================================================= */

    .modal-footer {
        display: flex;
        align-items: center;
        justify-content: flex-end;
        gap: 8px;
        padding: 12px 20px;
        border-top: 1px solid #e5e7eb;
    }

    .btn-cancel {
        padding: 8px 13px;
        border: 1px solid #d1d5db;
        border-radius: 5px;
        background: white;
        color: #4b5563;
        font-size: 11px;
        font-weight: 500;
        cursor: pointer;
    }

    .btn-cancel:hover {
        background: #f9fafb;
    }

    .btn-save {
        padding: 8px 15px;
        border: none;
        border-radius: 5px;
        background: #1f2937;
        color: white;
        font-size: 11px;
        font-weight: 500;
        cursor: pointer;
    }

    .btn-save:hover {
        background: #111827;
    }


    /* =========================================================
       FORMULARIO
    ========================================================= */

    .form-section-title {
        margin-bottom: 12px;
        padding-bottom: 7px;
        border-bottom: 1px solid #e5e7eb;
        font-size: 11px;
        font-weight: 600;
        color: #374151;
        text-transform: uppercase;
        letter-spacing: .04em;
    }

    .form-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 13px 16px;
        margin-bottom: 20px;
    }

    .form-group {
        min-width: 0;
    }

    .form-group.full {
        grid-column: 1 / -1;
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
    .form-textarea {
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
    .form-textarea:focus {
        border-color: #6b7280;
        box-shadow: 0 0 0 2px rgba(107, 114, 128, .10);
    }


    /* =========================================================
       AUTOCOMPLETE
    ========================================================= */

    .autocomplete {
        position: relative;
    }

    .autocomplete-options {
        position: absolute;
        top: calc(100% + 3px);
        left: 0;
        right: 0;
        max-height: 180px;
        overflow-y: auto;
        background: white;
        border: 1px solid #d1d5db;
        border-radius: 5px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, .08);
        z-index: 1000;
        display: none;
    }

    .autocomplete-option {
        padding: 8px 10px;
        font-size: 12px;
        color: #374151;
        cursor: pointer;
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


    /* =========================================================
       IMAGEN
    ========================================================= */

    .image-upload-container {
        width: 100%;
    }

    .image-upload-button {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        padding: 9px 16px;
        border: 1px solid #d1d5db;
        border-radius: 6px;
        background: #f8fafc;
        color: #374151;
        font-size: 13px;
        font-weight: 600;
        cursor: pointer;
        transition: 0.2s;
    }

    .image-upload-button:hover {
        background: #f1f5f9;
        border-color: #9ca3af;
    }

    .image-preview-container {
        margin-top: 10px;
        width: 100%;
        max-width: 420px;
        padding: 10px;
        border: 1px solid #e5e7eb;
        border-radius: 8px;
        background: #ffffff;
    }

    .image-preview {
        display: block;
        width: 100%;
        max-height: 220px;
        object-fit: contain;
        border-radius: 6px;
        background: #f8fafc;
    }

    .image-preview-actions {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 10px;
        margin-top: 8px;
    }

    .image-name {
        flex: 1;
        min-width: 0;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        font-size: 12px;
        color: #6b7280;
    }

    .image-remove-button {
        border: none;
        background: transparent;
        color: #dc2626;
        font-size: 12px;
        font-weight: 600;
        cursor: pointer;
    }

    .image-remove-button:hover {
        text-decoration: underline;
    }


    /* =========================================================
       RESPONSIVE
    ========================================================= */

    @media (max-width: 800px) {

        .sfa-container {
            padding: 18px;
        }

        .stats-row {
            grid-template-columns: repeat(2, 1fr);
        }

        .stat-item:nth-child(2) {
            border-right: none;
        }

        .stat-item:nth-child(-n+2) {
            border-bottom: 1px solid #e5e7eb;
        }

        .detail-grid {
            grid-template-columns: 1fr;
        }

        .form-grid {
            grid-template-columns: 1fr;
        }

        .form-group.full {
            grid-column: auto;
        }
    }

    @media (max-width: 600px) {

        .sfa-container {
            padding: 14px;
        }

        .dashboard-header {
            align-items: flex-start;
            gap: 10px;
        }

        .dashboard-title {
            font-size: 20px;
        }

        .new-record-button {
            padding: 8px 10px;
        }

        .new-record-button span {
            display: none;
        }

        .record-modal {
            padding: 10px;
        }

        .record-modal-box {
            max-height: 95vh;
        }
    }

    .record-images-gallery {
    display: grid;
    grid-template-columns: repeat(
        auto-fill,
        minmax(140px, 1fr)
    );
    gap: 12px;
    margin-top: 10px;
}


.record-image-item {
    position: relative;
    overflow: hidden;
    border-radius: 10px;
    min-height: 140px;
}


.record-image-preview {
    width: 100%;
    height: 180px;
    object-fit: cover;
    display: block;
    border-radius: 10px;
    cursor: pointer;
}


.record-image-remove {
    position: absolute;
    top: 6px;
    right: 6px;
    width: 30px;
    height: 30px;
    border: none;
    border-radius: 50%;
    background: rgba(0, 0, 0, 0.7);
    color: white;
    font-size: 20px;
    line-height: 30px;
    text-align: center;
    cursor: pointer;
    z-index: 2;
}


.record-image-remove:hover {
    background: rgba(180, 0, 0, 0.9);
}


.new-edit-image {
    position: relative;
}


@media (max-width: 600px) {

    .record-images-gallery {
        grid-template-columns: repeat(
            2,
            minmax(0, 1fr)
        );
    }

    .record-image-preview {
        height: 150px;
    }

}

</style>

<div class="sfa-dashboard">

    <div class="sfa-container">

        {{-- =====================================================
             HEADER
        ====================================================== --}}

        <div class="dashboard-header">

            <div>
                <h1 class="dashboard-title">
                    {{ __('dashboard.title') }}
                </h1>

                <p class="dashboard-subtitle">
                    {{ __('dashboard.subtitle') }}
                </p>
            </div>

            <button
                type="button"
                id="openNewRecordModal"
                class="new-record-button"
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="2"
                    stroke="currentColor"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M12 4.5v15m7.5-7.5h-15"
                    />
                </svg>

                <span>
                    {{ __('dashboard.new_record') }}
                </span>
            </button>

        </div>


        {{-- =====================================================
             ESTADISTICAS
        ====================================================== --}}

        <div class="stats-row">

            <div class="stat-item">

                <div class="stat-label">
                    {{ __('dashboard.stats.today_records') }}
                </div>

                <div class="stat-value">
                    {{ $todayRecords ?? 0 }}
                </div>

            </div>

        </div>


        {{-- =====================================================
             REGISTROS RECIENTES
        ====================================================== --}}

        <div class="records-section">

            <div class="records-header">

                <div class="records-title">
                    {{ __('dashboard.recent_records') }}
                </div>

                <a
                    href="{{ route('records.index') }}"
                    class="records-link"
                >
                    {{ __('dashboard.view_all') }}
                </a>

            </div>


            <div class="records-table-wrapper">

                <table class="records-table">

                    <thead>

                        <tr>
                            <th>{{ __('dashboard.table.date') }}</th>
                            <th>{{ __('dashboard.table.company') }}</th>
                            <th>{{ __('dashboard.table.driver') }}</th>
                            <th>{{ __('dashboard.table.trailer') }}</th>
                            <th>{{ __('dashboard.table.invoice_number') }}</th>
                        </tr>

                    </thead>


                    <tbody>

                        @forelse($recentRecords ?? [] as $record)

                            <tr
                                class="record-row"

                                data-record-id="{{ $record->id }}"

                                data-date="{{ $record->date
                                    ? \Carbon\Carbon::parse($record->date)->format('Y-m-d')
                                    : ''
                                }}"

                                data-company-id="{{ $record->company_id ?? '' }}"
                                data-company="{{ $record->company?->name ?? '' }}"

                                data-driver-id="{{ $record->driver_id ?? '' }}"
                                data-driver="{{ $record->driver?->name ?? '' }}"

                                data-trailer-id="{{ $record->trailer_id ?? '' }}"
                                data-trailer="{{ $record->trailer?->number ?? '' }}"

                                data-broker-id="{{ $record->broker_id ?? '' }}"
                                data-broker="{{ $record->broker?->name ?? '' }}"

                                data-shipper-id="{{ $record->shipper_id ?? '' }}"
                                data-shipper="{{ $record->shipper?->name ?? '' }}"

                                data-consignee-id="{{ $record->consignee_id ?? '' }}"
                                data-consignee="{{ $record->consignee?->name ?? '' }}"

                                data-invoice="{{ $record->invoice_number ?? '' }}"
                                data-paps="{{ $record->paps_number ?? '' }}"
                                data-fact="{{ $record->fact_number ?? '' }}"

                                data-origin="{{ $record->origin ?? '' }}"
                                data-destination="{{ $record->destination ?? '' }}"
                                data-quantity="{{ $record->quantity ?? '' }}"
                                data-quantity-type="{{ $record->quantity_type ?? '' }}"

                                data-notes="{{ $record->notes ?? '' }}"

                                data-images='@json(
                                    $record->images->map(function ($image) {
                                        return [
                                            "id" => $image->id,
                                            "url" => asset("storage/" . $image->image_path),
                                        ];
                                    })->values()
                                )'
                            >

                                <td>
                                    {{ $record->date
                                        ? \Carbon\Carbon::parse($record->date)->format('d/m/Y')
                                        : '—'
                                    }}
                                </td>

                                <td>
                                    {{ $record->company?->name ?? '—' }}
                                </td>

                                <td>
                                    {{ $record->driver?->name ?? '—' }}
                                </td>

                                <td>
                                    {{ $record->trailer?->number ?? '—' }}
                                </td>

                                <td>
                                    {{ $record->invoice_number ?? '—' }}
                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="5">

                                    <div class="empty-records">
                                        {{ __('dashboard.no_recent_records') }}
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



{{-- =============================================================
     MODAL VER / EDITAR REGISTRO
============================================================= --}}

<div
    id="recordDetailModal"
    class="record-modal"
>

    <div
        class="record-modal-box"
        role="dialog"
        aria-modal="true"
    >

        <div class="modal-header">

            <div>

                <div
                    id="detailModalTitle"
                    class="modal-title"
                >
                    {{ __('dashboard.modal.record') }}
                </div>

                <div
                    id="detailModalSubtitle"
                    class="modal-subtitle"
                >
                    {{ __('dashboard.modal.information') }}
                </div>

            </div>

            <button
                type="button"
                id="closeDetailModal"
                class="modal-close"
            >
                &times;
            </button>

        </div>


        {{-- =====================================================
             MODO VER
        ====================================================== --}}

        <div
            id="recordViewMode"
            class="modal-body"
        >

            {{-- EMBARQUE --}}

            <div class="detail-section">

                <div class="detail-section-title">
                    {{ __('dashboard.modal.shipment_data') }}
                </div>

                <div class="detail-grid">

                    <div class="detail-item">

                        <span class="detail-label">
                            {{ __('dashboard.modal.date') }}
                        </span>

                        <span
                            id="detailDate"
                            class="detail-value"
                        >
                            —
                        </span>

                    </div>


                    <div class="detail-item">

                        <span class="detail-label">
                            {{ __('dashboard.modal.invoice_number') }}
                        </span>

                        <span
                            id="detailInvoice"
                            class="detail-value"
                        >
                            —
                        </span>

                    </div>


                    <div class="detail-item">

                        <span class="detail-label">
                            {{ __('dashboard.modal.paps') }}
                        </span>

                        <span
                            id="detailPaps"
                            class="detail-value"
                        >
                            —
                        </span>

                    </div>


                    <div class="detail-item">

                        <span class="detail-label">
                            {{ __('dashboard.modal.record_number') }}
                        </span>

                        <span
                            id="detailRecordId"
                            class="detail-value"
                        >
                            —
                        </span>

                    </div>

                </div>

            </div>


            {{-- =================================================
                 IMAGENES EXISTENTES
            ================================================== --}}

            <div
                id="detailImageSection"
                class="detail-section"
                style="display:none;"
            >

                <div class="detail-section-title">
                    {{ __('dashboard.modal.image') }}
                </div>

                <div
                    id="detailImagesGallery"
                    class="record-images-gallery"
                >
                </div>

            </div>


            {{-- TRASLADO --}}

            <div class="detail-section">

                <div class="detail-section-title">
                    {{ __('dashboard.modal.transport_data') }}
                </div>

                <div class="detail-grid">

                    <div class="detail-item">

                        <span class="detail-label">
                            {{ __('dashboard.modal.origin') }}
                        </span>

                        <span
                            id="detailOrigin"
                            class="detail-value"
                        >
                            —
                        </span>

                    </div>


                    <div class="detail-item">

                        <span class="detail-label">
                            {{ __('dashboard.modal.destination') }}
                        </span>

                        <span
                            id="detailDestination"
                            class="detail-value"
                        >
                            —
                        </span>

                    </div>


                    <div class="detail-item">

                        <span class="detail-label">
                            {{ __('dashboard.modal.quantity') }}
                        </span>

                        <span
                            id="detailQuantity"
                            class="detail-value"
                        >
                            —
                        </span>

                    </div>


                    <div class="detail-item">

                        <span class="detail-label">
                            {{ __('dashboard.modal.type') }}
                        </span>

                        <span
                            id="detailQuantityType"
                            class="detail-value"
                        >
                            —
                        </span>

                    </div>

                </div>

            </div>


            {{-- PARTICIPANTES --}}

            <div class="detail-section">

                <div class="detail-section-title">
                    {{ __('dashboard.modal.participants') }}
                </div>

                <div class="detail-grid">

                    <div class="detail-item">

                        <span class="detail-label">
                            {{ __('dashboard.modal.company') }}
                        </span>

                        <span
                            id="detailCompany"
                            class="detail-value"
                        >
                            —
                        </span>

                    </div>


                    <div class="detail-item">

                        <span class="detail-label">
                            {{ __('dashboard.modal.driver') }}
                        </span>

                        <span
                            id="detailDriver"
                            class="detail-value"
                        >
                            —
                        </span>

                    </div>


                    <div class="detail-item">

                        <span class="detail-label">
                            {{ __('dashboard.modal.trailer') }}
                        </span>

                        <span
                            id="detailTrailer"
                            class="detail-value"
                        >
                            —
                        </span>

                    </div>


                    <div class="detail-item">

                        <span class="detail-label">
                            {{ __('dashboard.modal.broker') }}
                        </span>

                        <span
                            id="detailBroker"
                            class="detail-value"
                        >
                            —
                        </span>

                    </div>


                    <div class="detail-item">

                        <span class="detail-label">
                            {{ __('dashboard.modal.shipper') }}
                        </span>

                        <span
                            id="detailShipper"
                            class="detail-value"
                        >
                            —
                        </span>

                    </div>


                    <div class="detail-item">

                        <span class="detail-label">
                            {{ __('dashboard.modal.consignee') }}
                        </span>

                        <span
                            id="detailConsignee"
                            class="detail-value"
                        >
                            —
                        </span>

                    </div>

                </div>

            </div>


            {{-- NOTAS --}}

            <div class="detail-section">

                <div class="detail-section-title">
                    {{ __('dashboard.modal.notes') }}
                </div>

                <div
                    id="detailNotes"
                    class="detail-value"
                >
                    —
                </div>

            </div>

        </div>



        {{-- =====================================================
             FORMULARIO EDITAR
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

                {{-- EMBARQUE --}}

                <div class="detail-section">

                    <div class="detail-section-title">
                        {{ __('dashboard.modal.shipment_data') }}
                    </div>

                    <div class="detail-grid">

                        <div class="detail-item">

                            <label
                                for="editDate"
                                class="detail-label"
                            >
                                {{ __('dashboard.modal.date') }}
                            </label>

                            <input
                                type="date"
                                id="editDate"
                                name="date"
                                class="form-input"
                                required
                            >

                        </div>


                        <div class="detail-item">

                            <label
                                for="editInvoice"
                                class="detail-label"
                            >
                                {{ __('dashboard.modal.invoice_number') }}
                            </label>

                            <input
                                type="text"
                                id="editInvoice"
                                name="invoice_number"
                                class="form-input"
                            >

                        </div>


                        <div class="detail-item">

                            <label
                                for="editPaps"
                                class="detail-label"
                            >
                                {{ __('dashboard.modal.paps') }}
                            </label>

                            <input
                                type="text"
                                id="editPaps"
                                name="paps_number"
                                class="form-input"
                            >

                        </div>


                        <div class="detail-item">

                            <label
                                for="editRecordId"
                                class="detail-label"
                            >
                                {{ __('dashboard.modal.record_number') }}
                            </label>

                            <input
                                type="text"
                                id="editRecordId"
                                class="form-input"
                                readonly
                            >

                        </div>

                    </div>

                </div>


                {{-- =================================================
                     IMAGENES EDITAR
                ================================================== --}}

                <div class="detail-section">

                    <div class="detail-section-title">
                        {{ __('dashboard.modal.image') }}
                    </div>

                    <div
                        id="editImagesContainer"
                        class="record-images-gallery"
                    >
                    </div>

                    <div style="margin-top:15px;">

                        <label
                            for="editImages"
                            class="detail-label"
                        >
                            {{ __('dashboard.modal.change_image') }}
                        </label>

                        <input
                            type="file"
                            name="images[]"
                            id="editImages"
                            class="form-input"
                            accept="image/jpeg,image/png,image/webp"
                            multiple
                            hidden
                        >

                        <label
                            for="editImages"
                            class="image-upload-button"
                            style="display:inline-flex;margin-top:8px;"
                        >
                            📷 {{ __('dashboard.modal.add_image') }}
                        </label>

                    </div>

                </div>


                {{-- TRASLADO --}}

                <div class="detail-section">

                    <div class="detail-section-title">
                        {{ __('dashboard.modal.transport_data') }}
                    </div>

                    <div class="detail-grid">

                        <div class="detail-item">

                            <label
                                for="editOrigin"
                                class="detail-label"
                            >
                                {{ __('dashboard.modal.origin') }}
                            </label>

                            <input
                                type="text"
                                id="editOrigin"
                                name="origin"
                                class="form-input"
                            >

                        </div>


                        <div class="detail-item">

                            <label
                                for="editDestination"
                                class="detail-label"
                            >
                                {{ __('dashboard.modal.destination') }}
                            </label>

                            <input
                                type="text"
                                id="editDestination"
                                name="destination"
                                class="form-input"
                            >

                        </div>


                        <div class="detail-item">

                            <label
                                for="editQuantity"
                                class="detail-label"
                            >
                                {{ __('dashboard.modal.quantity') }}
                            </label>

                            <input
                                type="number"
                                id="editQuantity"
                                name="quantity"
                                class="form-input"
                                min="0"
                                step="1"
                            >

                        </div>


                        <div class="detail-item">

                        <label
                            for="editQuantityType"
                            class="detail-label"
                        >
                            {{ __('dashboard.modal.type') }}
                        </label>

                        <select
                            id="editQuantityType"
                            class="form-input"
                        >
                            <option value="">
                                {{ __('dashboard.modal.select') }}
                            </option>

                            @foreach($quantityTypes as $quantityType)

                                <option value="{{ $quantityType }}">

                                    @if($quantityType === 'palets')

                                        {{ __('dashboard.modal.palets') }}

                                    @elseif($quantityType === 'contenedores')

                                        {{ __('dashboard.modal.containers') }}

                                    @elseif($quantityType === 'piezas')

                                        {{ __('dashboard.modal.pieces') }}

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

                <div class="detail-section">

                    <div class="detail-section-title">
                        {{ __('dashboard.modal.participants') }}
                    </div>

                    <div class="detail-grid">


                        {{-- COMPANY --}}

                        <div class="detail-item">

                            <label class="detail-label">
                                {{ __('dashboard.modal.company') }}
                                <span class="form-required">*</span>
                            </label>

                            <div class="autocomplete">

                                <input
                                    type="text"
                                    id="editCompany"
                                    class="form-input"
                                    autocomplete="off"
                                >

                                <input
                                    type="hidden"
                                    name="company_id"
                                    id="editCompanyId"
                                >

                                <div
                                    id="editCompanyOptions"
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

                        </div>


                        {{-- DRIVER --}}

                        <div class="detail-item">

                            <label
                                for="editDriver"
                                class="detail-label"
                            >
                                {{ __('dashboard.modal.driver') }}
                            </label>

                            <div class="autocomplete">

                                <input
                                    type="text"
                                    id="editDriver"
                                    name="driver_name"
                                    class="form-input"
                                    placeholder="{{ __('dashboard.modal.search_or_write_driver') }}"
                                    autocomplete="off"
                                >

                                <input
                                    type="hidden"
                                    name="driver_id"
                                    id="editDriverId"
                                >

                                <div
                                    id="editDriverOptions"
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

                            <small class="autocomplete-help">
                                {{ __('dashboard.modal.autocomplete_edit_help') }}
                            </small>

                        </div>


                        {{-- TRAILER --}}

                        <div class="detail-item">

                            <label
                                for="editTrailer"
                                class="detail-label"
                            >
                                {{ __('dashboard.modal.trailer') }}
                            </label>

                            <div class="autocomplete">

                                <input
                                    type="text"
                                    id="editTrailer"
                                    name="trailer_number"
                                    class="form-input"
                                    placeholder="{{ __('dashboard.modal.search_or_write_trailer') }}"
                                    autocomplete="off"
                                >

                                <input
                                    type="hidden"
                                    name="trailer_id"
                                    id="editTrailerId"
                                >

                                <div
                                    id="editTrailerOptions"
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

                            <small class="autocomplete-help">
                                {{ __('dashboard.modal.autocomplete_edit_help') }}
                            </small>

                        </div>


                        {{-- BROKER --}}

                        <div class="detail-item">

                            <label class="detail-label">
                                {{ __('dashboard.modal.broker') }}
                            </label>

                            <div class="autocomplete">

                                <input
                                    type="text"
                                    id="editBroker"
                                    class="form-input"
                                    autocomplete="off"
                                >

                                <input
                                    type="hidden"
                                    name="broker_id"
                                    id="editBrokerId"
                                >

                                <div
                                    id="editBrokerOptions"
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

                        </div>


                        {{-- SHIPPER --}}

                        <div class="detail-item">

                            <label class="detail-label">
                                {{ __('dashboard.modal.shipper') }}
                            </label>

                            <div class="autocomplete">

                                <input
                                    type="text"
                                    id="editShipper"
                                    class="form-input"
                                    autocomplete="off"
                                >

                                <input
                                    type="hidden"
                                    name="shipper_id"
                                    id="editShipperId"
                                >

                                <div
                                    id="editShipperOptions"
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

                        </div>


                        {{-- CONSIGNEE --}}

                        <div class="detail-item">

                            <label class="detail-label">
                                {{ __('dashboard.modal.consignee') }}
                            </label>

                            <div class="autocomplete">

                                <input
                                    type="text"
                                    id="editConsignee"
                                    class="form-input"
                                    autocomplete="off"
                                >

                                <input
                                    type="hidden"
                                    name="consignee_id"
                                    id="editConsigneeId"
                                >

                                <div
                                    id="editConsigneeOptions"
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

                        </div>

                    </div>

                </div>


                {{-- NOTAS --}}

                <div class="detail-section">

                    <div class="detail-section-title">
                        {{ __('dashboard.modal.notes') }}
                    </div>

                    <textarea
                        id="editNotes"
                        name="notes"
                        class="form-textarea"
                        rows="4"
                    ></textarea>

                </div>

            </div>


            <div class="modal-footer">

                <button
                    type="button"
                    id="cancelEditRecord"
                    class="btn-cancel"
                >
                    {{ __('dashboard.modal.cancel') }}
                </button>

                <button
                    type="submit"
                    class="btn-save"
                >
                    {{ __('dashboard.modal.save_changes') }}
                </button>

            </div>

        </form>


        {{-- =====================================================
             FOOTER MODO VER
        ====================================================== --}}

        <div
            id="detailModalFooter"
            class="modal-footer"
        >

            <button
                type="button"
                id="closeDetailModalFooter"
                class="btn-cancel"
            >
                {{ __('dashboard.modal.close') }}
            </button>

            <button
                type="button"
                id="editRecordButton"
                class="btn-save"
            >
                {{ __('dashboard.modal.edit_record') }}
            </button>

        </div>

    </div>

</div>



{{-- =============================================================
     MODAL NUEVO REGISTRO
============================================================= --}}

<div
    id="newRecordModal"
    class="record-modal"
>

    <div
        class="record-modal-box"
        role="dialog"
        aria-modal="true"
    >

        <div class="modal-header">

            <div>

                <div class="modal-title">
                    {{ __('dashboard.new_record') }}
                </div>

                <div class="modal-subtitle">
                    {{ __('dashboard.register_new_inspection') }}
                </div>

            </div>

            <button
                type="button"
                id="closeNewRecordModal"
                class="modal-close"
            >
                &times;
            </button>

        </div>


        <form
            id="newRecordForm"
            method="POST"
            action="{{ route('records.store') }}"
            enctype="multipart/form-data"
        >

            @csrf

            <div class="modal-body">

                {{-- EMBARQUE --}}

                <div class="form-section-title">
                    {{ __('dashboard.modal.shipment_data') }}
                </div>

                <div class="form-grid">


                    {{-- IMAGENES --}}

                    <div class="form-group full">

                        <label class="form-label">
                            {{ __('dashboard.modal.image') }}
                        </label>

                        <div class="image-upload-container">

                            <label
                                for="recordImages"
                                class="image-upload-button"
                            >
                                📷 {{ __('dashboard.modal.add_image') }}
                            </label>

                            <input
                                type="file"
                                name="images[]"
                                id="recordImages"
                                accept="image/jpeg,image/png,image/webp"
                                multiple
                                capture="environment"
                                hidden
                            >

                            <div
                                id="imagePreviewContainer"
                                class="record-images-gallery"
                            >
                            </div>

                        </div>

                    </div>


                    {{-- FECHA --}}

                    <div class="form-group">

                        <label class="form-label">
                            {{ __('dashboard.modal.date') }}
                            <span class="form-required">*</span>
                        </label>

                        <input
                            type="date"
                            name="date"
                            class="form-input"
                            value="{{ date('Y-m-d') }}"
                            required
                        >

                    </div>


                    {{-- FACTURA --}}

                    <div class="form-group">

                        <label class="form-label">
                            {{ __('dashboard.modal.invoice_number') }}
                            <span class="form-required">*</span>
                        </label>

                        <input
                            type="text"
                            name="invoice_number"
                            class="form-input"
                            placeholder="{{ __('dashboard.modal.invoice_number') }}"
                        >

                    </div>


                    {{-- PAPS --}}

                    <div class="form-group">

                        <label class="form-label">
                            {{ __('dashboard.modal.paps') }}
                        </label>

                        <input
                            type="text"
                            name="paps_number"
                            class="form-input"
                            placeholder="{{ __('dashboard.modal.paps') }}"
                        >

                    </div>


                    {{-- REGISTRO --}}

                    <div class="form-group">

                        <label class="form-label">
                            {{ __('dashboard.modal.record') }}
                        </label>

                        <input
                            type="text"
                            class="form-input"
                            value="{{ $nextRecordId ?? 1 }}"
                            readonly
                        >

                    </div>

                </div>


                <br>


                {{-- TRASLADO --}}

                <div class="form-section-title">
                    {{ __('dashboard.modal.transport_data') }}
                </div>

                <div class="form-grid">

                    <div class="form-group">

                        <label class="form-label">
                            {{ __('dashboard.modal.origin') }}
                        </label>

                        <input
                            type="text"
                            name="origin"
                            class="form-input"
                            placeholder="{{ __('dashboard.modal.origin') }}"
                        >

                    </div>


                    <div class="form-group">

                        <label class="form-label">
                            {{ __('dashboard.modal.destination') }}
                        </label>

                        <input
                            type="text"
                            name="destination"
                            class="form-input"
                            placeholder="{{ __('dashboard.modal.destination') }}"
                        >

                    </div>


                    <div class="form-group">

                        <label class="form-label">
                            {{ __('dashboard.modal.quantity') }}
                        </label>

                        <input
                            type="number"
                            name="quantity"
                            class="form-input"
                            placeholder="{{ __('dashboard.modal.quantity') }}"
                            min="0"
                            step="1"
                        >

                    </div>


                    <div class="form-group">

                        <label
                            for="newQuantityType"
                            class="form-label"
                        >
                            {{ __('dashboard.modal.type') }}
                        </label>

                        <select
                            id="newQuantityType"
                            class="form-input"
                        >

                            <option value="">
                                {{ __('dashboard.modal.select') }}
                            </option>

                            @foreach($quantityTypes as $quantityType)

                                <option value="{{ $quantityType }}">

                                    @if($quantityType === 'palets')

                                        {{ __('dashboard.modal.palets') }}

                                    @elseif($quantityType === 'contenedores')

                                        {{ __('dashboard.modal.containers') }}

                                    @elseif($quantityType === 'piezas')

                                        {{ __('dashboard.modal.pieces') }}

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
                            id="newQuantityTypeValue"
                            value=""
                        >

                        <input
                            type="text"
                            id="newQuantityTypeInput"
                            class="form-input"
                            placeholder="Escribe el nuevo tipo"
                            maxlength="100"
                            style="display:none; margin-top:8px;"
                        >

                    </div>

                </div>


                <br>


                {{-- PARTICIPANTES --}}

                <div class="form-section-title">
                    {{ __('dashboard.modal.participants') }}
                </div>

                <div class="form-grid">


                    {{-- COMPANY --}}

                    <div class="form-group">

                        <label class="form-label">
                            {{ __('dashboard.modal.company') }}
                            <span class="form-required">*</span>
                        </label>

                        <div class="autocomplete">

                            <input
                                type="text"
                                id="companySearch"
                                class="form-input"
                                placeholder="{{ __('dashboard.modal.search_company') }}"
                                autocomplete="off"
                            >

                            <input
                                type="hidden"
                                name="company_id"
                                id="companyId"
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

                    </div>


                    {{-- DRIVER --}}

                    <div class="form-group">

                        <label
                            for="driverSearch"
                            class="form-label"
                        >
                            {{ __('dashboard.modal.driver') }}
                        </label>

                        <div class="autocomplete">

                            <input
                                type="text"
                                name="driver_name"
                                id="driverSearch"
                                class="form-input"
                                placeholder="{{ __('dashboard.modal.search_or_write_driver') }}"
                                autocomplete="off"
                            >

                            <input
                                type="hidden"
                                name="driver_id"
                                id="driverId"
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

                        <small class="autocomplete-help">
                            {{ __('dashboard.modal.autocomplete_new_help') }}
                        </small>

                    </div>


                    {{-- TRAILER --}}

                    <div class="form-group">

                        <label
                            for="trailerSearch"
                            class="form-label"
                        >
                            {{ __('dashboard.modal.trailer') }}
                        </label>

                        <div class="autocomplete">

                            <input
                                type="text"
                                name="trailer_number"
                                id="trailerSearch"
                                class="form-input"
                                placeholder="{{ __('dashboard.modal.search_or_write_trailer') }}"
                                autocomplete="off"
                            >

                            <input
                                type="hidden"
                                name="trailer_id"
                                id="trailerId"
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

                        <small class="autocomplete-help">
                            {{ __('dashboard.modal.autocomplete_new_help') }}
                        </small>

                    </div>


                    {{-- BROKER --}}

                    <div class="form-group">

                        <label class="form-label">
                            {{ __('dashboard.modal.broker') }}
                        </label>

                        <div class="autocomplete">

                            <input
                                type="text"
                                id="brokerSearch"
                                class="form-input"
                                placeholder="{{ __('dashboard.modal.search_broker') }}"
                                autocomplete="off"
                            >

                            <input
                                type="hidden"
                                name="broker_id"
                                id="brokerId"
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

                    </div>


                    {{-- SHIPPER --}}

                    <div class="form-group">

                        <label class="form-label">
                            {{ __('dashboard.modal.shipper') }}
                        </label>

                        <div class="autocomplete">

                            <input
                                type="text"
                                id="shipperSearch"
                                class="form-input"
                                placeholder="{{ __('dashboard.modal.search_shipper') }}"
                                autocomplete="off"
                            >

                            <input
                                type="hidden"
                                name="shipper_id"
                                id="shipperId"
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

                    </div>


                    {{-- CONSIGNEE --}}

                    <div class="form-group">

                        <label class="form-label">
                            {{ __('dashboard.modal.consignee') }}
                        </label>

                        <div class="autocomplete">

                            <input
                                type="text"
                                id="consigneeSearch"
                                class="form-input"
                                placeholder="{{ __('dashboard.modal.search_consignee') }}"
                                autocomplete="off"
                            >

                            <input
                                type="hidden"
                                name="consignee_id"
                                id="consigneeId"
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

                    </div>


                    {{-- NOTAS --}}

                    <div class="form-group full">

                        <label class="form-label">
                            {{ __('dashboard.modal.notes') }}
                        </label>

                        <textarea
                            name="notes"
                            class="form-textarea"
                            placeholder="{{ __('dashboard.modal.observations') }}"
                            rows="3"
                        ></textarea>

                    </div>

                </div>

            </div>


            <div class="modal-footer">

                <button
                    type="button"
                    id="cancelNewRecordModal"
                    class="btn-cancel"
                >
                    {{ __('dashboard.modal.cancel') }}
                </button>

                <button
                    type="submit"
                    class="btn-save"
                >
                    {{ __('dashboard.modal.save_record') }}
                </button>

            </div>

        </form>

    </div>

</div>



{{-- =============================================================
     JAVASCRIPT
============================================================= --}}

<script>

document.addEventListener('DOMContentLoaded', function () {

    /* =========================================================
       VARIABLES
    ========================================================= */

    let selectedFiles = [];
    let selectedEditFiles = [];
    let currentRecordId = null;


    /* =========================================================
       ELEMENTOS PRINCIPALES
    ========================================================= */

    const detailModal =
        document.getElementById('recordDetailModal');

    const recordViewMode =
        document.getElementById('recordViewMode');

    const editRecordForm =
        document.getElementById('editRecordForm');

    const detailModalFooter =
        document.getElementById('detailModalFooter');

    const editRecordButton =
        document.getElementById('editRecordButton');

    const cancelEditRecord =
        document.getElementById('cancelEditRecord');

    const newModal =
        document.getElementById('newRecordModal');

    const openNew =
        document.getElementById('openNewRecordModal');

    const closeNew =
        document.getElementById('closeNewRecordModal');

    const cancelNew =
        document.getElementById('cancelNewRecordModal');


    /* =========================================================
       ELEMENTOS IMAGENES NUEVO
    ========================================================= */

    const imageInput =
        document.getElementById('recordImages');

    const imagePreviewContainer =
        document.getElementById('imagePreviewContainer');


    /* =========================================================
       ELEMENTOS IMAGENES EDITAR
    ========================================================= */

    const editImagesInput =
        document.getElementById('editImages');

    const editImagesContainer =
        document.getElementById('editImagesContainer');


    /* =========================================================
       MODALES
    ========================================================= */

    function openDetailModal() {

        if (!detailModal) {
            return;
        }

        detailModal.classList.add('active');

        document.body.style.overflow = 'hidden';

    }


    function closeDetailModal() {

        if (!detailModal) {
            return;
        }

        detailModal.classList.remove('active');

        document.body.style.overflow = '';

    }


    function openNewModal() {

        if (!newModal) {
            return;
        }

        newModal.classList.add('active');

        document.body.style.overflow = 'hidden';

    }


    function closeNewModal() {

        if (!newModal) {
            return;
        }

        newModal.classList.remove('active');

        document.body.style.overflow = '';

    }


    document
        .getElementById('closeDetailModal')
        ?.addEventListener(
            'click',
            closeDetailModal
        );


    document
        .getElementById('closeDetailModalFooter')
        ?.addEventListener(
            'click',
            closeDetailModal
        );


    openNew?.addEventListener(
        'click',
        openNewModal
    );


    closeNew?.addEventListener(
        'click',
        closeNewModal
    );


    cancelNew?.addEventListener(
        'click',
        closeNewModal
    );


    detailModal?.addEventListener(
        'click',
        function (event) {

            if (event.target === detailModal) {
                closeDetailModal();
            }

        }
    );


    newModal?.addEventListener(
        'click',
        function (event) {

            if (event.target === newModal) {
                closeNewModal();
            }

        }
    );


    /* =========================================================
       FUNCIONES DE VALORES
    ========================================================= */

    function setValue(id, value) {

        const element =
            document.getElementById(id);

        if (element) {
            element.value = value ?? '';
        }

    }


    function setText(id, value) {

        const element =
            document.getElementById(id);

        if (element) {
            element.textContent =
                value || '—';
        }

    }


    /* =========================================================
       IMAGENES EXISTENTES
    ========================================================= */

    function renderExistingImages(
        images,
        container,
        allowDelete = false
    ) {

        if (!container) {
            return;
        }

        container.innerHTML = '';


        if (!images || images.length === 0) {
            return;
        }


        images.forEach(
            function (imageData) {

                if (
                    !imageData ||
                    !imageData.url
                ) {
                    return;
                }


                const item =
                    document.createElement('div');

                item.className =
                    'record-image-item';


                const image =
                    document.createElement('img');

                image.className =
                    'record-image-preview';

                image.src =
                    imageData.url;

                image.alt =
                    'Imagen del registro';

                image.style.cursor =
                    'pointer';


                image.addEventListener(
                    'click',
                    function () {

                        window.open(
                            imageData.url,
                            '_blank'
                        );

                    }
                );


                item.appendChild(image);


                if (
                    allowDelete &&
                    imageData.id
                ) {

                    const removeButton =
                        document.createElement('button');

                    removeButton.type =
                        'button';

                    removeButton.className =
                        'record-image-remove';

                    removeButton.innerHTML =
                        '&times;';

                    removeButton.title =
                        'Eliminar imagen';


                    removeButton.addEventListener(
                        'click',
                        async function (event) {

                            event.preventDefault();

                            event.stopPropagation();


                            if (
                                !confirm(
                                    '¿Deseas eliminar esta imagen?'
                                )
                            ) {
                                return;
                            }


                            try {

                                const response =
                                    await fetch(
                                        "{{ url('/record-images') }}/" +
                                        imageData.id,
                                        {
                                            method: 'DELETE',

                                            headers: {
                                                'X-CSRF-TOKEN':
                                                    document
                                                        .querySelector(
                                                            'meta[name="csrf-token"]'
                                                        )
                                                        ?.getAttribute(
                                                            'content'
                                                        ),

                                                'Accept':
                                                    'application/json'
                                            }
                                        }
                                    );


                                if (!response.ok) {

                                    throw new Error(
                                        'Error al eliminar la imagen.'
                                    );

                                }


                                imageData.deleted =
                                    true;

                                item.remove();


                            } catch (error) {

                                console.error(
                                    'Error al eliminar imagen:',
                                    error
                                );

                                alert(
                                    'No se pudo eliminar la imagen.'
                                );

                            }

                        }
                    );


                    item.appendChild(
                        removeButton
                    );

                }


                container.appendChild(item);

            }
        );

    }


    /* =========================================================
       IMAGENES NUEVO REGISTRO
    ========================================================= */

    function renderNewImages() {

        if (!imagePreviewContainer) {
            return;
        }

        imagePreviewContainer.innerHTML = '';


        selectedFiles.forEach(
            function (file, index) {

                const item =
                    document.createElement('div');

                item.className =
                    'record-image-item';


                const image =
                    document.createElement('img');

                image.className =
                    'record-image-preview';


                const reader =
                    new FileReader();


                reader.onload =
                    function (event) {

                        image.src =
                            event.target.result;

                    };


                reader.readAsDataURL(file);


                const removeButton =
                    document.createElement('button');

                removeButton.type =
                    'button';

                removeButton.className =
                    'record-image-remove';

                removeButton.innerHTML =
                    '&times;';

                removeButton.title =
                    'Eliminar imagen';


                removeButton.addEventListener(
                    'click',
                    function (event) {

                        event.preventDefault();

                        event.stopPropagation();


                        selectedFiles.splice(
                            index,
                            1
                        );


                        syncNewFiles();

                        renderNewImages();

                    }
                );


                item.appendChild(image);

                item.appendChild(removeButton);

                imagePreviewContainer.appendChild(item);

            }
        );

    }


    function syncNewFiles() {

        if (!imageInput) {
            return;
        }


        const dataTransfer =
            new DataTransfer();


        selectedFiles.forEach(
            function (file) {

                dataTransfer.items.add(file);

            }
        );


        imageInput.files =
            dataTransfer.files;

    }


    imageInput?.addEventListener(
        'change',
        function () {

            const newFiles =
                Array.from(
                    this.files || []
                );


            this.value = '';


            const allowedTypes = [
                'image/jpeg',
                'image/png',
                'image/webp'
            ];


            newFiles.forEach(
                function (file) {

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


                    selectedFiles.push(file);

                }
            );


            syncNewFiles();

            renderNewImages();

        }
    );


    /* =========================================================
       IMAGENES NUEVAS AL EDITAR
    ========================================================= */

    function renderNewEditImages() {

        if (!editImagesContainer) {
            return;
        }


        editImagesContainer
            .querySelectorAll('.new-edit-image')
            .forEach(
                function (element) {

                    element.remove();

                }
            );


        selectedEditFiles.forEach(
            function (file, index) {

                const item =
                    document.createElement('div');

                item.className =
                    'record-image-item new-edit-image';


                const image =
                    document.createElement('img');

                image.className =
                    'record-image-preview';


                const reader =
                    new FileReader();


                reader.onload =
                    function (event) {

                        image.src =
                            event.target.result;

                    };


                reader.readAsDataURL(file);


                const removeButton =
                    document.createElement('button');

                removeButton.type =
                    'button';

                removeButton.className =
                    'record-image-remove';

                removeButton.innerHTML =
                    '&times;';

                removeButton.title =
                    'Eliminar imagen';


                removeButton.addEventListener(
                    'click',
                    function (event) {

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


                item.appendChild(image);

                item.appendChild(removeButton);

                editImagesContainer.appendChild(item);

            }
        );

    }


    function syncEditFiles() {

        if (!editImagesInput) {
            return;
        }


        const dataTransfer =
            new DataTransfer();


        selectedEditFiles.forEach(
            function (file) {

                dataTransfer.items.add(file);

            }
        );


        editImagesInput.files =
            dataTransfer.files;

    }


    editImagesInput?.addEventListener(
        'change',
        function () {

            const newFiles =
                Array.from(
                    this.files || []
                );


            this.value = '';


            const allowedTypes = [
                'image/jpeg',
                'image/png',
                'image/webp'
            ];


            newFiles.forEach(
                function (file) {

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


                    selectedEditFiles.push(file);

                }
            );


            syncEditFiles();

            renderNewEditImages();

        }
    );

    /* =========================================================
       TIPO DE CANTIDAD - NUEVO REGISTRO
    ========================================================= */

    const newQuantityType =
        document.getElementById('newQuantityType');

    const newQuantityTypeValue =
        document.getElementById('newQuantityTypeValue');

    const newQuantityTypeInput =
        document.getElementById('newQuantityTypeInput');


    newQuantityType?.addEventListener(
        'change',
        function () {

            if (
                this.value === '__new__'
            ) {

                if (newQuantityTypeInput) {

                    newQuantityTypeInput.style.display =
                        'block';

                    newQuantityTypeInput.value =
                        '';

                    newQuantityTypeInput.focus();

                }


                if (newQuantityTypeValue) {

                    newQuantityTypeValue.value =
                        '';

                }

                return;

            }


            if (newQuantityTypeInput) {

                newQuantityTypeInput.style.display =
                    'none';

                newQuantityTypeInput.value =
                    '';

            }


            if (newQuantityTypeValue) {

                newQuantityTypeValue.value =
                    this.value || '';

            }

        }
    );


    newQuantityTypeInput?.addEventListener(
        'input',
        function () {

            if (newQuantityTypeValue) {

                newQuantityTypeValue.value =
                    this.value.trim();

            }

        }
    );


    /* =========================================================
       TIPO DE CANTIDAD - EDITAR REGISTRO
    ========================================================= */

    const editQuantityType =
        document.getElementById('editQuantityType');

    const editQuantityTypeValue =
        document.getElementById('editQuantityTypeValue');

    const editQuantityTypeInput =
        document.getElementById('editQuantityTypeInput');


    editQuantityType?.addEventListener(
        'change',
        function () {

            if (
                this.value === '__new__'
            ) {

                if (editQuantityTypeInput) {

                    editQuantityTypeInput.style.display =
                        'block';

                    editQuantityTypeInput.value =
                        '';

                    editQuantityTypeInput.focus();

                }


                if (editQuantityTypeValue) {

                    editQuantityTypeValue.value =
                        '';

                }

                return;

            }


            if (editQuantityTypeInput) {

                editQuantityTypeInput.style.display =
                    'none';

                editQuantityTypeInput.value =
                    '';

            }


            if (editQuantityTypeValue) {

                editQuantityTypeValue.value =
                    this.value || '';

            }

        }
    );


    editQuantityTypeInput?.addEventListener(
        'input',
        function () {

            if (editQuantityTypeValue) {

                editQuantityTypeValue.value =
                    this.value.trim();

            }

        }
    );
    /* =========================================================
       CARGAR REGISTRO
    ========================================================= */

    document
        .querySelectorAll('.record-row')
        .forEach(
            function (row) {

                row.addEventListener(
                    'click',
                    function () {

                        currentRecordId =
                            row.dataset.recordId || null;


                        /* =============================================
                           ID
                        ============================================= */

                        setText(
                            'detailRecordId',
                            currentRecordId
                        );


                        setValue(
                            'editRecordId',
                            currentRecordId
                        );


                        /* =============================================
                           EMBARQUE
                        ============================================= */

                        setText(
                            'detailDate',
                            row.dataset.date
                        );


                        setText(
                            'detailInvoice',
                            row.dataset.invoice
                        );


                        setText(
                            'detailPaps',
                            row.dataset.paps
                        );


                        setText(
                            'detailFact',
                            row.dataset.fact
                        );


                        /* =============================================
                           TRASLADO
                        ============================================= */

                        setText(
                            'detailOrigin',
                            row.dataset.origin
                        );


                        setText(
                            'detailDestination',
                            row.dataset.destination
                        );


                        setText(
                            'detailQuantity',
                            row.dataset.quantity
                        );


                        setText(
                            'detailQuantityType',
                            row.dataset.quantityType
                        );


                        /* =============================================
                           PARTICIPANTES
                        ============================================= */

                        setText(
                            'detailCompany',
                            row.dataset.company
                        );


                        setText(
                            'detailDriver',
                            row.dataset.driver
                        );


                        setText(
                            'detailTrailer',
                            row.dataset.trailer
                        );


                        setText(
                            'detailBroker',
                            row.dataset.broker
                        );


                        setText(
                            'detailShipper',
                            row.dataset.shipper
                        );


                        setText(
                            'detailConsignee',
                            row.dataset.consignee
                        );


                        /* =============================================
                           NOTAS
                        ============================================= */

                        setText(
                            'detailNotes',
                            row.dataset.notes
                        );


                        /* =============================================
                           TITULO
                        ============================================= */

                        setText(
                            'detailModalTitle',
                            row.dataset.invoice
                                ? 'Invoice ' +
                                  row.dataset.invoice
                                : 'Registro'
                        );


                        /* =============================================
                           IMAGENES
                        ============================================= */

                        let recordImages = [];


                        try {

                            recordImages =
                                JSON.parse(
                                    row.dataset.images || '[]'
                                );


                        } catch (error) {

                            console.error(
                                'Error al cargar imágenes:',
                                error
                            );

                            recordImages = [];

                        }


                        const detailImageSection =
                            document.getElementById(
                                'detailImageSection'
                            );


                        const detailImagesGallery =
                            document.getElementById(
                                'detailImagesGallery'
                            );


                        if (
                            detailImagesGallery
                        ) {

                            if (
                                recordImages.length > 0
                            ) {

                                renderExistingImages(
                                    recordImages,
                                    detailImagesGallery,
                                    false
                                );


                                if (
                                    detailImageSection
                                ) {

                                    detailImageSection.style.display =
                                        'block';

                                }

                            } else {

                                detailImagesGallery.innerHTML =
                                    '';


                                if (
                                    detailImageSection
                                ) {

                                    detailImageSection.style.display =
                                        'none';

                                }

                            }

                        }


                        /* =============================================
                           FORM ACTION
                        ============================================= */

                        if (
                            editRecordForm &&
                            currentRecordId
                        ) {

                            editRecordForm.action =
                                "{{ url('/records') }}/" +
                                currentRecordId;

                        }


                        /* =============================================
                           CAMPOS EDICION
                        ============================================= */

                        setValue(
                            'editDate',
                            row.dataset.date
                        );


                        setValue(
                            'editInvoice',
                            row.dataset.invoice
                        );


                        setValue(
                            'editPaps',
                            row.dataset.paps
                        );


                        setValue(
                            'editOrigin',
                            row.dataset.origin
                        );


                        setValue(
                            'editDestination',
                            row.dataset.destination
                        );


                        setValue(
                            'editQuantity',
                            row.dataset.quantity
                        );


                        const currentQuantityType =
                        row.dataset.quantityType || '';

                    const editQuantityTypeElement =
                        document.getElementById('editQuantityType');

                    const editQuantityTypeValueElement =
                        document.getElementById('editQuantityTypeValue');

                    const editQuantityTypeInputElement =
                        document.getElementById('editQuantityTypeInput');


                    if (editQuantityTypeElement) {

                        const optionExists =
                            Array.from(
                                editQuantityTypeElement.options
                            ).some(
                                function (option) {
                                    return option.value === currentQuantityType;
                                }
                            );


                        if (
                            currentQuantityType &&
                            optionExists
                        ) {

                            editQuantityTypeElement.value =
                                currentQuantityType;

                            if (editQuantityTypeValueElement) {

                                editQuantityTypeValueElement.value =
                                    currentQuantityType;

                            }

                            if (editQuantityTypeInputElement) {

                                editQuantityTypeInputElement.style.display =
                                    'none';

                                editQuantityTypeInputElement.value =
                                    '';

                            }

                        } else if (currentQuantityType) {

                            editQuantityTypeElement.value =
                                '__new__';

                            if (editQuantityTypeValueElement) {

                                editQuantityTypeValueElement.value =
                                    currentQuantityType;

                            }

                            if (editQuantityTypeInputElement) {

                                editQuantityTypeInputElement.style.display =
                                    'block';

                                editQuantityTypeInputElement.value =
                                    currentQuantityType;

                            }

                        } else {

                            editQuantityTypeElement.value =
                                '';

                            if (editQuantityTypeValueElement) {

                                editQuantityTypeValueElement.value =
                                    '';

                            }

                            if (editQuantityTypeInputElement) {

                                editQuantityTypeInputElement.style.display =
                                    'none';

                                editQuantityTypeInputElement.value =
                                    '';

                            }

                        }

                    }


                        setValue(
                            'editNotes',
                            row.dataset.notes
                        );


                        /* =============================================
                           AUTOCOMPLETE EDITAR
                        ============================================= */

                        setAutocompleteValue(
                            'editCompany',
                            'editCompanyId',
                            'editCompanyOptions',
                            row.dataset.companyId,
                            row.dataset.company
                        );


                        setAutocompleteValue(
                            'editDriver',
                            'editDriverId',
                            'editDriverOptions',
                            row.dataset.driverId,
                            row.dataset.driver
                        );


                        setAutocompleteValue(
                            'editTrailer',
                            'editTrailerId',
                            'editTrailerOptions',
                            row.dataset.trailerId,
                            row.dataset.trailer
                        );


                        setAutocompleteValue(
                            'editBroker',
                            'editBrokerId',
                            'editBrokerOptions',
                            row.dataset.brokerId,
                            row.dataset.broker
                        );


                        setAutocompleteValue(
                            'editShipper',
                            'editShipperId',
                            'editShipperOptions',
                            row.dataset.shipperId,
                            row.dataset.shipper
                        );


                        setAutocompleteValue(
                            'editConsignee',
                            'editConsigneeId',
                            'editConsigneeOptions',
                            row.dataset.consigneeId,
                            row.dataset.consignee
                        );


                        /* =============================================
                           IMAGENES EDITAR
                        ============================================= */

                        selectedEditFiles = [];


                        if (editImagesInput) {

                            editImagesInput.value = '';

                        }


                        if (editImagesContainer) {

                            renderExistingImages(
                                recordImages,
                                editImagesContainer,
                                true
                            );


                            renderNewEditImages();

                        }


                        /* =============================================
                           MODO VER
                        ============================================= */

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


                        const subtitle =
                            document.getElementById(
                                'detailModalSubtitle'
                            );


                        if (subtitle) {

                            subtitle.textContent =
                                '{{ __('dashboard.modal.information') }}';

                        }


                        openDetailModal();

                    }
                );

            }
        );


    /* =========================================================
       EDITAR REGISTRO
    ========================================================= */

    editRecordButton?.addEventListener(
        'click',
        function () {

            if (recordViewMode) {

                recordViewMode.style.display =
                    'none';

            }


            if (detailModalFooter) {

                detailModalFooter.style.display =
                    'none';

            }


            if (editRecordForm) {

                editRecordForm.style.display =
                    'block';

            }


            const subtitle =
                document.getElementById(
                    'detailModalSubtitle'
                );


            if (subtitle) {

                subtitle.textContent =
                    '{{ __('dashboard.modal.modify_information') }}';

            }

        }
    );


    /* =========================================================
       CANCELAR EDICION
    ========================================================= */

    cancelEditRecord?.addEventListener(
        'click',
        function () {

            if (editRecordForm) {

                editRecordForm.style.display =
                    'none';

            }


            if (recordViewMode) {

                recordViewMode.style.display =
                    'block';

            }


            if (detailModalFooter) {

                detailModalFooter.style.display =
                    'flex';

            }


            const subtitle =
                document.getElementById(
                    'detailModalSubtitle'
                );


            if (subtitle) {

                subtitle.textContent =
                    '{{ __('dashboard.modal.information') }}';

            }

        }
    );


    /* =========================================================
       AUTOCOMPLETE
    ========================================================= */

    function setupAutocomplete(
        inputId,
        hiddenId,
        optionsId
    ) {

        const input =
            document.getElementById(inputId);


        const hidden =
            document.getElementById(hiddenId);


        const options =
            document.getElementById(optionsId);


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
                                option.dataset.name ||
                                ''
                            )
                            .toLowerCase();


                        if (
                            search === '' ||
                            name.includes(search)
                        ) {

                            option.classList.remove(
                                'hidden'
                            );

                            hasResults = true;

                        } else {

                            option.classList.add(
                                'hidden'
                            );

                        }

                    }
                );


            return hasResults;

        }


        input.addEventListener(
            'focus',
            function () {

                const hasResults =
                    filterOptions();


                options.style.display =
                    hasResults
                        ? 'block'
                        : 'none';

            }
        );


        input.addEventListener(
            'input',
            function () {

                hidden.value = '';


                const hasResults =
                    filterOptions();


                options.style.display =
                    hasResults
                        ? 'block'
                        : 'none';

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
                    option.dataset.name || '';


                hidden.value =
                    option.dataset.id || '';


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


    /* =========================================================
       ESTABLECER AUTOCOMPLETE AL EDITAR
    ========================================================= */

    function setAutocompleteValue(
        inputId,
        hiddenId,
        optionsId,
        id,
        name
    ) {

        const input =
            document.getElementById(inputId);


        const hidden =
            document.getElementById(hiddenId);


        const options =
            document.getElementById(optionsId);


        if (input) {

            input.value =
                name || '';

        }


        if (hidden) {

            hidden.value =
                id || '';

        }


        if (options) {

            options
                .querySelectorAll(
                    '.autocomplete-option'
                )
                .forEach(
                    function (option) {

                        option.classList.remove(
                            'hidden'
                        );

                    }
                );


            options.style.display =
                'none';

        }

    }


    /* =========================================================
       AUTOCOMPLETE NUEVO
    ========================================================= */

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


    /* =========================================================
       AUTOCOMPLETE EDITAR
    ========================================================= */

    setupAutocomplete(
        'editCompany',
        'editCompanyId',
        'editCompanyOptions'
    );


    setupAutocomplete(
        'editDriver',
        'editDriverId',
        'editDriverOptions'
    );


    setupAutocomplete(
        'editTrailer',
        'editTrailerId',
        'editTrailerOptions'
    );


    setupAutocomplete(
        'editBroker',
        'editBrokerId',
        'editBrokerOptions'
    );


    setupAutocomplete(
        'editShipper',
        'editShipperId',
        'editShipperOptions'
    );


    setupAutocomplete(
        'editConsignee',
        'editConsigneeId',
        'editConsigneeOptions'
    );


    /* =========================================================
       ESC
    ========================================================= */

    document.addEventListener(
        'keydown',
        function (event) {

            if (event.key !== 'Escape') {
                return;
            }


            if (
                detailModal &&
                detailModal.classList.contains('active')
            ) {

                closeDetailModal();

            }


            if (
                newModal &&
                newModal.classList.contains('active')
            ) {

                closeNewModal();

            }

        }
    );

});

</script>


</x-app-layout>
