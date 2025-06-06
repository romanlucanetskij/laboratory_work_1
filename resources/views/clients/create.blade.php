@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-4">Додати клієнта</h1>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('clients.store') }}" method="POST" class="max-w-lg">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-gray-700 font-bold mb-2">Ім'я</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" required class="w-full border border-gray-300 rounded px-3 py-2">
        </div>

        <div class="mb-4">
            <label for="email" class="block text-gray-700 font-bold mb-2">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" required class="w-full border border-gray-300 rounded px-3 py-2">
        </div>

        <div class="mb-4">
            <label for="phone" class="block text-gray-700 font-bold mb-2">Телефон</label>
            <input type="text" name="phone" id="phone" value="{{ old('phone') }}" class="w-full border border-gray-300 rounded px-3 py-2">
        </div>

        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Додати
        </button>
    </form>
</div>
@endsection
