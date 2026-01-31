@php
  // WhatsApp (sin espacios para wa.me)
  $whatsapp = preg_replace('/\D+/', '', ($whatsapp ?? '51999999999'));
  $waText = rawurlencode('Hola, quiero consultar cobertura y planes de internet en Huancayo.');
  $waLink = "https://wa.me/{$whatsapp}?text={$waText}";
@endphp

<section class="hero-root" id="hero">
  <div class="hero-bg"></div>
  <div class="hero-gridlines" aria-hidden="true"></div>

  <div class="hero-orb o1" aria-hidden="true"></div>
  <div class="hero-orb o2" aria-hidden="true"></div>
  <div class="hero-orb o3" aria-hidden="true"></div>
  <div class="hero-orb o4" aria-hidden="true"></div>

  <div class="container hero-container">
    <div class="hero-layout">

      <div class="hero-left">
        <div class="hero-badge">
          <span class="hero-ping" aria-hidden="true"></span>
          <span>Internet fibra óptica en Huancayo</span>
        </div>

        <div class="hero-headings">
          <h1 class="hero-h1">
            <span class="hero-title-main">Conéctate con</span>
            <span class="hero-title-gradient">fibra óptica real</span>
          </h1>

          <p class="hero-paragraph">
            Planes para streaming, clases virtuales, trabajo remoto y gaming.
            Consulta cobertura y contrata en minutos.
          </p>
        </div>

        <div class="hero-ctas">
          <a class="btn btn-primary hero-btn" href="{{ route('web.planes') }}">
            Ver planes
            <svg class="icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
            </svg>
          </a>

          <a class="btn btn-ghost hero-btn" href="{{ route('web.cobertura') }}">Consultar cobertura</a>
          <a class="btn btn-ghost hero-btn" href="{{ $waLink }}" target="_blank" rel="noreferrer">WhatsApp</a>
        </div>

        <div class="hero-stats">
          <div class="stat">
            <div class="stat-num">FTTH</div>
            <div class="stat-label">Fibra real</div>
          </div>
          <div class="stat">
            <div class="stat-num">24/7</div>
            <div class="stat-label">Soporte</div>
          </div>
          <div class="stat">
            <div class="stat-num">+Zonas</div>
            <div class="stat-label">En expansión</div>
          </div>
        </div>
      </div>

      <div class="hero-right">
        <div class="hero-visual">
          <div class="hero-phone">
            <div class="hero-phone-screen">
              <div class="hero-phone-status"></div>

              <div class="phone-content">
                <div class="avatar">
                  <svg class="avatar-ico" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                  </svg>
                </div>

                <div class="profile-title">
                  <div class="p-name">Mi Red Huancayo</div>
                  <div class="p-role">Fibra Óptica</div>
                </div>

                <div class="link-cards">
                  <div class="link-card">
                    <div class="link-ico red">⚡</div>
                    <div class="link-line"></div>
                  </div>
                  <div class="link-card">
                    <div class="link-ico dark">📶</div>
                    <div class="link-line"></div>
                  </div>
                  <div class="link-card">
                    <div class="link-ico gray">🛠️</div>
                    <div class="link-line"></div>
                  </div>
                </div>
              </div>

              <div class="hero-phone-home"></div>
            </div>
          </div>

          {{-- Card animada --}}
          <div class="hero-nfc" data-hero-nfc>
            <div class="nfc-overlay"></div>

            <div class="nfc-inner">
              <div class="nfc-top">
                <div class="nfc-meta">
                  <div class="nfc-brand">Mi Red</div>
                  <div class="nfc-sub">Smart Service</div>
                </div>

                <div class="nfc-chip" data-hero-chip aria-hidden="true">
                  <svg class="chip-ico" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                    <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z" />
                  </svg>
                </div>
              </div>

              <div class="nfc-bottom">
                <div class="nfc-msg">Internet estable • Huancayo</div>
              </div>
            </div>

            <div class="nfc-waves" data-hero-waves hidden aria-hidden="true">
              <span class="wave"></span>
              <span class="wave w2"></span>
              <span class="wave w3"></span>
            </div>
          </div>

          <div class="mini-blob b1" aria-hidden="true"></div>
          <div class="mini-blob b2" aria-hidden="true"></div>
          <div class="mini-blob b3" aria-hidden="true"></div>

        </div>
      </div>

    </div>
  </div>

  <div class="hero-scroll" aria-hidden="true">
    <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/>
    </svg>
  </div>

</section>
<script>
(function () {
  // evita inicializar más de una vez
  if (window.__HERO_NFC_READY__) return;
  window.__HERO_NFC_READY__ = true;

  function initCard(card){
    if (!card || card.dataset.ready === '1') return;
    card.dataset.ready = '1';

    const waves = card.querySelector('[data-hero-waves]');
    const chip  = card.querySelector('[data-hero-chip]');

    function runAnim(){
      card.classList.add('is-anim');
      if (waves) waves.hidden = false;
      if (chip) chip.classList.add('chip-on');

      setTimeout(() => {
        card.classList.remove('is-anim');
        if (waves) waves.hidden = true;
        if (chip) chip.classList.remove('chip-on');
      }, 2000);
    }

    runAnim();
    const interval = setInterval(runAnim, 5000);

    window.addEventListener('beforeunload', () => clearInterval(interval));
  }

  // Soporta 1 o varios heroes en el DOM
  document.querySelectorAll('[data-hero-nfc]').forEach(initCard);
})();
</script>




