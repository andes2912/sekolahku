<?php

namespace Modules\Perpustakaan\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PublisherRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'    => 'required|unique:publishers',
            'address' => 'required',
            'phone'   => 'required|numeric'
        ];
    }

    public function messages()
    {
      return [
        'name.required'     => 'Nama Penerbit tidak boleh kosong.',
        'name.unique'       => 'Nama Penerbit sudah pernah dibuat.',
        'address.required'  => 'Alamat tidak boleh kosong.',
        'phone.required'    => 'Telephone tidak boleh kosong.',
        'phone.numeric'     => 'Telephone hanya mendukung angka.'
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
