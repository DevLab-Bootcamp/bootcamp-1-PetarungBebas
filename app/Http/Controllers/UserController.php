<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use function App\Helpers\errorResponse;
use function App\Helpers\successResponse;

class UserController extends Controller
{
    public function addUser(request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|unique:users,username',
            'name' => 'required|string|',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'gender' => 'required',
            'religion' => 'required'
        ]);

        if ($validator->fails()) {
            return errorResponse('Validation error', $validator->errors()->all(), 422);
        }

        $user = User::create([
            'username' => $request->username,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role
        ]);

        $userProfile = UserProfile::create([
            'user_id' => $user->id,
            'gender' => $request->gender,
            'religion' => $request->religion
        ]);

        // Kirim respons sukses dengan data user yang baru terdaftar
        return successResponse('Registration successful', [
            'user' => $user,
            // 'userProfile' => $userProfile
        ]);
    }

    public function getUsers()
    {
        $user = User::join('user_profiles', 'users.id', '=', 'user_profiles.user_id')
        ->select('users.*', 'user_profiles.*')
        ->get();
        if (!$user) {
            return errorResponse('User not found', [], 404);
        }
        return successResponse('Success get all users', [
            $user
        ]);
    }
    public function getUserProfileById($id)
    {
        $user = UserProfile::find($id);
        return $user;
    }
    public function getUserByName(Request $request)
    {
        $users = User::join('user_profiles', 'users.id', '=', 'user_profiles.user_id')
            ->where('users.name', 'like', '%' . $request->name . '%')
            ->select('users.*', 'user_profiles.*')
            ->get();

        if ($users->isEmpty()) {
            return errorResponse('User not found', [], 404);
        }

        return successResponse('Success get user', [
            $users
        ]);
    }

    public function updateUser(Request $request, $id)
    {
        $user = User::where('id', $id)->first();
        if (!$user) {
            return errorResponse('User not found', [], 404);
        }
        $validatedData = $request->validate([
            'name' => 'sometimes|string|max:255',
            'email' => 'sometimes|email|unique:users,email,' . $user->id,
            'password' => 'sometimes|string|min:6|confirmed',
        ]);

        if (isset($validatedData['password'])) {
            $validatedData['password'] = Hash::make($request->password);
        }

        $user->update($validatedData);

        return successResponse('Success update user', [
            $user,
        ]);
    }

    public function deleteUser($id)
    {
        $user = User::find($id);
        if (!$user) {
            return errorResponse('User not found', [], 404);
        }
        $user->delete();
        return successResponse('Success delete user', [
            $user
        ]);
    }
}
