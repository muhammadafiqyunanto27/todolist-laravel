<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Auth::user()->tasks;
        return view('tasks.index', compact('tasks'));
    }
    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
       $request->validate([
        'task' => 'required|string|max:255',
        'is_completed' => 'boolean',
    ]);

    Auth::user()->tasks()->create($request->only('task', 'is_completed'));

    return redirect()->route('tasks.index')->with('success', 'Task berhasil ditambahkan!');
    }

    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    public function edit(Task $task)
{
    $this->authorizeTask($task);
    return view('tasks.edit', compact('task'));
}

public function update(Request $request, Task $task)
{
    $this->authorizeTask($task);

    $request->validate([
        'task' => 'required|string|max:255',
        'is_completed' => 'boolean',
    ]);

    $task->update($request->only('task', 'is_completed'));

    return redirect()->route('tasks.index')->with('success', 'Task berhasil diupdate!');
}

public function destroy(Task $task)
{
    $this->authorizeTask($task);
    $task->delete();

    return redirect()->route('tasks.index')->with('success', 'Task berhasil dihapus!');
}

private function authorizeTask(Task $task)
{
    if ($task->user_id !== Auth::id()) {
        abort(403);
    }
}

}
