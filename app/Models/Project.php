<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'name',
        'start_date',
        'deadline',
        'status',
        'description',
        'user_id',
        'assignee_id'
    ];

    protected static function booted(): void
    {
        static::creating(function ($project) {
            if (auth()->check()) {
                $project->user_id = auth()->id();
            }
        });
    }

    public function assignee(): BelongsTo
    {
        return $this->belongsTo(User::class,'assignee_id');
    }

    public function assignor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    protected function casts()
    {
        return [
            'start_date' => 'datetime',
            'deadline' => 'datetime',
        ];
    }
}
