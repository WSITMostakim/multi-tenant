@extends('layout.system.app')
@section('title', 'Edit Plan')
@section('content')
    <div class="max-w-xl mx-auto bg-white rounded-lg shadow p-8 mt-8">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-3xl font-extrabold text-gray-800">Edit Plan</h2>
            <a href="{{ route('plans.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-100 text-gray-700 rounded hover:bg-gray-200 border border-gray-300 transition">
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
        <form action="{{ route('plans.update', $plan) }}" method="POST" class="space-y-5">
            @csrf
            @method('PUT')
            <div>
                <label class="block font-semibold mb-1">Name</label>
                <input type="text" name="name" value="{{ old('name', $plan->name) }}" class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-blue-200 focus:border-blue-400" required>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block font-semibold mb-1">Price</label>
                    <input type="number" name="price" step="0.01" value="{{ old('price', $plan->price) }}" class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-blue-200 focus:border-blue-400" required>
                </div>
                <div>
                    <label class="block font-semibold mb-1">Interval</label>
                    <select name="interval" class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-blue-200 focus:border-blue-400">
                        <option value="monthly" @if($plan->interval=='monthly') selected @endif>Monthly</option>
                        <option value="yearly" @if($plan->interval=='yearly') selected @endif>Yearly</option>
                    </select>
                </div>
            </div>
            <div>
                <label class="block font-semibold mb-1">Description</label>
                <textarea name="description" class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-blue-200 focus:border-blue-400">{{ old('description', $plan->description) }}</textarea>
            </div>
            <div>
                <label class="block font-semibold mb-1">Features <span class="text-xs text-gray-400">(comma separated)</span></label>
                <input type="text" name="features" value="{{ old('features', is_array($plan->features) ? implode(',', $plan->features) : $plan->features) }}" class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-blue-200 focus:border-blue-400">
            </div>
            <div class="flex items-center space-x-3">
                <label class="relative inline-flex items-center cursor-pointer">
                    <input type="checkbox" name="is_active" value="1" class="sr-only peer" @if($plan->is_active) checked @endif>
                    <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-blue-300 rounded-full peer peer-checked:bg-blue-600 transition-all duration-200"></div>
                    <div class="absolute left-1 top-1 bg-white w-4 h-4 rounded-full shadow peer-checked:translate-x-5 transition-transform duration-200"></div>
                </label>
                <span class="font-medium text-gray-700">Active</span>
            </div>
            <button type="submit" class="w-full bg-blue-600 text-white px-4 py-2 rounded-lg font-semibold hover:bg-blue-700 transition">Update Plan</button>
        </form>
    </div>
@endsection
