<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AboutRequest extends FormRequest
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
            'title'     => ['required'],
            'desc'      => ['required'],
            'is_active' => ['required'],
            'image'     => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'title.required'     => 'Title tidak boleh kosong.',
            'desc.required'      => 'Deskripsi tidak boleh kosong.',
            'is_activ.required'  => 'Status tidak boleh kosong.',
            'image.required'     => 'Gambar tidak boleh kosong.'
        ];
    }
}
