@extends('layout.app')

@php
  $seo = [
    'title' => 'Mi Red Huancayo | Internet Fibra Óptica',
    'description' => 'Internet fibra óptica en Huancayo. Planes para estudiar, trabajar, jugar y ver streaming sin cortes. Consulta cobertura y contrata por WhatsApp.',
  ];

  $whatsapp = '51 999999999';
  $waBaseText = 'Hola, quiero consultar cobertura y planes de internet en Huancayo.';
@endphp

@section('content')

  {{-- HERO reutilizable --}}
  @include('web.partials.hero', ['whatsapp' => $whatsapp])

  {{-- PLANES DESTACADOS --}}
  <section class="home-plans">
    <div class="container">

      {{-- Headline promo grande --}}
      <div class="plans-promo">
        <div class="promo-badge">🔥 PROMOCIÓN</div>

        <h2 class="promo-title">
          <span class="promo-highlight">¡50% de descuento</span> en
          <br>
          nuestros planes seleccionados
          <br>
          de internet 100% fibra óptica!
        </h2>

        <p class="promo-text">
          Promoción sujeta a cobertura y condiciones. Te confirmamos en minutos.
        </p>
      </div>

      {{-- Tabs/Filtros --}}
      <div class="plan-tabs" role="tablist" aria-label="Categorías de planes">
        <button class="plan-tab is-active" data-tab="fibra" type="button" role="tab" aria-selected="true">
          Internet 100% fibra
        </button>

        <button class="plan-tab" data-tab="fibra-tv" type="button" role="tab" aria-selected="false">
          Internet 100% fibra + TV
        </button>

        <button class="plan-tab" data-tab="gamer" type="button" role="tab" aria-selected="false">
          Gamer / baja latencia
        </button>
      </div>

      {{-- Título --}}
      <div style="margin-top:18px">
        <h3 class="section-title" style="margin-top:14px; text-align:center">Planes recomendados</h3>
      </div>

      {{-- DATA (puedes separar por tipo luego) --}}
      @php
        $plans = [
          [
            'name' => 'Hogar Esencial',
            'mbps' => 30,
            'price' => 'S/. 70',
            'tag' => 'Más vendido',
            'use' => 'Ideal para casa y streaming',
            'features' => ['Streaming en HD', 'Clases virtuales', 'WiFi estable'],
          ],
          [
            'name' => 'Pro Trabajo',
            'mbps' => 60,
            'price' => 'S/. 110',
            'tag' => 'Recomendado',
            'use' => 'Trabajo remoto y videollamadas',
            'features' => ['Zoom/Meet sin cortes', 'Subida estable', 'Prioridad de soporte'],
          ],
          [
            'name' => 'Gaming Plus',
            'mbps' => 100,
            'price' => 'S/. 150',
            'tag' => 'Potencia',
            'use' => 'Gaming + streaming 4K',
            'features' => ['Menor latencia', 'Streaming 4K', 'Varios dispositivos'],
          ],
          [
            'name' => 'Gaming Ultra',
            'mbps' => 150,
            'price' => 'S/. 190',
            'tag' => 'Top',
            'use' => 'Gaming competitivo + 4K',
            'features' => ['Baja latencia', 'Streaming 4K', 'Varios dispositivos'],
          ],
          [
            'name' => 'Hogar Premium',
            'mbps' => 80,
            'price' => 'S/. 135',
            'tag' => 'Nuevo',
            'use' => 'Familias + muchos dispositivos',
            'features' => ['Streaming 4K', 'Trabajo remoto', 'Soporte prioritario'],
          ],
        ];
      @endphp

      {{-- ✅ PANELS (esto faltaba) --}}
      <div class="plan-panels">

        {{-- PANEL 1: FIBRA (CAROUSEL) --}}
        <section class="plan-panel is-active" data-panel="fibra">
          <div class="plans-carousel" data-plans-carousel style="margin-top:18px">
            <button class="pc-arrow pc-prev" type="button" aria-label="Anterior" data-prev>‹</button>

            <div class="pc-viewport">
              <div class="pc-track" data-track>
                @foreach($plans as $p)
                  @php
                    $wa = preg_replace('/\D+/', '', ($whatsapp ?? '51999999999'));
                    $txt = rawurlencode("Hola, me interesa el plan {$p['name']} ({$p['mbps']} Mbps). ¿Hay cobertura en mi zona?");
                    $waLink = "https://wa.me/{$wa}?text={$txt}";
                  @endphp

                  <article class="card-clean plan pc-card" data-card>
                    <div class="plan-badge">{{ $p['tag'] }}</div>

                    <div class="plan-top">
                      <div>
                        <div class="plan-name">{{ $p['name'] }}</div>
                        <div class="plan-desc">{{ $p['use'] }}</div>
                      </div>

                      <div class="plan-pricebox">
                        <div class="plan-price">{{ $p['price'] }}</div>
                        <div class="plan-unit">mensual</div>
                      </div>
                    </div>

                    <div>
                      <div class="plan-speed">{{ $p['mbps'] }}</div>
                      <div class="plan-unit">Mbps</div>
                    </div>

                    <ul class="plan-list">
                      @foreach($p['features'] as $f)
                        <li><span class="check">✓</span> {{ $f }}</li>
                      @endforeach
                    </ul>

                    <div class="plan-cta">
                      <a class="btn btn-primary" href="{{ route('web.planes') }}">Ver todos</a>
                      <a class="btn btn-ghost" href="{{ $waLink }}" target="_blank" rel="noreferrer">Contratar por WhatsApp</a>
                    </div>
                  </article>
                @endforeach
              </div>
            </div>

            <button class="pc-arrow pc-next" type="button" aria-label="Siguiente" data-next>›</button>
          </div>
        </section>

  {{-- PANEL 2: FIBRA + TV (Mi Red Huancayo) --}}
  <div class="plan-panel" data-panel="fibra-tv" hidden>
    @php
      // WhatsApp real (Mi Red Huancayo)
      $wa = preg_replace('/\D+/', '', '51924979568');

      /**
       * ✅ DATA FINAL para JS:
       * providers -> packs -> plans
       * OJO: aquí NO existe WINTV. Usamos "mired" y "cableperu".
       */
     
  $tvProviders = [
    'mired' => [
      'label' => 'MI RED',
      'packs' => [

        'mired_plus' => [
          'label' => 'MI RED PLUS',
          'plans' => [
            [
              'mbps' => 20,
              'tv' => 'Cable Play (HD)',
              'price' => 'S/. 100',
              'note' => 'Internet S/. 50 + TV S/. 50',
              'extras' => ['Instalación GRATIS', 'Router (Módem) GRATIS', 'Cableado fibra GRATIS'],
            ],
            [
              'mbps' => 30,
              'tv' => 'Cable Play (HD)',
              'price' => 'S/. 120',
              'note' => 'Internet S/. 70 + TV S/. 50',
              'extras' => ['Instalación GRATIS', 'Router (Módem) GRATIS', 'Cableado fibra GRATIS'],
            ],
            [
              'mbps' => 40,
              'tv' => 'Cable Play (HD)',
              'price' => 'S/. 140',
              'note' => 'Internet S/. 90 + TV S/. 50',
              'extras' => ['Instalación GRATIS', 'Router (Módem) GRATIS', 'Cableado fibra GRATIS'],
            ],
          ],
        ],

        'mired_premium' => [
          'label' => 'MI RED PREMIUM',
          'plans' => [
            [
              'mbps' => 60,
              'tv' => 'Cable Play HD+',
              'price' => 'S/. 150',
              'note' => 'Internet S/. 100 + TV S/. 50',
              'extras' => ['Instalación GRATIS', 'Router (Módem) GRATIS', 'Cableado fibra GRATIS'],
            ],
            [
              'mbps' => 40,
              'tv' => 'Cable Play HD+',
              'price' => 'S/. 140',
              'note' => 'Ideal para streaming + familia',
              'extras' => ['Instalación GRATIS', 'Router (Módem) GRATIS', 'Cableado fibra GRATIS'],
            ],
          ],
        ],
        // ✅ NUEVO PACK 2 (antes era premium repetido)
        'mired_familia' => [
          'label' => 'MI RED FAMILIA',
          'plans' => [
            [
              'mbps' => 30,
              'tv' => 'Cable Play Familiar',
              'price' => 'S/. 120',
              'note' => 'Series + pelis + fútbol (según cobertura)',
              'extras' => ['Instalación GRATIS', 'Router (Módem) GRATIS', 'Cableado fibra GRATIS'],
            ],
            [
              'mbps' => 40,
              'tv' => 'Cable Play Familiar (HD)',
              'price' => 'S/. 140',
              'note' => 'Más canales HD',
              'extras' => ['Instalación GRATIS', 'Router (Módem) GRATIS', 'Cableado fibra GRATIS'],
            ],
          ],
        ],

        'mired_l1max' => [
          'label' => 'MI RED L1MAX',
          'plans' => [
            [
              'mbps' => 30,
              'tv' => 'Cine + Series',
              'price' => 'S/. 120',
              'note' => 'Deportes + películas + series',
              'extras' => ['Instalación GRATIS', 'Router (Módem) GRATIS', 'Cableado fibra GRATIS'],
            ],
            [
              'mbps' => 60,
              'tv' => 'Cine + Series (HD)',
              'price' => 'S/. 150',
              'note' => 'Combo recomendado',
              'extras' => ['Instalación GRATIS', 'Router (Módem) GRATIS', 'Cableado fibra GRATIS'],
            ],
          ],
        ],

      ],
    ],

    'cableperu' => [
      'label' => 'CABLE PERÚ',
      'packs' => [
        'cp_basico' => [
          'label' => 'CABLE PERÚ',
          'plans' => [
            [
              'mbps' => 20,
              'tv' => '85 SD + 90 HD',
              'price' => 'S/. 100',
              'note' => 'Entretenimiento para toda la familia',
              'extras' => ['Instalación GRATIS', 'Router GRATIS', 'Cableado fibra GRATIS'],
            ],
            [
              'mbps' => 30,
              'tv' => '85 SD + 90 HD',
              'price' => 'S/. 120',
              'note' => 'Deportes · Noticias · Películas · Series',
              'extras' => ['Instalación GRATIS', 'Router GRATIS', 'Cableado fibra GRATIS'],
            ],
            [
              'mbps' => 60,
              'tv' => 'HD Full',
              'price' => 'S/. 150',
              'note' => 'Mejor para streaming y varios equipos',
              'extras' => ['Instalación GRATIS', 'Router GRATIS', 'Cableado fibra GRATIS'],
            ],
          ],
        ],
      ],
    ],
  ];
