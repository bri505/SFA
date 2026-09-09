<x-app-layout>

    <style>

        .sfa-page {
            min-height: calc(100vh - 64px);
            background: #f5f6f8;
        }

        .sfa-container {
            max-width: 1100px;
            margin: 0 auto;
            padding: 24px 28px;
        }


        /* HEADER */

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


        /* PANEL */

        .panel {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 7px;
            overflow: hidden;
        }

        .panel-header {
            padding: 13px 16px;
            border-bottom: 1px solid #e5e7eb;
        }

        .panel-title {
            font-size: 14px;
            font-weight: 600;
            color: #1f2937;
        }

        .panel-subtitle {
            margin-top: 3px;
            font-size: 11px;
            color: #6b7280;
        }


        /* TABLA */

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 12px;
        }

        th {
            padding: 9px 12px;
            background: #f9fafb;
            border-bottom: 1px solid #e5e7eb;
            color: #6b7280;
            font-size: 10px;
            font-weight: 600;
            text-transform: uppercase;
            text-align: left;
            white-space: nowrap;
        }

        td {
            padding: 11px 12px;
            border-bottom: 1px solid #f0f1f3;
            color: #374151;
            vertical-align: middle;
        }

        tr:last-child td {
            border-bottom: none;
        }


        /* INPUTS */

        .input {
            width: 100%;
            height: 32px;
            box-sizing: border-box;
            border: 1px solid #d1d5db;
            border-radius: 5px;
            padding: 6px 8px;
            font-size: 12px;
            color: #374151;
            background: white;
        }

        .input:focus {
            outline: none;
            border-color: #6b7280;
            box-shadow: 0 0 0 2px rgba(107,114,128,.10);
        }

        .price-input {
            width: 110px;
        }


        /* ESTADO */

        .status {
            display: inline-flex;
            padding: 4px 7px;
            border-radius: 4px;
            font-size: 10px;
            font-weight: 600;
        }

        .status-active {
            background: #dcfce7;
            color: #166534;
        }

        .status-inactive {
            background: #f3f4f6;
            color: #6b7280;
        }


        /* BOTÓN */

        .btn-save {
            border: none;
            border-radius: 5px;
            background: #1f2937;
            color: white;
            padding: 7px 11px;
            font-size: 11px;
            cursor: pointer;
        }

        .btn-save:hover {
            background: #111827;
        }


        /* ALERTA */

        .alert-success {
            margin-bottom: 16px;
            padding: 10px 12px;
            border: 1px solid #bbf7d0;
            border-radius: 5px;
            background: #f0fdf4;
            color: #166534;
            font-size: 11px;
        }


        /* ERRORES */

        .error {
            margin-top: 4px;
            color: #dc2626;
            font-size: 10px;
        }


        /* RESPONSIVE */

        @media(max-width:700px) {

            .sfa-container {
                padding: 16px;
            }

            .page-header {
                align-items: flex-start;
                flex-direction: column;
                gap: 5px;
            }

        }

        .btn-new {
            display: inline-flex;
            align-items: center;
            padding: 8px 13px;
            border: none;
            border-radius: 5px;
            background: #1f2937;
            color: white;
            font-size: 11px;
            font-weight: 500;
            cursor: pointer;
        }

        .btn-new:hover {
            background: #111827;
        }


        /* =========================================================
           MODAL
        ========================================================= */

        .modal-overlay {
            position: fixed;
            inset: 0;
            z-index: 9999;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            background: rgba(17, 24, 39, .45);
        }

        .modal {
            width: 100%;
            max-width: 430px;
            background: white;
            border-radius: 7px;
            border: 1px solid #e5e7eb;
            box-shadow: 0 15px 40px rgba(0,0,0,.15);
            overflow: hidden;
        }

        .modal-header {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            padding: 15px 16px;
            border-bottom: 1px solid #e5e7eb;
        }

        .modal-title {
            font-size: 14px;
            font-weight: 600;
            color: #1f2937;
        }

        .modal-subtitle {
            margin-top: 3px;
            font-size: 11px;
            color: #6b7280;
        }

        .modal-close {
            border: none;
            background: transparent;
            color: #9ca3af;
            font-size: 22px;
            line-height: 1;
            cursor: pointer;
        }

        .modal-close:hover {
            color: #374151;
        }

        .modal-body {
            padding: 16px;
        }

        .modal-group {
            margin-bottom: 13px;
        }

        .modal-group:last-child {
            margin-bottom: 0;
        }

        .modal-group label {
            display: block;
            margin-bottom: 5px;
            font-size: 11px;
            font-weight: 500;
            color: #4b5563;
        }

        .modal-group textarea {
            height: auto;
            resize: vertical;
        }

        .modal-footer {
            display: flex;
            justify-content: flex-end;
            gap: 8px;
            padding: 12px 16px;
            border-top: 1px solid #e5e7eb;
            background: #fafafa;
        }

        .btn-cancel {
            padding: 7px 11px;
            border: 1px solid #d1d5db;
            border-radius: 5px;
            background: white;
            color: #4b5563;
            font-size: 11px;
            cursor: pointer;
        }

        .btn-cancel:hover {
            background: #f9fafb;
        }

    </style>


    <div class="sfa-page">

        <div class="sfa-container">


            {{-- HEADER --}}

            <div class="page-header">

                <div>

                    <h1 class="page-title">
                        {{ __('services.title') }}
                    </h1>

                    <p class="page-subtitle">
                        {{ __('services.subtitle') }}
                    </p>

                </div>


                <button
                    type="button"
                    class="btn-new"
                    onclick="openServiceModal()"
                >
                    + {{ __('services.new_service') }}
                </button>

            </div>


            {{-- MENSAJE --}}

            @if(session('success'))

                <div class="alert-success">

                    {{ session('success') }}

                </div>

            @endif


            {{-- ERRORES --}}

            @if($errors->any())

                <div
                    class="alert-success"
                    style="
                        background:#fef2f2;
                        border-color:#fecaca;
                        color:#991b1b;
                    "
                >

                    {{ $errors->first() }}

                </div>

            @endif


            {{-- SERVICIOS --}}

            <div class="panel">

                <div class="panel-header">

                    <div class="panel-title">
                        {{ __('services.services') }}
                    </div>

                    <div class="panel-subtitle">
                        {{ __('services.services_description') }}
                    </div>

                </div>


                <div class="table-wrapper">

                    <table>

                        <thead>

                            <tr>

                                <th>
                                    {{ __('services.service') }}
                                </th>

                                <th>
                                    {{ __('services.description') }}
                                </th>

                                <th>
                                    {{ __('services.price') }}
                                </th>

                                <th>
                                    {{ __('services.weight') }}
                                </th>

                                <th>
                                    {{ __('services.status') }}
                                </th>

                                <th style="width:90px;">
                                    {{ __('services.action') }}
                                </th>

                            </tr>

                        </thead>


                        <tbody>

                            @forelse($services as $service)

                                <tr>

                                    <form
                                        method="POST"
                                        action="{{ route('service-types.update', $service) }}"
                                    >

                                        @csrf

                                        @method('PUT')


                                        <td>

                                            <input
                                                type="text"
                                                name="name"
                                                class="input"
                                                value="{{ $service->name }}"
                                                required
                                            >

                                        </td>


                                        <td>

                                            <input
                                                type="text"
                                                name="description"
                                                class="input"
                                                value="{{ $service->description }}"
                                            >

                                        </td>


                                        <td>

                                            <input
                                                type="number"
                                                name="price"
                                                class="input price-input"
                                                value="{{ $service->price }}"
                                                min="0"
                                                step="0.01"
                                                required
                                            >

                                        </td>


                                        <td>

                                            <input
                                                type="number"
                                                name="weight"
                                                class="input"
                                                value="{{ $service->weight }}"
                                                min="0"
                                                step="0.01"
                                                placeholder="{{ __('services.weight') }}"
                                            >

                                        </td>


                                        <td>

                                            <select
                                                name="active"
                                                class="input"
                                            >

                                                <option
                                                    value="1"
                                                    {{ $service->active ? 'selected' : '' }}
                                                >
                                                    {{ __('services.active') }}
                                                </option>

                                                <option
                                                    value="0"
                                                    {{ !$service->active ? 'selected' : '' }}
                                                >
                                                    {{ __('services.inactive') }}
                                                </option>

                                            </select>

                                        </td>


                                        <td>

                                            <button
                                                type="submit"
                                                class="btn-save"
                                            >
                                                {{ __('services.save') }}
                                            </button>

                                        </td>

                                    </form>

                                </tr>

                            @empty

                                <tr>

                                    <td
                                        colspan="6"
                                        style="
                                            padding:40px;
                                            text-align:center;
                                            color:#9ca3af;
                                        "
                                    >

                                        {{ __('services.no_services') }}

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
         MODAL NUEVO SERVICIO
    ========================================================= --}}

    <div
        id="serviceModal"
        class="modal-overlay"
        style="display:none;"
    >

        <div class="modal">

            <div class="modal-header">

                <div>

                    <div class="modal-title">
                        {{ __('services.modal.new_service') }}
                    </div>

                    <div class="modal-subtitle">
                        {{ __('services.modal.subtitle') }}
                    </div>

                </div>


                <button
                    type="button"
                    class="modal-close"
                    onclick="closeServiceModal()"
                >
                    ×
                </button>

            </div>


            <form
                method="POST"
                action="{{ route('service-types.store') }}"
            >

                @csrf


                <div class="modal-body">

                    {{-- NOMBRE --}}

                    <div class="modal-group">

                        <label>
                            {{ __('services.modal.name') }}
                        </label>

                        <input
                            type="text"
                            name="name"
                            class="input"
                            placeholder="{{ __('services.modal.name_placeholder') }}"
                            required
                        >

                    </div>


                    {{-- DESCRIPCIÓN --}}

                    <div class="modal-group">

                        <label>
                            {{ __('services.modal.description') }}
                        </label>

                        <textarea
                            name="description"
                            class="input"
                            rows="3"
                            placeholder="{{ __('services.modal.description_placeholder') }}"
                        ></textarea>

                    </div>


                    {{-- PRECIO --}}

                    <div class="modal-group">

                        <label>
                            {{ __('services.modal.price') }}
                        </label>

                        <input
                            type="number"
                            name="price"
                            class="input"
                            value="0.00"
                            min="0"
                            step="0.01"
                            required
                        >

                    </div>


                    {{-- PESO --}}

                    <div class="modal-group">

                        <label>
                            {{ __('services.modal.weight') }}
                        </label>

                        <input
                            type="number"
                            name="weight"
                            class="input"
                            placeholder="{{ __('services.modal.weight_placeholder') }}"
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
                        {{ __('services.modal.cancel') }}
                    </button>


                    <button
                        type="submit"
                        class="btn-save"
                    >
                        {{ __('services.modal.save_service') }}
                    </button>

                </div>

            </form>

        </div>

    </div>


    <script>

        function openServiceModal() {

            document.getElementById('serviceModal')
                .style.display = 'flex';

        }


        function closeServiceModal() {

            document.getElementById('serviceModal')
                .style.display = 'none';

        }


        document
            .getElementById('serviceModal')
            .addEventListener('click', function (event) {

                if (event.target === this) {

                    closeServiceModal();

                }

            });

    </script>

</x-app-layout>