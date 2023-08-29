<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdminBankUpdateRequest extends FormRequest
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
        $bank_id = $this->route('bank');

        return [
            'code' => ['required', 'string', 'max:255', 'unique:banks,code,'. $bank_id],
            'name' => ['required', 'string', 'max:255'],
            'type' => ['required', 'string'],
        ];
    }
}
