<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Support\Facades\Mail;
use App\Mail\JobPosted;
use App\Models\Employer;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::with('employer')->latest()->simplePaginate(3);

        return view('jobs.index', [
            'jobs' => $jobs,
        ]);
    }

    public function create()
    {
        return view('jobs.create');
    }

    public function store()
    {
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
        $job = Job::create([
            'title' => request()->title,
            'salary' => request('salary'),
            // 'employer_id' => 1,
            'employer_id' => Employer::where('user_id', Auth::user()->id)->first()->id,
        ]);

        Mail::to($job->employer->user)
            ->send(
            // ->queue(
                new JobPosted($job)
            );

        return redirect('/jobs');
    }

    public function show(Job $job)
    {
        return view('jobs.show', [
            'job' => $job,
        ]);
    }

    public function edit(Job $job)
    {
        // if (Auth::user()->cannot('edit-job', $job)) {
        // if (Auth::user()->can('edit-job', $job)) {
        // dd('test');
        // }

        // if (Auth::guest()) {
        //     return redirect('/login');
        // }
        // if ($job->employer->user != Auth::user()) {
        // if ($job->employer->user->is(Auth::user()) ) {
        // if ($job->employer->user->isNot(Auth::user())) {
        //     return abort(403);
        // }

        // if (Gate::allows('edit-job', $job)) {}
        // if (Gate::denies('edit-job', $job)) {}
        // Gate::authorize('edit-job', $job);

        return view('jobs.edit', [
            'job' => $job,
        ]);
    }

    public function update(Job $job)
    {
        // Gate::authorize('edit-job', $job);

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
    }

    public function destroy(Job $job)
    {
        // Gate::authorize('edit-job', $job);

        $job->delete();

        return redirect('/jobs');
    }
}
