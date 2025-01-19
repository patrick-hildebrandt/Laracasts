<?php

// sqlite-db: PRAGMA FOREIGN_KEYS=on; // constraints aktivieren, default ist off

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
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        // Konvention: singular, alphabetisch sortiert
        Schema::create('job_tag', function (Blueprint $table) {
            $table->id();
            // '\' = use / foreignIdFor() = optional, weil immer absoluter Pfad
            // CTRL + Click => foreignIdFor($model, $column = null)
            $table->foreignIdFor(\App\Models\Job::class, 'job_listing_id')->constrained()->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\Tag::class)->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tags');
        Schema::dropIfExists('job_tag');
    }
};
