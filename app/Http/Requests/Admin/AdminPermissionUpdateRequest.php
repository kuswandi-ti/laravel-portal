<?php

namespace App\Http\Requests\Admin;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class AdminPermissionUpdateRequest extends FormRequest
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
        $permission_id = $this->route('permission');

        return [
            'permission_name' => ['required', 'string', 'max:255', 'unique:permissions,name,' . $permission_id],
            'group_name' => ['required', 'string', 'max:255'],
        ];
    }
}
