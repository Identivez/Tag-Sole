@extends('layouts.app')

@section('title', 'Accesorios para Sneakers')

@section('header')
<div class="text-center">
  <h1 class="display-4 fw-bold">Accesorios</h1>
  <p class="lead">Complementa tus sneakers con los mejores accesorios</p>
</div>
@endsection

@section('content')
<section class="product-store py-5">
  <div class="container">
    <div class="row mb-5">
      <div class="col-md-6">
        <div class="card border-0">
          <div class="card-img position-relative">
            <img src="{{ asset('images/accessories-banner1.jpg') }}" alt="Laces" class="img-fluid rounded">
            <div class="cart-concern p-3 m-3 p-lg-5 m-lg-5 position-absolute bottom-0 start-0">
              <h2 class="card-title style-2 display-4 light">Premium Laces</h2>
              <a href="#" class="text-uppercase light mt-3 d-inline-block text-hover fw-bold light-border">Shop Now</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card border-0">
          <div class="card-img position-relative">
            <img src="{{ asset('images/accessories-banner2.jpg') }}" alt="Cleaning Kit" class="img-fluid rounded">
            <div class="cart-concern p-3 m-3 p-lg-5 m-lg-5 position-absolute bottom-0 start-0">
              <h2 class="card-title style-2 display-4 light">Cleaning Kits</h2>
              <a href="#" class="text-uppercase light mt-3 d-inline-block text-hover fw-bold light-border">Shop Now</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-12 mb-4">
        <h2 class="text-center">Featured Accessories</h2>
      </div>
    </div>

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
      <!-- Accessory Item 1 -->
      <div class="col">
        <div class="product-card position-relative">
          <div class="card-img">
            <img src="{{ asset('images/accessory1.jpg') }}" alt="Premium Laces" class="product-image img-fluid">
            <div class="cart-concern position-absolute d-flex justify-content-center">
              <div class="cart-button d-flex gap-2 justify-content-center align-items-center">
                <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#modallong">
                  <svg class="shopping-carriage">
                    <use xlink:href="#shopping-carriage"></use>
                  </svg>
                </button>
                <button type="button" class="btn btn-light" data-bs-target="#modaltoggle" data-bs-toggle="modal">
                  <svg class="quick-view">
                    <use xlink:href="#quick-view"></use>
                  </svg>
                </button>
              </div>
            </div>
          </div>
          <div class="card-detail d-flex justify-content-between align-items-center mt-3">
            <h3 class="card-title fs-6 fw-normal m-0">
              <a href="#">Premium Oval Laces</a>
            </h3>
            <span class="card-price fw-bold">$12</span>
          </div>
        </div>
      </div>

      <!-- Accessory Item 2 -->
      <div class="col">
        <div class="product-card position-relative">
          <div class="card-img">
            <img src="{{ asset('images/accessory2.jpg') }}" alt="Cleaning Kit" class="product-image img-fluid">
            <div class="cart-concern position-absolute d-flex justify-content-center">
              <div class="cart-button d-flex gap-2 justify-content-center align-items-center">
                <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#modallong">
                  <svg class="shopping-carriage">
                    <use xlink:href="#shopping-carriage"></use>
                  </svg>
                </button>
                <button type="button" class="btn btn-light" data-bs-target="#modaltoggle" data-bs-toggle="modal">
                  <svg class="quick-view">
                    <use xlink:href="#quick-view"></use>
                  </svg>
                </button>
              </div>
            </div>
          </div>
          <div class="card-detail d-flex justify-content-between align-items-center mt-3">
            <h3 class="card-title fs-6 fw-normal m-0">
              <a href="#">Advanced Cleaning Kit</a>
            </h3>
            <span class="card-price fw-bold">$24.99</span>
          </div>
        </div>
      </div>

      <!-- Accessory Item 3 -->
      <div class="col">
        <div class="product-card position-relative">
          <div class="card-img">
            <img src="{{ asset('images/accessory3.jpg') }}" alt="Sneaker Shield" class="product-image img-fluid">
            <div class="cart-concern position-absolute d-flex justify-content-center">
              <div class="cart-button d-flex gap-2 justify-content-center align-items-center">
                <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#modallong">
                  <svg class="shopping-carriage">
                    <use xlink:href="#shopping-carriage"></use>
                  </svg>
                </button>
                <button type="button" class="btn btn-light" data-bs-target="#modaltoggle" data-bs-toggle="modal">
                  <svg class="quick-view">
                    <use xlink:href="#quick-view"></use>
                  </svg>
                </button>
              </div>
            </div>
          </div>
          <div class="card-detail d-flex justify-content-between align-items-center mt-3">
            <h3 class="card-title fs-6 fw-normal m-0">
              <a href="#">Sneaker Shield</a>
            </h3>
            <span class="card-price fw-bold">$9.99</span>
          </div>
        </div>
      </div>

      <!-- Accessory Item 4 -->
      <div class="col">
        <div class="product-card position-relative">
          <div class="card-img">
            <img src="{{ asset('images/accessory4.jpg') }}" alt="Shoe Trees" class="product-image img-fluid">
            <div class="cart-concern position-absolute d-flex justify-content-center">
              <div class="cart-button d-flex gap-2 justify-content-center align-items-center">
                <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#modallong">
                  <svg class="shopping-carriage">
                    <use xlink:href="#shopping-carriage"></use>
                  </svg>
                </button>
                <button type="button" class="btn btn-light" data-bs-target="#modaltoggle" data-bs-toggle="modal">
                  <svg class="quick-view">
                    <use xlink:href="#quick-view"></use>
                  </svg>
                </button>
              </div>
            </div>
          </div>
          <div class="card-detail d-flex justify-content-between align-items-center mt-3">
            <h3 class="card-title fs-6 fw-normal m-0">
              <a href="#">Cedar Shoe Trees</a>
            </h3>
            <span class="card-price fw-bold">$19.99</span>
          </div>
        </div>
      </div>
    </div>

    <div class="row mt-5">
      <div class="col-12 text-center">
        <a href="#" class="btn btn-black text-uppercase hvr-sweep-to-right">
          View All Accessories
        </a>
      </div>
    </div>
  </div>
