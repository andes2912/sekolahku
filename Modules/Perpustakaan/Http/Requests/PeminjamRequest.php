<?php

namespace Modules\Perpustakaan\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PeminjamRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
          'book_id'     => 'required:exist,books',
          'member_id'   => 'required:exist,members',
          'borrow_date' => 'required|date',
          'return_date' => 'required|date'
        ];
    }

    public function messages()
    {
      return [
        'book_id.required'      => 'Buku wajib di pilih.',
        'member_id.required'    => 'Peminjam Wajib di pilih.',
        'borrow_date.required'  => 'Tanggal Pinjam tidak boleh kosong.',
        'borrow_date.date'      => 'Tanggal Pinjam tidak valid.',
        'return_date.required'  => 'Tanggal Kembali tidak boleh kosong.',
        'return_date.date'      => 'Tanggal Kembali tidak valid'
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
