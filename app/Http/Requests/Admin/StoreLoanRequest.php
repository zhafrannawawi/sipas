<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreLoanRequest extends FormRequest
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
            'device_id'     => 'required|exists:devices,id',
            'user_id'       => 'required|exists:users,id',

            // Relasi opsional (biasanya diisi saat update/approval, tapi baiknya disiapkan)
            'approved_by'   => 'nullable|exists:users,id',
            'received_by'   => 'nullable|exists:users,id',

            // Tanggal
            'loan_date'     => 'required|date|after_or_equal:today',
            'due_date'      => 'required|date|after_or_equal:loan_date',
            'returned_date' => 'nullable|date|after_or_equal:loan_date',


            // Keuangan (Integer)
            'price_per_day' => 'nullable|integer|min:0',
            'total_price'   => 'nullable|integer|min:0',
            'pay_price'     => 'nullable|integer|min:0',
            'total_fine'    => 'nullable|integer|min:0',
            'pay_fine'      => 'nullable|integer|min:0',
        ];
    }


    public function messages(): array
    {
        return [
            // Validasi ID/Relasi
            'device_id.required'    => 'Perangkat harus dipilih.',
            'device_id.exists'      => 'Perangkat yang dipilih tidak valid atau tidak terdaftar.',
            'user_id.required'      => 'Peminjam harus ditentukan.',
            'user_id.exists'        => 'Data pengguna tidak ditemukan.',
            'approved_by.exists'    => 'Petugas pemberi persetujuan tidak valid.',
            'received_by.exists'    => 'Petugas penerima tidak valid.',

            // Validasi Tanggal
            'loan_date.required'           => 'Tanggal peminjaman wajib diisi.',
            'loan_date.date'               => 'Format tanggal peminjaman salah.',
            'loan_date.after_or_equal'     => 'Tanggal peminjaman minimal adalah hari ini.',
            'due_date.required'            => 'Tanggal jatuh tempo wajib diisi.',
            'due_date.after_or_equal'      => 'Tanggal jatuh tempo tidak boleh mendahului tanggal pinjam.',
            'returned_date.after_or_equal' => 'Tanggal pengembalian tidak valid.',

            'price_per_day.required' => 'Harga sewa per hari wajib diisi.',
            'price_per_day.integer'  => 'Harga harus berupa angka.',
            'price_per_day.min'      => 'Harga tidak boleh kurang dari 0.',
            'total_price.required'   => 'Total harga harus dihitung dan diisi.',
            'total_price.min'        => 'Total harga tidak boleh negatif.',
            'pay_price.min'          => 'Jumlah bayar tidak boleh negatif.',
        ];
    }
}
