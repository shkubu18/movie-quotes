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
		$validated = $request->validated();

		$movie->setTranslations('name', ['en' => $validated['name_en'], 'ka' => $validated['name_ka']]);
		$movie->slug = $request->input('slug');

		$movie->save();

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
		$movie->update($request->validated());

		return redirect()->route('movies.index');
	}

	public function destroy(Movie $movie): RedirectResponse
	{
		$movie->delete();

		return back();
	}
}
