<?php

namespace App\Exports;

use App\Models\Loan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class LoansExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * Ambil data dari database beserta relasinya agar tidak lambat (Eager Loading)
     */
    public function collection()
    {
        return Loan::with(['inventory', 'user', 'approvedBy', 'receivedBy'])->get();
    }

    /**
     * Mapping data: Menentukan apa yang tampil di tiap kolom Excel
     */
    public function map($loan): array
    {
        return [
            $loan->id,
            $loan->inventory->name ?? 'N/A', // Menampilkan nama barang
            $loan->user->name ?? 'N/A',      // Menampilkan nama peminjam
            $loan->approvedBy->name ?? '-',    // Nama petugas yg approve
            $loan->receivedBy->name ?? '-',    // Nama petugas yg menerima kembali
            $loan->loan_date,
            $loan->due_date,
            $loan->returned_date ?? '-',
            strtoupper($loan->status),
            $loan->fine_total ?? 0,
            $loan->fine_paid_at ?? '-',
            $loan->amount_paid ?? 0,
        ];
    }

    /**
     * Header sesuai dengan urutan di fungsi map di atas
     */
    public function headings(): array
    {
        return [
            'ID Pinjam',
            'Nama Barang',
            'Nama Peminjam',
            'Disetujui Oleh',
            'Diterima Oleh',
            'Tanggal Pinjam',
            'Tenggat Kembali',
            'Tanggal Dikembalikan',
            'Status',
            'Total Denda',
            'Tanggal Bayar Denda',
            'Jumlah Dibayar',
        ];
    }
}
