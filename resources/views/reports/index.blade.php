<x-app-layout>

<style>

.report-page {
    min-height: calc(100vh - 64px);
    background: #f8fafc;
    padding: 28px 20px;
}

.report-container {
    max-width: 1500px;
    margin: auto;
}

.report-header {
    margin-bottom: 22px;
}

.report-title {
    font-size: 24px;
    font-weight: 700;
    color: #111827;
}

.report-subtitle {
    margin-top: 4px;
    font-size: 13px;
    color: #6b7280;
}


/* =========================
   FILTROS
========================= */

.filters-panel {
    background: white;
    border: 1px solid #e5e7eb;
    border-radius: 10px;
    padding: 18px;
    margin-bottom: 18px;
}

.filters-grid {
    display: grid;
    grid-template-columns:
        2fr
        1fr
        1fr
        1fr
        1fr
        auto;
    gap: 10px;
    align-items: end;
}

.filter-group {
    display: flex;
    flex-direction: column;
}

.filter-label {
    font-size: 10px;
    font-weight: 700;
    color: #6b7280;
    text-transform: uppercase;
    margin-bottom: 5px;
}

.filter-input,
.filter-select {
    width: 100%;
    height: 38px;
    border: 1px solid #d1d5db;
    border-radius: 7px;
    padding: 0 10px;
    font-size: 12px;
    color: #374151;
    background: white;
    outline: none;
}

.filter-input:focus,
.filter-select:focus {
    border-color: #6b7280;
}

.filter-button {
    height: 38px;
    padding: 0 18px;
    border: none;
    border-radius: 7px;
    background: #111827;
    color: white;
    font-size: 12px;
    font-weight: 600;
    cursor: pointer;
}

.filter-button:hover {
    background: #1f2937;
}

.clear-button {
    height: 38px;
    padding: 0 14px;
    border: 1px solid #d1d5db;
    border-radius: 7px;
    background: white;
    color: #4b5563;
    font-size: 12px;
    font-weight: 600;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
}

.clear-button:hover {
    background: #f9fafb;
}


/* =========================
   EXPORTACIONES
========================= */

.export-buttons {
    display: flex;
    align-items: center;
    gap: 8px;
}

.export-button {
    height: 36px;
    padding: 0 13px;
    border-radius: 7px;
    font-size: 11px;
    font-weight: 600;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: .12s;
}

.export-pdf {
    background: #111827;
    color: white;
    border: 1px solid #111827;
}

.export-pdf:hover {
    background: #1f2937;
}

.export-excel {
    background: white;
    color: #374151;
    border: 1px solid #d1d5db;
}

.export-excel:hover {
    background: #f9fafb;
}


/* =========================
   RESUMEN
========================= */

.summary-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 12px;
    margin-bottom: 18px;
}

.summary-card {
    background: white;
    border: 1px solid #e5e7eb;
    border-radius: 10px;
    padding: 15px 18px;
}

.summary-label {
    font-size: 11px;
    color: #6b7280;
}

.summary-value {
    margin-top: 5px;
    font-size: 23px;
    font-weight: 700;
    color: #111827;
}


/* =========================
   RESULTADOS
========================= */

.results-panel {
    background: white;
    border: 1px solid #e5e7eb;
    border-radius: 10px;
    overflow: hidden;
}

.results-header {
    padding: 15px 18px;
    border-bottom: 1px solid #e5e7eb;
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 15px;
}

.results-header-left {
    display: flex;
    align-items: center;
    gap: 10px;
}

.results-title {
    font-size: 14px;
    font-weight: 700;
    color: #111827;
}

.results-count {
    font-size: 12px;
    color: #6b7280;
}

.table-wrapper {
    width: 100%;
    overflow-x: auto;
}

.results-table {
    width: 100%;
    min-width: 1150px;
    border-collapse: collapse;
}

