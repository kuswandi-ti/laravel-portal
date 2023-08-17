<?php

namespace App\Http\Requests\Member;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class MemberRoleUpdateRequest extends FormRequest
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
        // $roleId = $this->route('role');

        return [
            // 'role_name' => ['required', 'string', 'max:255', 'unique:roles,name,' . $roleId],
            'role_name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('roles', 'name')->where(function ($query) {
                    $query->where('guard_name', $this->guard_name)
                        ->where('area_id', $this->area);
                })->ignore($this->id)
            ],
        ];
    }
}
