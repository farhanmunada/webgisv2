<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [\App\Http\Controllers\User\UmkmDashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // User UMKM Registration (Must be outside 'umkm' middleware to allow first-time reg)
    Route::get('/register-umkm', [\App\Http\Controllers\User\UmkmRegistrationController::class, 'create'])->name('umkm.register');
    Route::post('/register-umkm', [\App\Http\Controllers\User\UmkmRegistrationController::class, 'store'])->name('umkm.register.store');

    // UMKM Dashboard Actions (Restricted to Approved)
    Route::middleware(['umkm'])->group(function() {
        Route::get('/umkm/profile', [\App\Http\Controllers\User\UmkmDashboardController::class, 'editProfile'])->name('umkm.profile.edit');
        Route::patch('/umkm/profile', [\App\Http\Controllers\User\UmkmDashboardController::class, 'updateProfile'])->name('umkm.profile.update');
        
        // UMKM Product Management
        Route::resource('umkm-products', \App\Http\Controllers\User\ProductController::class)->names([
            'index' => 'umkm.products.index',
            'create' => 'umkm.products.create',
            'store' => 'umkm.products.store',
            'edit' => 'umkm.products.edit',
            'update' => 'umkm.products.update',
            'destroy' => 'umkm.products.destroy',
        ]);
    });
});

Route::get('/katalog', [\App\Http\Controllers\PublicController::class, 'katalog'])->name('katalog');
Route::get('/katalog/{product}', [\App\Http\Controllers\PublicController::class, 'showProduct'])->name('katalog.detail');
Route::get('/umkm/{umkm}', [\App\Http\Controllers\PublicController::class, 'showUmkm'])->name('umkm.detail');
Route::get('/privacy-policy', function() { return view('public.privacy'); })->name('privacy');
Route::get('/about', function() { return view('public.about'); })->name('about');

require __DIR__.'/auth.php';

// Google OAuth Routes
Route::get('/auth/google', [\App\Http\Controllers\Auth\GoogleController::class, 'redirect']);
Route::get('/auth/google/callback', [\App\Http\Controllers\Auth\GoogleController::class, 'callback']);

// Registered User Routes
Route::middleware('auth')->group(function () {
    // Data Routes for Map
    Route::prefix('data')->group(function () {
        Route::get('/polygons', [\App\Http\Controllers\Api\MapController::class, 'getPolygons']);
    });
});

// Admin Routes
Route::middleware(['auth', 'verified', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('categories', \App\Http\Controllers\Admin\CategoryController::class);
    Route::resource('hasil-panen', \App\Http\Controllers\Admin\HasilPanenController::class);
    Route::resource('umkm', \App\Http\Controllers\Admin\UmkmController::class);
    Route::resource('products', \App\Http\Controllers\Admin\ProductController::class);
    Route::get('umkm-approval', [\App\Http\Controllers\Admin\UmkmApprovalController::class, 'index'])->name('umkm.approval.index');
    Route::post('umkm-approval/{umkm}/approve', [\App\Http\Controllers\Admin\UmkmApprovalController::class, 'approve'])->name('umkm.approval.approve');
    Route::post('umkm-approval/{umkm}/reject', [\App\Http\Controllers\Admin\UmkmApprovalController::class, 'reject'])->name('umkm.approval.reject');
});
