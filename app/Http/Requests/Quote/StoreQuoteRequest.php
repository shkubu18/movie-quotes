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
			'name'          => 'array',
			'picture'       => 'required|image',
			'movie_id'      => ['required', Rule::exists('movies', 'id')],
		];
	}

	protected function prepareForValidation()
	{
		$this->merge([
			'name'     => ['en' => $this->name_en, 'ka' => $this->name_ka],
		]);
	}
}
