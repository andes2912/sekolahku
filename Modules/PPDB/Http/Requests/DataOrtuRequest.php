<?php

namespace Modules\PPDB\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DataOrtuRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */ 
    public function rules()
    {
        return [
            'nama_ayah'         => 'required',
            'pendidikan_ayah'   => 'required',
            'pekerjaan_ayah'    => 'required',
            'telp_ayah'         => 'required|numeric',
            'alamat_ayah'       => 'required',

            'nama_ibu'         => 'required',
            'pendidikan_ibu'   => 'required',
            'pekerjaan_ibu'    => 'required',
            'telp_ibu'         => 'required|numeric',
            'alamat_ibu'       => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nama_ayah.required'        => 'Nama Ayah tidak boleh kosong.',
            'pendidikan_ayah.required'  => 'Pendidikan Ayah tidak boleh kosong.',
            'pekerjaan_ayah.required'   => 'Pekerjaan Ayah tidak boleh kosong.',
            'telp_ayah.required'        => 'No Telp/WhatsApp tidak boleh kosong.',
            'telp_ayah.numeric'         => 'No Telp/WhatsApp hanya mendukung angka.',
            'alamat_ayah.required'      => 'Alamat Ayah tidaj boleh kosong.',

            'nama_ibu.required'        => 'Nama Ibu tidak boleh kosong.',
            'pendidikan_ibu.required'  => 'Pendidikan Ibu tidak boleh kosong.',
            'pekerjaan_ibu.required'   => 'Pekerjaan Ibu tidak boleh kosong.',
            'telp_ibu.required'        => 'No Telp/WhatsApp tidak boleh kosong.',
            'telp_ibu.numeric'         => 'No Telp/WhatsApp hanya mendukung angka.',
            'alamat_ibu.required'      => 'Alamat Ibu tidaj boleh kosong.'
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
