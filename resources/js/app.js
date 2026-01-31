import "../css/app.css";
import "./bootstrap";

(function () {
    const header = document.getElementById("siteHeader");
    const btn = document.getElementById("mobileMenuBtn");
    const menu = document.getElementById("mobileMenu");

    function onScroll() {
        if (!header) return;
        header.classList.toggle("is-scrolled", window.scrollY > 20);
    }

    window.addEventListener("scroll", onScroll, { passive: true });
    onScroll();

    if (btn && menu) {
        btn.addEventListener("click", () => {
            const isOpen = !menu.hasAttribute("hidden");
            if (isOpen) {
                menu.setAttribute("hidden", "");
                btn.setAttribute("aria-expanded", "false");
            } else {
                menu.removeAttribute("hidden");
                btn.setAttribute("aria-expanded", "true");
            }
        });

        menu.querySelectorAll("a").forEach((a) => {
            a.addEventListener("click", () => {
                menu.setAttribute("hidden", "");
                btn.setAttribute("aria-expanded", "false");
            });
        });
    }

    // LOADING
    const loading = document.getElementById("loadingScreen");
    if (loading) {
        document.body.classList.add("loading-lock");

        const fadeTimer = setTimeout(() => {
            loading.classList.add("is-fading");
        }, 1500);

        const removeTimer = setTimeout(() => {
            loading.remove();
            document.body.classList.remove("loading-lock");
        }, 2000);

        window.addEventListener("beforeunload", () => {
            clearTimeout(fadeTimer);
            clearTimeout(removeTimer);
            document.body.classList.remove("loading-lock");
        });
    }
})();

// Plans carousel (Mi Red)
(function initPlansCarousel() {
    const root = document.querySelector("[data-plans-carousel]");
    if (!root) return;

    const track = root.querySelector("[data-track]");
    const cards = Array.from(root.querySelectorAll("[data-card]"));
    const btnPrev = root.querySelector("[data-prev]");
    const btnNext = root.querySelector("[data-next]");

    if (!track || cards.length === 0) return;

    let index = Math.floor(cards.length / 2); // arranca con el centro “natural”
    let cardWidth = 0;
    let gap = 18; // debe coincidir con CSS .pc-track gap

    const readLayout = () => {
        const first = cards[0];
        const rect = first.getBoundingClientRect();
        cardWidth = rect.width;

        // intenta leer gap real desde CSS si existe
        const styles = window.getComputedStyle(track);
        const g = parseFloat(styles.columnGap || styles.gap || "18");
        if (!Number.isNaN(g)) gap = g;
    };

    const applyClasses = () => {
        cards.forEach((c, i) => {
            c.classList.remove("is-center", "is-side");
            if (i === index) c.classList.add("is-center");
            else c.classList.add("is-side");
        });
    };

    const moveToIndex = () => {
        readLayout();

        // centramos el card “index” en el viewport
        const viewport = root.querySelector(".pc-viewport");
        const viewportWidth = viewport.getBoundingClientRect().width;

        // posición del card dentro del track: i*(cardWidth+gap)
        const cardLeft = index * (cardWidth + gap);

        // queremos que el centro del card quede en el centro del viewport
        const target = cardLeft - viewportWidth / 2 + cardWidth / 2;

        track.style.transform = `translateX(${-target}px)`;
        applyClasses();
    };

    const prev = () => {
        index = (index - 1 + cards.length) % cards.length;
        moveToIndex();
    };

    const next = () => {
        index = (index + 1) % cards.length;
        moveToIndex();
    };

    btnPrev?.addEventListener("click", prev);
    btnNext?.addEventListener("click", next);

    // Recalcular en resize (evita desfases)
    window.addEventListener("resize", () => {
        moveToIndex();
    });

    // (Opcional) click en card para centrarla
    cards.forEach((c, i) => {
        c.style.cursor = "pointer";
        c.addEventListener("click", () => {
            index = i;
            moveToIndex();
        });
    });

    // init
    requestAnimationFrame(() => {
        moveToIndex();
    });
})();

