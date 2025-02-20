<?php

// php artisan make:controller => JobController => Empty Controller
// php artisan route:list
// php artisan route:list --except-vendor
// cd ../
// php artisan new StarterKit => Blade with Alpine => No => Pest => No

use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use App\Jobs\TranslateJob;
use App\Mail\JobPosted;
use App\Models\Job;
use Illuminate\Support\Facades\Mail;

// * Common Routes
Route::view('/', 'home');
Route::view('/contact', 'contact');

Route::get('/test', function () {
    $job = Job::first();
    // dispatch(
    //     function () {
    //         logger('hello from the queue!');
    //     }
    // )->delay(5);
    TranslateJob::dispatch($job);

    return 'Done';
});

// Route::get('/test', function () {
//     // return new JobPosted();
//     Mail::to('patrick@koeper-it.de')
//         ->send(
//             new JobPosted()
//         );
//     return 'Done';
// });

// * JobController
// Route::resource('jobs', JobController::class)->only('index', 'show')->middleware('auth');
// Route::resource('jobs', JobController::class)->except('index', 'show')->middleware('auth');
// Route::resource('jobs', JobController::class)->middleware('auth');
/*Route::resource('jobs', JobController::class, [
    'only' => [
        'index',
        'show',
        'create',
        'store',
    ],
    'except' => [
        'edit',
    ],
]);*/
Route::get('/jobs', [JobController::class, 'index']);
Route::get('/jobs/create', [JobController::class, 'create']);
Route::post('/jobs', [JobController::class, 'store'])->middleware('auth');
Route::get('/jobs/{job}', [JobController::class, 'show']);
// Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])->middleware(['auth', 'can:edit-job,job']);
Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])
    ->middleware('auth')
    // ->can('edit-job', 'job');
    ->can('edit', 'job');
Route::patch('/jobs/{job}', [JobController::class, 'update'])
    ->middleware('auth')
    // ->can('edit-job', 'job');
    ->can('edit', 'job');
Route::delete('/jobs/{job}', [JobController::class, 'destroy'])
    ->middleware('auth')
    // ->can('edit-job', 'job');
    ->can('edit', 'job');

// * RegisteredUserController
Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

// * Session Controller
Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);

// * Return String
Route::get('/string', function () {
    return 'About Page';
});

// * Return Object
Route::get('/api', function () {
    return ['foo' => 'bar'];
});

/*
* JobController
Route::controller(JobController::class)->group(function () {
    Route::get('/jobs', 'index');
    Route::get('/jobs/create', 'create');
    Route::post('/jobs', 'store');
    Route::get('/jobs/{job}', 'show');
    Route::get('/jobs/{job}/edit', 'edit');
    Route::patch('/jobs/{job}', 'update');
    Route::delete('/jobs/{job}', 'destroy');
});
// Route::get('/jobs', [JobController::class, 'index']);
// Route::get('/jobs/create', [JobController::class, 'create']);
// Route::post('/jobs', [JobController::class, 'store']);
// Route::get('/jobs/{job}', [JobController::class, 'show']);
// Route::get('/jobs/{job}/edit', [JobController::class, 'edit']);
// Route::patch('/jobs/{job}', [JobController::class, 'update']);
// Route::delete('/jobs/{job}', [JobController::class, 'destroy']);
* Show Home
Route::get('/', function () {
    return view('home');
});
* Show Contact
Route::get('/contact', function () {
    return view('contact');
});
* Index Jobs
Route::get('/jobs', function () {
    $jobs = Job::with('employer')->latest()->simplePaginate(3);
    return view('jobs.index', [
        'jobs' => $jobs,
    ]);
});
* Create Job
Route::get('/jobs/create', function () {
    return view('jobs.create');
});
* Store Job
Route::post('/jobs', function () {
    request()->validate(
        [
            'title' => [
                'required',
                'min:3',
            ],
            'salary' => [
                'required',
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
Route::get('posts/{post:id}');
Route::get('posts/{post:slug}');
* Show Job
Route::get('/jobs/{job}', function (Job $job) {
    return view('jobs.show', [
        'job' => $job,
    ]);
});
* Edit Job
Route::get('/jobs/{job}/edit', function (Job $job) {
    return view('jobs.edit', [
        'job' => $job,
    ]);
});
* Update Job
Route::patch('/jobs/{job}', function (Job $job) {
    request()->validate([
        'title' => [
            'required',
            'min:3',
        ],
        'salary' => [
            'required',
        ],
    ]);
    $job->update([
        'title' => request('title'),
        'salary' => request('salary'),
    ]);
    return redirect('/jobs/' . $job->id);
});
* Destroy Job
Route::delete('/jobs/{job}', function (Job $job) {
    $job->delete();
    return redirect('/jobs');
});
*/