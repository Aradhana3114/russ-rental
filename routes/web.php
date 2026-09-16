<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes — Russ Rental
|--------------------------------------------------------------------------
| Halaman publik company profile Russ Rental (Rental Mobil).
| Panel admin (CRUD) berada di /admin, ditangani otomatis oleh Filament 5.
*/

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about-us', [PageController::class, 'about'])->name('about');
Route::get('/services', [PageController::class, 'services'])->name('services');
Route::get('/team', [PageController::class, 'team'])->name('team');

Route::get('/booking', [BookingController::class, 'create'])->name('booking');
Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');

Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
