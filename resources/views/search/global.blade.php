<x-app-layout>

<style>

.search-page {
    padding: 30px 20px;
    background: #f8fafc;
    min-height: calc(100vh - 64px);
}

.search-container {
    max-width: 1400px;
    margin: 0 auto;
}

/* ENCABEZADO */

.search-header {
    margin-bottom: 22px;
}

.search-title {
    font-size: 24px;
    font-weight: 700;
    color: #1f2937;
}

.search-subtitle {
    margin-top: 4px;
    font-size: 13px;
    color: #6b7280;
}

/* BUSCADOR */

.search-box {
    background: white;
    border: 1px solid #e5e7eb;
    border-radius: 10px;
    padding: 18px;
    margin-bottom: 18px;
}

.search-form {
    display: flex;
    gap: 10px;
}

.search-input {
    width: 100%;
    height: 42px;
    padding: 0 13px;
    border: 1px solid #d1d5db;
    border-radius: 7px;
    font-size: 13px;
    outline: none;
}

.search-input:focus {
    border-color: #6b7280;
    box-shadow: 0 0 0 2px rgba(107, 114, 128, .10);
}

/* RESULTADOS */

.results-panel {
    background: white;
    border: 1px solid #e5e7eb;
    border-radius: 10px;
    overflow: hidden;
}

.results-header {
    padding: 15px 18px;
    border-bottom: 1px solid #e5e7eb;
}

.results-title {
    font-size: 14px;
    font-weight: 700;
    color: #111827;
}

.results-count {
    margin-top: 3px;
    font-size: 12px;
    color: #6b7280;
}

.table-wrapper {
    width: 100%;
    overflow-x: auto;
}

.results-table {
    width: 100%;
    min-width: 1000px;
    border-collapse: collapse;
}

.results-table th {
    padding: 11px 12px;
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
    padding: 12px;
    border-bottom: 1px solid #f1f5f9;
    color: #374151;
    font-size: 12px;
    vertical-align: middle;
}

.results-table tbody tr:hover {
    background: #fafafa;
}

.record-id {
    font-weight: 700;
    color: #111827;
}

.invoice {
    font-weight: 600;
    color: #374151;
}

.company {
    font-weight: 600;
    color: #1f2937;
}

.notes {
    max-width: 260px;
    color: #6b7280;
    line-height: 1.4;
}

.empty {
    padding: 45px 20px !important;
    text-align: center;
    color: #9ca3af !important;
}

.search-hint {
    margin-top: 8px;
    font-size: 11px;
    color: #9ca3af;
}

.loading {
    opacity: .6;
}

@media(max-width:700px) {

    .search-page {
        padding: 20px 12px;
    }

}

</style>


<div class="search-page">

<div class="search-container">


{{-- =========================================================
     ENCABEZADO
========================================================== --}}

<div class="search-header">

    <div class="search-title">
        {{ __('search.title') }}
    </div>

    <div class="search-subtitle">
        {{ __('search.subtitle') }}
    </div>

</div>



{{-- =========================================================
     BUSCADOR
========================================================== --}}

<div class="search-box">

    <div class="search-form">

        <input
            type="text"
            id="globalSearchInput"
            class="search-input"
            placeholder="{{ __('search.placeholder') }}"
            autocomplete="off"
            autofocus
        >

    </div>


    <div
        class="search-hint"
        id="searchHint"
    >
        {{ __('search.hint') }}
    </div>

</div>



{{-- =========================================================
     RESULTADOS
========================================================== --}}

<div
    class="results-panel"
    id="resultsPanel"
    style="display:none;"
>

    <div class="results-header">

        <div class="results-title">
            {{ __('search.results_title') }}
        </div>

        <div
            class="results-count"
            id="resultsCount"
        >
            {{ __('search.zero_records') }}
        </div>

    </div>



    <div class="table-wrapper">

        <table class="results-table">

            <thead>

                <tr>

                    <th>{{ __('search.table.record') }}</th>
                    <th>{{ __('search.table.date') }}</th>
                    <th>{{ __('search.table.company') }}</th>
                    <th>{{ __('search.table.invoice_number') }}</th>
                    <th>{{ __('search.table.paps') }}</th>
                    <th>{{ __('search.table.driver') }}</th>
                    <th>{{ __('search.table.trailer') }}</th>
                    <th>{{ __('search.table.origin') }}</th>
                    <th>{{ __('search.table.destination') }}</th>
                    <th>{{ __('search.table.notes') }}</th>

                </tr>

            </thead>


            <tbody id="resultsBody">

            </tbody>

        </table>

    </div>

</div>


</div>

</div>



<script>

