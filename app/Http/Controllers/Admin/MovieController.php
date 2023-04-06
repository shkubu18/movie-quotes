<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Movie\StoreMovieRequest;
use App\Http\Requests\Movie\UpdateMovieRequest;
use App\Models\Movie;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class MovieController extends Controller
{
	public function index(): View
	{
		return view('admin.movies.dashboard', [
			'movies' => Movie::all(),
		]);
	}

	public function store(StoreMovieRequest $request, Movie $movie): RedirectResponse
	{
		$this->saveMovie($movie, $request->validated());

		return redirect()->route('home');
	}

	public function edit(Movie $movie): View
	{
		return view('admin.movies.edit', [
			'movie' => $movie,
		]);
	}

	public function update(UpdateMovieRequest $request, Movie $movie): RedirectResponse
	{
		$this->saveMovie($movie, $request->validated());

		return redirect()->route('movies.index');
	}

	private function saveMovie(Movie $movie, array $validated): void
	{
		$movie->setTranslations('name', ['en' => $validated['name_en'], 'ka' => $validated['name_ka']]);
		$movie->slug = $validated['slug'];

		$movie->save();
	}

	public function destroy(Movie $movie): RedirectResponse
	{
		$movie->delete();

		return back();
	}
}
