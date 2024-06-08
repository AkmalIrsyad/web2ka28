<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    //
    public function index()
    {
        $task = Task::all();
        return view('tasks.index',compact('task'));
    }

        public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);

        Task::create($request->all());

        return redirect()->route('tasks.index');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index');
    }

    public function updateStatus(Task $task, Request $request)
    {
        $request->validate([
            'status' => 'required|in:no progress,on progress,complete',
        ]);

        $task->update(['status' => $request->status]);

        return redirect()->route('tasks.index');
    }
}
