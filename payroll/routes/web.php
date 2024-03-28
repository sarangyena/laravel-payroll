<?php

use App\Http\Controllers\ImageController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PayrollController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('/auth/login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('employee', EmployeeController::class)
    ->only(['index', 'store'])
    ->middleware(['auth', 'verified']);
    
Route::resource('payroll', PayrollController::class)
    ->only(['index'])
    ->middleware(['auth', 'verified']);

Route::get('/employee/view', [EmployeeController::class, 'details'])->name('a-view');
Route::post('/employee/ajax', [EmployeeController::class,'handleAjaxRequest']);
Route::post('/image/upload', [ImageController::class, 'upload']);

Route::get('/payroll/view', [PayrollController::class, 'details'])->name('a-payroll');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
