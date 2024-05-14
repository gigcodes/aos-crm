<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;

class Task extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'clickup_id',
        'name',
        'text_content',
        'description',
        'date_closed',
        'date_done',
        'archived',
        'permission_level',
        'priority',
        'parent',
        'children',
        'creator',
        'assignees',
        'watchers',
        'team',
    ];

    public function scopeSubTasks(Builder $query): Builder
    {
        return $query->where('parent_id',);
    }


    public function children(): HasMany
    {
        return $this->hasMany(Task::class, 'children');
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(ClickupUser::class, 'creator');
    }

    public function assignees(): BelongsTo
    {
        return $this->belongsTo(ClickupUser::class, 'assignees');
    }

    public function watchers(): BelongsTo
    {
        return $this->belongsTo(ClickupUser::class, 'watchers');
    }

    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class, 'team');
    }

    protected function casts()
    {
        return [
            'date_closed' => 'datetime',
            'date_done' => 'datetime',
        ];
    }
}
