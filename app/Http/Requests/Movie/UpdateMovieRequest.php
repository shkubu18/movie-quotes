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
			'name' => 'required',
			'slug' => ['required', Rule::unique('movies', 'slug')->ignore($movie)],
		];
	}
}
