<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    // function login dan logout memakai sanctum
    // login
    public function login(Request $request)
    {
        // validate
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // attempt login
        if (auth()->attempt($request->only('email', 'password'))) {
            // create token
            $token = auth()->user()->createToken('token')->plainTextToken;

            // dapatkan data user + roles
            $user = auth()->user();

            // dapatkan roles menjadi array of string
            $roles = $user->roles->pluck('name')->toArray();

            // return json
            return response()->json([
                'message' => 'Login success',
                'token' => $token,
                'user' => $user,
                'roles' => $roles
            ]);
        }

        // return json
        return response()->json([
            'message' => 'Login failed'
        ], 401);
    }

    // logout
    public function logout(Request $request)
    {
        // revoke token
        auth()->user()->tokens()->delete();

        // return json
        return response()->json([
            'message' => 'Logout success'
        ]);
    }
}
