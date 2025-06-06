<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Новий клієнт</h2>
    </x-slot>

    <div class="py-12">
        <form action="{{ route('clients.store') }}" method="POST" class="max-w-md">
            @csrf
            <div>
                <label>Ім'я</label>
                <input type="text" name="name" required>
            </div>
            <div>
                <label>Email</label>
                <input type="email" name="email" required>
            </div>
            <div>
                <label>Телефон</label>
                <input type="text" name="phone">
            </div>
            <button type="submit">Зберегти</button>
        </form>
    </div>
</x-app-layout>
