<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderFormRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

   
    public function rules(): array
    {
        return [
            'title' => [
                'required',
                'string',
                'max:255'
            ],
            'description' => [
                'required',
                'string',
                'max:800'
            ],
            'image' => [
                'nullable',
                'image',
                'mimes:.jpg,jpeg,png'
            ],
            'status' => [
                'nullable'
            ]
        ];
    }
}
