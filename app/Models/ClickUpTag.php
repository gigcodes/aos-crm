<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ClickUpTag extends Model
{
    protected $fillable = [
        'name',
        'tag_fg',
        'tag_bg',
        'creator_id',
    ];

    public function creator(): BelongsTo
    {
        return $this->belongsTo(ClickUpTaskComment::class);
    }

}
