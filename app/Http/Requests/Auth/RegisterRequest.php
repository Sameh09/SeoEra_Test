<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }
    public function rules()
    {
        return [
            'name'=>'required',
            'username' => 'required|string|unique:users',
            'email' => 'required|email|unique:users',
            'mobile' => 'required|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ];
    }
}
