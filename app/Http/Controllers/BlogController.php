<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $query = BlogPost::published()->with('category', 'author');

        if ($request->filled('category')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('excerpt', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%");
            });
        }

        $posts = $query->latest('published_at')->paginate(9);
        $categories = BlogCategory::active()->withCount(['posts' => function ($q) {
            $q->published();
        }])->get();
        $featured = BlogPost::published()->featured()->with('category', 'author')->latest('published_at')->first();

        return view('blog.index', compact('posts', 'categories', 'featured'));
    }

    public function show(BlogPost $post)
    {
        if ($post->status !== 'published') {
            abort(404);
        }

        $post->incrementViews();
        $post->load('category', 'author', 'tags');

        $relatedPosts = BlogPost::published()
            ->where('id', '!=', $post->id)
            ->where('category_id', $post->category_id)
            ->latest('published_at')
            ->take(3)
            ->get();

        $categories = BlogCategory::active()->withCount(['posts' => function ($q) {
            $q->published();
        }])->get();

        $morePosts = BlogPost::published()
            ->where('id', '!=', $post->id)
            ->whereNotIn('id', $relatedPosts->pluck('id'))
            ->latest('published_at')
            ->take(3)
            ->get();

        return view('blog.show', compact('post', 'relatedPosts', 'categories', 'morePosts'));
    }
}
