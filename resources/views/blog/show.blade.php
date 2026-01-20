@extends('layouts.public')

@section('title', ($post->meta_title ?? $post->title) . ' - Blog - Onyx Innovations Ltd')
@section('meta_description', $post->meta_description ?? $post->excerpt ?? Str::limit(strip_tags($post->content), 160))

@section('og_type', 'article')
@section('og_image', $post->featured_image ? Storage::url($post->featured_image) : asset('images/og-default.jpg'))

@push('head')
<script type="application/ld+json">
{
    "@@context": "https://schema.org",
    "@@type": "BlogPosting",
    "headline": "{{ $post->title }}",
    "image": "{{ $post->featured_image ? Storage::url($post->featured_image) : asset('images/og-default.jpg') }}",
    "datePublished": "{{ $post->published_at->toIso8601String() }}",
    "dateModified": "{{ $post->updated_at->toIso8601String() }}",
    "author": {
        "@@type": "Person",
        "name": "{{ $post->author->name ?? 'Onyx Innovations' }}"
    },
    "publisher": {
        "@@type": "Organization",
        "name": "Onyx Innovations Ltd",
        "logo": {
            "@@type": "ImageObject",
            "url": "{{ asset('logo.png') }}"
        }
    },
    "description": "{{ $post->excerpt ?? Str::limit(strip_tags($post->content), 160) }}"
}
</script>
@endpush

@section('content')
<!-- Hero Section -->
<section class="relative pt-32 pb-20 overflow-hidden">
    <div class="absolute inset-0">
        <img src="{{ asset('header.jpg') }}" alt="Header Background" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-br from-blue-900/85 via-blue-800/80 to-indigo-900/85"></div>
    </div>
    <div class="relative z-10 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="text-sm mb-6">
            <a href="{{ route('blog.index') }}" class="text-blue-200 hover:text-white">Blog</a>
            @if($post->category)
            <span class="text-blue-300 mx-2">/</span>
            <a href="{{ route('blog.index', ['category' => $post->category->slug]) }}" class="text-blue-200 hover:text-white">{{ $post->category->name }}</a>
            @endif
        </nav>
        <div class="flex flex-wrap items-center gap-3 mb-4">
            @if($post->category)
            <span class="bg-blue-500 text-white text-sm px-4 py-1 rounded-full">{{ $post->category->name }}</span>
            @endif
            <span class="text-blue-100 text-sm">{{ $post->reading_time ?? '5' }} min read</span>
        </div>
        <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-white mb-6 leading-tight">{{ $post->title }}</h1>
        <div class="flex items-center space-x-4">
            @if($post->author)
            <div class="w-12 h-12 bg-blue-600 rounded-full flex items-center justify-center text-white font-semibold">
                {{ substr($post->author->name, 0, 1) }}
            </div>
            <div>
                <p class="font-medium text-white">{{ $post->author->name }}</p>
                <p class="text-sm text-blue-200">{{ $post->published_at->format('F d, Y') }}</p>
            </div>
            @else
            <p class="text-blue-200">{{ $post->published_at->format('F d, Y') }}</p>
            @endif
        </div>
    </div>
</section>

<!-- Featured Image -->
@if($post->featured_image)
<section class="relative -mt-10">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <img src="{{ Storage::url($post->featured_image) }}" alt="{{ $post->title }}" class="w-full rounded-2xl shadow-2xl">
    </div>
</section>
@endif

