<?php

namespace App\Http\Controllers\API\Version_1;

use App\Models\Todo;
use App\Enums\TaskStatus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class TodoController extends Controller
{
    //
    public function create(Request $request): \Illuminate\Http\JsonResponse
    {
//        Validate request
        $validator = Validator::make($request->all(), ['task' => ['required', 'string', 'max:255']]);
//        check for failed validations
        if ($validator->fails())
            return response()->json(['status' => false, 'message' => $validator->errors()], 400);
//        add task
        $todo = Todo::query()->create(['task' => $request->task]);
//        return success with a created task
        return response()->json(['status' => true, 'message' => 'Task created!!', 'data' => $todo]);
    }

    public function completed(Todo $todo): \Illuminate\Http\JsonResponse
    {
//        check if todo exist
        if (! $todo->exists)
            return response()->json(['status' => false, 'message' => 'Task does not exist.'], 400);
//        check if a task is still active
        if ($todo->status !== TaskStatus::Active)
            return response()->json(['status' => false, 'message' => 'Task already completed.'], 400);
//        complete task
        $todo->status = TaskStatus::Completed;
        $todo->save();
//        return success
        return response()->json(['status' => true, 'message' => 'Task Completed!!', 'data' => $todo]);
    }

    public function delete(Todo $todo): \Illuminate\Http\JsonResponse
    {
//        check if todo exist
        if (! $todo->exists)
            return response()->json(['status' => false, 'message' => 'Task does not exist.'], 400);
//        check if a task is still active
        if ($todo->status !== TaskStatus::Active)
            return response()->json(['status' => false, 'message' => 'Delete is not allowed on completed task.'], 400);
//        delete
        $todo->delete();
//        return success
        return response()->json(['status' => true, 'message' => 'Task deleted!!']);
    }
}
