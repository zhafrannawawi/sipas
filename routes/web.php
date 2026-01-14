<?php

use App\Http\Controllers\admin\InventoryController;
use Illuminate\Support\Facades\Route;



Route::resource('inventory', InventoryController::class);


Route::get('/', function () {
    return view('admin.dashboard.index');
});