(function initPlansTabs() {
    const root = document.querySelector(".home-plans");
    if (!root) return;

    const tablist = root.querySelector(".plan-tabs");
    const tabs = Array.from(root.querySelectorAll(".plan-tab[data-tab]"));
    const panels = Array.from(root.querySelectorAll(".plan-panel[data-panel]"));

    if (!tablist || !tabs.length || !panels.length) return;

    function setActive(key) {
        // tabs
        tabs.forEach((t) => {
            const on = t.dataset.tab === key;
            t.classList.toggle("is-active", on);
            t.setAttribute("aria-selected", on ? "true" : "false");
        });

        // panels
        panels.forEach((p) => {
            const on = p.dataset.panel === key;
            p.classList.toggle("is-active", on);
            if (on) p.removeAttribute("hidden");
            else p.setAttribute("hidden", "hidden");
        });

        // si el panel activo tiene carrusel, recalcula posiciones
        const activePanel = panels.find((p) => p.dataset.panel === key);
        if (activePanel?.querySelector("[data-plans-carousel]")) {
            requestAnimationFrame(() =>
                window.dispatchEvent(new Event("resize")),
            );
        }
    }

    tabs.forEach((t) =>
        t.addEventListener("click", () => setActive(t.dataset.tab)),
    );

    // init: el active o el primero
    const initial =
        tabs.find((t) => t.classList.contains("is-active"))?.dataset.tab ||
        tabs[0].dataset.tab;
    setActive(initial);
})();

(function initFibraTvPacks() {
    const root = document.querySelector("[data-tv-bundles]");
    if (!root) return;

    const dataEl = root.querySelector("[data-tv-bundles-data]");
    const cardsWrap = root.querySelector("[data-cards]");
    const packBtns = Array.from(root.querySelectorAll("[data-pack]"));
    const providerBtns = Array.from(root.querySelectorAll("[data-provider]"));

    if (!dataEl || !cardsWrap || !packBtns.length) return;

    const packs = JSON.parse(dataEl.textContent || "{}");
    let activePack =
        packBtns.find((b) => b.classList.contains("is-active"))?.dataset.pack ||
        packBtns[0].dataset.pack;

    const waNumber = (window.__MIRE_WA__ || "").replace(/\D+/g, "");
    // Si no usas variable global, no pasa nada. Los links los armamos igual con tu número en blade cuando recargue,
    // pero acá generamos un wa.me simple. Si quieres, te lo conecto a tu PHP después.

    function setActivePack(key) {
        activePack = key;

        packBtns.forEach((b) => {
            const on = b.dataset.pack === key;
            b.classList.toggle("is-active", on);
            b.setAttribute("aria-selected", on ? "true" : "false");
        });

        const chosen = packs[key];
        if (!chosen) return;

        // Render simple 2 cards
        cardsWrap.innerHTML = chosen.plans
            .map((p) => {
                const msg = encodeURIComponent(
                    `Hola, quiero el pack ${chosen.label} con Internet ${p.mbps} Mbps. ¿Hay cobertura en mi zona? (Huancayo)`,
                );
                const wa = waNumber
                    ? `https://wa.me/${waNumber}?text=${msg}`
                    : `https://wa.me/?text=${msg}`;

                const extras = (p.extras || [])
                    .map((x) => `<div class="tvb-extra">${x}</div>`)
                    .join("");

                return `
        <article class="tvb-card">
          <div class="tvb-card-inner">
            <div class="tvb-card-top">
              <div class="tvb-pill">
                Internet<br>
                <strong>100% Fibra Óptica</strong><br>
                <span class="tvb-mbps">${p.mbps} Mbps</span>
              </div>

              <div class="tvb-plus">+</div>

              <div class="tvb-pill tvb-pill-tv">
                <span class="tvb-tvbrand">${p.tv}</span>
              </div>
            </div>

            <div class="tvb-price">
              <span class="tvb-currency">${p.price}</span>
              <span class="tvb-per">x 1 mes</span>
            </div>

            <div class="tvb-note">${p.note || ""}</div>

            <div class="tvb-extras">${extras}</div>

            <div class="tvb-cta">
              <a class="tvb-btn" href="${wa}" target="_blank" rel="noreferrer">¡Quiero este plan!</a>
              <button class="tvb-details" type="button">Detalles <span>▾</span></button>
            </div>
          </div>
        </article>
      `;
            })
            .join("");
    }

    packBtns.forEach((b) =>
        b.addEventListener("click", () => setActivePack(b.dataset.pack)),
    );

    // Provider switch (solo UI por ahora; si luego quieres DGO con sus packs, lo añadimos)
    providerBtns.forEach((b) => {
        b.addEventListener("click", () => {
            providerBtns.forEach((x) => {
                const on = x === b;
                x.classList.toggle("is-active", on);
                x.setAttribute("aria-selected", on ? "true" : "false");
            });
        });
    });

    setActivePack(activePack);
})();
/* =========================
   Tabs (Panel 1 / Panel 2 / Panel 3)
   ========================= */
