<section class="profile-section">

    {{-- ============================================================
         ENCABEZADO
    ============================================================ --}}

    <header class="profile-header">

        <div class="profile-header-icon">
            <svg
                width="20"
                height="20"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="1.8"
                stroke-linecap="round"
                stroke-linejoin="round"
            >
                <path d="M20 21a8 8 0 0 0-16 0"/>
                <circle cx="12" cy="7" r="4"/>
            </svg>
        </div>

        <div>

            <h2 class="profile-title">
                {{ __('profile.title') }}
            </h2>

            <p class="profile-description">
                {{ __('profile.subtitle') }}
            </p>

        </div>

    </header>


    {{-- ============================================================
         FORMULARIO PARA REENVIAR VERIFICACIÓN
    ============================================================ --}}

    <form
        id="send-verification"
        method="post"
        action="{{ route('verification.send') }}"
    >
        @csrf
    </form>


    {{-- ============================================================
         FORMULARIO PRINCIPAL
    ============================================================ --}}

    <form
        method="post"
        action="{{ route('profile.update') }}"
        class="profile-form"
    >

        @csrf
        @method('patch')


        {{-- ========================================================
             NOMBRE
        ========================================================= --}}

        <div class="profile-field">

            <x-input-label
                for="name"
                :value="__('profile.name')"
                class="profile-label"
            />

            <x-text-input
                id="name"
                name="name"
                type="text"
                class="profile-input"
                :value="old('name', $user->name)"
                required
                autofocus
                autocomplete="name"
            />

            <x-input-error
                class="profile-error"
                :messages="$errors->get('name')"
            />

        </div>


        {{-- ========================================================
             CORREO ELECTRÓNICO
        ========================================================= --}}

        <div class="profile-field">

            <x-input-label
                for="email"
                :value="__('profile.email')"
                class="profile-label"
            />

            <x-text-input
                id="email"
                name="email"
                type="email"
                class="profile-input"
                :value="old('email', $user->email)"
                required
                autocomplete="username"
            />

            <x-input-error
                class="profile-error"
                :messages="$errors->get('email')"
            />


            {{-- ====================================================
                 VERIFICACIÓN DE CORREO
            ===================================================== --}}

            @if (
                $user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail
                && ! $user->hasVerifiedEmail()
            )

                <div class="verification-box">

                    <div class="verification-header">

                        <div class="verification-icon">

                            <svg
                                width="16"
                                height="16"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            >
                                <circle cx="12" cy="12" r="10"/>
                                <line x1="12" y1="8" x2="12" y2="12"/>
                                <line x1="12" y1="16" x2="12.01" y2="16"/>
                            </svg>

                        </div>

                        <div>

                            <p class="verification-title">
                                {{ __('profile.unverified_title') }}
                            </p>

                            <p class="verification-description">
                                {{ __('profile.unverified_description') }}
                            </p>

                        </div>

                    </div>


                    <button
                        form="send-verification"
                        type="submit"
                        class="verification-button"
                    >
                        {{ __('profile.resend_verification') }}
                    </button>


                    @if (session('status') === 'verification-link-sent')

                        <div class="verification-success">

                            <svg
                                width="15"
                                height="15"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            >
                                <polyline points="20 6 9 17 4 12"/>
                            </svg>

                            <span>
                                {{ __('profile.verification_sent') }}
                            </span>

                        </div>

                    @endif

                </div>

            @endif

        </div>


        {{-- ========================================================
             ACCIONES
        ========================================================= --}}

        <div class="profile-actions">

            <button
                type="submit"
                class="profile-save-button"
            >

                <svg
                    width="15"
                    height="15"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                >
                    <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/>
                    <polyline points="17 21 17 13 7 13 7 21"/>
                    <polyline points="7 3 7 8 15 8"/>
                </svg>

                {{ __('profile.save') }}

            </button>


            @if (session('status') === 'profile-updated')

                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2500)"
                    class="profile-saved-message"
                >

                    <svg
                        width="15"
                        height="15"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    >
                        <polyline points="20 6 9 17 4 12"/>
                    </svg>

                    {{ __('profile.saved') }}

                </p>

            @endif

        </div>

    </form>

</section>


