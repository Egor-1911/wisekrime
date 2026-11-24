<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cover extends Model
{
    protected $table = 'covers';

    protected $fillable = [
        'title',
        'image',
        'designer_id',
    ];


    public function designer(): BelongsTo
    {
        return $this->belongsTo(Designer::class);
    }

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }
}
