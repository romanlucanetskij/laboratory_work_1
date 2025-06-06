@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-4">Деталі замовлення</h1>

    <div class="mb-4">
        <strong>ID:</strong> {{ $order->id }}
    </div>
    <div class="mb-4">
        <strong>Назва:</strong> {{ $order->title }}
    </div>
    <div class="mb-4">
        <strong>Опис:</strong> {{ $order->description ?? 'Немає' }}
    </div>
    <div class="mb-4">
        <strong>Клієнт:</strong> {{ $order->client->name ?? 'Немає' }}
    </div>
    <div class="mb-4">
        <strong>Кур'єр:</strong> {{ $order->courier->name ?? 'Немає' }}
    </div>
    <div class="mb-4">
        <strong>Статус:</strong> {{ $order->status }}
    </div>

    <a href="{{ route('orders.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
        Назад до списку
    </a>
</div>
@endsection
