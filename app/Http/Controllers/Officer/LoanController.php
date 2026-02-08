<?php

namespace App\Http\Controllers\Officer;

use App\Http\Controllers\Controller;
use App\Models\Loan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

    public function approve(Loan $loan)
    {
        if ($loan->status !== 'pending') {
            return redirect()
                ->route('officer.loan.index')
                ->with('error', 'Peminjaman ini sudah diproses');
        }

        DB::transaction(function ()  use ($loan) {
            $inventory = $loan->inventory();

            $inventory->decrement('stock');

            $loan->update([
                'status' => 'borrowed',
                'approved_by' => Auth::id(),
            ]);
        });


        return redirect()
            ->route('officer.loan.index')
            ->with('success', 'Peminjaman berhasil disetujui!');
    }
}
