<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\MaxCharacters;

class FooterRequest extends FormRequest
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
        if ($this->method() == 'POST' || 'PUT') {
            return [
                'youtube'       => ['required'],
                'instagram'     => ['required'],
                'twitter'       => ['required'],
                'facebook'      => ['required'],
                'logo'          => ['image','max:1024'],
                'whatsapp'      => ['required','numeric'],
                'telp'          => ['required','numeric'],
                'email'         => ['required','email'],
                'desc'          => [new MaxCharacters(200), 'required'],
            ];
        }
    }

    public function messages()
    {
        return [
            'youtube.required'      => 'Akun Youtube tidak boleh kosong.',
            'instagram.required'    => 'Akun Instagram tidak boleh kosong',
            'twitter.required'      => 'Akun Twitter tidak boleh kosong',
            'facebook.required'     => 'Akun Youtube Facebook boleh kosong',
            'logo.required'         => 'Logo Sekolah tidak boleh kosong',
            'logo.image'            => 'File Logo yang dimasukan tidak valid.',
            'logo.max'              => 'Maksimal File Logo tidak boleh lebih dari 1MB.',
            'whatsapp.required'     => 'Nomor WhatsApp tidak boleh kosong',
            'whatsapp.numeric'      => 'Nomor WhatsApp hanya mendukung number.',
            'telp.required'         => 'Nomor Telepon tidak boleh kosong',
            'telp.numeric'          => 'Nomor Telepon hanya mendukun number.',
            'email.required'        => 'Email tidak boleh kosong',
            'email.email'           => 'Email yang dimasukan tidak valid.',
            'desc.required'         => 'Deskripsi Sekolah tidak boleh kosong',
        ];
    }
}
