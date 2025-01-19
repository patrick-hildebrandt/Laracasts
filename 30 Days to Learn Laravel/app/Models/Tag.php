<?php

// $tag = App\Models\Tag::find(1);
// $tag->jobs; // Zugriff als Property
// $tag->jobs(); // Zugriff als Methode
// $tag->jobs()->attach(7);
// $tag->jobs()->attach(App\Models\Job::find(7);
// neue Query:
// $tag->jobs()->get();
// explizites Attribut:
// $tag->jobs()->get()->pluck('title');

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /** @use HasFactory<\Database\Factories\TagFactory> */
    use HasFactory;

    public function jobs()
    {
        return $this->belongsToMany(Job::class, relatedPivotKey: 'job_listing_id');
    }
}
