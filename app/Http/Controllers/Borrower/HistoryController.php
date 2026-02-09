<?php

namespace App\Http\Controllers\Borrower;

use App\Http\Controllers\Controller;
use App\Models\Device;
use App\Models\Inventory;
use Illuminate\Support\Facades\Auth;
use App\Models\Loan;


class HistoryController extends Controller
{
    public function index()
    {
        $devices = Device::all();

        $loans = Loan::where('user_id', Auth::id())->whereIn('status', ['returned', 'canceled'])->latest()->paginate(5);
        return view('borrower.history.index', compact('devices', 'loans'));
    }
}
