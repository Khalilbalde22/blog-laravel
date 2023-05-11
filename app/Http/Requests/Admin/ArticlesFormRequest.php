<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ArticlesFormRequest extends FormRequest
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
            'titre' => ['required', 'min:5'],
            'reference' => ['required', 'min:5'], 
            'description' => ['required', 'min:8'],
            'image' => ['image','required','max:2000'],
            'categorieId' => ['required'],
            'auteur' => ['required', 'min:5'],
             
        ];
    }
}
