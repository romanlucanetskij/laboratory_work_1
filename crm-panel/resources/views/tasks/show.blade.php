<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Задача</h2>
    </x-slot>

    <div class="py-12">
        <p>Назва: {{ $task->title }}</p>
        <p>Опис: {{ $task->description }}</p>
        <p>Статус: {{ $task->status }}</p>
    </div>
</x-app-layout>
