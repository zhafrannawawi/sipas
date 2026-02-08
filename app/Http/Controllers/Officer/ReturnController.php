<?php

namespace App\Http\Controllers\Officer;

use App\Exports\LoansExport; // Import class export 
use Maatwebsite\Excel\Facades\Excel; // Import Facade Excel
use App\Http\Controllers\Controller;
use App\Models\Loan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReturnController extends Controller
{
    public function index()
    {
        $returns = Loan::whereIn('status', ['borrowed', 'validation', 'returned'])->paginate(5);

        return view('officer.return.index', compact('returns'));
    }

    public function approveReturn(Loan $loan)
    {
        if ($loan->status !== 'validation') {
            return back()->with('error', 'Aksi tidak valid! Barang belum dikembalikan oleh user atau sudah diproses.');
        }

        DB::transaction(function () use ($loan) {
            $loan->update([
                'status'        => 'returned',
                'received_by'   => Auth::id(),
            ]);

            $loan->inventory->increment('stock');
        });

        return redirect()->route('officer.return.index')
            ->with('success', 'Pengembalian berhasil divalidasi dan stok telah diperbarui!');
    }

    public function export()
    {
        return Excel::download(new LoansExport, 'laporan-peminjaman.xlsx');
    }
}
