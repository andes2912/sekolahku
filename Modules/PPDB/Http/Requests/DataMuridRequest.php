<?php

namespace Modules\PPDB\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DataMuridRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'          => 'required',
            'email'         => 'required|email',
            'tempat_lahir'  => 'required',
            'tgl_lahir'     => 'required',
            'agama'         => 'required',
            'telp'          => 'required|numeric',
            'whatsapp'      => 'required|numeric',
            'alamat'        => 'required',
            'asal_sekolah'  => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required'          => 'Nama Lengkap tidak boleh kosong.',
            'email.required'         => 'Email tidak boleh kosong.',
            'email.email'       => 'Email yang digunakan tidak valid.',
            'tempat_lahir.required'  => 'Tempat Lahir tidak boleh kosong.',
            'tgl_lahir.required'     => 'Tanggal Lahir tidak boleh kosong.',
            'agama.required'         => 'Agama tidak boleh kosong.',
            'telp.required'          => 'No Telp tidak boleh kosong.',
            'telp.numeric'           => 'No Telp hanya mendukung angka.',
            'whatsapp.required'      => 'No WhatsApp tidak boleh kosong.',
            'whatsapp.numeric'       => 'No WhatsApp hanya mendukung angka.',
            'alamat.required'        => 'Alamat tidak boleh kosong.',
            'asal_sekolah.required'  => 'Asal Sekolah tidak boleh kosong.'
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
