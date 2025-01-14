<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    /**
     * Return all users
     * @return \Illuminate\Http\JsonResponse
     */
    public function getUsers() : \Illuminate\Http\JsonResponse
    {
        $users = User::all();
        return response()->json($users);
    }

    /**
     * Return a specific user
     * @param User $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getUserTasks(User $id) : \Illuminate\Http\JsonResponse
    {
        $tasks = $id->tasks;
        return response()->json($tasks);
    }
}
