<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdminPaymentSettingUpdateRequest extends FormRequest
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
            'midtrans_mode' => ['required'],
            'midtrans_merchant_id' => ['required', 'string', 'max:255'],
            'midtrans_client_key' => ['required', 'string', 'max:255'],
            'midtrans_server_key' => ['required', 'string', 'max:255'],
        ];
    }
}
