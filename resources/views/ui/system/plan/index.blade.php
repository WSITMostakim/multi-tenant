@extends('layout.system.app')
@section('title', 'Plans')
@section('content')
    <div class="max-w-5xl mx-auto">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-3xl font-extrabold text-gray-800">Plans</h2>
            <a href="{{ route('plans.create') }}" class="bg-blue-600 text-white px-5 py-2 rounded-lg shadow hover:bg-blue-700 transition">Add Plan</a>
        </div>
        @if(session('success'))
            <div id="success-alert" class="mb-4 p-3 bg-green-100 text-green-800 rounded shadow flex items-center justify-between">
                <span>{{ session('success') }}</span>
                <button type="button" onclick="document.getElementById('success-alert').style.display='none'" class="ml-4 text-green-700 hover:text-green-900 text-xl font-bold leading-none">&times;</button>
            </div>
        @endif
        <div class="overflow-x-auto rounded-lg shadow">
            <table class="min-w-full bg-white">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="py-3 px-4 text-left font-semibold text-gray-600">Name</th>
                        <th class="py-3 px-4 text-left font-semibold text-gray-600">Price</th>
                        <th class="py-3 px-4 text-left font-semibold text-gray-600">Interval</th>
                        <th class="py-3 px-4 text-left font-semibold text-gray-600">Active</th>
                        <th class="py-3 px-4 text-left font-semibold text-gray-600">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($plans as $plan)
                        <tr class="hover:bg-blue-50 transition">
                            <td class="py-3 px-4 border-b">
                                <span class="font-bold text-blue-700">{{ $plan->name }}</span>
                                <div class="text-xs text-gray-500">{{ $plan->description }}</div>
                            </td>
                            <td class="py-3 px-4 border-b">
                                <span class="inline-block bg-blue-100 text-blue-700 px-2 py-1 rounded text-sm font-semibold">${{ $plan->price }}</span>
                            </td>
                            <td class="py-3 px-4 border-b">
                                <span class="inline-block bg-gray-200 text-gray-700 px-2 py-1 rounded text-xs">{{ ucfirst($plan->interval) }}</span>
                            </td>
                            <td class="py-3 px-4 border-b">
                                @if($plan->is_active)
                                    <span class="inline-block bg-green-100 text-green-700 px-2 py-1 rounded text-xs">Active</span>
                                @else
                                    <span class="inline-block bg-red-100 text-red-700 px-2 py-1 rounded text-xs">Inactive</span>
                                @endif
                            </td>
                            <td class="py-3 px-4 border-b">
                                <a href="{{ route('plans.edit', $plan) }}" class="inline-block text-blue-600 hover:text-blue-800 font-semibold mr-3">Edit</a>
                                <form action="{{ route('plans.destroy', $plan) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="inline-block text-red-600 hover:text-red-800 font-semibold" onclick="return confirm('Delete this plan?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-6 text-center text-gray-500">No plans found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
