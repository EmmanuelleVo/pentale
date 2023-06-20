<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'bio' => 'nullable|max:64',
            'instagram' => 'nullable',
            'discord' => 'nullable',
            'twitter' => 'nullable',
            'username' => ['string', 'max:255', 'required'],
            'name' => 'required',
            //'email' => ['email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            'email' => 'required|email|max:255|unique:users,email,' . $this->user()->id,
            'password' => 'nullable|min:8|max:64|required_with:password_confirmation|password|same:password_confirmation',
            'password_confirmation' => 'nullable|string|min:8|max:64'
        ];
    }
}
