<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class SessionController extends Controller
{
    public function create(): View
    {
        return view('login');
    }

    public function store(): RedirectResponse
    {
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (!auth()->attempt($attributes)) {
            throw ValidationException::withMessages([
                'warning' => 'Incorrect email or password.'
            ]);
        }

        session()->regenerate();

        return redirect()->route('home');
    }

    public function destroy(): RedirectResponse
    {
        auth()->logout();

        return redirect()->route('home');
    }
}
