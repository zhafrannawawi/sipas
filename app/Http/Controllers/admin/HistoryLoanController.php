<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Device;
use App\Models\Loan;

class HistoryLoanController extends Controller
{
    public function index()
    {
        $devices = Device::all();

        $loans = Loan::whereIn('status', ['returned', 'canceled'])->latest('updated_at')->paginate(5);
        return view('admin.history.index', compact('devices', 'loans'));
    }
}
