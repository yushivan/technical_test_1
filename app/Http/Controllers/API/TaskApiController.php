<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;

class TaskApiController extends Controller
{
    public function index()
    {
        $tasks = Auth::user()->tasks()->latest()->get();
        return response()->json([
            'success' => true,
            'data' => $tasks
        ], Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'deadline' => 'nullable|date',
        ]);

        $task = Auth::user()->tasks()->create($data);

        return response()->json([
            'success' => true,
            'message' => 'Tugas berhasil ditambahkan.',
            'data' => $task
        ], Response::HTTP_CREATED);
    }

    public function update(Request $request, Task $task)
    {
        $this->authorize('update', $task);

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'deadline' => 'nullable|date',
            'is_completed' => 'boolean',
        ]);

        $task->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Tugas berhasil diperbarui.',
            'data' => $task
        ], Response::HTTP_OK);
    }

    public function destroy(Task $task)
    {
        $this->authorize('delete', $task);
        $task->delete();

        return response()->json([
            'success' => true,
            'message' => 'Tugas berhasil dihapus.'
        ], Response::HTTP_OK);
    }

    public function show(Task $task)
    {
        $this->authorize('view', $task);

        return response()->json([
            'success' => true,
            'data' => $task
        ], Response::HTTP_OK);
    }
}
