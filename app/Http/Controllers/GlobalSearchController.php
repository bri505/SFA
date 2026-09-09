<?php

namespace App\Http\Controllers;

use App\Models\Record;
use Illuminate\Http\Request;

class GlobalSearchController extends Controller
{
    public function index(Request $request)
    {
        $search = trim($request->input('q', ''));

        /*
        |--------------------------------------------------------------------------
        | BÚSQUEDA
        |--------------------------------------------------------------------------
        */

        $records = collect();

        if ($search !== '') {

            $records = $this->searchRecords($search);

        }

        /*
        |--------------------------------------------------------------------------
        | RESPUESTA JSON
        |--------------------------------------------------------------------------
        */

        if ($request->expectsJson()) {

            return response()->json([
                'records' => $records,
            ]);

        }

        /*
        |--------------------------------------------------------------------------
        | VISTA NORMAL
        |--------------------------------------------------------------------------
        */

        return view(
            'search.global',
            compact(
                'search',
                'records'
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | BUSCAR REGISTROS
    |--------------------------------------------------------------------------
    */

    private function searchRecords(string $search)
    {
        $term = "%{$search}%";

        return Record::with([
            'company',
            'driver',
            'trailer',
            'shipper',
            'consignee',
            'broker',
        ])
        ->where(function ($query) use ($term, $search) {

            /*
            |--------------------------------------------------------------------------
            | DATOS DIRECTOS
            |--------------------------------------------------------------------------
            */

            $query
                ->where('id', 'like', "%{$search}%")
                ->orWhere('invoice_number', 'ilike', $term)
                ->orWhere('paps_number', 'ilike', $term)
                ->orWhere('fact_number', 'ilike', $term)
                ->orWhere('origin', 'ilike', $term)
                ->orWhere('destination', 'ilike', $term)
                ->orWhere('notes', 'ilike', $term);


            /*
            |--------------------------------------------------------------------------
            | COMPANY
            |--------------------------------------------------------------------------
            */

            $query->orWhereHas(
                'company',
                function ($q) use ($term) {

                    $q->where(
                        'name',
                        'ilike',
                        $term
                    );

                }
            );


            /*
            |--------------------------------------------------------------------------
            | DRIVER
            |--------------------------------------------------------------------------
            */

            $query->orWhereHas(
                'driver',
                function ($q) use ($term) {

                    $q->where(
                        'name',
                        'ilike',
                        $term
                    );

                }
            );


            /*
            |--------------------------------------------------------------------------
            | TRAILER
            |--------------------------------------------------------------------------
            */

            $query->orWhereHas(
                'trailer',
                function ($q) use ($term) {

                    $q->where(
                        'number',
                        'ilike',
                        $term
                    );

                }
            );


            /*
            |--------------------------------------------------------------------------
            | BROKER
            |--------------------------------------------------------------------------
            */

            $query->orWhereHas(
                'broker',
                function ($q) use ($term) {

                    $q->where(
                        'name',
                        'ilike',
                        $term
                    );

                }
            );


            /*
            |--------------------------------------------------------------------------
            | SHIPPER
            |--------------------------------------------------------------------------
            */

            $query->orWhereHas(
                'shipper',
                function ($q) use ($term) {

                    $q->where(
                        'name',
                        'ilike',
                        $term
                    );

                }
            );


            /*
            |--------------------------------------------------------------------------
            | CONSIGNEE
            |--------------------------------------------------------------------------
            */

            $query->orWhereHas(
                'consignee',
                function ($q) use ($term) {

                    $q->where(
                        'name',
                        'ilike',
                        $term
                    );

                }
            );

        })
        ->latest()
        ->limit(50)
        ->get();
    }
}