<?php

namespace App\Exports;

use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class RecordsExport implements FromCollection, WithHeadings
{
    protected Collection $records;

    public function __construct(Collection $records)
    {
        $this->records = $records;
    }

    /*
    |--------------------------------------------------------------------------
    | REGISTROS
    |--------------------------------------------------------------------------
    */

    public function collection(): \Illuminate\Support\Collection
    {
        return $this->records->map(function ($record) {

            return [

                'ID' =>
                    $record->id,

                'Fecha' =>
                    $record->date?->format('d/m/Y'),

                'Cliente' =>
                    $record->company?->name,

                'Invoice' =>
                    $record->invoice_number,

                'PAPS' =>
                    $record->paps_number,

                'Fact' =>
                    $record->fact_number,

                'Driver' =>
                    $record->driver?->name,

                'Trailer' =>
                    $record->trailer?->number,

                'Shipper' =>
                    $record->shipper?->name,

                'Consignee' =>
                    $record->consignee?->name,

                'Broker' =>
                    $record->broker?->name,

                'Origen' =>
                    $record->origin,

                'Destino' =>
                    $record->destination,

                'Cantidad' =>
                    $record->quantity,

                'Tipo de cantidad' =>
                    $record->quantity_type,

                'Notas' =>
                    $record->notes,

            ];

        });
    }


    /*
    |--------------------------------------------------------------------------
    | ENCABEZADOS
    |--------------------------------------------------------------------------
    */

    public function headings(): array
    {
        return [

            'ID',
            'Fecha',
            'Cliente',
            'Invoice',
            'PAPS',
            'Fact',
            'Driver',
            'Trailer',
            'Shipper',
            'Consignee',
            'Broker',
            'Origen',
            'Destino',
            'Cantidad',
            'Tipo de cantidad',
            'Notas',

        ];
    }
}
