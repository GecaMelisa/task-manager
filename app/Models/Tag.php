<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    // Many-to-many relationship: A tag can be assigned to multiple tasks
    public function tasks()
    {
        return $this->belongsToMany(Task::class);
    }
}