(function initPlansTabs() {
    const root = document.querySelector(".home-plans");
    if (!root) return;

    const tablist = root.querySelector(".plan-tabs");
    const tabs = Array.from(root.querySelectorAll(".plan-tab[data-tab]"));
    const panels = Array.from(root.querySelectorAll(".plan-panel[data-panel]"));
    if (!tablist || !tabs.length || !panels.length) return;

    function setActive(key) {
        // tabs
        tabs.forEach((t) => {
            const on = t.dataset.tab === key;
            t.classList.toggle("is-active", on);
            t.setAttribute("aria-selected", on ? "true" : "false");
        });

        // panels
        panels.forEach((p) => {
            const on = p.dataset.panel === key;
            p.classList.toggle("is-active", on);
            if (on) p.removeAttribute("hidden");
            else p.setAttribute("hidden", "hidden");
        });

        // Si el panel activo tiene carrusel, recalcular
        const activePanel = panels.find((p) => p.dataset.panel === key);
        if (activePanel?.querySelector("[data-plans-carousel]")) {
            requestAnimationFrame(() =>
                window.dispatchEvent(new Event("resize")),
            );
        }
    }

    tabs.forEach((t) =>
        t.addEventListener("click", () => setActive(t.dataset.tab)),
    );

    const initial =
        tabs.find((t) => t.classList.contains("is-active"))?.dataset.tab ||
        tabs[0].dataset.tab;

    setActive(initial);
})();

/* =========================
   Panel 2: Fibra + TV (Providers + Packs + N Cards)
   ========================= */
