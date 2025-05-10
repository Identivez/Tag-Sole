<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use App\Models\Category;

class DashboardController extends Controller
{
    /**
     * Muestra el panel de control principal.
     */
    public function index()
    {
        // Aquí puedes agregar cualquier lógica que necesites para tu dashboard
        // Por ejemplo, contar registros para mostrar estadísticas

        // Para una versión futura podrías agregar estadísticas como:
        // $usersCount = User::count();
        // $productsCount = Product::count();
        // $ordersCount = Order::count();
        // $categoriesCount = Category::count();

        return view('dashboard.index');
    }
}
