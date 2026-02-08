<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreInventoryRequest;
use App\Http\Requests\Admin\UpdateInventoryRequest;
use App\Models\Category;
use App\Models\Inventory;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $inventories = Inventory::paginate(5);
        $categories = Category::all();
    return view('admin.inventory.index', compact('inventories', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreInventoryRequest $request)
    {
        Inventory::create($request->validated());

        return redirect()->route('admin.inventory.index')->with('success', 'Data berhasil ditambahkan!');
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInventoryRequest $request, Inventory $inventory)
    {
        $inventory->update($request->validated());

        return redirect()->route('admin.inventory.index')->with('success', 'Data berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Inventory $inventory)
    {
        $inventory->delete();

        return redirect()->route('admin.inventory.index')->with('success', 'Data berhasil dihapus!');
    }
}
