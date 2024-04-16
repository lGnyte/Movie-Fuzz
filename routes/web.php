<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Middleware\RequireAuthentication;
use App\Http\Middleware\RequireOwner;

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])
    ->name('home');

Route::get('/login', [App\Http\Controllers\LoginController::class, 'index'])
    ->name('login')
    ->middleware(RedirectIfAuthenticated::class);
Route::post('/login', [App\Http\Controllers\LoginController::class, 'submit'])
    ->name('login.submit');

Route::get('/register', [App\Http\Controllers\RegisterController::class, 'index'])
    ->name('register')
    ->middleware(RedirectIfAuthenticated::class);
Route::post('/register', [App\Http\Controllers\RegisterController::class, 'submit'])
    ->name('register.submit');

Route::match(['get','post'], '/logout', [App\Http\Controllers\LogoutController::class, 'destroy'])
    ->name('logout')
    ->middleware(RequireAuthentication::class);

Route::get('/forgot-password', [App\Http\Controllers\ForgotPasswordController::class, 'index'])
    ->name('password.reset');
Route::post('/forgot-password', [App\Http\Controllers\ForgotPasswordController::class, 'submit'])
    ->name('forgot-password.submit');
Route::post('/forgot-password/{token}', [App\Http\Controllers\ForgotPasswordController::class, 'reset'])
    ->name('forgot-password.reset');

Route::get('/user/{username}', [App\Http\Controllers\UserController::class, 'index'])
    ->name('user-profile.show');
Route::get('/user/{username}/edit', [App\Http\Controllers\UserController::class, 'edit'])
    ->name('user-profile.edit')
    ->middleware(RequireOwner::class);
Route::post('/user/{username}/edit', [App\Http\Controllers\UserController::class, 'update'])
    ->name('user-profile.update')
    ->middleware(RequireOwner::class);

Route::get('/movies', [App\Http\Controllers\MovieController::class, 'index'])
    ->name('movies');
Route::post('/movies', [App\Http\Controllers\MovieController::class, 'search'])
    ->name('movies.search');
Route::get('/movie/{id}', [App\Http\Controllers\MovieController::class, 'individual'])
    ->name('movies.individual');

Route::post('/review', [App\Http\Controllers\ReviewController::class, 'submit'])
    ->name('review.submit')
    ->middleware(RequireAuthentication::class);
