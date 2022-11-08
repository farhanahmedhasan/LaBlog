<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule ;

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
     * @return array<string, mixed>
     */ 

    public function rules()
    {
        $rules = [
            'title' => ['required','max:255',Rule::unique('posts')->ignore($this->id)],
            'excerpt' => 'required',
            'body' => 'required',
            'image_path' => ['mimes:jpeg,png,jpg', 'max:5048'],
            'min_to_read' => 'int|min:0|max:60'
        ];

        if(in_array($this->method(), ['POST'])){
            $rules['image_path'] = ['required', 'mimes:jpeg,png,jpg', 'max:5048'];
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'title.required' => 'Title issss too much required'
        ];
    }
}
