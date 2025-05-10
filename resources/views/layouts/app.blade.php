<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Mi App')</title>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>
<body>
  <header>
    <nav>
      <a href="{{ route('dashboard') }}">Panel de Control</a> |
      <a href="{{ route('countries.index') }}">Países</a> |
      <a href="{{ route('entities.index') }}">Entidades</a> |
      <a href="{{ route('municipalities.index') }}">Municipios</a> |
      <a href="{{ route('users.index') }}">Usuarios</a> |
      <a href="{{ route('products.index') }}">Productos</a> |
      <a href="{{ route('orders.index') }}">Pedidos</a>
    </nav>
  </header>

  <main class="container">
    @if(session('success'))
      <div class="alert success">{{ session('success') }}</div>
    @endif

    @yield('content')
  </main>

  <footer>
    <p>&copy; {{ date('Y') }} Mi Proyecto</p>
  </footer>
</body>
</html>
