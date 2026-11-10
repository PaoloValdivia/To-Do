<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = auth()->user()->tasks()->latest()->get();
        return view('todo', compact('tasks'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
        ]);
        auth()->user()->tasks()->create($data);
        return back()->with('ok', 'Tarea agregada');
    }

    public function toggle($id)
    {
        $task = auth()->user()->tasks()->findOrFail($id);
        $task->update(['done' => !$task->done]);
        return back();
    }

    public function destroy($id)
    {
        auth()->user()->tasks()->findOrFail($id)->delete();
        return back()->with('ok', 'Tarea eliminada');
    }
}