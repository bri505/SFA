<x-app-layout>

    <style>

        .companies-page {
            padding: 30px 20px;
            background: #f8fafc;
            min-height: calc(100vh - 64px);
        }

        .companies-container {
            max-width: 1200px;
            margin: 0 auto;
        }

        /* =====================================================
           HEADER
        ====================================================== */

        .companies-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 22px;
        }

        .companies-title {
            font-size: 24px;
            font-weight: 700;
            color: #1f2937;
        }

        .companies-subtitle {
            margin-top: 4px;
            font-size: 13px;
            color: #6b7280;
        }

        /* =====================================================
           BOTÓN
        ====================================================== */

        .btn-primary {
            display: inline-flex;
            align-items: center;
            gap: 7px;

            height: 38px;
            padding: 0 15px;

            background: #111827;
            color: white;

            border: none;
            border-radius: 7px;

            font-size: 13px;
            font-weight: 600;

            cursor: pointer;
        }

        .btn-primary:hover {
            background: #1f2937;
        }

        /* =====================================================
           MENSAJE
        ====================================================== */

        .success-box {
            margin-bottom: 18px;
            padding: 11px 14px;

            background: #ecfdf5;
            border: 1px solid #a7f3d0;

            color: #065f46;

            border-radius: 7px;

            font-size: 13px;
        }

        /* =====================================================
           CARD
        ====================================================== */

        .companies-card {
            background: white;

            border: 1px solid #e5e7eb;
            border-radius: 10px;

            overflow: hidden;
        }

        /* =====================================================
           TABLA
        ====================================================== */

        .companies-table {
            width: 100%;
            border-collapse: collapse;
        }

        .companies-table th {
            padding: 12px 15px;

            background: #f9fafb;

            border-bottom: 1px solid #e5e7eb;

            color: #6b7280;

            font-size: 11px;
            font-weight: 700;

            text-align: left;
            text-transform: uppercase;
        }

        .companies-table td {
            padding: 13px 15px;

            border-bottom: 1px solid #f1f5f9;

            color: #374151;

            font-size: 13px;
        }

        .companies-table tr:last-child td {
            border-bottom: none;
        }

        .companies-table tbody tr:hover {
            background: #fafafa;
        }

        .company-name {
            font-weight: 600;
            color: #111827;
        }

        /* =====================================================
           CORREOS EN TABLA
        ====================================================== */

        .company-emails {
            display: flex;
            flex-direction: column;
            gap: 3px;
        }

        .company-email {
            color: #374151;
            white-space: nowrap;
        }

        .company-email-more {
            color: #6b7280;
            font-size: 11px;
        }

        /* =====================================================
           ESTADO
        ====================================================== */

        .status {
            display: inline-flex;

            padding: 4px 8px;

            border-radius: 999px;

            font-size: 11px;
            font-weight: 600;
        }

        .status-active {
            background: #ecfdf5;
            color: #047857;
        }

        .status-inactive {
            background: #fef2f2;
            color: #b91c1c;
        }

        /* =====================================================
           EDITAR
        ====================================================== */

        .btn-edit {
            border: none;
            background: transparent;

            color: #374151;

            font-size: 12px;
            font-weight: 600;

            cursor: pointer;
        }

        .btn-edit:hover {
            text-decoration: underline;
        }

        /* =====================================================
           EMPTY
        ====================================================== */

        .empty {
            text-align: center;
            padding: 45px 20px;

            color: #9ca3af;

            font-size: 13px;
        }

        /* =====================================================
           MODAL
        ====================================================== */

        .company-modal {
            position: fixed;

            inset: 0;

            z-index: 9999;

            display: none;

            align-items: center;
            justify-content: center;

            background: rgba(15, 23, 42, .45);

            padding: 20px;
        }

        .company-modal.show {
            display: flex;
        }

        .company-modal-box {
            width: 100%;
            max-width: 700px;

            max-height: 90vh;

            overflow-y: auto;

            background: white;

            border-radius: 10px;

            box-shadow: 0 20px 40px rgba(0,0,0,.15);
        }

        /* =====================================================
           MODAL HEADER
        ====================================================== */

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;

            padding: 18px 20px;

            border-bottom: 1px solid #e5e7eb;
        }

        .modal-title {
            font-size: 16px;
            font-weight: 700;
            color: #111827;
        }

        .modal-close {
            border: none;
            background: transparent;

            font-size: 22px;

            color: #6b7280;

            cursor: pointer;
        }

        /* =====================================================
           MODAL BODY
        ====================================================== */

        .modal-body {
            padding: 20px;
        }

        .form-grid {
            display: grid;

            grid-template-columns:
                repeat(2, minmax(0, 1fr));

            gap: 15px;
        }

        .form-group {
            min-width: 0;
        }

        .form-group.full {
            grid-column: 1 / -1;
        }

        .form-label {
            display: block;

            margin-bottom: 6px;

            font-size: 12px;
            font-weight: 600;

            color: #374151;
        }

        .required {
            color: #dc2626;
        }

        .form-input,
        .form-select {
            width: 100%;

            height: 39px;

            padding: 0 10px;

            border: 1px solid #d1d5db;

            border-radius: 7px;

            font-size: 13px;

            outline: none;

            background: white;
        }

        .form-input:focus,
        .form-select:focus {
            border-color: #6b7280;

            box-shadow:
                0 0 0 2px rgba(107,114,128,.10);
        }

        .form-input:disabled,
        .form-select:disabled {
            background: #f3f4f6;
            color: #6b7280;
            cursor: not-allowed;
        }

        /* =====================================================
           CORREOS MÚLTIPLES
        ====================================================== */

        .emails-container {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .email-row {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .email-row .form-input {
            flex: 1;
        }

        .btn-remove-email {
            flex-shrink: 0;

            width: 39px;
            height: 39px;

            border: 1px solid #d1d5db;
            border-radius: 7px;

            background: white;
            color: #6b7280;

            font-size: 18px;
            line-height: 1;

            cursor: pointer;
        }

        .btn-remove-email:hover {
            background: #fef2f2;
            border-color: #fecaca;
            color: #b91c1c;
        }

        .btn-add-email {
            align-self: flex-start;

            margin-top: 3px;

            border: none;
            background: transparent;

            color: #374151;

            font-size: 12px;
            font-weight: 600;

            cursor: pointer;

            padding: 3px 0;
        }

        .btn-add-email:hover {
            text-decoration: underline;
        }

        .email-help {
            margin-top: 5px;

            font-size: 11px;

            color: #9ca3af;
        }

        /* =====================================================
           AYUDA CP
        ====================================================== */

        .postal-help {
            margin-top: 5px;

            font-size: 11px;

            color: #6b7280;

            display: none;
        }

        .postal-help.show {
            display: block;
        }

        .postal-loading {
            color: #6b7280;
        }

        .postal-success {
            color: #047857;
        }

        .postal-error {
            color: #b91c1c;
        }

        /* =====================================================
           MODAL FOOTER
        ====================================================== */

        .modal-footer {
            display: flex;

            justify-content: flex-end;

            gap: 9px;

            padding: 15px 20px;

            border-top: 1px solid #e5e7eb;

            background: #fafafa;
        }

        .btn-cancel {
            height: 37px;

            padding: 0 15px;

            border: 1px solid #d1d5db;

            border-radius: 7px;

            background: white;

            color: #374151;

            cursor: pointer;
        }

        .btn-save {
            height: 37px;

            padding: 0 17px;

            border: none;

            border-radius: 7px;

            background: #111827;

            color: white;

            font-size: 13px;

            font-weight: 600;

            cursor: pointer;
        }

        .btn-save:hover {
            background: #1f2937;
        }

        /* =====================================================
           RESPONSIVE
        ====================================================== */

        @media(max-width:700px) {

            .companies-header {
                align-items: flex-start;

                gap: 15px;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .form-group.full {
                grid-column: auto;
            }

            .companies-table {
                min-width: 900px;
            }

            .companies-card {
                overflow-x: auto;
            }

        }

    </style>


    <div class="companies-page">

        <div class="companies-container">


            {{-- =================================================
                 HEADER
            ================================================== --}}

            <div class="companies-header">

                <div>

                    <h1 class="companies-title">
                        {{ __('companies.title') }}
                    </h1>

                    <p class="companies-subtitle">
                        {{ __('companies.subtitle') }}
                    </p>

                </div>


                <button
                    type="button"
                    class="btn-primary"
                    id="openCompanyModal"
                >
                    + {{ __('companies.new_company') }}
                </button>

            </div>


            {{-- =================================================
                 MENSAJE
            ================================================== --}}

            @if(session('success'))

                <div class="success-box">
                    {{ session('success') }}
                </div>

            @endif


            {{-- =================================================
                 TABLA
            ================================================== --}}

            <div class="companies-card">

                <table class="companies-table">

                    <thead>

                        <tr>

                            <th>
                                {{ __('companies.table.name') }}
                            </th>

                            <th>
                                {{ __('companies.table.city') }}
                            </th>

                            <th>
                                {{ __('companies.table.state') }}
                            </th>

                            <th>
                                {{ __('companies.table.phone') }}
                            </th>

                            <th>
                                {{ __('companies.table.contact') }}
                            </th>

                            <th>
                                {{ __('companies.table.email') }}
                            </th>

                            <th>
                                {{ __('companies.table.status') }}
                            </th>

                            <th>
                                {{ __('companies.table.action') }}
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @forelse($companies as $company)

                            <tr>

                                <td>

                                    <div class="company-name">
                                        {{ $company->name }}
                                    </div>

                                </td>

                                <td>
                                    {{ $company->city ?? '-' }}
                                </td>

                                <td>
                                    {{ $company->state ?? '-' }}
                                </td>

                                <td>
                                    {{ $company->phone ?? '-' }}
                                </td>

                                <td>
                                    {{ $company->contact ?? '-' }}
                                </td>

                                <td>

                                    @if($company->emails->count())

                                        <div class="company-emails">

                                            @foreach($company->emails->take(2) as $email)

                                                <div class="company-email">
                                                    {{ $email->email }}
                                                </div>

                                            @endforeach


                                            @if($company->emails->count() > 2)

                                                <div class="company-email-more">

                                                    +{{ $company->emails->count() - 2 }}
                                                    {{ __('companies.more_emails') }}

                                                </div>

                                            @endif

                                        </div>

                                    @else

                                        -

                                    @endif

                                </td>

                                <td>

                                    @if($company->active)

                                        <span class="status status-active">
                                            {{ __('companies.active') }}
                                        </span>

                                    @else

                                        <span class="status status-inactive">
                                            {{ __('companies.inactive') }}
                                        </span>

                                    @endif

                                </td>

                                <td>

                                    <button
                                        type="button"
                                        class="btn-edit edit-company"

                                        data-id="{{ $company->id }}"
                                        data-name="{{ $company->name }}"
                                        data-code="{{ $company->code }}"

                                        data-address="{{ $company->address }}"
                                        data-city="{{ $company->city }}"
                                        data-state="{{ $company->state }}"
                                        data-postal-code="{{ $company->postal_code }}"
                                        data-colony="{{ $company->colony }}"

                                        data-phone="{{ $company->phone }}"
                                        data-contact="{{ $company->contact }}"

                                        data-emails='@json(
                                            $company->emails
                                                ->pluck('email')
                                                ->values()
                                        )'

                                        data-active="{{ $company->active }}"
                                    >
                                        {{ __('companies.edit_company') }}
                                    </button>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td
                                    colspan="8"
                                    class="empty"
                                >
                                    {{ __('companies.no_companies') }}
                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>


    {{-- =========================================================
         MODAL
    ========================================================== --}}

    <div
        id="companyModal"
        class="company-modal"
    >

        <div class="company-modal-box">


            {{-- =================================================
                 HEADER
            ================================================== --}}

            <div class="modal-header">

                <div
                    id="modalTitle"
                    class="modal-title"
                >
                    {{ __('companies.new_company') }}
                </div>

                <button
                    type="button"
                    class="modal-close"
                    id="closeCompanyModal"
                >
                    ×
                </button>

            </div>


            {{-- =================================================
                 FORM
            ================================================== --}}

            <form
                id="companyForm"
                method="POST"
                action="{{ route('companies.store') }}"
            >

                @csrf

                <input
                    type="hidden"
                    name="_method"
                    id="formMethod"
                    value="POST"
                >


                <div class="modal-body">

                    <div class="form-grid">


                        {{-- =====================================
                             NOMBRE
                        ====================================== --}}

                        <div class="form-group full">

                            <label class="form-label">

                                {{ __('companies.name') }}

                                <span class="required">
                                    *
                                </span>

                            </label>

                            <input
                                type="text"
                                name="name"
                                id="companyName"
                                class="form-input"
                                required
                            >

                        </div>


                        {{-- =====================================
                             DIRECCIÓN
                        ====================================== --}}

                        <div class="form-group full">

                            <label class="form-label">
                                {{ __('companies.address') }}
                            </label>

                            <input
                                type="text"
                                name="address"
                                id="companyAddress"
                                class="form-input"
                                placeholder="{{ __('companies.address_placeholder') }}"
                            >

                        </div>


                        {{-- =====================================
                             CÓDIGO POSTAL
                        ====================================== --}}

                        <div class="form-group">

                            <label class="form-label">
                                {{ __('companies.postal_code') }}
                            </label>

                            <input
                                type="text"
                                name="postal_code"
                                id="companyPostalCode"
                                class="form-input"

                                inputmode="numeric"
                                maxlength="5"

                                placeholder="{{ __('companies.postal_code_placeholder') }}"

                                autocomplete="postal-code"
                            >

                            <div
                                id="postalHelp"
                                class="postal-help"
                            ></div>

                        </div>


                        {{-- =====================================
                             COLONIA
                        ====================================== --}}

                        <div class="form-group">

    <label class="form-label">
        {{ __('companies.colony') }}
    </label>

    <select
        id="companyColony"
        class="form-select"
        disabled
    >

        <option value="">
            {{ __('companies.enter_postal_code_first') }}
        </option>

    </select>

    <input
        type="text"
        name="colony"
        id="companyColonyManual"
        class="form-input"
        placeholder="Escribe la colonia"
        style="display:none; margin-top:8px;"
    >

</div>


                        {{-- =====================================
                             CIUDAD
                        ====================================== --}}

                        <div class="form-group">

                            <label class="form-label">
                                {{ __('companies.city_municipality') }}
                            </label>

                            <input
                                type="text"
                                name="city"
                                id="companyCity"
                                class="form-input"
                            >

                        </div>


                        {{-- =====================================
                             ESTADO
                        ====================================== --}}

                        <div class="form-group">

                            <label class="form-label">
                                {{ __('companies.state') }}
                            </label>

                            <input
                                type="text"
                                name="state"
                                id="companyState"
                                class="form-input"
                            >

                        </div>


                        {{-- =====================================
                             TELÉFONO
                        ====================================== --}}

                        <div class="form-group">

                            <label class="form-label">
                                {{ __('companies.phone') }}
                            </label>

                            <input
                                type="text"
                                name="phone"
                                id="companyPhone"
                                class="form-input"
                            >

                        </div>


                        {{-- =====================================
                             CONTACTO
                        ====================================== --}}

                        <div class="form-group">

                            <label class="form-label">
                                {{ __('companies.contact') }}
                            </label>

                            <input
                                type="text"
                                name="contact"
                                id="companyContact"
                                class="form-input"
                            >

                        </div>


                        {{-- =====================================
                             CORREOS
                        ====================================== --}}

                        <div class="form-group full">

                            <label class="form-label">
                                {{ __('companies.email') }}
                            </label>


                            <div
                                id="emailsContainer"
                                class="emails-container"
                            >

                            </div>


                            <button
                                type="button"
                                id="addEmailButton"
                                class="btn-add-email"
                            >
                                + {{ __('companies.add_email') }}
                            </button>


                            <div class="email-help">
                                {{ __('companies.email_help') }}
                            </div>

                        </div>


                        {{-- =====================================
                             CÓDIGO INTERNO
                        ====================================== --}}

                        <div class="form-group">

                            <label class="form-label">
                                {{ __('companies.code') }}
                            </label>

                            <input
                                type="text"
                                name="code"
                                id="companyCode"
                                class="form-input"
                            >

                        </div>


                        {{-- =====================================
                             ACTIVO
                        ====================================== --}}

                        <div
                            class="form-group"
                            id="activeGroup"
                        >

                            <label class="form-label">
                                {{ __('companies.status') }}
                            </label>

                            <select
                                name="active"
                                id="companyActive"
                                class="form-select"
                            >

                                <option value="1">
                                    {{ __('companies.active') }}
                                </option>

                                <option value="0">
                                    {{ __('companies.inactive') }}
                                </option>

                            </select>

                        </div>


                    </div>

                </div>


                {{-- =================================================
                     FOOTER
                ================================================== --}}

                <div class="modal-footer">

                    <button
                        type="button"
                        class="btn-cancel"
                        id="cancelCompanyModal"
                    >
                        {{ __('companies.cancel') }}
                    </button>

                    <button
                        type="submit"
                        class="btn-save"
                    >
                        {{ __('companies.save_company') }}
                    </button>

                </div>

            </form>

        </div>

    </div>


    ```html
<script>

    document.addEventListener(
        'DOMContentLoaded',
        function () {

            /* =================================================
               ELEMENTOS
            ================================================== */

            const modal =
                document.getElementById(
                    'companyModal'
                );

            const openButton =
                document.getElementById(
                    'openCompanyModal'
                );

            const closeButton =
                document.getElementById(
                    'closeCompanyModal'
                );

            const cancelButton =
                document.getElementById(
                    'cancelCompanyModal'
                );

            const form =
                document.getElementById(
                    'companyForm'
                );

            const modalTitle =
                document.getElementById(
                    'modalTitle'
                );

            const formMethod =
                document.getElementById(
                    'formMethod'
                );

            const postalCode =
                document.getElementById(
                    'companyPostalCode'
                );

            const colony =
                document.getElementById(
                    'companyColony'
                );

            const colonyManual =
                document.getElementById(
                    'companyColonyManual'
                );

            const city =
                document.getElementById(
                    'companyCity'
                );

            const state =
                document.getElementById(
                    'companyState'
                );

            const postalHelp =
                document.getElementById(
                    'postalHelp'
                );

            const activeGroup =
                document.getElementById(
                    'activeGroup'
                );

            const emailsContainer =
                document.getElementById(
                    'emailsContainer'
                );

            const addEmailButton =
                document.getElementById(
                    'addEmailButton'
                );


            /* =================================================
               CONTROL DE MODAL
            ================================================== */

            function openModal() {

                modal.classList.add('show');

                document.body.style.overflow =
                    'hidden';

            }


            function closeModal() {

                modal.classList.remove('show');

                document.body.style.overflow =
                    '';

            }


            /* =================================================
               MENSAJE DEL CP
            ================================================== */

            function showPostalMessage(
                message,
                type = ''
            ) {

                postalHelp.textContent =
                    message;

                postalHelp.className =
                    'postal-help show ' + type;

            }


            function hidePostalMessage() {

                postalHelp.textContent =
                    '';

                postalHelp.className =
                    'postal-help';

            }


            /* =================================================
               COLONIA MANUAL
            ================================================== */

            function showManualColony(
                value = ''
            ) {

                colonyManual.style.display =
                    'block';

                colonyManual.value =
                    value;

                colony.disabled =
                    true;

            }


            function hideManualColony() {

                colonyManual.style.display =
                    'none';

                colonyManual.value =
                    '';

            }


            /* =================================================
               LIMPIAR COLONIAS
            ================================================== */

            function resetColonies(
                placeholder =
                    @json(__('companies.enter_postal_code_first'))
            ) {

                hideManualColony();

                colony.innerHTML = '';

                const option =
                    document.createElement(
                        'option'
                    );

                option.value =
                    '';

                option.textContent =
                    placeholder;

                colony.appendChild(
                    option
                );

                colony.disabled =
                    true;

            }


            /* =================================================
               CORREOS
            ================================================== */

            function addEmailRow(
                value = ''
            ) {

                const row =
                    document.createElement(
                        'div'
                    );

                row.className =
                    'email-row';


                const input =
                    document.createElement(
                        'input'
                    );

                input.type =
                    'email';

                input.name =
                    'emails[]';

                input.className =
                    'form-input';

                input.placeholder =
                    @json(__('companies.email_placeholder'));

                input.value =
                    value;


                const removeButton =
                    document.createElement(
                        'button'
                    );

                removeButton.type =
                    'button';

                removeButton.className =
                    'btn-remove-email';

                removeButton.innerHTML =
                    '×';

                removeButton.title =
                    @json(__('companies.remove_email'));


                removeButton.addEventListener(
                    'click',
                    function () {

                        row.remove();

                        if (
                            emailsContainer
                                .querySelectorAll(
                                    '.email-row'
                                )
                                .length === 0
                        ) {

                            addEmailRow();

                        }

                    }
                );


                row.appendChild(
                    input
                );

                row.appendChild(
                    removeButton
                );

                emailsContainer.appendChild(
                    row
                );

            }


            function resetEmails() {

                emailsContainer.innerHTML =
                    '';

                addEmailRow();

            }


            function loadEmails(
                emails
            ) {

                emailsContainer.innerHTML =
                    '';


                if (
                    !Array.isArray(emails) ||
                    emails.length === 0
                ) {

                    addEmailRow();

                    return;

                }


                emails.forEach(
                    function (email) {

                        addEmailRow(
                            email
                        );

                    }
                );

            }


            addEmailButton.addEventListener(
                'click',
                function () {

                    addEmailRow();

                }
            );


            /* =================================================
               BUSCAR CÓDIGO POSTAL
            ================================================== */

            let postalTimer =
                null;


            async function searchPostalCode() {

                const cp =
                    postalCode.value
                        .replace(/\D/g, '')
                        .substring(0, 5);

                postalCode.value =
                    cp;


                if (cp.length === 0) {

                    resetColonies();

                    hidePostalMessage();

                    return;

                }


                if (cp.length < 5) {

                    resetColonies(
                        @json(__('companies.enter_five_digits'))
                    );

                    showPostalMessage(
                        @json(__('companies.missing_digits')),
                        'postal-loading'
                    );

                    return;

                }


                showPostalMessage(
                    @json(__('companies.searching_postal_code')),
                    'postal-loading'
                );


                resetColonies(
                    @json(__('companies.searching_colonies'))
                );


                try {

                    const response =
                        await fetch(
                            'https://postali.app/api/v1/mx/cp/' +
                            encodeURIComponent(cp)
                        );


                    if (!response.ok) {

                        throw new Error(
                            @json(__('companies.postal_code_not_found'))
                        );

                    }


                    const data =
                        await response.json();


                    /* ==============================
                       ESTADO
                    =============================== */

                    if (data.estado) {

                        state.value =
                            data.estado;

                    }


                    /* ==============================
                       CIUDAD / MUNICIPIO
                    =============================== */

                    if (data.municipio) {

                        city.value =
                            data.municipio;

                    }
                    else if (data.ciudad) {

                        city.value =
                            data.ciudad;

                    }


                    /* ==============================
                       COLONIAS
                    =============================== */

                    const settlements =
                        Array.isArray(
                            data.asentamientos
                        )
                            ? data.asentamientos
                            : [];


                    /*
                     * SI NO HAY COLONIAS
                     * PERMITIMOS ESCRIBIR MANUALMENTE
                     */

                    if (
                        settlements.length === 0
                    ) {

                        resetColonies(
                            @json(__('companies.no_colonies_found'))
                        );

                        showManualColony();

                        showPostalMessage(
                            'No encontramos colonias para este código postal. Puedes escribirla manualmente.',
                            'postal-error'
                        );

                        return;

                    }


                    /*
                     * LIMPIAR SELECT
                     */

                    colony.innerHTML =
                        '';


                    hideManualColony();


                    /*
                     * OPCIÓN POR DEFECTO
                     */

                    const defaultOption =
                        document.createElement(
                            'option'
                        );

                    defaultOption.value =
                        '';

                    defaultOption.textContent =
                        @json(__('companies.select_colony'));

                    colony.appendChild(
                        defaultOption
                    );


                    /*
                     * AGREGAR COLONIAS
                     */

                    settlements.forEach(
                        function (item) {

                            const option =
                                document.createElement(
                                    'option'
                                );


                            const colonyName =
                                item.nombre ||
                                item.asentamiento ||
                                '';


                            const colonyType =
                                item.tipo ||
                                item.tipo_asentamiento ||
                                '';


                            option.value =
                                colonyName;


                            option.textContent =
                                colonyType
                                    ? colonyName +
                                      ' (' +
                                      colonyType +
                                      ')'
                                    : colonyName;


                            colony.appendChild(
                                option
                            );

                        }
                    );


                    /*
                     * OPCIÓN PARA COLONIA MANUAL
                     */

                    const manualOption =
                        document.createElement(
                            'option'
                        );

                    manualOption.value =
                        '__MANUAL__';

                    manualOption.textContent =
                        '+ Escribir otra colonia...';

                    colony.appendChild(
                        manualOption
                    );


                    colony.disabled =
                        false;


                    /*
                     * SI SOLO HAY UNA COLONIA
                     */

                    if (
                        settlements.length === 1
                    ) {

                        colony.value =
                            settlements[0].nombre ||
                            settlements[0].asentamiento ||
                            '';

                    }


                    showPostalMessage(
                        settlements.length === 1
                            ? @json(__('companies.postal_code_found'))
                            : settlements.length +
                              ' ' +
                              @json(__('companies.colonies_found')),
                        'postal-success'
                    );

                }
                catch (error) {

                    console.error(
                        'Error consulting postal code:',
                        error
                    );


                    /*
                     * SI LA API FALLA TAMBIÉN
                     * PERMITIMOS COLONIA MANUAL
                     */

                    resetColonies(
                        @json(__('companies.no_colonies_found'))
                    );

                    showManualColony();

                    showPostalMessage(
                        'No pudimos consultar las colonias. Puedes escribirla manualmente.',
                        'postal-error'
                    );

                }

            }


            /* =================================================
               CAMBIAR COLONIA
            ================================================== */

            colony.addEventListener(
                'change',
                function () {

                    if (
                        this.value === '__MANUAL__'
                    ) {

                        showManualColony();

                        colonyManual.focus();

                        return;

                    }


                    hideManualColony();

                }
            );


            /* =================================================
               EVENTO CÓDIGO POSTAL
            ================================================== */

            postalCode.addEventListener(
                'input',
                function () {

                    clearTimeout(
                        postalTimer
                    );


                    postalTimer =
                        setTimeout(
                            searchPostalCode,
                            350
                        );

                }
            );


            postalCode.addEventListener(
                'blur',
                function () {

                    if (
                        postalCode.value.length === 5
                    ) {

                        searchPostalCode();

                    }

                }
            );


            /* =================================================
               NUEVA COMPAÑÍA
            ================================================== */

            openButton.addEventListener(
                'click',
                function () {

                    form.reset();


                    form.action =
                        "{{ route('companies.store') }}";


                    formMethod.value =
                        'POST';


                    modalTitle.textContent =
                        @json(__('companies.new_company'));


                    activeGroup.style.display =
                        'none';


                    resetColonies();

                    resetEmails();

                    hidePostalMessage();


                    openModal();

                }
            );


            /* =================================================
               EDITAR COMPAÑÍA
            ================================================== */

            document
                .querySelectorAll('.edit-company')
                .forEach(
                    function (button) {

                        button.addEventListener(
                            'click',
                            async function () {

                                const id =
                                    this.dataset.id;


                                form.action =
                                    '/companies/' +
                                    id;


                                formMethod.value =
                                    'PUT';


                                modalTitle.textContent =
                                    @json(__('companies.edit_company'));


                                document
                                    .getElementById(
                                        'companyName'
                                    )
                                    .value =
                                    this.dataset.name ||
                                    '';


                                document
                                    .getElementById(
                                        'companyCode'
                                    )
                                    .value =
                                    this.dataset.code ||
                                    '';


                                document
                                    .getElementById(
                                        'companyAddress'
                                    )
                                    .value =
                                    this.dataset.address ||
                                    '';


                                document
                                    .getElementById(
                                        'companyCity'
                                    )
                                    .value =
                                    this.dataset.city ||
                                    '';


                                document
                                    .getElementById(
                                        'companyState'
                                    )
                                    .value =
                                    this.dataset.state ||
                                    '';


                                document
                                    .getElementById(
                                        'companyPostalCode'
                                    )
                                    .value =
                                    this.dataset.postalCode ||
                                    '';


                                document
                                    .getElementById(
                                        'companyPhone'
                                    )
                                    .value =
                                    this.dataset.phone ||
                                    '';


                                document
                                    .getElementById(
                                        'companyContact'
                                    )
                                    .value =
                                    this.dataset.contact ||
                                    '';


                                document
                                    .getElementById(
                                        'companyActive'
                                    )
                                    .value =
                                    this.dataset.active ||
                                    '1';


                                /* ==============================
                                   CARGAR CORREOS
                                =============================== */

                                let companyEmails =
                                    [];


                                try {

                                    companyEmails =
                                        JSON.parse(
                                            this.dataset.emails ||
                                            '[]'
                                        );

                                }
                                catch (error) {

                                    console.error(
                                        'Error loading company emails:',
                                        error
                                    );

                                    companyEmails =
                                        [];

                                }


                                loadEmails(
                                    companyEmails
                                );


                                /* ==============================
                                   COLONIA GUARDADA
                                =============================== */

                                const savedColony =
                                    this.dataset.colony ||
                                    '';


                                resetColonies(
                                    @json(__('companies.searching_colonies'))
                                );


                                openModal();


                                /*
                                 * SI TIENE CP,
                                 * CONSULTAMOS LA API
                                 */

                                if (
                                    this.dataset.postalCode &&
                                    this.dataset.postalCode.length === 5
                                ) {

                                    await searchPostalCode();


                                    if (
                                        savedColony
                                    ) {

                                        /*
                                         * BUSCAR SI LA COLONIA
                                         * EXISTE EN EL SELECT
                                         */

                                        const colonyExists =
                                            Array.from(
                                                colony.options
                                            ).some(
                                                function (
                                                    option
                                                ) {

                                                    return (
                                                        option.value ===
                                                        savedColony
                                                    );

                                                }
                                            );


                                        if (
                                            colonyExists
                                        ) {

                                            colony.value =
                                                savedColony;

                                            hideManualColony();

                                        }
                                        else {

                                            /*
                                             * LA COLONIA GUARDADA
                                             * NO EXISTE EN LA API.
                                             *
                                             * LA MOSTRAMOS COMO
                                             * COLONIA MANUAL.
                                             */

                                            showManualColony(
                                                savedColony
                                            );

                                        }

                                    }

                                }
                                else {

                                    /*
                                     * NO HAY CP.
                                     * SI HAY COLONIA GUARDADA,
                                     * LA MOSTRAMOS MANUALMENTE.
                                     */

                                    resetColonies();

                                    if (
                                        savedColony
                                    ) {

                                        showManualColony(
                                            savedColony
                                        );

                                    }

                                }


                                activeGroup.style.display =
                                    'block';

                            }
                        );

                    }
                );


            /* =================================================
               SINCRONIZAR COLONIA ANTES DE GUARDAR
            ================================================== */

            form.addEventListener(
                'submit',
                function () {

                    /*
                     * SI SE SELECCIONÓ UNA COLONIA
                     * DE LA LISTA, LA COPIAMOS AL
                     * INPUT QUE SE ENVÍA AL BACKEND.
                     */

                    if (
                        colony.value &&
                        colony.value !== '__MANUAL__'
                    ) {

                        colonyManual.value =
                            colony.value;

                    }

                }
            );


            /* =================================================
               CERRAR MODAL
            ================================================== */

            closeButton.addEventListener(
                'click',
                closeModal
            );


            cancelButton.addEventListener(
                'click',
                closeModal
            );


            /* =================================================
               CERRAR HACIENDO CLICK AFUERA
            ================================================== */

            modal.addEventListener(
                'click',
                function (event) {

                    if (
                        event.target === modal
                    ) {

                        closeModal();

                    }

                }
            );


            /* =================================================
               ESC
            ================================================== */

            document.addEventListener(
                'keydown',
                function (event) {

                    if (
                        event.key === 'Escape'
                    ) {

                        closeModal();

                    }

                }
            );

        }
    );

</script>
```


</x-app-layout>