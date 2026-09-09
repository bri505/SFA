<x-guest-layout>

    <style>
        .sfa-login-page {
            min-height: 100vh;
            background: #f5f6f8;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
        }

        .sfa-login-box {
            width: 100%;
            max-width: 380px;
        }

        .sfa-brand {
            text-align: center;
            margin-bottom: 22px;
        }

        .sfa-logo {
            font-size: 28px;
            font-weight: 700;
            letter-spacing: -0.5px;
            color: #1f2937;
        }

        .sfa-brand-text {
            margin-top: 4px;
            font-size: 11px;
            color: #9ca3af;
        }

        .sfa-login-card {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            padding: 24px;
            box-shadow:
                0 1px 2px rgba(0, 0, 0, .03);
        }

        .sfa-login-title {
            margin: 0;
            font-size: 18px;
            font-weight: 600;
            color: #1f2937;
        }

        .sfa-login-subtitle {
            margin-top: 4px;
            margin-bottom: 20px;
            font-size: 11px;
            color: #6b7280;
        }

        .sfa-form-group {
            margin-bottom: 15px;
        }

        .sfa-label {
            display: block;
            margin-bottom: 5px;
            font-size: 11px;
            font-weight: 500;
            color: #4b5563;
        }

        .sfa-input {
            width: 100%;
            height: 36px;
            box-sizing: border-box;
            border: 1px solid #d1d5db;
            border-radius: 5px;
            background: white;
            color: #1f2937;
            padding: 8px 10px;
            font-size: 12px;
            outline: none;
            transition:
                border-color .15s ease,
                box-shadow .15s ease;
        }

        .sfa-input:focus {
            border-color: #6b7280;
            box-shadow: 0 0 0 2px rgba(107, 114, 128, .10);
        }

        .sfa-input::placeholder {
            color: #9ca3af;
        }

        .sfa-error {
            margin-top: 5px;
            font-size: 10px;
            color: #dc2626;
        }

        .sfa-remember {
            display: flex;
            align-items: center;
            gap: 7px;
            margin-top: 4px;
            margin-bottom: 18px;
        }

        .sfa-checkbox {
            width: 13px;
            height: 13px;
            accent-color: #1f2937;
        }

        .sfa-remember label {
            font-size: 11px;
            color: #6b7280;
            cursor: pointer;
        }

        .sfa-login-button {
            width: 100%;
            height: 36px;
            border: none;
            border-radius: 5px;
            background: #1f2937;
            color: white;
            font-size: 11px;
            font-weight: 500;
            cursor: pointer;
            transition: background .15s ease;
        }

        .sfa-login-button:hover {
            background: #111827;
        }

        .sfa-login-button:focus {
            outline: none;
            box-shadow: 0 0 0 2px rgba(31, 41, 55, .15);
        }

        .sfa-google-button {
            width: 100%;
            height: 36px;
            border: 1px solid #d1d5db;
            border-radius: 5px;
            background: #ffffff;
            color: #374151;
            font-size: 11px;
            font-weight: 500;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            text-decoration: none;
            transition:
                background .15s ease,
                border-color .15s ease;
        }

        .sfa-google-button:hover {
            background: #f9fafb;
            border-color: #9ca3af;
        }

        .sfa-google-icon {
            font-size: 15px;
            font-weight: 700;
        }

        .sfa-divider {
            display: flex;
            align-items: center;
            gap: 10px;
            margin: 18px 0;
        }

        .sfa-divider-line {
            flex: 1;
            height: 1px;
            background: #e5e7eb;
        }

        .sfa-divider-text {
            font-size: 10px;
            color: #9ca3af;
        }

        .sfa-footer {
            margin-top: 18px;
            text-align: center;
            font-size: 10px;
            color: #9ca3af;
        }

        @media (max-width: 480px) {
            .sfa-login-page {
                padding: 16px;
            }

            .sfa-login-card {
                padding: 20px;
            }
        }
    </style>


    <div class="sfa-login-page">

        <div class="sfa-login-box">

            <div class="sfa-brand">

                <div class="sfa-logo">
                    SFA
                </div>

                <div class="sfa-brand-text">
                    Sistema para Facturas Americanas
                </div>

            </div>


            <div class="sfa-login-card">

                <h1 class="sfa-login-title">
                    {{ __('auth.login_title') }}
                </h1>

                <p class="sfa-login-subtitle">
                    {{ __('auth.login_subtitle') }}
                </p>


                <x-auth-session-status
                    class="mb-4"
                    :status="session('status')"
                />


                @if ($errors->any())

                    <div
                        class="sfa-error"
                        style="margin-bottom: 15px;"
                    >
                        {{ $errors->first() }}
                    </div>

                @endif


                <form
                    method="POST"
                    action="{{ route('login.store') }}"
                >

                    @csrf


                    <div class="sfa-form-group">

                        <label
                            for="email"
                            class="sfa-label"
                        >
                            {{ __('auth.email') }}
                        </label>

                        <input
                            id="email"
                            class="sfa-input"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="correo@ejemplo.com"
                            required
                            autofocus
                            autocomplete="email"
                        >

                        @if($errors->get('email'))

                            <div class="sfa-error">
                                {{ $errors->first('email') }}
                            </div>

                        @endif

                    </div>


                    <div class="sfa-remember">

                        <input
                            id="remember"
                            type="checkbox"
                            class="sfa-checkbox"
                            name="remember"
                            value="1"
                        >

                        <label for="remember">
                            {{ __('auth.remember_me') }}
                        </label>

                    </div>


                    <button
                        type="submit"
                        class="sfa-login-button"
                    >
                        {{ __('auth.continue') }}
                    </button>

                </form>


                <div class="sfa-divider">

                    <div class="sfa-divider-line"></div>

                    <div class="sfa-divider-text">
                        {{ __('auth.or') }}
                    </div>

                    <div class="sfa-divider-line"></div>

                </div>


                <a
                    href="{{ route('google.login') }}"
                    class="sfa-google-button"
                >

                    <span class="sfa-google-icon">
                        G
                    </span>

                    <span>
                        {{ __('auth.continue_with_google') }}
                    </span>

                </a>

            </div>


            <div class="sfa-footer">
                SFA · Sistema administrativo
            </div>

        </div>

    </div>

</x-guest-layout>
