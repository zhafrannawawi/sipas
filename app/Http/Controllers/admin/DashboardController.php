<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Device;
use App\Models\Loan;
use App\Models\User;
use App\Models\ActivityLog;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $totalUsers = User::where('role', 'borrower')->count();

        $totalDevices = Device::sum('stock');

        $activeLoans = Loan::where('status', 'borrowed')->count();

        $returnedLoans = Loan::where('status', 'returned')->count();

        $ActivityLogs = ActivityLog::latest()->paginate(5);
        

        return view('admin.dashboard.index', compact('totalUsers', 'activeLoans', 'totalDevices', 'ActivityLogs'));
    }
}
