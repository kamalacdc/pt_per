<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\ServiceController as AdminServiceController;
// halman utama
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::prefix('profil')->group(function () {
    Route::get('{slug}', [PageController::class, 'show'])->name('pages.show');
});
Route::resource('posts', PostController::class);

Route::resource('layanan', ServiceController::class)->only(['index','show']);
Route::resource('project', ProjectController::class)->only(['index','show']);
Route::resource('artikel', PostController::class)->only(['index','show']);
Route::resource('galeri', GalleryController::class)->only(['index','show']);
Route::resource('testimoni', TestimonialController::class)->only(['index']);
Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('mitra', [PartnerController::class, 'index'])->name('partners.index');

Route::get('contact-us', [ContactController::class, 'create'])->name('contact.create');
Route::post('contact-us', [ContactController::class, 'store'])->name('contact.store');

// login regis
// Route::get('/auth', [AuthController::class, 'showAuthForm'])->name('auth.form');
// Route::post('/login', [AuthController::class, 'login'])->name('login');
// Route::post('/register', [AuthController::class, 'register'])->name('register');
// Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Alias untuk login bawaan (biar error tidak muncul)
// 🔹 Alias default login Laravel supaya error "Route [login] not defined" hilang
Route::get('/login', function () {
    return redirect()->route('admin.login');
})->name('login');

// 🔹 Group admin
Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLogin'])->name('admin.login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

    Route::middleware('auth:admin')->group(function () {
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');
    });
});

Route::prefix('admin')->name('admin.')->middleware('auth:admin')->group(function () {
    Route::resource('services', AdminServiceController::class);
});

