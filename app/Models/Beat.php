<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Beat extends Model
{
    protected $table = 'beats';

    protected $fillable = [
        'title',
        'duration',
        'bpm',
        'key',
        'price',
        'cover_image',
        'audio_file',
        'genre',
        'availability',
    ];

    protected $casts = [
        'availability' => 'boolean',
        'bpm' => 'integer',
        'price' => 'decimal:2',
    ];

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function tags(): HasMany
    {
        return $this->hasMany(Tag::class);
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }
}
