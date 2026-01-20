@extends('layouts.public')

@section('title', 'Investors - Onyx Innovations Ltd')
@section('meta_description', 'Investor relations information for Onyx Innovations Ltd. Access corporate governance, financial reports, and investment opportunities.')

@section('content')
<!-- Hero Section -->
<section class="relative pt-32 pb-20 overflow-hidden">
    <div class="absolute inset-0">
        <img src="{{ asset('header.jpg') }}" alt="Header Background" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-br from-blue-900/85 via-blue-800/80 to-indigo-900/85"></div>
    </div>
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl md:text-5xl font-bold text-white mb-6">Investor Relations</h1>
        <p class="text-xl text-blue-100 max-w-3xl mx-auto">
            Partner with us in building the future of technology. Explore investment opportunities and corporate information.
        </p>
    </div>
</section>

<!-- Investment Highlights -->
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Why Invest in Onyx Innovations</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                A compelling investment opportunity in the rapidly growing technology services sector.
            </p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="text-center p-8 bg-gray-50 rounded-2xl">
                <div class="text-4xl font-bold text-blue-600 mb-2">50%+</div>
                <div class="text-gray-600">Annual Revenue Growth</div>
            </div>
            <div class="text-center p-8 bg-gray-50 rounded-2xl">
                <div class="text-4xl font-bold text-blue-600 mb-2">200+</div>
                <div class="text-gray-600">Enterprise Clients</div>
            </div>
            <div class="text-center p-8 bg-gray-50 rounded-2xl">
                <div class="text-4xl font-bold text-blue-600 mb-2">15+</div>
                <div class="text-gray-600">Industry Verticals</div>
            </div>
            <div class="text-center p-8 bg-gray-50 rounded-2xl">
                <div class="text-4xl font-bold text-blue-600 mb-2">95%</div>
                <div class="text-gray-600">Client Retention Rate</div>
            </div>
        </div>
    </div>
</section>

