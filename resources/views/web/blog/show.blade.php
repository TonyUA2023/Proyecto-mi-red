@extends('layout.app')

@php
  // "Base de datos" temporal (luego esto viene desde DB)
  $posts = [
    'que-es-fibra-optica' => [
      'title' => '¿Qué es la fibra óptica y por qué es mejor?',
      'description' => 'Entiende por qué la fibra óptica ofrece mejor estabilidad, velocidad y experiencia que otras tecnologías.',
      'date' => '2026-01-22',
      'content' => [
        'La fibra óptica (FTTH) lleva la señal mediante luz a través de hilos de vidrio, logrando mayor estabilidad y velocidad.',
        'Es ideal para streaming, clases virtuales, trabajo remoto y videojuegos por su menor latencia y mejor consistencia.',
        'Si quieres saber si llega a tu zona en Huancayo, revisa nuestra cobertura o escríbenos por WhatsApp.'
      ],
    ],
    'como-elegir-plan-internet' => [
      'title' => 'Cómo elegir el plan ideal según tu hogar',
      'description' => 'Una guía simple para elegir Mbps según cuántas personas y dispositivos usan internet.',
      'date' => '2026-01-22',
      'content' => [
        'Si en casa estudian y ven streaming al mismo tiempo, un plan intermedio suele ser suficiente.',
        'Para gaming y varios dispositivos conectados, conviene más velocidad y estabilidad.',
        'Recuerda que la calidad también depende del router y la ubicación.'
      ],
    ],
  ];

  $post = $posts[$slug] ?? null;

  $seo = [
    'title' => ($post['title'] ?? 'Artículo no encontrado') . ' | Blog Mi Red Huancayo',
    'description' => $post['description'] ?? 'Contenido sobre internet, fibra óptica y tecnología.',
  ];
@endphp

@section('content')
<section style="padding:48px 0">
  <div class="container">
    @if(!$post)
      <div class="card">
        <h1 style="font-size:30px;font-weight:900;margin:0 0 10px">Artículo no encontrado</h1>
        <p style="color:var(--muted);margin:0 0 18px">
          El enlace puede estar mal o el artículo fue movido.
        </p>
        <a class="btn btn-primary" href="{{ route('web.blog.index') }}">Volver al blog</a>
      </div>
    @else
      <div style="max-width:860px">
        <a href="{{ route('web.blog.index') }}" style="color:var(--muted)">← Volver al blog</a>

        <h1 style="font-size:40px;line-height:1.1;font-weight:900;margin:12px 0 10px">
          {{ $post['title'] }}
        </h1>

        <div style="display:flex;gap:12px;flex-wrap:wrap;color:var(--muted);font-size:13px;margin-bottom:18px">
          <span>📅 {{ \Carbon\Carbon::parse($post['date'])->format('d/m/Y') }}</span>
          <span>🏷️ Mi Red Huancayo</span>
          <span>⚡ Fibra óptica</span>
        </div>

        <div class="card" style="padding:22px">
          <p style="color:var(--muted);font-size:16px;margin-top:0">
            {{ $post['description'] }}
          </p>

          @foreach($post['content'] as $paragraph)
            <p style="font-size:16px;line-height:1.8;color:rgba(255,255,255,.92)">
              {{ $paragraph }}
            </p>
          @endforeach

          <div style="margin-top:22px;display:flex;gap:12px;flex-wrap:wrap">
            <a class="btn btn-primary" href="{{ route('web.cobertura') }}">Ver cobertura</a>
            <a class="btn btn-ghost" href="{{ route('web.planes') }}">Ver planes</a>
          </div>
        </div>

        <div class="card" style="margin-top:16px">
          <h3 style="margin:0 0 8px;font-weight:900">¿Quieres que te asesoremos?</h3>
          <p style="margin:0;color:var(--muted)">
            Escríbenos y validamos cobertura en tu zona.
          </p>
          <div style="margin-top:12px">
            <a class="btn btn-primary" target="_blank" href="https://wa.me/51999999999">WhatsApp</a>
          </div>
        </div>
      </div>
    @endif
  </div>
</section>
@endsection
