<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VisidanMisiRequest extends FormRequest
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
                'visi'  => 'required',
                'misi'  => 'required',
                'image' => 'required|image|max:1024'
            ];
        }

        return [
            'visi'  => 'required',
            'misi'  => 'required',
            'image' => 'image|max:1024'
        ];
    }

    public function messages()
    {
        return [
            'visi.required'     => 'Visi tidak boleh kosong.',
            'misi.required'     => 'Misi tidak boleh kosong.',
            'image.required'    => 'Gambar tidak boleh kosong.',
            'image.image'       => 'Gambar yang diinput tidak valid.',
            'image.max'         => 'Maksimal Gambar tidak boleh lebih dari 1MB.'
        ];
    }
}
