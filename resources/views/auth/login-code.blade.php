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
            margin-top: 5px;
            margin-bottom: 20px;
            font-size: 11px;
            line-height: 1.6;
            color: #6b7280;
        }

        .sfa-email {
            font-weight: 600;
            color: #374151;
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

        .sfa-code-input {
            width: 100%;
            height: 44px;
            box-sizing: border-box;
            border: 1px solid #d1d5db;
            border-radius: 5px;
            background: white;
            color: #1f2937;
            padding: 8px 10px;
            font-size: 20px;
            font-weight: 600;
            letter-spacing: 8px;
            text-align: center;
            outline: none;
            transition:
                border-color .15s ease,
                box-shadow .15s ease;
        }

        .sfa-code-input:focus {
            border-color: #6b7280;
            box-shadow: 0 0 0 2px rgba(107, 114, 128, .10);
        }

        .sfa-error {
            margin-top: 5px;
            font-size: 10px;
            color: #dc2626;
        }

        .sfa-status {
            margin-bottom: 15px;
            padding: 8px 10px;
            border-radius: 5px;
            background: #f0fdf4;
            border: 1px solid #bbf7d0;
            color: #166534;
            font-size: 10px;
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

        .sfa-resend {
            width: 100%;
            border: none;
            background: transparent;
            color: #6b7280;
            font-size: 10px;
            cursor: pointer;
            margin-top: 14px;
        }

        .sfa-resend:hover {
            color: #1f2937;
        }

        .sfa-change-email {
            display: block;
            margin-top: 12px;
            text-align: center;
            font-size: 10px;
            color: #6b7280;
            text-decoration: none;
        }

        .sfa-change-email:hover {
            color: #1f2937;
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
                    {{ __('auth.verify_title') }}
                </h1>

                <p class="sfa-login-subtitle">

                    {{ __('auth.verify_subtitle') }}

                    <br>

                    <span class="sfa-email">
                        {{ $email }}
                    </span>

                </p>


                @if(session('status'))

                    <div class="sfa-status">
                        {{ session('status') }}
                    </div>

                @endif


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
                    action="{{ route('login.verify') }}"
                >

                    @csrf


                    <div class="sfa-form-group">

                        <label
                            for="code"
                            class="sfa-label"
                        >
                            {{ __('auth.login_code') }}
                        </label>

                        <input
                            id="code"
                            class="sfa-code-input"
                            type="text"
                            name="code"
                            inputmode="numeric"
                            pattern="[0-9]{6}"
                            maxlength="6"
                            autocomplete="one-time-code"
                            required
                            autofocus
                        >

                        @if($errors->get('code'))

                            <div class="sfa-error">
                                {{ $errors->first('code') }}
                            </div>

                        @endif

                    </div>


                    <button
                        type="submit"
                        class="sfa-login-button"
                    >
                        {{ __('auth.verify_code') }}
                    </button>

                </form>


                <form
                    method="POST"
                    action="{{ route('login.resend') }}"
                >

                    @csrf

                    <button
                        type="submit"
                        class="sfa-resend"
                    >
                        {{ __('auth.resend_code') }}
                    </button>

                </form>


                <a
                    href="{{ route('login') }}"
                    class="sfa-change-email"
                >
                    ← {{ __('auth.change_email') }}
                </a>

            </div>


            <div class="sfa-footer">
                SFA · Sistema administrativo
            </div>

        </div>

    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function () {

            const input = document.getElementById('code');

            if (!input) {
                return;
            }

            input.addEventListener('input', function () {

                this.value = this.value
                    .replace(/\D/g, '')
                    .slice(0, 6);

            });

        });
    </script>

</x-guest-layout>
