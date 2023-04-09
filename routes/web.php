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

Route::get('/', [QuoteController::class, 'index'])->name('quotes.index');

Route::get('/language/{lang}', [LangController::class, 'setLanguage'])->name('language.set');

Route::get('/movies/{movie:slug}', [MovieController::class, 'show'])->name('admin.movies.show');

Route::middleware('guest')->group(function () {
	Route::view('login', 'auth.login')->name('auth.login.page');
	Route::post('login', [AuthController::class, 'login'])->name('login');
});

Route::middleware('auth')->group(function () {
	Route::post('logout', [AuthController::class, 'logout'])->name('logout');

	Route::controller(AdminMovieController::class)->group(function () {
		Route::view('/admin/movies/create', 'admin.movies.create')
			->name('admin.movies.create');
		Route::post('/admin/movies', 'store')
			->name('admin.movies.store');
		Route::get('/admin/movies/dashboard', 'index')
			->name('admin.movies.index');
		Route::get('/admin/movies/{movie}/edit', 'edit')
			->name('admin.movies.edit');
		Route::patch('/admin/movies/{movie}', 'update')
			->name('admin.movies.update');
		Route::delete('/admin/movies/{movie}', 'destroy')
			->name('admin.movies.destroy');
	});

	Route::controller(AdminQuoteController::class)->group(function () {
		Route::get('/admin/quotes/create', 'create')
		->name('admin.quotes.create');
		Route::post('/admin/quotes', 'store')
			->name('admin.quotes.store');
		Route::get('/admin/quotes/dashboard', 'index')
			->name('admin.quotes.index');
		Route::get('/admin/quotes/{quote}/edit', 'edit')
			->name('admin.quotes.edit');
		Route::patch('/admin/quotes/{quote}', 'update')
			->name('admin.quotes.update');
		Route::delete('/admin/quotes/{quote}', 'destroy')
			->name('admin.quotes.destroy');
	});
});
