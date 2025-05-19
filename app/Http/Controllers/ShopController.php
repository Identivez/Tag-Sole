<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();

        if ($request->filled('CategoryId')) {
            $query->where('CategoryId', $request->CategoryId);
        }

        $products = $query->paginate(12)->withQueryString();
        $categories = Category::pluck('Name', 'CategoryId');

        // Retorna la vista utilizando el layout correcto
        return view('home', compact('products', 'categories'));
    }


    public function show(Product $product)
    {
        return view('shop.show', compact('product'));
    }
}
