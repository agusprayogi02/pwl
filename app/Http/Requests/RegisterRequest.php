<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:225',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:8',
        ];
    }
}
