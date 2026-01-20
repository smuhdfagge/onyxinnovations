@extends('layouts.public')

@section('title', $job->title . ' - Careers - Onyx Innovations Ltd')
@section('meta_description', 'Apply for ' . $job->title . ' position at Onyx Innovations. ' . Str::limit(strip_tags($job->description), 150))

@section('content')
<!-- Hero Section -->
<section class="relative pt-32 pb-20 overflow-hidden">
    <div class="absolute inset-0">
        <img src="{{ asset('header.jpg') }}" alt="Header Background" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-br from-blue-900/85 via-blue-800/80 to-indigo-900/85"></div>
    </div>
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="text-sm mb-6">
            <a href="{{ route('careers.index') }}" class="text-blue-200 hover:text-white">Careers</a>
            <span class="text-blue-300 mx-2">/</span>
            <span class="text-white">{{ $job->title }}</span>
        </nav>
        <div class="flex flex-wrap gap-3 mb-4">
            @if($job->category)
            <span class="bg-blue-500 text-white text-sm px-4 py-1 rounded-full">{{ $job->category->name }}</span>
            @endif
            <span class="bg-blue-700 text-blue-100 text-sm px-4 py-1 rounded-full">{{ ucfirst($job->employment_type) }}</span>
            @if($job->is_featured)
            <span class="bg-yellow-500 text-yellow-900 text-sm px-4 py-1 rounded-full">Featured</span>
            @endif
        </div>
        <h1 class="text-4xl md:text-5xl font-bold text-white mb-6">{{ $job->title }}</h1>
        <div class="flex flex-wrap items-center gap-6 text-blue-100">
            <span class="flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                </svg>
                {{ $job->location }}
            </span>
            @if($job->salary_range)
            <span class="flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                {{ $job->salary_range }}
            </span>
            @endif
            <span class="flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
                Posted {{ $job->created_at->diffForHumans() }}
            </span>
        </div>
    </div>
</section>

<!-- Job Content -->
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-3 gap-12">
            <!-- Main Content -->
            <div class="lg:col-span-2">
                @if($job->description)
                <div class="mb-12">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">About the Role</h2>
                    <div class="prose prose-lg max-w-none text-gray-600">
                        {!! $job->description !!}
                    </div>
                </div>
                @endif

                @if($job->responsibilities)
                <div class="mb-12">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">Responsibilities</h2>
                    <div class="prose prose-lg max-w-none text-gray-600">
                        {!! $job->responsibilities !!}
                    </div>
                </div>
                @endif

                @if($job->requirements)
                <div class="mb-12">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">Requirements</h2>
                    <div class="prose prose-lg max-w-none text-gray-600">
                        {!! $job->requirements !!}
                    </div>
                </div>
                @endif

                @if($job->benefits)
                <div class="mb-12">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">Benefits</h2>
                    <div class="prose prose-lg max-w-none text-gray-600">
                        {!! $job->benefits !!}
                    </div>
                </div>
                @endif
            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-1 space-y-8">
                <!-- Apply Now Card -->
                <div class="bg-blue-600 rounded-2xl p-8 text-white sticky top-24">
                    <h3 class="text-xl font-bold mb-4">Ready to Apply?</h3>
                    <p class="text-blue-100 mb-6">Join our team and help us build amazing technology solutions.</p>
                    <a href="#apply" class="block w-full text-center px-6 py-4 bg-white text-blue-600 rounded-full font-semibold hover:bg-blue-50 transition-colors">
                        Apply for This Position
                    </a>
                </div>

                <!-- Job Summary -->
                <div class="bg-gray-50 rounded-2xl p-8">
                    <h3 class="text-xl font-bold text-gray-900 mb-6">Job Summary</h3>
                    <dl class="space-y-4">
                        @if($job->category)
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Department</dt>
                            <dd class="text-gray-900 mt-1">{{ $job->category->name }}</dd>
                        </div>
                        @endif
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Location</dt>
                            <dd class="text-gray-900 mt-1">{{ $job->location }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Employment Type</dt>
                            <dd class="text-gray-900 mt-1">{{ ucfirst($job->employment_type) }}</dd>
                        </div>
                        @if($job->salary_range)
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Salary Range</dt>
                            <dd class="text-gray-900 mt-1">{{ $job->salary_range }}</dd>
                        </div>
                        @endif
                        @if($job->experience_level)
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Experience Level</dt>
                            <dd class="text-gray-900 mt-1">{{ $job->experience_level }}</dd>
                        </div>
                        @endif
                        @if($job->application_deadline)
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Application Deadline</dt>
                            <dd class="text-gray-900 mt-1">{{ $job->application_deadline->format('M d, Y') }}</dd>
                        </div>
                        @endif
                    </dl>
                </div>

                <!-- Share -->
                <div class="bg-gray-50 rounded-2xl p-8">
                    <h3 class="text-lg font-bold text-gray-900 mb-4">Share This Job</h3>
                    <div class="flex space-x-3">
                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($job->title . ' at Onyx Innovations') }}" target="_blank" class="w-10 h-10 bg-gray-200 rounded-full flex items-center justify-center hover:bg-blue-500 hover:text-white transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg>
                        </a>
                        <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(request()->url()) }}&title={{ urlencode($job->title) }}" target="_blank" class="w-10 h-10 bg-gray-200 rounded-full flex items-center justify-center hover:bg-blue-700 hover:text-white transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                        </a>
                        <a href="mailto:?subject={{ urlencode($job->title . ' at Onyx Innovations') }}&body={{ urlencode('Check out this job opportunity: ' . request()->url()) }}" class="w-10 h-10 bg-gray-200 rounded-full flex items-center justify-center hover:bg-gray-600 hover:text-white transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Application Form -->
