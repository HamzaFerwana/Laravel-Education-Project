<?php

use App\Http\Controllers\site\SiteController;
use Illuminate\Support\Facades\Route;

Route::prefix('genius')->name('genius.')->group(function () {
    Route::get('/', [SiteController::class, 'index'])->name('index');
    Route::get('about', [SiteController::class, 'about'])->name('about');
    Route::get('courses', [SiteController::class, 'courses'])->name('courses');
    Route::get('teachers', [SiteController::class, 'teachers'])->name('teachers');
    Route::get('teacher/{id}', [SiteController::class, 'single_teacher'])->name('single-teacher');
    Route::get('contact', [SiteController::class, 'contact'])->name('contact');
    Route::post('contact-data', [SiteController::class, 'contact_data'])->name('contact-data');
    Route::middleware('auth')->group(function () {
        Route::get('courses/{id}/enroll', [SiteController::class, 'enroll'])->name('enroll');
        Route::get('courses/{id}/enroll/checkout', [SiteController::class, 'checkout'])->name('checkout');
        Route::get('payment-redirect', [SiteController::class, 'payment_redirect'])->name('payment-redirect');
        Route::get('my-courses', [SiteController::class, 'my_courses'])->name('my-courses');
        Route::get('courses/{id}/unenroll/', [SiteController::class, 'unenroll'])->name('unenroll');
    });
});
