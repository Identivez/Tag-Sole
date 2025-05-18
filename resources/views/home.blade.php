@extends('layouts.app')

@section('title', 'Inicio - Sneakers Market')

@section('header')
<h1 class="display-4 fw-bold">Sneakers Market</h1>
<p class="lead">La mejor tienda de zapatillas deportivas</p>
@endsection

@section('content')
<section id="intro" class="position-relative mt-4">
  <div class="container-lg">
    <div class="swiper main-swiper">
      <div class="swiper-wrapper">
        <div class="swiper-slide">
          <div class="card d-flex flex-row align-items-end border-0 large jarallax-keep-img">
            <img src="{{ asset('images/card-image1.jpg') }}" alt="shoes" class="img-fluid jarallax-img">
            <div class="cart-concern p-3 m-3 p-lg-5 m-lg-5">
              <h2 class="card-title display-3 light">Stylish shoes for Women</h2>
              <a href="{{ url('/moda') }}"
                class="text-uppercase light mt-3 d-inline-block text-hover fw-bold light-border">Shop Now</a>
            </div>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="row g-4">
            <div class="col-lg-12 mb-4">
              <div class="card d-flex flex-row align-items-end border-0 jarallax-keep-img">
                <img src="{{ asset('images/card-image2.jpg') }}" alt="shoes" class="img-fluid jarallax-img">
                <div class="cart-concern p-3 m-3 p-lg-5 m-lg-5">
                  <h2 class="card-title style-2 display-4 light">Sports Wear</h2>
                  <a href="{{ url('/sneakers') }}"
                    class="text-uppercase light mt-3 d-inline-block text-hover fw-bold light-border">Shop Now</a>
                </div>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="card d-flex flex-row align-items-end border-0 jarallax-keep-img">
                <img src="{{ asset('images/card-image3.jpg') }}" alt="shoes" class="img-fluid jarallax-img">
                <div class="cart-concern p-3 m-3 p-lg-5 m-lg-5">
                  <h2 class="card-title style-2 display-4 light">Fashion Shoes</h2>
                  <a href="{{ url('/sneakers') }}"
                    class="text-uppercase light mt-3 d-inline-block text-hover fw-bold light-border">Shop Now</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="swiper-pagination"></div>
    </div>
  </div>
</section>

<section class="discount-coupon py-2 my-2 py-md-5 my-md-5">
  <div class="container">
    <div class="bg-gray coupon position-relative p-5">
      <div class="bold-text position-absolute">10% OFF</div>
      <div class="row justify-content-between align-items-center">
        <div class="col-lg-7 col-md-12 mb-3">
          <div class="coupon-header">
            <h2 class="display-7">10% OFF Discount Coupons</h2>
            <p class="m-0">Subscribe us to get 10% OFF on all the purchases</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-12">
          <div class="btn-wrap">
            <a href="#" class="btn btn-black btn-medium text-uppercase hvr-sweep-to-right">Email me</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="featured-products" class="product-store">
  <div class="container-md">
    <div class="display-header d-flex align-items-center justify-content-between">
      <h2 class="section-title text-uppercase">Featured Products</h2>
      <div class="btn-right">
        <a href="{{ url('/sneakers') }}" class="d-inline-block text-uppercase text-hover fw-bold">View all</a>
      </div>
    </div>
    <div class="product-content padding-small">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5">
        <div class="col mb-4">
          <div class="product-card position-relative">
            <div class="card-img">
              <img src="{{ asset('images/card-item1.jpg') }}" alt="product-item" class="product-image img-fluid">
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
              <!-- cart-concern -->
            </div>
            <div class="card-detail d-flex justify-content-between align-items-center mt-3">
              <h3 class="card-title fs-6 fw-normal m-0">
                <a href="#">Running shoes for men</a>
              </h3>
              <span class="card-price fw-bold">$99</span>
            </div>
          </div>
        </div>
        <div class="col mb-4">
          <div class="product-card position-relative">
            <div class="card-img">
              <img src="{{ asset('images/card-item2.jpg') }}" alt="product-item" class="product-image img-fluid">
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
              <!-- cart-concern -->
            </div>
            <div class="card-detail d-flex justify-content-between align-items-center mt-3">
              <h3 class="card-title fs-6 fw-normal m-0">
                <a href="#">Athletic shoes for men</a>
              </h3>
              <span class="card-price fw-bold">$129</span>
            </div>
          </div>
        </div>
        <div class="col mb-4">
          <div class="product-card position-relative">
            <div class="card-img">
              <img src="{{ asset('images/card-item3.jpg') }}" alt="product-item" class="product-image img-fluid">
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
              <!-- cart-concern -->
            </div>
            <div class="card-detail d-flex justify-content-between align-items-center mt-3">
              <h3 class="card-title fs-6 fw-normal m-0">
                <a href="#">Training shoes for men</a>
              </h3>
              <span class="card-price fw-bold">$89</span>
            </div>
          </div>
        </div>
        <div class="col mb-4">
          <div class="product-card position-relative">
            <div class="card-img">
              <img src="{{ asset('images/card-item4.jpg') }}" alt="product-item" class="product-image img-fluid">
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
              <!-- cart-concern -->
            </div>
            <div class="card-detail d-flex justify-content-between align-items-center mt-3">
              <h3 class="card-title fs-6 fw-normal m-0">
                <a href="#">Running shoes for women</a>
              </h3>
              <span class="card-price fw-bold">$95</span>
            </div>
          </div>
        </div>
        <div class="col mb-4">
          <div class="product-card position-relative">
            <div class="card-img">
              <img src="{{ asset('images/card-item5.jpg') }}" alt="product-item" class="product-image img-fluid">
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
              <!-- cart-concern -->
            </div>
            <div class="card-detail d-flex justify-content-between align-items-center mt-3">
              <h3 class="card-title fs-6 fw-normal m-0">
                <a href="#">Casual shoes for women</a>
              </h3>
              <span class="card-price fw-bold">$79</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@push('styles')
<style>
  /* Estilos adicionales específicos para la página de inicio */
  .bold-text {
    font-size: 4em;
    opacity: 0.1;
    top: 10px;
    right: 10px;
    font-weight: 900;
  }
</style>
@endpush

@push('scripts')
<script>
  // Scripts adicionales específicos para la página de inicio
  document.addEventListener('DOMContentLoaded', function() {
    // Inicializar el carrusel si existe
    if (document.querySelector('.main-swiper')) {
      var swiper = new Swiper('.main-swiper', {
        pagination: {
          el: '.swiper-pagination',
          clickable: true,
        },
      });
    }
  });
</script>
@endpush