.results-table th {
    padding: 10px 12px;
    background: #f9fafb;
    border-bottom: 1px solid #e5e7eb;
    color: #6b7280;
    font-size: 10px;
    font-weight: 700;
    text-align: left;
    text-transform: uppercase;
    white-space: nowrap;
}

.results-table td {
    padding: 11px 12px;
    border-bottom: 1px solid #f1f5f9;
    color: #374151;
    font-size: 12px;
    white-space: nowrap;
}

.results-table tbody tr {
    cursor: pointer;
    transition: background .12s;
}

.results-table tbody tr:hover {
    background: #f9fafb;
}

.record-id {
    font-weight: 700;
    color: #111827;
}

.company-name {
    font-weight: 600;
    color: #1f2937;
}

.invoice-number {
    font-weight: 600;
}

.quantity {
    font-weight: 600;
}

.empty {
    text-align: center;
    padding: 50px !important;
    color: #9ca3af !important;
}


/* =========================
   MODAL
========================= */

.record-modal {
    position: fixed;
    inset: 0;
    z-index: 9999;
}

.record-modal-overlay {
    position: absolute;
    inset: 0;
    background: rgba(15, 23, 42, .45);
    backdrop-filter: blur(2px);
}

.record-modal-box {
    position: relative;
    z-index: 2;
    width: min(1100px, calc(100% - 30px));
    max-height: calc(100vh - 40px);
    margin: 20px auto;
    background: white;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 20px 50px rgba(0,0,0,.18);
    display: flex;
    flex-direction: column;
}

.record-modal-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 17px 20px;
    border-bottom: 1px solid #e5e7eb;
}

.record-modal-title {
    font-size: 17px;
    font-weight: 700;
    color: #111827;
}

.record-modal-subtitle {
    margin-top: 3px;
    font-size: 11px;
    color: #9ca3af;
}

.record-modal-header-actions {
    display: flex;
    align-items: center;
    gap: 8px;
}

.record-pdf-button {
    height: 34px;
    padding: 0 12px;
    border-radius: 7px;
    border: 1px solid #d1d5db;
    background: white;
    color: #374151;
    font-size: 11px;
    font-weight: 600;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
}

.record-pdf-button:hover {
    background: #f9fafb;
}

.record-modal-close {
    width: 34px;
    height: 34px;
    border: none;
    border-radius: 7px;
    background: #f3f4f6;
    color: #6b7280;
    font-size: 23px;
    line-height: 1;
    cursor: pointer;
}

.record-modal-close:hover {
    background: #e5e7eb;
    color: #111827;
}

.record-modal-content {
    padding: 20px;
    overflow-y: auto;
}

.modal-loading {
    padding: 50px;
    text-align: center;
    font-size: 13px;
    color: #9ca3af;
}


/* =========================
   MODAL SECCIONES
========================= */

.modal-section {
    margin-bottom: 20px;
}

.modal-section:last-child {
    margin-bottom: 0;
}

.modal-section-title {
    margin-bottom: 10px;
    font-size: 11px;
    font-weight: 700;
    color: #6b7280;
    text-transform: uppercase;
    letter-spacing: .04em;
}

.modal-grid {
    display: grid;
    grid-template-columns: repeat(4, minmax(0, 1fr));
    gap: 10px;
}

.modal-field {
    padding: 10px 12px;
    background: #f9fafb;
    border: 1px solid #eef0f2;
    border-radius: 7px;
}

.modal-field-label {
    font-size: 10px;
    color: #9ca3af;
    margin-bottom: 3px;
}

.modal-field-value {
    font-size: 12px;
    font-weight: 600;
    color: #374151;
    word-break: break-word;
}

.modal-notes {
    padding: 12px;
    background: #f9fafb;
    border: 1px solid #eef0f2;
    border-radius: 7px;
    font-size: 12px;
    color: #374151;
    white-space: pre-wrap;
}


/* =========================
   SERVICIOS
========================= */

