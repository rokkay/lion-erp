<?php

declare(strict_types=1);

use App\Livewire\ThirdParties\Create;
use App\Livewire\ThirdParties\Index;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('third-parties', Index::class)->name('third-parties.index');
    Route::get('third-parties/new', Create::class)->name('third-parties.create');
});

require __DIR__.'/auth.php';
