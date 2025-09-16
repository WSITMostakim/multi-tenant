<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function index()
    {
        $plans = Plan::all();
        return view('ui.system.plan.index', compact('plans'));
    }

    public function create()
    {
        return view('ui.system.plan.create');
    }

    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'name' => 'required|string|max:255',
                'price' => 'required|numeric|min:0',
                'interval' => 'required|string',
                'description' => 'nullable|string',
                'features' => 'nullable|array',
                'is_active' => 'boolean',
            ]);
            $data['features'] = $data['features'] ?? [];
            Plan::create($data);
            return redirect()->route('plans.index')->with('success', 'Plan created successfully.');
        } catch (\Throwable $e) {
            return back()->withInput()->with('error', 'Failed to create plan: ' . $e->getMessage());
        }
    }

    public function edit(Plan $plan)
    {
        return view('ui.system.plan.edit', compact('plan'));
    }

    public function update(Request $request, Plan $plan)
    {
        try {
            $data = $request->validate([
                'name' => 'required|string|max:255',
                'price' => 'required|numeric|min:0',
                'interval' => 'required|string',
                'description' => 'nullable|string',
                'features' => 'nullable|array',
                'is_active' => 'boolean',
            ]);
            $data['features'] = $data['features'] ?? [];
            $plan->update($data);
            return redirect()->route('plans.index')->with('success', 'Plan updated successfully.');
        } catch (\Throwable $e) {
            return back()->withInput()->with('error', 'Failed to update plan: ' . $e->getMessage());
        }
    }

    public function destroy(Plan $plan)
    {
        try {
            $plan->delete();
            return redirect()->route('plans.index')->with('success', 'Plan deleted successfully.');
        } catch (\Throwable $e) {
            return back()->with('error', 'Failed to delete plan: ' . $e->getMessage());
        }
    }
}
