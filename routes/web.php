<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TasksController;
use App\Models\Task;

Route::get('/', function () {
    // Fetching all the Tasks and order by due date
    $tasks = Task::orderBy('due_date')->paginate(5);

    return view('home', compact('tasks'));
})->name('home');

Route::get('/home/edit/{task_id}', function ($task_id) {
    // Fetch the task
    $task = Task::where('task_id', $task_id)->first();
    return view('editTask', compact('task'));
})->name('editTask');

// Connect the other route
require base_path('routes/backend.php');