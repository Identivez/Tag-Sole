@extends('layouts.app')

@section('title', 'Inicio')

@section('content')
<section class="py-5 my-5">
  <div class="container">
    <div class="text-center mb-5">
      <h1 class="display-4 fw-bold">Bienvenido a Sneakers Market</h1>
      <p class="lead">Compra y vende sneakers originales al mejor precio, como en StockX</p>
    </div>

    <div class="row row-cols-1 row-cols-md-3 g-4">
      <div class="col">
        <div class="card h-100 text-center">
          <img src="{{ asset('images/card-item1.jpg') }}" class="card-img-top" alt="Sneaker 1">
          <div class="card-body">
            <h5 class="card-title">Nike Air Max</h5>
            <p class="card-text">$120.00</p>
            <a href="#" class="btn btn-black">Ver producto</a>
          </div>
        </div>
      </div>

      <div class="col">
        <div class="card h-100 text-center">
          <img src="{{ asset('images/card-item2.jpg') }}" class="card-img-top" alt="Sneaker 2">
          <div class="card-body">
            <h5 class="card-title">Adidas Yeezy Boost</h5>
            <p class="card-text">$280.00</p>
            <a href="#" class="btn btn-black">Ver producto</a>
          </div>
        </div>
      </div>

      <div class="col">
        <div class="card h-100 text-center">
          <img src="{{ asset('images/card-item3.jpg') }}" class="card-img-top" alt="Sneaker 3">
          <div class="card-body">
            <h5 class="card-title">Jordan 1 Retro</h5>
            <p class="card-text">$210.00</p>
            <a href="#" class="btn btn-black">Ver producto</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
