<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class MovieController extends Controller
{
    public function show(Movie $movie): View
    {
        return view('movie', [
            'movie' => $movie,
            'quotes' => $movie->quotes
        ]);
    }
}
