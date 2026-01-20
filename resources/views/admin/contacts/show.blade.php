@extends('layouts.admin')

@section('title', 'View Message - Admin')
@section('page_title', 'View Message')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="mb-6">
        <a href="{{ route('admin.contacts.index') }}" class="inline-flex items-center text-gray-600 hover:text-gray-900">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
            Back to Messages
        </a>
    </div>

    <div class="grid lg:grid-cols-3 gap-6">
        <!-- Message Content -->
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <div class="flex items-start justify-between mb-6">
                    <div class="flex items-center">
                        <div class="h-12 w-12 rounded-full bg-gradient-to-br from-blue-600 to-indigo-700 flex items-center justify-center text-white text-lg font-semibold">
                            {{ substr($contact->name, 0, 1) }}
                        </div>
                        <div class="ml-4">
                            <h2 class="text-lg font-semibold text-gray-900">{{ $contact->name }}</h2>
                            <p class="text-gray-500">{{ $contact->email }}</p>
                        </div>
                    </div>
                    <div class="text-right text-sm text-gray-500">
                        {{ $contact->created_at->format('F d, Y') }}<br>
                        {{ $contact->created_at->format('h:i A') }}
                    </div>
                </div>

                <div class="border-t border-gray-200 pt-6">
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">{{ $contact->subject }}</h3>
                    <div class="prose prose-sm max-w-none text-gray-600">
                        {!! nl2br(e($contact->message)) !!}
                    </div>
                </div>
            </div>

            <!-- Contact Details -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Contact Information</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Email</label>
                        <p class="mt-1">
                            <a href="mailto:{{ $contact->email }}" class="text-blue-600 hover:text-blue-900">{{ $contact->email }}</a>
                        </p>
                    </div>
                    @if($contact->phone)
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Phone</label>
                        <p class="mt-1">
                            <a href="tel:{{ $contact->phone }}" class="text-blue-600 hover:text-blue-900">{{ $contact->phone }}</a>
                        </p>
                    </div>
                    @endif
                    @if($contact->company)
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Company</label>
                        <p class="mt-1 text-gray-900">{{ $contact->company }}</p>
                    </div>
                    @endif
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Inquiry Type</label>
                        <p class="mt-1 text-gray-900">{{ $contact->inquiry_type_label ?? ucfirst($contact->inquiry_type ?? 'General') }}</p>
                    </div>
                    @if($contact->ip_address)
                    <div>
                        <label class="block text-sm font-medium text-gray-500">IP Address</label>
                        <p class="mt-1 text-gray-500 text-sm">{{ $contact->ip_address }}</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="space-y-6">
            <!-- Status Update -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Update Status</h3>
                
                <form action="{{ route('admin.contacts.update', $contact) }}" method="POST" class="space-y-4">
                    @csrf
                    @method('PATCH')

                    <div>
                        <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                        <select name="status" id="status" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="new" {{ $contact->status == 'new' ? 'selected' : '' }}>New</option>
                            <option value="read" {{ $contact->status == 'read' ? 'selected' : '' }}>Read</option>
                            <option value="replied" {{ $contact->status == 'replied' ? 'selected' : '' }}>Replied</option>
                            <option value="archived" {{ $contact->status == 'archived' ? 'selected' : '' }}>Archived</option>
                        </select>
                    </div>

                    <div>
                        <label for="admin_notes" class="block text-sm font-medium text-gray-700 mb-1">Admin Notes</label>
                        <textarea name="admin_notes" id="admin_notes" rows="4"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Internal notes...">{{ $contact->admin_notes }}</textarea>
                    </div>

                    <button type="submit" class="w-full px-4 py-2 bg-blue-600 text-white rounded-lg font-semibold hover:bg-blue-700 transition-colors">
                        Update Status
                    </button>
                </form>
            </div>

            <!-- Quick Actions -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Quick Actions</h3>
                <div class="space-y-3">
                    <a href="mailto:{{ $contact->email }}?subject=Re: {{ $contact->subject }}" class="flex items-center px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">
                        <svg class="w-5 h-5 mr-3 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                        Reply via Email
                    </a>
                    @if($contact->phone)
                    <a href="tel:{{ $contact->phone }}" class="flex items-center px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">
                        <svg class="w-5 h-5 mr-3 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                        </svg>
                        Call Contact
                    </a>
                    @endif
                    <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST" onsubmit="return confirm('Delete this message?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w-full flex items-center px-4 py-2 border border-red-300 text-red-600 rounded-lg hover:bg-red-50 transition-colors">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                            Delete Message
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
