<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{
    protected $fillable = [
        'name',
        'code',
        'tax_id',
        'address',
        'city',
        'state',
        'postal_code',
        'colony',
        'phone',
        'contact',
        'email',
        'active',
    ];

    protected $casts = [
        'active' => 'boolean',
    ];

    public function invoices(): HasMany
    {
        return $this->hasMany(Invoice::class);
    }

    public function emails(): HasMany
    {
        return $this->hasMany(CompanyEmail::class);
    }
}