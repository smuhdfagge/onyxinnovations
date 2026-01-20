<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\Partner;
use App\Models\Testimonial;
use App\Models\InvestorDocument;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingsController extends Controller
{
    public function index()
    {
        $settings = Setting::all()->groupBy('group');
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        foreach ($request->settings as $key => $value) {
            Setting::set($key, $value);
        }

        ActivityLog::log('updated', null, 'Updated site settings');

        return redirect()->back()->with('success', 'Settings updated successfully.');
    }

    // Partners
    public function partners()
    {
        $partners = Partner::withTrashed()->ordered()->paginate(20);
        return view('admin.settings.partners', compact('partners'));
    }

    public function storePartner(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'required|image|max:1024',
            'website' => 'nullable|url|max:255',
            'description' => 'nullable|string',
            'type' => 'required|in:technology,strategic,client,investor',
            'sort_order' => 'integer',
        ]);

        $validated['logo'] = $request->file('logo')->store('partners', 'public');

        Partner::create($validated);

        return redirect()->back()->with('success', 'Partner added successfully.');
    }

    public function destroyPartner(Partner $partner)
    {
        Storage::disk('public')->delete($partner->logo);
        $partner->forceDelete();

        return redirect()->back()->with('success', 'Partner deleted successfully.');
    }

    // Testimonials
    public function testimonials()
    {
        $testimonials = Testimonial::withTrashed()->ordered()->paginate(20);
        return view('admin.settings.testimonials', compact('testimonials'));
    }

    public function storeTestimonial(Request $request)
    {
        $validated = $request->validate([
            'client_name' => 'required|string|max:255',
            'client_position' => 'nullable|string|max:255',
            'client_company' => 'nullable|string|max:255',
            'client_photo' => 'nullable|image|max:1024',
            'content' => 'required|string',
            'rating' => 'integer|min:1|max:5',
            'is_featured' => 'boolean',
            'sort_order' => 'integer',
        ]);

        if ($request->hasFile('client_photo')) {
            $validated['client_photo'] = $request->file('client_photo')->store('testimonials', 'public');
        }

        Testimonial::create($validated);

        return redirect()->back()->with('success', 'Testimonial added successfully.');
    }

    public function destroyTestimonial(Testimonial $testimonial)
    {
        if ($testimonial->client_photo) {
            Storage::disk('public')->delete($testimonial->client_photo);
        }
        $testimonial->forceDelete();

        return redirect()->back()->with('success', 'Testimonial deleted successfully.');
    }

    // Investor Documents
    public function investorDocuments()
    {
        $documents = InvestorDocument::withTrashed()->latest()->paginate(20);
        return view('admin.settings.investor-documents', compact('documents'));
    }

    public function storeInvestorDocument(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'file' => 'required|file|mimes:pdf,doc,docx,ppt,pptx|max:10240',
            'description' => 'nullable|string',
            'category' => 'required|in:pitch_deck,annual_report,financials,governance,other',
            'is_public' => 'boolean',
        ]);

        $file = $request->file('file');
        $validated['file_path'] = $file->store('investor-documents', 'public');
        $validated['file_type'] = $file->getClientOriginalExtension();

        InvestorDocument::create($validated);

        return redirect()->back()->with('success', 'Document uploaded successfully.');
    }

    public function destroyInvestorDocument(InvestorDocument $document)
    {
        Storage::disk('public')->delete($document->file_path);
        $document->forceDelete();

        return redirect()->back()->with('success', 'Document deleted successfully.');
    }
}
