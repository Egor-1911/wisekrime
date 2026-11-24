<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderItem extends Model
{
    protected $table = 'order_items';

    protected $fillable = [
        'mixing_id',
        'order_id',
        'cover_id',
        'beat_id',
        'price',
    ];

    protected $casts = [
        'price' => 'decimal:2',
    ];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function mixing(): BelongsTo
    {
        return $this->belongsTo(Mixing::class);
    }

    public function cover(): BelongsTo
    {
        return $this->belongsTo(Cover::class);
    }

    public function beat(): BelongsTo
    {
        return $this->belongsTo(Beat::class);
    }
}
