<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreUserRequest;
use App\Http\Requests\Admin\UpdateUserRequest;
use App\Models\User;

class OfficerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $officers = User::where('role', 'officer')->orderBy('name', 'ASC')->paginate(5);
        return view('admin.officer.index', compact('officers'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $data = $request->validated();
        $data['role'] = 'officer';

        User::create($data);
        return redirect()->route('admin.officer.index')->with('success', 'Data berhasil ditambahkan');
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $officer)
    {
        $data = $request->validated();
        $officer->update($data);

        return redirect()->route('admin.officer.index')->with('success', 'Data berhasil diperbarui!.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.officer.index')->with('success', 'Data berhasil diperbarui!.');
    }
}
