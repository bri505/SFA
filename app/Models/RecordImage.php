<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RecordImage extends Model
{
    protected $fillable = [
        'record_id',
        'image_path',
    ];

    public function record(): BelongsTo
    {
        return $this->belongsTo(Record::class);
    }
}