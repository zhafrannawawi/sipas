<?php

use App\Http\Controllers\admin\ActivityLogController;
use App\Http\Controllers\admin\AdministratorController;
use App\Http\Controllers\admin\BorrowerController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\Admin\DeviceController;
use App\Http\Controllers\admin\HistoryLoanController;
use App\Http\Controllers\admin\LoanController;
use App\Http\Controllers\admin\OfficerController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Borrower\DashboardController as BorrowerDashboardController;
use App\Http\Controllers\Borrower\HistoryController;
use App\Http\Controllers\Borrower\InventoryController as BorrowerInventoryController;
use App\Http\Controllers\Borrower\LoanController as BorrowerLoanController;
use App\Http\Controllers\Officer\DashboardController as OfficerDashboardController;
use App\Http\Controllers\Officer\LoanController as OfficerLoanController;
use App\Http\Controllers\officer\ReturnController;
use Illuminate\Support\Facades\Route;


Route::get('/', fn() => redirect('/login'));

Route::get('/login', fn() => view('auth.login'))->name('login');

Route::post('/login', [LoginController::class, 'login']);

Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

// ROLE ADMIN
Route::middleware(['auth', 'checkrole:admin'])->prefix('admin')->name('admin.')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('device', DeviceController::class);
    Route::resource('category', CategoryController::class);

    Route::resource('loan', LoanController::class);

    Route::get('/activityLog', [ActivityLogController::class, 'index'])
        ->name('activityLog.index');

    Route::get('/history', [HistoryLoanController::class, 'index'])
        ->name('history.index');

    Route::resource('administrator', AdministratorController::class)
        ->parameters(['administrator' => 'user']);

    Route::resource('officer', OfficerController::class)
        ->parameters(['officer' => 'user']);

    Route::resource('borrower', BorrowerController::class)
        ->parameters(['borrower' => 'user']);
});


// ROLE OFFICER
Route::middleware(['auth', 'checkrole:officer'])
    ->prefix('officer')
    ->name('officer.')
    ->group(function () {

        Route::get('/dashboard', [OfficerDashboardController::class, 'index'])
            ->name('dashboard');

        Route::get('/loan', [OfficerLoanController::class, 'index'])
            ->name('loan.index');

        Route::patch('/loan/{loan}/approve', [OfficerLoanController::class, 'approve'])
            ->name('loan.approve');

        Route::get('export-loans', [ReturnController::class, 'export'])->name('loans.export');

        Route::get('/return', [ReturnController::class, 'index'])->name('return.index');

        Route::patch('/return/{loan}/validate', [ReturnController::class, 'approveReturn'])->name('return.validate');

        Route::put('/loan/{loan}/return', [ReturnController::class, 'returnLoan'])->name('loan.return');
    });


// ROLE BORROWER
Route::middleware(['auth', 'checkrole:borrower'])->prefix('borrower')->name('borrower.')->group(function () {

    Route::get('/dashboard', [BorrowerDashboardController::class, 'index'])->name('dashboard');

    Route::get('/inventory', [BorrowerInventoryController::class, 'index'])->name('inventory.index');


    Route::get('/loan', [BorrowerLoanController::class, 'index'])->name('loan.index');

    Route::post('/loan', [BorrowerLoanController::class, 'storeLoan'])
        ->name('loan.store');

    Route::put('/loans/{loan}', [BorrowerLoanController::class, 'updateLoan'])
        ->name('loan.update');

    Route::patch('/loans/{loan}/cancel', [BorrowerLoanController::class, 'cancelLoan'])
        ->name('loan.cancel');

    Route::patch('/loan/{loan}/return', [BorrowerLoanController::class, 'returnLoan'])->name('loan.return');

    Route::get('/history', [HistoryController::class, 'index'])->name('history.index');
});
