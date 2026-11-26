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
        'category',
    ];

    protected $casts = [
        'price' => 'decimal:2',
    ];

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    // Scope для фильтрации по категории
    public function scopeBeat($query)
    {
        return $query->where('category', 'beat');
    }

    public function scopeService($query)
    {
        return $query->where('category', 'service');
    }
}