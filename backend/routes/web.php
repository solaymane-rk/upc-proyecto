<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/satellite-stats',function () {
    return view('satellite-stats');
});