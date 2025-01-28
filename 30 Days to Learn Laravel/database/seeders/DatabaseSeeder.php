<?php

// php artisan db:seed - führt Datenbank-Seeder aus
// php artisan help db:seed
// --class[=CLASS]        The class name of the root seeder [default: "Database\Seeders\DatabaseSeeder"]
// php artisan db:seed --class=JobSeeder - führt spezifischen Seeder aus

namespace Database\Seeders;

use App\Models\Job;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'test@example.com',
        ]);

        // Konsolen-Ausgabe
        $this->command->info('JobSeeder gestartet');

        // weitere Seeder hier integrieren, falls benötigt
        $this->call(JobSeeder::class);
    }
}
