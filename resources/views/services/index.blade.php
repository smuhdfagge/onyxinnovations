@extends('layouts.public')

@section('title', 'Our Services - Onyx Innovations Ltd')
@section('meta_description', 'Explore our comprehensive technology services including software development, web & mobile applications, enterprise systems, ICT consulting, cloud solutions, and data analytics.')

@section('content')
<!-- Hero Section -->
<section class="relative pt-32 pb-20 overflow-hidden">
    <div class="absolute inset-0">
        <img src="{{ asset('header.jpg') }}" alt="Header Background" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-br from-blue-900/85 via-blue-800/80 to-indigo-900/85"></div>
    </div>
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl md:text-5xl font-bold text-white mb-6">Our Services</h1>
        <p class="text-xl text-blue-100 max-w-3xl mx-auto">
            Comprehensive technology solutions tailored to drive your business forward.
        </p>
    </div>
</section>

<!-- Services Grid -->
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($services as $service)
            <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-100 group">
                <div class="w-16 h-16 bg-blue-100 rounded-xl flex items-center justify-center mb-6 group-hover:bg-blue-600 transition-colors">
                    <svg class="w-8 h-8 text-blue-600 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">{{ $service->title }}</h3>
                <p class="text-gray-600 mb-6 leading-relaxed">{{ $service->short_description }}</p>
                <a href="{{ route('services.show', $service) }}" class="inline-flex items-center text-blue-600 font-semibold hover:text-blue-700">
                    Learn More
                    <svg class="w-4 h-4 ml-2 group-hover:translate-x-2 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div>
            @empty
            <!-- Default services -->
            @foreach([
                ['title' => 'Software Development', 'slug' => 'software-development', 'icon' => 'code', 'desc' => 'Custom software solutions designed to address your unique business challenges. From desktop applications to complex enterprise systems, we build software that drives efficiency and growth.'],
                ['title' => 'Web & Mobile Applications', 'slug' => 'web-mobile-applications', 'icon' => 'device-mobile', 'desc' => 'Beautiful, responsive web and mobile applications that deliver exceptional user experiences. We use modern frameworks to create fast, scalable, and secure applications.'],
                ['title' => 'Enterprise Systems', 'slug' => 'enterprise-systems', 'icon' => 'server', 'desc' => 'Comprehensive enterprise solutions including ERP, CRM, and business process automation systems that streamline operations and improve productivity.'],
                ['title' => 'ICT Consulting', 'slug' => 'ict-consulting', 'icon' => 'light-bulb', 'desc' => 'Strategic technology consulting to help you make informed decisions, optimize IT investments, and develop roadmaps for digital transformation.'],
                ['title' => 'Cloud & Infrastructure', 'slug' => 'cloud-infrastructure', 'icon' => 'cloud', 'desc' => 'Modern cloud solutions including migration, architecture design, and managed services. We help you leverage cloud technology for scalability and cost efficiency.'],
                ['title' => 'Data, Analytics & Automation', 'slug' => 'data-analytics-automation', 'icon' => 'chart-bar', 'desc' => 'Transform your data into actionable insights with our analytics solutions. We implement business intelligence, machine learning, and process automation.'],
            ] as $service)
            <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-100 group">
                <div class="w-16 h-16 bg-blue-100 rounded-xl flex items-center justify-center mb-6 group-hover:bg-blue-600 transition-colors">
                    <svg class="w-8 h-8 text-blue-600 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">{{ $service['title'] }}</h3>
                <p class="text-gray-600 mb-6 leading-relaxed">{{ $service['desc'] }}</p>
                <a href="{{ route('services.show', $service['slug']) }}" class="inline-flex items-center text-blue-600 font-semibold hover:text-blue-700">
                    Learn More
                    <svg class="w-4 h-4 ml-2 group-hover:translate-x-2 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div>
            @endforeach
            @endforelse
        </div>
    </div>
</section>

<!-- Process Section -->
<section class="py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <span class="text-blue-600 font-semibold text-sm uppercase tracking-wider">Our Process</span>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mt-2 mb-4">How We Work</h2>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                Our proven methodology ensures successful project delivery every time.
            </p>
        </div>

        <div class="grid md:grid-cols-4 gap-8">
            @foreach([
                ['step' => '01', 'title' => 'Discovery', 'desc' => 'We begin by understanding your business, challenges, and objectives through in-depth consultations.'],
                ['step' => '02', 'title' => 'Planning', 'desc' => 'Our team develops a comprehensive strategy and roadmap tailored to your specific needs.'],
                ['step' => '03', 'title' => 'Development', 'desc' => 'We build your solution using agile methodologies with regular updates and feedback loops.'],
                ['step' => '04', 'title' => 'Delivery & Support', 'desc' => 'We deploy your solution and provide ongoing support to ensure long-term success.'],
            ] as $process)
            <div class="text-center">
                <div class="text-5xl font-bold text-blue-600 mb-4">{{ $process['step'] }}</div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">{{ $process['title'] }}</h3>
                <p class="text-gray-600">{{ $process['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- CTA -->
<section class="py-24 bg-gradient-to-r from-blue-600 to-indigo-700 text-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-6">Need a Custom Solution?</h2>
        <p class="text-xl text-blue-100 mb-10">
            Let's discuss your project requirements. Our team is ready to help you find the perfect solution.
        </p>
        <a href="{{ route('contact') }}" class="inline-flex items-center justify-center px-8 py-4 bg-white text-blue-600 rounded-full font-semibold text-lg hover:bg-blue-50 transition-all shadow-lg">
            Get in Touch
            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
            </svg>
        </a>
    </div>
</section>
@endsection
