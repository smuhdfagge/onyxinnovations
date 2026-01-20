@extends('layouts.public')

@section('title', ($portfolio->meta_title ?? $portfolio->title) . ' - Portfolio - Onyx Innovations Ltd')
@section('meta_description', $portfolio->meta_description ?? $portfolio->short_description)

@section('content')
<!-- Hero Section -->
<section class="relative pt-32 pb-20 overflow-hidden">
    <div class="absolute inset-0">
        <img src="{{ asset('header.jpg') }}" alt="Header Background" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-br from-blue-900/85 via-blue-800/80 to-indigo-900/85"></div>
    </div>
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="text-sm mb-6">
            <a href="{{ route('portfolio.index') }}" class="text-blue-200 hover:text-white">Portfolio</a>
            <span class="text-blue-300 mx-2">/</span>
            <span class="text-white">{{ $portfolio->title }}</span>
        </nav>
        <div class="flex flex-wrap gap-3 mb-4">
            @if($portfolio->industry)
            <span class="bg-blue-500 text-white text-sm px-4 py-1 rounded-full">{{ $portfolio->industry->name }}</span>
            @endif
            @if($portfolio->completion_date)
            <span class="bg-blue-700 text-blue-100 text-sm px-4 py-1 rounded-full">{{ $portfolio->completion_date->format('Y') }}</span>
            @endif
        </div>
        <h1 class="text-4xl md:text-5xl font-bold text-white mb-6">{{ $portfolio->title }}</h1>
        @if($portfolio->client_name)
        <p class="text-xl text-blue-100">Client: {{ $portfolio->client_name }}</p>
        @endif
    </div>
</section>

<!-- Project Content -->
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Featured Image -->
        @if($portfolio->featured_image)
        <div class="mb-16 rounded-2xl overflow-hidden shadow-xl">
            <img src="{{ Storage::url($portfolio->featured_image) }}" alt="{{ $portfolio->title }}" class="w-full h-auto">
        </div>
        @endif

        <div class="grid lg:grid-cols-3 gap-12">
            <!-- Main Content -->
            <div class="lg:col-span-2">
                <div class="prose prose-lg max-w-none">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">Overview</h2>
                    <p class="text-gray-600 leading-relaxed mb-8">{{ $portfolio->short_description }}</p>

                    @if($portfolio->challenge)
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">The Challenge</h2>
                    <div class="text-gray-600 leading-relaxed mb-8">{!! nl2br(e($portfolio->challenge)) !!}</div>
                    @endif

                    @if($portfolio->solution)
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">Our Solution</h2>
                    <div class="text-gray-600 leading-relaxed mb-8">{!! nl2br(e($portfolio->solution)) !!}</div>
                    @endif

                    @if($portfolio->results)
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">The Results</h2>
                    <div class="text-gray-600 leading-relaxed mb-8">{!! nl2br(e($portfolio->results)) !!}</div>
                    @endif
                </div>
            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-1 space-y-8">
                <!-- Project Details -->
                <div class="bg-gray-50 rounded-2xl p-8">
                    <h3 class="text-xl font-bold text-gray-900 mb-6">Project Details</h3>
                    <dl class="space-y-4">
                        @if($portfolio->client_name)
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Client</dt>
                            <dd class="text-gray-900 mt-1">{{ $portfolio->client_name }}</dd>
                        </div>
                        @endif
                        @if($portfolio->industry)
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Industry</dt>
                            <dd class="text-gray-900 mt-1">{{ $portfolio->industry->name }}</dd>
                        </div>
                        @endif
                        @if($portfolio->completion_date)
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Completed</dt>
                            <dd class="text-gray-900 mt-1">{{ $portfolio->completion_date->format('F Y') }}</dd>
                        </div>
                        @endif
                        @if($portfolio->project_url)
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Website</dt>
                            <dd class="mt-1">
                                <a href="{{ $portfolio->project_url }}" target="_blank" class="text-blue-600 hover:text-blue-700">Visit Project</a>
                            </dd>
                        </div>
                        @endif
                    </dl>
                </div>

                <!-- Technologies -->
                @if($portfolio->technologies)
                <div class="bg-gray-50 rounded-2xl p-8">
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Technologies Used</h3>
                    <div class="flex flex-wrap gap-2">
                        @foreach($portfolio->technologies_array as $tech)
                        <span class="bg-blue-100 text-blue-800 text-sm px-3 py-1 rounded-full">{{ trim($tech) }}</span>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Services -->
                @if($portfolio->services->count() > 0)
                <div class="bg-gray-50 rounded-2xl p-8">
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Services Provided</h3>
                    <ul class="space-y-2">
                        @foreach($portfolio->services as $service)
                        <li>
                            <a href="{{ route('services.show', $service) }}" class="text-blue-600 hover:text-blue-700 flex items-center">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                                {{ $service->title }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <!-- CTA -->
                <div class="bg-blue-600 rounded-2xl p-8 text-white">
                    <h3 class="text-xl font-bold mb-4">Start Your Project</h3>
                    <p class="text-blue-100 mb-6">Want to achieve similar results? Let's talk about your project.</p>
                    <a href="{{ route('contact') }}" class="inline-flex items-center justify-center w-full px-6 py-3 bg-white text-blue-600 rounded-full font-semibold hover:bg-blue-50 transition-colors">
                        Contact Us
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Related Projects -->
@if($related->count() > 0)
<section class="py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-gray-900 mb-12 text-center">Related Projects</h2>
        <div class="grid md:grid-cols-3 gap-8">
            @foreach($related as $project)
            <div class="bg-white rounded-2xl overflow-hidden shadow-lg group">
                @if($project->featured_image)
                <img src="{{ Storage::url($project->featured_image) }}" alt="{{ $project->title }}" class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                @else
                <div class="w-full h-48 bg-gradient-to-br from-blue-600 to-indigo-700"></div>
                @endif
                <div class="p-6">
                    <h3 class="text-lg font-bold text-gray-900 mb-2">{{ $project->title }}</h3>
                    <a href="{{ route('portfolio.show', $project) }}" class="text-blue-600 hover:text-blue-700 font-medium">View Project →</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif
@endsection
