<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => ['required'],
            'title' => ['required'],
            'email' => ['required', 'email'],
            'url' => ['nullable'],
            'gender' => ['required'],
            'age' => ['required'],
            'contact' => ['required'],
        ];
    }
}
