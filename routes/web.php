<?php

use Illuminate\Support\Facades\Route;
use App\Models\Employer;
use App\Models\Job;

Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

// Jobs - Index (list all)
Route::get('/jobs', function () {
    $jobs = Job::with(['employer', 'tags'])->latest()->get();
    return view('jobs', ['jobs' => $jobs]);
});

// Jobs - Create form
Route::get('/jobs/create', function () {
    $employers = Employer::all();
    return view('jobs.create', ['employers' => $employers]);
});

// Jobs - Store (handle form submission)
Route::post('/jobs', function () {
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required'],
        'employer_id' => ['required', 'exists:employers,id'],
    ]);

    Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => request('employer_id'),
    ]);

    return redirect('/jobs');
});

// Jobs - Show (single job)
Route::get('/jobs/{id}', function ($id) {
    $job = Job::with(['employer', 'tags'])->find($id);

    if (!$job) {
        abort(404);
    }

    return view('job', ['job' => $job]);
});

// Jobs - Edit form
Route::get('/jobs/{id}/edit', function ($id) {
    $job = Job::findOrFail($id);
    return view('jobs.edit', ['job' => $job]);
});

// Jobs - Update (handle edit form submission)
Route::patch('/jobs/{id}', function ($id) {
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required'],
    ]);

    $job = Job::findOrFail($id);

    $job->update([
        'title' => request('title'),
        'salary' => request('salary'),
    ]);

    return redirect('/jobs/' . $job->id);
});

// Jobs - Delete
Route::delete('/jobs/{id}', function ($id) {
    $job = Job::findOrFail($id);
    $job->delete();

    return redirect('/jobs');
});
