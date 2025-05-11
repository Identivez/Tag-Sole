<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--
    Título dinámico de la página con valor predeterminado 'Mi App'
    @usage: @section('title', 'Título Personalizado')
  -->
  <title>@yield('title', 'TAG && SOLE')</title>

  <!-- Hojas de estilo principales -->
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

  <!-- jQuery para funcionalidad JavaScript -->
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

  <!--
    Inyección de estilos personalizados por página
    @usage: @section('styles') <link/style tags> @endsection
  -->
  @yield('styles')
</head>
<body>
  <!--
    Barra de navegación principal
    Contiene enlaces a las principales secciones del sistema
  -->
  <header>
    <nav>
      <a href="{{ route('dashboard') }}">Panel de Control</a> |
      <a href="{{ route('countries.index') }}">Países</a> |
      <a href="{{ route('entities.index') }}">Entidades</a> |
      <a href="{{ route('municipalities.index') }}">Municipios</a> |
      <a href="{{ route('users.index') }}">Usuarios</a> |
      <a href="{{ route('products.index') }}">Productos</a> |
      <a href="{{ route('orders.index') }}">Pedidos</a> |
      <a href="{{ route('locations.manage') }}">Gestión de Ubicaciones</a> |
      <a href="{{ route('locations.dynamic-data') }}">Datos Dinámicos</a>
    </nav>
  </header>

  <!--
    Contenedor principal con mensajes de estado y contenido dinámico
  -->
  <main class="container">
    <!--
      Muestra mensajes de éxito de operaciones realizadas (flash session)
      @usage: return redirect()->with('success', 'Operación completada');
    -->
    @if(session('success'))
      <div class="alert success">{{ session('success') }}</div>
    @endif

    <!--
      Contenido principal de la página
      @usage: @section('content') <contenido> @endsection
    -->
    @yield('content')
  </main>

  <!-- Pie de página con año actual -->
  <footer>
    <p>&copy; {{ date('Y') }} Mi Proyecto</p>
  </footer>

  <!--
    Sección para scripts personalizados por página
    @usage: @section('scripts') <script> código JS </script> @endsection
  -->
  @yield('scripts')
</body>
</html>
