<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        return view('todo', ['tasks' => Task::all()]);
    }

    public function store(Request $request)
    {
        Task::create($request->all());
        return back();
    }

    public function destroy($id)
    {
        Task::find($id)->delete();
        return back();
    }
}