<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Нова задача</h2>
    </x-slot>

    <div class="py-12">
        <form action="{{ route('tasks.store') }}" method="POST" class="max-w-md">
            @csrf
            <div>
                <label>Назва</label>
                <input type="text" name="title" required>
            </div>
            <div>
                <label>Опис</label>
                <textarea name="description"></textarea>
            </div>
            <div>
                <label>Клієнт</label>
                <select name="client_id" required>
                    @foreach($clients as $client)
                        <option value="{{ $client->id }}">{{ $client->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit">Створити</button>
        </form>
    </div>
</x-app-layout>
