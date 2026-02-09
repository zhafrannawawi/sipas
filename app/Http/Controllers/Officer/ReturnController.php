<?php

namespace App\Http\Controllers\Officer;

use App\Exports\LoansExport; // Import class export 
use Maatwebsite\Excel\Facades\Excel; // Import Facade Excel
use App\Http\Controllers\Controller;
use App\Models\Loan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class ReturnController extends Controller
{
    public function index()
    {
        $returns = Loan::whereIn('status', ['borrowed', 'validation', 'returned'])->paginate(5);

        return view('officer.return.index', compact('returns'));
    }

    public function returnLoan(Request $request, Loan $loan)
    {
        // 1. Panggil Model untuk hitung denda real-time
        $systemFine = $loan->calculateFine();

        // 2. Validasi Input
        // Kalau denda > 0, wajib isi. Kalau 0, boleh kosong/0.
        $request->validate([
            'amount_paid' => $systemFine > 0 ? 'required|numeric|min:0' : 'nullable'
        ]);

        // 3. Logic: Cek Pembayaran (English Var)
        $receivedAmount = $request->amount_paid ?? 0;
        $changeAmount   = 0;

        // Jika ada denda, kita cek duitnya
        if ($systemFine > 0) {

            // Cek Kurang Bayar
            if ($receivedAmount < $systemFine) {
                $shortage = number_format($systemFine - $receivedAmount);
                return redirect()->back()
                    ->with('error', "Uang denda kurang Rp $shortage. Harap lunasi.");
            }

            // Hitung Kembalian
            $changeAmount = $receivedAmount - $systemFine;
        }

        // 4. Proses Transaksi
        try {
            DB::transaction(function () use ($loan, $systemFine, $receivedAmount) {

                // A. Update Stok (Penting!)
                // Kembalikan stok PS ke database
                $loan->device()->increment('stock');

                // B. Tutup Peminjaman
                $loan->update([
                    'status'        => 'returned',
                    'returned_date' => now(),       // Catat jam sekarang
                    'fine_total'    => $systemFine, // Simpan total denda
                    'fine_paid'     => $receivedAmount, // Simpan uang yg diterima
                ]);
            });
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error System: ' . $e->getMessage());
        }

        // 5. Pesan Sukses Dinamis
        $msg = 'Pengembalian Berhasil.';

        if ($systemFine > 0) {
            $msg .= ' Denda Lunas.';
            if ($changeAmount > 0) {
                $msg .= ' KEMBALIAN: Rp ' . number_format($changeAmount);
            } else {
                $msg .= ' Uang Pas.';
            }
        } else {
            $msg .= ' Tepat Waktu (Tanpa Denda).';
        }

        return redirect()->route('officer.loan.index')->with('success', $msg);
    }

    public function export()
    {
        return Excel::download(new LoansExport, 'laporan-peminjaman.xlsx');
    }
}
