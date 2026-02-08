<?php

namespace App\Http\Controllers\Borrower;

use App\Http\Controllers\Controller;
use App\Http\Requests\Borrower\StoreLoanRequest;
use App\Models\Inventory;
use App\Models\Loan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoanController extends Controller
{

    public function index()
    {
        $inventories = Inventory::all();

        $loans = Loan::where('user_id', Auth::id())->whereIn('status', ['pending', 'borrowed', 'validation', 'Overdue'])->latest()->paginate(5);
        return view('borrower.loan.index', compact('inventories', 'loans'));
    }

    public function storeLoan(StoreLoanRequest $request)
    {

        $data = $request->validated();

        $data['user_id'] = Auth::id();
        $data['status']  = 'pending';

        Loan::create($data);

        return redirect()->route('borrower.loan.index')->with('success', 'Pengajuan pinjaman berhasil.');
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


        // Hitung denda
        $fine = $loan->calculateFine();

        if ($request->amount_paid < $fine) {
            return redirect()->route('borrower.loan.index')->with('error', 'Pembayaran kurang dari denda.');
        }

        // Update loan sekaligus
        $loan->update([
            'status'        => 'validation',
            'returned_date' => Carbon::now(),
            'fine_total'    => $fine,
            'amount_paid'   => $request->amount_paid,
            'fine_paid_at'  => Carbon::now(),
        ]);

        $message = $fine > 0
            ? "Alat dikembalikan. Denda Rp " . number_format($fine, 0, ',', '.') . " telah dicatat."
            : "Alat dikembalikan tepat waktu. Menunggu validasi admin.";

        return redirect()->back()->with('success', $message);
    }
}
