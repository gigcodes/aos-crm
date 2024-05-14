<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ClickUpTaskAttachment extends Model
{
    protected $fillable = [
        'task_id',
        'click_up_id',
        'file_path',
    ];

    public function task(): BelongsTo
    {
        return $this->belongsTo(ClickUpTask::class);
    }
}
