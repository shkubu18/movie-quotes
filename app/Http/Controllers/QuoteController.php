<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use Illuminate\View\View;

class QuoteController extends Controller
{
	public function index(Quote $quote): View
	{
		return view('home', [
			'quote' => $quote->inRandomOrder()->first(),
		]);
	}

	public function show(Quote $quote): View
	{
		return view('admin.quotes.show', [
			'quote'  => $quote,
		]);
	}
}
