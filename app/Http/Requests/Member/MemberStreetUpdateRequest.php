<?php

namespace App\Http\Requests\Member;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class MemberStreetUpdateRequest extends FormRequest
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
                Rule::unique('streets')->where(function ($query) {
                    $query->where('name', $this->name)
                        ->where('area_id', getLoggedUserAreaId());
                })->ignore($this->street)
            ],
        ];
    }
}
