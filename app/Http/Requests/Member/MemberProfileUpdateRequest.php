<?php

namespace App\Http\Requests\Member;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class MemberProfileUpdateRequest extends FormRequest
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
            // 'email' => ['unique:members,email,' . Auth::guard('member')->user()->id],
            'phone' => ['nullable', 'string', 'max:255'],
            'address' => ['nullable'],
            'path_image' => ['nullable', 'image', 'max:3000'],
        ];
    }
}
