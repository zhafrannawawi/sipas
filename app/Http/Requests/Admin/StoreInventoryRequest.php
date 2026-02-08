<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreInventoryRequest extends FormRequest
{
    /**
     * Menentukan apakah user diizinkan menjalankan request ini.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Aturan validasi untuk data inventaris baru.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            // Nama barang wajib diisi, berupa string
            'name' => 'required|string|min:3|max:255',

            // Kode unik wajib diisi dan belum pernah ada di tabel 'inventories'
            'unique_code' => 'required|unique:inventories,unique_code',

            // Validasi Relasi: Pastikan ID kategori ada di database
            'category_id' => 'required|integer|exists:categories,id',

            // Validasi Stok: 
            // 1. required: Wajib diisi.
            // 2. integer: Harus berupa angka bulat (bukan desimal).
            // 3. min:0 : Mencegah input stok negatif (misal: -5).
            'stock' => 'required|integer|min:0'
        ];
    }

    /**
     * Pesan error kustom (Bahasa Indonesia).
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
            'unique_code.unique'   => 'Kode barang ini sudah terdaftar, gunakan yang lain!',

            // --- Validasi Kategori ---
            'category_id.required' => 'Kategori alat wajib dipilih!',
            'category_id.exists'   => 'Kategori yang dipilih tidak valid!',

            // --- Validasi Stok (Baru) ---
            'stock.required' => 'Jumlah stok wajib diisi!',
            'stock.integer'  => 'Jumlah stok harus berupa angka bulat!',
            'stock.min'      => 'Jumlah stok tidak boleh kurang dari 0!',
        ];
    }
}
