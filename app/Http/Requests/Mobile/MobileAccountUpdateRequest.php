<?php

namespace App\Http\Requests\Mobile;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class MobileAccountUpdateRequest extends FormRequest
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
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('accounts')->where(function ($query) {
                    $query->where('name', $this->name)
                        ->where('account_category_id', $this->account_category_id)
                        ->where('area_id', getLoggedUserAreaId());
                })->ignore($this->id)
            ],
        ];
    }
}
