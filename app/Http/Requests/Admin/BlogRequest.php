<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
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
                'blog_title'=>'required|unique:blogs',
                'description'=>'required',
                'status' => 'required'
            ];
        }

        public function messages(): array
        {
            return [
                'blog_title.required' => 'A Blog Title is required',
                'description.required' => 'A blog description is required ',
                'status.required'=> 'A blog status is required'
            ];
        }
}
