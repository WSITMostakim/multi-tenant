@extends('layout.tenant.app')
@section('title', 'Dashboard')
@section('content')
    <div class="flex flex-col items-center justify-center min-h-[60vh]">
        <h2 class="text-3xl font-semibold mb-6">Welcome to the {{ tenant('id') }} Dashboard</h2>
        <p class="text-gray-700">Here you can manage system-wide settings and users.</p>
    </div>
@endsection
