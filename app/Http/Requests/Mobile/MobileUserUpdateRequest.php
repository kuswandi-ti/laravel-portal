<?php

namespace App\Http\Requests\Mobile;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class MobileUserUpdateRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users')->where(function ($query) {
                    $query->where('email', $this->email)
                        ->where('house_id', $this->house_id);
                })->ignore($this->user)
            ],
        ];
    }
}
