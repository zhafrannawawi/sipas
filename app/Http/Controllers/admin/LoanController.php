<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreLoanRequest;
use App\Http\Requests\Admin\UpdateLoanRequest;
use App\Models\Device;
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
        $loans = Loan::where('status', ['pending', 'borrowed', 'validation'])->latest()->paginate(5);
        $devices = Device::all();
        $users = User::where('role', 'borrower')->get();
        return view('admin.loan.index', compact('loans', 'devices', 'users'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLoanRequest $request)
    {
        // 1. Validasi input
        $data = $request->validated();

        // 2. Buat instance Loan baru (belum disimpan ke DB)
        $loan = new Loan($data);

        // 3. Ambil harga dari tabel Device
        $device = Device::findOrFail($request->device_id);

        // 4. Set data yang kurang (harga per hari & status)
        $loan->price_per_day = $device->price_per_day;
        $loan->status = 'pending';

        // 5. PANGGIL FUNGSI MODEL UNTUK HITUNG TOTAL
        // Fungsi ini akan otomatis mengisi $loan->total_price
        $loan->calculatePrice();

        // 6. Simpan ke Database
        $loan->save();

        return redirect()->route('admin.loan.index')
            ->with('success', 'Data peminjaman berhasil ditambahkan! Total: ' . number_format($loan->total_price));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLoanRequest $request, Loan $loan)
    {
        // 1. Ambil data yang sudah divalidasi
        $data = $request->validated();

        // 2. Masukkan data baru ke object $loan (TAPI JANGAN SAVE DULU)
        // fill() hanya mengubah data di memori (RAM), belum di database.
        $loan->fill($data);

        // 3. Cek logika: Apakah User mengganti Barangnya?
        // isDirty('device_id') mengecek apakah 'device_id' yang baru beda dengan yang lama
        if ($loan->isDirty('device_id')) {
            // Kalau barang diganti, ambil harga baru dari tabel Device
            $device = Device::findOrFail($request->device_id);
            $loan->price_per_day = $device->price_per_day;
        }

        // 4. HITUNG ULANG TOTAL HARGA
        // Karena kita sudah melakukan ->fill(), maka function ini akan menggunakan
        // tanggal baru dan device baru untuk menghitung.
        $loan->calculatePrice();

        // 5. Simpan perubahan ke Database
        $loan->save();

        return redirect()->route('admin.loan.index')
            ->with('success', 'Data berhasil diperbarui! Total Biaya Baru: Rp ' . number_format($loan->total_price));
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
