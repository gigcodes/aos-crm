<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClickUpTaskComment extends Model
{
    protected $fillable = [
        'content',
        'author_name',
        'author_email',
        'click_up_id',
        'task_id'
    ];

    public function task(): BelongsTo
    {
        return $this->belongsTo(ClickUpTask::class);
    }
}
