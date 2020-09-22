<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskStoreRequest;
use App\Http\Resources\TaskCollection;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Http\JsonResponse;


class TaskController extends Controller
{

    public function index(): TaskCollection{
        $tasks = Task::query()->paginate(25);
        return new TaskCollection($tasks);
    }

    public function store(TaskStoreRequest $request): TaskResource{
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
        $task-> delete();

        return new JsonResponse([
            'message' => __('success')
        ]);
    }


    /**
     * @param $taskId
     * @return \App\Http\Resources\TaskResource
     */
    public function done($taskId): TaskResource{
        $task = Task::query()->findOrFail($taskId);
        $task->update([
            'isDone' => true
        ]);
        return new TaskResource($task);
    }
}
