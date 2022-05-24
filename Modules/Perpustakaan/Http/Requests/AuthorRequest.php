<?php

namespace Modules\Perpustakaan\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthorRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'  => 'required|unique:authors'
        ];
    }

    public function messages()
    {
      return [
        'name.required' => 'Nama Penulis tidak boleh kosong.',
        'name.unique'   => 'Nama Penulis sudah pernah dibuat.'
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
