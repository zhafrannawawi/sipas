<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateDeviceController extends FormRequest
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
            'name' => 'required|string|max:255',
            'code' => 'required',
            'string',
            'max:255',
            Rule::unique('devices', 'code')->ignore($this->route('device')),
            'category_id' => 'nullable|exists:categories,id',
            'price_per_day' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'description' => 'nullable|string', // Isi dengan "Include: 2 Controller, HDMI, dll"
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nama perangkat wajib diisi.',
            'name.string' => 'Nama perangkat harus berupa teks.',
            'name.max' => 'Nama perangkat tidak boleh lebih dari 255 karakter.',

            'code.required' => 'Kode perangkat wajib diisi.',
            'code.unique' => 'Kode perangkat sudah terdaftar, gunakan kode lain.',
            'code.max' => 'Kode perangkat tidak boleh lebih dari 255 karakter.',

            'category_id.exists' => 'Kategori yang dipilih tidak valid.',

            'price_per_day.required' => 'Harga sewa per hari wajib diisi.',
            'price_per_day.numeric' => 'Harga harus berupa angka.',
            'price_per_day.min' => 'Harga tidak boleh kurang dari 0.',

            'stock.required' => 'Jumlah stok wajib diisi.',
            'stock.integer' => 'Stok harus berupa bilangan bulat.',
            'stock.min' => 'Stok tidak boleh kurang dari 0.',

            'description.string' => 'Deskripsi harus berupa teks.',
        ];
    }
}
