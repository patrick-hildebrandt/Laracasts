<?php

// php artisan tinker
// App\Models\Job::create([ 'title' => 'Acme Director', 'salary' => '$1,000,000' ]);
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
Route::get('jobs', function () {
    return view('jobs', [
        // 'jobs' => $jobs,
        'jobs' => Job::all(),
    ]);
});

// {id} = wildcard
// Route::get('/job/{id}', function ($id) use ($jobs) {
Route::get('/job/{id}', function ($id) {
    // dump($id); // View muss funktional sein
    // dd($id);

    // $job = Arr::first($jobs, function ($job) use ($id) {
    //     return $job['id'] == $id;
    // });
    // $job = Arr::first($jobs, fn($job) => $job['id'] == $id);
    // $job = Arr::first(Job::all(), fn($job) => $job['id'] == $id);
    $job = Job::find($id);

    // dd($job);

    return view('job', [
        'job' => $job,
    ]);
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/string', function () {
    return 'About Page';
});

Route::get('/api', function () {
    return ['foo' => 'bar'];
});
