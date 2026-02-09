<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreUserRequest;
use App\Http\Requests\Admin\UpdateUserRequest;

use App\Models\User;

class BorrowerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $borrowers = User::where('role', 'borrower')->orderBy('name', 'ASC')->paginate(5);
        return view('admin.borrower.index', compact('borrowers'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $data = $request->validated();
        $data['role'] = 'borrower';

        User::create($data);

        return redirect()->route('admin.borrower.index')->with('success', 'Data berhasil ditambahkan!.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $data = $request->validated();

        $user->update($data);

        return redirect()->route('admin.borrower.index')->with('success', 'Data peminjam berhasil diperbarui!.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.borrower.index')->with('success', 'Data peminjam berhasil diperbarui!.');
    }
}
