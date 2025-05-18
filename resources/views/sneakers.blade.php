@extends('layouts.app')

@section('title', 'Sneakers Collection')

@section('header')
<div class="text-center">
  <h1 class="display-4 fw-bold">Sneakers Collection</h1>
  <p class="lead">Explore our exclusive collection of the latest and greatest sneakers</p>
</div>
@endsection

@section('content')
<section class="product-store py-5">
  <div class="container">
    <div class="row mb-4">
      <div class="col-md-3">
        <div class="card mb-4">
          <div class="card-header">
            <h5 class="mb-0">Filter by</h5>
          </div>
          <div class="card-body">
            <h6 class="text-uppercase mb-3">Categories</h6>
            <ul class="list-unstyled mb-4">
              <li class="mb-2"><a href="#" class="text-dark">Running</a></li>
              <li class="mb-2"><a href="#" class="text-dark">Basketball</a></li>
              <li class="mb-2"><a href="#" class="text-dark">Training</a></li>
              <li class="mb-2"><a href="#" class="text-dark">Lifestyle</a></li>
              <li class="mb-2"><a href="#" class="text-dark">Skateboarding</a></li>
            </ul>

            <h6 class="text-uppercase mb-3">Brands</h6>
            <div class="mb-4">
              <div class="form-check mb-2">
                <input class="form-check-input" type="checkbox" value="" id="brand1">
                <label class="form-check-label" for="brand1">Nike</label>
              </div>
              <div class="form-check mb-2">
                <input class="form-check-input" type="checkbox" value="" id="brand2">
                <label class="form-check-label" for="brand2">Adidas</label>
              </div>
              <div class="form-check mb-2">
                <input class="form-check-input" type="checkbox" value="" id="brand3">
                <label class="form-check-label" for="brand3">New Balance</label>
              </div>
              <div class="form-check mb-2">
                <input class="form-check-input" type="checkbox" value="" id="brand4">
                <label class="form-check-label" for="brand4">Puma</label>
              </div>
              <div class="form-check mb-2">
                <input class="form-check-input" type="checkbox" value="" id="brand5">
                <label class="form-check-label" for="brand5">Jordan</label>
              </div>
            </div>

            <h6 class="text-uppercase mb-3">Price Range</h6>
            <div class="price-range-slider mb-4">
              <input type="range" class="form-range" min="0" max="500" id="priceRange">
              <div class="d-flex justify-content-between mt-2">
                <span>$0</span>
                <span>$500</span>
              </div>
            </div>

            <button class="btn btn-black w-100 text-uppercase hvr-sweep-to-right">Apply Filters</button>
          </div>
        </div>
      </div>

      <div class="col-md-9">
        <div class="row mb-3">
          <div class="col-md-8">
            <h2 class="h4 mb-0">All Sneakers</h2>
            <p class="text-muted">Showing 1-12 of 36 results</p>
          </div>
          <div class="col-md-4">
            <select class="form-select">
              <option>Sort by featured</option>
              <option>Price: Low to High</option>
              <option>Price: High to Low</option>
              <option>Newest Arrivals</option>
            </select>
          </div>
        </div>

        <div class="row row-cols-1 row-cols-md-3 g-4">
          <!-- Product card 1 -->
          <div class="col">
            <div class="product-card position-relative">
              <div class="card-img">
                <img src="{{ asset('images/card-item1.jpg') }}" alt="Nike Air Max" class="product-image img-fluid">
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
                  <a href="#">Nike Air Max 90</a>
                </h3>
                <span class="card-price fw-bold">$120</span>
              </div>
            </div>
          </div>

          <!-- Product card 2 -->
          <div class="col">
            <div class="product-card position-relative">
              <div class="card-img">
                <img src="{{ asset('images/card-item2.jpg') }}" alt="Adidas Ultraboost" class="product-image img-fluid">
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
                  <a href="#">Adidas Ultraboost 22</a>
                </h3>
                <span class="card-price fw-bold">$180</span>
              </div>
            </div>
          </div>

          <!-- Product card 3 -->
          <div class="col">
            <div class="product-card position-relative">
              <div class="card-img">
                <img src="{{ asset('images/card-item3.jpg') }}" alt="Jordan Retro" class="product-image img-fluid">
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
                  <a href="#">Jordan 1 Retro High OG</a>
                </h3>
                <span class="card-price fw-bold">$170</span>
              </div>
            </div>
          </div>

          <!-- Product card 4 -->
          <div class="col">
            <div class="product-card position-relative">
              <div class="card-img">
                <img src="{{ asset('images/card-item4.jpg') }}" alt="New Balance" class="product-image img-fluid">
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
                  <a href="#">New Balance 990v5</a>
                </h3>
                <span class="card-price fw-bold">$185</span>
              </div>
            </div>
          </div>

          <!-- Product card 5 -->
          <div class="col">
            <div class="product-card position-relative">
              <div class="card-img">
                <img src="{{ asset('images/card-item5.jpg') }}" alt="Puma RS-X" class="product-image img-fluid">
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
                  <a href="#">Puma RS-X Toys</a>
                </h3>
                <span class="card-price fw-bold">$110</span>
              </div>
            </div>
          </div>

          <!-- Product card 6 -->
          <div class="col">
            <div class="product-card position-relative">
              <div class="card-img">
                <img src="{{ asset('images/card-item6.jpg') }}" alt="Vans Old Skool" class="product-image img-fluid">
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
                  <a href="#">Vans Old Skool</a>
                </h3>
                <span class="card-price fw-bold">$65</span>
              </div>
            </div>
          </div>
        </div>

        <!-- Pagination -->
        <div class="mt-5">
          <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center">
              <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
              </li>
              <li class="page-item active"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item">
                <a class="page-link" href="#">Next</a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
