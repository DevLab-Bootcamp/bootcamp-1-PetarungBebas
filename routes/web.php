<?php
use App\Http\Controllers\AuthenticationController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', function () {
    return view('welcome');
});
Route::post('/login', [AuthenticationController::class, 'loginProcess'])->name('auth.login');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');