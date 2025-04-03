<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Employee; // Use Employee model

class AuthController extends Controller
{
    /**
     * Handle employee login.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username_or_email' => 'required|string', // Accept username or email
            'password' => 'required|string',
        ]);

        // Determine if the input is an email or username
        $field = filter_var($credentials['username_or_email'], FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        if (Auth::attempt([$field => $credentials['username_or_email'], 'password' => $credentials['password']])) {
            $employee = Auth::user(); // Fetch the authenticated employee
            return response()->json(['message' => 'Login successful', 'data' => $employee], 200);
        }

        return response()->json(['error' => 'Invalid credentials'], 401);
    }

    /**
     * Handle employee signup.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function signup(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:employees,username', // Ensure unique username
            'email' => 'required|email|max:255|unique:employees,email', // Ensure unique email
            'password' => 'required|string|min:8|confirmed', // Requires password_confirmation
        ]);

        // Create a new employee in the database
        $employee = Employee::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']), // Hash the password
        ]);

        return response()->json(['message' => 'Signup successful', 'data' => $employee], 201);
    }
}
