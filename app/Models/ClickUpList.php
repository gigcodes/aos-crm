<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ClickUpList extends Model
{
    protected $fillable = [
        'name',
        'click_up_id',
        'folder_id',
    ];

    public function folder(): BelongsTo
    {
        return $this->belongsTo(ClickUpFolder::class);
    }

    public function tasks(): HasMany
    {
        return $this->hasMany(ClickUpTask::class);
    }
}
