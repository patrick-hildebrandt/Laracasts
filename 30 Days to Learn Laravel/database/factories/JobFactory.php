<?php

// php artisan tinker
// App\Models\Job::factory(10)->create();

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Employer;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->jobTitle(),
            'employer_id' => Employer::factory(),
            // CTRL + Click on 'fake()'
            // Faker\Generator => Provider => https://fakerphp.org/formatters/
            // 'salary' => fake()->salary(),
            // 'salary' => '$50,000 USD',
            'salary' => '$' . fake()->randomFloat(0, 20000, 200000) . ' USD',
        ];
    }
}
