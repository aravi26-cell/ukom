<?php

use Illuminate\Support\Facades\Route;

// Landing page publik
Route::get('/', [App\Http\Controllers\Customer\LandingPageController::class, 'index'])->name('customer.landing_page.index');

// Redirect /customer ke landing
Route::redirect('/customer', '/customer/landing')->name('customer');

// Route /customer/landing publik
// Group route customer yang butuh login
Route::prefix('/customer')->middleware(['auth'])->name('customer.')->group(function () {
    Route::get('/customer/landing_page', [App\Http\Controllers\Customer\LandingPageController::class, 'index'])->name('landing_page.index');
    Route::get('/profil', [App\Http\Controllers\Customer\ProfilController::class, 'index'])->name('profil.index');
    Route::post('/profil', [App\Http\Controllers\Customer\ProfilController::class, 'update'])->name('profil.update');
});