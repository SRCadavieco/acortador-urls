<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\Auth\GoogleController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::post('/shorten', [LinkController::class, 'store'])->name('links.store');
Route::get('/mis-links', [LinkController::class, 'index'])->name('links.index');
Route::get('/mis-links/{id}', [LinkController::class, 'show'])->name('links.show');
Route::delete('/mis-links/{id}', [LinkController::class, 'destroy'])->name('links.destroy');



Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.redirect');
Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback'])->name('google.callback');

Route::get('/test-login', function () {
    return view('auth.login'); 
});


Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
Route::get('/{code}', function ($code) {
    $link = \App\Models\Link::where('shortened_url', $code)
                ->orWhere('custom_alias', $code)
                ->firstOrFail();
    $link->increment('click_count');
    return redirect($link->original_url);
});
