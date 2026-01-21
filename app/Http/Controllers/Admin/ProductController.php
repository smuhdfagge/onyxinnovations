<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::withTrashed()->ordered()->paginate(20);
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:products',
            'tagline' => 'nullable|string|max:255',
            'logo' => 'nullable|image|max:2048',
            'featured_image' => 'nullable|image|max:2048',
            'short_description' => 'required|string|max:500',
            'description' => 'nullable|string',
            'features' => 'nullable|string',
            'screenshots.*' => 'nullable|image|max:2048',
            'demo_url' => 'nullable|url|max:255',
            'product_url' => 'nullable|url|max:255',
            'documentation_url' => 'nullable|url|max:255',
            'category' => 'nullable|string|max:255',
            'platform' => 'nullable|string|max:255',
            'version' => 'nullable|string|max:50',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'is_active' => 'boolean',
            'is_featured' => 'boolean',
            'sort_order' => 'integer',
        ]);

        $validated['slug'] = $validated['slug'] ?? Str::slug($validated['name']);

        // Handle features as JSON array
        if (!empty($validated['features'])) {
            $features = array_filter(array_map('trim', explode("\n", $validated['features'])));
            $validated['features'] = $features;
        }

        if ($request->hasFile('logo')) {
            $validated['logo'] = $request->file('logo')->store('products/logos', 'public');
        }

        if ($request->hasFile('featured_image')) {
            $validated['featured_image'] = $request->file('featured_image')->store('products', 'public');
        }

        // Handle screenshots
        if ($request->hasFile('screenshots')) {
            $screenshots = [];
            foreach ($request->file('screenshots') as $screenshot) {
                $screenshots[] = $screenshot->store('products/screenshots', 'public');
            }
            $validated['screenshots'] = $screenshots;
        }

        $product = Product::create($validated);

        ActivityLog::log('created', $product, 'Created product: ' . $product->name);

        return redirect()->route('admin.products.index')->with('success', 'Product created successfully.');
    }

    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:products,slug,' . $product->id,
            'tagline' => 'nullable|string|max:255',
            'logo' => 'nullable|image|max:2048',
            'featured_image' => 'nullable|image|max:2048',
            'short_description' => 'required|string|max:500',
            'description' => 'nullable|string',
            'features' => 'nullable|string',
            'screenshots.*' => 'nullable|image|max:2048',
            'demo_url' => 'nullable|url|max:255',
            'product_url' => 'nullable|url|max:255',
            'documentation_url' => 'nullable|url|max:255',
            'category' => 'nullable|string|max:255',
            'platform' => 'nullable|string|max:255',
            'version' => 'nullable|string|max:50',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'is_active' => 'boolean',
            'is_featured' => 'boolean',
            'sort_order' => 'integer',
        ]);

        // Handle features as JSON array
        if (!empty($validated['features'])) {
            $features = array_filter(array_map('trim', explode("\n", $validated['features'])));
            $validated['features'] = $features;
        } else {
            $validated['features'] = null;
        }

        if ($request->hasFile('logo')) {
            if ($product->logo) {
                Storage::disk('public')->delete($product->logo);
            }
            $validated['logo'] = $request->file('logo')->store('products/logos', 'public');
        }

        if ($request->hasFile('featured_image')) {
            if ($product->featured_image) {
                Storage::disk('public')->delete($product->featured_image);
            }
            $validated['featured_image'] = $request->file('featured_image')->store('products', 'public');
        }

        // Handle screenshots
        if ($request->hasFile('screenshots')) {
            // Keep existing screenshots and add new ones
            $screenshots = $product->screenshots ?? [];
            foreach ($request->file('screenshots') as $screenshot) {
                $screenshots[] = $screenshot->store('products/screenshots', 'public');
            }
            $validated['screenshots'] = $screenshots;
        }

        // Handle screenshot removal
        if ($request->has('remove_screenshots')) {
            $currentScreenshots = $product->screenshots ?? [];
            foreach ($request->remove_screenshots as $index) {
                if (isset($currentScreenshots[$index])) {
                    Storage::disk('public')->delete($currentScreenshots[$index]);
                    unset($currentScreenshots[$index]);
                }
            }
            $validated['screenshots'] = array_values($currentScreenshots);
        }

        $product->update($validated);

        ActivityLog::log('updated', $product, 'Updated product: ' . $product->name);

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        ActivityLog::log('deleted', $product, 'Deleted product: ' . $product->name);
        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully.');
    }

    public function restore($id)
    {
        $product = Product::withTrashed()->findOrFail($id);
        $product->restore();

        ActivityLog::log('restored', $product, 'Restored product: ' . $product->name);

        return redirect()->route('admin.products.index')->with('success', 'Product restored successfully.');
    }

    public function forceDelete($id)
    {
        $product = Product::withTrashed()->findOrFail($id);

        if ($product->logo) {
            Storage::disk('public')->delete($product->logo);
        }
        if ($product->featured_image) {
            Storage::disk('public')->delete($product->featured_image);
        }
        if ($product->screenshots) {
            foreach ($product->screenshots as $screenshot) {
                Storage::disk('public')->delete($screenshot);
            }
        }

        ActivityLog::log('force_deleted', $product, 'Permanently deleted product: ' . $product->name);
        $product->forceDelete();

        return redirect()->route('admin.products.index')->with('success', 'Product permanently deleted.');
    }
}