document.addEventListener('DOMContentLoaded', function () {

    const input =
        document.getElementById('globalSearchInput');

    const resultsPanel =
        document.getElementById('resultsPanel');

    const resultsBody =
        document.getElementById('resultsBody');

    const resultsCount =
        document.getElementById('resultsCount');

    const searchHint =
        document.getElementById('searchHint');


    let searchTimer = null;

    let controller = null;



    /*
    |--------------------------------------------------------------------------
    | ESCRIBIR
    |--------------------------------------------------------------------------
    */

    input.addEventListener('input', function () {

        const search =
            this.value.trim();


        clearTimeout(searchTimer);


        /*
        |--------------------------------------------------------------------------
        | CANCELAR PETICIÓN ANTERIOR
        |--------------------------------------------------------------------------
        */

        if (controller) {

            controller.abort();

        }


        /*
        |--------------------------------------------------------------------------
        | BUSCADOR VACÍO
        |--------------------------------------------------------------------------
        */

        if (search === '') {

            resultsPanel.style.display = 'none';

            resultsBody.innerHTML = '';

            resultsCount.textContent =
                @json(__('search.zero_records'));

            searchHint.textContent =
                @json(__('search.hint'));

            return;

        }


        /*
        |--------------------------------------------------------------------------
        | ESPERAR 300ms
        |--------------------------------------------------------------------------
        */

        searchHint.textContent =
            @json(__('search.searching'));


        searchTimer = setTimeout(function () {

            performSearch(search);

        }, 300);

    });



    /*
    |--------------------------------------------------------------------------
    | REALIZAR BÚSQUEDA
    |--------------------------------------------------------------------------
    */

    function performSearch(search) {

        controller =
            new AbortController();


        const params =
            new URLSearchParams({

                q: search

            });


        fetch(
            "{{ route('search.global') }}?" +
            params.toString(),
            {

                method: 'GET',

                headers: {

                    'Accept':
                        'application/json',

                    'X-Requested-With':
                        'XMLHttpRequest'

                },

                signal:
                    controller.signal

            }
        )
        .then(function (response) {

            if (!response.ok) {

                throw new Error(
                    @json(__('search.search_error'))
                );

            }

            return response.json();

        })
        .then(function (data) {

            renderResults(
                data.records || [],
                search
            );

        })
        .catch(function (error) {

            if (
                error.name ===
                'AbortError'
            ) {

                return;

            }

            console.error(error);

            searchHint.textContent =
                @json(__('search.search_failed'));

        });

    }



    /*
    |--------------------------------------------------------------------------
    | MOSTRAR RESULTADOS
    |--------------------------------------------------------------------------
    */

    function renderResults(records, search) {

        resultsBody.innerHTML = '';

        resultsPanel.style.display =
            'block';


        /*
        |--------------------------------------------------------------------------
        | CONTADOR
        |--------------------------------------------------------------------------
        */

        if (records.length === 1) {

            resultsCount.textContent =
                @json(__('search.one_record_found'));

        } else {

            resultsCount.textContent =
                records.length +
                ' ' +
                @json(__('search.records_found'));

        }


        searchHint.textContent =
            @json(__('search.results_for')) +
            ' "' +
            search +
            '"';



        /*
        |--------------------------------------------------------------------------
        | SIN RESULTADOS
        |--------------------------------------------------------------------------
        */

        if (!records.length) {

            resultsBody.innerHTML = `

                <tr>

                    <td
                        colspan="10"
                        class="empty"
                    >

                        ${@json(__('search.no_results'))}

                    </td>

                </tr>

            `;

            return;

        }



        /*
        |--------------------------------------------------------------------------
        | CREAR FILAS
        |--------------------------------------------------------------------------
        */

        records.forEach(function (record) {

            const row =
                document.createElement('tr');


            row.style.cursor =
                'pointer';


            row.innerHTML = `

                <td>

                    <span class="record-id">

                        #${record.id}

                    </span>

                </td>


                <td>

                    ${formatDate(record.date)}

                </td>


                <td>

                    <span class="company">

                        ${escapeHtml(
                            record.company?.name || '—'
                        )}

                    </span>

                </td>


                <td>

                    <span class="invoice">

                        ${escapeHtml(
                            record.invoice_number || '—'
                        )}

                    </span>

                </td>


                <td>

                    ${escapeHtml(
                        record.paps_number || '—'
                    )}

                </td>


                <td>

                    ${escapeHtml(
                        record.driver?.name || '—'
                    )}

                </td>


                <td>

                    ${escapeHtml(
                        record.trailer?.number || '—'
                    )}

                </td>


                <td>

                    ${escapeHtml(
                        record.origin || '—'
                    )}

                </td>


                <td>

                    ${escapeHtml(
                        record.destination || '—'
                    )}

                </td>


                <td>

                    <div class="notes">

                        ${escapeHtml(
                            record.notes || '—'
                        )}

                    </div>

                </td>

            `;



            /*
            |--------------------------------------------------------------------------
            | CLICK EN REGISTRO
            |--------------------------------------------------------------------------
            */

            row.addEventListener(
                'click',
                function () {

                    window.location.href =
                        "{{ url('/records') }}/" +
                        record.id +
                        "/edit";

                }
            );


            resultsBody.appendChild(row);

        });

    }



    /*
    |--------------------------------------------------------------------------
    | FORMATEAR FECHA
    |--------------------------------------------------------------------------
    */

    function formatDate(date) {

        if (!date) {

            return '—';

        }


        const parts =
            date.split('-');


        if (parts.length !== 3) {

            return date;

        }


        const locale =
            @json(app()->getLocale());


        if (locale === 'en') {

            return (
                parts[1] +
                '/' +
                parts[2] +
                '/' +
                parts[0]
            );

        }


        return (
            parts[2] +
            '/' +
            parts[1] +
            '/' +
            parts[0]
        );

    }



    /*
    |--------------------------------------------------------------------------
    | ESCAPAR HTML
    |--------------------------------------------------------------------------
    */

    function escapeHtml(value) {

        const div =
            document.createElement('div');

        div.textContent =
            value ?? '';

        return div.innerHTML;

    }

});

</script>

</x-app-layout>