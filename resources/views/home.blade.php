@extends('layouts.app')

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
                            <a href="{{ url('/moda') }}" class="text-uppercase light mt-3 d-inline-block text-hover fw-bold light-border">Shop Now</a>
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
                                    <a href="{{ url('/sneakers') }}" class="text-uppercase light mt-3 d-inline-block text-hover fw-bold light-border">Shop Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="card d-flex flex-row align-items-end border-0 jarallax-keep-img">
                                <img src="{{ asset('images/card-image3.jpg') }}" alt="shoes" class="img-fluid jarallax-img">
                                <div class="cart-concern p-3 m-3 p-lg-5 m-lg-5">
                                    <h2 class="card-title style-2 display-4 light">Fashion Shoes</h2>
                                    <a href="{{ url('/sneakers') }}" class="text-uppercase light mt-3 d-inline-block text-hover fw-bold light-border">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="card d-flex flex-row align-items-end border-0 large jarallax-keep-img">
                        <img src="{{ asset('images/card-image4.jpg') }}" alt="shoes" class="img-fluid jarallax-img">
                        <div class="cart-concern p-3 m-3 p-lg-5 m-lg-5">
                            <h2 class="card-title display-3 light">Stylish shoes for men</h2>
                            <a href="{{ url('/sneakers') }}" class="text-uppercase light mt-3 d-inline-block text-hover fw-bold light-border">Shop Now</a>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="row g-4">
                        <div class="col-lg-12 mb-4">
                            <div class="card d-flex flex-row align-items-end border-0 jarallax-keep-img">
                                <img src="{{ asset('images/card-image5.jpg') }}" alt="shoes" class="img-fluid jarallax-img">
                                <div class="cart-concern p-3 m-3 p-lg-5 m-lg-5">
                                    <h2 class="card-title style-2 display-4 light">Men Shoes</h2>
                                    <a href="{{ url('/sneakers') }}" class="text-uppercase light mt-3 d-inline-block text-hover fw-bold light-border">Shop Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="card d-flex flex-row align-items-end border-0 jarallax-keep-img">
                                <img src="{{ asset('images/card-image6.jpg') }}" alt="shoes" class="img-fluid jarallax-img">
                                <div class="cart-concern p-3 m-3 p-lg-5 m-lg-5">
                                    <h2 class="card-title style-2 display-4 light">Women Shoes</h2>
                                    <a href="{{ url('/sneakers') }}" class="text-uppercase light mt-3 d-inline-block text-hover fw-bold light-border">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="swiper-pagination"></div>
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
                @php
                    // Esta sección normalmente debería utilizar datos reales de productos
                    // Se recomienda usar una colección de productos obtenida del controlador
                    // Por ejemplo: @foreach($featuredProducts as $product)
                @endphp

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
                        </div>
                        <div class="card-detail d-flex justify-content-between align-items-center mt-3">
                            <h3 class="card-title fs-6 fw-normal m-0">
                                <a href="{{ route('products.index') }}">Running shoes for men</a>
                            </h3>
                            <span class="card-price fw-bold">$99</span>
                        </div>
                    </div>
                </div>

                <!-- Repetir para otros productos... -->
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
                        </div>
                        <div class="card-detail d-flex justify-content-between align-items-center mt-3">
                            <h3 class="card-title fs-6 fw-normal m-0">
                                <a href="{{ route('products.index') }}">Running shoes for men</a>
                            </h3>
                            <span class="card-price fw-bold">$99</span>
                        </div>
                    </div>
                </div>

                <!-- Se pueden agregar más productos aquí... -->
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
                        </div>
                        <div class="card-detail d-flex justify-content-between align-items-center mt-3">
                            <h3 class="card-title fs-6 fw-normal m-0">
                                <a href="{{ route('products.index') }}">Running shoes for men</a>
                            </h3>
                            <span class="card-price fw-bold">$99</span>
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
                        </div>
                        <div class="card-detail d-flex justify-content-between align-items-center mt-3">
                            <h3 class="card-title fs-6 fw-normal m-0">
                                <a href="{{ route('products.index') }}">Running shoes for men</a>
                            </h3>
                            <span class="card-price fw-bold">$99</span>
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
                        </div>
                        <div class="card-detail d-flex justify-content-between align-items-center mt-3">
                            <h3 class="card-title fs-6 fw-normal m-0">
                                <a href="{{ route('products.index') }}">Running shoes for men</a>
                            </h3>
                            <span class="card-price fw-bold">$99</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="collection-products" class="py-2 my-2 py-md-5 my-md-5">
    <div class="container-md">
        <div class="row">
            <div class="col-lg-6 col-md-6 mb-4">
                <div class="collection-card card border-0 d-flex flex-row align-items-end jarallax-keep-img">
                    <img src="{{ asset('images/collection-item1.jpg') }}" alt="product-item" class="border-rounded-10 img-fluid jarallax-img">
                    <div class="card-detail p-3 m-3 p-lg-5 m-lg-5">
                        <h3 class="card-title display-3">
                            <a href="#">Minimal Collection</a>
                        </h3>
                        <a href="{{ url('/sneakers') }}" class="text-uppercase mt-3 d-inline-block text-hover fw-bold">Shop Now</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="collection-card card border-0 d-flex flex-row jarallax-keep-img">
                    <img src="{{ asset('images/collection-item2.jpg') }}" alt="product-item" class="border-rounded-10 img-fluid jarallax-img">
                    <div class="card-detail p-3 m-3 p-lg-5 m-lg-5">
                        <h3 class="card-title display-3">
                            <a href="#">Sneakers Collection</a>
                        </h3>
                        <a href="{{ url('/sneakers') }}" class="text-uppercase mt-3 d-inline-block text-hover fw-bold">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="latest-products" class="product-store py-2 my-2 py-md-5 my-md-5 pt-0">
    <div class="container-md">
        <div class="display-header d-flex align-items-center justify-content-between">
            <h2 class="section-title text-uppercase">Latest Products</h2>
            <div class="btn-right">
                <a href="{{ url('/sneakers') }}" class="d-inline-block text-uppercase text-hover fw-bold">View all</a>
            </div>
        </div>
        <div class="product-content padding-small">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5">
                @php
                    // Esta sección normalmente debería utilizar datos reales de los últimos productos
                    // Se recomienda usar una colección de productos obtenida del controlador
                    // Por ejemplo: @foreach($latestProducts as $product)
                @endphp

                <!-- Productos más recientes... -->
                <div class="col mb-4 mb-3">
                    <div class="product-card position-relative">
                        <div class="card-img">
                            <img src="{{ asset('images/card-item6.jpg') }}" alt="product-item" class="product-image img-fluid">
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
                                <a href="{{ route('products.index') }}">Running shoes for men</a>
                            </h3>
                            <span class="card-price fw-bold">$99</span>
                        </div>
                    </div>
                </div>

                <!-- Agregar más productos recientes aquí... -->
                <div class="col mb-4 mb-3">
                    <div class="product-card position-relative">
                        <div class="card-img">
                            <img src="{{ asset('images/card-item7.jpg') }}" alt="product-item" class="product-image img-fluid">
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
                                <a href="{{ route('products.index') }}">Running shoes for men</a>
                            </h3>
                            <span class="card-price fw-bold">$99</span>
                        </div>
                    </div>
                </div>

                <!-- Continuar con los demás productos... -->
                <div class="col mb-4 mb-3">
                    <div class="product-card position-relative">
                        <div class="card-img">
                            <img src="{{ asset('images/card-item8.jpg') }}" alt="product-item" class="product-image img-fluid">
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
                                <a href="{{ route('products.index') }}">Running shoes for men</a>
                            </h3>
                            <span class="card-price fw-bold">$99</span>
                        </div>
                    </div>
                </div>

                <div class="col mb-4 mb-3">
                    <div class="product-card position-relative">
                        <div class="card-img">
                            <img src="{{ asset('images/card-item9.jpg') }}" alt="product-item" class="product-image img-fluid">
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
                                <a href="{{ route('products.index') }}">Running shoes for men</a>
                            </h3>
                            <span class="card-price fw-bold">$99</span>
                        </div>
                    </div>
                </div>

                <div class="col mb-4 mb-3">
                    <div class="product-card position-relative">
                        <div class="card-img">
                            <img src="{{ asset('images/card-item10.jpg') }}" alt="product-item" class="product-image img-fluid">
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
                                <a href="{{ route('products.index') }}">Running shoes for men</a>
                            </h3>
                            <span class="card-price fw-bold">$99</span>
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
