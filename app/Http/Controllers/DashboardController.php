<?php

namespace App\Http\Controllers;

use App\Models\Record;
use App\Models\Company;
use App\Models\Driver;
use App\Models\Trailer;
use App\Models\Broker;
use App\Models\Shipper;
use App\Models\Consignee;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $today = Carbon::today();
        $nextRecordId = (Record::max('id') ?? 0) + 1;


        // =====================================================
        // REGISTROS DE HOY
        // =====================================================

        $todayRecords = Record::whereDate('date', $today)
            ->count();


        // =====================================================
        // REGISTROS RECIENTES
        // =====================================================

        $recentRecords = Record::with([
            'company',
            'driver',
            'trailer',
            'shipper',
            'consignee',
            'broker',
            'images',
        ])
        ->latest('id')
        ->take(10)
        ->get();


        // =====================================================
        // CATÁLOGO DE COMPANIES
        // =====================================================

        $companies = Company::where('active', true)
            ->orderBy('name')
            ->get();


        // =====================================================
        // CATÁLOGO DE DRIVERS
        // =====================================================

        $drivers = Driver::where('active', true)
            ->orderBy('name')
            ->get();


        // =====================================================
        // CATÁLOGO DE TRAILERS
        // =====================================================

        $trailers = Trailer::where('active', true)
            ->orderBy('number')
            ->get();


        // =====================================================
        // CATÁLOGO DE BROKERS
        // =====================================================

        $brokers = Broker::where('active', true)
            ->orderBy('name')
            ->get();


        // =====================================================
        // CATÁLOGO DE SHIPPERS
        // =====================================================

        $shippers = Shipper::where('active', true)
            ->orderBy('name')
            ->get();


        // =====================================================
        // CATÁLOGO DE CONSIGNEES
        // =====================================================

        $consignees = Consignee::where('active', true)
            ->orderBy('name')
            ->get();

            $defaultQuantityTypes = [
                'palets',
                'contenedores',
                'piezas',
            ];
            
            $existingQuantityTypes = Record::whereNotNull('quantity_type')
                ->where('quantity_type', '!=', '')
                ->distinct()
                ->pluck('quantity_type')
                ->toArray();
            
            $quantityTypes = collect(
                array_merge(
                    $defaultQuantityTypes,
                    $existingQuantityTypes
                )
            )
                ->unique()
                ->values();


        // =====================================================
        // DASHBOARD
        // =====================================================

        return view('dashboard', compact(
            'todayRecords',
            'recentRecords',
            'companies',
            'drivers',
            'trailers',
            'brokers',
            'shippers',
            'consignees',
            'quantityTypes',
            'nextRecordId'
        ));
    }
}