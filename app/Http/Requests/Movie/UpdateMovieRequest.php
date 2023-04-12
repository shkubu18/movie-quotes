<?php

namespace App\Http\Requests\Movie;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateMovieRequest extends FormRequest
{
	public function rules(): array
	{
		$movie = $this->route('movie');

		return [
			'name_en' => 'required|string',
			'name_ka' => 'required|string',
			'name'    => 'array',
			'slug'    => ['required', Rule::unique('movies', 'slug')->ignore($movie)],
		];
	}

	protected function prepareForValidation()
	{
		$this->merge([
			'name'     => ['en' => $this->name_en, 'ka' => $this->name_ka],
		]);
	}
}
