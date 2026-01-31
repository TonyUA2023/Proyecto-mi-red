@extends('layout.app')

@php
$seo = [
  'title' => 'Blog | Internet y Tecnología en Huancayo',
  'description' => 'Consejos sobre internet, velocidad, routers y fibra óptica en Huancayo.',
];

$posts = [
  [
    'slug' => 'que-es-fibra-optica',
    'title' => '¿Qué es la fibra óptica y por qué es mejor?',
    'excerpt' => 'Ventajas reales de FTTH para streaming, gaming y trabajo remoto.',
  ],
  [
    'slug' => 'como-elegir-plan-internet',
    'title' => 'Cómo elegir el plan ideal según tu hogar',
    'excerpt' => 'Guía rápida para elegir Mbps según personas y dispositivos.',
  ],
];
@endphp

@section('content')
<section style="padding:48px 0">
  <div class="container">
    <h1 style="font-size:36px;font-weight:900">Blog</h1>
    <p style="color:var(--muted)">Contenido útil sobre internet y tecnología.</p>

    <div class="grid grid-3" style="margin-top:32px">
      @foreach($posts as $p)
        <a class="card" href="{{ route('web.blog.show', $p['slug']) }}">
          <h3 style="margin-top:0">{{ $p['title'] }}</h3>
          <p style="color:var(--muted)">{{ $p['excerpt'] }}</p>
          <div style="margin-top:10px;font-weight:900;color:var(--red)">Leer más →</div>
        </a>
      @endforeach
    </div>
  </div>
</section>
@endsection
