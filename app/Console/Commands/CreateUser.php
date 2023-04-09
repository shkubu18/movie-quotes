<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class CreateUser extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'create:user {name} {email} {password}';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Create a new user';

	/**
	 * Execute the console command.
	 */
	public function handle(): void
	{
		$validation = Validator::make([
			'name'     => $this->argument('name'),
			'email'    => $this->argument('email'),
			'password' => $this->argument('password'),
		], $this->rules());

		if ($validation->fails())
		{
			$this->error('Validation failed:');
			foreach ($validation->errors()->all() as $error)
			{
				$this->line($error);
			}
			return;
		}

		User::create([
			'name'     => $this->argument('name'),
			'email'    => $this->argument('email'),
			'password' => Hash::make($this->argument('password')),
		]);

		$this->info('User created successfully.');
	}

	private function rules(): array
	{
		return [
			'name'     => 'required|string|min:2|max:255',
			'email'    => ['required', 'email', 'max:255', Rule::unique('users', 'email')],
			'password' => 'required|min:6',
		];
	}
}
