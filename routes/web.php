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
    ProviderDetailController,
    PDFController,
    EmailController
};

// Incluir rutas de autenticación definidas en auth.php
require __DIR__.'/auth.php';
Route::get('/', function () {
    return view('bienvenida');
});
/*
|--------------------------------------------------------------------------
| RUTAS PÚBLICAS - Accesibles sin autenticación
|--------------------------------------------------------------------------
*/

// Ruta principal - Página de inicio de la tienda
//Route::get('/', [ShopController::class, 'index'])->name('home');

// Rutas para mostrar productos
Route::get('/products/{product}', [ShopController::class, 'show'])->name('product.show');
Route::get('/category/{category}', [ShopController::class, 'byCategory'])->name('shop.category');
Route::get('/search', [ShopController::class, 'search'])->name('shop.search');

// Páginas estáticas principales
Route::view('/sneakers', 'sneakers'); // Página de zapatillas deportivas
Route::view('/accesorios', 'accesorios'); // Página de accesorios
Route::view('/moda', 'moda'); // Página de moda

// Contacto (accesible sin autenticación)
Route::get('/contacto', [EmailController::class, 'showContactForm'])->name('email.form');
Route::post('/contacto/enviar', [EmailController::class, 'sendContactEmail'])->name('email.send');

/*
|--------------------------------------------------------------------------
| RUTAS PARA USUARIOS AUTENTICADOS
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {

    // Panel de usuario (Dashboard)
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    /*
     * Gestión de Perfil de Usuario
     */
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    /*
     * Verificación de Email
     */
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

    /*
     * Área Personal del Usuario
     */
    Route::prefix('user')->group(function () {
        // Gestión de pedidos del usuario
        Route::get('/orders', [OrderController::class, 'userOrders'])->name('user.orders');
        Route::get('/order/{order}', [OrderController::class, 'userOrderDetail'])->name('user.order.detail');
        Route::post('/order/{order}/cancel', [OrderController::class, 'cancelOrder'])->name('user.order.cancel');

        // Gestión de favoritos
        Route::get('/favorites', [FavoriteController::class, 'userFavorites'])->name('user.favorites');
        Route::post('/favorites/toggle', [FavoriteController::class, 'toggleFavorite'])->name('favorites.toggle');
        Route::post('/favorites/bulk-remove', [FavoriteController::class, 'bulkRemove'])->name('favorites.bulk-remove');
        Route::get('/favorites/check/{product}', [FavoriteController::class, 'checkFavorite'])->name('favorites.check');

        // Gestión de direcciones de envío
        Route::get('/addresses', [AddressController::class, 'userAddresses'])->name('user.addresses');
        Route::get('/addresses/create', [AddressController::class, 'createUserAddress'])->name('user.address.create');
        Route::post('/addresses', [AddressController::class, 'storeUserAddress'])->name('user.address.store');
        Route::get('/addresses/{address}/edit', [AddressController::class, 'editUserAddress'])->name('user.address.edit');
        Route::put('/addresses/{address}', [AddressController::class, 'updateUserAddress'])->name('user.address.update');
        Route::delete('/addresses/{address}', [AddressController::class, 'destroyUserAddress'])->name('user.address.destroy');
    });

    /*
     * Carrito de Compras y Proceso de Checkout
     */
    Route::prefix('cart')->group(function () {
        Route::get('/', [CartItemController::class, 'viewCart'])->name('cart.view');
        Route::post('/add', [CartItemController::class, 'addToCart'])->name('cart.add');
        Route::patch('/update/{cartItem}', [CartItemController::class, 'updateQuantity'])->name('cart.update');
        Route::delete('/remove/{cartItem}', [CartItemController::class, 'removeFromCart'])->name('cart.remove');
        Route::post('/clear', [CartItemController::class, 'clearCart'])->name('cart.clear');
        Route::get('/checkout', [OrderController::class, 'checkout'])->name('checkout');
        Route::post('/checkout', [OrderController::class, 'placeOrder'])->name('order.place');
    });

    // Página de confirmación de pedido realizado
    Route::get('/order/confirmation/{order}', [OrderController::class, 'confirmation'])->name('order.confirmation');

    // Reseñas de productos
    Route::post('/product/{product}/review', [ReviewController::class, 'storeUserReview'])->name('product.review');
});

/*
|--------------------------------------------------------------------------
| RUTAS PARA USUARIOS CON EMAIL VERIFICADO
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'verified'])->group(function () {
    // Generación de PDFs
    Route::get('pdf', [PDFController::class, 'index'])->name('pdf.index');
    Route::get('pdf/products/{type}', [PDFController::class, 'productReport'])->name('pdf.products');
    Route::get('pdf/invoice/{type}/{orderId}', [PDFController::class, 'orderInvoice'])->name('pdf.invoice');
});

/*
|--------------------------------------------------------------------------
| RUTAS AJAX PARA CARGA DINÁMICA DE DATOS
|--------------------------------------------------------------------------
*/
// Endpoints para selectores dependientes (países, entidades, municipios)
Route::get('getEntitiesByCountry/{id_pais}', [UserController::class, 'getEntitiesByCountry']);
Route::get('getMunicipalitiesByEntity/{id_entidad}', [UserController::class, 'getMunicipalitiesByEntity']);
Route::get('combo_entidad_muni/{id_pais}', [AjaxController::class, 'cambia_combo']);
Route::get('combo_municipio/{id_entidad}', [AjaxController::class, 'cambia_combo_2']);

