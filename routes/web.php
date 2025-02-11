<?php

declare(strict_types=1);

use App\Livewire\ThirdParties\Index;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('third-parties', Index::class)
    ->middleware(['auth'])
    ->name('third-parties.index');

require __DIR__.'/auth.php';
