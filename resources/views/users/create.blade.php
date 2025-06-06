@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-4">Create User</h1>

    <form action="{{ route('users.store') }}" method="POST" class="max-w-lg">
        @csrf

        <div class="mb-4">
            <label for="name" class="block font-medium mb-1">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" required class="w-full border border-gray-300 rounded px-3 py-2">
            @error('name')
                <p class="text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="email" class="block font-medium mb-1">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" required class="w-full border border-gray-300 rounded px-3 py-2">
            @error('email')
                <p class="text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="role" class="block font-medium mb-1">Role</label>
            <select name="role" id="role" required class="w-full border border-gray-300 rounded px-3 py-2">
                @foreach($roles as $role)
                    <option value="{{ $role }}" {{ old('role') == $role ? 'selected' : '' }}>{{ ucfirst($role) }}</option>
                @endforeach
            </select>
            @error('role')
                <p class="text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="password" class="block font-medium mb-1">Password</label>
            <input type="password" name="password" id="password" required class="w-full border border-gray-300 rounded px-3 py-2">
            @error('password')
                <p class="text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="password_confirmation" class="block font-medium mb-1">Confirm Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" required class="w-full border border-gray-300 rounded px-3 py-2">
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Create User</button>
    </form>
</div>
@endsection
