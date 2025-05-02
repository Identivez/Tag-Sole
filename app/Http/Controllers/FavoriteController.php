<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $favorites = Favorite::with(['user','product'])->get();
        return view('favorites.index', compact('favorites'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Construimos “ID => Nombre completo” para el select
        $users = User::all()->mapWithKeys(function($u) {
            return [
                $u->UserId => "{$u->firstName} {$u->lastName}"
            ];
        });

        $products = Product::pluck('Name', 'ProductId');

        return view('favorites.create', compact('users','products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'UserId'    => ['required','exists:users,UserId'],
            'ProductId' => [
                'required','exists:products,ProductId',
                Rule::unique('favorites')
                    ->where(fn($q) => $q->where('UserId', $request->UserId))
            ],
            'AddedAt'   => 'nullable|date',
        ]);

        Favorite::create($data);

        return redirect()
            ->route('favorites.index')
            ->with('success', 'Favorito creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Favorite $favorite)
    {
        return view('favorites.show', compact('favorite'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Favorite $favorite)
    {
        $users    = User::all()->mapWithKeys(function($u) {
            return [
                $u->UserId => "{$u->firstName} {$u->lastName}"
            ];
        });

        $products = Product::pluck('Name', 'ProductId');

        return view('favorites.edit', compact('favorite','users','products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Favorite $favorite)
    {
        $data = $request->validate([
            'UserId'    => ['required','exists:users,UserId'],
            'ProductId' => [
                'required','exists:products,ProductId',
                Rule::unique('favorites')
                    ->ignore($favorite->FavoriteId, 'FavoriteId')
                    ->where(fn($q) => $q->where('UserId', $request->UserId))
            ],
            'AddedAt'   => 'nullable|date',
        ]);

        $favorite->update($data);

        return redirect()
            ->route('favorites.index')
            ->with('success', 'Favorito actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Favorite $favorite)
    {
        $favorite->delete();

        return redirect()
            ->route('favorites.index')
            ->with('success', 'Favorito eliminado correctamente.');
    }
}
