<?php

namespace App\Observers;

use App\Models\Loan;
use App\Models\ActivityLog;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;


class LoanObserver
{
    /**
     * Handle the Loan "created" event.
     */
    public function created(Loan $loan): void
    {
        ActivityLog::create([
            'user_id'  => Auth::id(),
            'action'   => 'create',
            'activity' => "Membuat data peminjaman (ID: {$loan->id})"
        ]);
    }

    /**
     * Handle the Loan "updated" event.
     */
    public function updated(Loan $loan): void
    {
        $changes = [];

        // 1. Daftar kolom yang ingin diabaikan
        $ignoredColumns = ['updated_at', 'approved_by', 'received_by', 'returned_date'];

        $dateColumns = ['loan_date', 'due_date', 'returned_date'];

        $statusMap = [
            'pending'  => 'Menunggu Persetujuan',
            'borrowed' => 'Sedang Dipinjam',
            'validation' => 'Menunggu Validasi',
            'returned' => 'Sudah Dikembalikan',            // Tambahkan status lain di sini sesuai database kamu
        ];

        // 2. Loop semua kolom yang berubah (dirty attributes)
        foreach ($loan->getDirty() as $column => $newValue) {

            // Lewati kolom yang diabaikan
            if (in_array($column, $ignoredColumns)) {
                continue;
            }

            $originalValue = $loan->getOriginal($column);

            if ($column === 'status') {
                // Cek di kamus, kalau tidak ada pakai nilai aslinya
                $originalValue = $statusMap[$originalValue] ?? $originalValue;
                $newValue      = $statusMap[$newValue] ?? $newValue;
            }

            if (in_array($column, $dateColumns)) {
                try {
                    // Format Nilai LAMA
                    if ($originalValue) {
                        $originalValue = Carbon::parse($originalValue)->format('Y-m-d');
                    }

                    // Format Nilai BARU
                    if ($newValue) {
                        $newValue = Carbon::parse($newValue)->format('Y-m-d');
                    }
                } catch (\Exception $e) {
                    // Jika gagal parsing, biarkan apa adanya (safety net)
                }
            }

            // 4. Format pesan agar enak dibaca 
            // Misal: 'stock' jadi 'Stok', 'name' jadi 'Nama Barang'
            $columnName = ucfirst(str_replace('_', ' ', $column));

            // Masukkan ke array changes
            $changes[] = "$columnName berubah dari '$originalValue' menjadi '$newValue'";
        }

        // 5. Jika ada perubahan yang dicatat, simpan ke log
        if (!empty($changes)) {
            ActivityLog::create([
                'user_id'  => Auth::id(),
                'action'   => 'update',
                // Gabungkan semua perubahan dengan koma. 
                // Contoh: "Nama berubah dari A ke B, Stok berubah dari 10 ke 5"
                'activity' => "Memperbarui peminjaman (ID: {$loan->id}): " . implode(', ', $changes)
            ]);
        }
    }

    /**
     * Handle the Loan "deleted" event.
     */
    public function deleted(Loan $loan): void
    {
        ActivityLog::create([
            'user_id'  => Auth::id(),
            'action'   => 'delete',
            'activity' => "Menghapus data peminjaman (ID: {$loan->id})"
        ]);
    }

    /**
     * Handle the Loan "restored" event.
     */
    public function restored(Loan $loan): void
    {
        //
    }

    /**
     * Handle the Loan "force deleted" event.
     */
    public function forceDeleted(Loan $loan): void
    {
        //
    }
}
