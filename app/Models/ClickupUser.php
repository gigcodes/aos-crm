<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

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
