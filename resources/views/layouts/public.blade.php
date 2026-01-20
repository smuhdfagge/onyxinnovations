<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Onyx Innovations Ltd') - Technology Solutions for Tomorrow</title>
    <meta name="description" content="@yield('meta_description', 'Onyx Innovations Ltd is a leading technology company delivering innovative software development, web & mobile applications, enterprise systems, ICT consulting, cloud infrastructure, and data analytics solutions.')">
    <meta name="keywords" content="@yield('meta_keywords', 'software development, web applications, mobile apps, enterprise systems, ICT consulting, cloud solutions, data analytics, technology partner')">
    
    <!-- Open Graph / Social Media -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="@yield('title', 'Onyx Innovations Ltd')">
    <meta property="og:description" content="@yield('meta_description', 'Onyx Innovations Ltd - Your Trusted Technology Partner')">
    <meta property="og:image" content="{{ asset('images/og-image.jpg') }}">
    
    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('title', 'Onyx Innovations Ltd')">
    <meta name="twitter:description" content="@yield('meta_description', 'Onyx Innovations Ltd - Your Trusted Technology Partner')">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('logo.png') }}">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:300,400,500,600,700,800&display=swap" rel="stylesheet" />
    
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Schema.org markup -->
    <script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@@type": "Organization",
        "name": "Onyx Innovations Ltd",
        "url": "{{ url('/') }}",
        "logo": "{{ asset('logo.png') }}",
        "description": "Leading technology company delivering innovative software solutions",
        "address": {
            "@@type": "PostalAddress",
            "addressLocality": "Technology City",
            "addressCountry": "Country"
        },
        "contactPoint": {
            "@@type": "ContactPoint",
            "telephone": "+1-234-567-8900",
            "contactType": "customer service"
        }
    }
    </script>

    @stack('styles')
</head>
<body class="font-sans antialiased bg-white text-gray-900">
    <!-- Navigation -->
    <x-public.navbar />

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <x-public.footer />

    <!-- Back to Top Button -->
    <button id="backToTop" class="fixed bottom-8 right-8 bg-blue-600 text-white p-3 rounded-full shadow-lg opacity-0 invisible transition-all duration-300 hover:bg-blue-700 z-50">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
        </svg>
    </button>

    <script>
        // Back to top button
        const backToTop = document.getElementById('backToTop');
        window.addEventListener('scroll', () => {
            if (window.pageYOffset > 300) {
                backToTop.classList.remove('opacity-0', 'invisible');
                backToTop.classList.add('opacity-100', 'visible');
            } else {
                backToTop.classList.add('opacity-0', 'invisible');
                backToTop.classList.remove('opacity-100', 'visible');
            }
        });
        backToTop.addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    </script>

    @stack('scripts')
</body>
</html>
