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
            'company_name' => ['required', 'string', 'max:255'],
            'site_title' => ['required', 'string', 'max:255'],
            'company_phone' => ['required', 'string', 'max:255'],
            'company_email' => ['required', 'string', 'max:255'],
            'company_address' => ['required', 'string', 'max:255'],
            'date_format' => ['required'],
            'time_format' => ['required'],
            'currency' => ['required'],
            'language' => ['required'],
            'logo' => ['nullable', 'image', 'max:3000'],
            'favicon' => ['nullable', 'image', 'max:3000'],
        ];
    }
}
