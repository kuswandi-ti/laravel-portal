<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdminPackageUpdateRequest extends FormRequest
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
        $package_id = $this->route('package');

        return [
            'name' => ['required', 'string', 'max:255', 'unique:packages,name,' . $package_id],
            'cost_per_month' => ['required', 'numeric', 'min:0'],
            'cost_per_year' => ['required', 'numeric', 'min:0'],
        ];
    }
}
