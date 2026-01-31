@php
  // Recomendado: ponlo en .env como WHATSAPP_NUMBER=51999999999
  $whatsapp = config('app.whatsapp_number', '51999999999');
  $waText = rawurlencode('Hola, quiero consultar cobertura y planes de internet en Huancayo.');
  $waLink = "https://wa.me/{$whatsapp}?text={$waText}";

  // helper para marcar activo
  $is = fn($name) => request()->routeIs($name);
  $activeClass = 'nav-link is-active';
  $activeMobileClass = 'nav-m-link is-active';
@endphp

<header id="siteHeader" class="site-header">
  <div class="container header-wrap">

    {{-- TOPBAR (redes + teléfono) --}}
    <div class="topbar" id="topbar">
      <div class="topbar-left" aria-label="Redes sociales">
        <a class="topbar-ico" href="#" aria-label="Facebook" target="_blank" rel="noreferrer">
          <span aria-hidden="true">f</span>
        </a>
        <a class="topbar-ico" href="#" aria-label="Instagram" target="_blank" rel="noreferrer">
          <span aria-hidden="true">◎</span>
        </a>
        <a class="topbar-ico" href="#" aria-label="TikTok" target="_blank" rel="noreferrer">
          <span aria-hidden="true">♪</span>
        </a>
      </div>
      <div class="topbar-right">
        <span class="topbar-label">Llámanos</span>
        <a class="topbar-phone" href="tel:+51924979568">+51 924 979 568</a>
      </div>
    </div>

    {{-- HEADER NORMAL --}}
    <div class="header-inner">
      {{-- Logo (IMAGEN) --}}
      <a href="{{ route('web.home') }}" class="logo" aria-label="Ir al inicio">
        <span class="logo-mark" aria-hidden="true">
          <img
            src="{{ asset('images/landing/logo.jpg') }}"
            alt="Mi Red Huancayo"
            class="logo-img"
            loading="eager"
            decoding="async"
          />
        </span>
      </a>

      {{-- Desktop nav --}}
      <nav class="nav-desktop" aria-label="Navegación principal">
        <a class="{{ $is('web.home') ? $activeClass : 'nav-link' }}" href="{{ route('web.home') }}">Inicio</a>
        <a class="{{ $is('web.planes') ? $activeClass : 'nav-link' }}" href="{{ route('web.planes') }}">Planes</a>
        <a class="{{ $is('web.cobertura') ? $activeClass : 'nav-link' }}" href="{{ route('web.cobertura') }}">Cobertura</a>
        <a class="{{ $is('web.soporte') ? $activeClass : 'nav-link' }}" href="{{ route('web.soporte') }}">Soporte</a>
        <a class="{{ $is('web.nosotros') ? $activeClass : 'nav-link' }}" href="{{ route('web.nosotros') }}">Nosotros</a>
        <a class="{{ $is('web.blog.*') ? $activeClass : 'nav-link' }}" href="{{ route('web.blog.index') }}">Blog</a>
        <a class="{{ $is('web.contacto') ? $activeClass : 'nav-link' }}" href="{{ route('web.contacto') }}">Contacto</a>
      </nav>

      {{-- CTA Desktop --}}
      <div class="cta-desktop">
        <a class="btn btn-ghost" href="{{ route('web.contacto') }}">Contactar</a>
        <a class="btn btn-primary" href="{{ $waLink }}" target="_blank" rel="noreferrer">WhatsApp</a>
      </div>

      {{-- Mobile toggle --}}
      <button
        class="menu-btn"
        id="mobileMenuBtn"
        aria-label="Abrir menú"
        aria-expanded="false"
        aria-controls="mobileMenu"
        type="button"
      >
        <svg class="menu-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
        </svg>
      </button>
    </div>

    {{-- Mobile menu --}}
    <div class="nav-mobile" id="mobileMenu" hidden>
      {{-- tus links --}}
      <div class="nav-m-cta">
        <a class="btn btn-ghost" href="{{ route('web.contacto') }}">Contactar</a>
        <a class="btn btn-primary" href="{{ $waLink }}" target="_blank" rel="noreferrer">WhatsApp</a>
      </div>
    </div>

  </div>
</header>

{{-- DIVIDER ROJO FULL WIDTH (100% pantalla) --}}

