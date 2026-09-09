<?php

namespace App\Http\Controllers;

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

        return view('service-types.index', compact('services'));
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
            'name' =>
                $validated['name'],

            'description' =>
                $validated['description'] ?? null,

            'price' =>
                $validated['price'],

            'weight' => $validated['weight'] ?? null,

            'active' =>
                true,
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

    public function update(Request $request, ServiceType $serviceType)
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


        $serviceType->update([
            'name' =>
                $validated['name'],

            'description' =>
                $validated['description'] ?? null,

            'price' =>
                $validated['price'],
            'weight' => $validated['weight'] ?? null,

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