<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;

use App\Models\Tenant;
use Illuminate\Http\Request;

class TenantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tenants = Tenant::all();
        return view('ui.system.tenant.index', compact('tenants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ui.system.tenant.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'id' => [
                    'required',
                    'string',
                    'unique:tenants,id',
                    'regex:/^[a-zA-Z][a-zA-Z0-9_-]*$/', // must start with a letter, no spaces
                ],
                'name' => 'required|string|max:255',
                'domain' => 'required|string',
                'plan_id' => 'required|exists:plans,id',
            ]);
            $tenant = Tenant::create([
                'id' => $data['id'],
                'name' => $data['name'],
            ]);
            $tenant->domains()->create(['domain' => $data['domain']]);
            $tenant->plans()->sync([$data['plan_id']]);
            return redirect()->route('tenants.index')->with('success', 'Tenant created successfully.');
        } catch (\Throwable $e) {
            return back()->withInput()->with('error', 'Failed to create tenant: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tenant = Tenant::findOrFail($id);
        return view('ui.system.tenant.show', compact('tenant'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tenant = Tenant::findOrFail($id);
        return view('ui.system.tenant.edit', compact('tenant'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $tenant = Tenant::findOrFail($id);
        try {
            $data = $request->validate([
                'name' => 'required|string|max:255',
                'domain' => 'required|string',
                'plan_id' => 'required|exists:plans,id',
            ]);
            $tenant->update(['name' => $data['name']]);
            // Update or create domain
            $tenant->domains()->updateOrCreate([], ['domain' => $data['domain']]);
            // Sync plan_tenant table
            $tenant->plans()->sync([$data['plan_id']]);
            return redirect()->route('tenants.index')->with('success', 'Tenant updated successfully.');
        } catch (\Throwable $e) {
            dd($e->getMessage());
            return back()->withInput()->with('error', 'Failed to update tenant: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tenant = Tenant::findOrFail($id);
        try {
            $tenant->delete();
            return redirect()->route('tenants.index')->with('success', 'Tenant deleted successfully.');
        } catch (\Throwable $e) {
            return back()->with('error', 'Failed to delete tenant: ' . $e->getMessage());
        }
    }
}
