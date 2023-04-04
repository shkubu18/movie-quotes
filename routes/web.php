<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\SessionController;
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

	Route::controller(AdminMovieController::class)->group(function () {
		Route::get('/admin/movies/create', 'create')
			->name('movies_create');
		Route::post('/admin/movies', 'store')
			->name('movies_store');
		Route::get('/admin/movies/dashboard', 'index')
			->name('movies_dashboard');
		Route::get('/admin/movies/{movie}/edit', 'edit')
			->name('movies_edit');
		Route::patch('/admin/movies/{movie}', 'update')
			->name('movies_update');
		Route::delete('/admin/movies/{movie}', 'destroy')
			->name('movies_delete');
	});

	Route::controller(AdminQuoteController::class)->group(function () {
		Route::get('/admin/quotes/create', 'create')
		->name('quotes_create');
		Route::post('/admin/quotes', 'store')
			->name('quotes_store');
		Route::get('/admin/quotes/dashboard', 'index')
			->name('quotes_dashboard');
		Route::get('/admin/quotes/{quote}/edit', 'edit')
			->name('quotes_edit');
		Route::patch('/admin/quotes/{quote}', 'update')
			->name('quotes_update');
		Route::delete('/admin/quotes/{quote}', 'destroy')
			->name('quotes_delete');
	});

    Route::get('/quotes/{quote:slug}', [QuoteController::class, 'show'])->name('quote');
});
