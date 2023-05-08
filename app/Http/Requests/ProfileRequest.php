<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'avatar' => 'nullable',
            'bio' => 'nullable|max:64',
            'instagram' => 'nullable',
            'discord' => 'nullable',
            'twitter' => 'nullable',
            'username' => 'required',
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $this->user()->id,
            'password' => 'nullable|min:8|max:64|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'nullable|min:8|max:64'
        ];
    }
}
