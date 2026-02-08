<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use Illuminate\Http\Request;

class ActivityLogController extends Controller
{
    public function index()
    {
        $ActivityLogs = ActivityLog::latest()->paginate(7);

        return view('admin.activity_log.index', compact('ActivityLogs'));
    }
}
