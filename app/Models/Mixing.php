<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Mixing extends Model
{
    protected $table = 'mixing';


    protected $fillable = [
        'engineer_id',
        'name',
        'audio_file',
    ];

    public function engineer(): BelongsTo
    {
        return $this->belongsTo(Engineer::class);
    }

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }
}
