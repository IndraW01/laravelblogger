<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DashboardPostRequest extends FormRequest
{
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
        if($this->isMethod('POST')) {
            return [
                'title' => 'required|max:255|unique:posts',
                'category' => 'required|distinct',
                'gambar' => 'required|file|image|max:1024',
                'body' => 'required'
            ];
        } else if($this->isMethod('PUT')) {
            return [
                'title' => 'required|max:255',
                'category' => 'required|distinct',
                'gambar' => 'file|image|max:1024',
                'body' => 'required'
            ];
        }
    }

}
