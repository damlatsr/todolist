<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskStoreRequest;
use App\Http\Resources\TaskCollection;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;


class TaskController extends Controller
{

    public function index(Request $request): TaskCollection
    {
        $perPage = $request->filled('per_page') ? $request->input('per_page') : 5;
        $tasks = Task::query();

        if ($request->filled('isDeleted')){
            $tasks->where('isDeleted', $request->input('isDeleted'));
        }
        return new TaskCollection($tasks->paginate($perPage));
    }

    public function store(TaskStoreRequest $request): TaskResource
    {
        $data = $request->validated();

        $task = Task::query()->firstOrCreate($data);

        return new TaskResource($task);
    }

    public function show($taskId): TaskResource {
        $task = Task::query()->findOrFail($taskId);

        return new TaskResource($task);

    }

    public function update(TaskStoreRequest  $request,$taskId): TaskResource{
        $data = $request->validated();

        $task = Task::query()->findOrFail($taskId);
        $task->update($data);

        return new TaskResource($task);
    }

    public function destroy($taskId): JsonResponse{
        $task = Task::query()->findOrFail($taskId);
        $task->update(['isDeleted'=> 1]);

        return new JsonResponse([
            'message' => __('success')
        ]);
    }
}
