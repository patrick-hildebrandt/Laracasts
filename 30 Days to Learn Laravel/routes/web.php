<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;

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
