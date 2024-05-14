<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ClickUpTeam extends Model
{
    protected $fillable = [
        'click_up_id',
        'name',
    ];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
