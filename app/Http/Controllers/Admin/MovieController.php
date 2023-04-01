<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class MovieController extends Controller
{
    public function create()
    {
        return view('admin.movies.create');
    }

    public function store()
    {
        Movie::create($this->validateMovie());

        return redirect()->route('home');
    }

    protected function validateMovie(?Movie $movie = null): array
    {
        $movie ??= new Movie();

        return request()->validate([
            'name' => 'required',
            'slug' => ['required', Rule::unique('movies', 'slug')->ignore($movie)],
        ]);
    }
}
