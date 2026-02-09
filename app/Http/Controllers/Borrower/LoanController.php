<?php

namespace App\Http\Controllers\Borrower;

use App\Http\Controllers\Controller;
use App\Http\Requests\Borrower\StoreLoanRequest;
use App\Models\Device;
use App\Models\Inventory;
use App\Models\Loan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoanController extends Controller
{

    public function index()
    {
        $devices = Device::all();

        $loans = Loan::where('user_id', Auth::id())->whereIn('status', ['pending', 'borrowed', 'validation', 'Overdue'])->latest()->paginate(5);
        return view('borrower.loan.index', compact('devices', 'loans'));
    }

    public function storeLoan(StoreLoanRequest $request)
    {
        // 1. Validasi input
        $data = $request->validated();

        // 2. Buat instance Loan baru (jangan save dulu)
        $loan = new Loan($data);

        $loan->user_id = Auth::id();
        // --------------------------------

        // 3. Ambil data Device 
        $device = Device::findOrFail($request->device_id);

        // 4. Set harga & status 
        $loan->price_per_day = $device->price_per_day;
        $loan->status = 'pending';

        // 5. Hitung Total Harga pakai Model 
        // Ini wajib dipanggil biar total_price terisi
        $loan->calculatePrice();

        // 6. Simpan
        $loan->save();

        return redirect()->route('borrower.loan.index')
            ->with('success', 'Pengajuan berhasil! Estimasi Biaya: Rp ' . number_format($loan->total_price));
    }

    public function updateLoan(Request $request, Loan $loan)
    {
        // 1. Cek Keamanan: Apakah ini punya user yang login?
        if ($loan->user_id !== Auth::id()) {
            abort(403, 'Anda tidak memiliki akses ke data ini.');
        }

        // 2. Cek Status
        if ($loan->status !== 'pending') {
            return redirect()->back()->with('error', 'Pinjaman tidak dapat diedit karena sudah diproses.');
        }

        // 3. Validasi
        $validated = $request->validate([
            'inventory_id' => 'required|exists:inventories,id',
            'loan_date'    => 'required|date',
            'due_date'     => 'required|date|after_or_equal:loan_date',
        ]);

        // 4. Update
        $loan->update($validated);

        return redirect()->route('borrower.loan.index')->with('success', 'Pinjaman berhasil diperbarui.');
    }

    public function cancelLoan(Loan $loan)
    {
        // 1. Cek Keamanan
        if ($loan->user_id !== Auth::id()) {
            abort(403, 'Anda tidak memiliki akses ke data ini.');
        }

        // 2. Cek Status
        if ($loan->status !== 'pending') {
            return redirect()->back()->with('error', 'Pinjaman tidak bisa dibatalkan karena sudah diproses.');
        }

        // 3. Update Status
        $loan->update(['status' => 'canceled']);

        return redirect()
            ->route('borrower.loan.index')
            ->with('success', 'Pengajuan pinjaman berhasil dibatalkan.');
    }

    public function returnLoan(Request $request, Loan $loan)
    {

        if ($loan->status !== 'borrowed') {
            return redirect()->back()->with('error', 'Status peminjaman tidak valid.');
        }

        // Ubah status jadi 'return_pending'
        $loan->update([
            'status' => 'validation'
        ]);

        return redirect()->back()
            ->with('success', 'Permintaan pengembalian dikirim. Harap serahkan unit PS ke Petugas/Kasir untuk verifikasi akhir.');
    }
}
