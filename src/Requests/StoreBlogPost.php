<?php

namespace Carawebs\Blog\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogPost extends FormRequest
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
            'title' => 'required|unique:posts|max:255|min:3',
            'content' => 'required',
        ];
    }

    public function messages()
    {
        $messages = [
            'title.required' => 'Er, you forgot to add a title!',
            'title.min' => 'Don\'t be stingy - make the title LONGER THAN 3 CHARACTERS!',
            'content.required' => 'No body, no article.'
        ];

        if ('PATCH' === $this->method()){

            $messages = [
                'title.required' => 'Empty Title not allowed on PATCH',
                'title.min' => 'Don\'t be stingy - make the title LONGER THAN 3 CHARACTERS!',
                'content.required' => 'No body, no article.'
            ];

        }

        return $messages;
    }
}
