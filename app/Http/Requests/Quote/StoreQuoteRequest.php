<?php

namespace App\Http\Requests\Quote;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreQuoteRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required',
            'movie_picture' => 'required|image',
            'movie_id' => ['required', Rule::exists('movies', 'id')]
        ];
    }
}
