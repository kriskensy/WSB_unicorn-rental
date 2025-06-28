<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UnicornController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ProfileController;

//homepage
Route::get('/', function () {
    return view('welcome');
})->name('home');

//dashboard breeze
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//profil usera (breeze)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//jednorożce: crud - admin
Route::middleware(['auth', 'check.role:admin'])->group(function () {
    Route::resource('unicorns', UnicornController::class)->except(['show']);
});

//jednorożce public
Route::get('unicorns/{unicorn}', [UnicornController::class, 'show'])
    ->name('unicorns.show');

//rezerwacje + recenzje: zalogowani userzy
Route::middleware('auth')->group(function () {
    Route::resource('reservations', ReservationController::class);
    Route::resource('reviews', ReviewController::class)->except(['create']);
    // Tworzenie recenzji tylko po rezerwacji
    Route::get('reviews/create', [ReviewController::class, 'create'])
        ->name('reviews.create');
});

//autoryzacja breeze: logowanie, rejestracja, reset hasła
require __DIR__.'/auth.php';
