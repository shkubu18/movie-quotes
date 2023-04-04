<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthAttemptRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function create(): View
    {
        return view('login');
    }

    public function store(AuthAttemptRequest $request): RedirectResponse
    {
        $attributes = [
            'email' => $request->email,
            'password' => $request->password
        ];

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
