<?php

namespace App\Http\Requests\Quote;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateQuoteRequest extends FormRequest
{
	public function rules(): array
	{
		$quote = $this->route('quote');

		return [
			'name_en'       => 'required|string',
			'name_ka'       => 'required|string',
			'picture'       => $quote->exists ? ['image'] : ['required', 'image'],
			'movie_id'      => ['required', Rule::exists('movies', 'id')],
		];
	}

	public function validated($key = null, $default = null): array
	{
		$validated = parent::validated();

		return [
			'name' => [
				'en' => $validated['name_en'],
				'ka' => $validated['name_ka'],
			],
			'movie_id' => $validated['movie_id'],
		];
	}
}
