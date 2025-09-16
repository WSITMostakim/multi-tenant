@extends('layout.system.app')
@section('title', 'User Details')
@section('content')
    <div class="max-w-xl mx-auto bg-white rounded-2xl shadow-lg p-10 mt-12 relative overflow-hidden">
        <div class="absolute -top-8 left-1/2 -translate-x-1/2">
            <div class="w-20 h-20 rounded-full bg-blue-100 flex items-center justify-center border-4 border-white shadow-lg">
                <svg class="w-12 h-12 text-blue-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A9 9 0 1112 21a8.963 8.963 0 01-6.879-3.196z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
            </div>
        </div>
        <div class="flex flex-col items-center mt-12 mb-8">
            <h2 class="text-2xl font-bold text-gray-800 mb-1">{{ $user->name }}</h2>
            <div class="text-gray-500 text-sm mb-2 flex items-center">
                <svg class="w-4 h-4 mr-1 text-blue-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16 12a4 4 0 01-8 0 4 4 0 018 0z" /><path stroke-linecap="round" stroke-linejoin="round" d="M12 14v7m0 0H9m3 0h3" /></svg>
                {{ $user->email }}
            </div>
            <div class="flex flex-wrap gap-2 mt-2">
                @foreach($user->roles as $role)
                    <span class="inline-block bg-gradient-to-r from-blue-500 to-blue-700 text-white px-3 py-1 rounded-full text-xs font-semibold shadow">{{ $role->name }}</span>
                @endforeach
            </div>
        </div>
        <div class="flex justify-between mt-8">
            <a href="{{ route('users.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 border border-gray-300 transition font-semibold">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" /></svg>
                Back
            </a>
            <a href="{{ route('users.edit', $user) }}" class="inline-block bg-blue-600 text-white px-5 py-2 rounded-lg font-semibold hover:bg-blue-700 transition shadow">Edit User</a>
        </div>
    </div>
@endsection
