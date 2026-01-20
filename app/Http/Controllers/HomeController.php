<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Portfolio;
use App\Models\BlogPost;
use App\Models\Partner;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $services = Service::active()->ordered()->take(6)->get();
        $portfolios = Portfolio::active()->featured()->with('industry', 'services')->take(6)->get();
        $posts = BlogPost::published()->with('category', 'author')->latest('published_at')->take(3)->get();
        $partners = Partner::active()->ofType('client')->ordered()->take(12)->get();
        $testimonials = Testimonial::active()->featured()->ordered()->take(6)->get();

        $stats = [
            'projects' => 150,
            'clients' => 85,
            'sectors' => 12,
            'years' => 8,
        ];

        return view('home', compact('services', 'portfolios', 'posts', 'partners', 'testimonials', 'stats'));
    }
}
