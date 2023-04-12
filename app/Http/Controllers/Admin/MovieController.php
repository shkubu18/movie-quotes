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
		return view('admin.movies.index', [
			'movies' => Movie::all(),
		]);
	}

	public function store(StoreMovieRequest $request): RedirectResponse
	{
		Movie::create($request->validated());

		return redirect()->route('quotes.show');
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
