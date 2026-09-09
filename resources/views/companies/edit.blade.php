<x-app-layout>

    <style>

        /* =========================================================
           CONTENEDOR
        ========================================================== */

        .sfa-dashboard {
            min-height: calc(100vh - 64px);
            background: #f8fafc;
            padding: 30px 20px;
        }

        .sfa-container {
            max-width: 1100px;
            margin: 0 auto;
        }


        /* =========================================================
           HEADER
        ========================================================== */

        .dashboard-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
        }

        .dashboard-title {
            font-size: 24px;
            font-weight: 700;
            color: #1f2937;
            margin: 0;
        }

        .dashboard-subtitle {
            margin-top: 5px;
            font-size: 14px;
            color: #6b7280;
        }


        /* =========================================================
           BOTÓN REGRESAR
        ========================================================== */

        .back-button {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 9px 14px;

            background: #ffffff;
            border: 1px solid #d1d5db;
            border-radius: 7px;

            color: #374151;
            font-size: 13px;
            font-weight: 500;

            text-decoration: none;

            transition: all .15s ease;
        }

        .back-button:hover {
            background: #f3f4f6;
        }

        .back-button svg {
            width: 17px;
            height: 17px;
        }


        /* =========================================================
           TARJETA DEL FORMULARIO
        ========================================================== */

        .record-form-section {
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 10px;
            overflow: hidden;
        }


        /* =========================================================
           HEADER DEL FORMULARIO
        ========================================================== */

        .form-header {
            padding: 18px 22px;
            border-bottom: 1px solid #e5e7eb;
            background: #ffffff;
        }

        .form-header-title {
            font-size: 16px;
            font-weight: 600;
            color: #1f2937;
        }

        .form-header-subtitle {
            margin-top: 4px;
            font-size: 13px;
            color: #6b7280;
        }


        /* =========================================================
           ERRORES
        ========================================================== */

        .error-box {
            margin: 20px 22px 0;
            padding: 12px 14px;

            background: #fef2f2;
            border: 1px solid #fecaca;
            border-radius: 7px;

            color: #991b1b;
            font-size: 13px;
        }

        .error-box strong {
            font-weight: 600;
        }

        .error-box ul {
            margin: 7px 0 0 18px;
        }


        /* =========================================================
           CUERPO
        ========================================================== */

        .form-body {
            padding: 22px;
        }


        /* =========================================================
           SECCIÓN
        ========================================================== */

        .form-section-title {
            margin-bottom: 14px;

            font-size: 13px;
            font-weight: 700;
            color: #374151;

            text-transform: uppercase;
            letter-spacing: .04em;
        }


        /* =========================================================
           GRID
        ========================================================== */

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 16px;
        }

        .form-group {
            min-width: 0;
        }

        .form-group.full {
            grid-column: 1 / -1;
        }


        /* =========================================================
           LABEL
        ========================================================== */

        .form-label {
            display: block;
            margin-bottom: 6px;

            font-size: 12px;
            font-weight: 600;
            color: #374151;
        }

        .form-required {
            color: #dc2626;
        }


        /* =========================================================
           INPUTS
        ========================================================== */

        .form-input,
        .form-select {
            width: 100%;
            height: 40px;

            padding: 0 11px;

            border: 1px solid #d1d5db;
            border-radius: 7px;

            background: #ffffff;

            color: #1f2937;
            font-size: 13px;

            outline: none;

            transition:
                border-color .15s ease,
                box-shadow .15s ease;
        }

        .form-input:focus,
        .form-select:focus {
            border-color: #6b7280;

            box-shadow:
                0 0 0 2px rgba(107, 114, 128, .10);
        }


        /* =========================================================
           FOOTER
        ========================================================== */

        .form-footer {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            gap: 10px;

            padding: 16px 22px;

            border-top: 1px solid #e5e7eb;
            background: #fafafa;
        }


        /* =========================================================
           BOTÓN CANCELAR
        ========================================================== */

        .btn-cancel {
            display: inline-flex;
            align-items: center;
            justify-content: center;

            height: 38px;
            padding: 0 15px;

            border: 1px solid #d1d5db;
            border-radius: 7px;

            background: #ffffff;
            color: #374151;

            font-size: 13px;
            font-weight: 500;

            text-decoration: none;

            transition: all .15s ease;
        }

        .btn-cancel:hover {
            background: #f3f4f6;
        }


        /* =========================================================
           BOTÓN GUARDAR
        ========================================================== */

        .btn-save {
            height: 38px;
            padding: 0 18px;

            border: none;
            border-radius: 7px;

            background: #111827;
            color: #ffffff;

            font-size: 13px;
            font-weight: 600;

            cursor: pointer;

            transition: background .15s ease;
        }

        .btn-save:hover {
            background: #1f2937;
        }


        /* =========================================================
           RESPONSIVE
        ========================================================== */

        @media (max-width: 700px) {

            .sfa-dashboard {
                padding: 20px 14px;
            }

            .dashboard-header {
                align-items: flex-start;
                gap: 15px;
            }

            .dashboard-title {
                font-size: 21px;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .form-group.full {
                grid-column: auto;
            }

            .form-footer {
                flex-direction: column-reverse;
                align-items: stretch;
            }

            .btn-cancel,
            .btn-save {
                width: 100%;
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
                        Editar compañía
                    </h1>

                    <p class="dashboard-subtitle">
                        Modifica la información de la compañía
                    </p>

                </div>


                <a
                    href="{{ route('companies.index') }}"
                    class="back-button"
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
                            d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18"
                        />

                    </svg>

                    Regresar

                </a>

            </div>


            {{-- =====================================================
                 FORMULARIO
            ====================================================== --}}

            <div class="record-form-section">


                <div class="form-header">

                    <div class="form-header-title">
                        Información de la compañía
                    </div>

                    <div class="form-header-subtitle">
                        Actualiza los datos necesarios.
                    </div>

                </div>


                {{-- =================================================
                     ERRORES
                ================================================== --}}

                @if($errors->any())

                    <div class="error-box">

                        <strong>
                            Corrige los siguientes errores:
                        </strong>

                        <ul>

                            @foreach($errors->all() as $error)

                                <li>
                                    {{ $error }}
                                </li>

                            @endforeach

                        </ul>

                    </div>

                @endif


                {{-- =================================================
                     FORM
                ================================================== --}}

                <form
                    method="POST"
                    action="{{ route('companies.update', $company) }}"
                >

                    @csrf

                    @method('PUT')


                    <div class="form-body">


                        <div class="form-section-title">
                            Datos de la compañía
                        </div>


                        <div class="form-grid">


                            {{-- =================================================
                                 NOMBRE
                            ================================================== --}}

                            <div class="form-group full">

                                <label class="form-label">

                                    Nombre de la compañía

                                    <span class="form-required">
                                        *
                                    </span>

                                </label>

                                <input
                                    type="text"
                                    name="name"
                                    class="form-input"
                                    value="{{ old('name', $company->name) }}"
                                    placeholder="Nombre de la compañía"
                                    autocomplete="off"
                                    required
                                >

                            </div>


                            {{-- =================================================
                                 CÓDIGO
                            ================================================== --}}

                            <div class="form-group">

                                <label class="form-label">
                                    Código
                                </label>

                                <input
                                    type="text"
                                    name="code"
                                    class="form-input"
                                    value="{{ old('code', $company->code) }}"
                                    placeholder="Código"
                                >

                            </div>


                            {{-- =================================================
                                 TAX ID
                            ================================================== --}}

                            <div class="form-group">

                                <label class="form-label">
                                    Tax ID
                                </label>

                                <input
                                    type="text"
                                    name="tax_id"
                                    class="form-input"
                                    value="{{ old('tax_id', $company->tax_id) }}"
                                    placeholder="Tax ID"
                                >

                            </div>


                            {{-- =================================================
                                 ESTADO
                            ================================================== --}}

                            <div class="form-group">

                                <label class="form-label">
                                    Estado
                                </label>

                                <select
                                    name="active"
                                    class="form-select"
                                    required
                                >

                                    <option
                                        value="1"
                                        {{ $company->active ? 'selected' : '' }}
                                    >
                                        Activa
                                    </option>

                                    <option
                                        value="0"
                                        {{ !$company->active ? 'selected' : '' }}
                                    >
                                        Inactiva
                                    </option>

                                </select>

                            </div>


                        </div>

                    </div>


                    {{-- =================================================
                         FOOTER
                    ================================================== --}}

                    <div class="form-footer">


                        <a
                            href="{{ route('companies.index') }}"
                            class="btn-cancel"
                        >
                            Cancelar
                        </a>


                        <button
                            type="submit"
                            class="btn-save"
                        >
                            Guardar cambios
                        </button>


                    </div>


                </form>

            </div>

        </div>

    </div>

</x-app-layout>