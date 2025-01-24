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

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            if (!$request->input('email')) {
                $errors['email'][] = 'The email field is required.';
            }
            if (!$request->input('password')) {
                $errors['password'][] = 'The password field is required.';
            }
            return errorResponse('The credential field is required', $errors, 401);
        }

        $credentials = $request->only('email', 'password');

        // Tentukan apakah credential berupa email atau username
        if (filter_var($request->credential, FILTER_VALIDATE_EMAIL)) {
            $credentials['email'] = $request->credential;
        } else {
            $credentials['username'] = $request->credential;
        }
        
        if (!Auth::attempt($credentials)) {
            $errors['errors'][] = 'The email or password is incorrect.';
            return errorResponse('Invalid credentials', $errors, 401);
        }

        $user = Auth::user(); 
        $token = JWTAuth::fromUser($user, [ 'user_id' => $user->id]);  
        $redirectTo = $this->redirectTo($user->role);

        return response()->json(['token' => $token, 'redirect_to' => $redirectTo]);

    }
    protected function redirectTo($role)
    {
        switch ($role) {
            case 'admin':
                return '/';
            case 'PATIENT':
                return '/dashboard-user';
            case 'user': 
            default:
                return '/dashboard'; 
        }
    }
    public function logout()
    {
        JWTAuth::invalidate(JWTAuth::getToken());
        return successResponse('Logout successful', []);
    }
}
