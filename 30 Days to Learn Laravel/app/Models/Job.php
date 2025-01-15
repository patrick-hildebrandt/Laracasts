<?php

// App namespace defined in composer.json => autoload
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// Convention over Configuration: Model name singular, Table name plural
// class JobListing extends Model
class Job extends Model
{
    // $table = Konvention für Blueprint-Instanz
    // definiert Namen der Datenbanktabelle, die mit Modell verknüpft wird
    protected $table = 'job_listings';
}