<!-- Investment Proposition -->
<section class="py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <div>
                <h2 class="text-3xl font-bold text-gray-900 mb-6">Our Investment Proposition</h2>
                <div class="space-y-6">
                    <div class="flex items-start space-x-4">
                        <div class="w-8 h-8 bg-blue-600 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-gray-900 mb-2">Strong Market Position</h3>
                            <p class="text-gray-600">Established presence in high-growth markets with proven technology expertise and a track record of successful project delivery.</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-4">
                        <div class="w-8 h-8 bg-blue-600 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-gray-900 mb-2">Scalable Business Model</h3>
                            <p class="text-gray-600">Flexible delivery model combining onshore and offshore capabilities for optimal cost efficiency and scalability.</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-4">
                        <div class="w-8 h-8 bg-blue-600 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-gray-900 mb-2">Recurring Revenue Base</h3>
                            <p class="text-gray-600">Strong portfolio of managed services and support contracts providing predictable, recurring revenue streams.</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-4">
                        <div class="w-8 h-8 bg-blue-600 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-gray-900 mb-2">Experienced Leadership</h3>
                            <p class="text-gray-600">Management team with deep industry experience and proven track record of building successful technology businesses.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-2xl p-8 shadow-xl">
                <h3 class="text-2xl font-bold text-gray-900 mb-6">Request Investor Package</h3>
                <form action="{{ route('contact.store') }}" method="POST" class="space-y-6">
                    @csrf
                    <input type="hidden" name="inquiry_type" value="investor">
                    <div>
                        <label for="investor_name" class="block text-sm font-medium text-gray-700 mb-2">Full Name *</label>
                        <input type="text" name="name" id="investor_name" required class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div>
                        <label for="investor_email" class="block text-sm font-medium text-gray-700 mb-2">Email Address *</label>
                        <input type="email" name="email" id="investor_email" required class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div>
                        <label for="investor_company" class="block text-sm font-medium text-gray-700 mb-2">Company/Fund Name</label>
                        <input type="text" name="company" id="investor_company" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div>
                        <label for="investor_type" class="block text-sm font-medium text-gray-700 mb-2">Investor Type</label>
                        <select name="subject" id="investor_type" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="Institutional Investor">Institutional Investor</option>
                            <option value="Private Equity">Private Equity</option>
                            <option value="Venture Capital">Venture Capital</option>
                            <option value="Angel Investor">Angel Investor</option>
                            <option value="Strategic Partner">Strategic Partner</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div>
                        <label for="investor_message" class="block text-sm font-medium text-gray-700 mb-2">Message</label>
                        <textarea name="message" id="investor_message" rows="3" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Tell us about your investment interests..."></textarea>
                    </div>
                    <button type="submit" class="w-full px-6 py-4 bg-blue-600 text-white rounded-full font-semibold hover:bg-blue-700 transition-colors">
                        Request Information
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Documents Section -->
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Investor Documents</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Access key documents and resources for investors.
            </p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($documents ?? [] as $document)
            <div class="bg-gray-50 rounded-2xl p-6 flex items-center justify-between group hover:bg-gray-100 transition-colors">
                <div class="flex items-center space-x-4">
                    <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-900">{{ $document->title }}</h3>
                        <p class="text-sm text-gray-500">{{ $document->category }} • {{ $document->created_at->format('M Y') }}</p>
                    </div>
                </div>
                <a href="{{ Storage::url($document->file_path) }}" target="_blank" class="w-10 h-10 bg-blue-600 rounded-full flex items-center justify-center text-white opacity-0 group-hover:opacity-100 transition-opacity">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                    </svg>
                </a>
            </div>
            @empty
            <!-- Placeholder documents when database is empty -->
            @php
            $placeholderDocs = [
                ['title' => 'Company Overview', 'category' => 'Corporate Profile', 'icon' => 'building'],
                ['title' => 'Pitch Deck', 'category' => 'Presentation', 'icon' => 'presentation'],
                ['title' => 'Executive Summary', 'category' => 'Investment', 'icon' => 'document'],
                ['title' => 'Financial Highlights', 'category' => 'Financial', 'icon' => 'chart'],
                ['title' => 'Market Analysis', 'category' => 'Research', 'icon' => 'analysis'],
                ['title' => 'Leadership Team', 'category' => 'Corporate Profile', 'icon' => 'team'],
            ];
            @endphp
            @foreach($placeholderDocs as $doc)
            <div class="bg-gray-50 rounded-2xl p-6 flex items-center justify-between group hover:bg-gray-100 transition-colors">
                <div class="flex items-center space-x-4">
                    <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-900">{{ $doc['title'] }}</h3>
                        <p class="text-sm text-gray-500">{{ $doc['category'] }}</p>
                    </div>
                </div>
                <span class="text-sm text-gray-400">Available on request</span>
            </div>
            @endforeach
            @endforelse
        </div>
    </div>
</section>

<!-- Corporate Governance -->
<section class="py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Corporate Governance</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                We maintain the highest standards of corporate governance and transparency.
            </p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            <div class="bg-white rounded-2xl p-8 shadow-lg">
                <div class="w-14 h-14 bg-blue-100 rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-7 h-7 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Board Oversight</h3>
                <p class="text-gray-600">Independent board members providing strategic guidance and ensuring accountability to stakeholders.</p>
            </div>
            <div class="bg-white rounded-2xl p-8 shadow-lg">
                <div class="w-14 h-14 bg-blue-100 rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-7 h-7 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Financial Transparency</h3>
                <p class="text-gray-600">Regular financial reporting and audited statements prepared in accordance with international standards.</p>
            </div>
            <div class="bg-white rounded-2xl p-8 shadow-lg">
                <div class="w-14 h-14 bg-blue-100 rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-7 h-7 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Ethics & Compliance</h3>
                <p class="text-gray-600">Comprehensive compliance framework and code of ethics governing all business operations.</p>
            </div>
        </div>
    </div>
</section>

<!-- Contact Investor Relations -->
<section class="py-24 bg-blue-600">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl font-bold text-white mb-6">Contact Investor Relations</h2>
        <p class="text-xl text-blue-100 mb-8">
            For investor inquiries, please reach out to our investor relations team.
        </p>
        <div class="flex flex-col sm:flex-row items-center justify-center gap-6">
            <div class="flex items-center space-x-3 text-white">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                </svg>
                <a href="mailto:investors@onyxinnovations.com" class="hover:underline">investors@onyxinnovations.com</a>
            </div>
            <div class="flex items-center space-x-3 text-white">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                </svg>
                <span>+1 (234) 567-8900</span>
            </div>
        </div>
    </div>
</section>
@endsection
