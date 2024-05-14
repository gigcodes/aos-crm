<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'content',
        'author_name',
        'author_email',
        'clickup_id',
        'task_id'
    ];

    public function task(): BelongsTo
    {
        return $this->belongsTo(Task::class);
    }
}
