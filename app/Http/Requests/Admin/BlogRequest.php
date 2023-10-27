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
            'name'=>'required|string|max:255',
            'slug'=>'required|max:255|unique:App\Models\Blog,slug,'.($this->id>0?$this->id:''),
            'title' => 'required|string|max:550',
            'description'=>'required',
            'file' => 'required'
        ];
    }
}
