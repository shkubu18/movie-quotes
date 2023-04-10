<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */
class MovieFactory extends Factory
{
	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition(): array
	{
		return [
			'name' => [
				'en' => \Faker\Factory::create('en_US')->realText(20),
				'ka' => \Faker\Factory::create('ka_GE')->realText(20),
			],
			'slug' => $this->faker->unique()->slug(),
		];
	}
}
