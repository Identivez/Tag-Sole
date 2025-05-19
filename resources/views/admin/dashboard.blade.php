<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Panel de Administración') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Tarjetas de resumen -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-indigo-100 text-indigo-500 mr-4">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <div>
                            <div class="text-sm font-medium text-gray-500">Usuarios</div>
                            <div class="text-xl font-semibold">{{ $userCount }}</div>
                        </div>
                    </div>
                    <a href="{{ route('users.index') }}" class="text-blue-600 hover:underline mt-2 inline-block">
                        Ver todos
                    </a>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-green-100 text-green-500 mr-4">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                            </svg>
                        </div>
                        <div>
                            <div class="text-sm font-medium text-gray-500">Pedidos</div>
                            <div class="text-xl font-semibold">{{ $orderCount }}</div>
                        </div>
                    </div>
                    <a href="{{ route('orders.index') }}" class="text-blue-600 hover:underline mt-2 inline-block">
                        Ver todos
                    </a>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-yellow-100 text-yellow-500 mr-4">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path>
                            </svg>
                        </div>
                        <div>
                            <div class="text-sm font-medium text-gray-500">Productos</div>
                            <div class="text-xl font-semibold">{{ $productCount }}</div>
                        </div>
                    </div>
                    <a href="{{ route('products.index') }}" class="text-blue-600 hover:underline mt-2 inline-block">
                        Ver todos
                    </a>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-red-100 text-red-500 mr-4">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <div class="text-sm font-medium text-gray-500">Ventas Mes</div>
                            <div class="text-xl font-semibold">${{ number_format($monthlySales ?? 0, 2) }}</div>
                        </div>
                    </div>
                    <a href="{{ route('categories.index') }}" class="text-blue-600 hover:underline mt-2 inline-block">
                        Ver categorías
                    </a>
                </div>
            </div>

            <!-- Acciones Rápidas -->
            <div class="mt-8 bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-4">Acciones Rápidas</h3>
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                        <a href="{{ route('products.create') }}" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 text-center">
                            Nuevo Producto
                        </a>
                        <a href="{{ route('categories.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 text-center">
                            Nueva Categoría
                        </a>
                        <a href="{{ route('users.create') }}" class="px-4 py-2 bg-purple-600 text-white rounded hover:bg-purple-700 text-center">
                            Nuevo Usuario
                        </a>
                        <a href="{{ route('orders.index') }}?status=pendiente" class="px-4 py-2 bg-yellow-600 text-white rounded hover:bg-yellow-700 text-center">
                            Pedidos Pendientes
                        </a>
                    </div>
                </div>
            </div>

            <!-- Pedidos recientes -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-medium">Pedidos recientes</h3>
                        <a href="{{ route('orders.index') }}" class="text-indigo-600 hover:text-indigo-900 text-sm">Ver todos</a>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pedido</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cliente</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estado</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse($recentOrders as $order)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm font-medium text-gray-900">#{{ $order->OrderId }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">{{ $order->user->firstName }} {{ $order->user->lastName }}</div>
                                            <div class="text-sm text-gray-500">{{ $order->user->email }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">{{ \Carbon\Carbon::parse($order->OrderDate)->format('d/m/Y') }}</div>
                                            <div class="text-sm text-gray-500">{{ \Carbon\Carbon::parse($order->OrderDate)->format('H:i') }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">${{ number_format($order->TotalAmount, 2) }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                                @if($order->OrderStatus == 'Completado') bg-green-100 text-green-800
                                                @elseif($order->OrderStatus == 'Cancelado') bg-red-100 text-red-800
                                                @elseif($order->OrderStatus == 'Enviado') bg-blue-100 text-blue-800
                                                @else bg-yellow-100 text-yellow-800 @endif">
                                                {{ $order->OrderStatus }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <a href="{{ route('orders.show', $order->OrderId) }}" class="text-indigo-600 hover:text-indigo-900">Ver</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="px-6 py-4 whitespace-nowrap text-center text-gray-500">
                                            No hay pedidos recientes
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Enlaces rápidos -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <h3 class="text-lg font-medium mb-4">Gestión de catálogo</h3>
                        <div class="grid grid-cols-2 gap-3">
                            <a href="{{ route('products.index') }}" class="text-center py-3 px-4 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50">
                                Productos
                            </a>
                            <a href="{{ route('categories.index') }}" class="text-center py-3 px-4 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50">
                                Categorías
                            </a>
                            <a href="{{ route('providers.index') }}" class="text-center py-3 px-4 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50">
                                Proveedores
                            </a>
                            <a href="{{ route('sizes.index') }}" class="text-center py-3 px-4 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50">
                                Tallas
                            </a>
                            @if(isset($order))
                            <a href="{{ route('pdf.index') }}" class="text-center py-3 px-4 border border-primary rounded-md text-sm font-medium text-primary bg-primary-50 hover:bg-primary-100">
                                <i class="fa fa-file-pdf"></i> Reportes PDF
                            </a>
                            <a href="{{ route('email.order.confirmation', $order->OrderId) }}" class="text-center py-3 px-4 border border-info rounded-md text-sm font-medium text-info bg-info-50 hover:bg-info-100">
                                <i class="fa fa-envelope"></i> Enviar confirmación
                            </a>
                            @else
                            <a href="{{ route('pdf.index') }}" class="text-center py-3 px-4 border border-primary rounded-md text-sm font-medium text-primary bg-primary-50 hover:bg-primary-100">
                                <i class="fa fa-file-pdf"></i> Reportes PDF
                            </a>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <h3 class="text-lg font-medium mb-4">Gestión de usuarios</h3>
                        <div class="grid grid-cols-2 gap-3">
                            <a href="{{ route('users.index') }}" class="text-center py-3 px-4 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50">
                                Usuarios
                            </a>
                            <a href="{{ route('roles.index') }}" class="text-center py-3 px-4 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50">
                                Roles
                            </a>
                            <a href="{{ route('addresses.index') }}" class="text-center py-3 px-4 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50">
                                Direcciones
                            </a>
                            <a href="{{ route('admin.statistics') }}" class="text-center py-3 px-4 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50">
                                Estadísticas
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
