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
		return view('admin.quotes.index', [
			'quotes' => Quote::all(),
		]);
	}

	public function create(): View
	{
		return view('admin.quotes.create', [
			'movies' => Movie::all(),
		]);
	}

	public function store(StoreQuoteRequest $request, Quote $quote): RedirectResponse
	{
		$this->saveQuote($quote, $request->validated());

		return redirect()->route('quotes.index');
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
		$this->saveQuote($quote, $request->validated());

		return redirect()->route('admin.quotes.index');
	}

	private function saveQuote(Quote $quote, array $validated): void
	{
		$quote->setTranslations('name', ['en' => $validated['name_en'], 'ka' => $validated['name_ka']]);

		if ($validated['movie_picture'] ?? false)
		{
			$quote->movie_picture = request()->file('movie_picture')->store('pictures');
		}

		$quote->movie_id = $validated['movie_id'];

		$quote->save();
	}

	public function destroy(Quote $quote): RedirectResponse
	{
		$quote->delete();

		return back();
	}
}
