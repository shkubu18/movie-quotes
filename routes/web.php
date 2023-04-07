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

Route::get('/', [QuoteController::class, 'index'])->name('home');

Route::get('/language/{lang}', [LangController::class, 'setLanguage'])->name('language.set');

Route::get('/movies/{movie:slug}', [MovieController::class, 'show'])->name('admin.movies.show');

Route::middleware('guest')->group(function () {
	Route::view('login', 'auth.login')->name('auth.login.page');
	Route::post('login', [AuthController::class, 'login'])->name('auth.login');
});

Route::middleware('auth')->group(function () {
	Route::post('logout', [AuthController::class, 'logout'])->name('logout');

	Route::controller(AdminMovieController::class)->group(function () {
		Route::view('/admin/movies/create', 'admin.movies.create')
			->name('movies.create');
		Route::post('/admin/movies', 'store')
			->name('movies.store');
		Route::get('/admin/movies/dashboard', 'index')
			->name('movies.index');
		Route::get('/admin/movies/{movie}/edit', 'edit')
			->name('movies.edit');
		Route::patch('/admin/movies/{movie}', 'update')
			->name('movies.update');
		Route::delete('/admin/movies/{movie}', 'destroy')
			->name('movies.destroy');
	});

	Route::controller(AdminQuoteController::class)->group(function () {
		Route::get('/admin/quotes/create', 'create')
		->name('quotes.create');
		Route::post('/admin/quotes', 'store')
			->name('quotes.store');
		Route::get('/admin/quotes/dashboard', 'index')
			->name('quotes.index');
		Route::get('/admin/quotes/{quote}/edit', 'edit')
			->name('quotes.edit');
		Route::patch('/admin/quotes/{quote}', 'update')
			->name('quotes.update');
		Route::delete('/admin/quotes/{quote}', 'destroy')
			->name('quotes.destroy');
	});
});
