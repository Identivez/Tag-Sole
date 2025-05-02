<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use App\Models\Payment;
use App\Models\Address;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::with(['user','payment','shippingAddress','billingAddress'])->get();
        return view('orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Construye [UserId => "First Last"] para el dropdown
        $users = User::all()->mapWithKeys(function($u) {
            return [
                $u->UserId => "{$u->firstName} {$u->lastName}"
            ];
        });

        $payments  = Payment::pluck('PaymentId', 'PaymentId');
        $addresses = Address::pluck('AddressLine1', 'AddressId');

        return view('orders.create', compact('users','payments','addresses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'UserId'             => 'required|exists:users,UserId',
            'OrderDate'          => 'nullable|date',
            'TotalAmount'        => 'nullable|numeric|min:0',
            'OrderStatus'        => 'nullable|string|max:20',
            'PaymentId'          => 'nullable|exists:payments,PaymentId',
            'ShippingMethod'     => 'nullable|string|max:50',
            'ShippingCost'       => 'nullable|numeric|min:0',
            'ShippingAddressId'  => 'nullable|exists:addresses,AddressId',
            'BillingAddressId'   => 'nullable|exists:addresses,AddressId',
        ]);

        Order::create($data);

        return redirect()
            ->route('orders.index')
            ->with('success', 'Pedido creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        $users = User::all()->mapWithKeys(function($u) {
            return [
                $u->UserId => "{$u->firstName} {$u->lastName}"
            ];
        });

        $payments  = Payment::pluck('PaymentId', 'PaymentId');
        $addresses = Address::pluck('AddressLine1', 'AddressId');

        return view('orders.edit', compact('order','users','payments','addresses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        $data = $request->validate([
            'OrderDate'          => 'nullable|date',
            'TotalAmount'        => 'nullable|numeric|min:0',
            'OrderStatus'        => 'nullable|string|max:20',
            'PaymentId'          => 'nullable|exists:payments,PaymentId',
            'ShippingMethod'     => 'nullable|string|max:50',
            'ShippingCost'       => 'nullable|numeric|min:0',
            'ShippingAddressId'  => 'nullable|exists:addresses,AddressId',
            'BillingAddressId'   => 'nullable|exists:addresses,AddressId',
        ]);

        $order->update($data);

        return redirect()
            ->route('orders.index')
            ->with('success', 'Pedido actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()
            ->route('orders.index')
            ->with('success', 'Pedido eliminado correctamente.');
    }
}