.modal-services {
    border: 1px solid #e5e7eb;
    border-radius: 8px;
    overflow: hidden;
}

.modal-services table {
    width: 100%;
    border-collapse: collapse;
}

.modal-services th {
    padding: 9px 10px;
    background: #f9fafb;
    font-size: 10px;
    text-transform: uppercase;
    color: #6b7280;
    text-align: left;
}

.modal-services td {
    padding: 10px;
    border-top: 1px solid #f1f5f9;
    font-size: 11px;
    color: #374151;
}


/* =========================
   RESPONSIVE
========================= */

@media(max-width:1100px) {

    .filters-grid {
        grid-template-columns: repeat(3, 1fr);
    }

}

@media(max-width:800px) {

    .modal-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }

    .results-header {
        align-items: flex-start;
        flex-direction: column;
    }

}

@media(max-width:700px) {

    .report-page {
        padding: 20px 12px;
    }

    .filters-grid {
        grid-template-columns: 1fr;
    }

    .summary-grid {
        grid-template-columns: 1fr;
    }

    .results-header {
        align-items: flex-start;
        flex-direction: column;
        gap: 10px;
    }

    .export-buttons {
        width: 100%;
    }

    .export-button {
        flex: 1;
    }

    .record-modal-header {
        align-items: flex-start;
    }

    .record-modal-header-actions {
        flex-shrink: 0;
    }

}

@media(max-width:500px) {

    .record-modal-box {
        width: calc(100% - 16px);
        margin: 8px auto;
        max-height: calc(100vh - 16px);
    }

    .modal-grid {
        grid-template-columns: 1fr;
    }

    .record-modal-title {
        font-size: 15px;
    }

    .record-pdf-button {
        padding: 0 9px;
    }

}

</style>


<div class="report-page">

