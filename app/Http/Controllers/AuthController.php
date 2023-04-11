<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
	public function login(LoginRequest $request): RedirectResponse
	{
		if (!auth()->attempt($request->validated()))
		{
			throw ValidationException::withMessages([
				'auth_fail' => 'Incorrect email or password.',
			]);
		}

		session()->regenerate();

		return redirect()->route('quotes.show');
	}

	public function logout(): RedirectResponse
	{
		auth()->logout();

		return redirect()->route('quotes.show');
	}
}