(function initTvBundles() {
    const root = document.querySelector("[data-tv-bundles]");
    if (!root) return;

    const dataEl = root.querySelector("[data-tv-bundles-data]");
    const cardsWrap = root.querySelector("[data-cards]");
    const packsWrap = root.querySelector("[data-packs]");
    const providerBtns = Array.from(root.querySelectorAll("[data-provider]"));

    if (!dataEl || !cardsWrap || !packsWrap || !providerBtns.length) return;

    let providers = {};
    try {
        providers = JSON.parse(dataEl.textContent || "{}");
    } catch {
        providers = {};
    }

    const wa =
        (window.__MIRE_WA__ || "51924979568").replace(/\D+/g, "") ||
        "51924979568";

    // state
    let activeProvider =
        providerBtns.find((b) => b.classList.contains("is-active"))?.dataset
            .provider || "wintv";
    let activePackKey = null;

    function setProviderUI(provider) {
        providerBtns.forEach((btn) => {
            const on = btn.dataset.provider === provider;
            btn.classList.toggle("is-active", on);
            btn.setAttribute("aria-selected", on ? "true" : "false");
        });
    }

    function renderPacks(provider) {
        const prov = providers?.[provider];
        const packs = prov?.packs || {};

        const keys = Object.keys(packs);
        if (!keys.length) {
            packsWrap.innerHTML = "";
            cardsWrap.innerHTML = "";
            activePackKey = null;
            return;
        }

        // elige pack activo: si no existe, el primero
        if (!activePackKey || !packs[activePackKey]) activePackKey = keys[0];

        packsWrap.innerHTML = keys
            .map((k) => {
                const isOn = k === activePackKey;
                const label = packs[k]?.label || k;
                return `
          <button class="tvb-pack ${isOn ? "is-active" : ""}"
                  type="button"
                  data-pack="${k}"
                  aria-selected="${isOn ? "true" : "false"}">
            ${label}
            <span class="tvb-pack-notch" aria-hidden="true"></span>
          </button>
        `;
            })
            .join("");

        // listeners packs
        packsWrap.querySelectorAll("[data-pack]").forEach((btn) => {
            btn.addEventListener("click", () => {
                activePackKey = btn.dataset.pack;
                renderPacks(activeProvider); // rerender para marcar activo
                renderCards(activeProvider, activePackKey);
            });
        });

        renderCards(provider, activePackKey);
    }

    function cardTemplate(plan, packLabel) {
        const msg = encodeURIComponent(
            `Hola, me interesa ${packLabel} (Internet + TV). ` +
                `Internet ${plan.mbps} Mbps. Precio ${plan.price}. ¿Hay cobertura en mi zona? (Huancayo)`,
        );
        const waLink = `https://wa.me/${wa}?text=${msg}`;

        const extras = (plan.extras || [])
            .map((x) => `<div class="tvb-extra">${x}</div>`)
            .join("");

        return `
      <article class="tvb-card">
        <div class="tvb-card-inner">
          <div class="tvb-card-top">
            <div class="tvb-pill">
              Internet<br>
              <strong>100% Fibra Óptica</strong><br>
              <span class="tvb-mbps">${plan.mbps} Mbps</span>
            </div>

            <div class="tvb-plus">+</div>

            <div class="tvb-pill tvb-pill-tv">
              <span class="tvb-tvbrand">${plan.tv || "TV HD"}</span>
            </div>
          </div>

          <div class="tvb-price">
            <span class="tvb-currency">${plan.price}</span>
            <span class="tvb-per">x 1 mes</span>
          </div>

          <div class="tvb-note">${plan.note || ""}</div>
          <div class="tvb-extras">${extras}</div>

          <div class="tvb-cta">
            <a class="tvb-btn" href="${waLink}" target="_blank" rel="noreferrer">¡Quiero este plan!</a>
            <button class="tvb-details" type="button">Detalles <span>▾</span></button>
          </div>
        </div>
      </article>
    `;
    }

    function renderCards(provider, packKey) {
        const prov = providers?.[provider];
        const pack = prov?.packs?.[packKey];
        if (!pack) {
            cardsWrap.innerHTML = "";
            return;
        }

        const label = pack.label || prov.label || "Mi Red";
        const plans = pack.plans || [];

        // ✅ Aquí es donde “aumentas más tarjetas”: agrega más objetos en plans[]
        cardsWrap.innerHTML = plans.map((p) => cardTemplate(p, label)).join("");
    }

    // provider events
    providerBtns.forEach((btn) => {
        btn.addEventListener("click", () => {
            activeProvider = btn.dataset.provider;
            activePackKey = null; // 🔥 clave: al cambiar provider, resetea pack
            setProviderUI(activeProvider);
            renderPacks(activeProvider);
        });
    });

    // init
    setProviderUI(activeProvider);
    renderPacks(activeProvider);
})();
