<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Invoice extends Model
{
    protected $fillable = [

        'company_id',
    
        'invoice_number',
    
        'period_start',
    
        'period_end',
    
        'subtotal',
    
        'tax_enabled',
    
        'tax_rate',
    
        'tax',
    
        'shipping_handling_enabled',
    
        'shipping_handling_rate',
    
        'shipping_handling_amount',
    
        'total',
    
        'comments',
    
        'status',
    
        'payment_status',
    
        'cancellation_reason',
    
        'generated_by',
    
        'generated_at',
    
        'broker_id',
    
        'consignee_id',
        'service_tax',
        'service_tax_enabled',
    ];


    protected $casts = [

        'period_start' => 'date',

        'period_end' => 'date',

        'subtotal' => 'decimal:2',

        'tax_enabled' => 'boolean',

        'tax_rate' => 'decimal:2',

        'tax' => 'decimal:2',

        'shipping_handling_enabled' => 'boolean',

        'shipping_handling_rate' => 'decimal:2',

        'shipping_handling_amount' => 'decimal:2',

        'total' => 'decimal:2',

        'generated_at' => 'datetime',
        'service_tax' => 'decimal:2',
        'service_tax_enabled' => 'boolean',
    ];


    /*
    |--------------------------------------------------------------------------
    | EMPRESA
    |--------------------------------------------------------------------------
    */

    public function company(): BelongsTo
    {
        return $this->belongsTo(
            Company::class
        );
    }

    public function broker(): BelongsTo
    {
        return $this->belongsTo(Broker::class);
    }

    public function consignee(): BelongsTo
    {
        return $this->belongsTo(Consignee::class);
    }


    /*
    |--------------------------------------------------------------------------
    | USUARIO QUE GENERÓ LA FACTURA
    |--------------------------------------------------------------------------
    */

    public function generatedBy(): BelongsTo
    {
        return $this->belongsTo(
            User::class,
            'generated_by'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | REGISTROS
    |--------------------------------------------------------------------------
    */

    public function records(): BelongsToMany
    {
        return $this->belongsToMany(
            Record::class,
            'invoice_records',
            'invoice_id',
            'record_id'
        )
        ->withPivot([

            'billing_invoice',

            'billing_paps',

            'pallets',

            'additional_charge_type',

            'additional_charge_quantity',

            'additional_charge_unit_price',

            'additional_charge_amount',
        ]);
    }
}