<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ClickUpSpace extends Model
{
    protected $fillable = [
        'name',
        'click_up_id',
    ];

    public function folders(): HasMany
    {
        return $this->hasMany(ClickUpFolder::class);
    }
}
