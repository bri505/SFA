<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::with('emails')
            ->orderBy('name')
            ->get();

        return view('companies.index', compact('companies'));
    }

    public function create()
    {
        return view('companies.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'code' => ['nullable', 'string', 'max:50', 'unique:companies,code'],
            'tax_id' => ['nullable', 'string', 'max:50'],
            'colony' => ['nullable', 'string', 'max:150'],
            'address' => ['nullable', 'string', 'max:255'],
            'city' => ['nullable', 'string', 'max:100'],
            'state' => ['nullable', 'string', 'max:100'],
            'postal_code' => ['nullable', 'string', 'max:20'],
            'phone' => ['nullable', 'string', 'max:30'],
            'contact' => ['nullable', 'string', 'max:150'],

            'emails' => ['nullable', 'array'],
            'emails.*' => ['nullable', 'email', 'max:255'],
        ]);

        $emails = collect($validated['emails'] ?? [])
            ->map(fn ($email) => trim($email))
            ->filter()
            ->unique()
            ->values();

        unset($validated['emails']);

        $validated['active'] = true;

        DB::transaction(function () use ($validated, $emails) {

            $company = Company::create($validated);

            foreach ($emails as $email) {

                $company->emails()->create([
                    'email' => $email,
                ]);
            }
        });

        return redirect()
            ->route('companies.index')
            ->with('success', 'Cliente creado correctamente.');
    }

    public function storeFromRecord(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'code' => ['nullable', 'string', 'max:50', 'unique:companies,code'],
            'tax_id' => ['nullable', 'string', 'max:50'],
        ]);

        $validated['active'] = true;

        $company = Company::create($validated);

        return response()->json([
            'success' => true,
            'company' => [
                'id' => $company->id,
                'name' => $company->name,
                'code' => $company->code,
                'tax_id' => $company->tax_id,
            ],
        ]);
    }

    public function edit(Company $company)
    {
        $company->load('emails');

        return view('companies.edit', compact('company'));
    }

    public function update(Request $request, Company $company)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],

            'code' => [
                'nullable',
                'string',
                'max:50',
                'unique:companies,code,' . $company->id,
            ],

            'tax_id' => ['nullable', 'string', 'max:50'],
            'colony' => ['nullable', 'string', 'max:150'],
            'address' => ['nullable', 'string', 'max:255'],
            'city' => ['nullable', 'string', 'max:100'],
            'state' => ['nullable', 'string', 'max:100'],
            'postal_code' => ['nullable', 'string', 'max:20'],
            'phone' => ['nullable', 'string', 'max:30'],
            'contact' => ['nullable', 'string', 'max:150'],

            'emails' => ['nullable', 'array'],
            'emails.*' => ['nullable', 'email', 'max:255'],

            'active' => ['required', 'boolean'],
        ]);

        $emails = collect($validated['emails'] ?? [])
            ->map(fn ($email) => trim($email))
            ->filter()
            ->unique()
            ->values();

        unset($validated['emails']);

        DB::transaction(function () use ($company, $validated, $emails) {

            $company->update($validated);

            $company->emails()->delete();

            foreach ($emails as $email) {

                $company->emails()->create([
                    'email' => $email,
                ]);
            }
        });

        return redirect()
            ->route('companies.index')
            ->with('success', 'Cliente actualizado correctamente.');
    }
}