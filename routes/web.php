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
use App\Http\Controllers\Admin\CarouselController;
use App\Http\Controllers\Admin\KotakMasukController;
// halman utama
Route::get('/', [HomeController::class, 'index'])->name('home');

// Route::prefix('profil')->group(function () {
//     Route::get('{slug}', [PageController::class, 'show'])->name('pages.show');
// });
// Route::resource('posts', PostController::class);

// Redirects for one-page design
Route::redirect('/galeri', '/#gallery');
Route::redirect('/services', '/#services');
Route::redirect('/layanan', '/#services');
Route::redirect('/artikel', '/#posts');
Route::redirect('/testimoni', '/#testimonials');
Route::redirect('/mitra', '/#partners');
Route::redirect('/project', '/#projects');
Route::redirect('/tentang-kami', '/#about');

// Route::resource('layanan', ServiceController::class)->only(['index','show']);
// Route::resource('project', ProjectController::class)->only(['index','show']);
// Route::resource('artikel', PostController::class)->only(['index','show']);
// Route::resource('galeri', GalleryController::class)->only(['index','show']);
// Route::resource('testimoni', TestimonialController::class)->only(['index']);
// Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
// Route::get('mitra', [PartnerController::class, 'index'])->name('partners.index');

Route::get('contact-us', [ContactController::class, 'create'])->name('contact.create');
Route::post('contact-us', [ContactController::class, 'store'])->name('contact.store');


Route::get('/login', function () {
    return redirect()->route('admin.login');
})->name('login');

// 🔹 Group admin
Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLogin'])->name('admin.login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

    Route::get('/forgot-password', [AdminAuthController::class, 'showForgotPassword'])->name('admin.forgot.password');
    Route::post('/forgot-password', [AdminAuthController::class, 'sendResetLink'])->name('admin.forgot.password.submit');
    Route::get('/reset-password/{token}', [AdminAuthController::class, 'showResetPassword'])->name('admin.reset.password');
    Route::post('/reset-password', [AdminAuthController::class, 'resetPassword'])->name('admin.reset.password.submit');

    Route::middleware('auth:admin')->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    });
});

Route::prefix('admin')->name('admin.')->middleware('auth:admin')->group(function () {
    Route::resource('services', AdminServiceController::class);
    Route::resource('carousel', CarouselController::class);
    Route::resource('partners', \App\Http\Controllers\Admin\PartnerController::class);
    Route::resource('testimonials', \App\Http\Controllers\Admin\TestimonialController::class);
    Route::resource('gallery_items', \App\Http\Controllers\Admin\GalleryItemController::class);
    Route::resource('branches', \App\Http\Controllers\Admin\BranchController::class);
    Route::resource('projects', \App\Http\Controllers\Admin\ProjectController::class);
    Route::resource('pages', \App\Http\Controllers\Admin\PageController::class);
    Route::resource('contacts', ContactController::class);
    Route::resource('kotak_masuk', KotakMasukController::class)->only(['index', 'destroy']);
    Route::post('kotak_masuk/{id}/reply', [KotakMasukController::class, 'reply'])->name('kotak_masuk.reply');
    Route::get('admins/confirm', [\App\Http\Controllers\Admin\AdminController::class, 'confirmCreate'])->name('admins.confirm');
    Route::post('admins/confirm', [\App\Http\Controllers\Admin\AdminController::class, 'confirm'])->name('admins.confirm.submit');
    Route::resource('admins', \App\Http\Controllers\Admin\AdminController::class)->only(['index', 'create', 'store']);
    Route::resource('categories', \App\Http\Controllers\Admin\CategoryController::class);
    Route::resource('pelanggans', \App\Http\Controllers\Admin\PelangganController::class);

});
