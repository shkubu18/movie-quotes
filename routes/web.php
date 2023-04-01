<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\QuoteController;
use App\Http\Controllers\MovieController;
use \App\Http\Controllers\SessionController;
use App\Http\Controllers\Admin\MovieController as AdminMovieController;
use App\Http\Controllers\Admin\QuoteController as AdminQuoteController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [QuoteController::class, 'index'])->name('home');

Route::get('/movies/{movie:slug}', [MovieController::class, 'show'])->name('movie');

Route::middleware('guest')->group(function () {
    Route::get('login', [SessionController::class, 'create'])->name('login');
    Route::post('login', [SessionController::class, 'store'])->name('login');
});

Route::middleware('auth')->group(function () {
    Route::post('logout', [SessionController::class, 'destroy'])->name('logout');
    Route::get('/admin/movies/create', [AdminMovieController::class, 'create'])
        ->name('movies_create');
    Route::post('/admin/movies', [AdminMovieController::class, 'store'])
        ->name('movies_store');
    Route::get('/admin/quotes/create', [AdminQuoteController::class, 'create'])
        ->name('quotes_create');
    Route::post('/admin/quotes', [AdminQuoteController::class, 'store'])
        ->name('quotes_store');
});
