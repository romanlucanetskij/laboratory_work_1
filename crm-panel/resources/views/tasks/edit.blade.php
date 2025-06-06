<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Редагувати задачу</h2>
    </x-slot>

    <div class="py-12">
        <form action="{{ route('tasks.update', $task) }}" method="POST" class="max-w-md">
            @csrf
            @method('PUT')
            <div>
                <label>Назва</label>
                <input type="text" name="title" value="{{ $task->title }}" required>
            </div>
            <div>
                <label>Опис</label>
                <textarea name="description">{{ $task->description }}</textarea>
            </div>
            <div>
                <label>Клієнт</label>
                <select name="client_id" required>
                    @foreach($clients as $client)
                        <option value="{{ $client->id }}" @selected($task->client_id == $client->id)>{{ $client->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label>Статус</label>
                <select name="status">
                    <option value="нове" @selected($task->status=='нове')>нове</option>
                    <option value="в процесі" @selected($task->status=='в процесі')>в процесі</option>
                    <option value="завершено" @selected($task->status=='завершено')>завершено</option>
                </select>
            </div>
            <button type="submit">Оновити</button>
        </form>
    </div>
</x-app-layout>
