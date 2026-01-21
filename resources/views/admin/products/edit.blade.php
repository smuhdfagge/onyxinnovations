@extends('layouts.admin')

@section('title', 'Edit Product - Admin')
@section('page_title', 'Edit Product')

@section('content')
<div class="max-w-4xl">
    <!-- Header -->
    <div class="mb-6">
        <a href="{{ route('admin.products.index') }}" class="inline-flex items-center text-sm text-gray-500 hover:text-gray-700">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
            Back to Products
        </a>
        <h1 class="text-2xl font-bold text-gray-900 mt-2">Edit Product: {{ $product->name }}</h1>
    </div>

    <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <!-- Basic Info -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <h2 class="text-lg font-semibold text-gray-900 mb-4">Basic Information</h2>
            
            <div class="space-y-4">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Product Name *</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('name') border-red-500 @enderror">
                        @error('name')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="slug" class="block text-sm font-medium text-gray-700 mb-1">Slug</label>
                        <input type="text" name="slug" id="slug" value="{{ old('slug', $product->slug) }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                </div>

                <div>
                    <label for="tagline" class="block text-sm font-medium text-gray-700 mb-1">Tagline</label>
                    <input type="text" name="tagline" id="tagline" value="{{ old('tagline', $product->tagline) }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="A short catchy phrase describing the product">
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="category" class="block text-sm font-medium text-gray-700 mb-1">Category</label>
                        <input type="text" name="category" id="category" value="{{ old('category', $product->category) }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="e.g., ERP, CRM, E-commerce">
                    </div>

                    <div>
                        <label for="platform" class="block text-sm font-medium text-gray-700 mb-1">Platform</label>
                        <input type="text" name="platform" id="platform" value="{{ old('platform', $product->platform) }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="e.g., Web, Mobile, Desktop">
                    </div>
                </div>

                <div>
                    <label for="version" class="block text-sm font-medium text-gray-700 mb-1">Version</label>
                    <input type="text" name="version" id="version" value="{{ old('version', $product->version) }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="e.g., 1.0.0">
                </div>

                <div>
                    <label for="short_description" class="block text-sm font-medium text-gray-700 mb-1">Short Description *</label>
                    <textarea name="short_description" id="short_description" rows="2" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('short_description') border-red-500 @enderror"
                        placeholder="Brief summary for listings (max 500 characters)">{{ old('short_description', $product->short_description) }}</textarea>
                    @error('short_description')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Images -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <h2 class="text-lg font-semibold text-gray-900 mb-4">Images</h2>
            
            <div class="space-y-4">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="logo" class="block text-sm font-medium text-gray-700 mb-1">Product Logo</label>
                        @if($product->logo)
                        <div class="mb-2">
                            <img src="{{ Storage::url($product->logo) }}" alt="{{ $product->name }}" class="h-16 w-16 rounded-lg object-contain bg-gray-100 p-2">
                        </div>
                        @endif
                        <input type="file" name="logo" id="logo" accept="image/*"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <div>
                        <label for="featured_image" class="block text-sm font-medium text-gray-700 mb-1">Featured Image</label>
                        @if($product->featured_image)
                        <div class="mb-2">
                            <img src="{{ Storage::url($product->featured_image) }}" alt="{{ $product->name }}" class="h-16 w-auto rounded-lg object-cover">
                        </div>
                        @endif
                        <input type="file" name="featured_image" id="featured_image" accept="image/*"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Current Screenshots</label>
                    @if($product->screenshots && count($product->screenshots) > 0)
                    <div class="grid grid-cols-4 gap-4 mb-4">
                        @foreach($product->screenshots as $index => $screenshot)
                        <div class="relative group">
                            <img src="{{ Storage::url($screenshot) }}" alt="Screenshot {{ $index + 1 }}" class="w-full h-24 rounded-lg object-cover">
                            <label class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity rounded-lg cursor-pointer">
                                <input type="checkbox" name="remove_screenshots[]" value="{{ $index }}" class="h-5 w-5">
                                <span class="ml-2 text-white text-sm">Remove</span>
                            </label>
                        </div>
                        @endforeach
                    </div>
                    @else
                    <p class="text-sm text-gray-500 mb-4">No screenshots uploaded yet.</p>
                    @endif
                    
                    <label for="screenshots" class="block text-sm font-medium text-gray-700 mb-1">Add More Screenshots</label>
                    <input type="file" name="screenshots[]" id="screenshots" accept="image/*" multiple
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>
            </div>
        </div>

        <!-- Detailed Content -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <h2 class="text-lg font-semibold text-gray-900 mb-4">Detailed Content</h2>
            
            <div class="space-y-4">
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Full Description</label>
                    <textarea name="description" id="description" rows="6"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Detailed product description">{{ old('description', $product->description) }}</textarea>
                </div>

                <div>
                    <label for="features" class="block text-sm font-medium text-gray-700 mb-1">Features</label>
                    <textarea name="features" id="features" rows="6"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Enter each feature on a new line">{{ old('features', is_array($product->features) ? implode("\n", $product->features) : $product->features) }}</textarea>
                    <p class="mt-1 text-xs text-gray-500">Enter each feature on a new line</p>
                </div>
            </div>
        </div>

        <!-- Links -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <h2 class="text-lg font-semibold text-gray-900 mb-4">Product Links</h2>
            
            <div class="space-y-4">
                <div>
                    <label for="product_url" class="block text-sm font-medium text-gray-700 mb-1">Product URL</label>
                    <input type="url" name="product_url" id="product_url" value="{{ old('product_url', $product->product_url) }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="https://product.example.com">
                </div>

                <div>
                    <label for="demo_url" class="block text-sm font-medium text-gray-700 mb-1">Demo URL</label>
                    <input type="url" name="demo_url" id="demo_url" value="{{ old('demo_url', $product->demo_url) }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="https://demo.example.com">
                </div>

                <div>
                    <label for="documentation_url" class="block text-sm font-medium text-gray-700 mb-1">Documentation URL</label>
                    <input type="url" name="documentation_url" id="documentation_url" value="{{ old('documentation_url', $product->documentation_url) }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="https://docs.example.com">
                </div>
            </div>
        </div>

        <!-- SEO -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <h2 class="text-lg font-semibold text-gray-900 mb-4">SEO Settings</h2>
            
            <div class="space-y-4">
                <div>
                    <label for="meta_title" class="block text-sm font-medium text-gray-700 mb-1">Meta Title</label>
                    <input type="text" name="meta_title" id="meta_title" value="{{ old('meta_title', $product->meta_title) }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div>
                    <label for="meta_description" class="block text-sm font-medium text-gray-700 mb-1">Meta Description</label>
                    <textarea name="meta_description" id="meta_description" rows="2"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">{{ old('meta_description', $product->meta_description) }}</textarea>
                </div>
            </div>
        </div>

        <!-- Settings -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <h2 class="text-lg font-semibold text-gray-900 mb-4">Settings</h2>
            
            <div class="grid grid-cols-3 gap-4">
                <div>
                    <label for="sort_order" class="block text-sm font-medium text-gray-700 mb-1">Sort Order</label>
                    <input type="number" name="sort_order" id="sort_order" value="{{ old('sort_order', $product->sort_order) }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div class="flex items-center pt-6">
                    <input type="hidden" name="is_active" value="0">
                    <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', $product->is_active) ? 'checked' : '' }}
                        class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                    <label for="is_active" class="ml-2 text-sm text-gray-700">Active</label>
                </div>

                <div class="flex items-center pt-6">
                    <input type="hidden" name="is_featured" value="0">
                    <input type="checkbox" name="is_featured" id="is_featured" value="1" {{ old('is_featured', $product->is_featured) ? 'checked' : '' }}
                        class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                    <label for="is_featured" class="ml-2 text-sm text-gray-700">Featured</label>
                </div>
            </div>
        </div>

        <!-- Actions -->
        <div class="flex items-center justify-end space-x-4">
            <a href="{{ route('admin.products.index') }}" class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                Cancel
            </a>
            <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg font-semibold hover:bg-blue-700 transition-colors">
                Update Product
            </button>
        </div>
    </form>
</div>
@endsection
