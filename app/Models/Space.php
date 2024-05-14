<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Space extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'name',
        'clickup_id',
    ];

    public function folders(): HasMany
    {
        return $this->hasMany(Folder::class);
    }
}
