@extends('layouts.header')

@section('content')
<div class="container">
    <h1 class="text-2xl font-bold mb-4">All Users</h1>

    @if(session('success'))
        <div class="bg-green-100 p-3 text-green-700 mb-3">{{ session('success') }}</div>
    @endif

    <table class="table-auto w-full border-collapse border">
        <thead>
            <tr class="bg-gray-200">
                <th class="border p-2">ID</th>
                <th class="border p-2">Name</th>
                <th class="border p-2">Email</th>
                <th class="border p-2">Role</th>
                <th class="border p-2">Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td class="border p-2">{{ $user->id }}</td>
                <td class="border p-2">{{ $user->name }}</td>
                <td class="border p-2">{{ $user->email }}</td>
                <td class="border p-2">{{ $user->role }}</td>
                <td class="border p-2">
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Delete this user?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
