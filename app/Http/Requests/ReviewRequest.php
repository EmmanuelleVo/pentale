<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
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
            'body' => 'required|min:10',
            'writing_quality' => 'required|min:1|max:5',
            'story_development' => 'required|min:1|max:5',
            'characters' => 'required|min:1|max:5',
            'overall' => 'required|min:1|max:5',
        ];
    }
}
