@php
  $whatsapp = '51924979568';
  $waText = rawurlencode('Hola, quiero consultar cobertura y planes de internet en Huancayo.');
  $waLink = "https://wa.me/{$whatsapp}?text={$waText}";
@endphp

<footer class="mr-footer" aria-label="Pie de página">
  <div class="container mr-footer__container">

    <div class="mr-footer__grid">

      {{-- Brand --}}
      <div class="mr-footer__brand">
        <a class="mr-footer__logo" href="{{ route('web.home') }}" aria-label="Mi Red Huancayo">
          <img src="{{ asset('images/landing/logo.jpg') }}" alt="Mi Red Huancayo" class="mr-footer__logoImg">
          <span class="mr-footer__logoText">Mi Red <span>Huancayo</span></span>
        </a>

        <p class="mr-footer__desc">
          Internet <strong>100% Fibra Óptica (FTTH)</strong> para hogar y negocio.
          Planes para streaming, gaming y trabajo remoto.
        </p>

        <div class="mr-footer__badges" aria-label="Beneficios">
          <span class="mr-badge">FTTH</span>
          <span class="mr-badge">Baja latencia</span>
          <span class="mr-badge">Soporte local</span>
        </div>
      </div>

      {{-- Navegación --}}
      <nav class="mr-footer__col" aria-label="Navegación">
        <h3 class="mr-footer__title">Navegación</h3>
        <a class="mr-footer__link" href="{{ route('web.planes') }}">Planes</a>
        <a class="mr-footer__link" href="{{ route('web.cobertura') }}">Cobertura</a>
        <a class="mr-footer__link" href="{{ route('web.soporte') }}">Soporte</a>
        <a class="mr-footer__link" href="{{ route('web.nosotros') }}">Nosotros</a>
        <a class="mr-footer__link" href="{{ route('web.blog.index') }}">Blog</a>
      </nav>

      {{-- Ayuda / Soporte --}}
      <div class="mr-footer__col">
        <h3 class="mr-footer__title">Soporte</h3>
        <a class="mr-footer__link" href="{{ route('web.soporte') }}">Preguntas frecuentes</a>
        <a class="mr-footer__link" href="{{ route('web.cobertura') }}">Verificar cobertura</a>
        <a class="mr-footer__link" href="{{ $waLink }}" target="_blank" rel="noreferrer">Escríbenos por WhatsApp</a>
        <a class="mr-footer__link" href="tel:+51924979568">Llámanos: +51 924 979 568</a>
      </div>

      {{-- Legal / Datos --}}
      <div class="mr-footer__col">
        <h3 class="mr-footer__title">Legal</h3>
        <a class="mr-footer__link" href="#">Términos</a>
        <a class="mr-footer__link" href="#">Privacidad</a>

        <div class="mr-footer__meta">
          <div class="mr-metaRow">
            <span class="mr-dot" aria-hidden="true"></span>
            <span>Huancayo, Junín – Perú</span>
          </div>
          <div class="mr-metaRow">
            <span class="mr-dot" aria-hidden="true"></span>
            <span>WhatsApp: <strong>+51 924 979 568</strong></span>
          </div>
        </div>

        <div class="mr-footer__social" aria-label="Redes sociales">
          <a class="mr-social" href="#" target="_blank" rel="noreferrer" aria-label="Facebook">f</a>
          <a class="mr-social" href="#" target="_blank" rel="noreferrer" aria-label="Instagram">◎</a>
          <a class="mr-social" href="#" target="_blank" rel="noreferrer" aria-label="TikTok">♪</a>
        </div>
      </div>

    </div>

    {{-- Bottom bar --}}
    <div class="mr-footer__bottom">
      <p class="mr-footer__copy">© {{ date('Y') }} Mi Red Huancayo. Todos los derechos reservados.</p>
      <p class="mr-footer__dev">Desarrollado por <strong>Jstack</strong>.</p>
    </div>

  </div>
</footer>
