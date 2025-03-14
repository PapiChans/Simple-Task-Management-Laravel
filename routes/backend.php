<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TasksController;

Route::post('/backend/addTask', [TasksController::class, 'addTask'])->name('backend.addTask');
Route::post('/backend/editTask/', [TasksController::class, 'editTask'])->name('backend.editTask');
Route::get('/backend/deleteTask/{task_id}', [TasksController::class, 'deleteTask'])->name('backend.deleteTask');