<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactsRequest extends FormRequest
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
            'nom'=>['required','string','min:3'],
            'prenom'=>['required','string','min:3'],
            'telephone'=>['required','string','min:7'],
            'email'=>['required','email'],
            'message'=>['required','string','min:7'],
        ];
    }
}
