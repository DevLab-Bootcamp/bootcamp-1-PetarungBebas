<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function showUsers(){
        return redirect()->to('/api/user');
    }
}