@endphp


    <section class="tv-bundles" data-tv-bundles>
      <div class="tv-bundles-head">
        <h3 class="tvb-title">+ DE 700 CANALES</h3>
        <h3 class="tvb1-title">CABLE PLAY</h3>
        <h3 class="tvb2-title">CANALES TV - PELÍCULAS - SERIES</h3>

        <p class="tvb-sub">
          85 canales SD y +90 canales HD. Deportes, entretenimiento, noticias, música, series y películas.
          <strong>TV desde S/. 50.00</strong>. Te confirmamos cobertura en minutos.
        </p>
      </div>

      {{-- Switch PROVEEDOR (Mi Red / Cable Perú) --}}
      <div class="tvb-switch" role="tablist" aria-label="Proveedor de TV">
        <button class="tvb-switch-btn is-active" type="button" data-provider="mired" aria-selected="true">
          MI RED
        </button>
        <button class="tvb-switch-btn" type="button" data-provider="cableperu" aria-selected="false">
          CABLE PERÚ
        </button>
        <span class="tvb-switch-rail" aria-hidden="true"></span>
      </div>

      {{-- ✅ Packs dinámicos: el JS los renderiza aquí --}}
      <div class="tvb-packs" role="tablist" aria-label="Packs de TV" data-packs></div>

      {{-- ✅ Cards dinámicas: el JS renderiza según provider + pack --}}
      <div class="tvb-cards" data-cards></div>

      {{-- ✅ JSON para JS --}}
      <script type="application/json" data-tv-bundles-data>
        {!! json_encode($tvProviders, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}
      </script>

      {{-- ✅ Número WA para el JS --}}
      <script>
        window.__MIRE_WA__ = "{{ $wa }}";
      </script>
    </section>
  </div>



        {{-- PANEL 3: GAMER / BAJA LATENCIA (Mi Red Huancayo) --}}
<div class="plan-panel" data-panel="gamer" hidden>
  @php
    $wa = preg_replace('/\D+/', '', '51924979568');
    $msg = rawurlencode("Hola, quiero información de los planes Gamer (baja latencia) en Mi Red Huancayo. ¿Hay cobertura en mi zona?");
    $waLink = "https://wa.me/{$wa}?text={$msg}";
  @endphp

  <section class="gamer-win">
    <div class="gwin-wrap">

      {{-- Bloque naranja --}}
      <div class="gwin-left">
        <p class="gwin-kicker">Baja latencia • Más estabilidad</p>

        <h3 class="gwin-title">
          Conoce la última<br>
          actualización de los<br>
          <span>planes Gamer</span><br>
          Mi Red Huancayo
        </h3>

        <p class="gwin-sub">
          Diseñados para juegos online y streaming con mejor respuesta.
          Consulta disponibilidad en tu zona y te atendemos al toque.
        </p>

        <div class="gwin-actions">
          <a class="gwin-btn" href="{{ $waLink }}" target="_blank" rel="noreferrer">
            Más info
          </a>

          <a class="gwin-btn gwin-btn-ghost" href="{{ route('web.planes') }}">
            Ver planes
          </a>
        </div>

        <div class="gwin-meta">
          <span class="gwin-dot"></span>
          WhatsApp: <strong>924 979 568</strong>
        </div>
      </div>

      {{-- Imagen gamer --}}
      <div class="gwin-right">
        {{-- Recomendado: coloca tu imagen en /public/images/landing/gamer-win.png --}}
        <img
          src="/images/landing/gamer-win.png"
          alt="Planes Gamer Mi Red Huancayo"
          class="gwin-img"
          loading="lazy"
        />
      </div>

    </div>
  </section>
</div>



  {{-- BENEFICIOS (se queda igual) --}}
  <section class="home-benefits">
    <div class="container">

      <h3 class="benefits-title">
        ¿Cuáles son los beneficios de nuestros planes
        <span>100% fibra óptica?</span>
      </h3>

      <div class="benefits-grid">

        <article class="benefit-card">
          <div class="benefit-icon">📶☎️</div>
          <h4>Dúos y Tríos</h4>
          <p>Televisión digital y telefonía fija para completar tu plan.</p>
        </article>

        <article class="benefit-card">
          <div class="benefit-icon">⚡⬆️⬇️</div>
          <h4>Velocidad simétrica</h4>
          <p>Descarga y subida de archivos a la misma velocidad.</p>
        </article>

        <article class="benefit-card">
          <div class="benefit-icon">📱💻</div>
          <h4>Mayor conectividad</h4>
          <p>Más equipos conectados sin afectar la velocidad.</p>
        </article>

        <article class="benefit-card">
          <div class="benefit-icon">🔌</div>
          <h4>Mayor estabilidad</h4>
          <p>Conexión 100% fibra óptica hasta tu hogar (FTTH).</p>
        </article>

      </div>
    </div>
  </section>
  
  

@endsection
