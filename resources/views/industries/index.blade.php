@extends('layouts.public')

@section('title', 'Industries - Onyx Innovations Ltd')
@section('meta_description', 'Explore how Onyx Innovations delivers tailored technology solutions across various industries including healthcare, finance, retail, manufacturing and more.')

@section('content')
<!-- Hero Section -->
<section class="relative pt-32 pb-20 overflow-hidden">
    <div class="absolute inset-0">
        <img src="{{ asset('header.jpg') }}" alt="Header Background" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-br from-blue-900/85 via-blue-800/80 to-indigo-900/85"></div>
    </div>
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl md:text-5xl font-bold text-white mb-6">Industries We Serve</h1>
        <p class="text-xl text-blue-100 max-w-3xl mx-auto">
            We bring deep domain expertise and cutting-edge technology solutions to organizations across diverse industry verticals.
        </p>
    </div>
</section>

<!-- Industries Grid -->
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($industries as $industry)
            <a href="{{ route('industries.show', $industry) }}" class="group bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-100">
                <div class="relative overflow-hidden">
                    @if($industry->image)
                    <img src="{{ Storage::url($industry->image) }}" alt="{{ $industry->name }}" class="w-full h-56 object-cover group-hover:scale-110 transition-transform duration-500">
                    @else
                    <div class="w-full h-56 bg-gradient-to-br from-blue-600 to-indigo-700 flex items-center justify-center">
                        @if($industry->icon)
                        <span class="text-6xl text-white opacity-50">{!! $industry->icon !!}</span>
                        @else
                        <svg class="w-16 h-16 text-white opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                        @endif
                    </div>
                    @endif
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                    <div class="absolute bottom-4 left-6 right-6">
                        <h3 class="text-xl font-bold text-white">{{ $industry->name }}</h3>
                    </div>
                </div>
                <div class="p-6">
                    <p class="text-gray-600 mb-4">{{ Str::limit($industry->short_description, 120) }}</p>
                    <span class="inline-flex items-center text-blue-600 font-semibold group-hover:text-blue-700">
                        Learn More
                        <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </span>
                </div>
            </a>
            @empty
            <!-- Default Industries when database is empty -->
            @php
            $defaultIndustries = [
                ['name' => 'Healthcare & Life Sciences', 'description' => 'Digital health solutions, EMR systems, telemedicine platforms, and healthcare analytics for modern medical institutions.', 'icon' => '🏥'],
                ['name' => 'Financial Services', 'description' => 'Secure banking solutions, fintech applications, payment processing, and regulatory compliance systems.', 'icon' => '🏦'],
                ['name' => 'Retail & E-commerce', 'description' => 'Omnichannel retail solutions, inventory management, customer analytics, and seamless shopping experiences.', 'icon' => '🛒'],
                ['name' => 'Manufacturing', 'description' => 'Industry 4.0 solutions, IoT integration, supply chain optimization, and smart factory implementations.', 'icon' => '🏭'],
                ['name' => 'Logistics & Transportation', 'description' => 'Fleet management, route optimization, warehouse automation, and real-time tracking solutions.', 'icon' => '🚚'],
                ['name' => 'Education & EdTech', 'description' => 'Learning management systems, virtual classrooms, student analytics, and educational content platforms.', 'icon' => '🎓'],
            ];
            @endphp
            @foreach($defaultIndustries as $industry)
            <div class="group bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-100">
                <div class="relative overflow-hidden">
                    <div class="w-full h-56 bg-gradient-to-br from-blue-600 to-indigo-700 flex items-center justify-center">
                        <span class="text-6xl">{{ $industry['icon'] }}</span>
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                    <div class="absolute bottom-4 left-6 right-6">
                        <h3 class="text-xl font-bold text-white">{{ $industry['name'] }}</h3>
                    </div>
                </div>
                <div class="p-6">
                    <p class="text-gray-600 mb-4">{{ $industry['description'] }}</p>
                    <a href="{{ route('contact') }}" class="inline-flex items-center text-blue-600 font-semibold hover:text-blue-700">
                        Learn More
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>
            @endforeach
            @endforelse
        </div>
    </div>
</section>

<!-- Why Choose Us for Your Industry -->
<section class="py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Why Industry Leaders Choose Us</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                We combine deep industry knowledge with technological expertise to deliver solutions that drive real business outcomes.
            </p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="text-center">
                <div class="w-16 h-16 bg-blue-100 rounded-2xl flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Domain Expertise</h3>
                <p class="text-gray-600">Deep understanding of industry-specific challenges, regulations, and best practices.</p>
            </div>
            <div class="text-center">
                <div class="w-16 h-16 bg-blue-100 rounded-2xl flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Accelerated Delivery</h3>
                <p class="text-gray-600">Pre-built industry components and frameworks for faster time-to-market.</p>
            </div>
            <div class="text-center">
                <div class="w-16 h-16 bg-blue-100 rounded-2xl flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Proven Results</h3>
                <p class="text-gray-600">Track record of successful implementations across industry verticals.</p>
            </div>
            <div class="text-center">
                <div class="w-16 h-16 bg-blue-100 rounded-2xl flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Dedicated Teams</h3>
                <p class="text-gray-600">Industry-focused specialists who understand your unique needs.</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-24 bg-blue-600">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl font-bold text-white mb-6">Don't See Your Industry?</h2>
        <p class="text-xl text-blue-100 mb-10">
            We work with organizations across many sectors. Let's discuss how we can help your business thrive.
        </p>
        <a href="{{ route('contact') }}" class="inline-flex items-center justify-center px-8 py-4 bg-white text-blue-600 rounded-full font-semibold hover:bg-blue-50 transition-colors shadow-lg">
            Contact Our Team
            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
            </svg>
        </a>
    </div>
</section>
@endsection
