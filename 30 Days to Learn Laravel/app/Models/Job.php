<?php

// php artisan tinker => playground => Neustart nach Änderungen erforderlich

// App\Models\Job::create([ 'title' => 'Acme Director', 'salary' => '$1,000,000' ]);
// App\Models\Job::all();
// App\Models\Job::find(1);

// $job = App\Models\Job::find(1);
// $job->title;
// $job->salary;
// $job->delete();

// $job = App\Models\Job::first();
// Lazy Loading: bezieht sich auf die Verzögerung einer SQL-Abfrage bis zum letztmöglichen Zeitpunkt
// $job->employer;
// $job->employer->name;
// $employer = $job->employer;
// $employer->jobs;
// $employer->jobs[0];
// $employer->jobs->first();

// app namespace defined in composer.json => autoload
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

// Convention over Configuration: Model name singular, Table name plural
// class JobListing extends Model
class Job extends Model
{
    use HasFactory;

    // $table = Konvention für Blueprint-Instanz
    // definiert Namen der Datenbanktabelle, die mit Modell verknüpft wird
    protected $table = 'job_listings';

    // protected $fillable = [
    //     'title',
    //     'salary',
    //     'employer_id',
    // ];

    protected $guarded = [];

    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }

    public function tags()
    {
        // CTRL + Click => belongsToMany($related, $table = null, $foreignPivotKey = null, $relatedPivotKey = null,
        //                  $parentKey = null, $relatedKey = null, $relation = null)
        return $this->belongsToMany(Tag::class, foreignPivotKey: 'job_listing_id');
    }
}