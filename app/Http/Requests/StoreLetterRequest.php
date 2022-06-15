<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLetterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'file' => 'required|mimes:jpg,jpeg,png,doc,docx,pdf',
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute harus diisi',
            'mimes' => 'file harus jpg/jpeg/png/doc/docx/pdf'
        ];
    }
}
