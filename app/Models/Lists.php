<?php

namespace App\Models;

use Flare;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lists extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'name',
        'clickup_id',
        'folder_id',
    ];

    public function folder(): BelongsTo
    {
        return $this->belongsTo(Folder::class);
    }

    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }
}
