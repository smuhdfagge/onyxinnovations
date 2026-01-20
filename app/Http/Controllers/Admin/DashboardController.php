<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Models\Contact;
use App\Models\JobApplication;
use App\Models\Portfolio;
use App\Models\Service;
use App\Models\ActivityLog;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'services' => Service::count(),
            'portfolios' => Portfolio::count(),
            'blog_posts' => BlogPost::count(),
            'contacts' => Contact::where('status', 'new')->count(),
            'applications' => JobApplication::where('status', 'new')->count(),
        ];

        $recentContacts = Contact::latest()->take(5)->get();
        $recentApplications = JobApplication::with('listing')->latest()->take(5)->get();
        $recentActivities = ActivityLog::with('user')->latest()->take(10)->get();

        return view('admin.dashboard', compact('stats', 'recentContacts', 'recentApplications', 'recentActivities'));
    }
}
