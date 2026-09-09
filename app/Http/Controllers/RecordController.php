<?php

namespace App\Http\Controllers;

use App\Models\ServiceType;
use App\Models\Record;
use App\Models\Company;
use App\Models\Driver;
use App\Models\Trailer;
use App\Models\Broker;
use App\Models\Shipper;
use App\Models\Consignee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class RecordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | LISTADO
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $records = Record::with([
            'company',
            'driver',
            'trailer',
            'shipper',
            'consignee',
            'broker',
            'services.serviceType',
        ])
        ->latest()
        ->get();

        $companies = Company::where('active', true)->get();
        $drivers = Driver::where('active', true)->get();
        $trailers = Trailer::where('active', true)->get();
        $brokers = Broker::where('active', true)->get();
        $shippers = Shipper::where('active', true)->get();
        $consignees = Consignee::where('active', true)->get();

        $serviceTypes = ServiceType::where('active', true)
            ->orderBy('name')
            ->get();

        return view('records.index', compact(
            'records',
            'companies',
            'drivers',
            'trailers',
            'brokers',
            'shippers',
            'consignees',
            'serviceTypes'
        ));
    }


    /*
    |--------------------------------------------------------------------------
    | CREAR
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        /*
        |--------------------------------------------------------------------------
        | SIGUIENTE ID
        |--------------------------------------------------------------------------
        |
        | Este número solamente se muestra como referencia en el formulario.
        | El ID definitivo lo genera PostgreSQL al guardar el registro.
        |
        */

        $nextRecordId = (Record::max('id') ?? 0) + 1;


        $companies = Company::where('active', true)
            ->orderBy('name')
            ->get();

        $drivers = Driver::where('active', true)
            ->orderBy('name')
            ->get();

        $trailers = Trailer::where('active', true)
            ->orderBy('number')
            ->get();

        $brokers = Broker::where('active', true)
            ->orderBy('name')
            ->get();

        $shippers = Shipper::where('active', true)
            ->orderBy('name')
            ->get();

        $consignees = Consignee::where('active', true)
            ->orderBy('name')
            ->get();


        return view('records.create', compact(
            'companies',
            'drivers',
            'trailers',
            'brokers',
            'shippers',
            'consignees',
            'nextRecordId'
        ));
    }


    /*
    |--------------------------------------------------------------------------
    | GUARDAR NUEVO REGISTRO
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $validated = $request->validate([

            'date' =>
                'required|date',
        
            'invoice_number' =>
                'required|string|max:255',
        
        
            /*
            |--------------------------------------------------------------------------
            | COMPANY
            |--------------------------------------------------------------------------
            */
        
            'company_id' =>
                'nullable|exists:companies,id',
        
            'company_name' =>
                'nullable|string|max:255',
        
        
            /*
            |--------------------------------------------------------------------------
            | DRIVER
            |--------------------------------------------------------------------------
            */
        
            'driver_id' =>
                'nullable|exists:drivers,id',
        
            'driver_name' =>
                'nullable|string|max:255',
        
        
            /*
            |--------------------------------------------------------------------------
            | TRAILER
            |--------------------------------------------------------------------------
            */
        
            'trailer_id' =>
                'nullable|exists:trailers,id',
        
            'trailer_number' =>
                'nullable|string|max:255',
        
        
            /*
            |--------------------------------------------------------------------------
            | BROKER
            |--------------------------------------------------------------------------
            */
        
            'broker_id' =>
                'nullable|exists:brokers,id',
        
            'broker_name' =>
                'nullable|string|max:255',
        
        
            /*
            |--------------------------------------------------------------------------
            | SHIPPER
            |--------------------------------------------------------------------------
            */
        
            'shipper_id' =>
                'nullable|exists:shippers,id',
        
            'shipper_name' =>
                'nullable|string|max:255',
        
        
            /*
            |--------------------------------------------------------------------------
            | CONSIGNEE
            |--------------------------------------------------------------------------
            */
        
            'consignee_id' =>
                'nullable|exists:consignees,id',
        
            'consignee_name' =>
                'nullable|string|max:255',
        
        
            /*
            |--------------------------------------------------------------------------
            | DATOS DE FACTURA
            |--------------------------------------------------------------------------
            */
        
            'paps_number' =>
                'nullable|string|max:255',
        
            'fact_number' =>
                'nullable|string|max:255',
        
        
            /*
            |--------------------------------------------------------------------------
            | TRASLADO
            |--------------------------------------------------------------------------
            */
        
            'origin' =>
                'nullable|string|max:255',
        
            'destination' =>
                'nullable|string|max:255',
        
            'quantity' =>
                'nullable|integer|min:0',
        
            'quantity_type' =>
                'nullable|in:palets,contenedores,piezas',
        
        
            /*
            |--------------------------------------------------------------------------
            | NOTAS
            |--------------------------------------------------------------------------
            */
        
            'notes' =>
                'nullable|string',
        
        
            /*
            |--------------------------------------------------------------------------
            | IMAGEN
            |--------------------------------------------------------------------------
            */
        
            'image' =>
                'nullable|image|mimes:jpeg,png,jpg,webp|max:10240',
        
        
            /*
            |--------------------------------------------------------------------------
            | SERVICIOS
            |--------------------------------------------------------------------------
            */
        
            'services' =>
                'nullable|array',
        
            'services.*.id' =>
                'nullable|integer',
        
            'services.*.service_type_id' =>
                'required|exists:service_types,id',
        
            'services.*.quantity' =>
                'required|integer|min:1',
        
            'services.*.unit_price' =>
                'required|numeric|min:0',
        
            'services.*.notes' =>
                'nullable|string',
        ]);


        /*
        |--------------------------------------------------------------------------
        | IMAGEN
        |--------------------------------------------------------------------------
        */

        $imagePath = null;

        if ($request->hasFile('image')) {

            $imagePath = $request->file('image')->store(
                'records',
                'public'
            );
        }


        /*
        |--------------------------------------------------------------------------
        | CREAR REGISTRO Y ENTIDADES NUEVAS
        |--------------------------------------------------------------------------
        */

        $record = DB::transaction(function () use (
            $validated,
            $imagePath
        ) {

            /*
            |--------------------------------------------------------------------------
            | COMPANY
            |--------------------------------------------------------------------------
            */

            /*
|--------------------------------------------------------------------------
| COMPANY
|--------------------------------------------------------------------------
*/

$companyId = $validated['company_id'] ?? null;

$companyName = trim(
    $validated['company_name'] ?? ''
);

if (!$companyId && $companyName !== '') {

    $company = Company::whereRaw(
        'LOWER(name) = ?',
        [mb_strtolower($companyName)]
    )->first();

    if (!$company) {

        $company = Company::create([
            'name' => $companyName,
            'active' => true,
        ]);
    }

    $companyId = $company->id;
}


/*
|--------------------------------------------------------------------------
| DRIVER
|--------------------------------------------------------------------------
*/

$driverId = $validated['driver_id'] ?? null;

$driverName = trim(
    $validated['driver_name'] ?? ''
);

if (!$driverId && $driverName !== '') {

    $driver = Driver::whereRaw(
        'LOWER(name) = ?',
        [mb_strtolower($driverName)]
    )->first();

    if (!$driver) {

        $driver = Driver::create([
            'name' => $driverName,
            'active' => true,
        ]);
    }

    $driverId = $driver->id;
}


/*
|--------------------------------------------------------------------------
| TRAILER
|--------------------------------------------------------------------------
*/

$trailerId = $validated['trailer_id'] ?? null;

$trailerNumber = trim(
    $validated['trailer_number'] ?? ''
);

if (!$trailerId && $trailerNumber !== '') {

    $trailer = Trailer::whereRaw(
        'LOWER(number) = ?',
        [mb_strtolower($trailerNumber)]
    )->first();

    if (!$trailer) {

        $trailer = Trailer::create([
            'number' => $trailerNumber,
            'active' => true,
        ]);
    }

    $trailerId = $trailer->id;
}


/*
|--------------------------------------------------------------------------
| BROKER
|--------------------------------------------------------------------------
*/

$brokerId = $validated['broker_id'] ?? null;

$brokerName = trim(
    $validated['broker_name'] ?? ''
);

if (!$brokerId && $brokerName !== '') {

    $broker = Broker::whereRaw(
        'LOWER(name) = ?',
        [mb_strtolower($brokerName)]
    )->first();

    if (!$broker) {

        $broker = Broker::create([
            'name' => $brokerName,
            'active' => true,
        ]);
    }

    $brokerId = $broker->id;
}


/*
|--------------------------------------------------------------------------
| SHIPPER
|--------------------------------------------------------------------------
*/

$shipperId = $validated['shipper_id'] ?? null;

$shipperName = trim(
    $validated['shipper_name'] ?? ''
);

if (!$shipperId && $shipperName !== '') {

    $shipper = Shipper::whereRaw(
        'LOWER(name) = ?',
        [mb_strtolower($shipperName)]
    )->first();

    if (!$shipper) {

        $shipper = Shipper::create([
            'name' => $shipperName,
            'active' => true,
        ]);
    }

    $shipperId = $shipper->id;
}


/*
|--------------------------------------------------------------------------
| CONSIGNEE
|--------------------------------------------------------------------------
*/

$consigneeId = $validated['consignee_id'] ?? null;

$consigneeName = trim(
    $validated['consignee_name'] ?? ''
);

if (!$consigneeId && $consigneeName !== '') {

    $consignee = Consignee::whereRaw(
        'LOWER(name) = ?',
        [mb_strtolower($consigneeName)]
    )->first();

    if (!$consignee) {

        $consignee = Consignee::create([
            'name' => $consigneeName,
            'active' => true,
        ]);
    }

    $consigneeId = $consignee->id;
}


            /*
            |--------------------------------------------------------------------------
            | CREAR RECORD
            |--------------------------------------------------------------------------
            |
            | IMPORTANTE:
            | No asignamos manualmente el ID.
            | PostgreSQL lo genera automáticamente.
            |
            */

            $record = Record::create([

                'date' =>
                    $validated['date'],

                'company_id' =>
                    $companyId,

                'driver_id' =>
                    $driverId,

                'trailer_id' =>
                    $trailerId,

                'broker_id' =>
                    $brokerId,

                'shipper_id' =>
                    $shipperId,

                'consignee_id' =>
                    $consigneeId,

                'invoice_number' =>
                    $validated['invoice_number'],

                'paps_number' =>
                    $validated['paps_number'] ?? null,

                'fact_number' =>
                    $validated['fact_number'] ?? null,

                'origin' =>
                    $validated['origin'] ?? null,

                'destination' =>
                    $validated['destination'] ?? null,

                'quantity' =>
                    $validated['quantity'] ?? null,

                'quantity_type' =>
                    $validated['quantity_type'] ?? null,

                'notes' =>
                    $validated['notes'] ?? null,

                'image' =>
                    $imagePath,

                'registered_by' =>
                    auth()->id(),
            ]);


            return $record;
        });


        /*
        |--------------------------------------------------------------------------
        | REDIRECCIÓN
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route('records.index')
            ->with(
                'success',
                'Registro creado correctamente.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | ACTUALIZAR
    |--------------------------------------------------------------------------
    */

    /*
|--------------------------------------------------------------------------
| ACTUALIZAR
|--------------------------------------------------------------------------
*/

