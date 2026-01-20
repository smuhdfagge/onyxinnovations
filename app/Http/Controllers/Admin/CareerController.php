<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobListing;
use App\Models\JobCategory;
use App\Models\JobApplication;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CareerController extends Controller
{
    public function index()
    {
        $jobs = JobListing::withTrashed()->with('category')->withCount('applications')->latest()->paginate(20);
        return view('admin.careers.index', compact('jobs'));
    }

    public function create()
    {
        $categories = JobCategory::active()->get();
        return view('admin.careers.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:job_listings',
            'category_id' => 'nullable|exists:job_categories,id',
            'location' => 'required|string|max:255',
            'employment_type' => 'required|in:full-time,part-time,contract,internship',
            'experience_level' => 'required|in:entry,mid,senior,executive',
            'salary_range' => 'nullable|string|max:100',
            'short_description' => 'required|string|max:500',
            'description' => 'required|string',
            'requirements' => 'nullable|string',
            'responsibilities' => 'nullable|string',
            'benefits' => 'nullable|string',
            'application_deadline' => 'nullable|date',
            'is_active' => 'boolean',
            'is_featured' => 'boolean',
        ]);

        $validated['slug'] = $validated['slug'] ?? Str::slug($validated['title']);

        $job = JobListing::create($validated);

        ActivityLog::log('created', $job, 'Created job listing: ' . $job->title);

        return redirect()->route('admin.careers.index')->with('success', 'Job listing created successfully.');
    }

    public function edit(JobListing $career)
    {
        $categories = JobCategory::active()->get();
        return view('admin.careers.edit', compact('career', 'categories'));
    }

    public function update(Request $request, JobListing $career)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:job_listings,slug,' . $career->id,
            'category_id' => 'nullable|exists:job_categories,id',
            'location' => 'required|string|max:255',
            'employment_type' => 'required|in:full-time,part-time,contract,internship',
            'experience_level' => 'required|in:entry,mid,senior,executive',
            'salary_range' => 'nullable|string|max:100',
            'short_description' => 'required|string|max:500',
            'description' => 'required|string',
            'requirements' => 'nullable|string',
            'responsibilities' => 'nullable|string',
            'benefits' => 'nullable|string',
            'application_deadline' => 'nullable|date',
            'is_active' => 'boolean',
            'is_featured' => 'boolean',
        ]);

        $career->update($validated);

        ActivityLog::log('updated', $career, 'Updated job listing: ' . $career->title);

        return redirect()->route('admin.careers.index')->with('success', 'Job listing updated successfully.');
    }

    public function destroy(JobListing $career)
    {
        ActivityLog::log('deleted', $career, 'Deleted job listing: ' . $career->title);
        $career->delete();

        return redirect()->route('admin.careers.index')->with('success', 'Job listing deleted successfully.');
    }

    public function restore($id)
    {
        $job = JobListing::withTrashed()->findOrFail($id);
        $job->restore();

        ActivityLog::log('restored', $job, 'Restored job listing: ' . $job->title);

        return redirect()->route('admin.careers.index')->with('success', 'Job listing restored successfully.');
    }

    public function forceDelete($id)
    {
        $job = JobListing::withTrashed()->findOrFail($id);

        ActivityLog::log('force_deleted', $job, 'Permanently deleted job listing: ' . $job->title);
        
        $job->forceDelete();

        return redirect()->route('admin.careers.index')->with('success', 'Job listing permanently deleted.');
    }

    // Applications
    public function applications()
    {
        $applications = JobApplication::with('listing')->latest()->paginate(20);
        return view('admin.careers.applications', compact('applications'));
    }

    public function showApplication(JobApplication $application)
    {
        $application->load('listing');
        return view('admin.careers.application-show', compact('application'));
    }

    public function updateApplicationStatus(Request $request, JobApplication $application)
    {
        $validated = $request->validate([
            'status' => 'required|in:new,reviewing,shortlisted,interviewed,offered,rejected,hired',
            'admin_notes' => 'nullable|string',
        ]);

        $application->update($validated);

        return redirect()->back()->with('success', 'Application status updated successfully.');
    }

    // Categories
    public function categories()
    {
        $categories = JobCategory::withCount('listings')->get();
        return view('admin.careers.categories', compact('categories'));
    }

    public function storeCategory(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:job_categories',
        ]);

        $validated['slug'] = $validated['slug'] ?? Str::slug($validated['name']);

        JobCategory::create($validated);

        return redirect()->route('admin.careers.categories')->with('success', 'Category created successfully.');
    }
}
