<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BeritaRequest extends FormRequest
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
                'title'         => ['required','unique:beritas,title'],
                'kategori_id'   => ['required'],
                'content'       => ['required'],
                'thumbnail'     => ['required','image','max:1024'],
            ];
        }

        return [
            'title'         => ['required'],
            'kategori_id'   => ['required'],
            'content'       => ['required'],
            'thumbnail'     => ['image','max:1024'],
        ];
    }

    public function messages()
    {
        return [
            'title.required'        => 'Title tidak boleh kosong.',
            'title.unique'          => 'Title sudah pernah digunakan.',
            'kategori_id.required'  => 'Kategori tidak boleh kosong.',
            'content.required'      => 'Content tidak boleh kosong.',
            'thumbnail.required'    => 'Thumbnail tidak boleh kosong.',
            'thumbnail.image'       => 'File yang di masukan tidak valid.',
            'thumbnail.max'         => 'Maksimal size  Thumbnail 1MB.',
        ];
    }
}
