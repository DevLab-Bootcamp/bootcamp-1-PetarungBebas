<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::view('/auth','template.auth');
Route::view('/auth-login','auth.login');