<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
{
    public function authorize()
    {
        return true; // anyone can make this request right now
    }

    public function rules() //validate add
    {
        return [
            'username' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ];
    }


}
