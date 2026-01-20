@extends('layouts.public')

@section('title', 'Portfolio - Onyx Innovations Ltd')
@section('meta_description', 'Explore our portfolio of successful projects across various industries. See how we have helped businesses transform with our technology solutions.')

@section('content')
<!-- Hero Section -->
<section class="relative pt-32 pb-20 overflow-hidden">
    <div class="absolute inset-0">
        <img src="{{ asset('header.jpg') }}" alt="Header Background" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-br from-blue-900/85 via-blue-800/80 to-indigo-900/85"></div>
    </div>
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl md:text-5xl font-bold text-white mb-6">Our Portfolio</h1>
        <p class="text-xl text-blue-100 max-w-3xl mx-auto">
            Discover how we have helped businesses transform and grow through innovative technology solutions.
        </p>
    </div>
</section>

<!-- Filters -->
<section class="py-8 bg-white border-b">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <form method="GET" class="flex flex-wrap gap-4 items-center">
            <select name="industry" onchange="this.form.submit()" class="px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500">
                <option value="">All Industries</option>
                @foreach($industries as $industry)
                <option value="{{ $industry->slug }}" {{ request('industry') == $industry->slug ? 'selected' : '' }}>{{ $industry->name }}</option>
                @endforeach
            </select>
            <select name="service" onchange="this.form.submit()" class="px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500">
                <option value="">All Services</option>
                @foreach($services as $service)
                <option value="{{ $service->slug }}" {{ request('service') == $service->slug ? 'selected' : '' }}>{{ $service->title }}</option>
                @endforeach
            </select>
            @if(request('industry') || request('service'))
            <a href="{{ route('portfolio.index') }}" class="text-blue-600 hover:text-blue-700 font-medium">Clear Filters</a>
            @endif
        </form>
    </div>
</section>

<!-- Portfolio Grid -->
<section class="py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($portfolios as $portfolio)
            <div class="bg-white rounded-2xl overflow-hidden shadow-lg group hover:shadow-xl transition-all duration-300">
                <div class="relative overflow-hidden">
                    @if($portfolio->featured_image)
                    <img src="{{ Storage::url($portfolio->featured_image) }}" alt="{{ $portfolio->title }}" class="w-full h-56 object-cover group-hover:scale-110 transition-transform duration-500">
                    @else
                    <div class="w-full h-56 bg-gradient-to-br from-blue-600 to-indigo-700 flex items-center justify-center">
                        <span class="text-white text-4xl font-bold opacity-50">{{ substr($portfolio->title, 0, 1) }}</span>
                    </div>
                    @endif
                    @if($portfolio->industry)
                    <span class="absolute top-4 left-4 bg-blue-600 text-white text-xs font-semibold px-3 py-1 rounded-full">
                        {{ $portfolio->industry->name }}
                    </span>
                    @endif
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-blue-600 transition-colors">
                        {{ $portfolio->title }}
                    </h3>
                    @if($portfolio->client_name)
                    <p class="text-gray-500 text-sm mb-3">{{ $portfolio->client_name }}</p>
                    @endif
                    <p class="text-gray-600 mb-4">{{ Str::limit($portfolio->short_description, 100) }}</p>
                    @if($portfolio->technologies)
                    <div class="flex flex-wrap gap-2 mb-4">
                        @foreach(array_slice($portfolio->technologies_array, 0, 3) as $tech)
                        <span class="bg-gray-100 text-gray-600 text-xs px-2 py-1 rounded">{{ trim($tech) }}</span>
                        @endforeach
                    </div>
                    @endif
                    <a href="{{ route('portfolio.show', $portfolio) }}" class="inline-flex items-center text-blue-600 font-semibold hover:text-blue-700">
                        View Case Study
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>
            @empty
            <div class="col-span-full text-center py-12">
                <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                </svg>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">No Projects Found</h3>
                <p class="text-gray-600">Check back soon as we add more exciting projects to our portfolio.</p>
            </div>
            @endforelse
        </div>

        @if($portfolios->hasPages())
        <div class="mt-12">
            {{ $portfolios->links() }}
        </div>
        @endif
    </div>
</section>

<!-- CTA -->
<section class="py-24 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl font-bold text-gray-900 mb-6">Ready to Start Your Project?</h2>
        <p class="text-xl text-gray-600 mb-10">
            Let's discuss how we can help bring your ideas to life with our technology solutions.
        </p>
        <a href="{{ route('contact') }}" class="inline-flex items-center justify-center px-8 py-4 bg-blue-600 text-white rounded-full font-semibold hover:bg-blue-700 transition-all shadow-lg">
            Get Started
            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
            </svg>
        </a>
    </div>
</section>
@endsection
