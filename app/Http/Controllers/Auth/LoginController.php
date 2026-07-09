<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Alumni;

class LoginController extends Controller
{
    // Show login form
    public function showForm()
    {
        return view('auth.login');
    }

    // Handle login
    public function login(Request $request)
    {
        // Step 1: Validate
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        // Step 2: Check credentials
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $alumni = Auth::user();

            // Step 3: Check if approved
            if ($alumni->status === 'pending') {
                Auth::logout();
                return back()->withErrors(['email' =>
                    'Your account is pending admin approval.']);
            }

            if ($alumni->status === 'rejected') {
                Auth::logout();
                return back()->withErrors(['email' =>
                    'Your registration was rejected. Contact admin.']);
            }

            // Step 4: Redirect based on role
            if ($alumni->is_admin) {
                return redirect('/admin/dashboard');
            }

            return redirect('/alumni');
        }

        return back()->withErrors(['email' => 'Invalid email or password.']);
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        return redirect('/login');
    }
}