@extends('layouts.admin')

@section('title', 'Edit Portfolio Project - Admin')
@section('page_title', 'Edit Project')

@section('content')
<div class="max-w-4xl">
    <!-- Header -->
    <div class="mb-6">
        <a href="{{ route('admin.portfolio.index') }}" class="inline-flex items-center text-sm text-gray-500 hover:text-gray-700">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
            Back to Portfolio
        </a>
        <h1 class="text-2xl font-bold text-gray-900 mt-2">Edit Project</h1>
        <p class="text-gray-600 mt-1">{{ $portfolio->title }}</p>
    </div>

    <form action="{{ route('admin.portfolio.update', $portfolio) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <!-- Basic Info -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <h2 class="text-lg font-semibold text-gray-900 mb-4">Basic Information</h2>
            
            <div class="space-y-4">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Project Title *</label>
                        <input type="text" name="title" id="title" value="{{ old('title', $portfolio->title) }}" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('title') border-red-500 @enderror">
                        @error('title')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="client_name" class="block text-sm font-medium text-gray-700 mb-1">Client Name</label>
                        <input type="text" name="client_name" id="client_name" value="{{ old('client_name', $portfolio->client_name) }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="slug" class="block text-sm font-medium text-gray-700 mb-1">Slug</label>
                        <input type="text" name="slug" id="slug" value="{{ old('slug', $portfolio->slug) }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        @error('slug')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="industry_id" class="block text-sm font-medium text-gray-700 mb-1">Industry</label>
                        <select name="industry_id" id="industry_id"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="">Select Industry</option>
                            @foreach($industries as $industry)
                            <option value="{{ $industry->id }}" {{ old('industry_id', $portfolio->industry_id) == $industry->id ? 'selected' : '' }}>{{ $industry->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div>
                    <label for="featured_image" class="block text-sm font-medium text-gray-700 mb-1">Featured Image</label>
                    @if($portfolio->featured_image)
                    <div class="mb-2">
                        <img src="{{ Storage::url($portfolio->featured_image) }}" alt="{{ $portfolio->title }}" class="h-32 w-auto rounded-lg object-cover">
                    </div>
                    @endif
                    <input type="file" name="featured_image" id="featured_image" accept="image/*"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    @error('featured_image')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="short_description" class="block text-sm font-medium text-gray-700 mb-1">Short Description *</label>
                    <textarea name="short_description" id="short_description" rows="2" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('short_description') border-red-500 @enderror">{{ old('short_description', $portfolio->short_description) }}</textarea>
                    @error('short_description')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="project_url" class="block text-sm font-medium text-gray-700 mb-1">Project URL</label>
                        <input type="url" name="project_url" id="project_url" value="{{ old('project_url', $portfolio->project_url) }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="https://example.com">
                    </div>

                    <div>
                        <label for="completion_date" class="block text-sm font-medium text-gray-700 mb-1">Completion Date</label>
                        <input type="date" name="completion_date" id="completion_date" value="{{ old('completion_date', $portfolio->completion_date?->format('Y-m-d')) }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                </div>

                <div>
                    <label for="technologies" class="block text-sm font-medium text-gray-700 mb-1">Technologies Used</label>
                    <input type="text" name="technologies" id="technologies" value="{{ old('technologies', $portfolio->technologies) }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Laravel, React, PostgreSQL (comma separated)">
                </div>
            </div>
        </div>

        <!-- Project Details -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <h2 class="text-lg font-semibold text-gray-900 mb-4">Project Details</h2>
            
            <div class="space-y-4">
                <div>
                    <label for="challenge" class="block text-sm font-medium text-gray-700 mb-1">The Challenge</label>
                    <textarea name="challenge" id="challenge" rows="4"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">{{ old('challenge', $portfolio->challenge) }}</textarea>
                </div>

                <div>
                    <label for="solution" class="block text-sm font-medium text-gray-700 mb-1">Our Solution</label>
                    <textarea name="solution" id="solution" rows="4"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">{{ old('solution', $portfolio->solution) }}</textarea>
                </div>

                <div>
                    <label for="results" class="block text-sm font-medium text-gray-700 mb-1">The Results</label>
                    <textarea name="results" id="results" rows="4"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">{{ old('results', $portfolio->results) }}</textarea>
                </div>
            </div>
        </div>

        <!-- Services -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <h2 class="text-lg font-semibold text-gray-900 mb-4">Related Services</h2>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-3">
                @foreach($services as $service)
                <label class="flex items-center space-x-2">
                    <input type="checkbox" name="services[]" value="{{ $service->id }}"
                        {{ in_array($service->id, old('services', $portfolio->services->pluck('id')->toArray())) ? 'checked' : '' }}
                        class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                    <span class="text-sm text-gray-700">{{ $service->title }}</span>
                </label>
                @endforeach
            </div>
        </div>

        <!-- SEO -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <h2 class="text-lg font-semibold text-gray-900 mb-4">SEO Settings</h2>
            
            <div class="space-y-4">
                <div>
                    <label for="meta_title" class="block text-sm font-medium text-gray-700 mb-1">Meta Title</label>
                    <input type="text" name="meta_title" id="meta_title" value="{{ old('meta_title', $portfolio->meta_title) }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div>
                    <label for="meta_description" class="block text-sm font-medium text-gray-700 mb-1">Meta Description</label>
                    <textarea name="meta_description" id="meta_description" rows="2"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">{{ old('meta_description', $portfolio->meta_description) }}</textarea>
                </div>
            </div>
        </div>

        <!-- Settings -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <h2 class="text-lg font-semibold text-gray-900 mb-4">Settings</h2>
            
            <div class="grid grid-cols-3 gap-4">
                <div>
                    <label for="sort_order" class="block text-sm font-medium text-gray-700 mb-1">Sort Order</label>
                    <input type="number" name="sort_order" id="sort_order" value="{{ old('sort_order', $portfolio->sort_order) }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div class="flex items-center pt-6">
                    <input type="hidden" name="is_active" value="0">
                    <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', $portfolio->is_active) ? 'checked' : '' }}
                        class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                    <label for="is_active" class="ml-2 text-sm text-gray-700">Active</label>
                </div>

                <div class="flex items-center pt-6">
                    <input type="hidden" name="is_featured" value="0">
                    <input type="checkbox" name="is_featured" id="is_featured" value="1" {{ old('is_featured', $portfolio->is_featured) ? 'checked' : '' }}
                        class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                    <label for="is_featured" class="ml-2 text-sm text-gray-700">Featured</label>
                </div>
            </div>
        </div>

        <!-- Actions -->
        <div class="flex items-center justify-between">
            <a href="{{ route('portfolio.show', $portfolio) }}" target="_blank" class="text-gray-500 hover:text-gray-700">
                <span class="inline-flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                    </svg>
                    View on website
                </span>
            </a>
            <div class="flex items-center space-x-4">
                <a href="{{ route('admin.portfolio.index') }}" class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                    Cancel
                </a>
                <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg font-semibold hover:bg-blue-700 transition-colors">
                    Update Project
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
