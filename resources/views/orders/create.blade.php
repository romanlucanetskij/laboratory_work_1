@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-4">Додати замовлення</h1>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('orders.store') }}" method="POST" class="max-w-lg">
        @csrf

        <div class="mb-4">
            <label for="address" class="block text-gray-700 font-bold mb-2">Адреса</label>
            <input type="text" name="address" id="address" value="{{ old('address') }}" required class="w-full border border-gray-300 rounded px-3 py-2">
        </div>

        <div class="mb-4">
            <label for="product" class="block text-gray-700 font-bold mb-2">Продукт</label>
            <textarea name="product" id="product" class="w-full border border-gray-300 rounded px-3 py-2">{{ old('product') }}</textarea>
        </div>

        <div class="mb-4">
            <label for="client_id" class="block text-gray-700 font-bold mb-2">Клієнт</label>
            <select name="client_id" id="client_id" required class="w-full border border-gray-300 rounded px-3 py-2">
                <option value="">Оберіть клієнта</option>
                @foreach($clients as $client)
                    <option value="{{ $client->id }}" {{ old('client_id') == $client->id ? 'selected' : '' }}>{{ $client->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="courier_id" class="block text-gray-700 font-bold mb-2">Кур'єр</label>
            <select name="courier_id" id="courier_id" required class="w-full border border-gray-300 rounded px-3 py-2">
                <option value="">Оберіть кур'єра</option>
                @foreach($couriers as $courier)
                    <option value="{{ $courier->id }}" {{ old('courier_id') == $courier->id ? 'selected' : '' }}>{{ $courier->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="status" class="block text-gray-700 font-bold mb-2">Статус</label>
            <select name="status" id="status" required class="w-full border border-gray-300 rounded px-3 py-2">
                <option value="нове" {{ old('status') == 'нове' ? 'selected' : '' }}>нове</option>
                <option value="в процесі" {{ old('status') == 'в процесі' ? 'selected' : '' }}>в процесі</option>
                <option value="завершено" {{ old('status') == 'завершено' ? 'selected' : '' }}>завершено</option>
            </select>
        </div>

        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Додати
        </button>
    </form>
</div>
@endsection
