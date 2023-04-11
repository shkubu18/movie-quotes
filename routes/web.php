<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\MovieController as AdminMovieController;
use App\Http\Controllers\Admin\QuoteController as AdminQuoteController;
use App\Http\Controllers\LangController;

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

Route::get('/', [QuoteController::class, 'index'])->name('quotes.show');

Route::get('/language/{lang}', [LangController::class, 'setLanguage'])->name('language.set');

Route::get('/movie/{movie:slug}', [MovieController::class, 'show'])->name('movies.show');

Route::view('login', 'auth.login')->name('auth.login.page');
Route::post('login', [AuthController::class, 'login'])->name('login');

Route::middleware('auth')->group(function () {
	Route::post('logout', [AuthController::class, 'logout'])->name('logout');

	Route::controller(AdminMovieController::class)->group(function () {
		Route::view('/movies/create', 'admin.movies.create')
			->name('movies.create');
		Route::post('/movies', 'store')
			->name('movies.store');
		Route::get('/movies/dashboard', 'index')
			->name('movies.index');
		Route::get('/movies/{movie}/edit', 'edit')
			->name('movies.edit');
		Route::patch('/movies/{movie}', 'update')
			->name('movies.update');
		Route::delete('/movies/{movie}', 'destroy')
			->name('movies.destroy');
	});

	Route::controller(AdminQuoteController::class)->group(function () {
		Route::get('/quotes/create', 'create')
		->name('quotes.create');
		Route::post('/quotes', 'store')
			->name('quotes.store');
		Route::get('/quotes/dashboard', 'index')
			->name('quotes.index');
		Route::get('/quotes/{quote}/edit', 'edit')
			->name('quotes.edit');
		Route::patch('/quotes/{quote}', 'update')
			->name('quotes.update');
		Route::delete('/quotes/{quote}', 'destroy')
			->name('quotes.destroy');
	});
});
