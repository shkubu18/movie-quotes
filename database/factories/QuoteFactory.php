<?php

namespace Database\Factories;

use App\Models\Movie;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\File;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Quote>
 */
class QuoteFactory extends Factory
{
	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition(): array
	{
		// Check if the directory exists and create it if it does not.
		if (!File::exists('public/storage/pictures'))
		{
			File::makeDirectory('public/storage/pictures', $mode = 0755, true, true);
		}

		$image = \Faker\Factory::create()->image('public/storage/pictures');

		return [
			'name' => [
				'en' => \Faker\Factory::create('en_US')->realText(20),
				'ka' => \Faker\Factory::create('ka_GE')->realText(20),
			],
			'movie_id'      => Movie::factory(),
			'movie_picture' => 'pictures/' . basename($image),
		];
	}
}
