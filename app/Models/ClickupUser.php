<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ClickUpUser extends Model
{
    protected $fillable = [
        'username',
        'email',
        'click_up_id',
        'initials',
        'profile_picture',
        'team_id'
    ];

    public function teams(): BelongsToMany
    {
        return $this->belongsToMany(ClickUpTeam::class);
    }
}
