<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Laravel\Socialite\Facades\Socialite;
use App\Mail\LoginCodeMail;

class AuthenticatedSessionController extends Controller
{
    /**
     * Mostrar pantalla de login.
     */
    public function create(Request $request): View
    {
        return view('auth.login');
    }

    /**
     * Solicitar código de acceso por correo.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->validated();

        $email = $request->normalizedEmail();

        /*
         * Limitar solicitudes de código.
         *
         * Máximo:
         * 5 solicitudes cada 10 minutos
         * por correo + IP.
         */
        $throttleKey = 'login-otp-request:'.$request->throttleKey();

        if (RateLimiter::tooManyAttempts($throttleKey, 5)) {
            $seconds = RateLimiter::availableIn($throttleKey);

            return back()
                ->withInput()
                ->withErrors([
                    'email' => __('auth.login_too_many_requests', [
                        'seconds' => $seconds,
                    ]),
                ]);
        }

        RateLimiter::hit($throttleKey, 600);

        /*
         * Buscar usuario existente.
         */
        $user = User::whereRaw('LOWER(email) = ?', [$email])->first();

        if (! $user) {
            return back()
                ->withInput()
                ->withErrors([
                    'email' => __('auth.email_not_registered'),
                ]);
        }

        /*
         * Generar código de 6 dígitos.
         */
        $code = (string) random_int(100000, 999999);

        /*
         * Identificador único del proceso de login.
         *
         * Lo guardamos en sesión para que el código
         * no pueda utilizarse simplemente con el correo.
         */
        $loginId = (string) Str::uuid();

        /*
         * Guardar el código de forma segura.
         *
         * No guardamos el código real.
         */
        Cache::put(
            'login-otp:'.$loginId,
            [
                'email' => $email,
                'user_id' => $user->id,
                'code' => Hash::make($code),
            ],
            now()->addMinutes(10)
        );

        /*
         * Intentos disponibles para verificar el código.
         */
        Cache::put(
            'login-otp-attempts:'.$loginId,
            0,
            now()->addMinutes(10)
        );

        /*
         * Guardar información temporal en la sesión.
         */
        session([
            'login_otp_id' => $loginId,
            'login_otp_email' => $email,
            'login_otp_remember' => $request->boolean('remember'),
        ]);

        /*
         * Enviar correo.
         */
        Mail::to($user->email)->send(
            new LoginCodeMail($code)
        );

