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

	public function store(StoreQuoteRequest $request): RedirectResponse
	{
		Quote::create([...$request->validated(),
			'picture'  => request()->file('picture')->store('pictures'),
		]);

		return redirect()->route('quotes.show');
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
		$quote->update([...$request->validated(),
			'picture'  => $request->hasFile('picture') ? request()->file('picture')->store('pictures') : $quote->picture,
		]);

		return redirect()->route('quotes.index');
	}

	public function destroy(Quote $quote): RedirectResponse
	{
		$quote->delete();

		return back();
	}
}
