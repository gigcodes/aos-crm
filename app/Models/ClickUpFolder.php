<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClickUpFolder extends Model
{
    protected $fillable = [
        'name',
        'click_up_id',
        'space_id'
    ];

    public function space(): BelongsTo
    {
        return $this->belongsTo(ClickUpSpace::class);
    }

    public function lists(): HasMany
    {
        return $this->hasMany(ClickUpList::class);
    }
}
