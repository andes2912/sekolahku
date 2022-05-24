<?php

namespace Modules\Perpustakaan\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
          'name'  => 'required|unique:books',
          'description' => 'required',
          'category_id' => 'required',
          'publisher_id'  => 'required',
          'author_id' => 'required',
          'publication_year'  => 'required|numeric',
          'isbn'  => 'required',
          'stock' => 'required|numeric',
          'thumbnail' => 'required|mimes:jpg,jpeg,png'
        ];
    }

    public function messages()
    {
      return [
        'name.required'             => 'Judul Buku tidak boleh kosong.',
        'name.unique'               => 'Judul Buku sudah pernah dibuat.',
        'publication_year.required' => 'Tahun Terbit tidak boleh kosong.',
        'publication_year.numeric'  => 'Tahun Terbit hanya mendukung angka.',
        'description.required'      => 'Deskripsi tidak boleh kosong.',
        'publisher_id.required'     => 'Nama Penerbit tidak boleh kosong.',
        'category_id.required'      => 'Kategori Buku tidak boleh kosong.',
        'author_id.required'        => 'Nama Penulis tidak boleh kosong.',
        'isbn.required'             => 'Nomor ISBN tidak boleh kosong.',
        'stock.required'            => 'Stok Buku tidak boleh kosong.',
        'stock.numeric'             => 'Stok Buku hanya mendukung angka.',
        'thumbnail.required'        => 'Gambar atau Cover Buku tidak boleh kosong.',
        'thumbnail.mimes'           => 'Gambar atau Cover Buku hanya mendukung .jpg .jpeg atau .png.'
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
