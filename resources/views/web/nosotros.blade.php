@extends('layout.app')

@php
$seo = [
  'title' => 'Nosotros | Mi Red Huancayo – Internet Fibra Óptica',
  'description' => 'Conoce Mi Red Huancayo, proveedor local de internet fibra óptica. Conectamos hogares y negocios con velocidad y estabilidad.',
];

// Imagen hero (recomendado PNG recortado)
$heroImg = asset('images/landing/hero-nosotros.png');
@endphp

@section('content')

  {{-- Spacer para header fixed --}}
  <div class="header-spacer" aria-hidden="true"></div>

  <main class="aboutx-page">

    {{-- HERO split (rojo/negro/blanco) --}}
    <section class="aboutx-hero" aria-label="Quiénes somos">
      <div class="container aboutx-hero__container">
        <div class="aboutx-hero__grid">

          {{-- Left --}}
          <div class="aboutx-hero__left">
            <p class="aboutx-hero__pill">MI RED HUANCAYO</p>

            <h1 class="aboutx-hero__title">¿QUIÉNES SOMOS?</h1>

            <p class="aboutx-hero__text">
              <strong>Mi Red Huancayo</strong> es un proveedor local de internet que nace con un objetivo claro:
              brindar una conexión <strong>rápida, estable y accesible</strong> con <strong>fibra óptica directa (FTTH)</strong>
              para hogares y negocios en Huancayo y distritos aledaños.
              <br><br>
              Apostamos por una experiencia superior para <strong>streaming, clases virtuales, videollamadas, trabajo remoto</strong>
              y <strong>gaming</strong>, con soporte cercano y atención personalizada.
            </p>
          </div>

          {{-- Right --}}
          <div class="aboutx-hero__right" aria-hidden="true">
            <div class="aboutx-hero__imageWrap">
              <img class="aboutx-hero__image" src="{{ $heroImg }}" alt="Mi Red Huancayo" loading="eager" decoding="async">
            </div>
          </div>

        </div>
      </div>
    </section>

    {{-- PROPÓSITO / MISIÓN / VISIÓN / VALORES --}}
    <section class="aboutx-purpose" aria-label="Nuestro propósito">
      <div class="container">

        {{-- Propósito --}}
        <header class="purposex">
          <p class="purposex__pill">NUESTRO PROPÓSITO</p>
          <h2 class="purposex__title">
            Conectamos personas <span>sin interrupciones</span>.
          </h2>
          <p class="purposex__subtitle">
            Con una red local de <strong>fibra óptica (FTTH)</strong>, construimos una conexión estable para hogares,
            familias y gamers, con atención cercana y soporte rápido.
          </p>
        </header>

        {{-- Misión / Visión --}}
        <section class="mvx" aria-label="Misión y visión">
          <div class="mvx__line" aria-hidden="true">
            <span class="mvx__node"></span>
          </div>

          <div class="mvx__grid">
            <article class="mvx__col">
              <h3 class="mvx__title">MISIÓN</h3>
              <p class="mvx__text">
                Brindar internet <strong>confiable, veloz y accesible</strong> mediante fibra óptica directa (FTTH),
                para que nuestros clientes estudien, trabajen, emprendan y disfruten de streaming y gaming con baja latencia.
              </p>
            </article>

            <article class="mvx__col">
              <h3 class="mvx__title">VISIÓN</h3>
              <p class="mvx__text">
                Ser el proveedor local referente en <strong>Huancayo</strong> por calidad de servicio, cercanía,
                y crecimiento sostenible de la red, ofreciendo una experiencia superior en conectividad.
              </p>
            </article>
          </div>
        </section>

        {{-- Valores --}}
        <section class="valuesx" aria-label="Nuestros valores">
          <div class="valuesx__head">
            <p class="valuesx__pill">NUESTROS VALORES</p>
            <p class="valuesx__hint">La forma en que trabajamos todos los días.</p>
          </div>

          <div class="valuesx__track" aria-hidden="true"></div>

          <div class="valuesx__grid">
            <article class="valuex">
              <div class="valuex__icon" aria-hidden="true">
                <svg viewBox="0 0 24 24" fill="none">
                  <path d="M12 2l8 4v6c0 5-3.5 9.4-8 10-4.5-.6-8-5-8-10V6l8-4z" stroke="currentColor" stroke-width="2"/>
                  <path d="M9 12l2 2 4-5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
              </div>
              <p class="valuex__label">CONFIABLES</p>
              <p class="valuex__desc">Conexión estable y trabajo serio.</p>
            </article>

            <article class="valuex">
              <div class="valuex__icon" aria-hidden="true">
                <svg viewBox="0 0 24 24" fill="none">
                  <path d="M8 12l2 2 3-3 3 3 2-2" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                  <path d="M2 14c2 1 3 3 6 3h8c3 0 4-2 6-3" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                </svg>
              </div>
              <p class="valuex__label">CERCANOS</p>
              <p class="valuex__desc">Atención local, rápida y humana.</p>
            </article>

            <article class="valuex">
              <div class="valuex__icon" aria-hidden="true">
                <svg viewBox="0 0 24 24" fill="none">
                  <path d="M9 18h6" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                  <path d="M10 22h4" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                  <path d="M12 2a7 7 0 00-4 12c1 1 1 2 1 3h6c0-1 0-2 1-3a7 7 0 00-4-12z" stroke="currentColor" stroke-width="2"/>
                </svg>
              </div>
              <p class="valuex__label">INNOVACIÓN</p>
              <p class="valuex__desc">Mejora continua de red y soporte.</p>
            </article>

            <article class="valuex">
              <div class="valuex__icon" aria-hidden="true">
                <svg viewBox="0 0 24 24" fill="none">
                  <path d="M13 2L3 14h7l-1 8 11-14h-7l0-6z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/>
                </svg>
              </div>
              <p class="valuex__label">AGILIDAD</p>
              <p class="valuex__desc">Instalación y respuesta a tiempo.</p>
            </article>

            <article class="valuex">
              <div class="valuex__icon" aria-hidden="true">
                <svg viewBox="0 0 24 24" fill="none">
                  <path d="M7 10h10l2 7a3 3 0 01-3 3h-1l-2-2H11l-2 2H8a3 3 0 01-3-3l2-7z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/>
                  <path d="M9 13h2" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                  <path d="M10 12v2" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                  <path d="M15 13h.01" stroke="currentColor" stroke-width="3" stroke-linecap="round"/>
                  <path d="M17 12h.01" stroke="currentColor" stroke-width="3" stroke-linecap="round"/>
                </svg>
              </div>
              <p class="valuex__label">PASIÓN</p>
              <p class="valuex__desc">Rendimiento para streaming y gaming.</p>
            </article>
          </div>
        </section>

      </div>
    </section>

  </main>

@endsection
