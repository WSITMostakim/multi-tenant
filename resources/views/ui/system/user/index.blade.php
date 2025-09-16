@extends('layout.system.app')
@section('title', 'Users')
@section('content')
    <div class="max-w-5xl mx-auto">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-3xl font-extrabold text-gray-800">Users</h2>
            <a href="{{ route('users.create') }}" class="bg-blue-600 text-white px-5 py-2 rounded-lg shadow hover:bg-blue-700 transition">Add User</a>
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
                        <th class="py-3 px-4 text-left font-semibold text-gray-600">Email</th>
                        <th class="py-3 px-4 text-left font-semibold text-gray-600">Roles</th>
                        <th class="py-3 px-4 text-left font-semibold text-gray-600">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                        <tr class="hover:bg-blue-50 transition">
                            <td class="py-3 px-4 border-b">{{ $user->name }}</td>
                            <td class="py-3 px-4 border-b">{{ $user->email }}</td>
                            <td class="py-3 px-4 border-b">
                                @foreach($user->roles as $role)
                                    <span class="inline-block bg-blue-100 text-blue-700 px-2 py-1 rounded text-xs font-semibold mr-1">{{ $role->name }}</span>
                                @endforeach
                            </td>
                            <td class="py-3 px-4 border-b">
                                <a href="{{ route('users.show', $user) }}" class="inline-block text-gray-700 hover:text-blue-800 font-semibold mr-3">View</a>
                                <a href="{{ route('users.edit', $user) }}" class="inline-block text-blue-600 hover:text-blue-800 font-semibold mr-3">Edit</a>
                                <form action="{{ route('users.destroy', $user) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="inline-block text-red-600 hover:text-red-800 font-semibold" onclick="return confirm('Delete this user?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="py-6 text-center text-gray-500">No users found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-6">{{ $users->links() }}</div>
    </div>
@endsection
