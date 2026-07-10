<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use Illuminate\Http\Request;

class AlumniController extends Controller
{
    public function index(Request $request)
    {
        $query = Alumni::where('status', 'approved');

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name',    'like', "%{$search}%")
                  ->orWhere('company', 'like', "%{$search}%")
                  ->orWhere('role',    'like', "%{$search}%");
            });
        }

        if ($request->filled('branch'))  { $query->where('branch', $request->branch); }
        if ($request->filled('batch'))   { $query->where('batch', $request->batch); }
        if ($request->filled('company')) { $query->where('company', 'like', "%{$request->company}%"); }

        $alumni    = $query->get();
        $branches  = Alumni::where('status', 'approved')->distinct()->pluck('branch');
        $batches   = Alumni::where('status', 'approved')->distinct()->orderBy('batch', 'desc')->pluck('batch');
        $companies = Alumni::where('status', 'approved')->distinct()->pluck('company')->filter();

        return view('alumni.index', compact('alumni', 'branches', 'batches', 'companies'));
    }
}