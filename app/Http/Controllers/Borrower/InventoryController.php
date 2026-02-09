<?php

namespace App\Http\Controllers\Borrower;

use App\Http\Controllers\Controller;
use App\Models\Device;
use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index()
    {
        $devices = Device::where('stock', '>', 0)->paginate(5);
        return view('borrower.inventory.index', compact('devices'));
    }
}
