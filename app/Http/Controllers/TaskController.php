<?php

namespace App\Http\Controllers;


use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Validators\ApiValidator;

class TaskController extends Controller
{
    private $valOb;
    public function __construct()
    {
        $this->valOb = new ApiValidator();
    }
    /**
     * Get all Tasks
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request) : \Illuminate\Http\JsonResponse
    {
        $validator = $this->valOb->storeTask($request);
        if ($validator->fails()) {
            $messages = $validator->errors()->all();
            return response()->json($messages, 422);
        }
        $task = Task::create($request->all());
        return response()->json($task, 201);
    }

   /**
    * Update the specified Task
    * @param Request $request
    * @param Task $id
    * @return \Illuminate\Http\JsonResponse
    */
    public function update(Request $request, Task $id) : \Illuminate\Http\JsonResponse
    {
        $validator = $this->valOb->updateTask($request);
        if ($validator->fails()) {
            $messages = $validator->errors()->all();
            return response()->json($messages, 422);
        }
        $id->update($request->all());
        return response()->json($id, 200);
    }

    /**
     * Remove the specified Task
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id): \Illuminate\Http\JsonResponse
    {
        $task = Task::find($id);
        if (!$task) {
            return response()->json(['message' => 'Task not found'], 404);
        }
        $task->delete();
        return response()->json(null, 204);
    }
}
