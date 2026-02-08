<?php

namespace App\Http\Controllers\Officer;

use App\Http\Controllers\Controller;
use App\Models\Loan;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pendingRequests = Loan::where('status', 'pending')->count();

        $activeLoans = Loan::where('status', 'borrowed')->count();

        $returnedLoans = Loan::where('status', 'returned')->count();

        return view('officer.dashboard.index', compact('pendingRequests', 'activeLoans', 'returnedLoans'));
    }
}
