<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class AuthRequest extends FormRequest
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
    public function rules(Request $request)
    {
        if($request->path() == 'register') {
            return [
                'name' => 'required|max:255|unique:users',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:3|confirmed',
                'password_confirmation' => 'required'
            ];
        } else if ($request->path() == 'login') {
            return [
                'name' => 'required',
                'password' => 'required'
            ];
        }
    }
}
