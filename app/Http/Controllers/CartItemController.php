<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;

class CartItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = CartItem::with(['user','product'])->get();
        return view('cart-items.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Combina firstName y lastName para el dropdown de usuarios
        $users = User::all()->mapWithKeys(function($u) {
            return [
                $u->UserId => "{$u->firstName} {$u->lastName}"
            ];
        });

        $products = Product::pluck('Name', 'ProductId');

        return view('cart-items.create', compact('users','products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'UserId'    => 'required|exists:users,UserId',
            'ProductId' => 'required|exists:products,ProductId',
            'Quantity'  => 'required|integer|min:1',
            'Price'     => 'required|numeric|min:0',
            'Total'     => 'nullable|numeric|min:0',
        ]);

        CartItem::create($data);

        return redirect()
            ->route('cart-items.index')
            ->with('success', 'Ítem de carrito creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(CartItem $cartItem)
    {
        return view('cart-items.show', compact('cartItem'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CartItem $cartItem)
    {
        $users = User::all()->mapWithKeys(function($u) {
            return [
                $u->UserId => "{$u->firstName} {$u->lastName}"
            ];
        });

        $products = Product::pluck('Name', 'ProductId');

        return view('cart-items.edit', compact('cartItem','users','products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CartItem $cartItem)
    {
        $data = $request->validate([
            'Quantity'  => 'required|integer|min:1',
            'Price'     => 'required|numeric|min:0',
            'Total'     => 'nullable|numeric|min:0',
        ]);

        $cartItem->update($data);

        return redirect()
            ->route('cart-items.index')
            ->with('success', 'Ítem de carrito actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CartItem $cartItem)
    {
        $cartItem->delete();

        return redirect()
            ->route('cart-items.index')
            ->with('success', 'Ítem de carrito eliminado correctamente.');
    }
}
