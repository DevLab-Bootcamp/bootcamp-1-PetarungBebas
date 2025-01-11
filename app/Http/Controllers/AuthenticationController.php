<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    //

    public function login(Request $request){
        $auth = Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ]);

        if($auth){
            return back()->with('error', 'Credential Anda Salah');
        }

        return redirect()->route('dashboard.index')->with('success', 'Berhasil Login');
    }
}
