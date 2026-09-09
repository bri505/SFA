<?php

namespace App\Http\Controllers;

use App\Models\Consignee;
use Illuminate\Http\Request;

class ConsigneeController extends Controller
{
    public function index()
    {
        $consignees = Consignee::orderBy('name')->get();

        return view('consignees.index', compact('consignees'));
    }

    public function create()
    {
        return view('consignees.create');
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

        Consignee::create($validated);

        return redirect()
            ->route('consignees.index')
            ->with('success', 'Consignee creado correctamente.');
    }

    public function edit(Consignee $consignee)
    {
        return view('consignees.edit', compact('consignee'));
    }

    public function update(Request $request, Consignee $consignee)
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

        $consignee->update($validated);

        return redirect()
            ->route('consignees.index')
            ->with('success', 'Consignee actualizado correctamente.');
    }
}