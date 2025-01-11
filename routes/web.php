<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', function () {
    return view('welcome');
});

Route::view('/auth','template.auth');
Route::view('/auth-login','auth.login');

Route::post('/login', [AuthenticationController::class, 'login'])->name("auth.login");

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');


