<?php

namespace Modules\Murid\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConfirmPaymentRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'file'              => 'required_if:file,null|mimes:jpg,jpeg,png',
            'sender'            => 'required',
            'bank_sender'       => 'required',
            'destination_bank'  => 'required',
            'date_file'         => 'required'
        ];
    }

    public function messages()
    {
        return [
            'file.required'         => 'File Bukti Pembayaran tidak boleh kosong.',
            'file.mimes'            => 'File Bukti Pembayaran tidak valid.',
            'sender.required'       => 'Nama Pengirim tidak boleh kosong.',
            'bank_sender.required'  => 'Bank Pengirim tidak boleh kosong.',
            'destination_bank'      => 'Bank Tujuan tidak boleh kosong.',
            'date_file.required'    => 'Tanggal Transfer tidak boleh kosong.'
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
