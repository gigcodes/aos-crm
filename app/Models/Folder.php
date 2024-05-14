<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Folder extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'name',
        'clickup_id',
        'space_id'
    ];

    public function space(): BelongsTo
    {
        return $this->belongsTo(Space::class);
    }

    public function lists(): HasMany
    {
        return $this->hasMany(Lists::class);
    }
}
