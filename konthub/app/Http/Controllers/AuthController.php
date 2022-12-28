<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller

{
    public function register(Request $request)
    {
        // Validate the form data
        $validator = Validator::make($request->all(), [
            "first name" => "required|string|max:255",
            "last name" => "required|string|max:255",
            "tiktok username" => "required|string|max:255",
            "email" => "required|string|email|max:255|unique:users",
            "password" => "required|string|min:6|confirmed",
        ]);

        if ($validator->fails()) {
            // Return error response if validation fails
            return response()->json(['error' => $validator->errors()], 422);
        }

        // Create a new user
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'tiktok_username' => $request->tiktok_username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Return success response
        return response()->json(['success' => 'Account created successfully.'], 200);

        auth()->login($user);
        return redirect('/dashboard');
    }
}
