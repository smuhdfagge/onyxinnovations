<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use App\Models\Industry;
use App\Models\Service;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index(Request $request)
    {
        $query = Portfolio::active()->with('industry', 'services')->ordered();

        if ($request->filled('industry')) {
            $query->whereHas('industry', function ($q) use ($request) {
                $q->where('slug', $request->industry);
            });
        }

        if ($request->filled('service')) {
            $query->whereHas('services', function ($q) use ($request) {
                $q->where('slug', $request->service);
            });
        }

        $portfolios = $query->paginate(12);
        $industries = Industry::active()->ordered()->get();
        $services = Service::active()->ordered()->get();

        return view('portfolio.index', compact('portfolios', 'industries', 'services'));
    }

    public function show(Portfolio $portfolio)
    {
        if (!$portfolio->is_active) {
            abort(404);
        }

        $portfolio->load('industry', 'services');

        $related = Portfolio::active()
            ->where('id', '!=', $portfolio->id)
            ->when($portfolio->industry_id, function ($q) use ($portfolio) {
                $q->where('industry_id', $portfolio->industry_id);
            })
            ->take(3)
            ->get();

        return view('portfolio.show', compact('portfolio', 'related'));
    }
}
