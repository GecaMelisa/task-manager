<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    // Mass assignable attributes
    protected $fillable = [
        'title',
        'description',
        'due_date',
        'status',
        'category_id',
    ];

    // Task belongs to a single category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Many-to-many relationship: A task can have multiple tags
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
