@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-4">Clients</h1>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('clients.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">
        Додати клієнта
    </a>

    <table class="min-w-full bg-white border border-gray-200">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b">ID</th>
                <th class="py-2 px-4 border-b">Ім'я</th>
                <th class="py-2 px-4 border-b">Email</th>
                <th class="py-2 px-4 border-b">Телефон</th>
                <th class="py-2 px-4 border-b">Дії</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clients as $client)
            <tr>
                <td class="py-2 px-4 border-b">{{ $client->id }}</td>
                <td class="py-2 px-4 border-b">{{ $client->name }}</td>
                <td class="py-2 px-4 border-b">{{ $client->email }}</td>
                <td class="py-2 px-4 border-b">{{ $client->phone }}</td>
                <td class="py-2 px-4 border-b">
                    <a href="{{ route('clients.show', $client->id) }}" class="text-blue-600 hover:underline mr-2">Переглянути</a>
                    <a href="{{ route('clients.edit', $client->id) }}" class="text-yellow-600 hover:underline mr-2">Редагувати</a>
                    <form action="{{ route('clients.destroy', $client->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Ви впевнені, що хочете видалити клієнта?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline">Видалити</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
