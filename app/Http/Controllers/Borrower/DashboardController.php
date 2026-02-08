<?php

namespace App\Http\Controllers\Borrower;

use App\Http\Controllers\Controller;
use App\Models\Loan;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $totalLoans =  Loan::where('user_id', Auth::id())
            ->whereNotIn('status', ['canceled', 'pending'])
            ->count();

        $activeLoans = Loan::where('user_id', Auth::id())
            ->where('status', 'borrowed')
            ->count();

        $overdueLoans = Loan::where('user_id', Auth::id())
            ->where('status', 'overdue')->count();

        $dueTodayLoans = Loan::where('user_id', Auth::id())->whereIn('status', ['borrowed', 'validation'])
            ->whereDate('due_date', today())
            ->paginate(5);

        return view('borrower.dashboard.index', compact('totalLoans', 'activeLoans', 'overdueLoans', 'dueTodayLoans'));
    }
}
