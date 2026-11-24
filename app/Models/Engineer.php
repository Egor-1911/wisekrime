<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Engineer extends Model
{
    protected $table = 'engineers';

    protected $fillable = [
        'name',
        'photo',
        'description',
    ];

    public function mixings(): HasMany
    {
        return $this->hasMany(Mixing::class);
    }
}
