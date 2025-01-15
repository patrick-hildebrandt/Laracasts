<?php

// App namespace defined in composer.json => autoload
namespace App\Models;

use Illuminate\Support\Arr;

class Job
{
    public static function all(): array
    {
        return [
            [
                'id' => 2,
                'title' => 'Programmer',
                'salary' => '$30,000',
            ],
            [
                'id' => 3,
                'title' => 'Teacher',
                'salary' => '$40,000',
            ],
            [
                'id' => 1,
                'title' => 'Director',
                'salary' => '$50,000',
            ],
        ];
    }

    public static function find(int $id): array {
        // "this" würde auf eine Instanz der Klasse verweisen
        // "static" verweist auf die eigene Klasse
        $job = Arr::first(static::all(), fn($job) => $job['id'] == $id);

        if (! $job) {
            // Bubble up - benötigt keine Implementierung
            abort(404);
        }

        return $job;
    }
}
