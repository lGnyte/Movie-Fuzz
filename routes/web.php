<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])
    ->name('home');

Route::get('/login', [App\Http\Controllers\LoginController::class, 'index'])
    ->name('login');
Route::post('/login', [App\Http\Controllers\LoginController::class, 'submit'])
    ->name('login.submit');

Route::get('/register', [App\Http\Controllers\RegisterController::class, 'index'])
    ->name('register');
Route::post('/register', [App\Http\Controllers\RegisterController::class, 'submit'])
    ->name('register.submit');

Route::post('/logout', [App\Http\Controllers\LogoutController::class, 'destroy'])
    ->name('logout')
    ->middleware('auth');

Route::post('/forgot-password', [App\Http\Controllers\ForgotPasswordController::class, 'submit'])
    ->name('forgot-password');
Route::post('/forgot-password/{token}', [App\Http\Controllers\ForgotPasswordController::class, 'reset'])
    ->name('forgot-password.reset');

// Route::match(['get','post'], '/my-profile', [App\Http\Controllers\HomeController::class, 'test']) -> name('test');


// Route::get('/user/{username}', [App\Http\Controllers\HomeController::class, 'user'])
//     ->name('user.name');

// Route::get('/form', [App\Http\Controllers\FormController::class, 'index'])
//     ->name('form');

// Route::post('/form', [App\Http\Controllers\FormController::class, 'submit'])
//     ->name('form.submit');