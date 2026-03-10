<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');


//RUTA PARA LA TAREA 1
Route::get('/control-center', function () {
    return view('control-center');
});

Route::get('/hola', function () {
    return "HOLA MUNDO - LARAVEL FUNCIONA";
});


require __DIR__.'/auth.php';
