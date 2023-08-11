<?php

namespace App\Http\Requests\Admin;

use App\Models\Residence;
use Illuminate\Foundation\Http\FormRequest;

class AdminResidenceUpdateRequest extends FormRequest
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
        $residenceId = $this->route('residence');

        return [
            'name' => ['required', 'string', 'max:255', 'unique:residences,name,'. $residenceId],
            'province' => ['required', 'string'],
            'city' => ['required', 'string'],
            'district' => ['required', 'string'],
            'village' => ['required', 'string'],
        ];
    }
}
