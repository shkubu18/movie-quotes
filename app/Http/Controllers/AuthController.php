<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthAttemptRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
	public function login(AuthAttemptRequest $request): RedirectResponse
	{
		if (!auth()->attempt($request->validated()))
		{
			throw ValidationException::withMessages([
				'warning' => 'Incorrect email or password.',
			]);
		}

		session()->regenerate();

		return redirect()->route('home');
	}

	public function logout(): RedirectResponse
	{
		auth()->logout();

		return redirect()->route('home');
	}
}
