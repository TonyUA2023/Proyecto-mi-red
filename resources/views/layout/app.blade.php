<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  @include('layout.seo', ['seo' => $seo ?? []])

  {{-- Tipografía --}}
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;700;800&display=swap" rel="stylesheet">

  {{-- ✅ Opción B: Vite (CSS + JS) --}}
  @vite(['resources/css/app.css', 'resources/js/app.js'])


  {{-- ✅ Si aún quieres estilos por página (opcional) --}}
  @stack('styles')
</head>

<body>
  {{-- LOADING --}}
  @include('layout.partials.loading')

  {{-- HEADER --}}
  @include('layout.partials.header')

  <main>
    @yield('content')
  </main>

  {{-- FOOTER --}}
  @include('layout.partials.footer')

  {{-- ✅ scripts por página (hero u otros) --}}
  @stack('scripts')
</body>
</html>
