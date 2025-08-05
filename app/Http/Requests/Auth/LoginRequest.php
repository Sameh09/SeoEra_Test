<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    
    public function rules()
    {
        return [
            'mobile' => 'required|exists:users,mobile',
            'password' => 'required|string',
        ];
    }
}
