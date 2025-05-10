<?php

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

// Ruta para el panel de control
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Ruta para la página principal - redirección al dashboard
Route::get('/', function () {
    return redirect()->route('dashboard');
});

// Rutas AJAX (deben ir antes de las rutas resource)
Route::get('getEntitiesByCountry/{id_pais}', [UserController::class, 'getEntitiesByCountry']);
Route::get('getMunicipalitiesByEntity/{id_entidad}', [UserController::class, 'getMunicipalitiesByEntity']);
Route::get('combo_entidad_muni/{id_pais}', [AjaxController::class, 'cambia_combo']);
Route::get('combo_municipio/{id_entidad}', [AjaxController::class, 'cambia_combo_2']);

// Rutas Resource
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
//Route::resource('role-users', \App\Http\Controllers\RoleUserController::class);