<div class="report-container">


    {{-- ENCABEZADO --}}

    <div class="report-header">

        <div class="report-title">
            {{ __('reports.title') }}
        </div>

        <div class="report-subtitle">
            {{ __('reports.subtitle') }}
        </div>

    </div>


    {{-- FILTROS --}}

    <div class="filters-panel">

        <form
            method="GET"
            action="{{ route('reports.index') }}"
        >

            <div class="filters-grid">


                {{-- BÚSQUEDA --}}

                <div class="filter-group">

                    <label class="filter-label">
                        {{ __('reports.filters.search') }}
                    </label>

                    <input
                        type="text"
                        name="search"
                        value="{{ $search }}"
                        class="filter-input"
                        placeholder="{{ __('reports.filters.search_placeholder') }}"
                    >

                </div>


                {{-- CLIENTE --}}

                <div class="filter-group">

                    <label class="filter-label">
                        {{ __('reports.filters.company') }}
                    </label>

                    <select
                        name="company_id"
                        class="filter-select"
                    >

                        <option value="">
                            {{ __('reports.filters.all') }}
                        </option>

                        @foreach($companies as $company)

                            <option
                                value="{{ $company->id }}"
                                @selected($companyId == $company->id)
                            >
                                {{ $company->name }}
                            </option>

                        @endforeach

                    </select>

                </div>


                {{-- CHOFER --}}

                <div class="filter-group">

                    <label class="filter-label">
                        {{ __('reports.filters.driver') }}
                    </label>

                    <select
                        name="driver_id"
                        class="filter-select"
                    >

                        <option value="">
                            {{ __('reports.filters.all') }}
                        </option>

                        @foreach($drivers as $driver)

                            <option
                                value="{{ $driver->id }}"
                                @selected($driverId == $driver->id)
                            >
                                {{ $driver->name }}
                            </option>

                        @endforeach

                    </select>

                </div>


                {{-- DESDE --}}

                <div class="filter-group">

                    <label class="filter-label">
                        {{ __('reports.filters.from') }}
                    </label>

                    <input
                        type="date"
                        name="date_from"
                        value="{{ $dateFrom }}"
                        class="filter-input"
                    >

                </div>


                {{-- HASTA --}}

                <div class="filter-group">

                    <label class="filter-label">
                        {{ __('reports.filters.to') }}
                    </label>

                    <input
                        type="date"
                        name="date_to"
                        value="{{ $dateTo }}"
                        class="filter-input"
                    >

                </div>


                {{-- BOTÓN FILTRAR --}}

                <div>

                    <button
                        type="submit"
                        class="filter-button"
                    >
                        {{ __('reports.filters.filter') }}
                    </button>

                </div>

            </div>


            {{-- SEGUNDA FILA --}}

            <div style="
                display:flex;
                align-items:center;
                gap:10px;
                margin-top:12px;
                flex-wrap:wrap;
            ">


                {{-- TIPO DE CANTIDAD --}}

                <div
                    class="filter-group"
                    style="width:180px;"
                >

                    <label class="filter-label">
                        {{ __('reports.filters.quantity_type') }}
                    </label>

                    <select
                        name="quantity_type"
                        class="filter-select"
                    >

                        <option value="">
                            {{ __('reports.filters.all') }}
                        </option>

                        <option
                            value="palets"
                            @selected($quantityType === 'palets')
                        >
                            {{ __('reports.quantity_types.palets') }}
                        </option>

                        <option
                            value="contenedores"
                            @selected($quantityType === 'contenedores')
                        >
                            {{ __('reports.quantity_types.containers') }}
                        </option>

                        <option
                            value="piezas"
                            @selected($quantityType === 'piezas')
                        >
                            {{ __('reports.quantity_types.pieces') }}
                        </option>

                    </select>

                </div>


                {{-- LIMPIAR --}}

                <a
                    href="{{ route('reports.index') }}"
                    class="clear-button"
                >
                    {{ __('reports.filters.clear') }}
                </a>

            </div>

        </form>

    </div>


    {{-- RESUMEN --}}

    <div class="summary-grid">


        <div class="summary-card">

            <div class="summary-label">
                {{ __('reports.summary.records_found') }}
            </div>

            <div class="summary-value">
                {{ number_format($totalRecords) }}
            </div>

        </div>


        <div class="summary-card">

            <div class="summary-label">
                {{ __('reports.summary.total_quantity') }}
            </div>

            <div class="summary-value">
                {{ number_format($totalQuantity, 0) }}
            </div>

        </div>


        <div class="summary-card">

            <div class="summary-label">
                {{ __('reports.summary.registered_services') }}
            </div>

            <div class="summary-value">
                {{ number_format($totalServices) }}
            </div>

        </div>

    </div>


    {{-- RESULTADOS --}}

    <div class="results-panel">


        <div class="results-header">


            <div class="results-header-left">

                <div class="results-title">
                    {{ __('reports.results.title') }}
                </div>

                <div class="results-count">

                    {{ $totalRecords }}

                    {{ $totalRecords === 1
                        ? __('reports.results.record')
                        : __('reports.results.records')
                    }}

                </div>

            </div>


            {{-- EXPORTACIONES --}}

            <div class="export-buttons">


                {{-- PDF FILTRADO --}}

                <a
                    href="{{ route('reports.export.pdf', request()->query()) }}"
                    class="export-button export-pdf"
                >
                    {{ __('reports.export.pdf') }}
                </a>


                {{-- EXCEL FILTRADO --}}

                <a
                    href="{{ route('reports.export.excel', request()->query()) }}"
                    class="export-button export-excel"
                >
                    {{ __('reports.export.excel') }}
                </a>

            </div>

        </div>


        <div class="table-wrapper">

            <table class="results-table">

                <thead>

                    <tr>

                        <th>{{ __('reports.table.record') }}</th>
                        <th>{{ __('reports.table.date') }}</th>
                        <th>{{ __('reports.table.company') }}</th>
                        <th>{{ __('reports.table.invoice_number') }}</th>
                        <th>{{ __('reports.table.paps') }}</th>
                        <th>{{ __('reports.table.driver') }}</th>
                        <th>{{ __('reports.table.trailer') }}</th>
                        <th>{{ __('reports.table.shipper') }}</th>
                        <th>{{ __('reports.table.consignee') }}</th>
                        <th>{{ __('reports.table.broker') }}</th>
                        <th>{{ __('reports.table.origin') }}</th>
                        <th>{{ __('reports.table.destination') }}</th>
                        <th>{{ __('reports.table.quantity') }}</th>

                    </tr>

                </thead>


                <tbody>


                    @forelse($records as $record)


                        <tr
                            onclick="openReportRecord({{ $record->id }})"
                        >


                            {{-- REGISTRO --}}

                            <td>

                                <span class="record-id">
                                    #{{ $record->id }}
                                </span>

                            </td>


                            {{-- FECHA --}}

                            <td>

                                {{ $record->date?->format('d/m/Y') ?? '—' }}

                            </td>


                            {{-- CLIENTE --}}

                            <td>

                                <span class="company-name">

                                    {{ $record->company->name ?? '—' }}

                                </span>

                            </td>


                            {{-- NÚMERO DE FACTURA --}}

                            <td>

                                <span class="invoice-number">

                                    {{ $record->invoice_number ?? '—' }}

                                </span>

                            </td>


                            {{-- PAPS --}}

                            <td>

                                {{ $record->paps_number ?? '—' }}

                            </td>


                            {{-- CHOFER --}}

                            <td>

                                {{ $record->driver->name ?? '—' }}

                            </td>


                            {{-- REMOLQUE --}}

                            <td>

                                {{ $record->trailer->number ?? '—' }}

                            </td>


                            {{-- TRANSPORTISTA --}}

                            <td>

                                {{ $record->shipper->name ?? '—' }}

                            </td>


                            {{-- CONSIGNATARIO --}}

                            <td>

                                {{ $record->consignee->name ?? '—' }}

                            </td>


                            {{-- AGENTE COMERCIAL --}}

                            <td>

                                {{ $record->broker->name ?? '—' }}

                            </td>


                            {{-- ORIGEN --}}

                            <td>

                                {{ $record->origin ?? '—' }}

                            </td>


                            {{-- DESTINO --}}

                            <td>

                                {{ $record->destination ?? '—' }}

                            </td>


                            {{-- CANTIDAD --}}

                            <td>

                                @if($record->quantity !== null)

                                    <span class="quantity">

                                        {{ $record->quantity }}

                                        {{ $record->quantity_type }}

                                    </span>

                                @else

                                    —

                                @endif

                            </td>


                        </tr>


                    @empty


                        <tr>

                            <td
                                colspan="13"
                                class="empty"
                            >

                                {{ __('reports.results.no_records') }}

                            </td>

                        </tr>


                    @endforelse


                </tbody>

            </table>

        </div>

    </div>

