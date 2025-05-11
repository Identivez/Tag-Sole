<?php

/**
 * Configuración de rutas web para la aplicación.
 *
 * Este archivo define todas las rutas accesibles vía web, incluyendo:
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
use App\Http\Controllers\UserController;
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

/**
 * Rutas básicas de navegación.
 *
 * Incluye la ruta al panel de control y redirección de la página principal.
 */
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Ruta para la página principal - redirección al dashboard
Route::get('/', function () {
    return redirect()->route('dashboard');
});

/**
 * Rutas AJAX para carga dinámica de datos.
 *
 * Estas rutas proporcionan endpoints para cargar datos jerárquicos:
 * - Entidades por país
 * - Municipios por entidad
 *
 * Nota: Estas rutas deben declararse antes de las rutas resource
 * para evitar conflictos de nombres y parámetros.
 */
Route::get('getEntitiesByCountry/{id_pais}', [UserController::class, 'getEntitiesByCountry']);
Route::get('getMunicipalitiesByEntity/{id_entidad}', [UserController::class, 'getMunicipalitiesByEntity']);
Route::get('combo_entidad_muni/{id_pais}', [AjaxController::class, 'cambia_combo']);
Route::get('combo_municipio/{id_entidad}', [AjaxController::class, 'cambia_combo_2']);

/**
 * Rutas Resource (CRUD).
 *
 * Cada una de estas rutas genera automáticamente los endpoints
 * para las acciones CRUD (Create, Read, Update, Delete) sobre
 * cada entidad del sistema. Siguen convenciones RESTful.
 *
 * @see https://laravel.com/docs/10.x/controllers#resource-controllers
 */
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

/**
 * Rutas especializadas para gestión de ubicaciones.
 *
 * Estas rutas forman parte del módulo de gestión de ubicaciones
 * geográficas, permitiendo visualizar y manipular datos jerárquicos:
 * país > entidad > municipio.
 */
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
 *
 * Estas rutas permiten la visualización y edición de datos
 * mediante interfaces asíncronas (AJAX) sin recargar la página.
 */
// Vista principal de datos dinámicos
Route::get('/dynamic-data', [App\Http\Controllers\LocationController::class, 'dynamicData'])
    ->name('locations.dynamic-data');

// Endpoints para consulta y actualización
Route::get('/locations/entity/{entityId}/details',
    [App\Http\Controllers\LocationController::class, 'getEntityDetails']);

Route::put('/locations/entity/{entityId}/update',
    [App\Http\Controllers\LocationController::class, 'updateEntityName']);
