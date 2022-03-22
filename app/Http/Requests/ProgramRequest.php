<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProgramRequest extends FormRequest
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
            'nama'      => ['required','unique:jurusans'],
            'singkatan' => ['required','unique:jurusans'],
            'content'   => ['required'],
            'image'     => ['required']
        ];
    }

    public function messages()
    {
        return [
           'nama.required'      => 'Program Studi tidak boleh kosong.',
           'nama.unique'        => 'Program Studi sudah pernah dibuat.',
           'singkatan.required' => 'Singkatan tidak boleh kosong.',
           'singkatan.unique'   => 'Singkatan tsudah pernah dibuat.',
           'content.required'   => 'Content tidak boleh kosong.',
           'image.required'     => 'Gambar tidak boleh kosong.'
        ];
    }
}
