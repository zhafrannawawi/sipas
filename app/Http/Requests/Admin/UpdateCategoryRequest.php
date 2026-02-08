<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
{
    /**
     * Menentukan apakah pengguna memiliki otoritas untuk memperbarui kategori.
     * Mengembalikan true agar validasi dilanjutkan.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Mendefinisikan aturan validasi untuk memperbarui nama kategori.
     */
    public function rules(): array
    {
        return [
            // Memastikan nama kategori valid secara tipe data dan panjang karakter
            'name' => 'required|string|min:3|max:255'
        ];
    }

    /**
     * Kustomisasi pesan kesalahan agar lebih spesifik pada konteks "Kategori".
     */
    public function messages()
    {
        return [
            'name.required' => 'Kolom nama kategori wajib diisi!',
            'name.string'   => 'Kolom nama kategori wajib karakter!',
            'name.min'      => 'Kolom nama kategori minimal :min karakter!',
            'name.max'      => 'Kolom nama kategori maksimal :max karakter!',
        ];
    }
}