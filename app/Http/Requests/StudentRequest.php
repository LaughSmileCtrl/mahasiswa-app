<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
        return [
            'nrp'               => 'required|numeric',
            'name'              => 'required',
            'year'              => 'required|digits:4',
            'major'             => 'required',
            'certificate_path'  => 'nullable|mimes:jpg,jpeg,png,doc,docx,pdf'
        ];
    }

    public function messages()
    {
        return [
            'required'  => ':attribute harus diisi',
            'numeric'   => 'harus angka',
            'digits'    => 'harus tahun (4 digit)',
            'mimes'     => 'file harus jpg, jpeg, png, doc, docx atau pdf',
        ];
    }
}
