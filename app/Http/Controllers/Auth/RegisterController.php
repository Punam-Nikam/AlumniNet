<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Alumni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    // Show registration form
    public function showForm()
    {
        return view('auth.register');
    }

    // Handle form submission
    public function register(Request $request)
    {
        // Step 1: Validate input
        $request->validate([
            'name'     => 'required|string|max:100',
            'email'    => 'required|email|unique:alumni,email',
            'password' => 'required|min:6|confirmed',
            'branch'   => 'required|string',
            'batch'    => 'required|string',
            'company'  => 'nullable|string',
            'role'     => 'nullable|string',
            'phone'    => 'nullable|string',
        ]);

        // Step 2: Create alumni with pending status
        Alumni::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password), // encrypt password
            'branch'   => $request->branch,
            'batch'    => $request->batch,
            'company'  => $request->company,
            'role'     => $request->role,
            'phone'    => $request->phone,
            'status'   => 'pending', // awaiting admin approval
            'is_admin' => false,
        ]);

        // Step 3: Redirect with success message
        return redirect('/login')->with('success',
            'Registration successful! Please wait for admin approval before logging in.');
    }
}