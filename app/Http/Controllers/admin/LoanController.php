<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreLoanRequest;
use App\Http\Requests\Admin\UpdateLoanRequest;
use App\Models\User;
use App\Models\Inventory;
use App\Models\Loan;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $loans = Loan::where('status', ['pending', 'borrowed', 'validation'])->latest('created_at')
            ->paginate(5);
        $inventories = Inventory::all();
        $users = User::where('role', 'borrower')->get();
        return view('admin.loan.index', compact('loans', 'inventories', 'users'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLoanRequest $request)
    {

        $data = $request->validated();

        Loan::create($data);

        return redirect()->route('admin.loan.index')->with('success', 'Data berhasil ditambahkan!');
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLoanRequest $request, Loan $loan)
    {
        $data = $request->validated();

        $loan->update($data);

        return redirect()->route('admin.loan.index')->with('success', 'Data berhasil di perbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
