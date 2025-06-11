@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-4">Замовлення</h1>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if(Auth::user()->role === 'admin')
        <a href="{{ route('orders.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">
            Додати замовлення
        </a>
    @endif

    <table class="min-w-full bg-white border border-gray-200">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b">ID</th>
                <th class="py-2 px-4 border-b">Адреса</th>
                <th class="py-2 px-4 border-b">Клієнт</th>
                <th class="py-2 px-4 border-b">Кур'єр</th>
                <th class="py-2 px-4 border-b">Статус</th>
                <th class="py-2 px-4 border-b">Дії</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr>
                <td class="py-2 px-4 border-b">{{ $order->id }}</td>
                <td class="py-2 px-4 border-b">{{ $order->address }}</td>
                <td class="py-2 px-4 border-b">{{ $order->client->name ?? 'Немає' }}</td>
                <td class="py-2 px-4 border-b">{{ $order->courier->name ?? 'Немає' }}</td>
                <td class="py-2 px-4 border-b">{{ $order->status }}</td>
                <td class="py-2 px-4 border-b">
                    <a href="{{ route('orders.show', $order->id) }}" class="text-blue-600 hover:underline mr-2">Переглянути</a>
                    @if(Auth::user()->role === 'admin' || (Auth::user()->role === 'courier' && $order->courier_id === Auth::user()->id))
                        <a href="{{ route('orders.edit', $order->id) }}" class="text-yellow-600 hover:underline mr-2">Редагувати</a>
                    @endif
                    @if(Auth::user()->role === 'admin')
                        <form action="{{ route('orders.destroy', $order->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Ви впевнені, що хочете видалити замовлення?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Видалити</button>
                        </form>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
