<?php

// php artisan tinker
// App\Models\User::factory()->create();
// App\Models\User::factory(10)->create();
// App\Models\Job::factory()->unverified()->create();
// App\Models\Job::factory()->admin()->create();

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'fake()' = helper function
            // preset = 'name' => fake()->name(),
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            // '??=' = Null-Koaleszenz-Operator
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
            // 'admin' => false,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    // static = Rückgabe einer Instanz der aktuellen Klasse
    public function unverified(): static
    {
        // closure function
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }

    // public function admin(): static
    // {
    //     return $this->state(fn (array $attributes) => [
    //         'admin' => true,
    //     ]);
    // }
}

