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
            'title' => ['required'],
            'author' => ['required'],
            'source' => ['required'],
            'image' => ['required', 'image', 'unique:posts','max:5000'],
            'postcontent' => ['required'],
            'category' => ['required'],
            'section' => ['required'],
        ];
    }
}
