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
			'slug'    => ['required', Rule::unique('movies', 'slug')->ignore($movie)],
		];
	}

	public function validated($key = null, $default = null): array
	{
		return [
			'name'     => ['en' => $this->name_en, 'ka' => $this->name_ka],
			'slug'     => $this->slug,
		];
	}
}
