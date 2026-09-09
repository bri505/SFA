<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ServiceType extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'active',
        'weight',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'active' => 'boolean',
    ];

    public function recordServices(): HasMany
    {
        return $this->hasMany(
            RecordService::class,
            'service_type_id'
        );
    }
}