<?php

namespace Modules\PPDB\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'                  => 'required',
            'email'                 => 'required|email|unique:users',
            'password'              => 'required',
            'confirm_password'      => 'required|same:password',
            'whatsapp'              => 'required|numeric|unique:data_murids',
            'asal_sekolah'          => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required'         => 'Nama Lengkap tidak boleh kosong.',
            'email.required'        => 'Email tidak boleh kosong.',
            'email.email'           => 'Email yang digunakan tidak valid.',
            'email.unique'          => 'Email sudah pernah digunakan.',
            'password.required'     => 'Password tidak boleh kosong.',
            'confirm_password.required' => 'Konfirmasi Password tidak sesuai.',
            'whatsapp.required'     => 'Nomor WhatasApp tidak boleh kosong.',
            'whatsapp.numeric'      => 'Nomor WhatsApp tidak valid.',
            'whatsapp.unique'       => 'Nomor WhatsApp sudah pernah digunakan.',
            'asal_sekolah.required' => 'Asal Sekolah tidak boleh kosong.'

        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
