@extends('layouts.public')

@section('title', $service->meta_title ?? $service->title . ' - Onyx Innovations Ltd')
@section('meta_description', $service->meta_description ?? $service->short_description)

@section('content')
<!-- Hero Section -->
<section class="relative pt-32 pb-20 overflow-hidden">
    <div class="absolute inset-0">
        <img src="{{ asset('header.jpg') }}" alt="Header Background" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-br from-blue-900/85 via-blue-800/80 to-indigo-900/85"></div>
    </div>
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="text-sm mb-6">
            <a href="{{ route('services.index') }}" class="text-blue-200 hover:text-white">Services</a>
            <span class="text-blue-300 mx-2">/</span>
            <span class="text-white">{{ $service->title }}</span>
        </nav>
        <h1 class="text-4xl md:text-5xl font-bold text-white mb-6">{{ $service->title }}</h1>
        <p class="text-xl text-blue-100 max-w-3xl">{{ $service->short_description }}</p>
    </div>
</section>

<!-- Service Content -->
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-3 gap-12">
            <!-- Main Content -->
            <div class="lg:col-span-2">
                @if($service->problem_statement)
                <div class="mb-12">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">The Challenge</h2>
                    <div class="prose prose-lg text-gray-600">
                        {!! nl2br(e($service->problem_statement)) !!}
                    </div>
                </div>
                @endif

                @if($service->solution_approach)
                <div class="mb-12">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">Our Approach</h2>
                    <div class="prose prose-lg text-gray-600">
                        {!! nl2br(e($service->solution_approach)) !!}
                    </div>
                </div>
                @endif

                @if($service->business_value)
                <div class="mb-12">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">Business Value</h2>
                    <div class="prose prose-lg text-gray-600">
                        {!! nl2br(e($service->business_value)) !!}
                    </div>
                </div>
                @endif

                @if($service->use_cases)
                <div class="mb-12">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">Use Cases</h2>
                    <div class="prose prose-lg text-gray-600">
                        {!! nl2br(e($service->use_cases)) !!}
                    </div>
                </div>
                @endif

                @if($service->content)
                <div class="prose prose-lg text-gray-600 max-w-none">
                    {!! $service->content !!}
                </div>
                @endif
            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-1">
                <!-- CTA Box -->
                <div class="bg-blue-600 rounded-2xl p-8 text-white mb-8">
                    <h3 class="text-xl font-bold mb-4">Ready to Get Started?</h3>
                    <p class="text-blue-100 mb-6">Let's discuss how we can help transform your business with our {{ $service->title }} solutions.</p>
                    <a href="{{ route('contact') }}?service={{ $service->slug }}" class="inline-flex items-center justify-center w-full px-6 py-3 bg-white text-blue-600 rounded-full font-semibold hover:bg-blue-50 transition-colors">
                        Request a Consultation
                    </a>
                </div>

                <!-- Related Services -->
                @if($relatedServices->count() > 0)
                <div class="bg-gray-50 rounded-2xl p-8">
                    <h3 class="text-xl font-bold text-gray-900 mb-6">Related Services</h3>
                    <ul class="space-y-4">
                        @foreach($relatedServices as $related)
                        <li>
                            <a href="{{ route('services.show', $related) }}" class="flex items-center text-gray-700 hover:text-blue-600 transition-colors">
                                <svg class="w-5 h-5 mr-3 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                                {{ $related->title }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-24 bg-gray-50">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl font-bold text-gray-900 mb-6">Let's Build Something Great Together</h2>
        <p class="text-xl text-gray-600 mb-10">
            Contact us today to discuss your project requirements and get a free consultation.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('contact') }}" class="inline-flex items-center justify-center px-8 py-4 bg-blue-600 text-white rounded-full font-semibold hover:bg-blue-700 transition-all">
                Contact Us
            </a>
            <a href="{{ route('portfolio.index') }}" class="inline-flex items-center justify-center px-8 py-4 border-2 border-blue-600 text-blue-600 rounded-full font-semibold hover:bg-blue-600 hover:text-white transition-all">
                View Our Work
            </a>
        </div>
    </div>
</section>
@endsection
