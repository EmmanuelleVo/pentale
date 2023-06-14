<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
            'title' => 'required',
            'synopsis' => 'required|min:30|max:1000',
            'genres' => 'required|array|min:1',
            'tags' => 'required|array|min:1',
            'language' => 'required',
            'cover' => 'required',
            'mature' => 'required',

        ];
    }
}
