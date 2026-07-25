<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Alumni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function showForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // Validate all fields
        $request->validate([
            'name'      => 'required|string|max:100',
            'email'     => 'required|email|unique:alumni,email',
            'password'  => 'required|min:6|confirmed',
            'institute' => 'required|string|max:200',
            'branch'    => 'required|string',
            'batch'     => 'required|string',
            'company'   => 'nullable|string|max:100',
            'role'      => 'nullable|string|max:100',
            'phone'     => 'nullable|string|max:15',
            'bio'       => 'nullable|string|max:500',
        ]);

        // Create alumni and auto-login (no approval needed!)
        $alumni = Alumni::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
            'institute' => $request->institute,
            'branch'    => $request->branch,
            'batch'     => $request->batch,
            'company'   => $request->company,
            'role'      => $request->role,
            'phone'     => $request->phone,
            'bio'       => $request->bio,
            'is_admin'  => false,
        ]);

        // Auto login after registration
        Auth::login($alumni);

        // Redirect directly to alumni directory
        return redirect('/alumni')->with('success',
            'Welcome to AlumniNet, ' . $alumni->name );
    }
}