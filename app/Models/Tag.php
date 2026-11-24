<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tag extends Model
{
    protected $table = 'tags';

    protected $fillable = [
        'beat_id',
        'name',
    ];

    public function beat(): BelongsTo
    {
        return $this->belongsTo(Beat::class);
    }
}