<section id="apply" class="py-24 bg-gray-50">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Apply for This Position</h2>
            <p class="text-xl text-gray-600">Fill out the form below to submit your application.</p>
        </div>

        <div class="bg-white rounded-2xl p-8 shadow-xl">
            @if(session('success'))
            <div class="bg-green-50 border border-green-200 text-green-700 px-6 py-4 rounded-xl mb-6">
                {{ session('success') }}
            </div>
            @endif

            <form action="{{ route('careers.apply', $job) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Full Name *</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}" required
                            class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('name') border-red-500 @enderror">
                        @error('name')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address *</label>
                        <input type="email" name="email" id="email" value="{{ old('email') }}" required
                            class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('email') border-red-500 @enderror">
                        @error('email')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Phone Number *</label>
                        <input type="tel" name="phone" id="phone" value="{{ old('phone') }}" required
                            class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('phone') border-red-500 @enderror">
                        @error('phone')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="linkedin" class="block text-sm font-medium text-gray-700 mb-2">LinkedIn Profile</label>
                        <input type="url" name="linkedin_url" id="linkedin" value="{{ old('linkedin_url') }}"
                            class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="https://linkedin.com/in/yourprofile">
                    </div>
                </div>

                <div>
                    <label for="resume" class="block text-sm font-medium text-gray-700 mb-2">Resume/CV * (PDF, DOC, DOCX - Max 5MB)</label>
                    <input type="file" name="resume" id="resume" accept=".pdf,.doc,.docx" required
                        class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('resume') border-red-500 @enderror">
                    @error('resume')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="cover_letter" class="block text-sm font-medium text-gray-700 mb-2">Cover Letter</label>
                    <textarea name="cover_letter" id="cover_letter" rows="5"
                        class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Tell us why you're interested in this position and what makes you a great fit...">{{ old('cover_letter') }}</textarea>
                </div>

                <div>
                    <label for="portfolio_url" class="block text-sm font-medium text-gray-700 mb-2">Portfolio/Website URL</label>
                    <input type="url" name="portfolio_url" id="portfolio_url" value="{{ old('portfolio_url') }}"
                        class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="https://yourportfolio.com">
                </div>

                <div>
                    <label for="expected_salary" class="block text-sm font-medium text-gray-700 mb-2">Expected Salary</label>
                    <input type="text" name="expected_salary" id="expected_salary" value="{{ old('expected_salary') }}"
                        class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="e.g., $80,000 - $100,000">
                </div>

                <div class="flex items-start">
                    <input type="checkbox" name="agree_terms" id="agree_terms" required class="mt-1 mr-3">
                    <label for="agree_terms" class="text-sm text-gray-600">
                        I agree to the processing of my personal data for recruitment purposes and confirm that all information provided is accurate. *
                    </label>
                </div>

                <button type="submit" class="w-full px-8 py-4 bg-blue-600 text-white rounded-full font-semibold hover:bg-blue-700 transition-colors shadow-lg">
                    Submit Application
                </button>
            </form>
        </div>
    </div>
</section>

<!-- Related Jobs -->
@if($relatedJobs->count() > 0)
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-gray-900 mb-12 text-center">Similar Positions</h2>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($relatedJobs as $relatedJob)
            <a href="{{ route('careers.show', $relatedJob) }}" class="bg-gray-50 rounded-2xl p-6 hover:bg-gray-100 transition-colors group">
                <h3 class="text-lg font-bold text-gray-900 mb-2 group-hover:text-blue-600 transition-colors">{{ $relatedJob->title }}</h3>
                <div class="flex flex-wrap items-center gap-3 text-gray-600 text-sm">
                    <span>{{ $relatedJob->location }}</span>
                    <span>•</span>
                    <span>{{ ucfirst($relatedJob->employment_type) }}</span>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>
@endif
@endsection
