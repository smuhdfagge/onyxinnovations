<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Industry;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class IndustryController extends Controller
{
    public function index()
    {
        $industries = Industry::withTrashed()->ordered()->paginate(20);
        return view('admin.industries.index', compact('industries'));
    }

    public function create()
    {
        return view('admin.industries.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:industries',
            'icon' => 'nullable|string|max:255',
            'featured_image' => 'nullable|image|max:2048',
            'short_description' => 'required|string|max:500',
            'content' => 'nullable|string',
            'challenges' => 'nullable|string',
            'solutions' => 'nullable|string',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'is_active' => 'boolean',
            'sort_order' => 'integer',
        ]);

        $validated['slug'] = $validated['slug'] ?? Str::slug($validated['name']);

        if ($request->hasFile('featured_image')) {
            $validated['featured_image'] = $request->file('featured_image')->store('industries', 'public');
        }

        $industry = Industry::create($validated);

        ActivityLog::log('created', $industry, 'Created industry: ' . $industry->name);

        return redirect()->route('admin.industries.index')->with('success', 'Industry created successfully.');
    }

    public function edit(Industry $industry)
    {
        return view('admin.industries.edit', compact('industry'));
    }

    public function update(Request $request, Industry $industry)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:industries,slug,' . $industry->id,
            'icon' => 'nullable|string|max:255',
            'featured_image' => 'nullable|image|max:2048',
            'short_description' => 'required|string|max:500',
            'content' => 'nullable|string',
            'challenges' => 'nullable|string',
            'solutions' => 'nullable|string',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'is_active' => 'boolean',
            'sort_order' => 'integer',
        ]);

        if ($request->hasFile('featured_image')) {
            if ($industry->featured_image) {
                Storage::disk('public')->delete($industry->featured_image);
            }
            $validated['featured_image'] = $request->file('featured_image')->store('industries', 'public');
        }

        $industry->update($validated);

        ActivityLog::log('updated', $industry, 'Updated industry: ' . $industry->name);

        return redirect()->route('admin.industries.index')->with('success', 'Industry updated successfully.');
    }

    public function destroy(Industry $industry)
    {
        ActivityLog::log('deleted', $industry, 'Deleted industry: ' . $industry->name);
        $industry->delete();

        return redirect()->route('admin.industries.index')->with('success', 'Industry deleted successfully.');
    }

    public function restore($id)
    {
        $industry = Industry::withTrashed()->findOrFail($id);
        $industry->restore();

        ActivityLog::log('restored', $industry, 'Restored industry: ' . $industry->name);

        return redirect()->route('admin.industries.index')->with('success', 'Industry restored successfully.');
    }

    public function forceDelete($id)
    {
        $industry = Industry::withTrashed()->findOrFail($id);

        if ($industry->featured_image) {
            Storage::disk('public')->delete($industry->featured_image);
        }

        ActivityLog::log('force_deleted', $industry, 'Permanently deleted industry: ' . $industry->name);
        $industry->forceDelete();

        return redirect()->route('admin.industries.index')->with('success', 'Industry permanently deleted.');
    }
}
