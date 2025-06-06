<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Редагувати клієнта</h2>
    </x-slot>

    <div class="py-12">
        <form action="{{ route('clients.update', $client) }}" method="POST" class="max-w-md">
            @csrf
            @method('PUT')
            <div>
                <label>Ім'я</label>
                <input type="text" name="name" value="{{ $client->name }}" required>
            </div>
            <div>
                <label>Email</label>
                <input type="email" name="email" value="{{ $client->email }}" required>
            </div>
            <div>
                <label>Телефон</label>
                <input type="text" name="phone" value="{{ $client->phone }}">
            </div>
            <button type="submit">Оновити</button>
        </form>
    </div>
</x-app-layout>
