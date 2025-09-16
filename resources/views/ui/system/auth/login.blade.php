@extends('layout.system.app')
@section('title', 'Login')
@section('content')
    <div class="min-h-[70vh] flex items-center justify-center">
        <div class="w-full max-w-md bg-white rounded-2xl shadow-lg p-8">
            <div class="flex flex-col items-center mb-8">
                <div class="w-16 h-16 rounded-full bg-blue-100 flex items-center justify-center mb-3">
                    <svg class="w-10 h-10 text-blue-600" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M5.121 17.804A9 9 0 1112 21a8.963 8.963 0 01-6.879-3.196z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </div>
                <h2 class="text-2xl font-bold text-gray-800">Sign in to your account</h2>
                <p class="text-gray-500 text-sm mt-1">Welcome back! Please login to continue.</p>
            </div>
            @if (session('error'))
                <div class="mb-4 p-3 bg-red-100 text-red-800 rounded shadow flex items-center justify-between">
                    <span>{{ session('error') }}</span>
                    <button type="button" onclick="this.parentElement.style.display='none'"
                        class="ml-4 text-red-700 hover:text-red-900 text-xl font-bold leading-none">&times;</button>
                </div>
            @endif
            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf
                <div>
                    <label class="block font-semibold mb-1 text-gray-700">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" required autofocus
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-blue-200 focus:border-blue-400">
                </div>
                <div>
                    <label class="block font-semibold mb-1 text-gray-700">Password</label>
                    <input type="password" name="password" required
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-blue-200 focus:border-blue-400">
                </div>
                <div class="flex items-center justify-between">
                    <label class="inline-flex items-center">
                        <input type="checkbox" name="remember" class="form-checkbox text-blue-600">
                        <span class="ml-2 text-gray-600 text-sm">Remember me</span>
                    </label>
                    <a href="#" class="text-blue-600 hover:underline text-sm">Forgot password?</a>
                </div>
                <button type="submit"
                    class="w-full bg-blue-600 text-white px-4 py-2 rounded-lg font-semibold hover:bg-blue-700 transition">Sign
                    In</button>
            </form>
        </div>
    </div>
@endsection
