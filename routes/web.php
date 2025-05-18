<?php

/**
 * Configuración de rutas web para la aplicación.
 *
 * Este archivo define todas las rutas accesibles vía web, incluyendo:
 * - Rutas de autenticación (incluidas desde auth.php)
 * - Rutas de panel de control y página principal
 * - Rutas AJAX para carga de datos dinámicos
 * - Rutas de recursos (CRUD) para todas las entidades del sistema
 * - Rutas especializadas para gestión de ubicaciones
 *
 * @package App\Routes
 */

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\{
    CountryController,
    EntityController,
    MunicipalityController,
    RoleController,
    CategoryController,
    SizeController,
    ProviderController,
    ProductController,
    ProductInventoryController,
    AddressController,
    FavoriteController,
    ImageController,
    CartItemController,
    OrderController,
    PaymentController,
    OrderDetailController,
    ReviewController,
    ProviderDetailController
};

// Incluir rutas de autenticación
require __DIR__.'/auth.php';

/**
 * Rutas públicas - accesibles sin autenticación
 */
// Tienda pública
Route::get('/', [ShopController::class, 'index'])->name('home');
Route::get('/products/{product}', [ShopController::class, 'show'])->name('product.show');
Route::get('/category/{category}', [ShopController::class, 'byCategory'])->name('shop.category');
Route::get('/search', [ShopController::class, 'search'])->name('shop.search');

// Rutas de vistas estáticas
Route::view('/sneakers', 'sneakers');
Route::view('/accesorios', 'accesorios');
Route::view('/moda', 'moda');

/**
 * Rutas generales - Para cualquier usuario autenticado
 */
Route::middleware(['auth'])->group(function () {
    // Panel de usuario
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Rutas de perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Verificación de email
    Route::prefix('email')->group(function () {
        Route::get('/verify', [EmailVerificationController::class, 'notice'])
            ->name('verification.notice');
        Route::get('/verify/{id}/{hash}', [EmailVerificationController::class, 'verify'])
            ->middleware(['signed', 'throttle:6,1'])
            ->name('verification.verify');
        Route::post('/verification-notification', [EmailVerificationController::class, 'resend'])
            ->middleware('throttle:6,1')
            ->name('verification.send');
    });

    // Rutas específicas de usuario
    Route::prefix('user')->group(function () {
        Route::get('/orders', [OrderController::class, 'userOrders'])->name('user.orders');
        Route::get('/order/{order}', [OrderController::class, 'userOrderDetail'])->name('user.order.detail');
        Route::post('/order/{order}/cancel', [OrderController::class, 'cancelOrder'])->name('user.order.cancel');
        Route::get('/favorites', [FavoriteController::class, 'userFavorites'])->name('user.favorites');
        Route::post('/favorites/toggle', [FavoriteController::class, 'toggleFavorite'])->name('favorites.toggle');
        Route::post('/favorites/bulk-remove', [FavoriteController::class, 'bulkRemove'])->name('favorites.bulk-remove');
        Route::get('/favorites/check/{product}', [FavoriteController::class, 'checkFavorite'])->name('favorites.check');
        Route::get('/addresses', [AddressController::class, 'userAddresses'])->name('user.addresses');
        Route::get('/addresses/create', [AddressController::class, 'createUserAddress'])->name('user.address.create');
        Route::post('/addresses', [AddressController::class, 'storeUserAddress'])->name('user.address.store');
        Route::get('/addresses/{address}/edit', [AddressController::class, 'editUserAddress'])->name('user.address.edit');
        Route::put('/addresses/{address}', [AddressController::class, 'updateUserAddress'])->name('user.address.update');
        Route::delete('/addresses/{address}', [AddressController::class, 'destroyUserAddress'])->name('user.address.destroy');
    });

    // Carrito de compras y checkout
    Route::prefix('cart')->group(function () {
        Route::get('/', [CartItemController::class, 'viewCart'])->name('cart.view');
        Route::post('/add', [CartItemController::class, 'addToCart'])->name('cart.add');
        Route::patch('/update/{cartItem}', [CartItemController::class, 'updateQuantity'])->name('cart.update');
        Route::delete('/remove/{cartItem}', [CartItemController::class, 'removeFromCart'])->name('cart.remove');
        Route::post('/clear', [CartItemController::class, 'clearCart'])->name('cart.clear');
        Route::get('/checkout', [OrderController::class, 'checkout'])->name('checkout');
        Route::post('/checkout', [OrderController::class, 'placeOrder'])->name('order.place');
    });

    // Confirmación de orden
    Route::get('/order/confirmation/{order}', [OrderController::class, 'confirmation'])->name('order.confirmation');

    // Reviews de productos
    Route::post('/product/{product}/review', [ReviewController::class, 'storeUserReview'])->name('product.review');
});

