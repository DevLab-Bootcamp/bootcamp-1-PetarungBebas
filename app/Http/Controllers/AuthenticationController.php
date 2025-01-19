<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;
use function App\Helpers\successResponse;
use function App\Helpers\errorResponse;

class AuthenticationController extends Controller
{
    public function login(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            if (!$request->input('email')) {
                $errors['email'][] = 'The email field is required.';
            }
            if (!$request->input('password')) {
                $errors['password'][] = 'The password field is required.';
            }
            return errorResponse('The credential field is required', $errors, 401);
        }


        // Siapkan kredensial login
        $credentials = $request->only('email', 'password');

        // Tentukan apakah credential berupa email atau username
        if (filter_var($request->credential, FILTER_VALIDATE_EMAIL)) {
            $credentials['email'] = $request->credential;
        } else {
            $credentials['username'] = $request->credential;
        }

        // Cek apakah kredensial valid
        
        if (!Auth::attempt($credentials)) {
            $errors['errors'][] = 'The email or password is incorrect.';
            return errorResponse('Invalid credentials', $errors, 401);
        }
        // Generate token JWT
        $user = Auth::user();  // Ambil user yang berhasil login
        $token = "JWTAuth::fromUser(user)";  // Membuat token untuk user tersebut

        // Kirim response sukses dengan token
        return successResponse('Login successful', [
            'user' => $user, // Informasi user yang berhasil login
            'token' => $token, // JWT Token
        ]);

    }

    public function register(Request $request){
        
    }
}
