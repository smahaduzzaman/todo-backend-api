<?php

namespace App\Http\Controllers;

use App\Helper\JWTToken;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function UserRegistration(request $request)
    {
        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'User created successfully',
        ], 200);
    }

    function UserLogin(request $request)
    {
        $count = User::where('email', $request->input('email'))
        ->where('password', $request->input('password'))
        ->count();

        if ($count === 1) {
            $token = JWTToken::CreateToken($request->input('email'));
            return response()->json([
                'status' => 'success',
                'message' => 'User logged in successfully',
                'token' => $token,
            ], 200);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid Token',
            ], 401);
        }
    }
}
