<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateBorrowerRequest extends FormRequest
{
    /**
     * Mengizinkan request ini diproses. 
     * Pastikan logic autentikasi admin sudah ditangani di level middleware.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Definisi aturan validasi pembaruan data peminjam (Borrower).
     */
    public function rules(): array
    {
        return [
            'email' => [
                'required',
                'email',
                'min:3',
                'max:255',
                // Mengabaikan email milik borrower ini sendiri agar tidak dianggap duplikat saat update
                Rule::unique('borrowers', 'email')
                    ->ignore($this->route('borrower')->id),
            ],

            'name' => 'required|min:3|max:255',

            // 'nullable' berarti jika input dikosongkan, password lama tidak akan berubah
            'password' => 'nullable|confirmed|min:8|max:255',

            'phone_number' => [
                'required',
                'digits_between:10,13',
                // Validasi unik agar nomor HP tidak bentrok dengan user lain
                Rule::unique('borrowers', 'phone_number')
                    ->ignore($this->route('borrower')->id),
            ],

            'address' => 'required|min:3|max:255',
        ];
    }

    /**
     * Pesan error khusus dalam Bahasa Indonesia untuk user experience yang lebih baik.
     */
    public function messages()
    {
        return [
            // Email messages
            'email.required' => 'Kolom alamat email wajib diisi!',
            'email.email'    => 'Kolom alamat email wajib email yang valid!',
            'email.unique'   => 'Alamat email sudah terdaftar!',
            'email.min'      => 'Kolom alamat email minimal :min karakter!',
            'email.max'      => 'Kolom alamat email maksimal :max karakter!',

            // Name messages
            'name.required' => 'Kolom nama wajib diisi!',
            'name.min'      => 'Kolom nama minimal :min karakter!',
            'name.max'      => 'Kolom nama maksimal :max karakter!',

            // Password messages
            'password.confirmed' => 'Kolom konfirmasi password tidak sesuai!',
            'password.min'       => 'Kolom password minimal :min karakter!',
            'password.max'       => 'Kolom password maksimal :max karakter!',

            // Phone Number messages
            'phone_number.required' => 'Kolom nomor handphone wajib diisi!',
            'phone_number.unique'   => 'Nomor handphone sudah terdaftar!',
            'phone_number.digits_between' => 'Nomor handphone harus antara :min sampai :max digit.',

            // Address messages
            'address.required' => 'Kolom alamat wajib diisi!',
            'address.min'      => 'Kolom alamat minimal :min karakter!',
            'address.max'      => 'Kolom alamat maksimal :max karakter!',
        ];
    }
}
