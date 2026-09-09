<?php

namespace App\Http\Controllers;

use App\Models\Trailer;
use Illuminate\Http\Request;

class TrailerController extends Controller
{
    public function index()
    {
        $trailers = Trailer::orderBy('number')->get();

        return view('trailers.index', compact('trailers'));
    }

    public function create()
    {
        return view('trailers.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'number' => [
                'required',
                'string',
                'max:50',
                'unique:trailers,number',
            ],
        ]);

        $validated['active'] = true;

        Trailer::create($validated);

        return redirect()
            ->route('trailers.index')
            ->with('success', 'Trailer creado correctamente.');
    }

    public function edit(Trailer $trailer)
    {
        return view('trailers.edit', compact('trailer'));
    }

    public function update(Request $request, Trailer $trailer)
    {
        $validated = $request->validate([
            'number' => [
                'required',
                'string',
                'max:50',
                'unique:trailers,number,' . $trailer->id,
            ],
            'active' => [
                'required',
                'boolean',
            ],
        ]);

        $trailer->update($validated);

        return redirect()
            ->route('trailers.index')
            ->with('success', 'Trailer actualizado correctamente.');
    }
}