<?php

namespace App\Http\Controllers;

use App\Models\InvestorDocument;
use App\Models\Partner;
use Illuminate\Http\Request;

class InvestorController extends Controller
{
    public function index()
    {
        $documents = InvestorDocument::active()->public()->get()->groupBy('category');
        $partners = Partner::active()->ofType('investor')->ordered()->get();
        $strategicPartners = Partner::active()->ofType('strategic')->ordered()->get();

        return view('investors', compact('documents', 'partners', 'strategicPartners'));
    }

    public function download(InvestorDocument $document)
    {
        if (!$document->is_active || !$document->is_public) {
            abort(404);
        }

        $document->incrementDownloads();

        return response()->download(storage_path('app/public/' . $document->file_path));
    }
}
