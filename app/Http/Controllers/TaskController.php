<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $tasks = Task::where('user_id', Auth::id())->orderBy('date', 'desc')->paginate(1);
        return view('tasks.index', compact('tasks'));
    }

    public function store(TaskRequest $request)
    {
        Task::create([
            'title' => $request->validated()['title'],
            'description' => $request->validated()['description'],
            'date' => $request->validated()['date'],
            'start_time' => $request->validated()['start_time'],
            'end_time' => $request->validated()['end_time'],
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('tasks.index')->with('success', 'Tâche créée avec succès.');
    }

    public function update(TaskRequest $request, Task $task)
    {
        if ($task->user_id !== Auth::id()) {
            abort(403);
        }

        $task->update($request->validated());

        return redirect()->route('tasks.index')->with('success', 'Tâche mise à jour.');
    }
    public function edit(Task $task)
    {
        if ($task->user_id !== Auth::id()) {
            abort(403, "Accès non autorisé !");
        }

        return view('tasks.edit', compact('task'));
    }


    public function destroy(Task $task)
    {
        if ($task->user_id !== Auth::id()) {
            abort(403);
        }

        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Tâche supprimée.');
    }
}
