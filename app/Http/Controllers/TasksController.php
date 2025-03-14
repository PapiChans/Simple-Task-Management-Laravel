<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Task;


class TasksController extends Controller
{
    // Add Tasks
    public function addTask(Request $request){
        // Validating the Form
        $request->validate([
            'title' => 'required|max:30',
            'description' => 'max:50',
            'due_date' => 'required|date',
        ]);

        Task::create([
            'task_id' => Str::uuid(),
            'title' => $request->title,
            'description' => $request->description,
            'due_date' => $request->due_date,
            'status' => 'Pending'
        ]);

        return redirect()->route('home')->with('success', 'Task created successfully!');
    }

    public function editTask(Request $request){
        $request->validate([
            'edit_title' => 'required|max:30',
            'edit_description' => 'max:50',
            'edit_due_date' => 'required|date',
            'edit_status' => 'required',
        ]);

        $task = Task::where('task_id', $request->edit_task_id)->first();
        $task->title = $request->edit_title;
        $task->description = $request->edit_description;
        $task->due_date = $request->edit_due_date;
        $task->status = $request->edit_status;
        $task->save();

        return redirect()->route('home')->with('success', 'Task Changes successfully!');
    }

    public function deleteTask(Request $request, $task_id){
        $task = Task::where('task_id', $task_id)->first();
        $task->delete();

        return redirect()->route('home')->with('success', 'Task deleted successfully!');
    }
}