</section>

<!-- Care Tips Section -->
<section class="py-5 bg-light">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center mb-4">
        <h2 class="display-6">Sneaker Care Tips</h2>
        <p class="lead">Keep your kicks looking fresh with these expert tips</p>
      </div>
    </div>
    <div class="row g-4">
      <div class="col-md-4">
        <div class="card border-0 h-100">
          <div class="card-body text-center">
            <div class="mb-3">
              <svg width="48" height="48" fill="currentColor" class="text-primary" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16">
                <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"/>
              </svg>
            </div>
            <h3 class="h5">Regular Cleaning</h3>
            <p>Clean your sneakers regularly using a gentle cleaner specifically designed for shoes. Don't wait until they're heavily soiled.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card border-0 h-100">
          <div class="card-body text-center">
            <div class="mb-3">
              <svg width="48" height="48" fill="currentColor" class="text-primary" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16">
                <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
              </svg>
            </div>
            <h3 class="h5">Proper Storage</h3>
            <p>Store your sneakers in a cool, dry place away from direct sunlight. Use shoe trees to maintain their shape and prevent creasing.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card border-0 h-100">
          <div class="card-body text-center">
            <div class="mb-3">
              <svg width="48" height="48" fill="currentColor" class="text-primary" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16">
                <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
              </svg>
            </div>
            <h3 class="h5">Rotation Is Key</h3>
            <p>Don't wear the same pair every day. Rotate between different sneakers to allow them to air out and extend their lifespan.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@push('styles')
<style>
  /* Estilos adicionales específicos para la página de accesorios */
  .bg-light {
    background-color: #f8f9fa;
  }
  .text-primary {
    color: #000 !important;
  }
</style>
@endpush
