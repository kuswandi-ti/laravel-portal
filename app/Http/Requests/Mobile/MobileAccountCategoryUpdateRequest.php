<?php

namespace App\Http\Requests\Mobile;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class MobileAccountCategoryUpdateRequest extends FormRequest
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
                Rule::unique('account_categories')->where(function ($query) {
                    $query->where('name', $this->name)
                        ->where('group', $this->group)
                        ->where('area_id', getLoggedUserAreaId());
                })->ignore($this->account_category)
            ],
            'group' => ['required', 'string', 'max:255'],
        ];
    }
}
