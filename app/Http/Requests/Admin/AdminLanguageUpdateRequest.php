<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdminLanguageUpdateRequest extends FormRequest
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
        $language_id = $this->route('language');

        return [
            'lang' => ['required', 'string', 'max:255', 'unique:languages,lang,' . $language_id],
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'unique:languages,slug,' . $language_id],
            'default' => ['required', 'boolean'],
            'status' => ['required', 'boolean'],
        ];
    }
}