/*
|--------------------------------------------------------------------------
| RUTAS DE ADMINISTRACIÓN (REQUIEREN ROL DE ADMIN)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {

    // Panel de administración y estadísticas
    Route::prefix('admin')->group(function () {
        // Dashboard principal de administración
       Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

        // Estadísticas y reportes
        Route::get('/stats', [AdminController::class, 'statistics'])->name('admin.stats');
        Route::get('/reports', [AdminController::class, 'reports'])->name('admin.reports');
        Route::get('/reports/export', [AdminController::class, 'exportReport'])->name('admin.reports.export');

        // Gestión de usuarios y roles
        Route::get('/users/roles', [UserController::class, 'manageRoles'])->name('admin.users.roles');
        Route::post('/users/{user}/roles', [UserController::class, 'assignRoles'])->name('admin.users.assign-roles');

        // Gestión de pedidos (vista administrativa)
        Route::get('/orders', [OrderController::class, 'adminIndex'])->name('admin.orders');
        Route::get('/orders/{order}', [OrderController::class, 'adminShow'])->name('admin.orders.show');
        Route::patch('/orders/{order}/status', [OrderController::class, 'updateStatus'])->name('admin.orders.update-status');

        // Gestión de inventario
        Route::get('/inventory', [ProductInventoryController::class, 'adminIndex'])->name('admin.inventory');
        Route::patch('/inventory/update-stock', [ProductInventoryController::class, 'batchUpdateStock'])->name('admin.inventory.update-stock');
    });

    /*
     * RUTAS RESOURCE (CRUD) PARA TODAS LAS ENTIDADES DEL SISTEMA
     * Estas rutas generan automáticamente index, create, store, show, edit, update y destroy
     */
    // Gestión de ubicaciones geográficas
    Route::resource('countries', CountryController::class);
    Route::resource('entities', EntityController::class);
    Route::resource('municipalities', MunicipalityController::class);

    // Gestión de usuarios y roles
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);

    // Gestión de productos y categorías
    Route::resource('categories', CategoryController::class);
    Route::resource('sizes', SizeController::class);
    Route::resource('providers', ProviderController::class);
    Route::resource('products', ProductController::class);
    Route::resource('product-inventories', ProductInventoryController::class);
    Route::resource('images', ImageController::class);

    // Gestión de usuarios, direcciones y favoritos
    Route::resource('addresses', AddressController::class);
    Route::resource('favorites', FavoriteController::class);

    // Gestión de carrito y pedidos
    Route::resource('cart-items', CartItemController::class);
    Route::resource('orders', OrderController::class);
    Route::resource('payments', PaymentController::class);
    Route::resource('order-details', OrderDetailController::class);

    // Gestión de reseñas y proveedores
    Route::resource('reviews', ReviewController::class);
    Route::resource('provider-details', ProviderDetailController::class);

    // Ruta comentada temporalmente
    //Route::resource('role-users', \App\Http\Controllers\RoleUserController::class);

    // Envío de correos de confirmación (solo administradores)
    Route::get('/pedido/{order}/enviar-confirmacion', [EmailController::class, 'sendOrderConfirmation'])
        ->name('email.order.confirmation');

    /*
     * GESTIÓN AVANZADA DE UBICACIONES
     */
    // Vista principal de gestión de ubicaciones
    Route::get('/locations', [App\Http\Controllers\LocationController::class, 'index'])
        ->name('locations.manage');

    // Endpoints para datos jerárquicos
    Route::get('/locations/entities/{countryId}',
        [App\Http\Controllers\LocationController::class, 'getEntities']);

    Route::get('/locations/municipalities/{entityId}',
        [App\Http\Controllers\LocationController::class, 'getMunicipalities']);

    Route::get('/locations/municipality/{municipalityId}/details',
        [App\Http\Controllers\LocationController::class, 'getMunicipalityDetails']);

    // Actualización de estado (PUT para seguir convenciones RESTful)
    Route::put('/locations/municipality/{municipalityId}/status',
        [App\Http\Controllers\LocationController::class, 'updateMunicipalityStatus']);

    // Datos dinámicos y manejo de entidades
    Route::get('/dynamic-data', [App\Http\Controllers\LocationController::class, 'dynamicData'])
        ->name('locations.dynamic-data');

    Route::get('/locations/entity/{entityId}/details',
        [App\Http\Controllers\LocationController::class, 'getEntityDetails']);

    Route::put('/locations/entity/{entityId}/update',
        [App\Http\Controllers\LocationController::class, 'updateEntityName']);

    /*
     * GESTIÓN DE PRODUCTOS CON AJAX
     */
    Route::get('/productos/ajax', [App\Http\Controllers\ProductAjaxController::class, 'index'])
        ->name('products.ajax');

    Route::get('/productos/buscar/{categoryId}',
        [App\Http\Controllers\ProductAjaxController::class, 'buscarProductos']);

    Route::get('/productos/incrementar/{productId}/{categoryId}',
        [App\Http\Controllers\ProductAjaxController::class, 'incrementarStock']);

    Route::get('/productos/decrementar/{productId}/{categoryId}',
        [App\Http\Controllers\ProductAjaxController::class, 'decrementarStock']);

    Route::get('/productos/proveedor/{providerId}',
        [App\Http\Controllers\ProductAjaxController::class, 'buscarProductosPorProveedor']);

    Route::get('/productos/obtener/{productId}',
        [App\Http\Controllers\ProductAjaxController::class, 'obtenerProducto']);

    Route::put('/productos/actualizar/{productId}',
        [App\Http\Controllers\ProductAjaxController::class, 'actualizarProducto']);
});
