<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KegiatanRequest extends FormRequest
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
            'nama'      => ['required','unique:kegiatans'],
            'content'   => ['required']
        ];
    }

    public function messages()
    {
        return [
            'nama.required'      => 'Nama Kegiatan tidak boleh kosong.',
            'nama.unique'        => 'Nama Kegiatan sudah pernah dibuat.',
            'content.required'   => 'Content tidak boleh kosong.'
        ];
    }
}
