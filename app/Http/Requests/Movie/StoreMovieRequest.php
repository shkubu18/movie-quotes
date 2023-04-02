<?php

namespace App\Http\Requests\Movie;

use App\Models\Movie;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreMovieRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(Movie $movie): array
    {
        return [
            'name' => 'required',
            'slug' => ['required', Rule::unique('movies', 'slug')->ignore($movie)],
        ];
    }
}
