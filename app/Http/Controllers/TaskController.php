<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskStoreRequest;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index()
    {

        $tasks = Auth::user()->tasks;

        return view('tasks.index', compact('tasks'));
    }

    // public function create()
    // {
    //     return view('tasks.create');
    // }

    public function store(TaskStoreRequest $request)
    {
        $task = Task::make();
        $task->name = $request->validated()['name'];
        $task->description = $request->validated()['description'];
        $task->user_id = Auth::id();


        $task->save();

        return redirect()->route('tasks.index');
    }

    public function status(Task $task)
    {
        $task->update(['is_done' => !$task->is_done]);

        return redirect()->route('tasks.index');
    }
    public function delete(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index');
    }
}