<!-- Article Content -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-12 gap-12">
            <!-- Main Content -->
            <article class="lg:col-span-8">
                <div class="prose prose-lg max-w-none prose-headings:font-bold prose-headings:text-gray-900 prose-p:text-gray-600 prose-a:text-blue-600 prose-img:rounded-xl">
                    {!! $post->content !!}
                </div>

                <!-- Tags -->
                @if($post->tags && count($post->tags) > 0)
                <div class="mt-12 pt-8 border-t border-gray-200">
                    <h4 class="text-sm font-semibold text-gray-500 mb-4">TAGS</h4>
                    <div class="flex flex-wrap gap-2">
                        @foreach($post->tags as $tag)
                        <a href="{{ route('blog.index', ['tag' => $tag->slug]) }}" class="bg-gray-100 text-gray-700 px-4 py-2 rounded-full text-sm hover:bg-blue-100 hover:text-blue-700 transition-colors">
                            {{ $tag->name }}
                        </a>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Share -->
                <div class="mt-8 pt-8 border-t border-gray-200">
                    <h4 class="text-sm font-semibold text-gray-500 mb-4">SHARE THIS ARTICLE</h4>
                    <div class="flex space-x-4">
                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($post->title) }}" target="_blank" class="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center hover:bg-blue-500 hover:text-white transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg>
                        </a>
                        <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(request()->url()) }}&title={{ urlencode($post->title) }}" target="_blank" class="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center hover:bg-blue-700 hover:text-white transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                        </a>
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" target="_blank" class="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center hover:bg-blue-600 hover:text-white transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M22.675 0h-21.35c-.732 0-1.325.593-1.325 1.325v21.351c0 .731.593 1.324 1.325 1.324h11.495v-9.294h-3.128v-3.622h3.128v-2.671c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24l-1.918.001c-1.504 0-1.795.715-1.795 1.763v2.313h3.587l-.467 3.622h-3.12v9.293h6.116c.73 0 1.323-.593 1.323-1.325v-21.35c0-.732-.593-1.325-1.325-1.325z"/></svg>
                        </a>
                        <button onclick="navigator.clipboard.writeText('{{ request()->url() }}'); alert('Link copied to clipboard!');" class="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center hover:bg-gray-600 hover:text-white transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Author Bio -->
                @if($post->author)
                <div class="mt-12 bg-gray-50 rounded-2xl p-8">
                    <div class="flex items-start space-x-6">
                        <div class="w-20 h-20 bg-blue-600 rounded-full flex items-center justify-center text-white text-2xl font-bold flex-shrink-0">
                            {{ substr($post->author->name, 0, 1) }}
                        </div>
                        <div>
                            <h4 class="text-lg font-bold text-gray-900 mb-2">{{ $post->author->name }}</h4>
                            <p class="text-gray-600 mb-4">{{ $post->author->bio ?? 'Technology writer and industry expert at Onyx Innovations.' }}</p>
                            <a href="{{ route('blog.index', ['author' => $post->author->id]) }}" class="text-blue-600 font-semibold hover:text-blue-700">
                                View All Posts →
                            </a>
                        </div>
                    </div>
                </div>
                @endif
            </article>

            <!-- Sidebar -->
            <aside class="lg:col-span-4 space-y-8">
                <!-- Related Posts -->
                @if($relatedPosts->count() > 0)
                <div class="bg-gray-50 rounded-2xl p-8">
                    <h3 class="text-xl font-bold text-gray-900 mb-6">Related Articles</h3>
                    <div class="space-y-6">
                        @foreach($relatedPosts as $relatedPost)
                        <a href="{{ route('blog.show', $relatedPost) }}" class="group flex gap-4">
                            @if($relatedPost->featured_image)
                            <img src="{{ Storage::url($relatedPost->featured_image) }}" alt="{{ $relatedPost->title }}" class="w-20 h-20 object-cover rounded-lg flex-shrink-0">
                            @else
                            <div class="w-20 h-20 bg-blue-600 rounded-lg flex-shrink-0"></div>
                            @endif
                            <div>
                                <h4 class="font-semibold text-gray-900 group-hover:text-blue-600 transition-colors line-clamp-2">{{ $relatedPost->title }}</h4>
                                <p class="text-sm text-gray-500 mt-1">{{ $relatedPost->published_at->format('M d, Y') }}</p>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Categories -->
                @if(isset($categories) && $categories->count() > 0)
                <div class="bg-gray-50 rounded-2xl p-8">
                    <h3 class="text-xl font-bold text-gray-900 mb-6">Categories</h3>
                    <ul class="space-y-3">
                        @foreach($categories as $category)
                        <li>
                            <a href="{{ route('blog.index', ['category' => $category->slug]) }}" class="flex items-center justify-between text-gray-700 hover:text-blue-600 transition-colors">
                                <span>{{ $category->name }}</span>
                                <span class="bg-gray-200 text-gray-600 text-sm px-2 py-1 rounded">{{ $category->posts_count }}</span>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <!-- Newsletter -->
                <div class="bg-blue-600 rounded-2xl p-8 text-white">
                    <h3 class="text-xl font-bold mb-4">Subscribe to Newsletter</h3>
                    <p class="text-blue-100 mb-6">Get the latest articles and insights delivered to your inbox.</p>
                    <form action="#" method="POST" class="space-y-4">
                        <input type="email" name="email" placeholder="Your email" class="w-full px-4 py-3 rounded-lg bg-white/10 border border-white/20 text-white placeholder-blue-200 focus:ring-2 focus:ring-white focus:outline-none">
                        <button type="submit" class="w-full px-4 py-3 bg-white text-blue-600 rounded-lg font-semibold hover:bg-blue-50 transition-colors">
                            Subscribe
                        </button>
                    </form>
                </div>
            </aside>
        </div>
    </div>
</section>

<!-- More Articles -->
@if($morePosts->count() > 0)
<section class="py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-gray-900 mb-12 text-center">More Articles</h2>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($morePosts as $morePost)
            <a href="{{ route('blog.show', $morePost) }}" class="bg-white rounded-2xl overflow-hidden shadow-lg group hover:shadow-xl transition-all">
                @if($morePost->featured_image)
                <img src="{{ Storage::url($morePost->featured_image) }}" alt="{{ $morePost->title }}" class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                @else
                <div class="w-full h-48 bg-gradient-to-br from-blue-600 to-indigo-700"></div>
                @endif
                <div class="p-6">
                    @if($morePost->category)
                    <span class="text-blue-600 text-sm font-semibold">{{ $morePost->category->name }}</span>
                    @endif
                    <h3 class="text-lg font-bold text-gray-900 mt-2 group-hover:text-blue-600 transition-colors line-clamp-2">{{ $morePost->title }}</h3>
                    <p class="text-gray-500 text-sm mt-2">{{ $morePost->published_at->format('M d, Y') }}</p>
                </div>
            </a>
            @endforeach
        </div>
        <div class="text-center mt-12">
            <a href="{{ route('blog.index') }}" class="inline-flex items-center justify-center px-8 py-4 border-2 border-blue-600 text-blue-600 rounded-full font-semibold hover:bg-blue-600 hover:text-white transition-colors">
                View All Articles
            </a>
        </div>
    </div>
</section>
@endif
@endsection
