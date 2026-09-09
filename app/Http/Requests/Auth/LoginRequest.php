<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
            ],

            'remember' => [
                'nullable',
                'boolean',
            ],
        ];
    }

    /**
     * Get the normalized email address.
     */
    public function normalizedEmail(): string
    {
        return Str::lower(trim($this->string('email')->toString()));
    }

    /**
     * Get the OTP throttle key.
     */
    public function throttleKey(): string
    {
        return Str::transliterate(
            $this->normalizedEmail().'|'.$this->ip()
        );
    }
}
