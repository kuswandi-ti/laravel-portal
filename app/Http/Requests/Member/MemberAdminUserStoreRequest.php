<?php

namespace App\Http\Requests\Member;

use Illuminate\Foundation\Http\FormRequest;

class MemberAdminUserStoreRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:members,email'],
            'password' => ['required', 'string', 'min:8', 'max:255', 'confirmed'],
            'password_confirmation' => ['required', 'string', 'min:8', 'max:255'],
            'role' => ['required'],
        ];
    }
}
