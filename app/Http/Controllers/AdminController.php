<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use App\Models\Category;

class AdminController extends Controller
{
    /**
     * Muestra el panel de control de administración.
     *
     * @return \Illuminate\View\View
     */
    public function dashboard()
{
    // Estadísticas básicas para el dashboard
    $stats = [
        'users' => User::count(),
        'products' => Product::count(),
        'orders' => Order::count(),
        'categories' => Category::count()
    ];

    // Variables adicionales para la segunda parte del dashboard
    $userCount = User::count();
    $orderCount = Order::count();
    $productCount = Product::count();

    // Calcular ventas mensuales (del mes actual)
    $monthlySales = Order::whereMonth('OrderDate', now()->month)
        ->whereYear('OrderDate', now()->year)
        ->sum('TotalAmount');

    // Pedidos recientes
    $recentOrders = Order::with('user')
        ->orderBy('OrderDate', 'desc')
        ->take(5)
        ->get();

    return view('admin.dashboard', compact(
        'stats',
        'userCount',
        'orderCount',
        'productCount',
        'monthlySales',
        'recentOrders'
    ));
}

    /**
     * Muestra estadísticas detalladas.
     *
     * @return \Illuminate\View\View
     */
    public function statistics()
    {
        // Implementación de estadísticas más detalladas
        $userStats = User::selectRaw('DATE(createdAt) as date, COUNT(*) as count')
            ->groupBy('date')
            ->orderBy('date', 'desc')
            ->take(30)
            ->get();

        $orderStats = Order::selectRaw('DATE(createdAt) as date, COUNT(*) as count, SUM(TotalAmount) as revenue')
            ->groupBy('date')
            ->orderBy('date', 'desc')
            ->take(30)
            ->get();

        return view('admin.statistics', compact('userStats', 'orderStats'));
    }

    /**
     * Muestra reportes del sistema.
     *
     * @return \Illuminate\View\View
     */
    public function reports()
    {
        // Implementación de reportes
        $topProducts = Product::withCount('orderDetails')
            ->orderBy('order_details_count', 'desc')
            ->take(10)
            ->get();

        $topCategories = Category::withCount('products')
            ->orderBy('products_count', 'desc')
            ->take(10)
            ->get();

        return view('admin.reports', compact('topProducts', 'topCategories'));
    }
}
