<?php

namespace App\Http\Controllers;

use App\Models\JobPost;
use App\Models\Alumni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobPostController extends Controller
{
    // Show all job posts
    public function index()
    {
        $jobs = JobPost::with('alumni')
                       ->latest()
                       ->get();
        return view('jobs.index', compact('jobs'));
    }

    // Show form to create job
    public function create()
    {
        return view('jobs.create');
    }

    // Save new job post
    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:150',
            'company'     => 'required|string|max:100',
            'location'    => 'required|string|max:100',
            'description' => 'required|string',
            'type'        => 'required|in:full-time,part-time,internship',
            'apply_link'  => 'nullable|url',
        ]);

        JobPost::create([
            'alumni_id'   => Auth::id(),
            'title'       => $request->title,
            'company'     => $request->company,
            'location'    => $request->location,
            'description' => $request->description,
            'type'        => $request->type,
            'is_referral' => $request->has('is_referral'),
            'apply_link'  => $request->apply_link,
        ]);

        return redirect('/jobs')->with('success',
            'Job posted successfully! Alumni can now apply.');
    }

    // Show single job detail
    public function show($id)
    {
        $job = JobPost::with('alumni')->findOrFail($id);
        return view('jobs.show', compact('job'));
    }

    // Delete job post
    public function destroy($id)
    {
        $job = JobPost::findOrFail($id);

        // Only the poster can delete
        if ($job->alumni_id !== Auth::id()) {
            return back()->with('error', 'Unauthorized action.');
        }

        $job->delete();
        return redirect('/jobs')->with('success', 'Job post deleted.');
    }
}