<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function UserRegistration(request $request)
    {
        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            // 'password' => Hash::make($request->input('password')),
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'User created successfully',
        ], 200);

    }
}
