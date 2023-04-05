<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Quote\StoreQuoteRequest;
use App\Http\Requests\Quote\UpdateQuoteRequest;
use App\Models\Movie;
use App\Models\Quote;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class QuoteController extends Controller
{
	public function index(): View
	{
		return view('admin.quotes.dashboard', [
			'quotes' => Quote::all(),
		]);
	}

	public function create(): View
	{
		return view('admin.quotes.create', [
			'movies' => Movie::all(),
		]);
	}

	public function store(StoreQuoteRequest $request): RedirectResponse
	{
		$attributes = $request->validated();
		$attributes['movie_picture'] = request()->file('movie_picture')->store('pictures');

		Quote::create($attributes);

		return redirect()->route('home');
	}

	public function edit(Quote $quote): View
	{
		return view('admin.quotes.edit', [
			'quote'  => $quote,
			'movies' => Movie::all(),
		]);
	}

	public function update(UpdateQuoteRequest $request, Quote $quote): RedirectResponse
	{
		$attributes = $request->validated();

		if ($attributes['movie_picture'] ?? false)
		{
			$attributes['movie_picture'] = request()->file('movie_picture')->store('pictures');
		}

		$quote->update($attributes);

		return redirect()->route('quotes.index');
	}

	public function destroy(Quote $quote): RedirectResponse
	{
		$quote->delete();

		return back();
	}
}
