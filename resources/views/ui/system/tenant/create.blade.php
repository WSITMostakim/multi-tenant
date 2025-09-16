@extends('layout.system.app')
@section('title', 'Add Tenant')
@section('content')
    <div class="max-w-xl mx-auto bg-white rounded-lg shadow p-8 mt-8">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-3xl font-extrabold text-gray-800">Add Tenant</h2>
            <a href="{{ route('tenants.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-100 text-gray-700 rounded hover:bg-gray-200 border border-gray-300 transition">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" /></svg>
                Back
            </a>
        </div>
        @if(session('error'))
            <div class="mb-4 p-3 bg-red-100 text-red-800 rounded shadow flex items-center justify-between">
                <span>{{ session('error') }}</span>
                <button type="button" onclick="this.parentElement.style.display='none'" class="ml-4 text-red-700 hover:text-red-900 text-xl font-bold leading-none">&times;</button>
            </div>
        @endif
        <form action="{{ route('tenants.store') }}" method="POST" class="space-y-5">
            @csrf
            <div>
                <label class="block font-semibold mb-1">Tenant ID</label>
                <input type="text" name="id" value="{{ old('id') }}" class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-blue-200 focus:border-blue-400" required>
            </div>
            <div>
                <label class="block font-semibold mb-1">Name</label>
                <input type="text" name="name" value="{{ old('name') }}" class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-blue-200 focus:border-blue-400" required>
            </div>
            <div>
                <label class="block font-semibold mb-1">Domain</label>
                <input type="text" name="domain" value="{{ old('domain') }}" class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-blue-200 focus:border-blue-400" required placeholder="tenant1.example.com">
            </div>
            <div>
                <label class="block font-semibold mb-1">Plan</label>
                <select name="plan_id" class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-blue-200 focus:border-blue-400" required>
                    <option value="">Select a plan</option>
                    @foreach(\App\Models\Plan::where('is_active', true)->get() as $plan)
                        <option value="{{ $plan->id }}" @if(old('plan_id') == $plan->id) selected @endif>{{ $plan->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="w-full bg-blue-600 text-white px-4 py-2 rounded-lg font-semibold hover:bg-blue-700 transition">Save Tenant</button>
        </form>
    </div>
@endsection