</div>

</div>


{{-- =========================
     MODAL DETALLE
========================= --}}

<div
    id="recordModal"
    class="record-modal"
    style="display:none;"
>

    <div
        class="record-modal-overlay"
        onclick="closeReportRecord()"
    ></div>


    <div class="record-modal-box">


        {{-- ENCABEZADO --}}

        <div class="record-modal-header">

            <div>

                <div class="record-modal-title">
                    {{ __('reports.modal.detail') }}
                </div>

                <div
                    id="modalRecordId"
                    class="record-modal-subtitle"
                >
                    {{ __('reports.modal.record') }}
                </div>

            </div>


            <div class="record-modal-header-actions">


                {{-- PDF INDIVIDUAL --}}

                <a
                    id="modalRecordPdf"
                    href="#"
                    target="_blank"
                    class="record-pdf-button"
                >
                    {{ __('reports.export.pdf') }}
                </a>


                {{-- EXCEL INDIVIDUAL --}}

                <a
                    id="modalRecordExcel"
                    href="#"
                    class="record-pdf-button"
                >
                    {{ __('reports.export.excel') }}
                </a>


                {{-- CERRAR --}}

                <button
                    type="button"
                    class="record-modal-close"
                    onclick="closeReportRecord()"
                >
                    ×
                </button>

            </div>

        </div>


        {{-- CONTENIDO --}}

        <div
            id="recordModalContent"
            class="record-modal-content"
        >

            <div class="modal-loading">
                {{ __('reports.modal.loading') }}
            </div>

        </div>

    </div>

