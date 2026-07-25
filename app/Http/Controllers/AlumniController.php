<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use Illuminate\Http\Request;

class AlumniController extends Controller
{
    public function index(Request $request)
    {
        // Start query — all alumni
        $query = Alumni::query();

        // Search by name, company, role
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name',      'like', "%{$search}%")
                  ->orWhere('company', 'like', "%{$search}%")
                  ->orWhere('role',    'like', "%{$search}%")
                  ->orWhere('institute', 'like', "%{$search}%");
            });
        }

        // Filter by institute
        if ($request->filled('institute')) {
            $query->where('institute', $request->institute);
        }

        // Filter by branch
        if ($request->filled('branch')) {
            $query->where('branch', $request->branch);
        }

        // Filter by batch
        if ($request->filled('batch')) {
            $query->where('batch', $request->batch);
        }

        // Filter by company
        if ($request->filled('company')) {
            $query->where('company', 'like', "%{$request->company}%");
        }

        $alumni    = $query->get();
        $institutes = Alumni::distinct()->pluck('institute')->filter()->sort();
        $branches  = Alumni::distinct()->pluck('branch')->filter()->sort();
        $batches   = Alumni::distinct()->orderBy('batch','desc')->pluck('batch')->filter();
        $companies = Alumni::distinct()->pluck('company')->filter()->sort();

        return view('alumni.index', compact(
            'alumni', 'institutes', 'branches', 'batches', 'companies'
        ));
    }
}