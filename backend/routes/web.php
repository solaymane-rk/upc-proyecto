<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');


Route::get('/solaymane-livewire', function () {
    return view('solaymane-livewire');
});

Route::get('/hola', function () {
    return "HOLA MUNDO - LARAVEL FUNCIONA";
});


require __DIR__.'/auth.php';
