<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Quote\StoreQuoteRequest;
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

    public function store(StoreQuoteRequest $request): RedirectResponse
    {
        $attributes = [
            'name' => $request->name,
            'movie_picture' => $request->movie_picture,
            'movie_id' => $request->movie_id
        ];

        $attributes['movie_picture'] = request()->file('movie_picture')->store('pictures');

        Quote::create($attributes);

        return redirect()->route('home');
    }
}
