<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tasks = [
            [
                'title' => 'Tarea 1',
                'user_id' => 1,
                'description' => 'Descripción de la tarea 1',
                'status' => 'pending'
            ],
            [
                'title' => 'Tarea 2',
                'user_id' => 1,
                'description' => 'Descripción de la tarea 2',
                'status' => 'completed'
            ],
            [
                'title' => 'Tarea 3',
                'user_id' => 2,
                'description' => 'Descripción de la tarea 3',
                'status' => 'in_progress'
            ]
        ];
        foreach ($tasks as $task) {
            Task::create($task);
        }
    }
}