<style>

    /* ================================================================
       SECCIÓN
    ================================================================ */

    .profile-section {
        width: 100%;
    }


    /* ================================================================
       ENCABEZADO
    ================================================================ */

    .profile-header {
        display: flex;
        align-items: flex-start;
        gap: 13px;

        margin-bottom: 26px;
        padding-bottom: 20px;

        border-bottom: 1px solid #e5e7eb;
    }


    .profile-header-icon {
        display: flex;
        align-items: center;
        justify-content: center;

        flex: 0 0 38px;

        width: 38px;
        height: 38px;

        border: 1px solid #e5e7eb;
        border-radius: 9px;

        background: #f9fafb;
        color: #4b5563;
    }


    .profile-title {
        margin: 0;

        color: #111827;

        font-size: 17px;
        font-weight: 700;

        line-height: 1.4;
        letter-spacing: -0.01em;
    }


    .profile-description {
        max-width: 620px;

        margin: 4px 0 0;

        color: #6b7280;

        font-size: 13px;
        line-height: 1.55;
    }


    /* ================================================================
       FORMULARIO
    ================================================================ */

    .profile-form {
        display: flex;
        flex-direction: column;
        gap: 21px;

        width: 100%;
    }


    .profile-field {
        width: 100%;
    }


    /* ================================================================
       LABEL
    ================================================================ */

    .profile-label {
        display: block;

        margin-bottom: 7px;

        color: #374151;

        font-size: 13px;
        font-weight: 600;
    }


    /* ================================================================
       INPUT
    ================================================================ */

    .profile-input {
        width: 100% !important;

        min-height: 42px;

        box-sizing: border-box;

        padding: 9px 12px;

        border: 1px solid #d1d5db !important;
        border-radius: 8px !important;

        background: #ffffff !important;
        color: #111827 !important;

        font-size: 13px;

        outline: none;

        transition:
            border-color .15s ease,
            box-shadow .15s ease;
    }


    .profile-input:hover {
        border-color: #9ca3af !important;
    }


    .profile-input:focus {
        border-color: #6366f1 !important;

        box-shadow:
            0 0 0 3px rgba(99, 102, 241, .10) !important;
    }


    /* ================================================================
       ERRORES
    ================================================================ */

    .profile-error {
        margin-top: 6px;

        color: #dc2626;

        font-size: 12px;
        line-height: 1.5;
    }


    /* ================================================================
       VERIFICACIÓN
    ================================================================ */

    .verification-box {
        margin-top: 13px;

        padding: 14px 15px;

        border: 1px solid #fde68a;
        border-radius: 9px;

        background: #fffbeb;
    }


    .verification-header {
        display: flex;
        align-items: flex-start;
        gap: 10px;
    }


    .verification-icon {
        display: flex;
        align-items: center;
        justify-content: center;

        flex: 0 0 28px;

        width: 28px;
        height: 28px;

        border-radius: 7px;

        background: #fef3c7;
        color: #b45309;
    }


    .verification-title {
        margin: 0;

        color: #92400e;

        font-size: 12px;
        font-weight: 700;
        line-height: 1.4;
    }


    .verification-description {
        margin: 3px 0 0;

        color: #92400e;

        font-size: 12px;
        line-height: 1.5;
    }


    .verification-button {
        margin-top: 11px;

        padding: 0;

        border: 0;

        background: transparent;

        color: #92400e;

        font-size: 12px;
        font-weight: 600;

        text-decoration: underline;

        cursor: pointer;
    }


    .verification-button:hover {
        opacity: .7;
    }


    .verification-success {
        display: flex;
        align-items: center;
        gap: 6px;

        margin-top: 11px;
        padding-top: 10px;

        border-top: 1px solid #fde68a;

        color: #047857;

        font-size: 12px;
        font-weight: 600;
    }


    /* ================================================================
       ACCIONES
    ================================================================ */

    .profile-actions {
        display: flex;
        align-items: center;
        gap: 13px;

        margin-top: 2px;
        padding-top: 3px;
    }


    /* ================================================================
       BOTÓN GUARDAR
    ================================================================ */

    .profile-save-button {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 7px;

        min-height: 39px;

        padding: 8px 16px;

        border: 0;
        border-radius: 8px;

        background: #111827;
        color: #ffffff;

        font-size: 12px;
        font-weight: 600;

        cursor: pointer;

        transition:
            background .15s ease,
            box-shadow .15s ease,
            transform .1s ease;
    }


    .profile-save-button:hover {
        background: #1f2937;

        box-shadow:
            0 2px 6px rgba(0, 0, 0, .08);
    }


    .profile-save-button:active {
        transform: translateY(1px);
    }


    .profile-save-button:focus {
        outline: none;

        box-shadow:
            0 0 0 3px rgba(17, 24, 39, .12);
    }


    /* ================================================================
       MENSAJE GUARDADO
    ================================================================ */

    .profile-saved-message {
        display: flex;
        align-items: center;
        gap: 5px;

        margin: 0;

        color: #059669;

        font-size: 12px;
        font-weight: 600;
    }


    /* ================================================================
       RESPONSIVE
    ================================================================ */

    @media (max-width: 640px) {

        .profile-header {
            gap: 10px;
        }


        .profile-header-icon {
            flex-basis: 34px;

            width: 34px;
            height: 34px;
        }


        .profile-title {
            font-size: 16px;
        }


        .profile-description {
            font-size: 12px;
        }


        .profile-actions {
            align-items: stretch;
            flex-direction: column;
        }


        .profile-save-button {
            width: 100%;
        }

    }

</style>
