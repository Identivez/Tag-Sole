<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ShopController extends Controller
{
    /**
     * Mostrar la página principal/home
     */
    public function index(Request $request)
    {
        // Obtener productos filtrados por categoría (si se especifica)
        $query = Product::query();

        if ($request->filled('CategoryId')) {
            $query->where('CategoryId', $request->CategoryId);
        }

        $products = $query->paginate(12)->withQueryString();
        $categories = Category::pluck('Name', 'CategoryId');

        // Para la vista principal, llamada home.blade.php
        return view('home', compact('products', 'categories'));

        // O alternativamente, si prefieres usar shop.index.blade.php
        // return view('shop.index', compact('products', 'categories'));
    }

    /**
     * Mostrar detalles de un producto específico
     */
    public function show(Product $product)
    {
        return view('shop.show', compact('product'));
    }

    /**
     * Mostrar productos filtrados por categoría
     */
    public function byCategory(Category $category)
    {
        $products = Product::where('CategoryId', $category->CategoryId)
            ->paginate(12);
        $categories = Category::pluck('Name', 'CategoryId');

        return view('shop.index', compact('products', 'categories', 'category'));
    }

    /**
     * Búsqueda de productos
     */
    public function search(Request $request)
    {
        $query = $request->input('query');

        $products = Product::where('Name', 'like', "%{$query}%")
            ->orWhere('Description', 'like', "%{$query}%")
            ->paginate(12)
            ->withQueryString();

        $categories = Category::pluck('Name', 'CategoryId');

        return view('shop.index', compact('products', 'categories', 'query'));
    }
}