        return redirect()->route('login.code');
    }

    /**
     * Mostrar pantalla para introducir el código.
     */
    public function showCode(): View|RedirectResponse
    {
        if (! session('login_otp_id')) {
            return redirect()->route('login');
        }

        return view('auth.login-code', [
            'email' => session('login_otp_email'),
        ]);
    }

    /**
     * Verificar código recibido por correo.
     */
    public function verifyOtp(Request $request): RedirectResponse
    {
        $request->validate([
            'code' => [
                'required',
                'digits:6',
            ],
        ]);

        $loginId = session('login_otp_id');

        if (! $loginId) {
            return redirect()
                ->route('login')
                ->withErrors([
                    'email' => __('auth.login_code_expired'),
                ]);
        }

        /*
         * Recuperar OTP.
         */
        $otpData = Cache::get('login-otp:'.$loginId);

        if (! $otpData) {
            session()->forget([
                'login_otp_id',
                'login_otp_email',
                'login_otp_remember',
            ]);

            return redirect()
                ->route('login')
                ->withErrors([
                    'email' => __('auth.login_code_expired'),
                ]);
        }

        /*
         * Limitar intentos de verificación.
         */
        $attemptsKey = 'login-otp-attempts:'.$loginId;

        $attempts = Cache::get($attemptsKey, 0);

        if ($attempts >= 5) {
            Cache::forget('login-otp:'.$loginId);
            Cache::forget($attemptsKey);

            session()->forget([
                'login_otp_id',
                'login_otp_email',
                'login_otp_remember',
            ]);

            return redirect()
                ->route('login')
                ->withErrors([
                    'email' => __('auth.login_code_too_many_attempts'),
                ]);
        }

        /*
         * Incrementar intento.
         */
        Cache::put(
            $attemptsKey,
            $attempts + 1,
            now()->addMinutes(10)
        );

        /*
         * Comparar código.
         */
        if (! Hash::check($request->string('code')->toString(), $otpData['code'])) {
            return back()->withErrors([
                'code' => __('auth.invalid_login_code'),
            ]);
        }

        /*
         * Buscar nuevamente al usuario.
         */
        $user = User::find($otpData['user_id']);

        if (! $user || Str::lower($user->email) !== Str::lower($otpData['email'])) {
            Cache::forget('login-otp:'.$loginId);
            Cache::forget($attemptsKey);

            session()->forget([
                'login_otp_id',
                'login_otp_email',
                'login_otp_remember',
            ]);

            return redirect()
                ->route('login')
                ->withErrors([
                    'email' => __('auth.email_not_registered'),
                ]);
        }

        /*
         * El código se utiliza una sola vez.
         */
        Cache::forget('login-otp:'.$loginId);
        Cache::forget($attemptsKey);

        /*
         * Marcar correo como verificado.
         *
         * Solo si todavía no estaba verificado.
         */
        if (! $user->email_verified_at) {
            $user->email_verified_at = now();
            $user->save();
        }

        /*
         * Iniciar sesión.
         */
        Auth::login(
            $user,
            session('login_otp_remember', false)
        );

        /*
         * Regenerar sesión para evitar session fixation.
         */
        $request->session()->regenerate();

        /*
         * Limpiar información temporal.
         */
        session()->forget([
            'login_otp_id',
            'login_otp_email',
            'login_otp_remember',
        ]);

        return redirect()->intended(
            route('dashboard', absolute: false)
        );
    }

    /**
     * Reenviar código de acceso.
     */
    public function resendOtp(Request $request): RedirectResponse
    {
        $email = session('login_otp_email');

        if (! $email) {
            return redirect()->route('login');
        }

        /*
         * Limitar reenvíos.
         */
        $throttleKey = 'login-otp-resend:'.Str::lower($email).'|'.$request->ip();

        if (RateLimiter::tooManyAttempts($throttleKey, 3)) {
            $seconds = RateLimiter::availableIn($throttleKey);

            return back()->withErrors([
                'code' => __('auth.login_too_many_requests', [
                    'seconds' => $seconds,
                ]),
            ]);
        }

        RateLimiter::hit($throttleKey, 600);

        $user = User::whereRaw(
            'LOWER(email) = ?',
            [Str::lower($email)]
        )->first();

        if (! $user) {
            return redirect()->route('login');
        }

        /*
         * Invalidar OTP anterior.
         */
        $oldLoginId = session('login_otp_id');

        if ($oldLoginId) {
            Cache::forget('login-otp:'.$oldLoginId);
            Cache::forget('login-otp-attempts:'.$oldLoginId);
        }

        /*
         * Generar nuevo código.
         */
        $code = (string) random_int(100000, 999999);

        $loginId = (string) Str::uuid();

        Cache::put(
            'login-otp:'.$loginId,
            [
                'email' => Str::lower($user->email),
                'user_id' => $user->id,
                'code' => Hash::make($code),
            ],
            now()->addMinutes(10)
        );

        Cache::put(
            'login-otp-attempts:'.$loginId,
            0,
            now()->addMinutes(10)
        );

        session([
            'login_otp_id' => $loginId,
            'login_otp_email' => Str::lower($user->email),
        ]);

        Mail::to($user->email)->send(
            new LoginCodeMail($code)
        );

        return back()->with(
            'status',
            __('auth.login_code_sent')
        );
    }

    /**
     * Redirigir a Google.
     */
    public function redirectToGoogle(): RedirectResponse
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Recibir respuesta de Google.
     */
    public function handleGoogleCallback(Request $request): RedirectResponse
    {
        try {
            $googleUser = Socialite::driver('google')->user();
        } catch (\Throwable $e) {
            return redirect()
                ->route('login')
                ->withErrors([
                    'email' => __('auth.google_login_failed'),
                ]);
        }

        $email = $googleUser->getEmail();

        if (! $email) {
            return redirect()
                ->route('login')
                ->withErrors([
                    'email' => __('auth.google_email_missing'),
                ]);
        }

        /*
         * Buscar únicamente usuarios que ya existan en SFA.
         */
        $user = User::whereRaw(
            'LOWER(email) = ?',
            [Str::lower($email)]
        )->first();

        if (! $user) {
            return redirect()
                ->route('login')
                ->withErrors([
                    'email' => __('auth.google_email_not_registered'),
                ]);
        }

        /*
         * Iniciar sesión.
         */
        Auth::login($user, false);

        $request->session()->regenerate();

        return redirect()->intended(
            route('dashboard', absolute: false)
        );
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}