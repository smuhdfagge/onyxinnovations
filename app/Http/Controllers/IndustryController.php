<?php

namespace App\Http\Controllers;

use App\Models\Industry;
use Illuminate\Http\Request;

class IndustryController extends Controller
{
    public function index()
    {
        $industries = Industry::active()->ordered()->get();
        return view('industries.index', compact('industries'));
    }

    public function show(Industry $industry)
    {
        if (!$industry->is_active) {
            abort(404);
        }

        $portfolios = $industry->portfolios()->active()->take(6)->get();

        return view('industries.show', compact('industry', 'portfolios'));
    }
}
