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
			'name'          => 'required',
			'movie_picture' => $quote->exists ? ['image'] : ['required', 'image'],
			'movie_id'      => ['required', Rule::exists('movies', 'id')],
		];
	}
}
