<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\IndustryController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\InvestorController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\ServiceController as AdminServiceController;
use App\Http\Controllers\Admin\PortfolioController as AdminPortfolioController;
use App\Http\Controllers\Admin\BlogController as AdminBlogController;
use App\Http\Controllers\Admin\TeamController as AdminTeamController;
use App\Http\Controllers\Admin\CareerController as AdminCareerController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\Admin\IndustryController as AdminIndustryController;
use App\Http\Controllers\Admin\SettingsController as AdminSettingsController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');

// Services
Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/services/{service}', [ServiceController::class, 'show'])->name('services.show');

// Industries/Solutions
Route::get('/industries', [IndustryController::class, 'index'])->name('industries.index');
Route::get('/industries/{industry}', [IndustryController::class, 'show'])->name('industries.show');

// Portfolio
Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio.index');
Route::get('/portfolio/{portfolio}', [PortfolioController::class, 'show'])->name('portfolio.show');

// Investors
Route::get('/investors', [InvestorController::class, 'index'])->name('investors');
Route::get('/investors/download/{document}', [InvestorController::class, 'download'])->name('investors.download');

// Careers
Route::get('/careers', [CareerController::class, 'index'])->name('careers.index');
Route::get('/careers/{job}', [CareerController::class, 'show'])->name('careers.show');
Route::post('/careers/{job}/apply', [CareerController::class, 'apply'])->name('careers.apply');

// Blog
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{post}', [BlogController::class, 'show'])->name('blog.show');

// Products
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

// Contact
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Dashboard redirect for authenticated users
Route::get('/dashboard', function () {
    if (auth()->user()->isAdmin()) {
        return redirect()->route('admin.dashboard');
    }
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin Routes
Route::prefix('admin')->name('admin.')->middleware(['auth', 'verified', \App\Http\Middleware\AdminMiddleware::class])->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');

    // Services
    Route::resource('services', AdminServiceController::class);
    Route::patch('services/{id}/restore', [AdminServiceController::class, 'restore'])->name('services.restore');
    Route::delete('services/{id}/force-delete', [AdminServiceController::class, 'forceDelete'])->name('services.force-delete');

    // Portfolio
    Route::resource('portfolio', AdminPortfolioController::class);
    Route::patch('portfolio/{id}/restore', [AdminPortfolioController::class, 'restore'])->name('portfolio.restore');
    Route::delete('portfolio/{id}/force-delete', [AdminPortfolioController::class, 'forceDelete'])->name('portfolio.force-delete');

    // Industries
    Route::resource('industries', AdminIndustryController::class);
    Route::patch('industries/{id}/restore', [AdminIndustryController::class, 'restore'])->name('industries.restore');
    Route::delete('industries/{id}/force-delete', [AdminIndustryController::class, 'forceDelete'])->name('industries.force-delete');

    // Blog
    Route::resource('blog', AdminBlogController::class);
    Route::patch('blog/{id}/restore', [AdminBlogController::class, 'restore'])->name('blog.restore');
    Route::delete('blog/{id}/force-delete', [AdminBlogController::class, 'forceDelete'])->name('blog.force-delete');
    Route::get('blog-categories', [AdminBlogController::class, 'categories'])->name('blog.categories');
    Route::post('blog-categories', [AdminBlogController::class, 'storeCategory'])->name('blog.categories.store');
    Route::delete('blog-categories/{category}', [AdminBlogController::class, 'destroyCategory'])->name('blog.categories.destroy');

    // Team
    Route::resource('team', AdminTeamController::class);
    Route::patch('team/{id}/restore', [AdminTeamController::class, 'restore'])->name('team.restore');
    Route::delete('team/{id}/force-delete', [AdminTeamController::class, 'forceDelete'])->name('team.force-delete');

    // Careers
    Route::resource('careers', AdminCareerController::class);
    Route::patch('careers/{id}/restore', [AdminCareerController::class, 'restore'])->name('careers.restore');
    Route::delete('careers/{id}/force-delete', [AdminCareerController::class, 'forceDelete'])->name('careers.force-delete');
    Route::get('job-applications', [AdminCareerController::class, 'applications'])->name('careers.applications');
    Route::get('job-applications/{application}', [AdminCareerController::class, 'showApplication'])->name('careers.applications.show');
    Route::patch('job-applications/{application}', [AdminCareerController::class, 'updateApplicationStatus'])->name('careers.applications.update');
    Route::get('job-categories', [AdminCareerController::class, 'categories'])->name('careers.categories');
    Route::post('job-categories', [AdminCareerController::class, 'storeCategory'])->name('careers.categories.store');
    Route::delete('job-categories/{category}', [AdminCareerController::class, 'destroyCategory'])->name('careers.categories.destroy');

    // Contacts
    Route::get('contacts', [AdminContactController::class, 'index'])->name('contacts.index');
    Route::get('contacts/{contact}', [AdminContactController::class, 'show'])->name('contacts.show');
    Route::patch('contacts/{contact}', [AdminContactController::class, 'updateStatus'])->name('contacts.update');
    Route::delete('contacts/{contact}', [AdminContactController::class, 'destroy'])->name('contacts.destroy');

    // Settings
    Route::get('settings', [AdminSettingsController::class, 'index'])->name('settings.index');
    Route::post('settings', [AdminSettingsController::class, 'update'])->name('settings.update');
    
    // Partners
    Route::get('partners', [AdminSettingsController::class, 'partners'])->name('partners.index');
    Route::post('partners', [AdminSettingsController::class, 'storePartner'])->name('partners.store');
    Route::delete('partners/{partner}', [AdminSettingsController::class, 'destroyPartner'])->name('partners.destroy');

    // Testimonials
    Route::get('testimonials', [AdminSettingsController::class, 'testimonials'])->name('testimonials.index');
    Route::post('testimonials', [AdminSettingsController::class, 'storeTestimonial'])->name('testimonials.store');
    Route::delete('testimonials/{testimonial}', [AdminSettingsController::class, 'destroyTestimonial'])->name('testimonials.destroy');

    // Investor Documents
    Route::get('investor-documents', [AdminSettingsController::class, 'investorDocuments'])->name('investor-documents.index');
    Route::post('investor-documents', [AdminSettingsController::class, 'storeInvestorDocument'])->name('investor-documents.store');
    Route::delete('investor-documents/{document}', [AdminSettingsController::class, 'destroyInvestorDocument'])->name('investor-documents.destroy');

    // Products
    Route::resource('products', AdminProductController::class);
    Route::patch('products/{id}/restore', [AdminProductController::class, 'restore'])->name('products.restore');
    Route::delete('products/{id}/force-delete', [AdminProductController::class, 'forceDelete'])->name('products.force-delete');
});

require __DIR__.'/auth.php';
