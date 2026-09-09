<?php

namespace App\Http\Controllers;

use App\Models\Broker;
use Illuminate\Http\Request;

class BrokerController extends Controller
{
    public function index()
    {
        $brokers = Broker::orderBy('name')->get();

        return view('brokers.index', compact('brokers'));
    }

    public function create()
    {
        return view('brokers.create');
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

        Broker::create($validated);

        return redirect()
            ->route('brokers.index')
            ->with('success', 'Broker creado correctamente.');
    }

    public function edit(Broker $broker)
    {
        return view('brokers.edit', compact('broker'));
    }

    public function update(Request $request, Broker $broker)
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

        $broker->update($validated);

        return redirect()
            ->route('brokers.index')
            ->with('success', 'Broker actualizado correctamente.');
    }
}