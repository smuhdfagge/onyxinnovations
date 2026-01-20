<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::withTrashed()->ordered()->paginate(20);
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:services',
            'icon' => 'nullable|string|max:255',
            'featured_image' => 'nullable|image|max:2048',
            'short_description' => 'required|string|max:500',
            'problem_statement' => 'nullable|string',
            'solution_approach' => 'nullable|string',
            'business_value' => 'nullable|string',
            'use_cases' => 'nullable|string',
            'content' => 'nullable|string',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'is_active' => 'boolean',
            'sort_order' => 'integer',
        ]);

        $validated['slug'] = $validated['slug'] ?? Str::slug($validated['title']);

        if ($request->hasFile('featured_image')) {
            $validated['featured_image'] = $request->file('featured_image')->store('services', 'public');
        }

        $service = Service::create($validated);

        ActivityLog::log('created', $service, 'Created service: ' . $service->title);

        return redirect()->route('admin.services.index')->with('success', 'Service created successfully.');
    }

    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:services,slug,' . $service->id,
            'icon' => 'nullable|string|max:255',
            'featured_image' => 'nullable|image|max:2048',
            'short_description' => 'required|string|max:500',
            'problem_statement' => 'nullable|string',
            'solution_approach' => 'nullable|string',
            'business_value' => 'nullable|string',
            'use_cases' => 'nullable|string',
            'content' => 'nullable|string',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'is_active' => 'boolean',
            'sort_order' => 'integer',
        ]);

        if ($request->hasFile('featured_image')) {
            if ($service->featured_image) {
                Storage::disk('public')->delete($service->featured_image);
            }
            $validated['featured_image'] = $request->file('featured_image')->store('services', 'public');
        }

        $service->update($validated);

        ActivityLog::log('updated', $service, 'Updated service: ' . $service->title);

        return redirect()->route('admin.services.index')->with('success', 'Service updated successfully.');
    }

    public function destroy(Service $service)
    {
        ActivityLog::log('deleted', $service, 'Deleted service: ' . $service->title);
        $service->delete();

        return redirect()->route('admin.services.index')->with('success', 'Service deleted successfully.');
    }

    public function restore($id)
    {
        $service = Service::withTrashed()->findOrFail($id);
        $service->restore();

        ActivityLog::log('restored', $service, 'Restored service: ' . $service->title);

        return redirect()->route('admin.services.index')->with('success', 'Service restored successfully.');
    }

    public function forceDelete($id)
    {
        $service = Service::withTrashed()->findOrFail($id);
        
        if ($service->featured_image) {
            Storage::disk('public')->delete($service->featured_image);
        }
        
        ActivityLog::log('force_deleted', $service, 'Permanently deleted service: ' . $service->title);
        $service->forceDelete();

        return redirect()->route('admin.services.index')->with('success', 'Service permanently deleted.');
    }
}
