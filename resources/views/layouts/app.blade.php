<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Mi App')</title>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
  <header>
    <nav>
      <a href="{{ route('countries.index') }}">Países</a> |
      <a href="{{ route('entities.index') }}">Entidades</a> |
      <!-- añade aquí más enlaces -->
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
