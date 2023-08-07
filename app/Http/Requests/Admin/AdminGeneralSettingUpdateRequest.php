<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdminGeneralSettingUpdateRequest extends FormRequest
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
            'application_name' => ['required', 'string', 'max:255'],
            'currency_code' => ['required', 'string', 'max:255'],
            'currency_symbol' => ['required', 'string', 'max:255'],
            'logo' => ['nullable', 'image', 'max:3000'],
            'favicon' => ['nullable', 'image', 'max:3000'],
        ];
    }
}
