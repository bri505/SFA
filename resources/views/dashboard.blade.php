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

</style>

<div class="sfa-dashboard">

    <div class="sfa-container">

        {{-- =====================================================
             HEADER
        ====================================================== --}}

        <div class="dashboard-header">

            <div>
                <h1 class="dashboard-title">
                    {{__('dashboard.title')}}
                </h1>

                <p class="dashboard-subtitle">
                    {{__('dashboard.subtitle')}}
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
                    {{__('dashboard.new_record')}}
                </span>
            </button>

        </div>


        {{-- =====================================================
             ESTADISTICAS
        ====================================================== --}}

        <div class="stats-row">

            <div class="stat-item">

                <div class="stat-label">
                {{__('dashboard.stats.today_records')}}
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
                {{__('dashboard.recent_records')}}
                </div>

                <a
                    href="{{ route('records.index') }}"
                    class="records-link"
                >
                {{__('dashboard.view_all')}}
                </a>

            </div>


            <div class="records-table-wrapper">

                <table class="records-table">

                    <thead>

                        <tr>
                            <th>{{__('dashboard.table.date')}}</th>
                            <th>{{__('dashboard.table.company')}}</th>
                            <th>{{__('dashboard.table.driver')}}</th>
                            <th>{{__('dashboard.table.trailer')}}</th>
                            <th>{{__('dashboard.table.invoice_number')}}</th>
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

                                data-image="{{ $record->image
                                    ? asset('storage/' . $record->image)
                                    : ''
                                }}"
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
                                    {{ __('dashboard.no_recent_records') }}                                    </div>

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
                {{ __('dashboard.modal.record') }}                </div>

                <div
                    id="detailModalSubtitle"
                    class="modal-subtitle"
                >
                {{ __('dashboard.modal.information') }}                </div>

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
                {{ __('dashboard.modal.shipment_data') }}                </div>

                <div class="detail-grid">

                    <div class="detail-item">

                        <span class="detail-label">
                        {{ __('dashboard.modal.date') }}                        </span>

                        <span
                            id="detailDate"
                            class="detail-value"
                        >
                            —
                        </span>

                    </div>


                    <div class="detail-item">

                        <span class="detail-label">
                        {{ __('dashboard.modal.invoice_number') }}                        </span>

                        <span
                            id="detailInvoice"
                            class="detail-value"
                        >
                            —
                        </span>

                    </div>


                    <div class="detail-item">

                        <span class="detail-label">
                        {{ __('dashboard.modal.paps') }}                        </span>

                        <span
                            id="detailPaps"
                            class="detail-value"
                        >
                            —
                        </span>

                    </div>


                    <div class="detail-item">

                        <span class="detail-label">
                        {{ __('dashboard.modal.record_number') }}                        </span>

                        <span
                            id="detailRecordId"
                            class="detail-value"
                        >
                            —
                        </span>

                    </div>

                </div>

            </div>


            {{-- IMAGEN --}}

            <div
                id="detailImageSection"
                class="detail-section"
                style="display:none;"
            >

                <div class="detail-section-title">
                {{ __('dashboard.modal.image') }}                </div>

                <div
                    style="
                        display:flex;
                        justify-content:center;
                        align-items:center;
                        padding:10px;
                    "
                >

                    <img
                        id="detailImage"
                        src=""
                        alt="Imagen del registro"
                        style="
                            max-width:100%;
                            max-height:300px;
                            border-radius:10px;
                            object-fit:contain;
                            cursor:pointer;
                        "
                    >

                </div>

            </div>


            {{-- TRASLADO --}}

            <div class="detail-section">

                <div class="detail-section-title">
                {{ __('dashboard.modal.transport_data') }}                </div>

                <div class="detail-grid">

                    <div class="detail-item">

                        <span class="detail-label">
                        {{ __('dashboard.modal.origin') }}                        </span>

                        <span
                            id="detailOrigin"
                            class="detail-value"
                        >
                            —
                        </span>

                    </div>


                    <div class="detail-item">

                        <span class="detail-label">
                        {{ __('dashboard.modal.destination') }}                        </span>

                        <span
                            id="detailDestination"
                            class="detail-value"
                        >
                            —
                        </span>

                    </div>


                    <div class="detail-item">

                        <span class="detail-label">
                        {{ __('dashboard.modal.quantity') }}                        </span>

                        <span
                            id="detailQuantity"
                            class="detail-value"
                        >
                            —
                        </span>

                    </div>


                    <div class="detail-item">

                        <span class="detail-label">
                        {{ __('dashboard.modal.type') }}                        </span>

                        <span
                            id="detailQuantityType"
                            class="detail-value"
                        >
                            —
                        </span>

                    </div>

                </div>

            </div>


            {{-- TRANSPORTE --}}

            <div class="detail-section">

                <div class="detail-section-title">
                {{ __('dashboard.modal.participants') }}                </div>

                <div class="detail-grid">

                    <div class="detail-item">

                        <span class="detail-label">
                        {{ __('dashboard.modal.company') }}                        </span>

                        <span
                            id="detailCompany"
                            class="detail-value"
                        >
                            —
                        </span>

                    </div>


                    <div class="detail-item">

                        <span class="detail-label">
                        {{ __('dashboard.modal.driver') }}                        </span>

                        <span
                            id="detailDriver"
                            class="detail-value"
                        >
                            —
                        </span>

                    </div>


                    <div class="detail-item">

                        <span class="detail-label">
                        {{ __('dashboard.modal.trailer') }}                        </span>

                        <span
                            id="detailTrailer"
                            class="detail-value"
                        >
                            —
                        </span>

                    </div>


                    <div class="detail-item">

                        <span class="detail-label">
                        {{ __('dashboard.modal.broker') }}                        </span>

                        <span
                            id="detailBroker"
                            class="detail-value"
                        >
                            —
                        </span>

                    </div>


                    <div class="detail-item">

                        <span class="detail-label">
                        {{ __('dashboard.modal.shipper') }}                        </span>

                        <span
                            id="detailShipper"
                            class="detail-value"
                        >
                            —
                        </span>

                    </div>


                    <div class="detail-item">

                        <span class="detail-label">
                        {{ __('dashboard.modal.consignee') }}                        </span>

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
                {{ __('dashboard.modal.notes') }}                </div>

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
                    {{ __('dashboard.modal.shipment_data') }}                    </div>

                    <div class="detail-grid">

                        <div class="detail-item">

                            <label
                                for="editDate"
                                class="detail-label"
                            >
                            {{ __('dashboard.modal.date') }}                            </label>

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
                            {{ __('dashboard.modal.invoice_number') }}                            </label>

                            <input
                                type="text"
                                id="editInvoice"
                                name="invoice_number"
                                class="form-input"
                                required
                            >

                        </div>


                        <div class="detail-item">

                            <label
                                for="editPaps"
                                class="detail-label"
                            >
                            {{ __('dashboard.modal.paps') }}                            </label>

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
                            {{ __('dashboard.modal.record_number') }}                            </label>

                            <input
                                type="text"
                                id="editRecordId"
                                class="form-input"
                                readonly
                            >

                        </div>

                    </div>

                </div>


                {{-- IMAGEN --}}

                <div class="detail-section">

                    <div class="detail-section-title">
                    {{ __('dashboard.modal.image') }}                    </div>

                    <div
                        id="editCurrentImageSection"
                        style="display:none;padding:10px;"
                    >

                        <div
                            style="
                                text-align:center;
                                margin-bottom:12px;
                            "
                        >
                            <span class="detail-label">
                            {{ __('dashboard.modal.current_image') }}                            </span>
                        </div>

                        <div
                            style="
                                display:flex;
                                justify-content:center;
                                align-items:center;
                            "
                        >

                            <img
                                id="editCurrentImage"
                                src=""
                                alt="Imagen actual"
                                style="
                                    max-width:100%;
                                    max-height:280px;
                                    border-radius:10px;
                                    object-fit:contain;
                                    cursor:pointer;
                                "
                            >

                        </div>

                    </div>


                    <div style="margin-top:15px;">

                        <label
                            for="editImage"
                            class="detail-label"
                        >
                        {{ __('dashboard.modal.change_image') }}                        </label>

                        <input
                            type="file"
                            name="image"
                            id="editImage"
                            class="form-input"
                            accept="image/jpeg,image/png,image/webp"
                            capture="environment"
                        >

                    </div>


                    <div
                        id="editImagePreviewSection"
                        style="
                            display:none;
                            margin-top:15px;
                            text-align:center;
                        "
                    >

                        <div class="detail-label">
                        {{ __('dashboard.modal.new_image') }}                        </div>

                        <img
                            id="editImagePreview"
                            src=""
                            alt="Vista previa"
                            style="
                                max-width:100%;
                                max-height:280px;
                                margin-top:10px;
                                border-radius:10px;
                                object-fit:contain;
                            "
                        >

                    </div>

                </div>


                {{-- TRASLADO --}}

                <div class="detail-section">

                    <div class="detail-section-title">
                    {{ __('dashboard.modal.transport_data') }}                    </div>

                    <div class="detail-grid">

                        <div class="detail-item">

                            <label
                                for="editOrigin"
                                class="detail-label"
                            >
                            {{ __('dashboard.modal.origin') }}                            </label>

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
                            {{ __('dashboard.modal.destination') }}                            </label>

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
                            {{ __('dashboard.modal.quantity') }}                            </label>

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
                            {{ __('dashboard.modal.type') }}                            </label>

                            <select
                                id="editQuantityType"
                                name="quantity_type"
                                class="form-input"
                            >

                                <option value="">
                                {{ __('dashboard.modal.select') }}
                                </option>

                                <option value="palets">
                                {{ __('dashboard.modal.palets') }}
                                </option>

                                <option value="contenedores">
                                {{ __('dashboard.modal.containers') }}
                                </option>

                                <option value="piezas">
                                {{ __('dashboard.modal.pieces') }}
                                </option>

                            </select>

                        </div>

                    </div>

                </div>


                {{-- TRANSPORTE Y PARTICIPANTES --}}

                <div class="detail-section">

                    <div class="detail-section-title">
                    {{ __('dashboard.modal.participants') }}                    </div>

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
                                    required
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
                            {{ __('dashboard.modal.driver') }}                            </label>

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
                            {{ __('dashboard.modal.autocomplete_edit_help') }}                            </small>

                        </div>


                        {{-- BROKER --}}

                        <div class="detail-item">

                            <label class="detail-label">
                            {{ __('dashboard.modal.broker') }}                            </label>

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
                            {{ __('dashboard.modal.shipper') }}                            </label>

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
                            {{ __('dashboard.modal.consignee') }}                            </label>

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
                    {{ __('dashboard.modal.notes') }}                    </div>

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
                {{ __('dashboard.modal.cancel') }}                </button>

                <button
                    type="submit"
                    class="btn-save"
                >
                {{ __('dashboard.modal.save_changes') }}                </button>

            </div>

        </form>


        {{-- FOOTER MODO VER --}}

        <div
            id="detailModalFooter"
            class="modal-footer"
        >

            <button
                type="button"
                id="closeDetailModalFooter"
                class="btn-cancel"
            >
            {{ __('dashboard.modal.close') }}            </button>

            <button
                type="button"
                id="editRecordButton"
                class="btn-save"
            >
            {{ __('dashboard.modal.edit_record') }}            </button>

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
                {{ __('dashboard.new_record') }}                </div>

                <div class="modal-subtitle">
                {{ __('dashboard.register_new_inspection') }}                </div>

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
                {{ __('dashboard.modal.shipment_data') }}                </div>

                <div class="form-grid">


                    {{-- IMAGEN --}}

                    <div class="form-group full">

                        <label class="form-label">
                        {{ __('dashboard.modal.image') }}
                        </label>

                        <div class="image-upload-container">

                            <label
                                for="recordImage"
                                class="image-upload-button"
                            >
                                📷 {{ __('dashboard.modal.add_image') }}
                            </label>

                            <input
                                type="file"
                                name="image"
                                id="recordImage"
                                accept="image/jpeg,image/png,image/webp"
                                capture="environment"
                                hidden
                            >

                            <div
                                id="imagePreviewContainer"
                                class="image-preview-container"
                                style="display:none;"
                            >

                                <img
                                    id="imagePreview"
                                    class="image-preview"
                                    src=""
                                    alt="Vista previa"
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
                                    {{ __('dashboard.modal.remove_image') }}
                                    </button>

                                </div>

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
                            required
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
    value="{{ ($nextRecordId ?? 1) }}"
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

                        <label class="form-label">
                        {{ __('dashboard.modal.type') }}
                        </label>

                        <select
                            name="quantity_type"
                            class="form-input"
                        >

                            <option value="">
                            {{ __('dashboard.modal.select') }}
                            </option>

                            <option value="palets">
                            {{ __('dashboard.modal.palets') }}
                            </option>

                            <option value="contenedores">
                            {{ __('dashboard.modal.containers') }}
                            </option>

                            <option value="piezas">
                            {{ __('dashboard.modal.pieces') }}
                            </option>

                        </select>

                    </div>

                </div>


                <br>


                {{-- TRANSPORTE --}}

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
                                required
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
    required
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
                        {{ __('dashboard.modal.autocomplete_new_help') }}                        </small>

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
    required
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
                        {{ __('dashboard.modal.autocomplete_new_help') }}                        </small>

                    </div>


                    {{-- BROKER --}}

                    <div class="form-group">

                        <label class="form-label">
                        {{ __('dashboard.modal.broker') }}                        </label>

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

    let currentRecordId = null;


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
       CARGAR REGISTRO
    ========================================================= */

    document
        .querySelectorAll('.record-row')
        .forEach(function (row) {

            row.addEventListener(
                'click',
                function () {

                    currentRecordId =
                        row.dataset.recordId || null;

                    setText(
                        'detailRecordId',
                        currentRecordId
                    );
                    /* =============================================
                       EMBARQUE
                    ============================================= */
                    setValue(
                        'editRecordId',
                        row.dataset.recordId
                    );
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
                            ? 'Invoice ' + row.dataset.invoice
                            : 'Registro'
                    );


                    /* =============================================
                       IMAGEN
                    ============================================= */

                    const imageUrl =
                        row.dataset.image || '';

                    const detailImage =
                        document.getElementById(
                            'detailImage'
                        );

                    const detailImageSection =
                        document.getElementById(
                            'detailImageSection'
                        );


                    if (
                        imageUrl &&
                        detailImage &&
                        detailImageSection
                    ) {

                        detailImage.src =
                            imageUrl;

                        detailImageSection.style.display =
                            'block';

                    } else {

                        if (detailImage) {
                            detailImage.src = '';
                        }

                        if (detailImageSection) {
                            detailImageSection.style.display =
                                'none';
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
                       CARGAR CAMPOS DE EDICIÓN
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

                    setValue(
                        'editQuantityType',
                        row.dataset.quantityType
                    );

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
                       IMAGEN EDITAR
                    ============================================= */

                    const currentImage =
                        document.getElementById(
                            'editCurrentImage'
                        );

                    const currentImageSection =
                        document.getElementById(
                            'editCurrentImageSection'
                        );

                    const editImage =
                        document.getElementById(
                            'editImage'
                        );

                    const preview =
                        document.getElementById(
                            'editImagePreview'
                        );

                    const previewSection =
                        document.getElementById(
                            'editImagePreviewSection'
                        );


                    if (
                        imageUrl &&
                        currentImage &&
                        currentImageSection
                    ) {

                        currentImage.src =
                            imageUrl;

                        currentImageSection.style.display =
                            'block';

                    } else {

                        if (currentImage) {
                            currentImage.src = '';
                        }

                        if (currentImageSection) {
                            currentImageSection.style.display =
                                'none';
                        }

                    }


                    if (editImage) {
                        editImage.value = '';
                    }

                    if (preview) {
                        preview.src = '';
                    }

                    if (previewSection) {
                        previewSection.style.display =
                            'none';
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

        });


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
       CANCELAR EDICIÓN
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
                .forEach(function (option) {

                    const name =
                        (
                            option.dataset.name || ''
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

                });


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

                /*
                 * Si el usuario modifica el texto,
                 * dejamos de utilizar el ID anterior.
                 *
                 * El backend recibirá el nombre escrito
                 * y podrá crear el registro si no existe.
                 */

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
            input.value = name || '';
        }


        if (hidden) {
            hidden.value = id || '';
        }


        if (options) {

            options
                .querySelectorAll(
                    '.autocomplete-option'
                )
                .forEach(function (option) {

                    option.classList.remove(
                        'hidden'
                    );

                });


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
       IMAGEN NUEVO
    ========================================================= */

    const imageInput =
        document.getElementById(
            'recordImage'
        );

    const imagePreviewContainer =
        document.getElementById(
            'imagePreviewContainer'
        );

    const imagePreview =
        document.getElementById(
            'imagePreview'
        );

    const imageName =
        document.getElementById(
            'imageName'
        );

    const removeImage =
        document.getElementById(
            'removeImage'
        );


    function clearImage() {

        if (imageInput) {
            imageInput.value = '';
        }

        if (imagePreview) {
            imagePreview.src = '';
        }

        if (imageName) {
            imageName.textContent = '';
        }

        if (imagePreviewContainer) {
            imagePreviewContainer.style.display =
                'none';
        }

    }


    imageInput?.addEventListener(
        'change',
        function () {

            const file =
                this.files[0];


            if (!file) {
                return;
            }


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
                    'Solo se permiten imágenes JPG, PNG o WEBP.'
                );

                clearImage();

                return;
            }


            const maxSize =
                10 * 1024 * 1024;


            if (file.size > maxSize) {

                alert(
                    'La imagen no puede superar los 10 MB.'
                );

                clearImage();

                return;
            }


            const reader =
                new FileReader();


            reader.onload =
                function (event) {

                    if (imagePreview) {

                        imagePreview.src =
                            event.target.result;

                    }

                    if (imageName) {

                        imageName.textContent =
                            file.name;

                    }

                    if (imagePreviewContainer) {

                        imagePreviewContainer.style.display =
                            'block';

                    }

                };


            reader.readAsDataURL(file);

        }
    );


    removeImage?.addEventListener(
        'click',
        clearImage
    );


    /* =========================================================
       IMAGEN EDICIÓN
    ========================================================= */

    const editImage =
        document.getElementById(
            'editImage'
        );

    const editImagePreview =
        document.getElementById(
            'editImagePreview'
        );

    const editImagePreviewSection =
        document.getElementById(
            'editImagePreviewSection'
        );


    editImage?.addEventListener(
        'change',
        function () {

            const file =
                this.files[0];


            if (!file) {

                if (editImagePreviewSection) {

                    editImagePreviewSection.style.display =
                        'none';

                }

                return;
            }


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
                    'Solo se permiten imágenes JPG, PNG o WEBP.'
                );

                this.value = '';


                if (editImagePreviewSection) {

                    editImagePreviewSection.style.display =
                        'none';

                }

                return;
            }


            const maxSize =
                10 * 1024 * 1024;


            if (file.size > maxSize) {

                alert(
                    'La imagen no puede superar los 10 MB.'
                );

                this.value = '';


                if (editImagePreviewSection) {

                    editImagePreviewSection.style.display =
                        'none';

                }

                return;
            }


            const reader =
                new FileReader();


            reader.onload =
                function (event) {

                    if (editImagePreview) {

                        editImagePreview.src =
                            event.target.result;

                    }

                    if (editImagePreviewSection) {

                        editImagePreviewSection.style.display =
                            'block';

                    }

                };


            reader.readAsDataURL(file);

        }
    );


    /* =========================================================
       ABRIR IMAGEN EN GRANDE
    ========================================================= */

    document
        .getElementById('detailImage')
        ?.addEventListener(
            'click',
            function () {

                if (this.src) {

                    window.open(
                        this.src,
                        '_blank'
                    );

                }

            }
        );


    document
        .getElementById('editCurrentImage')
        ?.addEventListener(
            'click',
            function () {

                if (this.src) {

                    window.open(
                        this.src,
                        '_blank'
                    );

                }

            }
        );


    /* =========================================================
       VALIDAR EDICIÓN
    ========================================================= */

    if (editRecordForm) {

        editRecordForm.addEventListener(
            'submit',
            function (event) {

                const companyId =
                    document.getElementById(
                        'editCompanyId'
                    )?.value;


                if (!companyId) {

                    event.preventDefault();

                    alert(
                        'Selecciona un cliente de la lista.'
                    );

                    return;
                }


                /*
                 * DRIVER Y TRAILER NO SE VALIDAN
                 * CONTRA LA BASE DE DATOS.
                 *
                 * Pueden ser nuevos.
                 */

            }
        );

    }


    /* =========================================================
       VALIDAR NUEVO REGISTRO
    ========================================================= */

    const newRecordForm =
        document.getElementById(
            'newRecordForm'
        );


    if (newRecordForm) {

        newRecordForm.addEventListener(
            'submit',
            function (event) {

                const companyId =
                    document.getElementById(
                        'companyId'
                    )?.value;


                if (!companyId) {

                    event.preventDefault();

                    alert(
                        'Selecciona un cliente de la lista.'
                    );

                    return;
                }


                /*
                 * DRIVER Y TRAILER PUEDEN SER NUEVOS.
                 *
                 * No exigimos que tengan driver_id
                 * o trailer_id.
                 */

            }
        );

    }


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
