<?php

namespace Tests\Unit;

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TaskTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_can_create_a_task()
    {
        $user = User::factory()->create();

        $taskData = [
            'title' => 'Nueva Tarea',
            'description' => 'Descripción de la tarea',
            'status' => 'pending',
            'user_id' => $user->id,
        ];

        $response = $this->withHeaders([
            'Authorization' => '1234567890',
        ])->postJson('/api/tasks', $taskData);

        $response->assertStatus(201);
        $this->assertDatabaseHas('tasks', ['title' => 'Nueva Tarea']);
    }

    /** @test */
    public function a_task_can_be_updated()
    {
        $user = User::factory()->create();
        $task = Task::factory()->create([
            'user_id' => $user->id,
            'title' => 'Original Title',
            'status' => 'pending',
        ]);
        $updatedData = [
            'title' => 'Updated Title',
            'description' => 'Updated Description',
            'status' => 'in_progress',
        ];
        $response = $this->withHeaders([
            'Authorization' => '1234567890',
        ])->putJson("/api/tasks/{$task->id}", $updatedData);
        $response->assertStatus(200);
        $this->assertDatabaseHas('tasks', [
            'id' => $task->id,
            'title' => 'Updated Title',
            'description' => 'Updated Description',
            'status' => 'in_progress',
        ]);
    }

    /** @test */
    public function a_task_can_be_deleted()
    {
        $user = User::factory()->create();
        $task = Task::factory()->create([
            'user_id' => $user->id,
        ]);
        $response = $this->withHeaders([
            'Authorization' => '1234567890',
        ])->deleteJson("/api/tasks/{$task->id}");
        $response->assertStatus(204);
        $this->assertDatabaseMissing('tasks', [
            'id' => $task->id,
        ]);
    }

}

