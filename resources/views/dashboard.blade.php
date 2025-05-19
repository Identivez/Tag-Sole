@extends('layouts.app')

@section('title', 'Dashboard')

@section('header')
<h1 class="display-4">Panel de control</h1>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="card mb-4">
                <div class="card-header">Menú</div>
                <div class="list-group list-group-flush">
                    <a href="{{ route('profile.edit') }}" class="list-group-item list-group-item-action">Perfil</a>
                    <a href="{{ route('user.orders') }}" class="list-group-item list-group-item-action">Mis pedidos</a>
                    <a href="{{ route('user.favorites') }}" class="list-group-item list-group-item-action">Favoritos</a>
                    <a href="{{ route('user.addresses') }}" class="list-group-item list-group-item-action">Direcciones</a>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Información general</div>
                <div class="card-body">
                    <p class="card-text">¡Bienvenido a tu panel de control!</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
