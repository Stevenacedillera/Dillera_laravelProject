<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use App\Http\Controllers\GameController;
use App\Http\Controllers\PlatformController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    // Games Management Routes
    Route::get('dashboard', [GameController::class, 'index'])->name('dashboard');
    Route::post('games', [GameController::class, 'store'])->name('games.store');
    Route::put('games/{game}', [GameController::class, 'update'])->name('games.update');
    Route::delete('games/{game}', [GameController::class, 'destroy'])->name('games.destroy');

    // Platforms Management Routes
    Route::get('platforms', [PlatformController::class, 'index'])->name('platforms.index');
    Route::post('platforms', [PlatformController::class, 'store'])->name('platforms.store');
    Route::put('platforms/{platform}', [PlatformController::class, 'update'])->name('platforms.update');
    Route::delete('platforms/{platform}', [PlatformController::class, 'destroy'])->name('platforms.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

require __DIR__.'/auth.php';
