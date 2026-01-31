@extends('layout.app')

@php
$seo = [
  'title' => 'Soporte Técnico | Mi Red Huancayo',
  'description' => 'Soporte técnico de Mi Red. Resolvemos tus dudas sobre instalación, pagos y velocidad.',
];

$waText = rawurlencode('Hola, necesito soporte técnico. ¿Me pueden ayudar con mi conexión?');
$waLink = "https://wa.me/51924979568?text={$waText}";
@endphp

@section('content')

  {{-- Spacer para header fixed --}}
  <div class="header-spacer" aria-hidden="true"></div>

  <main class="support-page">
    <section class="support">
      <div class="container">

        {{-- Header --}}
        <header class="support__head">
          <p class="support__kicker">Mi Red Huancayo • Soporte</p>
          <h1 class="support__title">Soporte Técnico</h1>
          <p class="support__subtitle">
            Te ayudamos con instalación, cobertura, pagos y calidad de conexión. Respuesta rápida y clara.
          </p>

          <div class="support__cta">
            <a class="btn btn-primary" href="{{ $waLink }}" target="_blank" rel="noreferrer">
              Hablar por WhatsApp
            </a>
            <a class="btn btn-ghost support__ctaGhost" href="{{ route('web.cobertura') }}">
              Ver cobertura
            </a>
          </div>
        </header>

        {{-- Grid --}}
        <div class="support__grid">

          {{-- FAQ --}}
          <section class="support__card card">
            <div class="support__cardHead">
              <h2 class="support__cardTitle">Preguntas frecuentes</h2>
              <p class="support__cardHint">Toca una pregunta para ver la respuesta.</p>
            </div>

            <div class="faq" role="list">
              <details class="faq__item" role="listitem">
                <summary class="faq__q">¿La velocidad es real?</summary>
                <div class="faq__a">
                  Sí. Trabajamos con fibra óptica (FTTH) y configuramos el servicio según cobertura y equipo instalado.
                </div>
              </details>

              <details class="faq__item" role="listitem">
                <summary class="faq__q">¿Cuánto demora la instalación?</summary>
                <div class="faq__a">
                  Normalmente entre 24 a 48 horas (según zona y disponibilidad). Coordinamos una visita por WhatsApp.
                </div>
              </details>

              <details class="faq__item" role="listitem">
                <summary class="faq__q">¿Tiene contrato o permanencia?</summary>
                <div class="faq__a">
                  No trabajamos con ataduras. Buscamos que te quedes por calidad, no por obligación.
                </div>
              </details>

              <details class="faq__item" role="listitem">
                <summary class="faq__q">Mi conexión está lenta, ¿qué hago primero?</summary>
                <div class="faq__a">
                  Reinicia tu router 30 segundos, prueba por cable si puedes, y escríbenos indicando tu zona y referencia.
                </div>
              </details>
            </div>
          </section>

          {{-- Proceso --}}
          <section class="support__card card">
            <div class="support__cardHead">
              <h2 class="support__cardTitle">Proceso de instalación</h2>
              <p class="support__cardHint">Rápido, simple y sin vueltas.</p>
            </div>

            <ol class="steps">
              <li class="steps__item">
                <span class="steps__num">1</span>
                <div class="steps__body">
                  <p class="steps__title">Contacto por WhatsApp</p>
                  <p class="steps__text">Nos escribes y nos indicas tu distrito y referencia.</p>
                </div>
              </li>

              <li class="steps__item">
                <span class="steps__num">2</span>
                <div class="steps__body">
                  <p class="steps__title">Verificación de cobertura</p>
                  <p class="steps__text">Confirmamos disponibilidad y te recomendamos el plan ideal.</p>
                </div>
              </li>

              <li class="steps__item">
                <span class="steps__num">3</span>
                <div class="steps__body">
                  <p class="steps__title">Agendamos instalación</p>
                  <p class="steps__text">Coordinamos horario y visitamos tu domicilio.</p>
                </div>
              </li>

              <li class="steps__item">
                <span class="steps__num">4</span>
                <div class="steps__body">
                  <p class="steps__title">Listo para navegar 🚀</p>
                  <p class="steps__text">Te dejamos todo configurado y con prueba de velocidad.</p>
                </div>
              </li>
            </ol>

            <div class="support__miniCta">
              <a class="btn btn-primary" href="{{ $waLink }}" target="_blank" rel="noreferrer">
                Solicitar soporte
              </a>
              <span class="support__miniNote">Tiempo de respuesta: rápido (cuando no estamos instalando 😄)</span>
            </div>
          </section>

        </div>

      </div>
    </section>
  </main>

@endsection
