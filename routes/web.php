<?php
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', function () {
    return view('dashboard');
});
Route::post('/login', [AuthenticationController::class, 'loginProcess'])->name('auth.login');

