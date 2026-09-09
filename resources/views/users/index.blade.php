<x-app-layout>

    <style>
        /* =========================================================
           SFA USERS
        ========================================================= */

        .sfa-users {
            min-height: calc(100vh - 64px);
            background: #f5f6f8;
        }

        .sfa-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 24px 28px;
        }

        /* =========================
           HEADER
        ========================= */

        .users-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .users-title {
            margin: 0;
            font-size: 23px;
            font-weight: 600;
            color: #1f2937;
        }

        .users-subtitle {
            margin-top: 4px;
            font-size: 12px;
            color: #6b7280;
        }

        .new-user-button {
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
        }

        .new-user-button:hover {
            background: #111827;
        }

        .new-user-button svg {
            width: 15px;
            height: 15px;
        }

        /* =========================
           MENSAJES
        ========================= */

        .alert {
            margin-bottom: 15px;
            padding: 10px 12px;
            border-radius: 5px;
            font-size: 11px;
        }

        .alert-success {
            background: #ecfdf5;
            border: 1px solid #a7f3d0;
            color: #065f46;
        }

        .alert-error {
            background: #fef2f2;
            border: 1px solid #fecaca;
            color: #991b1b;
        }

        /* =========================
           TABLA
        ========================= */

        .users-section {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 7px;
            overflow: hidden;
        }

        .users-section-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 12px 16px;
            border-bottom: 1px solid #e5e7eb;
        }

        .users-section-title {
            font-size: 14px;
            font-weight: 600;
            color: #1f2937;
        }

        .users-count {
            font-size: 11px;
            color: #9ca3af;
        }

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
        }

        .users-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 12px;
        }

        .users-table th {
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

        .users-table td {
            padding: 10px 14px;
            border-bottom: 1px solid #f0f1f3;
            color: #374151;
            white-space: nowrap;
        }

        .users-table tbody tr:last-child td {
            border-bottom: none;
        }

        .users-table tbody tr:hover {
            background: #fafafa;
        }

        /* =========================
           ROL
        ========================= */

        .role {
            display: inline-flex;
            align-items: center;
            padding: 3px 8px;
            border-radius: 4px;
            font-size: 10px;
            font-weight: 600;
        }

        .role-admin {
            background: #f3f4f6;
            color: #374151;
        }

        .role-general {
            background: #f9fafb;
            color: #6b7280;
            border: 1px solid #e5e7eb;
        }

        /* =========================
           ACCIONES
        ========================= */

        .actions {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .btn-edit,
        .btn-delete {
            padding: 6px 9px;
            border-radius: 4px;
            font-size: 10px;
            font-weight: 500;
            cursor: pointer;
        }

        .btn-edit {
            border: 1px solid #d1d5db;
            background: white;
            color: #374151;
        }

        .btn-edit:hover {
            background: #f9fafb;
        }

        .btn-delete {
            border: 1px solid #fecaca;
            background: white;
            color: #b91c1c;
        }

        .btn-delete:hover {
            background: #fef2f2;
        }

        .current-user {
            font-size: 10px;
            color: #9ca3af;
        }

        /* =========================
           EMPTY
        ========================= */

        .empty-users {
            padding: 35px 20px;
            text-align: center;
            color: #9ca3af;
            font-size: 12px;
        }

        /* =========================
           MODAL
        ========================= */

        .user-modal {
            position: fixed;
            inset: 0;
            z-index: 9999;
            display: none;
            align-items: center;
            justify-content: center;
            padding: 20px;
            background: rgba(0, 0, 0, .45);
        }

        .user-modal.active {
            display: flex;
        }

        .user-modal-box {
            width: 100%;
            max-width: 600px;
            max-height: 92vh;
            overflow-y: auto;
            background: white;
            border-radius: 8px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, .20);
        }

        /* =========================
           MODAL HEADER
        ========================= */

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

        /* =========================
           MODAL BODY
        ========================= */

        .modal-body {
            padding: 18px 20px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 13px 16px;
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

        .required {
            color: #dc2626;
        }

        .form-input,
        .form-select {
            width: 100%;
            box-sizing: border-box;
            height: 34px;
            border: 1px solid #d1d5db;
            border-radius: 5px;
            padding: 7px 10px;
            background: white;
            color: #1f2937;
            font-size: 12px;
            outline: none;
        }

        .form-input:focus,
        .form-select:focus {
            border-color: #6b7280;
            box-shadow: 0 0 0 2px rgba(107, 114, 128, .10);
        }

        .password-help {
            margin-top: 4px;
            font-size: 10px;
            color: #9ca3af;
        }

        /* =========================
           MODAL FOOTER
        ========================= */

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

        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 700px) {

            .sfa-container {
                padding: 18px;
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

            .users-header {
                align-items: flex-start;
                gap: 10px;
            }

            .users-title {
                font-size: 20px;
            }

            .new-user-button {
                padding: 8px 10px;
            }

            .new-user-button span {
                display: none;
            }

            .user-modal {
                padding: 10px;
            }

            .user-modal-box {
                max-height: 95vh;
            }
        }
    </style>


    <div class="sfa-users">

        <div class="sfa-container">

            {{-- =====================================================
                 HEADER
            ====================================================== --}}

            <div class="users-header">

                <div>

                    <h1 class="users-title">
                        {{ __('users.title') }}
                    </h1>

                    <p class="users-subtitle">
                        {{ __('users.subtitle') }}
                    </p>

                </div>


                <button
                    type="button"
                    id="openUserModal"
                    class="new-user-button"
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
                        {{ __('users.new_user') }}
                    </span>

                </button>

            </div>


            {{-- =====================================================
                 MENSAJES
            ====================================================== --}}

            @if(session('success'))

                <div class="alert alert-success">
                    {{ session('success') }}
                </div>

            @endif


            @if(session('error'))

                <div class="alert alert-error">
                    {{ session('error') }}
                </div>

            @endif


            @if($errors->any())

                <div class="alert alert-error">

                    <strong>
                        {{ __('users.review_data') }}
                    </strong>

                    <ul style="margin: 5px 0 0 17px;">

                        @foreach($errors->all() as $error)

                            <li>
                                {{ $error }}
                            </li>

                        @endforeach

                    </ul>

                </div>

            @endif


            {{-- =====================================================
                 TABLA
            ====================================================== --}}

            <div class="users-section">

                <div class="users-section-header">

                    <div class="users-section-title">
                        {{ __('users.registered_users') }}
                    </div>

                    <div class="users-count">

                        {{ $users->count() }}

                        {{ $users->count() === 1
                            ? __('users.user')
                            : __('users.users')
                        }}

                    </div>

                </div>


                <div class="table-wrapper">

                    <table class="users-table">

                        <thead>

                            <tr>

                                <th>
                                    {{ __('users.name') }}
                                </th>

                                <th>
                                    {{ __('users.email') }}
                                </th>

                                <th>
                                    {{ __('users.role') }}
                                </th>

                                <th>
                                    {{ __('users.created') }}
                                </th>

                                <th>
                                    {{ __('users.actions') }}
                                </th>

                            </tr>

                        </thead>


                        <tbody>

                            @forelse($users as $user)

                                <tr>

                                    <td>
                                        {{ $user->name }}
                                    </td>

                                    <td>
                                        {{ $user->email }}
                                    </td>

                                    <td>

                                        @if($user->role === 'admin')

                                            <span class="role role-admin">
                                                {{ __('users.administrator') }}
                                            </span>

                                        @else

                                            <span class="role role-general">
                                                {{ __('users.general') }}
                                            </span>

                                        @endif

                                    </td>

                                    <td>
                                        {{ $user->created_at?->format(
                                            app()->getLocale() === 'en'
                                                ? 'm/d/Y'
                                                : 'd/m/Y'
                                        ) ?? '—' }}
                                    </td>

                                    <td>

                                        <div class="actions">

                                            <button
                                                type="button"
                                                class="btn-edit edit-user-button"
                                                data-id="{{ $user->id }}"
                                                data-name="{{ $user->name }}"
                                                data-email="{{ $user->email }}"
                                                data-role="{{ $user->role }}"
                                            >
                                                {{ __('users.edit') }}
                                            </button>


                                            @if($user->id !== auth()->id())

                                                <form
                                                    method="POST"
                                                    action="{{ route('users.destroy', $user) }}"
                                                    onsubmit="return confirm(@json(__('users.delete_confirm')));"
                                                >

                                                    @csrf
                                                    @method('DELETE')

                                                    <button
                                                        type="submit"
                                                        class="btn-delete"
                                                    >
                                                        {{ __('users.delete') }}
                                                    </button>

                                                </form>

                                            @else

                                                <span class="current-user">
                                                    {{ __('users.current_user') }}
                                                </span>

                                            @endif

                                        </div>

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="5">

                                        <div class="empty-users">
                                            {{ __('users.no_users') }}
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
         MODAL
    ============================================================== --}}

    <div
        id="userModal"
        class="user-modal"
    >

        <div
            class="user-modal-box"
            role="dialog"
            aria-modal="true"
        >

            <div class="modal-header">

                <div>

                    <div
                        id="modalTitle"
                        class="modal-title"
                    >
                        {{ __('users.modal.new_user') }}
                    </div>

                    <div class="modal-subtitle">
                        {{ __('users.modal.subtitle') }}
                    </div>

                </div>


                <button
                    type="button"
                    id="closeUserModal"
                    class="modal-close"
                >
                    &times;
                </button>

            </div>


            <form
                id="userForm"
                action="{{ route('users.store') }}"
                method="POST"
            >

                @csrf

                <div
                    id="methodContainer"
                ></div>


                <div class="modal-body">

                    <div class="form-grid">

                        {{-- NOMBRE --}}

                        <div class="form-group">

                            <label class="form-label">

                                {{ __('users.name') }}

                                <span class="required">*</span>

                            </label>

                            <input
                                type="text"
                                name="name"
                                id="userName"
                                class="form-input"
                                required
                            >

                        </div>


                        {{-- CORREO --}}

                        <div class="form-group">

                            <label class="form-label">

                                {{ __('users.email_address') }}

                                <span class="required">*</span>

                            </label>

                            <input
                                type="email"
                                name="email"
                                id="userEmail"
                                class="form-input"
                                required
                            >

                        </div>


                        {{-- ROL --}}

                        <div class="form-group">

                            <label class="form-label">

                                {{ __('users.role') }}

                                <span class="required">*</span>

                            </label>

                            <select
                                name="role"
                                id="userRole"
                                class="form-select"
                                required
                            >

                                <option value="general">
                                    {{ __('users.general') }}
                                </option>

                                <option value="admin">
                                    {{ __('users.administrator') }}
                                </option>

                            </select>

                        </div>


                        {{-- PASSWORD --}}

                        <div class="form-group">

                            <label class="form-label">

                                {{ __('users.password') }}

                                <span
                                    id="passwordRequired"
                                    class="required"
                                >
                                    *
                                </span>

                            </label>

                            <input
                                type="password"
                                name="password"
                                id="userPassword"
                                class="form-input"
                            >

                            <div class="password-help">
                                {{ __('users.password_help') }}
                            </div>

                        </div>


                        {{-- CONFIRMAR PASSWORD --}}

                        <div class="form-group">

                            <label class="form-label">

                                {{ __('users.confirm_password') }}

                                <span
                                    id="confirmRequired"
                                    class="required"
                                >
                                    *
                                </span>

                            </label>

                            <input
                                type="password"
                                name="password_confirmation"
                                id="userPasswordConfirmation"
                                class="form-input"
                            >

                        </div>

                    </div>

                </div>


                <div class="modal-footer">

                    <button
                        type="button"
                        id="cancelUserModal"
                        class="btn-cancel"
                    >
                        {{ __('users.modal.cancel') }}
                    </button>

                    <button
                        type="submit"
                        class="btn-save"
                    >

                        <span id="saveButtonText">
                            {{ __('users.modal.create_user') }}
                        </span>

                    </button>

                </div>

            </form>

        </div>

    </div>


    {{-- =============================================================
         JAVASCRIPT
    ============================================================== --}}

    <script>

        document.addEventListener('DOMContentLoaded', function () {

            const modal =
                document.getElementById('userModal');

            const openButton =
                document.getElementById('openUserModal');

            const closeButton =
                document.getElementById('closeUserModal');

            const cancelButton =
                document.getElementById('cancelUserModal');

            const form =
                document.getElementById('userForm');

            const modalTitle =
                document.getElementById('modalTitle');

            const methodContainer =
                document.getElementById('methodContainer');

            const nameInput =
                document.getElementById('userName');

            const emailInput =
                document.getElementById('userEmail');

            const roleInput =
                document.getElementById('userRole');

            const passwordInput =
                document.getElementById('userPassword');

            const confirmationInput =
                document.getElementById('userPasswordConfirmation');

            const saveButtonText =
                document.getElementById('saveButtonText');


            /*
            |--------------------------------------------------------------------------
            | TRADUCCIONES
            |--------------------------------------------------------------------------
            */

            const translations = {

                newUser:
                    @json(__('users.modal.new_user')),

                editUser:
                    @json(__('users.modal.edit_user')),

                createUser:
                    @json(__('users.modal.create_user')),

                saveChanges:
                    @json(__('users.modal.save_changes'))

            };


            /*
            |--------------------------------------------------------------------------
            | ABRIR
            |--------------------------------------------------------------------------
            */

            function openModal() {

                modal.classList.add('active');

                document.body.style.overflow = 'hidden';

            }


            /*
            |--------------------------------------------------------------------------
            | CERRAR
            |--------------------------------------------------------------------------
            */

            function closeModal() {

                modal.classList.remove('active');

                document.body.style.overflow = '';

            }


            /*
            |--------------------------------------------------------------------------
            | NUEVO USUARIO
            |--------------------------------------------------------------------------
            */

            openButton.addEventListener('click', function () {

                form.action =
                    "{{ route('users.store') }}";

                methodContainer.innerHTML = '';

                modalTitle.textContent =
                    translations.newUser;

                saveButtonText.textContent =
                    translations.createUser;

                nameInput.value = '';

                emailInput.value = '';

                roleInput.value = 'general';

                passwordInput.value = '';

                confirmationInput.value = '';

                passwordInput.required = true;

                confirmationInput.required = true;

                openModal();

            });


            /*
            |--------------------------------------------------------------------------
            | EDITAR USUARIO
            |--------------------------------------------------------------------------
            */

            document.querySelectorAll(
                '.edit-user-button'
            ).forEach(function (button) {

                button.addEventListener(
                    'click',
                    function () {

                        const id =
                            this.dataset.id;

                        const name =
                            this.dataset.name;

                        const email =
                            this.dataset.email;

                        const role =
                            this.dataset.role;


                        form.action =
                            '/users/' + id;

                        methodContainer.innerHTML =
                            '<input type="hidden" name="_method" value="PUT">';


                        modalTitle.textContent =
                            translations.editUser;

                        saveButtonText.textContent =
                            translations.saveChanges;

                        nameInput.value =
                            name;

                        emailInput.value =
                            email;

                        roleInput.value =
                            role;

                        passwordInput.value = '';

                        confirmationInput.value = '';

                        passwordInput.required =
                            false;

                        confirmationInput.required =
                            false;

                        openModal();

                    }
                );

            });


            /*
            |--------------------------------------------------------------------------
            | CERRAR
            |--------------------------------------------------------------------------
            */

            closeButton.addEventListener(
                'click',
                closeModal
            );


            cancelButton.addEventListener(
                'click',
                closeModal
            );


            modal.addEventListener(
                'click',
                function (event) {

                    if (event.target === modal) {
                        closeModal();
                    }

                }
            );


            document.addEventListener(
                'keydown',
                function (event) {

                    if (
                        event.key === 'Escape' &&
                        modal.classList.contains('active')
                    ) {

                        closeModal();

                    }

                }
            );

        });

    </script>

</x-app-layout>