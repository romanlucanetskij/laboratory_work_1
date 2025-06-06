<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Клієнт</h2>
    </x-slot>

    <div class="py-12">
        <p>Ім'я: {{ $client->name }}</p>
        <p>Email: {{ $client->email }}</p>
        <p>Телефон: {{ $client->phone }}</p>
    </div>
</x-app-layout>
