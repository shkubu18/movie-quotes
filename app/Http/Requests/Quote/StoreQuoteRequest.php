<?php

namespace App\Http\Requests\Quote;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreQuoteRequest extends FormRequest
{
	public function rules(): array
	{
		return [
			'name_en'       => 'required|string',
			'name_ka'       => 'required|string',
			'picture'       => 'required|image',
			'movie_id'      => ['required', Rule::exists('movies', 'id')],
		];
	}

	public function validated($key = null, $default = null): array
	{
		return [
			'name'     => ['en' => $this->name_en, 'ka' => $this->name_ka],
			'picture'  => request()->file('picture')->store('pictures'),
			'movie_id' => $this->movie_id,
		];
	}
}
