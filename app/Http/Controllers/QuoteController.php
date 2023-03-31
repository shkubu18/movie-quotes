<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use Illuminate\Http\Request;
use Illuminate\View\View;

class QuoteController extends Controller
{
    public function index(Quote $quote): View
    {
        return view('home', [
            'quote' => $quote->inRandomOrder()->first()
        ]);
    }
}
