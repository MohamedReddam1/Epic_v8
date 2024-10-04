<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddCourseValidation extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|min:5',
            'price' => 'required',
            'category' => 'required',
            'description' => 'required|min:10',
            'image' => 'required',
            'level' => 'required',
            'langue' => 'required',

        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.min' => 'Le titre doit contenir au moins 5 caractères.',
            'title.required' => 'Le titre est requis.',
            'price.required' => 'Le prix est requis.',
            'category.required' => 'La catégorie est requise.',
            'description.min' => 'La description doit contenir au moins 10 caractères.',
            'description.required' => 'La description est requise.',
            'image.required' => 'Vous devez insérer un cover  du cours.',
            'level.required' => 'Vous devez insérer le niveau du cours.',
            'langue.required' => 'Vous devez insérer la langue du cours.',
        ];
    }
}
