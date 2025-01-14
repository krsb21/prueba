<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'status', 'user_id'];

    protected $hidden = ['created_at', 'updated_at'];

    const STATUSES = [
        'in_progress' => 'En progreso',
        'completed' => 'Completada',
        'pending' => 'Pendiente'
    ];

    /**
     * Get the status of the task.
     * @param string $value
     * @return string
     */
    public function getStatusAttribute($value)
    {
        return $this::STATUSES[$value];
    }


    /**
     * Get the user that owns the task.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
