<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Designer extends Model
{
    protected $table = 'designers';

    protected $fillable = [
        'name',
        'photo',
        'description',
    ];

    public function covers(): HasMany
    {
        return $this->hasMany(Cover::class);
    }
}
