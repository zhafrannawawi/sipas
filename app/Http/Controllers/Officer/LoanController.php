<?php

namespace App\Http\Controllers\Officer;

use App\Http\Controllers\Controller;
use App\Models\Loan;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $loans = Loan::latest()->where('status', 'pending')->paginate(5);
        return view('officer.loan.index', compact('loans'));
    }

    public function approve(Request $request, Loan $loan)
    {
        // 1. Validation (Validasi Input)
        $request->validate([
            'pay_price' => 'required|numeric|min:0'
        ], [
            'pay_price.required' => 'Nominal pembayaran wajib diisi!',
        ]);

        // 2. Check Status (Cek Status biar gak double)
        if ($loan->status !== 'pending') {
            return redirect()->back()->with('error', 'Transaksi ini sudah diproses sebelumnya.');
        }

        // --- LOGIC: CHECK UNDERPAYMENT & CHANGE (Cek Kurang & Kembalian) ---

        // English Variables
        $totalAmount    = $loan->total_price;
        $receivedAmount = $request->pay_price;

        // Scenario 1: Underpayment (Uang Kurang -> TOLAK)
        if ($receivedAmount < $totalAmount) {
            $shortage = number_format($totalAmount - $receivedAmount); // Hitung selisih
            return redirect()->back()
                ->with('error', "Uang tidak cukup! Kurang Rp $shortage. Rental wajib lunas di depan.");
        }

        // Scenario 2: Calculate Change (Hitung Kembalian)
        $changeAmount = $receivedAmount - $totalAmount;

        // --------------------------------------------------

        try {
            DB::transaction(function () use ($loan, $request) {

                $device = $loan->device;

                // Check Stock (Cek Stok Fisik)
                if ($device->stock <= 0) {
                    throw new \Exception("Stok PS habis! Jangan di-approve.");
                }

                // Decrement Stock
                $device->decrement('stock');

                // Update Transaction Data
                $loan->update([
                    'status'      => 'borrowed',
                    'approved_by' => Auth::id(),
                    'pay_price'   => $request->pay_price,
                ]);
            });
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal: ' . $e->getMessage());
        }

        // --- DYNAMIC SUCCESS MESSAGE (Pesan Sukses Pintar) ---
        $successMessage = 'Berhasil! Unit PS diserahkan.';

        // Logic: Kalau ada kembalian, kasih tau nominalnya
        if ($changeAmount > 0) {
            $successMessage .= ' JANGAN LUPA KEMBALIAN: Rp ' . number_format($changeAmount);
        } else {
            $successMessage .= ' Uang Pas.';
        }

        return redirect()->route('officer.loan.index')
            ->with('success', $successMessage);
    }

}
