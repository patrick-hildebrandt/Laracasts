<?php

// composer require barryvdh/laravel-debugbar --dev
// .env => APP_DEBUG=true

// ################################################

// composer require beyondcode/laravel-er-diagram-generator
// erfordert https://graphviz.gitlab.io/download/
// Umgebungsvariablen => PATH => C:\Program Files\Graphviz\bin
// php artisan vendor:publish --provider="BeyondCode\ErdGenerator\ErdGeneratorServiceProvider"

// config/erd-generator.php =>
// 'rankdir' => 'LR', // Layoutrichtung: LR (Links nach Rechts) oder TB (Oben nach Unten)
// 'size' => '20,20', // Größe des Diagramms
// 'dpi' => 300, // Auflösung 

// 'ratio' => 'compress', // Versucht, das Diagramm zu komprimieren
// 'ratio' => 'auto', // Passt das Verhältnis automatisch an
// 'ratio' => 'expand', // Erweitert das Diagramm, um den verfügbaren Platz zu füllen
// 'ratio' => 'fill', // Füllt den verfügbaren Platz vollständig aus
// 'ratio' => 'fit', // Passt das Diagramm an, um in den verfügbaren Platz zu passen
// 'ratio' => 'none', // Keine Anpassung des Verhältnisses

// 'splines' => 'polyline', // ortho, polyline, curved, line
// 'ignore' => [
// 'App\Models\Model1',
// 'App\Models\Model2',
// ],

// php artisan generate:erd

use App\Models\Job;
use Illuminate\Support\Facades\Route;

// $jobs = [
//     [
//         'id' => 1,
//         'title' => 'Director',
//         'salary' => '$50,000',
//     ],
//     [
//         'id' => 2,
//         'title' => 'Programmer',
//         'salary' => '$10,000',
//     ],
//     [
//         'id' => 3,
//         'title' => 'Teacher',
//         'salary' => '$40,000',
//     ]
// ];

Route::get('/', function () {
    // dump(Job::all());
    // dump(Job::all()[0]);
    // dump(Job::all()[0]->title);
    // dump(Job::all()[0]->salary);

    return view('home');
});

// Route::get('jobs', function () use ($jobs) {
// Show Jobs
Route::get('/jobs', function () {
    // $jobs = Job::with('employer')->get();
    // $jobs = Job::with('employer')->paginate(3);
    // keine Seitenzahlen, URL nicht navigierbar
    // $jobs = Job::with('employer')->cursorPaginate(3);
    // keine Seitenzahlen
    $jobs = Job::with('employer')->latest()->simplePaginate(3);

    return view('jobs.index', [
        // 'jobs' => Job::all(),
        'jobs' => $jobs,
    ]);
});

// Create Job
Route::get('/jobs/create', function () {
    return view('jobs.create');
});

// Store Job
Route::post('/jobs', function () {
    // dd(request()->all());
    // dd(request('title'));
    request()->validate(
        [
            'title' => [
                'required',
                'min:3',
            ],
            'salary' => [
                'required',
                'gte:20000'
            ],
        ]
    );

    Job::create([
        'title' => request()->title,
        'salary' => request('salary'),
        'employer_id' => 1,
    ]);

    return redirect('/jobs');
});

// {id} = wildcard
// Route::get('/job/{id}', function ($id) use ($jobs) {
// Show Job
Route::get('/jobs/{id}', function ($id) {
    // dump($id); // View muss funktional sein
    // dd($id);

    // $job = Arr::first($jobs, function ($job) use ($id) {
    //     return $job['id'] == $id;
    // });
    // $job = Arr::first($jobs, fn($job) => $job['id'] == $id);
    // $job = Arr::first(Job::all(), fn($job) => $job['id'] == $id);
    $job = Job::find($id);

    // dd($job);

    return view('jobs.show', [
        // 'job' wird zu $job in view
        'job' => $job,
    ]);
});

// Edit Job
Route::get('/jobs/{id}/edit', function ($id) {
    $job = Job::find($id);
    
    return view('jobs.edit', [
        'job' => $job,
    ]);
});

// Update Job
Route::patch('/jobs/{id}', function ($id) {
    request()->validate([
        'title' => [
            'required',
            'min:3',
        ],
        'salary' => [
            'required',
            'gte:20000',
        ],
    ]);

    // $job = Job::find($id);
    $job = Job::findOrFail($id);
    // $job->title = request('title');
    // $job->salary = request('salary');
    // $job->save();
    $job->update([
        'title' => request('title'),
        'salary' => request('salary'),
    ]);

    return redirect('/jobs/' . $job->id);
});

// Destroy Job
Route::delete('/jobs/{id}', function ($id) {
    // Job::findOfFail($id)->delete();
    $job = Job::findOrFail($id);
    $job->delete();

    return redirect('/jobs');
});

// Exception wegen Wildcard oberhalb
// Route::get('/job/create', function () {
//     dd('hello there');
// });

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/string', function () {
    return 'About Page';
});

Route::get('/api', function () {
    return ['foo' => 'bar'];
});
