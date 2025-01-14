<?php
namespace App\Http\Validators;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class ApiValidator
{
    /**
     * Validate the request to store a task
     * @param Request $request
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function storeTask(Request $request)
    {
        $available = array_keys(Task::STATUSES);
        $validation = [
            'title' => [
                'required',
                'string',
                'min:5'
            ],
            'description' => [
                'nullable',
                'string',
                'max:500'
            ],
            'status' => [
                'required',
                'string',
                'in:' . implode(',', $available)
            ],
            'user_id' => [
                'required',
                'integer',
                'exists:users,id'
            ]
        ];
        $messages = [];
        return Validator::make($request->all(), $validation, $messages);
    }

    /**
     * Validate the request to update a task
     * @param Request $request
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function updateTask(Request $request)
    {
        $available = array_keys(Task::STATUSES);
        $validation = [
            'title' => [
                'string',
                'min:5'
            ],
            'description' => [
                'nullable',
                'string',
                'max:500'
            ],
            'status' => [
                'string',
                'in:' . implode(',', $available)
            ],
            'user_id' => [
                'integer',
                'exists:users,id'
            ]
        ];
        $messages = [];
        return Validator::make($request->all(), $validation, $messages);
    }
}