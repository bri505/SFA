<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RecordService extends Model
{
    protected $fillable = [
        'record_id',
        'service_type_id',
        'quantity',
        'unit_price',
        'subtotal',
        'notes',
    ];

    protected $casts = [
        'quantity' => 'decimal:2',
        'unit_price' => 'decimal:2',
        'subtotal' => 'decimal:2',
    ];

    public function record(): BelongsTo
    {
        return $this->belongsTo(
            Record::class,
            'record_id'
        );
    }

    public function serviceType(): BelongsTo
    {
        return $this->belongsTo(
            ServiceType::class,
            'service_type_id'
        );
    }
}