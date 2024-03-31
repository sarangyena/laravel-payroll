<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('employee', EmployeeController::class)
    ->only(['index', 'store'])
    ->middleware(['auth', 'verified']);

Route::post('/employee/ajax', [EmployeeController::class,'handleAjaxRequest']);
Route::post('/employee/image', [EmployeeController::class,'upload']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('qr-code-g', function () {
    QrCode::size(500)
        ->format('png')
        ->generate('raviyatechnical', public_path('images/qrcode.png'));
    return view('qrCode');
});

require __DIR__.'/auth.php';
