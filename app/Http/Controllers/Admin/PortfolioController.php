<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use App\Models\Industry;
use App\Models\Service;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
{
    public function index()
    {
        $portfolios = Portfolio::withTrashed()->with('industry')->ordered()->paginate(20);
        return view('admin.portfolio.index', compact('portfolios'));
    }

    public function create()
    {
        $industries = Industry::active()->ordered()->get();
        $services = Service::active()->ordered()->get();
        return view('admin.portfolio.create', compact('industries', 'services'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:portfolios',
            'client_name' => 'nullable|string|max:255',
            'featured_image' => 'nullable|image|max:2048',
            'short_description' => 'required|string|max:500',
            'challenge' => 'nullable|string',
            'solution' => 'nullable|string',
            'results' => 'nullable|string',
            'technologies' => 'nullable|string',
            'industry_id' => 'nullable|exists:industries,id',
            'project_url' => 'nullable|url|max:255',
            'completion_date' => 'nullable|date',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
            'sort_order' => 'integer',
            'services' => 'array',
            'services.*' => 'exists:services,id',
        ]);

        $validated['slug'] = $validated['slug'] ?? Str::slug($validated['title']);

        if ($request->hasFile('featured_image')) {
            $validated['featured_image'] = $request->file('featured_image')->store('portfolio', 'public');
        }

        $portfolio = Portfolio::create($validated);

        if ($request->has('services')) {
            $portfolio->services()->sync($request->services);
        }

        ActivityLog::log('created', $portfolio, 'Created portfolio: ' . $portfolio->title);

        return redirect()->route('admin.portfolio.index')->with('success', 'Portfolio item created successfully.');
    }

    public function edit(Portfolio $portfolio)
    {
        $industries = Industry::active()->ordered()->get();
        $services = Service::active()->ordered()->get();
        return view('admin.portfolio.edit', compact('portfolio', 'industries', 'services'));
    }

    public function update(Request $request, Portfolio $portfolio)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:portfolios,slug,' . $portfolio->id,
            'client_name' => 'nullable|string|max:255',
            'featured_image' => 'nullable|image|max:2048',
            'short_description' => 'required|string|max:500',
            'challenge' => 'nullable|string',
            'solution' => 'nullable|string',
            'results' => 'nullable|string',
            'technologies' => 'nullable|string',
            'industry_id' => 'nullable|exists:industries,id',
            'project_url' => 'nullable|url|max:255',
            'completion_date' => 'nullable|date',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
            'sort_order' => 'integer',
            'services' => 'array',
            'services.*' => 'exists:services,id',
        ]);

        if ($request->hasFile('featured_image')) {
            if ($portfolio->featured_image) {
                Storage::disk('public')->delete($portfolio->featured_image);
            }
            $validated['featured_image'] = $request->file('featured_image')->store('portfolio', 'public');
        }

        $portfolio->update($validated);
        $portfolio->services()->sync($request->services ?? []);

        ActivityLog::log('updated', $portfolio, 'Updated portfolio: ' . $portfolio->title);

        return redirect()->route('admin.portfolio.index')->with('success', 'Portfolio item updated successfully.');
    }

    public function destroy(Portfolio $portfolio)
    {
        ActivityLog::log('deleted', $portfolio, 'Deleted portfolio: ' . $portfolio->title);
        $portfolio->delete();

        return redirect()->route('admin.portfolio.index')->with('success', 'Portfolio item deleted successfully.');
    }

    public function restore($id)
    {
        $portfolio = Portfolio::withTrashed()->findOrFail($id);
        $portfolio->restore();

        ActivityLog::log('restored', $portfolio, 'Restored portfolio: ' . $portfolio->title);

        return redirect()->route('admin.portfolio.index')->with('success', 'Portfolio item restored successfully.');
    }

    public function forceDelete($id)
    {
        $portfolio = Portfolio::withTrashed()->findOrFail($id);
        
        if ($portfolio->featured_image) {
            Storage::disk('public')->delete($portfolio->featured_image);
        }
        
        ActivityLog::log('force_deleted', $portfolio, 'Permanently deleted portfolio: ' . $portfolio->title);
        $portfolio->forceDelete();

        return redirect()->route('admin.portfolio.index')->with('success', 'Portfolio item permanently deleted.');
    }
}
