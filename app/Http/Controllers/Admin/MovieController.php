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

	public function create(): View
	{
		return view('admin.movies.create');
	}

	public function store(StoreMovieRequest $request): RedirectResponse
	{
		Movie::create([
			'name' => $request->name,
			'slug' => $request->slug,
		]);

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
		$movie->update([
			'name' => $request->name,
			'slug' => $request->slug,
		]);

		return redirect()->route('movies_dashboard');
	}

	public function destroy(Movie $movie): RedirectResponse
	{
		$movie->delete();

		return back();
	}
}
