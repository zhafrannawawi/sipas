<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateInventoryRequest extends FormRequest
{
    /**
     * Menentukan apakah user diizinkan menjalankan request ini.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Aturan validasi untuk update data inventaris.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            // Validasi Nama (Sama seperti Store)
            'name' => 'required|string|min:3|max:255',

            // Validasi Kode Unik (KHUSUS UPDATE)
            'unique_code' => [
                'required',
                // PENTING: ignore($this->inventory)
                // Artinya: "Cek keunikan kode di seluruh tabel, KECUALI untuk barang yang sedang diedit ini."
                // Tanpa ini, jika Anda simpan tanpa mengubah kode, sistem akan error "Sudah terdaftar".
                Rule::unique('inventories', 'unique_code')->ignore($this->inventory),
            ],

            // Validasi Relasi Kategori
            'category_id' => 'required|integer|exists:categories,id',

            // Validasi Stok (Konsisten dengan StoreRequest)
            'stock' => 'required|integer|min:0'
        ];
    }

    /**
     * Pesan error kustom.
     */
    public function messages()
    {
        return [
            // --- Validasi Nama ---
            'name.required' => 'Nama alat wajib diisi!',
            'name.string'   => 'Nama alat harus berupa teks!',
            'name.min'      => 'Nama alat minimal :min karakter!',
            'name.max'      => 'Nama alat maksimal :max karakter!',

            // --- Validasi Kode Unik ---
            'unique_code.required' => 'Kode barang wajib diisi!',
            'unique_code.unique'   => 'Kode barang ini sudah digunakan barang lain!',

            // --- Validasi Kategori ---
            'category_id.required' => 'Kategori alat wajib dipilih!',
            'category_id.exists'   => 'Kategori yang dipilih tidak valid!',

            // --- Validasi Stok ---
            'stock.required' => 'Jumlah stok wajib diisi!',
            'stock.integer'  => 'Jumlah stok harus berupa angka bulat!',
            'stock.min'      => 'Jumlah stok tidak boleh kurang dari 0!',
        ];
    }
}
