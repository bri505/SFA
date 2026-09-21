<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ServiceType extends Model
{
    protected $fillable = [
        'name',
        'name_en',
        'description',
        'description_en',
        'price',
        'tax_rate',
        'tax_enabled',
        'active',
        'weight',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'tax_rate' => 'decimal:2',
        'tax_enabled' => 'boolean',
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
