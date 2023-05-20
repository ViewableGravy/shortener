<?php

use Illuminate\Support\Facades\Route;
use App\Models\Shorten;
use App\Http\Controllers\StatController;
use App\Http\Controllers\ShortenController;
use App\Http\Controllers\AuthenticationController as Authenticate;

Route::get('/', fn () => view('welcome', [
    'domain' => "https://" . env('APP_URL') . ":" . env('APP_PORT') . "/"
]));

Route::get('/stats/{short}', [StatController::class, 'stats']);
Route::post('/shorten', [ShortenController::class, 'Shorten']);

Route::get('/dashboard', [StatController::class, 'dashboard'])->middleware('auth');

Route::get('/login', [Authenticate::class, 'loginForm']);
Route::post('/login', [Authenticate::class, 'login']);

Route::get('/register', [Authenticate::class, 'registrationForm'])->middleware('guest');
Route::post('/register', [Authenticate::class, 'register'])->middleware('guest');

Route::post('/logout', [Authenticate::class, 'logout']);

//fallback if not for another specific route - redirect short URL
Route::get('/{id}', fn ($id) => redirect(Shorten::getLongFromShort($id)));
