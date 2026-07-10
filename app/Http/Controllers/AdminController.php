<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use Illuminate\Http\Request;

class AlumniController extends Controller
{
    public function index(Request $request)
    {
        // Start query — only approved alumni
        $query = Alumni::where('status', 'approved');

        // Filter by search keyword (name, company, role)
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name',    'like', "%{$search}%")
                  ->orWhere('company', 'like', "%{$search}%")
                  ->orWhere('role',    'like', "%{$search}%");
            });
        }

        // Filter by branch
        if ($request->filled('branch')) {
            $query->where('branch', $request->branch);
        }

        // Filter by batch year
        if ($request->filled('batch')) {
            $query->where('batch', $request->batch);
        }

        // Filter by company
        if ($request->filled('company')) {
            $query->where('company', 'like', "%{$request->company}%");
        }

        // Execute query and get results
        $alumni = $query->get();

        // Get unique values for filter dropdowns
        $branches  = Alumni::where('status', 'approved')->distinct()->pluck('branch');
        $batches   = Alumni::where('status', 'approved')->distinct()->orderBy('batch', 'desc')->pluck('batch');
        $companies = Alumni::where('status', 'approved')->distinct()->pluck('company')->filter();

        return view('alumni.index', compact(
            'alumni', 'branches', 'batches', 'companies'
        ));
    }
}