public function update(Request $request, Record $record)
{
    if (!auth()->check()) {
        abort(403);
    }

    /*
    |--------------------------------------------------------------------------
    | VALIDACIÓN
    |--------------------------------------------------------------------------
    */

    $validated = $request->validate([

        'date' =>
            'required|date',

        'invoice_number' =>
            'required|string|max:255',

        /*
        |--------------------------------------------------------------------------
        | COMPANY
        |--------------------------------------------------------------------------
        */

        'company_id' =>
            'nullable|exists:companies,id',

        'company_name' =>
            'nullable|string|max:255',

        /*
        |--------------------------------------------------------------------------
        | DRIVER
        |--------------------------------------------------------------------------
        */

        'driver_id' =>
            'nullable|exists:drivers,id',

        'driver_name' =>
            'nullable|string|max:255',

        /*
        |--------------------------------------------------------------------------
        | TRAILER
        |--------------------------------------------------------------------------
        */

        'trailer_id' =>
            'nullable|exists:trailers,id',

        'trailer_number' =>
            'nullable|string|max:255',

        /*
        |--------------------------------------------------------------------------
        | BROKER
        |--------------------------------------------------------------------------
        */

        'broker_id' =>
            'nullable|exists:brokers,id',

        'broker_name' =>
            'nullable|string|max:255',

        /*
        |--------------------------------------------------------------------------
        | SHIPPER
        |--------------------------------------------------------------------------
        */

        'shipper_id' =>
            'nullable|exists:shippers,id',

        'shipper_name' =>
            'nullable|string|max:255',

        /*
        |--------------------------------------------------------------------------
        | CONSIGNEE
        |--------------------------------------------------------------------------
        */

        'consignee_id' =>
            'nullable|exists:consignees,id',

        'consignee_name' =>
            'nullable|string|max:255',

        /*
        |--------------------------------------------------------------------------
        | FACTURA
        |--------------------------------------------------------------------------
        */

        'paps_number' =>
            'nullable|string|max:255',

        'fact_number' =>
            'nullable|string|max:255',

        /*
        |--------------------------------------------------------------------------
        | TRASLADO
        |--------------------------------------------------------------------------
        */

        'origin' =>
            'nullable|string|max:255',

        'destination' =>
            'nullable|string|max:255',

        'quantity' =>
            'nullable|integer|min:0',

        'quantity_type' =>
            'nullable|in:palets,contenedores,piezas',

        /*
        |--------------------------------------------------------------------------
        | NOTAS
        |--------------------------------------------------------------------------
        */

        'notes' =>
            'nullable|string',

        /*
        |--------------------------------------------------------------------------
        | IMAGEN
        |--------------------------------------------------------------------------
        */

        'image' =>
            'nullable|image|mimes:jpeg,png,jpg,webp|max:10240',

        /*
        |--------------------------------------------------------------------------
        | SERVICIOS
        |--------------------------------------------------------------------------
        */

        'services' =>
            'nullable|array',

        'services.*.id' =>
            'nullable|integer',

        'services.*.service_type_id' =>
            'required|exists:service_types,id',

        'services.*.quantity' =>
            'required|integer|min:1',

        'services.*.unit_price' =>
            'required|numeric|min:0',

        'services.*.notes' =>
            'nullable|string',
    ]);


    /*
    |--------------------------------------------------------------------------
    | RESOLVER PARTICIPANTES
    |--------------------------------------------------------------------------
    |
    | Si viene un ID, usamos ese registro.
    |
    | Si no viene ID pero viene un nombre escrito:
    | - buscamos coincidencia ignorando mayúsculas/minúsculas
    | - si existe, reutilizamos
    | - si no existe, creamos uno nuevo
    |
    */

    $companyId = $validated['company_id'] ?? null;

    $companyName = trim(
        $validated['company_name'] ?? ''
    );

    if (!$companyId && $companyName !== '') {

        $company = Company::whereRaw(
            'LOWER(name) = ?',
            [mb_strtolower($companyName)]
        )->first();

        if (!$company) {

            $company = Company::create([
                'name' => $companyName,
                'active' => true,
            ]);
        }

        $companyId = $company->id;
    }


    /*
    |--------------------------------------------------------------------------
    | DRIVER
    |--------------------------------------------------------------------------
    */

    $driverId = $validated['driver_id'] ?? null;

    $driverName = trim(
        $validated['driver_name'] ?? ''
    );

    if (!$driverId && $driverName !== '') {

        $driver = Driver::whereRaw(
            'LOWER(name) = ?',
            [mb_strtolower($driverName)]
        )->first();

        if (!$driver) {

            $driver = Driver::create([
                'name' => $driverName,
                'active' => true,
            ]);
        }

        $driverId = $driver->id;
    }


    /*
    |--------------------------------------------------------------------------
    | TRAILER
    |--------------------------------------------------------------------------
    */

    $trailerId = $validated['trailer_id'] ?? null;

    $trailerNumber = trim(
        $validated['trailer_number'] ?? ''
    );

    if (!$trailerId && $trailerNumber !== '') {

        $trailer = Trailer::whereRaw(
            'LOWER(number) = ?',
            [mb_strtolower($trailerNumber)]
        )->first();

        if (!$trailer) {

            $trailer = Trailer::create([
                'number' => $trailerNumber,
                'active' => true,
            ]);
        }

        $trailerId = $trailer->id;
    }


    /*
    |--------------------------------------------------------------------------
    | BROKER
    |--------------------------------------------------------------------------
    */

    $brokerId = $validated['broker_id'] ?? null;

    $brokerName = trim(
        $validated['broker_name'] ?? ''
    );

    if (!$brokerId && $brokerName !== '') {

        $broker = Broker::whereRaw(
            'LOWER(name) = ?',
            [mb_strtolower($brokerName)]
        )->first();

        if (!$broker) {

            $broker = Broker::create([
                'name' => $brokerName,
                'active' => true,
            ]);
        }

        $brokerId = $broker->id;
    }


    /*
    |--------------------------------------------------------------------------
    | SHIPPER
    |--------------------------------------------------------------------------
    */

    $shipperId = $validated['shipper_id'] ?? null;

    $shipperName = trim(
        $validated['shipper_name'] ?? ''
    );

    if (!$shipperId && $shipperName !== '') {

        $shipper = Shipper::whereRaw(
            'LOWER(name) = ?',
            [mb_strtolower($shipperName)]
        )->first();

        if (!$shipper) {

            $shipper = Shipper::create([
                'name' => $shipperName,
                'active' => true,
            ]);
        }

        $shipperId = $shipper->id;
    }


    /*
    |--------------------------------------------------------------------------
    | CONSIGNEE
    |--------------------------------------------------------------------------
    */

    $consigneeId = $validated['consignee_id'] ?? null;

    $consigneeName = trim(
        $validated['consignee_name'] ?? ''
    );

    if (!$consigneeId && $consigneeName !== '') {

        $consignee = Consignee::whereRaw(
            'LOWER(name) = ?',
            [mb_strtolower($consigneeName)]
        )->first();

        if (!$consignee) {

            $consignee = Consignee::create([
                'name' => $consigneeName,
                'active' => true,
            ]);
        }

        $consigneeId = $consignee->id;
    }


    /*
    |--------------------------------------------------------------------------
    | ACTUALIZAR REGISTRO + SERVICIOS
    |--------------------------------------------------------------------------
    */

    DB::transaction(function () use (
        $request,
        $record,
        $validated,
        $companyId,
        $driverId,
        $trailerId,
        $brokerId,
        $shipperId,
        $consigneeId
    ) {

        /*
        |--------------------------------------------------------------------------
        | DATOS DEL REGISTRO
        |--------------------------------------------------------------------------
        */

        $data = [

            'date' =>
                $validated['date'],

            'invoice_number' =>
                $validated['invoice_number'],

            'company_id' =>
                $companyId,

            'driver_id' =>
                $driverId,

            'trailer_id' =>
                $trailerId,

            'broker_id' =>
                $brokerId,

            'shipper_id' =>
                $shipperId,

            'consignee_id' =>
                $consigneeId,

            'paps_number' =>
                $validated['paps_number'] ?? null,

            'fact_number' =>
                $validated['fact_number'] ?? null,

            'origin' =>
                $validated['origin'] ?? null,

            'destination' =>
                $validated['destination'] ?? null,

            'quantity' =>
                $validated['quantity'] ?? null,

            'quantity_type' =>
                $validated['quantity_type'] ?? null,

            'notes' =>
                $validated['notes'] ?? null,
        ];


        /*
        |--------------------------------------------------------------------------
        | IMAGEN
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('image')) {

            if (
                $record->image &&
                Storage::disk('public')->exists(
                    $record->image
                )
            ) {

                Storage::disk('public')->delete(
                    $record->image
                );
            }

            $data['image'] =
                $request->file('image')->store(
                    'records',
                    'public'
                );
        }


        /*
        |--------------------------------------------------------------------------
        | GUARDAR REGISTRO
        |--------------------------------------------------------------------------
        */

        $record->update($data);


        /*
        |--------------------------------------------------------------------------
        | SERVICIOS
        |--------------------------------------------------------------------------
        */

        if (
            auth()->user()->role === 'admin'
        ) {

            $submittedServices =
                $validated['services'] ?? [];


            /*
            |------------------------------------------------------------------
            | IDS DE SERVICIOS ENVIADOS
            |------------------------------------------------------------------
            */

            $submittedIds = collect(
                $submittedServices
            )
                ->pluck('id')
                ->filter()
                ->map(
                    fn ($id) => (int) $id
                )
                ->values()
                ->all();


            /*
            |------------------------------------------------------------------
            | ELIMINAR SERVICIOS QUE YA NO EXISTEN
            |------------------------------------------------------------------
            */

            if (count($submittedIds) > 0) {

                $record->services()
                    ->whereNotIn(
                        'id',
                        $submittedIds
                    )
                    ->delete();

            } else {

                $record->services()->delete();
            }


            /*
            |------------------------------------------------------------------
            | ACTUALIZAR / CREAR SERVICIOS
            |------------------------------------------------------------------
            */

            foreach (
                $submittedServices
                as $serviceData
            ) {

                $quantity =
                    (int) $serviceData['quantity'];

                $unitPrice =
                    (float) $serviceData['unit_price'];

                $subtotal =
                    $quantity * $unitPrice;


                /*
                |--------------------------------------------------------------
                | SERVICIO EXISTENTE
                |--------------------------------------------------------------
                */

                if (
                    !empty($serviceData['id'])
                ) {

                    $service =
                        $record->services()
                            ->where(
                                'id',
                                $serviceData['id']
                            )
                            ->first();


                    if (!$service) {
                        continue;
                    }


                    $service->update([

                        'service_type_id' =>
                            $serviceData[
                                'service_type_id'
                            ],

                        'quantity' =>
                            $quantity,

                        'unit_price' =>
                            $unitPrice,

                        'subtotal' =>
                            $subtotal,

                        'notes' =>
                            $serviceData['notes']
                            ?? null,
                    ]);

                }

                /*
                |--------------------------------------------------------------
                | SERVICIO NUEVO
                |--------------------------------------------------------------
                */

                else {

                    $record->services()->create([

                        'service_type_id' =>
                            $serviceData[
                                'service_type_id'
                            ],

                        'quantity' =>
                            $quantity,

                        'unit_price' =>
                            $unitPrice,

                        'subtotal' =>
                            $subtotal,

                        'notes' =>
                            $serviceData['notes']
                            ?? null,
                    ]);
                }
            }
        }
    });


    /*
    |--------------------------------------------------------------------------
    | REDIRECCIÓN
    |--------------------------------------------------------------------------
    */

    return redirect()
        ->route('records.index')
        ->with(
            'success',
            'Registro actualizado correctamente.'
        );
}


    /*
    |--------------------------------------------------------------------------
    | AGREGAR SERVICIO
    |--------------------------------------------------------------------------
    */

public function addService(
    Request $request,
    Record $record
) {
    if (
        !auth()->check() ||
        auth()->user()->role !== 'admin'
    ) {
        abort(
            403,
            'No tienes permiso para agregar servicios.'
        );
    }


    $validated = $request->validate([

        'service_type_id' => [
            'required',
            'exists:service_types,id',
        ],

        'notes' => [
            'nullable',
            'string',
        ],
    ]);


    $serviceType = ServiceType::where(
        'id',
        $validated['service_type_id']
    )
        ->where('active', true)
        ->firstOrFail();


    $unitPrice = (float) $serviceType->price;


    $record->services()->create([

        'service_type_id' =>
            $serviceType->id,

        'quantity' =>
            1,

        'unit_price' =>
            $unitPrice,

        'subtotal' =>
            $unitPrice,

        'notes' =>
            $validated['notes'] ?? null,
    ]);


    return back()->with(
        'success',
        'Servicio agregado correctamente.'
    );
}
}