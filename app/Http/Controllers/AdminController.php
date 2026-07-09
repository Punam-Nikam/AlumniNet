<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    // Admin dashboard
    public function dashboard()
    {
        $pending  = Alumni::where('status', 'pending')->get();
        $approved = Alumni::where('status', 'approved')->count();
        $rejected = Alumni::where('status', 'rejected')->count();
        $total    = Alumni::count();

        return view('admin.dashboard', compact(
            'pending', 'approved', 'rejected', 'total'
        ));
    }

    // Approve alumni
    public function approve($id)
    {
        $alumni = Alumni::findOrFail($id);
        $alumni->update(['status' => 'approved']);
        return back()->with('success', $alumni->name . ' has been approved!');
    }

    // Reject alumni
    public function reject($id)
    {
        $alumni = Alumni::findOrFail($id);
        $alumni->update(['status' => 'rejected']);
        return back()->with('success', $alumni->name . ' has been rejected.');
    }

    // All approved alumni
    public function allAlumni()
    {
        $alumni = Alumni::where('status', 'approved')->get();
        return view('admin.alumni', compact('alumni'));
    }
}