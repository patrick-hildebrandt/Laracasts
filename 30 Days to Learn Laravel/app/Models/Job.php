<?php

// php artisan tinker => playground => Neustart nach Änderungen erforderlich

// App\Models\Job::create([ 'title' => 'Acme Director', 'salary' => '$1,000,000' ]);
// App\Models\Job::all();
// App\Models\Job::find(1);

// $job = App\Models\Job::find(1);
// $job->title;
// $job->salary;
// $job->delete();

// App namespace defined in composer.json => autoload
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

    protected $fillable = [
        'title',
        'salary',
    ];

    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }
}