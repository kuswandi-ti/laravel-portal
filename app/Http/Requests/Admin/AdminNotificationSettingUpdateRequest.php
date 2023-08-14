<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdminNotificationSettingUpdateRequest extends FormRequest
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
            'mail_type' => ['required'],
            'mail_host' => ['required', 'string', 'max:255'],
            'mail_username' => ['required', 'string', 'max:255'],
            'mail_password' => ['required', 'string', 'max:255'],
            'mail_encryption' => ['required'],
            'mail_port' => ['required', 'string', 'max:255'],
            'mail_from_address' => ['required', 'string', 'max:255'],
            'mail_from_name' => ['required', 'string', 'max:255'],
        ];
    }
}
