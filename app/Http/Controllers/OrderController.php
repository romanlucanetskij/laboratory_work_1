<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = auth()->user()->role === 'courier'
            ? Order::where('courier_id', auth()->id())->with(['client', 'courier'])->get()
            : Order::with(['client', 'courier'])->get();

        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        $clients = Client::all();
        $couriers = User::where('role', 'courier')->get();

        return view('orders.create', compact('clients', 'couriers'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'courier_id' => 'nullable|exists:users,id',
            'address' => 'required|string|max:255',
            'status' => 'required|in:нове,призначено,виконано',
        ]);

        Order::create($validated);

        return redirect()->route('orders.index')->with('success', 'Замовлення створено');
    }

    public function show(Order $order)
    {
        if (auth()->user()->role === 'courier' && $order->courier_id !== auth()->id()) {
            abort(403);
        }

        return view('orders.show', compact('order'));
    }

    public function edit(Order $order)
    {
        if (auth()->user()->role === 'courier' && $order->courier_id !== auth()->id()) {
            abort(403);
        }

        $clients = Client::all();
        $couriers = User::where('role', 'courier')->get();

        return view('orders.edit', compact('order', 'clients', 'couriers'));
    }

    public function update(Request $request, Order $order)
    {
        $validated = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'courier_id' => 'nullable|exists:users,id',
            'address' => 'required|string|max:255',
            'status' => 'required|in:нове,призначено,виконано',
        ]);

        $order->update($validated);

        return redirect()->route('orders.index')->with('success', 'Замовлення оновлено');
    }

    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()->route('orders.index')->with('success', 'Замовлення видалено');
    }
}
