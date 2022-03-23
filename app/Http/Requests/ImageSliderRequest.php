<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImageSliderRequest extends FormRequest
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
        return [
            'desc'      => ['required'],
            'title'     => ['required'],
            'image'     => ['required'],
            'urutan'    => ['required','unique:image_sliders']
        ];
    }

    public function messages()
    {
        return [
            'desc.required'      => 'Deskripsi tidak boleh kosong.',
            'title.required'     => 'Title tidak boleh kosong.',
            'image.required'     => 'Gambar Slider tidak boleh kosong.',
            'urutan.required'    => 'Urutan Gambar tidak boleh kosong.',
            'urutan.unique'      => 'Urutan Gambar sudah digunakan.'
        ];
    }
}
