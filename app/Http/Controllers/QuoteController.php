<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    public function index(Quote $quote)
    {
        return view('home', [
            'quote' => $quote->inRandomOrder()->first()
        ]);
    }
}
