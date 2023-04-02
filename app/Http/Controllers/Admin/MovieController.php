<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class MovieController extends Controller
{
    public function create(): View
    {
        return view('admin.movies.create');
    }

    public function store(): RedirectResponse
    {
        Movie::create($this->validateMovie());

        return redirect()->route('home');
    }
}