</div>


<script>


/* =========================
   ABRIR REGISTRO
========================= */

async function openReportRecord(recordId)
{

    const modal =
        document.getElementById('recordModal');

    const content =
        document.getElementById('recordModalContent');

    const modalRecordId =
        document.getElementById('modalRecordId');

    const modalRecordPdf =
        document.getElementById('modalRecordPdf');

    const modalRecordExcel =
        document.getElementById('modalRecordExcel');


    modal.style.display = 'block';

    document.body.style.overflow = 'hidden';


    content.innerHTML = `
        <div class="modal-loading">
            ${@json(__('reports.modal.loading'))}
        </div>
    `;


    modalRecordId.textContent =
        @json(__('reports.modal.record')) +
        ' #' +
        recordId;


    /*
     * PDF individual
     */

    modalRecordPdf.href =
        "{{ url('/reports') }}/" +
        recordId +
        "/pdf";


    /*
     * Excel individual
     */

    modalRecordExcel.href =
        "{{ url('/reports') }}/" +
        recordId +
        "/excel";


    try {


        const response = await fetch(
            "{{ url('/reports') }}/" +
            recordId,
            {
                method: 'GET',

                headers: {
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                }
            }
        );


        if (!response.ok) {

            throw new Error(
                @json(__('reports.errors.load_record'))
            );

        }


        const data =
            await response.json();


        if (!data || !data.record) {

            throw new Error(
                @json(__('reports.errors.invalid_record'))
            );

        }


        const record =
            data.record;


        modalRecordId.textContent =
            @json(__('reports.modal.record')) +
            ' #' +
            record.id;


        renderRecordModal(record);


    } catch (error) {


        console.error(error);


        content.innerHTML = `
            <div class="modal-loading">
                ${@json(__('reports.errors.load_information'))}
            </div>
        `;

    }

}


/* =========================
   CERRAR MODAL
========================= */

function closeReportRecord()
{

    const modal =
        document.getElementById('recordModal');


    modal.style.display = 'none';


    document.body.style.overflow = '';

}


/* =========================
   RENDERIZAR MODAL
========================= */

