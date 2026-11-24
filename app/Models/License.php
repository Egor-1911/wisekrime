<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class License extends Model
{
    protected $table = 'licenses';

    protected $fillable = [
        'name',
        'description',
        'price',
        'type',
    ];

    protected $casts = [
        'price' => 'decimal:2',
    ];

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
