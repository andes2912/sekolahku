<?php

namespace Modules\Perpustakaan\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
          'name'  => 'required|unique:categories'
        ];
    }

    public function messages()
    {
      return [
        'name.required' => 'Nama Kategori tidak boleh kosong.',
        'name.unique'   => 'Nama Kategori sudah pernah digunakan.'
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
