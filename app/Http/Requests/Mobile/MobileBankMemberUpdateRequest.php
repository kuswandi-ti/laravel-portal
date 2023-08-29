<?php

namespace App\Http\Requests\Mobile;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class MobileBankMemberUpdateRequest extends FormRequest
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
            'bank_account_number' => [
                'required',
                'string',
                'max:255',
                Rule::unique('bank_members')->where(function ($query) {
                    $query->where('bank_account_number', $this->name)
                        ->where('area_id', getLoggedUserAreaId());
                })->ignore($this->bank_member)
            ],
            'bank_account_name' => ['required', 'string', 'max:255'],
        ];
    }
}