function renderRecordModal(record)
{

    const content =
        document.getElementById(
            'recordModalContent'
        );


    const services =
        record.services || [];


    content.innerHTML = `


        <div class="modal-section">

            <div class="modal-section-title">
                ${@json(__('reports.modal.record_information'))}
            </div>


            <div class="modal-grid">

                ${field(
                    @json(__('reports.fields.record')),
                    '#' + record.id
                )}


                ${field(
                    @json(__('reports.fields.date')),
                    formatDate(record.date)
                )}


                ${field(
                    @json(__('reports.fields.invoice_number')),
                    record.invoice_number
                )}


                ${field(
                    @json(__('reports.fields.paps')),
                    record.paps_number
                )}


                ${field(
                    @json(__('reports.fields.origin')),
                    record.origin
                )}


                ${field(
                    @json(__('reports.fields.destination')),
                    record.destination
                )}


                ${field(
                    @json(__('reports.fields.quantity')),
                    record.quantity !== null &&
                    record.quantity !== undefined
                        ? record.quantity +
                          ' ' +
                          (
                              record.quantity_type || ''
                          )
                        : '—'
                )}

            </div>

        </div>


        <div class="modal-section">

            <div class="modal-section-title">
                ${@json(__('reports.modal.transport_participants'))}
            </div>


            <div class="modal-grid">

                ${field(
                    @json(__('reports.fields.company')),
                    record.company?.name
                )}


                ${field(
                    @json(__('reports.fields.driver')),
                    record.driver?.name
                )}


                ${field(
                    @json(__('reports.fields.trailer')),
                    record.trailer?.number
                )}


                ${field(
                    @json(__('reports.fields.shipper')),
                    record.shipper?.name
                )}


                ${field(
                    @json(__('reports.fields.consignee')),
                    record.consignee?.name
                )}


                ${field(
                    @json(__('reports.fields.broker')),
                    record.broker?.name
                )}

            </div>

        </div>


        <div class="modal-section">

            <div class="modal-section-title">
                ${@json(__('reports.modal.services'))}
            </div>


            ${
                services.length
                    ? renderServices(services)
                    : `
                        <div class="modal-field-value">
                            ${@json(__('reports.modal.no_services'))}
                        </div>
                    `
            }

        </div>


        <div class="modal-section">

            <div class="modal-section-title">
                ${@json(__('reports.modal.notes'))}
            </div>


            <div class="modal-notes">

                ${escapeHtml(
                    record.notes ||
                    @json(__('reports.modal.no_notes'))
                )}

            </div>

        </div>


        <div class="modal-section">

            <div class="modal-section-title">
                ${@json(__('reports.modal.tracking'))}
            </div>


            <div class="modal-grid">

                ${field(
                    @json(__('reports.fields.registered_by')),
                    record.registered_by?.name
                )}

            </div>

        </div>

    `;

}


/* =========================
   CAMPO DEL MODAL
========================= */

function field(label, value)
{

    return `

        <div class="modal-field">

            <div class="modal-field-label">
                ${escapeHtml(label)}
            </div>

            <div class="modal-field-value">
                ${escapeHtml(value || '—')}
            </div>

        </div>

    `;

}


/* =========================
   SERVICIOS
========================= */

function renderServices(services)
{

    return `

        <div class="modal-services">

            <table>

                <thead>

                    <tr>

                        <th>
                            ${@json(__('reports.services.service'))}
                        </th>

                        <th>
                            ${@json(__('reports.services.quantity'))}
                        </th>

                        <th>
                            ${@json(__('reports.services.price'))}
                        </th>

                        <th>
                            ${@json(__('reports.services.subtotal'))}
                        </th>

                    </tr>

                </thead>


                <tbody>

                    ${services.map(service => `

                        <tr>

                            <td>
                                ${escapeHtml(
                                    service.service_type?.name || '—'
                                )}
                            </td>


                            <td>
                                ${escapeHtml(
                                    service.quantity ?? '—'
                                )}
                            </td>


                            <td>
                                $${escapeHtml(
                                    service.unit_price ?? '0.00'
                                )}
                            </td>


                            <td>
                                $${escapeHtml(
                                    service.subtotal ?? '0.00'
                                )}
                            </td>

                        </tr>

                    `).join('')}

                </tbody>

            </table>

        </div>

    `;

}


/* =========================
   FORMATO DE FECHA
========================= */

function formatDate(date)
{

    if (!date) {
        return '—';
    }


    const parts =
        String(date).split('-');


    if (parts.length !== 3) {
        return date;
    }


    return (
        parts[2] +
        '/' +
        parts[1] +
        '/' +
        parts[0]
    );

}


/* =========================
   SEGURIDAD HTML
========================= */

function escapeHtml(value)
{

    const div =
        document.createElement('div');


    div.textContent =
        value ?? '';


    return div.innerHTML;

}


/* =========================
   TECLA ESCAPE
========================= */

document.addEventListener(
    'keydown',
    function(event) {

        if (event.key === 'Escape') {

            closeReportRecord();

        }

    }
);

</script>


</x-app-layout>
