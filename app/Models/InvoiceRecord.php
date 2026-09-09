<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InvoiceRecord extends Model
{
    protected $table = 'invoice_records';

    protected $fillable = [
        'invoice_id',
        'record_id',
    ];

    /*
    |--------------------------------------------------------------------------
    | FACTURA
    |--------------------------------------------------------------------------
    */

    public function invoice(): BelongsTo
    {
        return $this->belongsTo(
            Invoice::class
        );
    }

    /*
    |--------------------------------------------------------------------------
    | REGISTRO
    |--------------------------------------------------------------------------
    */

    public function record(): BelongsTo
    {
        return $this->belongsTo(
            Record::class
        );
    }
}