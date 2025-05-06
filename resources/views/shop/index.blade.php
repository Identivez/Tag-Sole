<!-- resources/views/shop/index.blade.php -->
@extends('layouts.app')

@section('header')
    <h1 class="text-2xl font-semibold text-gray-800">
        {{ request()->routeIs('dashboard') ? __('Dashboard') : __('Tienda') }}
    </h1>
@endsection

@section('content')
<div class="container mx-auto py-8">
    {{-- Filtro de categorías --}}
    <form method="GET" action="{{ route('home') }}" class="mb-6">
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
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        @forelse($products as $product)
            <div class="bg-white rounded-lg shadow hover:shadow-lg transition p-4">
                <a href="{{ route('product.show', $product) }}">
                    <img src="{{ $product->ImageUrl ?? asset('images/placeholder.png') }}"
                         alt="{{ $product->Name }}"
                         class="rounded-t-lg object-cover w-full h-48">
                </a>
                <div class="mt-4">
                    <h3 class="text-lg font-semibold truncate">
                        <a href="{{ route('product.show', $product) }}">
                            {{ $product->Name }}
                        </a>
                    </h3>
                    <p class="text-gray-500 mt-1">
                        ${{ number_format($product->Price, 2) }}
                    </p>
                </div>
            </div>
        @empty
            <p class="col-span-full text-center text-gray-600">
                {{ __('No hay productos disponibles.') }}
            </p>
        @endforelse
    </div>

    {{-- Paginación --}}
    <div class="mt-8">
        {{ $products->links() }}
    </div>
</div>
@endsection
