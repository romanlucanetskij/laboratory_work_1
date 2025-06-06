@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-4">Деталі клієнта</h1>

    <div class="mb-4">
        <strong>ID:</strong> {{ $client->id }}
    </div>
    <div class="mb-4">
        <strong>Ім'я:</strong> {{ $client->name }}
    </div>
    <div class="mb-4">
        <strong>Email:</strong> {{ $client->email }}
    </div>
    <div class="mb-4">
        <strong>Телефон:</strong> {{ $client->phone ?? 'Немає' }}
    </div>

    <a href="{{ route('clients.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
        Назад до списку
    </a>
</div>
@endsection
