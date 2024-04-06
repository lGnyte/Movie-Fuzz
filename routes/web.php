<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])
    ->name('home');

Route::get('/login', [App\Http\Controllers\LoginController::class, 'index'])
    ->name('login');

Route::get('/register', [App\Http\Controllers\RegisterController::class, 'index'])
    ->name('register');

// Route::match(['get','post'], '/my-profile', [App\Http\Controllers\HomeController::class, 'test']) -> name('test');


// Route::get('/user/{username}', [App\Http\Controllers\HomeController::class, 'user'])
//     ->name('user.name');

// Route::get('/form', [App\Http\Controllers\FormController::class, 'index'])
//     ->name('form');

// Route::post('/form', [App\Http\Controllers\FormController::class, 'submit'])
//     ->name('form.submit');