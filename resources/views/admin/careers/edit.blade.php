@extends('layouts.admin')

@section('title', 'Edit Job Listing - Admin')
@section('page_title', 'Edit Job Listing')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="mb-6">
        <a href="{{ route('admin.careers.index') }}" class="inline-flex items-center text-gray-600 hover:text-gray-900">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
            Back to Job Listings
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
        <h2 class="text-xl font-semibold text-gray-900 mb-6">Edit Job Listing</h2>

        <form action="{{ route('admin.careers.update', $career) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Job Title *</label>
                    <input type="text" name="title" id="title" value="{{ old('title', $career->title) }}" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('title') border-red-500 @enderror"
                        placeholder="e.g., Senior Software Engineer">
                    @error('title')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="slug" class="block text-sm font-medium text-gray-700 mb-1">Slug</label>
                    <input type="text" name="slug" id="slug" value="{{ old('slug', $career->slug) }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    @error('slug')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="category_id" class="block text-sm font-medium text-gray-700 mb-1">Category</label>
                    <select name="category_id" id="category_id"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <option value="">Select Category</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id', $career->category_id) == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                        @endforeach
                    </select>
                    @error('category_id')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="location" class="block text-sm font-medium text-gray-700 mb-1">Location *</label>
                    <input type="text" name="location" id="location" value="{{ old('location', $career->location) }}" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('location') border-red-500 @enderror"
                        placeholder="e.g., Nairobi, Kenya or Remote">
                    @error('location')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div>
                    <label for="employment_type" class="block text-sm font-medium text-gray-700 mb-1">Employment Type *</label>
                    <select name="employment_type" id="employment_type" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <option value="full-time" {{ old('employment_type', $career->employment_type) == 'full-time' ? 'selected' : '' }}>Full Time</option>
                        <option value="part-time" {{ old('employment_type', $career->employment_type) == 'part-time' ? 'selected' : '' }}>Part Time</option>
                        <option value="contract" {{ old('employment_type', $career->employment_type) == 'contract' ? 'selected' : '' }}>Contract</option>
                        <option value="internship" {{ old('employment_type', $career->employment_type) == 'internship' ? 'selected' : '' }}>Internship</option>
                    </select>
                    @error('employment_type')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="experience_level" class="block text-sm font-medium text-gray-700 mb-1">Experience Level *</label>
                    <select name="experience_level" id="experience_level" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <option value="entry" {{ old('experience_level', $career->experience_level) == 'entry' ? 'selected' : '' }}>Entry Level</option>
                        <option value="mid" {{ old('experience_level', $career->experience_level) == 'mid' ? 'selected' : '' }}>Mid Level</option>
                        <option value="senior" {{ old('experience_level', $career->experience_level) == 'senior' ? 'selected' : '' }}>Senior Level</option>
                        <option value="executive" {{ old('experience_level', $career->experience_level) == 'executive' ? 'selected' : '' }}>Executive</option>
                    </select>
                    @error('experience_level')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="salary_range" class="block text-sm font-medium text-gray-700 mb-1">Salary Range</label>
                    <input type="text" name="salary_range" id="salary_range" value="{{ old('salary_range', $career->salary_range) }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="e.g., KES 100,000 - 150,000">
                    @error('salary_range')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div>
                <label for="application_deadline" class="block text-sm font-medium text-gray-700 mb-1">Application Deadline</label>
                <input type="date" name="application_deadline" id="application_deadline" value="{{ old('application_deadline', $career->application_deadline?->format('Y-m-d')) }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                @error('application_deadline')
                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="short_description" class="block text-sm font-medium text-gray-700 mb-1">Short Description *</label>
                <textarea name="short_description" id="short_description" rows="2" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('short_description') border-red-500 @enderror"
                    placeholder="Brief summary of the position (max 500 characters)">{{ old('short_description', $career->short_description) }}</textarea>
                @error('short_description')
                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Full Description *</label>
                <textarea name="description" id="description" rows="5" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('description') border-red-500 @enderror"
                    placeholder="Detailed job description...">{{ old('description', $career->description) }}</textarea>
                @error('description')
                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="requirements" class="block text-sm font-medium text-gray-700 mb-1">Requirements</label>
                <textarea name="requirements" id="requirements" rows="4"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="List the requirements for this position...">{{ old('requirements', $career->requirements) }}</textarea>
                @error('requirements')
                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="responsibilities" class="block text-sm font-medium text-gray-700 mb-1">Responsibilities</label>
                <textarea name="responsibilities" id="responsibilities" rows="4"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="List the key responsibilities...">{{ old('responsibilities', $career->responsibilities) }}</textarea>
                @error('responsibilities')
                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="benefits" class="block text-sm font-medium text-gray-700 mb-1">Benefits</label>
                <textarea name="benefits" id="benefits" rows="3"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="List the benefits offered...">{{ old('benefits', $career->benefits) }}</textarea>
                @error('benefits')
                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center space-x-6">
                <label class="flex items-center">
                    <input type="hidden" name="is_active" value="0">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', $career->is_active) ? 'checked' : '' }}
                        class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                    <span class="ml-2 text-sm text-gray-700">Active (accepting applications)</span>
                </label>

                <label class="flex items-center">
                    <input type="hidden" name="is_featured" value="0">
                    <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $career->is_featured) ? 'checked' : '' }}
                        class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                    <span class="ml-2 text-sm text-gray-700">Featured</span>
                </label>
            </div>

            <div class="flex justify-end space-x-4 pt-6 border-t">
                <a href="{{ route('admin.careers.index') }}" class="px-6 py-2 border border-gray-300 text-gray-700 rounded-lg font-semibold hover:bg-gray-50 transition-colors">
                    Cancel
                </a>
                <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg font-semibold hover:bg-blue-700 transition-colors">
                    Update Job Listing
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
