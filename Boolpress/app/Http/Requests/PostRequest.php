<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title' => 'required|max:255',
            'content' => 'required|min:5',
            'category_id' => 'nullable|exists:categories,id',
            'tags' => 'nullable|exists:categories,id',
        ];
    }

    public function messages(){

    

        return [
            
            'title.required' => 'Il campo Titole è obbligatorio',
            'title.max' => 'Il campo Titolo deve essere massimo :max caratteri',
            'content.required' => 'Il campo Content è obbligatorio',
            'content.min' => 'Il campo Content deve essere minimo :minimo caratteri',
            'category_id.exists' => 'Inserisci una categoria valida',
            'tags.exists' => 'Inserisci una tag valido',
        ];

    }

}
