@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    {{-- Filtro de categorías --}}
    <form method="GET" action="{{ route('home') }}" class="mb-6 mt-4">
        <select name="CategoryId"
                onchange="this.form.submit()"
                class="border border-gray-300 rounded p-2">
            <option value="">{{ __('Todas las categorías') }}</option>
            @foreach($categories as $id => $name)
                <option value="{{ $id }}" {{ request('CategoryId') == $id ? 'selected' : '' }}>
                    {{ $name }}
                </option>
            @endforeach
        </select>
    </form>

    {{-- Grid de productos --}}
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
        @forelse($products as $product)
            <div class="col">
                <div class="product-card position-relative">
                    <div class="card-img">
                        <a href="{{ route('product.show', $product) }}">
                            <img src="{{ $product->ImageUrl ?? asset('images/card-item1.jpg') }}"
                                 alt="{{ $product->Name }}"
                                 class="product-image img-fluid">
                        </a>
                        <div class="cart-concern position-absolute d-flex justify-content-center">
                            <div class="cart-button d-flex gap-2 justify-content-center align-items-center">
                                <form action="{{ route('cart.add') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="ProductId" value="{{ $product->ProductId }}">
                                    <input type="hidden" name="Quantity" value="1">
                                    <button type="submit" class="btn btn-light">
                                        <svg class="shopping-carriage">
                                            <use xlink:href="#shopping-carriage"></use>
                                        </svg>
                                    </button>
                                </form>
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
                            <a href="{{ route('product.show', $product) }}">
                                {{ $product->Name }}
                            </a>
                        </h3>
                        <span class="card-price fw-bold">${{ number_format($product->Price, 2) }}</span>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center py-4">
                <p>{{ __('No hay productos disponibles.') }}</p>
            </div>
        @endforelse
    </div>

    {{-- Paginación --}}
    <div class="mt-8">
        {{ $products->links() }}
    </div>
</div>
@endsection
