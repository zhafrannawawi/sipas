<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreBorrowerRequest extends FormRequest
{
    /**
     * Menentukan apakah user diizinkan menjalankan request ini.
     * * @return bool
     */
    public function authorize(): bool
    {
        // Return true agar validasi data diproses. 
        // Logika pembatasan hak akses sebaiknya dilakukan di Middleware/Policy.
        return true;
    }

    /**
     * Aturan validasi untuk data peminjam (borrower).
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            // Email wajib diisi dan harus unik (belum pernah ada) di tabel 'borrowers'
            'email' => 'required|unique:borrowers,email|min:3|max:255',

            // Nama peminjam wajib diisi
            'name' => 'required|min:3|max:255',

            // Password wajib & harus dikonfirmasi (input 'password' harus sama dengan 'password_confirmation')
            'password' => 'required|confirmed|min:8|max:255',

            // No. HP wajib angka, panjang spesifik 10-13 digit, dan unik untuk peminjam ini
            'phone_number' => 'required|digits_between:10,13|unique:borrowers,phone_number',

            // Alamat wajib diisi
            'address' => 'required|min:3|max:255',
        ];
    }

    /**
     * Kustomisasi pesan error agar lebih mudah dipahami oleh user
     */
    public function messages()
    {
        return [
            // --- Validasi Nama ---
            'name.required' => 'Kolom nama wajib diisi!',
            'name.string' => 'Kolom nama harus berupa karakter!',
            'name.min' => 'Kolom nama minimal :min karakter!',
            'name.max' => 'Kolom nama maksimal :max karakter!',

            // --- Validasi Email ---
            'email.required' => 'Kolom alamat email wajib diisi!',
            'email.email' => 'Kolom alamat email wajib email yang valid!',
            'email.unique' => 'Alamat email sudah terdaftar sebagai peminjam!', // Spesifik untuk borrower
            'email.min' => 'Kolom alamat email minimal :min karakter!',
            'email.max' => 'Kolom alamat email maksimal :max karakter!',

            // --- Validasi Alamat ---
            // Note: Pastikan pesan di sini merujuk ke 'alamat', bukan 'name'
            'address.required' => 'Kolom alamat wajib diisi!',
            'address.min' => 'Kolom alamat minimal :min karakter!',
            'address.max' => 'Kolom alamat maksimal :max karakter!',

            // --- Validasi Password ---
            'password.required' => 'Kolom password wajib diisi!',
            'password.confirmed' => 'Kolom konfirmasi password tidak sesuai!',
            'password.min' => 'Kolom password minimal :min karakter!',
            'password.max' => 'Kolom password maksimal :max karakter!',

            // --- Validasi No. Handphone ---
            'phone_number.required' => 'Kolom nomor handphone wajib diisi!',
            'phone_number.numeric' => 'Kolom nomor handphone harus berupa angka!',
            'phone_number.unique' => 'Nomor handphone sudah terdaftar!',
            // Menggunakan 'digit' untuk angka, bukan 'karakter'
            'phone_number.min' => 'Nomor handphone minimal :min digit.',
            'phone_number.max' => 'Nomor handphone maksimal :max digit.',
        ];
    }
}
