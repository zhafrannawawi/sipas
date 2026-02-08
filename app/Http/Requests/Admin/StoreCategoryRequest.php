<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
{
    /**
     * Menentukan apakah user diizinkan menjalankan request ini.
     */
    public function authorize(): bool
    {
        // Return true agar validasi bisa diproses.
        // Asumsi: Pengecekan apakah user adalah 'Admin' sudah dilakukan di Middleware/Route.
        return true;
    }

    /**
     * Aturan validasi yang diterapkan saat membuat kategori baru.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            // Validasi 'name':
            // 1. required: Input tidak boleh kosong / null.
            // 2. string: Memastikan input berupa teks, bukan array atau file.
            // 3. min/max: Mencegah nama kategori yang terlalu pendek (tidak jelas) atau terlalu panjang (melebihi kolom database).
            'name' => 'required|string|min:3|max:255'
        ];
    }

    /**
     * Kustomisasi pesan error ke Bahasa Indonesia.
     */
    public function messages()
    {
        return [
            'name.required' => 'Kolom nama kategori wajib diisi!',
            'name.string' => 'Kolom nama kategori wajib karakter!',

            // :min dan :max adalah placeholder yang otomatis mengambil angka dari function rules()
            'name.min' => 'Kolom nama kategori minimal :min karakter!',
            'name.max' => 'Kolom nama kategori maksimal :max karakter!',
        ];
    }
}
