<?php

// php artisan - zeigt alle Befehle
// php artisan help make:model
// php artisan make:migration create_job_listings_table

// php artisan migrate - führt ausstehende Migrationen aus
// php artisan migrate:fresh - setzt Datenbank zurück und führt alle Migrationen neu aus
// php artisan migrate --path=/database/migrations/2025_01_14_165900_create_job_listings_table.php
// php artisan migrate:fresh --seed - setzt Datenbank zurück, führt alle Migrationen aus und führt Seeder aus

// php artisan migrate:rollback - macht letzte Migration rückgängig
// php artisan migrate:rollback --step=2 - macht die letzten 2 Migrationen rückgängig
// php artisan migrate:rollback --path=/database/migrations/2025_01_14_165900_create_job_listings_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('job_listings', function (Blueprint $table) {
            // CTRL + Click => bigIncrements($column) => BigInteger
            $table->id();
            // $table->unsignedBigInteger('employer_id');
            $table->foreignIdFor(App\Models\Employer::class);
            $table->string('title');
            $table->string('salary');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_listings');
    }
};
