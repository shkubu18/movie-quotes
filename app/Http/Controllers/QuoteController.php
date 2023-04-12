<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use Illuminate\View\View;

class QuoteController extends Controller
{
	public function index(Quote $quote): View
	{
		return view('quotes.show', [
			'quote' => $quote->inRandomOrder()->first(),
		]);
	}
}
