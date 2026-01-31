@extends('layout.app')

@php
  $seo = [
    'title' => 'Contacto | Mi Red Huancayo',
    'description' => 'Contáctanos y contrata internet 100% fibra óptica (FTTH) en Huancayo.',
  ];

  $whatsapp = '51924979568';
  $waText = rawurlencode('Hola, quiero consultar cobertura y planes de internet en Huancayo.');
  $waLink = "https://wa.me/{$whatsapp}?text={$waText}";

  $fbLink = 'https://www.facebook.com/miredhuancayo';
@endphp

@section('content')

  <div class="header-spacer" aria-hidden="true"></div>

  <section class="mr-contact" aria-label="Contacto Mi Red Huancayo">
    <div class="container mr-contact__grid">

      {{-- LEFT: FORM --}}
      <div class="mr-contact__left">
        <header class="mr-contact__head">
          <span class="mr-contact__pill">ATENCIÓN RÁPIDA</span>
          <h1 class="mr-contact__title">Contacto</h1>
          <p class="mr-contact__subtitle">
            Escríbenos y te asesoramos en <strong>cobertura</strong>, <strong>planes</strong> e <strong>instalación</strong>.
            Respuesta rápida por WhatsApp.
          </p>
        </header>

        <form class="mr-card mr-contact__card" method="POST" action="#">
          @csrf

          <div class="mr-contact__portal">
            <p class="mr-contact__portalText">¿Ya eres cliente?</p>
            <a class="mr-btn mr-btn--ghost mr-contact__portalBtn" href="#" aria-label="Portal de cliente">
              Sí, soy cliente
            </a>
          </div>

          <div class="mr-form">

            <div class="mr-field">
              <label class="mr-label" for="distrito">Escoge tu distrito</label>
              <select id="distrito" name="distrito" class="mr-input" required>
                <option value="" disabled selected>Selecciona…</option>
                <option>Huancayo Cercado</option>
                <option>El Tambo</option>
                <option>Chilca</option>
                <option>San Carlos</option>
                <option>Otro</option>
              </select>
            </div>

            <div class="mr-row">
              <div class="mr-field">
                <label class="mr-label" for="nombre">Nombre</label>
                <input id="nombre" name="nombre" class="mr-input" type="text" placeholder="Tu nombre" autocomplete="name" required>
              </div>

              <div class="mr-field">
                <label class="mr-label" for="apellido">Apellido</label>
                <input id="apellido" name="apellido" class="mr-input" type="text" placeholder="Tu apellido" autocomplete="family-name" required>
              </div>
            </div>

            <div class="mr-row">
              <div class="mr-field">
                <label class="mr-label" for="docTipo">Tipo de documento</label>
                <select id="docTipo" name="docTipo" class="mr-input" required>
                  <option value="" disabled selected>Selecciona…</option>
                  <option>DNI</option>
                  <option>CE</option>
                  <option>RUC</option>
                </select>
              </div>

              <div class="mr-field">
                <label class="mr-label" for="docNumero">Número de documento</label>
                <input id="docNumero" name="docNumero" class="mr-input" type="text" placeholder="DNI/CE/RUC" required>
              </div>
            </div>

            <div class="mr-row">
              <div class="mr-field">
                <label class="mr-label" for="correo">Correo</label>
                <input id="correo" name="correo" class="mr-input" type="email" placeholder="tu@correo.com" autocomplete="email">
              </div>

              <div class="mr-field">
                <label class="mr-label" for="telefono">Teléfono / WhatsApp</label>
                <input id="telefono" name="telefono" class="mr-input" type="tel" placeholder="+51 *** *** ***" autocomplete="tel" required>
              </div>
            </div>

            <div class="mr-field">
              <label class="mr-label" for="mensaje">Escribe aquí tu mensaje</label>
              <textarea id="mensaje" name="mensaje" class="mr-textarea" rows="5" placeholder="Cuéntanos tu zona y el plan que te interesa…" required></textarea>
            </div>

            <label class="mr-check">
              <input type="checkbox" required>
              <span>Autorizo el tratamiento de datos para responder mi solicitud.</span>
            </label>

            <label class="mr-check">
              <input type="checkbox">
              <span>Deseo recibir promociones y beneficios.</span>
            </label>

            <div class="mr-actions">
              <button class="mr-btn mr-btn--primary mr-btn--wide" type="submit">Enviar</button>
              <a class="mr-btn mr-btn--ghost mr-btn--wide" href="{{ $waLink }}" target="_blank" rel="noreferrer">WhatsApp</a>
            </div>

            <p class="mr-note">
              Si prefieres, escríbenos directo por WhatsApp y te atendemos al toque (sin telepatía… todavía).
            </p>

          </div>
        </form>
      </div>

      {{-- RIGHT: INFO --}}
      <aside class="mr-contact__right" aria-label="Información de contacto">

        <div class="mr-panels">
          <div class="mr-panel">
            <h2 class="mr-panel__title">ATENCIÓN AL CLIENTE</h2>

            <a class="mr-mini" href="tel:+51924979568">
              <span class="mr-ico" aria-hidden="true">📞</span>
              <div>
                <div class="mr-mini__label">Central</div>
                <div class="mr-mini__value">+51 924 979 568</div>
              </div>
            </a>

            <a class="mr-mini" href="{{ $fbLink }}" target="_blank" rel="noreferrer">
              <span class="mr-ico" aria-hidden="true">ⓕ</span>
              <div>
                <div class="mr-mini__label">Escríbenos</div>
                <div class="mr-mini__value">Facebook /MiRedHuancayo</div>
              </div>
            </a>

            <a class="mr-mini" href="{{ $waLink }}" target="_blank" rel="noreferrer">
              <span class="mr-ico" aria-hidden="true">💬</span>
              <div>
                <div class="mr-mini__label">Atención por WhatsApp</div>
                <div class="mr-mini__value">Respuesta rápida</div>
              </div>
            </a>
          </div>

          <div class="mr-panel">
            <h2 class="mr-panel__title">INFORMACIÓN COMERCIAL</h2>

            <div class="mr-mini">
              <span class="mr-ico" aria-hidden="true">🧾</span>
              <div>
                <div class="mr-mini__label">Ventas</div>
                <div class="mr-mini__value">Planes hogar y negocio (FTTH)</div>
              </div>
            </div>

            <a class="mr-mini" href="{{ $waLink }}" target="_blank" rel="noreferrer">
              <span class="mr-ico" aria-hidden="true">✅</span>
              <div>
                <div class="mr-mini__label">Ventas por WhatsApp</div>
                <div class="mr-mini__value">Cotización + cobertura</div>
              </div>
            </a>

            <a class="mr-mini" href="{{ route('web.cobertura') }}">
              <span class="mr-ico" aria-hidden="true">📍</span>
              <div>
                <div class="mr-mini__label">Verificar cobertura</div>
                <div class="mr-mini__value">Distritos disponibles</div>
              </div>
            </a>
          </div>
        </div>

        <div class="mr-panel mr-panel--list">
          <h2 class="mr-panel__title">NUESTROS PUNTOS DE ATENCIÓN</h2>

          {{-- Como no tienes “tiendas”, esto va PRO: atención por canales + zonas + instalación --}}
          <div class="mr-points">
            <div class="mr-point">
              <div class="mr-point__head">
                <span class="mr-pin" aria-hidden="true"></span>
                <strong>Atención digital</strong>
              </div>
              <p class="mr-point__text">
                Facebook y WhatsApp para consultas, soporte, pagos y coordinación de instalación.
              </p>
            </div>

            <div class="mr-point">
              <div class="mr-point__head">
                <span class="mr-pin" aria-hidden="true"></span>
                <strong>Instalación a domicilio</strong>
              </div>
              <p class="mr-point__text">
                Coordinamos visita técnica según cobertura (Huancayo y distritos aledaños).
              </p>
            </div>

            <div class="mr-point">
              <div class="mr-point__head">
                <span class="mr-pin" aria-hidden="true"></span>
                <strong>Zonas comunes</strong>
              </div>
              <p class="mr-point__text">
                El Tambo · Huancayo Cercado · Chilca · San Carlos (sujeto a disponibilidad).
              </p>
            </div>
          </div>

          <div class="mr-panel__actions">
            <a class="mr-btn mr-btn--primary" href="{{ $waLink }}" target="_blank" rel="noreferrer">Consultar ahora</a>
            <a class="mr-btn mr-btn--ghost" href="{{ $fbLink }}" target="_blank" rel="noreferrer">Ver Facebook</a>
          </div>
        </div>

      </aside>

    </div>
  </section>

@endsection
