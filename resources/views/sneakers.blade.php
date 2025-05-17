@extends('layouts.app')

@section('title', 'Sneakers')

@section('content')
<section class="py-5">
  <div class="container">
    <h1 class="display-5 mb-4">Sneakers disponibles</h1>
    <div class="row row-cols-1 row-cols-md-3 g-4">
      {{-- Aquí puedes usar un foreach si luego cargas desde DB --}}
      <div class="col">
        <div class="card h-100">
          <img src="{{ asset('images/card-item1.jpg') }}" class="card-img-top" alt="Nike">
          <div class="card-body text-center">
            <h5 class="card-title">Nike Air Force</h5>
            <p>$130.00</p>
            <a href="#" class="btn btn-black">Ver producto</a>
          </div>
        </div>
      </div>
      <!-- Repite más productos... -->
    </div>
  </div>
</section>
@endsection
