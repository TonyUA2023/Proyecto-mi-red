@extends('layout.app')

@php
$seo = [
  'title' => 'Cobertura de Internet en Huancayo | Mi Red',
  'description' => 'Consulta la cobertura de Mi Red en Huancayo. Escríbenos por WhatsApp y verifica disponibilidad.',
];
@endphp

@section('content')

  {{-- Spacer para header fixed --}}
  <div class="header-spacer" aria-hidden="true"></div>

  <main class="coverage-page">
    <section class="coverage">
      <div class="container">

        {{-- Header --}}
        <header class="coverage__head">
          <p class="coverage__kicker">Mi Red Huancayo • Fibra Óptica</p>
          <h1 class="coverage__title">Cobertura</h1>
          <p class="coverage__subtitle">
            Estamos expandiendo nuestra red de fibra óptica en Huancayo.
            Consulta si tu zona ya cuenta con cobertura disponible.
          </p>
        </header>

        {{-- Card Zonas --}}
        <section class="coverage__section">
          <div class="card">
            <h3 class="coverage__cardTitle">Zonas con cobertura</h3>

            <ul class="coverage__list">
              <li>
                <span class="coverage__pin">📍</span>
                <span>El Tambo</span>
              </li>
              <li>
                <span class="coverage__pin">📍</span>
                <span>Huancayo Cercado</span>
              </li>
              <li>
                <span class="coverage__pin">📍</span>
                <span>Chilca</span>
              </li>
              <li>
                <span class="coverage__pin">📍</span>
                <span>San Carlos</span>
              </li>
            </ul>
          </div>
        </section>

        {{-- CTA --}}
        <section class="coverage__cta">
          <a
            class="btn btn-primary"
            href="https://wa.me/51924979568?text=Hola,%20quiero%20consultar%20la%20cobertura%20de%20internet%20en%20mi%20zona."
            target="_blank"
            rel="noreferrer"
          >
            Consultar por WhatsApp
          </a>
        </section>

        {{-- Nota --}}
        <footer class="coverage__foot">
          <p class="coverage__note">
            *La disponibilidad del servicio depende de la infraestructura instalada en cada zona.
          </p>
        </footer>

      </div>
    </section>
  </main>

@endsection
