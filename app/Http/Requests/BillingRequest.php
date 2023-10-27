<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BillingRequest extends FormRequest
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
            'email'=>'required|email|max:255|unique:App\Models\Order,email',
            'address'=>'required|string',
            'last_name'=>'required|string|max:255',
            'city'=>'required|string|max:255',
            'country'=>'required|string|max:255',
            'postal_code'=>'required',
        ];
    }
}
