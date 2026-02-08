<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */

    public function rules(): array
    {
        return [
            // Email wajib, format harus valid, dan belum pernah ada di tabel 'administrators'
            'email' => 'required|email|unique:users,email|min:3|max:255',

            // Nama wajib diisi dengan batasan panjang karakter
            'name' => 'required|min:3|max:255',

            // Password wajib. 'confirmed' berarti input harus cocok dengan field 'password_confirmation'
            'password' => 'required|confirmed|min:8|max:255',

            // No. HP wajib angka, panjang 10-13 digit, dan unik di database
            'phone_number' => 'required|digits_between:10,13|unique:users,phone_number',
        ];
    }

    public function messages()
    {
        return [
            // Pesan error untuk field 'name'
            'name.required' => 'Kolom nama wajib diisi!',
            'name.string' => 'Kolom nama harus berupa karakter!',
            'name.min' => 'Kolom nama minimal :min karakter!',
            'name.max' => 'Kolom nama maksimal :max karakter!',

            // Pesan error untuk field 'email'
            'email.required' => 'Kolom alamat email wajib diisi!',
            'email.email' => 'Kolom alamat email wajib email yang valid!',
            'email.unique' => 'Alamat email sudah terdaftar!',
            'email.min' => 'Kolom alamat email minimal :min karakter!',
            'email.max' => 'Kolom alamat email maksimal :max karakter!',

            // Pesan error untuk field 'password'
            'password.required' => 'Kolom password wajib diisi!',
            'password.confirmed' => 'Kolom konfirmasi password tidak sesuai!', // Muncul jika password != password_confirmation
            'password.min' => 'Kolom password minimal :min karakter!',
            'password.max' => 'Kolom password maksimal :max karakter!',

            // Pesan error untuk field 'phone_number'
            'phone_number.required' => 'Kolom nomor handphone wajib diisi!',
            'phone_number.string' => 'Kolom nomor handphone harus berupa angka!',
            'phone_number.unique' => 'Nomor handphone sudah terdaftar!',
            'phone_number.min' => 'Nomor handphone minimal :min digit.',
            'phone_number.max' => 'Nomor handphone maksimal :max digit.',
        ];
    }
}
