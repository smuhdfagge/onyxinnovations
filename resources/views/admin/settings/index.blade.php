@extends('layouts.admin')

@section('title', 'Site Settings - Admin')
@section('page_title', 'Site Settings')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Site Settings</h1>
            <p class="text-gray-600 mt-1">Manage your website configuration</p>
        </div>
        <div class="mt-4 sm:mt-0 flex space-x-3">
            <a href="{{ route('admin.partners.index') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 text-gray-700 rounded-lg font-semibold hover:bg-gray-50 transition-colors">
                Partners
            </a>
            <a href="{{ route('admin.testimonials.index') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 text-gray-700 rounded-lg font-semibold hover:bg-gray-50 transition-colors">
                Testimonials
            </a>
            <a href="{{ route('admin.investor-documents.index') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 text-gray-700 rounded-lg font-semibold hover:bg-gray-50 transition-colors">
                Investor Docs
            </a>
        </div>
    </div>

    <form action="{{ route('admin.settings.update') }}" method="POST" class="space-y-6">
        @csrf

        <!-- General Settings -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <h2 class="text-lg font-semibold text-gray-900 mb-6">General Settings</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="site_name" class="block text-sm font-medium text-gray-700 mb-1">Site Name</label>
                    <input type="text" name="settings[site_name]" id="site_name" 
                        value="{{ $settings['general']['site_name']->value ?? 'Onyx Innovations Ltd' }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div>
                    <label for="site_tagline" class="block text-sm font-medium text-gray-700 mb-1">Tagline</label>
                    <input type="text" name="settings[site_tagline]" id="site_tagline" 
                        value="{{ $settings['general']['site_tagline']->value ?? 'Your Trusted Technology Partner' }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div class="md:col-span-2">
                    <label for="site_description" class="block text-sm font-medium text-gray-700 mb-1">Site Description</label>
                    <textarea name="settings[site_description]" id="site_description" rows="3"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">{{ $settings['general']['site_description']->value ?? '' }}</textarea>
                </div>
            </div>
        </div>

        <!-- Contact Information -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <h2 class="text-lg font-semibold text-gray-900 mb-6">Contact Information</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="contact_email" class="block text-sm font-medium text-gray-700 mb-1">Contact Email</label>
                    <input type="email" name="settings[contact_email]" id="contact_email" 
                        value="{{ $settings['contact']['contact_email']->value ?? '' }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div>
                    <label for="contact_phone" class="block text-sm font-medium text-gray-700 mb-1">Contact Phone</label>
                    <input type="text" name="settings[contact_phone]" id="contact_phone" 
                        value="{{ $settings['contact']['contact_phone']->value ?? '' }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div class="md:col-span-2">
                    <label for="contact_address" class="block text-sm font-medium text-gray-700 mb-1">Address</label>
                    <textarea name="settings[contact_address]" id="contact_address" rows="2"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">{{ $settings['contact']['contact_address']->value ?? '' }}</textarea>
                </div>
            </div>
        </div>

        <!-- Social Media -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <h2 class="text-lg font-semibold text-gray-900 mb-6">Social Media Links</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="social_facebook" class="block text-sm font-medium text-gray-700 mb-1">Facebook</label>
                    <input type="url" name="settings[social_facebook]" id="social_facebook" 
                        value="{{ $settings['social']['social_facebook']->value ?? '' }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="https://facebook.com/...">
                </div>
                <div>
                    <label for="social_twitter" class="block text-sm font-medium text-gray-700 mb-1">Twitter / X</label>
                    <input type="url" name="settings[social_twitter]" id="social_twitter" 
                        value="{{ $settings['social']['social_twitter']->value ?? '' }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="https://twitter.com/...">
                </div>
                <div>
                    <label for="social_linkedin" class="block text-sm font-medium text-gray-700 mb-1">LinkedIn</label>
                    <input type="url" name="settings[social_linkedin]" id="social_linkedin" 
                        value="{{ $settings['social']['social_linkedin']->value ?? '' }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="https://linkedin.com/company/...">
                </div>
                <div>
                    <label for="social_instagram" class="block text-sm font-medium text-gray-700 mb-1">Instagram</label>
                    <input type="url" name="settings[social_instagram]" id="social_instagram" 
                        value="{{ $settings['social']['social_instagram']->value ?? '' }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="https://instagram.com/...">
                </div>
                <div>
                    <label for="social_youtube" class="block text-sm font-medium text-gray-700 mb-1">YouTube</label>
                    <input type="url" name="settings[social_youtube]" id="social_youtube" 
                        value="{{ $settings['social']['social_youtube']->value ?? '' }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="https://youtube.com/...">
                </div>
                <div>
                    <label for="social_github" class="block text-sm font-medium text-gray-700 mb-1">GitHub</label>
                    <input type="url" name="settings[social_github]" id="social_github" 
                        value="{{ $settings['social']['social_github']->value ?? '' }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="https://github.com/...">
                </div>
            </div>
        </div>

        <!-- Stats -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <h2 class="text-lg font-semibold text-gray-900 mb-6">Homepage Stats</h2>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                <div>
                    <label for="stats_projects" class="block text-sm font-medium text-gray-700 mb-1">Projects Delivered</label>
                    <input type="number" name="settings[stats_projects]" id="stats_projects" 
                        value="{{ $settings['stats']['stats_projects']->value ?? '150' }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div>
                    <label for="stats_clients" class="block text-sm font-medium text-gray-700 mb-1">Happy Clients</label>
                    <input type="number" name="settings[stats_clients]" id="stats_clients" 
                        value="{{ $settings['stats']['stats_clients']->value ?? '50' }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div>
                    <label for="stats_sectors" class="block text-sm font-medium text-gray-700 mb-1">Sectors Served</label>
                    <input type="number" name="settings[stats_sectors]" id="stats_sectors" 
                        value="{{ $settings['stats']['stats_sectors']->value ?? '10' }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div>
                    <label for="stats_years" class="block text-sm font-medium text-gray-700 mb-1">Years Experience</label>
                    <input type="number" name="settings[stats_years]" id="stats_years" 
                        value="{{ $settings['stats']['stats_years']->value ?? '8' }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>
            </div>
        </div>

        <!-- Submit -->
        <div class="flex justify-end">
            <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg font-semibold hover:bg-blue-700 transition-colors">
                Save Settings
            </button>
        </div>
    </form>
</div>
@endsection
