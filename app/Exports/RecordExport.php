<?php

namespace App\Exports;

use App\Models\Record;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class RecordExport implements FromArray, WithHeadings
{
    protected Record $record;

    public function __construct(Record $record)
    {
        $this->record = $record;
    }

    public function headings(): array
    {
        return [
            'Registro',
            'Fecha',
            'Cliente',
            'Número de factura',
            'PAPS',
            'Chofer',
            'Remolque',
            'Transportista',
            'Consignatario',
            'Agente comercial',
            'Origen',
            'Destino',
            'Cantidad',
            'Tipo de cantidad',
            'Notas',
            'Registrado por',
        ];
    }

    public function array(): array
    {
        return [[
            $this->record->id,

            $this->record->date
                ? $this->record->date->format('d/m/Y')
                : null,

            $this->record->company?->name,

            $this->record->invoice_number,

            $this->record->paps_number,

            $this->record->driver?->name,

            $this->record->trailer?->number,

            $this->record->shipper?->name,

            $this->record->consignee?->name,

            $this->record->broker?->name,

            $this->record->origin,

            $this->record->destination,

            $this->record->quantity,

            $this->record->quantity_type,

            $this->record->notes,

            $this->record->registeredBy?->name,
        ]];
    }
}