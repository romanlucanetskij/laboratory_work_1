@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-4">User Details</h1>

    <div class="bg-white shadow rounded p-6">
        <p><strong>ID:</strong> {{ $user->id }}</p>
        <p><strong>Name:</strong> {{ $user->name }}</p>
        <p><strong>Email:</strong> {{ $user->email }}</p>
        <p><strong>Role:</strong> {{ ucfirst($user->role) }}</p>
        <p><strong>Created At:</strong> {{ $user->created_at->format('Y-m-d H:i') }}</p>
        <p><strong>Updated At:</strong> {{ $user->updated_at->format('Y-m-d H:i') }}</p>
    </div>

    <a href="{{ route('users.index') }}" class="mt-4 inline-block text-blue-600 hover:underline">Back to Users List</a>
</div>
@endsection
