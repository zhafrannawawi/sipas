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
            'inventory_id' => 'required|exists:inventories,id',
            'user_id' => 'required|exists:users,id',
            'loan_date'    => 'required|date|after_or_equal:today',
            'due_date'     => 'required|date|after_or_equal:loan_date',
        ];
    }


    public function messages(): array
    {
        return [
            'inventory_id.required' => 'Inventaris wajib dipilih.',
            'inventory_id.exists'   => 'Inventaris tidak valid.',
            'loan_date.required'    => 'Tanggal pinjam wajib diisi.',
            'loan_date.date'        => 'Format tanggal pinjam tidak valid.',
            'loan_date.after_or_equal' => 'Tanggal pinjam tidak boleh sebelum hari ini.',
            'due_date.required'     => 'Tanggal pengembalian wajib diisi.',
            'due_date.date'         => 'Format tanggal pengembalian tidak valid.',
            'due_date.after_or_equal' => 'Tanggal pengembalian tidak boleh sebelum tanggal pinjam.',
        ];
    }
}
