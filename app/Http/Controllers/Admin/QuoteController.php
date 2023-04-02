<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use App\Models\Quote;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class QuoteController extends Controller
{
    public function create(): View
    {
        return view('admin.quotes.create', [
            'movies' => Movie::all()
        ]);
    }

    public function store(): RedirectResponse
    {
        $attributes = $this->validateQuote();

        $attributes['movie_picture'] = request()->file('movie_picture')->store('pictures');

        Quote::create($attributes);

        return redirect()->route('home');
    }
}
