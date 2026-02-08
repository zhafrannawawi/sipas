<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inventory;
use App\Models\Loan;

class HistoryLoanController extends Controller
{
    public function index()
    {
        $inventories = Inventory::all();

        $loans = Loan::whereIn('status', ['returned', 'canceled'])->latest('updated_at')->paginate(5);
        return view('admin.history.index', compact('inventories', 'loans'));
    }
}
