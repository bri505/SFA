<?php

namespace App\Http\Controllers;

use App\Models\AppSetting;
use App\Models\ServiceType;
use Illuminate\Http\Request;

class ServiceTypeController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | LISTADO DE SERVICIOS
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $services = ServiceType::orderBy('id')->get();

        $ivaSetting = AppSetting::where(
            'key',
            'iva_general'
        )->first();

        $ivaGeneral = $ivaSetting
            ? (float) $ivaSetting->value
            : 0;

        return view(
            'service-types.index',
            compact(
                'services',
                'ivaGeneral'
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | GUARDAR IVA GENERAL
    |--------------------------------------------------------------------------
    */

    public function saveIva(Request $request)
    {
        $validated = $request->validate([
            'iva_general' => [
                'required',
                'numeric',
                'min:0',
                'max:100',
            ],
        ]);

        AppSetting::updateOrCreate(
            [
                'key' => 'iva_general',
            ],
            [
                'value' => $validated['iva_general'],
            ]
        );

        return redirect()
            ->route('service-types.index')
            ->with(
                'success',
                'IVA general actualizado correctamente.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | CREAR SERVICIO
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'description' => [
                'nullable',
                'string',
                'max:500',
            ],

            'price' => [
                'required',
                'numeric',
                'min:0',
            ],

            'weight' => [
                'nullable',
                'numeric',
                'min:0',
            ],
        ]);

        ServiceType::create([
            'name' => $validated['name'],

            'description' =>
                $validated['description'] ?? null,

            'price' =>
                $validated['price'],

            /*
             * El checkbox envía 1 cuando está marcado
             * y no envía nada cuando está desmarcado.
             *
             * boolean() convierte ambos casos correctamente.
             */
            'tax_enabled' =>
                $request->boolean('tax_enabled'),

            'weight' =>
                $validated['weight'] ?? null,

            /*
             * Los servicios nuevos se crean activos.
             * El control Activo/Inactivo existente
             * seguirá funcionando desde la edición.
             */
            'active' => true,
        ]);

        return redirect()
            ->route('service-types.index')
            ->with(
                'success',
                'Servicio creado correctamente.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | ACTUALIZAR SERVICIO
    |--------------------------------------------------------------------------
    */

    public function update(
        Request $request,
        ServiceType $serviceType
    ) {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'description' => [
                'nullable',
                'string',
                'max:500',
            ],

            'price' => [
                'required',
                'numeric',
                'min:0',
            ],

            'active' => [
                'nullable',
                'boolean',
            ],

            'weight' => [
                'nullable',
                'numeric',
                'min:0',
            ],
        ]);

        /*
         * IMPORTANTE:
         *
         * tax_enabled NO necesita estar en $validated,
         * porque el checkbox puede no mandar ningún valor
         * cuando está desmarcado.
         *
         * boolean() convierte:
         *   checkbox marcado   -> true
         *   checkbox desmarcado -> false
         */
        $serviceType->update([
            'name' =>
                $validated['name'],

            'description' =>
                $validated['description'] ?? null,

            'price' =>
                $validated['price'],

            'tax_enabled' =>
                $request->boolean('tax_enabled'),

            'weight' =>
                $validated['weight'] ?? null,

            /*
             * Conservamos el control existente
             * Activo / Inactivo.
             */
            'active' =>
                $request->boolean('active'),
        ]);

        return redirect()
            ->route('service-types.index')
            ->with(
                'success',
                'Servicio actualizado correctamente.'
            );
    }
}
