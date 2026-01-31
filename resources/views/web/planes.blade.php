@extends('layout.app')

@php
$seo = [
  'title' => 'Planes de Internet Fibra Óptica en Huancayo | Mi Red',
  'description' => 'Conoce nuestros planes de internet fibra óptica en Huancayo. Velocidad estable, soporte confiable y precios accesibles.',
];

$plans = [
  ['tag'=>'Esencial', 'name'=>'Hogar', 'mbps'=>20, 'price'=>'S/.50', 'desc'=>'Ideal para navegación, redes y clases.'],
  ['tag'=>'Recomendado', 'name'=>'Plus', 'mbps'=>30, 'price'=>'S/.70', 'desc'=>'Streaming y trabajo remoto sin cortes.', 'featured'=>true],
  ['tag'=>'Potencia', 'name'=>'Pro', 'mbps'=>40, 'price'=>'S/.90', 'desc'=>'Gaming y múltiples dispositivos.'],
];
@endphp

@section('content')
  {{-- Empuja el contenido por el header fixed (asegúrate que exista) --}}
  <div class="header-spacer" aria-hidden="true"></div>

  <main class="plans-page">
    <section class="plans">
      <div class="container plans__container">

        {{-- Encabezado --}}
        <header class="plans__head">
          <div class="plans__headLeft">
            <p class="plans__kicker">Mi Red Huancayo • 100% Fibra Óptica</p>
            <h1 class="plans__title">Planes de Internet</h1>
            <p class="plans__subtitle">
              Elige el plan ideal para tu hogar o negocio. Conexión estable, soporte confiable y activación rápida.
            </p>
          </div>

          <aside class="plans__badge" aria-label="Información de red">
            <span class="plans__badgeTop">Baja latencia</span>
            <span class="plans__badgeBig">FTTH</span>
            <span class="plans__badgeBot">Fibra directa</span>
          </aside>
        </header>

        {{-- Grid de planes --}}
        <div class="plans__grid" role="list">
          @foreach($plans as $plan)
            <article class="plan-card {{ !empty($plan['featured']) ? 'is-featured' : '' }}" role="listitem">
              <div class="plan-card__top">
                <div class="plan-card__meta">
                  <p class="plan-card__tag">{{ $plan['tag'] }}</p>
                  <h2 class="plan-card__name">Plan {{ $plan['name'] }}</h2>
                </div>

                <div class="plan-card__speed" aria-label="Velocidad del plan">
                  <span class="plan-card__speedNum">{{ $plan['mbps'] }}</span>
                  <span class="plan-card__speedUnit">Mbps</span>
                </div>
              </div>

              <p class="plan-card__desc">{{ $plan['desc'] }}</p>

              <div class="plan-card__priceRow" aria-label="Precio del plan">
                <span class="plan-card__price">{{ $plan['price'] }}</span>
                <span class="plan-card__per">/ mes</span>
              </div>

              <ul class="plan-card__features">
                <li>Fibra óptica real (FTTH)</li>
                <li>Soporte técnico</li>
                <li>Instalación rápida</li>
              </ul>

              <div class="plan-card__actions">
                <a class="btn btn-primary plan-card__btn" href="{{ route('web.contacto') }}">
                  Contratar
                </a>

                <a class="plan-card__link" href="{{ route('web.cobertura') }}">
                  Ver cobertura →
                </a>
              </div>
            </article>
          @endforeach
        </div>

        {{-- Nota --}}
        <footer class="plans__foot">
          <p class="plans__note">
            *Sujeto a cobertura. Velocidades referenciales según zona y condiciones de red.
          </p>
        </footer>

      </div>
    </section>
  </main>
@endsection
