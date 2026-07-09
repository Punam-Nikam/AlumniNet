<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlumniController extends Controller
{
    public function index()
    {
        // Fetch only approved alumni from DB
        $alumni = Alumni::where('status', 'approved')->get();

        return view('alumni.index', compact('alumni'));
    }
}