/**
 * Rutas de administración - Solo para usuarios con rol de administrador
 */
Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    // Dashboard de administración
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    // Estadísticas y reportes
    Route::get('/stats', [AdminController::class, 'statistics'])->name('admin.stats');
    Route::get('/reports', [AdminController::class, 'reports'])->name('admin.reports');
    Route::get('/reports/export', [AdminController::class, 'exportReport'])->name('admin.reports.export');

    // Gestión de usuarios
    Route::get('/users/roles', [UserController::class, 'manageRoles'])->name('admin.users.roles');
    Route::post('/users/{user}/roles', [UserController::class, 'assignRoles'])->name('admin.users.assign-roles');

    // Gestión de órdenes
    Route::get('/orders', [OrderController::class, 'adminIndex'])->name('admin.orders');
    Route::get('/orders/{order}', [OrderController::class, 'adminShow'])->name('admin.orders.show');
    Route::patch('/orders/{order}/status', [OrderController::class, 'updateStatus'])->name('admin.orders.update-status');

    // Gestión de inventario
    Route::get('/inventory', [ProductInventoryController::class, 'adminIndex'])->name('admin.inventory');
    Route::patch('/inventory/update-stock', [ProductInventoryController::class, 'batchUpdateStock'])->name('admin.inventory.update-stock');
});

/**
 * Rutas AJAX para carga dinámica de datos.
 */
Route::get('getEntitiesByCountry/{id_pais}', [UserController::class, 'getEntitiesByCountry']);
Route::get('getMunicipalitiesByEntity/{id_entidad}', [UserController::class, 'getMunicipalitiesByEntity']);
Route::get('combo_entidad_muni/{id_pais}', [AjaxController::class, 'cambia_combo']);
Route::get('combo_municipio/{id_entidad}', [AjaxController::class, 'cambia_combo_2']);

/**
 * Rutas Resource (CRUD) - Protegidas por autenticación y rol de administrador
 */
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('countries', CountryController::class);
    Route::resource('entities', EntityController::class);
    Route::resource('municipalities', MunicipalityController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('sizes', SizeController::class);
    Route::resource('providers', ProviderController::class);
    Route::resource('products', ProductController::class);
    Route::resource('product-inventories', ProductInventoryController::class);
    Route::resource('addresses', AddressController::class);
    Route::resource('favorites', FavoriteController::class);
    Route::resource('images', ImageController::class);
    Route::resource('cart-items', CartItemController::class);
    Route::resource('orders', OrderController::class);
    Route::resource('payments', PaymentController::class);
    Route::resource('order-details', OrderDetailController::class);
    Route::resource('reviews', ReviewController::class);
    Route::resource('provider-details', ProviderDetailController::class);
    //Route::resource('role-users', \App\Http\Controllers\RoleUserController::class);  // Comentado temporalmente
});

/**
 * Rutas especializadas para gestión de ubicaciones.
 */
Route::middleware(['auth', 'role:admin'])->group(function () {
    // Vista principal de gestión
    Route::get('/locations', [App\Http\Controllers\LocationController::class, 'index'])
        ->name('locations.manage');

    // Endpoints para carga de datos jerárquicos
    Route::get('/locations/entities/{countryId}',
        [App\Http\Controllers\LocationController::class, 'getEntities']);

    Route::get('/locations/municipalities/{entityId}',
        [App\Http\Controllers\LocationController::class, 'getMunicipalities']);

    Route::get('/locations/municipality/{municipalityId}/details',
        [App\Http\Controllers\LocationController::class, 'getMunicipalityDetails']);

    // Endpoint para actualización de estado (PUT para seguir convenciones RESTful)
    Route::put('/locations/municipality/{municipalityId}/status',
        [App\Http\Controllers\LocationController::class, 'updateMunicipalityStatus']);

    /**
     * Rutas para visualización dinámica de datos.
     */
    // Vista principal de datos dinámicos
    Route::get('/dynamic-data', [App\Http\Controllers\LocationController::class, 'dynamicData'])
        ->name('locations.dynamic-data');

    // Endpoints para consulta y actualización
    Route::get('/locations/entity/{entityId}/details',
        [App\Http\Controllers\LocationController::class, 'getEntityDetails']);

    Route::put('/locations/entity/{entityId}/update',
        [App\Http\Controllers\LocationController::class, 'updateEntityName']);

    // Rutas para gestión de productos con AJAX
    Route::get('/productos/ajax', [App\Http\Controllers\ProductAjaxController::class, 'index'])->name('products.ajax');
    Route::get('/productos/buscar/{categoryId}', [App\Http\Controllers\ProductAjaxController::class, 'buscarProductos']);
    Route::get('/productos/incrementar/{productId}/{categoryId}', [App\Http\Controllers\ProductAjaxController::class, 'incrementarStock']);
    Route::get('/productos/decrementar/{productId}/{categoryId}', [App\Http\Controllers\ProductAjaxController::class, 'decrementarStock']);
    Route::get('/productos/proveedor/{providerId}', [App\Http\Controllers\ProductAjaxController::class, 'buscarProductosPorProveedor']);
    Route::get('/productos/obtener/{productId}', [App\Http\Controllers\ProductAjaxController::class, 'obtenerProducto']);
    Route::put('/productos/actualizar/{productId}', [App\Http\Controllers\ProductAjaxController::class, 'actualizarProducto']);
});
