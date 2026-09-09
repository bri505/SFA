<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Record extends Model
{
    protected $fillable = [
        'date',
        'company_id',
        'driver_id',
        'trailer_id',
        'invoice_number',
        'paps_number',
        'shipper_id',
        'consignee_id',
        'broker_id',
        'numero_registro',
        'status',
        'registered_by',
        'notes',
        'image',
        'reviewed_at',
        'reviewed_by',
        'released_at',
        'released_by',
        'origin',
'destination',
'quantity',
'quantity_type',
    ];

    protected $casts = [
        'date' => 'date',
        'reviewed_at' => 'datetime',
        'released_at' => 'datetime',
    ];

    /*
    |--------------------------------------------------------------------------
    | EMPRESA
    |--------------------------------------------------------------------------
    */

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    /*
    |--------------------------------------------------------------------------
    | DRIVER
    |--------------------------------------------------------------------------
    */

    public function driver(): BelongsTo
    {
        return $this->belongsTo(Driver::class);
    }

    /*
    |--------------------------------------------------------------------------
    | TRAILER
    |--------------------------------------------------------------------------
    */

    public function trailer(): BelongsTo
    {
        return $this->belongsTo(Trailer::class);
    }

    /*
    |--------------------------------------------------------------------------
    | SHIPPER
    |--------------------------------------------------------------------------
    */

    public function shipper(): BelongsTo
    {
        return $this->belongsTo(Shipper::class);
    }

    /*
    |--------------------------------------------------------------------------
    | CONSIGNEE
    |--------------------------------------------------------------------------
    */

    public function consignee(): BelongsTo
    {
        return $this->belongsTo(Consignee::class);
    }

    /*
    |--------------------------------------------------------------------------
    | BROKER
    |--------------------------------------------------------------------------
    */

    public function broker(): BelongsTo
    {
        return $this->belongsTo(Broker::class);
    }

    /*
    |--------------------------------------------------------------------------
    | USUARIO QUE REGISTRÓ
    |--------------------------------------------------------------------------
    */

    public function registeredBy(): BelongsTo
    {
        return $this->belongsTo(
            User::class,
            'registered_by'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | USUARIO QUE REVISÓ
    |--------------------------------------------------------------------------
    */

    public function reviewedBy(): BelongsTo
    {
        return $this->belongsTo(
            User::class,
            'reviewed_by'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | USUARIO QUE LIBERÓ
    |--------------------------------------------------------------------------
    */

    public function releasedBy(): BelongsTo
    {
        return $this->belongsTo(
            User::class,
            'released_by'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | SERVICIOS
    |--------------------------------------------------------------------------
    */

    public function services(): HasMany
    {
        return $this->hasMany(
            RecordService::class,
            'record_id'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | FACTURAS
    |--------------------------------------------------------------------------
    */

    public function invoices(): BelongsToMany
    {
        return $this->belongsToMany(
            Invoice::class,
            'invoice_records'
        );
    }
}