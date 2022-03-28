<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileSekolahRequest extends FormRequest
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
        if ($this->method() == 'POST') {
            return [
                'title'     => 'required',
                'image'     => 'required|image|max:1024',
                'content'   => 'required'
            ];
        }

        return [
            'title'     => 'required',
            'image'     => 'image|max:1024',
            'content'   => 'required'
        ];
    }

    public function messages()
    {
        return [
            'title.required'    => 'Title tidak boleh kosong.',
            'image.required'    => 'Gambar tidak boleh kosong.',
            'image.image'       => 'Gambar yang dimasukan tidak valid.',
            'image.max'         => 'Maksimal Gambar tidak boleh leboh dari 1MB',
            'content.required'  => 'Content tidak boleh kosong.' 
        ];
    }
}
