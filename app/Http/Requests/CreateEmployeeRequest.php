<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

/**
 * @property-read string $name
 * @property-read string $surname
 * @property-read string $email
 * @property-read string $nickname
 * @property-read string $password
 * @property-read string $avatar
 */
final class CreateEmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::user()->hasPermissionTo('create employee');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required'],
            'surname' => ['required'],
            'email' => ['required', 'email'],
            'nickname' => ['required'],
            'password' => ['required'],
            'avatar' => ['file', 'image'],
        ];
    }
}
