<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\MaxCharacters;

class EventRequest extends FormRequest
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
                'title'     => ['required','unique:events,title'],
                'desc'      => [new MaxCharacters(200), 'required'],
                'content'   => ['required'],
                'acara'     => ['required'],
                'lokasi'    => ['required'],
                'thumbnail' => ['required','image','max:1024']
            ];
        }

        return [
            'title'     => ['required'],
            'desc'      => [new MaxCharacters(200), 'required'],
            'content'   => ['required'],
            'acara'     => ['required'],
            'lokasi'    => ['required'],
            'thumbnail' => ['image','max:1024']
        ];
    }

    public function messages()
    {
        return [
            'title.required'        => 'Title tidak boleh kosong.',
            'title.unique'          => 'Title sudah pernah digunakan.',
            'desc.required'         => 'Deskripsi tidak boleh singkat.',
            'content.required'      => 'Content tidak boleh kosong.',
            'acara.required'        => 'Acara Mulai tidak boleh kosong.',
            'lokasi.required'       => 'Lokasi Event tidak boleh kosong.',
            'thumbnail.required'    => 'Gambar Thumbnail tidak boleh kosong.',
            'thumbnail.image'       => 'Gambar Thumbnail yang di input tidak valid.',
            'thumbnail.max'         => 'Maksimal Gambar Thumbnail 1MB.'
        ];
    }
}
