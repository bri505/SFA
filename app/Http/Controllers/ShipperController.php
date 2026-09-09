<?php

namespace App\Http\Controllers;

use App\Models\Shipper;
use Illuminate\Http\Request;

class ShipperController extends Controller
{
    public function index()
    {
        $shippers = Shipper::orderBy('name')->get();

        return view('shippers.index', compact('shippers'));
    }

    public function create()
    {
        return view('shippers.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
            ],
        ]);

        $validated['active'] = true;

        Shipper::create($validated);

        return redirect()
            ->route('shippers.index')
            ->with('success', 'Shipper creado correctamente.');
    }

    public function edit(Shipper $shipper)
    {
        return view('shippers.edit', compact('shipper'));
    }

    public function update(Request $request, Shipper $shipper)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
            ],
            'active' => [
                'required',
                'boolean',
            ],
        ]);

        $shipper->update($validated);

        return redirect()
            ->route('shippers.index')
            ->with('success', 'Shipper actualizado correctamente.');
    }
}