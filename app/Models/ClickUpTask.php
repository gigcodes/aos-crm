<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;

class ClickUpTask extends Model
{
    protected $fillable = [
        'click_up_id',
        'name',
        'text_content',
        'description',
        'date_closed',
        'date_done',
        'archived',
        'permission_level',
        'priority',
        'parent_id',
        'creator_id',
        'assignees',
        'watchers',
        'team_id'
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
        return $this->hasMany(ClickUpUser::class, 'watchers');
    }

    public function team(): BelongsTo
    {
        return $this->belongsTo(ClickUpTeam::class, 'team_id');
    }

    protected function casts()
    {
        return [
            'date_closed' => 'datetime',
            'date_done' => 'datetime',
        ];
    }
}
