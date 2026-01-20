<?php

namespace App\Http\Controllers;

use App\Models\JobListing;
use App\Models\JobCategory;
use App\Models\JobApplication;
use App\Http\Requests\JobApplicationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CareerController extends Controller
{
    public function index(Request $request)
    {
        $query = JobListing::active()->open()->with('category');

        if ($request->filled('category')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        if ($request->filled('type')) {
            $query->where('employment_type', $request->type);
        }

        if ($request->filled('level')) {
            $query->where('experience_level', $request->level);
        }

        $jobs = $query->latest()->paginate(10);
        $categories = JobCategory::active()->withCount(['listings' => function ($q) {
            $q->active()->open();
        }])->get();

        return view('careers.index', compact('jobs', 'categories'));
    }

    public function show(JobListing $job)
    {
        if (!$job->is_active) {
            abort(404);
        }

        $relatedJobs = JobListing::active()
            ->open()
            ->where('id', '!=', $job->id)
            ->where('category_id', $job->category_id)
            ->take(3)
            ->get();

        return view('careers.show', compact('job', 'relatedJobs'));
    }

    public function apply(JobApplicationRequest $request, JobListing $job)
    {
        $resumePath = $request->file('resume')->store('resumes', 'public');

        $coverLetterPath = null;
        if ($request->hasFile('cover_letter')) {
            $coverLetterPath = $request->file('cover_letter')->store('cover-letters', 'public');
        }

        JobApplication::create([
            'job_listing_id' => $job->id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'resume' => $resumePath,
            'cover_letter' => $coverLetterPath,
            'linkedin' => $request->linkedin,
            'portfolio' => $request->portfolio,
            'additional_info' => $request->additional_info,
        ]);

        return back()->with('success', 'Your application has been submitted successfully. We will be in touch soon!');
    }
}
