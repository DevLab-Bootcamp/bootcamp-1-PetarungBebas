<?php
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', function () {
    return view('welcome');
});
Route::view('/auth-login', 'auth.login');
Route::post('/api/login', [AuthenticationController::class, 'login'])->name('auth.login');
Route::post('/api/register', [UserController::class, 'addUser']);
Route::get('/api/users', [UserController::class, 'getUsers']);
Route::get('/api/user/{id}', [UserController::class, 'getUserById']);
Route::put('/api/user/{id}', [UserController::class, 'updateUser']);
Route::delete('/api/user/{id}', [UserController::class, 'deleteUser']);
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');