<?php

use App\Http\Controllers\DenominacionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TipoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('tipos', TipoController::class);
Route::resource('denominaciones', DenominacionController::class);

require __DIR__.'/auth.php';
