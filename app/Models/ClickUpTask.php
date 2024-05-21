<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ClickUpTask extends Model
{
    protected $fillable = [
        'click_up_id',
        'name',
        'text_content',
        'description',
        'start_date',
        'due_date',
        'archived',
        'permission_level',
        'priority',
        'parent_id',
        'creator_id',
        'team_id',
    ];

    public function scopeSubTasks(Builder $query, $parentId): Builder
    {
        return $query->where('parent_id', $parentId);
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(ClickUpUser::class, 'creator_id');
    }

    public function assignees(): HasMany
    {
        return $this->hasMany(ClickUpUser::class);
    }

    public function watchers(): HasMany
    {
        return $this->hasMany(ClickUpUser::class);
    }

    public function team(): BelongsTo
    {
        return $this->belongsTo(ClickUpTeam::class, 'team_id');
    }

    public function attachments(): HasMany
    {
        return $this->hasMany(ClickUpTaskAttachment::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(ClickUpTaskComment::class);
    }

    protected function casts()
    {
        return [
            'start_date' => 'datetime',
            'due_date'   => 'datetime',
        ];
    }
}
