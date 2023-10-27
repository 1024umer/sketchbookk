<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
        $user_id = $this->id;
        return [
            'name'=>'required|string',
            'email' => 'required|string|email|unique:App\Models\User,email'.($user_id>0?(','.$user_id):''),
            'password' =>'required|min:8|confirmed',
        ];
    }
}
