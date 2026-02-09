<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreDeviceController;
use App\Http\Requests\Admin\UpdateDeviceController;
use App\Models\Category;
use App\Models\Device;

class DeviceController extends Controller
{
    public function index()
    {
        $devices = Device::paginate(5);
        $categories = Category::all();
        return view('admin.device.index', compact('devices', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDeviceController $request)
    {
        Device::create($request->validated());

        return redirect()->route('admin.device.index')->with('success', 'Data berhasil ditambahkan!');
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDeviceController $request, Device $device)
    {
        $device->update($request->validated());

        return redirect()->route('admin.device.index')->with('success', 'Data berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Device $device)
    {
        $device->delete();

        return redirect()->route('admin.device.index')->with('success', 'Data berhasil dihapus!');
    }
}
