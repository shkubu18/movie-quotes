<?php

namespace App\Http\Requests\Quote;

use App\Models\Quote;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreQuoteRequest extends FormRequest
{
	public function rules(Quote $quote): array
	{
		return [
			'name'          => 'required',
			'slug'          => ['required', Rule::unique('movies', 'slug')->ignore($quote)],
			'movie_picture' => 'required|image',
			'movie_id'      => ['required', Rule::exists('movies', 'id')],
		];
	}
}
