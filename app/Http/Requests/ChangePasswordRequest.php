<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
class ChangePasswordRequest extends FormRequest
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
            'current_password'      => 'required|password',
            'password'              => 'required|min:8|max:255',
            'password_confirmation' => 'required_with:password|same:password|min:8|max:255',
        ];
    }

    public function messages()
    {
        return [
            'current_password.required'         => 'Password tidak boleh kosong.',
            'current_password.password'         => 'Password yang dimasukan salah.',
            'password.required'                 => 'Password Baru tidak boleh kososng.',
            'password.min'                      => 'Password minimal 8 karakter.',
            'password.max'                      => 'password maksimal 255 karakter.',
            'password_confirmation.required'    => 'Password Konfirmasi tidak boleh kosong.',
            'password_confirmation.password'    => 'Password Konfirmasi yang dimasukan tidak cocok.',
            'password_confirmation.min'         => 'Password Konfirmasi minimal 8 karakter.',
            'password_confirmation.max'         => 'Password Konfirmasi maksimal 8 karakter.'

        ];
    }
}
