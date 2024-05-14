<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClickUpTaskAttachment extends Model
{
    protected $fillable = [
        'task_id',
        'clickup_id',
        'file_path',
    ];

    public function task(): BelongsTo
    {
        return $this->belongsTo(ClickUpTask::class);
    }
}
