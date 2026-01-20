<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function store(ContactRequest $request)
    {
        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'company' => $request->company,
            'subject' => $request->subject,
            'message' => $request->message,
            'inquiry_type' => $request->inquiry_type ?? 'general',
            'ip_address' => $request->ip(),
        ]);

        // TODO: Send email notification to admin

        return back()->with('success', 'Thank you for your message. We will get back to you within 24-48 hours.');
    }
}
