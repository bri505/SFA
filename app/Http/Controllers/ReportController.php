<?php

namespace App\Http\Controllers;

use App\Models\Record;
use App\Models\Company;
use App\Models\Driver;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | LISTADO DE REPORTES
    |--------------------------------------------------------------------------
    */

    public function index(Request $request)
    {
        $query = $this->buildQuery($request);

        $records = $query
            ->latest('date')
            ->latest('id')
            ->get();

        /*
        |--------------------------------------------------------------------------
        | RESUMEN
        |--------------------------------------------------------------------------
        */

        $totalRecords = $records->count();

        $totalQuantity = $records->sum(
            fn ($record) => (float) ($record->quantity ?? 0)
        );

        $totalServices = $records->sum(
            fn ($record) => $record->services->count()
        );

        /*
        |--------------------------------------------------------------------------
        | FILTROS
        |--------------------------------------------------------------------------
        */

        $search = trim($request->input('search', ''));

        $companyId = $request->input('company_id');

        $driverId = $request->input('driver_id');

        $dateFrom = $request->input('date_from');

        $dateTo = $request->input('date_to');

        $quantityType = $request->input('quantity_type');

        $companies = Company::where('active', true)
            ->orderBy('name')
            ->get();

        $drivers = Driver::where('active', true)
            ->orderBy('name')
            ->get();

        return view(
            'reports.index',
            compact(
                'records',
                'companies',
                'drivers',
                'search',
                'companyId',
                'driverId',
                'dateFrom',
                'dateTo',
                'quantityType',
                'totalRecords',
                'totalQuantity',
                'totalServices'
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | MOSTRAR DETALLE DE UN REGISTRO
    |--------------------------------------------------------------------------
    */

    public function show(Record $record)
    {
        $record->load([
            'company',
            'driver',
            'trailer',
            'shipper',
            'consignee',
            'broker',
            'registeredBy',
            'reviewedBy',
            'releasedBy',
            'services.serviceType',
        ]);

        return response()->json([
            'record' => $record,
        ]);
    }


    /*
    |--------------------------------------------------------------------------
    | EXPORTAR REPORTE A PDF
    |--------------------------------------------------------------------------
    */

    public function exportPdf(Request $request)
    {
        $records = $this->buildQuery($request)
            ->latest('date')
            ->latest('id')
            ->get();

        $totalRecords = $records->count();

        $totalQuantity = $records->sum(
            fn ($record) => (float) ($record->quantity ?? 0)
        );

        $totalServices = $records->sum(
            fn ($record) => $record->services->count()
        );

        $pdf = Pdf::loadView(
            'reports.pdf',
            compact(
                'records',
                'totalRecords',
                'totalQuantity',
                'totalServices'
            )
        );

        $pdf->setPaper('a4', 'landscape');

        return $pdf->download(
            'reporte-sfa-' . now()->format('Y-m-d-His') . '.pdf'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | EXPORTAR UN REGISTRO A PDF
    |--------------------------------------------------------------------------
    */

    public function recordPdf(Record $record)
    {
        $record->load([
            'company',
            'driver',
            'trailer',
            'shipper',
            'consignee',
            'broker',
            'registeredBy',
            'reviewedBy',
            'releasedBy',
            'services.serviceType',
        ]);

        $pdf = Pdf::loadView(
            'reports.record-pdf',
            compact('record')
        );

        $pdf->setPaper('a4', 'portrait');

        return $pdf->download(
            'registro-' . $record->id . '.pdf'
        );
    }

    /*
|--------------------------------------------------------------------------
| EXPORTAR UN REGISTRO A EXCEL
|--------------------------------------------------------------------------
*/

public function recordExcel(Record $record)
{
    $record->load([
        'company',
        'driver',
        'trailer',
        'shipper',
        'consignee',
        'broker',
        'registeredBy',
        'services.serviceType',
    ]);

    return \Maatwebsite\Excel\Facades\Excel::download(
        new \App\Exports\RecordExport($record),
        'registro-' . $record->id . '.xlsx'
    );
}


    /*
    |--------------------------------------------------------------------------
    | EXPORTAR A EXCEL
    |--------------------------------------------------------------------------
    */

    public function exportExcel(Request $request)
    {
        $records = $this->buildQuery($request)
            ->latest('date')
            ->latest('id')
            ->get();

        return \Maatwebsite\Excel\Facades\Excel::download(
            new \App\Exports\RecordsExport($records),
            'reporte-sfa-' . now()->format('Y-m-d-His') . '.xlsx'
        );
    }




    /*
    |--------------------------------------------------------------------------
    | CONSTRUIR CONSULTA
    |--------------------------------------------------------------------------
    */

    private function buildQuery(Request $request)
    {
        $search = trim(
            $request->input('search', '')
        );

        $companyId =
            $request->input('company_id');

        $driverId =
            $request->input('driver_id');

        $dateFrom =
            $request->input('date_from');

        $dateTo =
            $request->input('date_to');

        $quantityType =
            $request->input('quantity_type');


        /*
        |--------------------------------------------------------------------------
        | RELACIONES
        |--------------------------------------------------------------------------
        */

        $query = Record::with([
            'company',
            'driver',
            'trailer',
            'shipper',
            'consignee',
            'broker',
            'registeredBy',
            'reviewedBy',
            'releasedBy',
            'services.serviceType',
        ]);


        /*
        |--------------------------------------------------------------------------
        | BÚSQUEDA GENERAL
        |--------------------------------------------------------------------------
        */

        if ($search !== '') {

            $query->where(function ($q) use ($search) {

                $q->where(
                    'id',
                    'like',
                    "%{$search}%"
                )

                ->orWhere(
                    'invoice_number',
                    'ilike',
                    "%{$search}%"
                )

                ->orWhere(
                    'paps_number',
                    'ilike',
                    "%{$search}%"
                )

                ->orWhere(
                    'fact_number',
                    'ilike',
                    "%{$search}%"
                )

                ->orWhere(
                    'origin',
                    'ilike',
                    "%{$search}%"
                )

                ->orWhere(
                    'destination',
                    'ilike',
                    "%{$search}%"
                )

                ->orWhere(
                    'notes',
                    'ilike',
                    "%{$search}%"
                );


                /*
                |------------------------------------------------------------------
                | COMPANY
                |------------------------------------------------------------------
                */

                $q->orWhereHas(
                    'company',
                    function ($company) use ($search) {

                        $company->where(
                            'name',
                            'ilike',
                            "%{$search}%"
                        );

                    }
                );


                /*
                |------------------------------------------------------------------
                | DRIVER
                |------------------------------------------------------------------
                */

                $q->orWhereHas(
                    'driver',
                    function ($driver) use ($search) {

                        $driver->where(
                            'name',
                            'ilike',
                            "%{$search}%"
                        );

                    }
                );


                /*
                |------------------------------------------------------------------
                | TRAILER
                |------------------------------------------------------------------
                */

                $q->orWhereHas(
                    'trailer',
                    function ($trailer) use ($search) {

                        $trailer->where(
                            'number',
                            'ilike',
                            "%{$search}%"
                        );

                    }
                );


                /*
                |------------------------------------------------------------------
                | BROKER
                |------------------------------------------------------------------
                */

                $q->orWhereHas(
                    'broker',
                    function ($broker) use ($search) {

                        $broker->where(
                            'name',
                            'ilike',
                            "%{$search}%"
                        );

                    }
                );


                /*
                |------------------------------------------------------------------
                | SHIPPER
                |------------------------------------------------------------------
                */

                $q->orWhereHas(
                    'shipper',
                    function ($shipper) use ($search) {

                        $shipper->where(
                            'name',
                            'ilike',
                            "%{$search}%"
                        );

                    }
                );


                /*
                |------------------------------------------------------------------
                | CONSIGNEE
                |------------------------------------------------------------------
                */

                $q->orWhereHas(
                    'consignee',
                    function ($consignee) use ($search) {

                        $consignee->where(
                            'name',
                            'ilike',
                            "%{$search}%"
                        );

                    }
                );

            });
        }


        /*
        |--------------------------------------------------------------------------
        | CLIENTE
        |--------------------------------------------------------------------------
        */

        if ($companyId) {

            $query->where(
                'company_id',
                $companyId
            );
        }


        /*
        |--------------------------------------------------------------------------
        | DRIVER
        |--------------------------------------------------------------------------
        */

        if ($driverId) {

            $query->where(
                'driver_id',
                $driverId
            );
        }


        /*
        |--------------------------------------------------------------------------
        | FECHA DESDE
        |--------------------------------------------------------------------------
        */

        if ($dateFrom) {

            $query->whereDate(
                'date',
                '>=',
                $dateFrom
            );
        }


        /*
        |--------------------------------------------------------------------------
        | FECHA HASTA
        |--------------------------------------------------------------------------
        */

        if ($dateTo) {

            $query->whereDate(
                'date',
                '<=',
                $dateTo
            );
        }


        /*
        |--------------------------------------------------------------------------
        | TIPO DE CANTIDAD
        |--------------------------------------------------------------------------
        */

        if ($quantityType) {

            $query->where(
                'quantity_type',
                $quantityType
            );
        }


        return $query;
    }
}
