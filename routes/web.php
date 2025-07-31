<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LinkController;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/shorten', [LinkController::class, 'store'])->name('links.store');

// Redirección pública
Route::get('/{code}', function ($code) {
    $link = \App\Models\Link::where('shortened_url', $code)
                ->orWhere('custom_alias', $code)
                ->firstOrFail();

    return redirect($link->original_url);
});

// Dashboard solo para usuarios autenticados
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [LinkController::class, 'index'])->name('dashboard');
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
