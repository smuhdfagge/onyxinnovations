@extends('layouts.public')

@section('title', 'Blog - Onyx Innovations Ltd')
@section('meta_description', 'Stay updated with the latest technology insights, industry trends, and company news from Onyx Innovations.')

@section('content')
<!-- Hero Section -->
<section class="relative pt-32 pb-20 overflow-hidden">
    <div class="absolute inset-0">
        <img src="{{ asset('header.jpg') }}" alt="Header Background" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-br from-blue-900/85 via-blue-800/80 to-indigo-900/85"></div>
    </div>
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl md:text-5xl font-bold text-white mb-6">Our Blog</h1>
        <p class="text-xl text-blue-100 max-w-3xl mx-auto">
            Insights, trends, and thought leadership from our team of technology experts.
        </p>
    </div>
</section>

<!-- Search & Filters -->
<section class="py-8 bg-white border-b sticky top-16 z-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <form method="GET" class="flex flex-wrap gap-4 items-center">
            <div class="flex-1 min-w-[200px]">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search articles..."
                    class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500">
            </div>
            <select name="category" onchange="this.form.submit()" class="px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500">
                <option value="">All Categories</option>
                @foreach($categories ?? [] as $category)
                <option value="{{ $category->slug }}" {{ request('category') == $category->slug ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
            <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                Search
            </button>
            @if(request()->hasAny(['search', 'category']))
            <a href="{{ route('blog.index') }}" class="text-blue-600 hover:text-blue-700 font-medium">Clear</a>
            @endif
        </form>
    </div>
</section>

<!-- Featured Post -->
@if(isset($featuredPost) && $featuredPost)
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <a href="{{ route('blog.show', $featuredPost) }}" class="group grid lg:grid-cols-2 gap-8 items-center bg-white rounded-3xl overflow-hidden shadow-xl">
            @if($featuredPost->featured_image)
            <img src="{{ Storage::url($featuredPost->featured_image) }}" alt="{{ $featuredPost->title }}" class="w-full h-80 lg:h-full object-cover group-hover:scale-105 transition-transform duration-500">
            @else
            <div class="w-full h-80 lg:h-full bg-gradient-to-br from-blue-600 to-indigo-700"></div>
            @endif
            <div class="p-8 lg:p-12">
                <span class="inline-block bg-blue-100 text-blue-800 text-sm font-semibold px-4 py-1 rounded-full mb-4">Featured</span>
                @if($featuredPost->category)
                <span class="text-gray-500 text-sm ml-2">{{ $featuredPost->category->name }}</span>
                @endif
                <h2 class="text-3xl font-bold text-gray-900 mb-4 group-hover:text-blue-600 transition-colors">{{ $featuredPost->title }}</h2>
                <p class="text-gray-600 mb-6">{{ $featuredPost->excerpt ?? Str::limit(strip_tags($featuredPost->content), 200) }}</p>
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        @if($featuredPost->author)
                        <div class="w-10 h-10 bg-blue-600 rounded-full flex items-center justify-center text-white font-semibold">
                            {{ substr($featuredPost->author->name, 0, 1) }}
                        </div>
                        <div>
                            <p class="font-medium text-gray-900">{{ $featuredPost->author->name }}</p>
                            <p class="text-sm text-gray-500">{{ $featuredPost->published_at->format('M d, Y') }}</p>
                        </div>
                        @endif
                    </div>
                    <span class="inline-flex items-center text-blue-600 font-semibold">
                        Read More
                        <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </span>
                </div>
            </div>
        </a>
    </div>
</section>
@endif

<!-- Blog Posts Grid -->
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($posts ?? [] as $post)
            <article class="bg-white rounded-2xl overflow-hidden shadow-lg group hover:shadow-xl transition-all duration-300 border border-gray-100">
                <a href="{{ route('blog.show', $post) }}">
                    @if($post->featured_image)
                    <img src="{{ Storage::url($post->featured_image) }}" alt="{{ $post->title }}" class="w-full h-56 object-cover group-hover:scale-105 transition-transform duration-500">
                    @else
                    <div class="w-full h-56 bg-gradient-to-br from-blue-600 to-indigo-700 flex items-center justify-center">
                        <svg class="w-16 h-16 text-white opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                        </svg>
                    </div>
                    @endif
                </a>
                <div class="p-6">
                    <div class="flex items-center gap-3 mb-3">
                        @if($post->category)
                        <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-3 py-1 rounded-full">{{ $post->category->name }}</span>
                        @endif
                        <span class="text-gray-500 text-sm">{{ $post->published_at->format('M d, Y') }}</span>
                    </div>
                    <a href="{{ route('blog.show', $post) }}">
                        <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-blue-600 transition-colors line-clamp-2">{{ $post->title }}</h3>
                    </a>
                    <p class="text-gray-600 mb-4 line-clamp-3">{{ $post->excerpt ?? Str::limit(strip_tags($post->content), 120) }}</p>
                    <div class="flex items-center justify-between">
                        @if($post->author)
                        <div class="flex items-center space-x-2">
                            <div class="w-8 h-8 bg-gray-200 rounded-full flex items-center justify-center text-gray-600 text-sm font-semibold">
                                {{ substr($post->author->name, 0, 1) }}
                            </div>
                            <span class="text-sm text-gray-600">{{ $post->author->name }}</span>
                        </div>
                        @endif
                        <a href="{{ route('blog.show', $post) }}" class="text-blue-600 font-semibold text-sm hover:text-blue-700">
                            Read More →
                        </a>
                    </div>
                </div>
            </article>
            @empty
            <!-- Default posts when database is empty -->
            @php
            $defaultPosts = [
                ['title' => 'The Future of Cloud Computing in 2024', 'excerpt' => 'Explore the emerging trends and technologies shaping cloud computing this year.', 'category' => 'Cloud', 'author' => 'John Smith', 'date' => 'Jan 15, 2024'],
                ['title' => 'How AI is Transforming Software Development', 'excerpt' => 'Discover how artificial intelligence tools are revolutionizing the way we build software.', 'category' => 'AI & ML', 'author' => 'Sarah Johnson', 'date' => 'Jan 10, 2024'],
                ['title' => 'Best Practices for Enterprise System Integration', 'excerpt' => 'Learn the key strategies for successful system integration in large organizations.', 'category' => 'Technology', 'author' => 'Mike Wilson', 'date' => 'Jan 5, 2024'],
                ['title' => 'Cybersecurity Trends Every Business Should Know', 'excerpt' => 'Stay ahead of threats with these essential cybersecurity insights for 2024.', 'category' => 'Security', 'author' => 'Emily Chen', 'date' => 'Dec 28, 2023'],
                ['title' => 'Building Scalable Microservices Architecture', 'excerpt' => 'A comprehensive guide to designing and implementing microservices at scale.', 'category' => 'Development', 'author' => 'David Brown', 'date' => 'Dec 20, 2023'],
                ['title' => 'Digital Transformation Success Stories', 'excerpt' => 'Real-world examples of businesses that achieved remarkable results through digital transformation.', 'category' => 'Business', 'author' => 'Lisa Anderson', 'date' => 'Dec 15, 2023'],
            ];
            @endphp
            @foreach($defaultPosts as $post)
            <article class="bg-white rounded-2xl overflow-hidden shadow-lg group hover:shadow-xl transition-all duration-300 border border-gray-100">
                <div class="w-full h-56 bg-gradient-to-br from-blue-600 to-indigo-700"></div>
                <div class="p-6">
                    <div class="flex items-center gap-3 mb-3">
                        <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-3 py-1 rounded-full">{{ $post['category'] }}</span>
                        <span class="text-gray-500 text-sm">{{ $post['date'] }}</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">{{ $post['title'] }}</h3>
                    <p class="text-gray-600 mb-4">{{ $post['excerpt'] }}</p>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-2">
                            <div class="w-8 h-8 bg-gray-200 rounded-full flex items-center justify-center text-gray-600 text-sm font-semibold">
                                {{ substr($post['author'], 0, 1) }}
                            </div>
                            <span class="text-sm text-gray-600">{{ $post['author'] }}</span>
                        </div>
                        <a href="#" class="text-blue-600 font-semibold text-sm hover:text-blue-700">Read More →</a>
                    </div>
                </div>
            </article>
            @endforeach
            @endforelse
        </div>

        @if(isset($posts) && $posts->hasPages())
        <div class="mt-12">
            {{ $posts->links() }}
        </div>
        @endif
    </div>
</section>

<!-- Newsletter Signup -->
<section class="py-24 bg-blue-600">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl font-bold text-white mb-4">Subscribe to Our Newsletter</h2>
        <p class="text-xl text-blue-100 mb-8">
            Get the latest insights and updates delivered straight to your inbox.
        </p>
        <form action="#" method="POST" class="flex flex-col sm:flex-row gap-4 max-w-lg mx-auto">
            <input type="email" name="email" required placeholder="Enter your email"
                class="flex-1 px-6 py-4 rounded-full focus:ring-2 focus:ring-blue-300 focus:outline-none">
            <button type="submit" class="px-8 py-4 bg-white text-blue-600 rounded-full font-semibold hover:bg-blue-50 transition-colors">
                Subscribe
            </button>
        </form>
        <p class="text-blue-200 text-sm mt-4">We respect your privacy. Unsubscribe at any time.</p>
    </div>
</section>
@endsection
