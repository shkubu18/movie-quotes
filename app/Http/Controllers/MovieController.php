<?php

namespace App\Http\Controllers;

use App\Http\Requests\Movie\StoreMovieRequest;
use App\Http\Requests\Movie\UpdateMovieRequest;
use App\Models\Movie;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

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

	public function show(Movie $movie): View
	{
		return view('movies.show', [
			'movie'  => $movie,
			'quotes' => $movie->quotes,
		]);
	}
}
