<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KategoriBeritaRequest extends FormRequest
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
                'nama'      => ['required','unique:kategori_beritas'],
                'is_active' => ['required']
            ];
        }

        return [
            'nama'      => ['required'],
            'is_active' => ['required']
        ];
    }

    public function messages()
    {
        return [
            'nama.required'         => 'Kategori tidak boleh kosong.',
            'nama.unique'           => 'Kategori sudah pernah digunakan.',
            'is_active.required'    => 'Status harus dipilih.'
        ];
    }
}
