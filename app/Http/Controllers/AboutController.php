<?php

namespace App\Http\Controllers;

use App\Models\TeamMember;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $leadership = TeamMember::active()->leadership()->ordered()->get();
        $team = TeamMember::active()->where('is_leadership', false)->ordered()->get();

        return view('about', compact('leadership', 'team'));
    }
}
