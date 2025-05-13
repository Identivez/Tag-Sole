<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Mi App')</title>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
  <!-- Font Awesome para iconos -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
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
      <a href="{{ route('products.ajax') }}">Productos (AJAX)</a> |
      <a href="{{ route('orders.index') }}">Pedidos</a> |

    </nav>
  </header>

  <main class="container">
    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @yield('content')
  </main>

  <footer>
    <p>&copy; {{ date('Y') }} Mi Proyecto</p>
  </footer>

  <!-- Sección para scripts personalizados -->
  @yield('scripts')
</body>
</html>
