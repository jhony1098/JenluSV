<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Jenlu Sv — regalos que se sienten</title>
  <style>
    :root { --ink:#342d3b; --muted:#756e7b; --cream:#fffaf4; --lilac:#e9ddfb; --peach:#ffd9c6; --rose:#f6c6d8; --mint:#d9efe6; --line:rgba(52,45,59,.13); }
    * { box-sizing:border-box; } body { margin:0; font-family:Arial,Helvetica,sans-serif; color:var(--ink); background:var(--cream); } button { font:inherit; cursor:pointer; } .notice { background:var(--ink); color:#fff; text-align:center; padding:11px 16px; font-size:13px; letter-spacing:.04em; } .shell { width:min(1180px,calc(100% - 40px)); margin:auto; }
    header { position:relative; padding:22px 0 17px; display:flex; align-items:center; justify-content:space-between; border-bottom:1px solid var(--line); } .brand { font-family:Georgia,serif; font-size:28px; font-weight:bold; letter-spacing:-1px; color:inherit; text-decoration:none; cursor:pointer; display:inline-block; } .brand span { color:#c581a2; } nav { display:flex; align-items:center; gap:25px; } nav a, .nav-link { color:var(--ink); border:0; background:transparent; text-decoration:none; font-size:14px; padding:0; } .nav-item { position:relative; } .nav-item-trigger { display:inline-flex; align-items:center; gap:5px; } .nav-item-trigger .caret { font-size:11px; transition:transform .15s ease; } .nav-item-trigger[aria-expanded="true"] .caret { transform:rotate(180deg); } .nav-dropdown { display:none; flex-direction:column; position:absolute; top:calc(100% + 12px); left:0; background:#fff; border:1px solid var(--line); border-radius:14px; padding:8px; min-width:200px; box-shadow:0 14px 26px rgba(52,45,59,.14); z-index:60; } .nav-dropdown.open { display:flex; } .nav-dropdown button { text-align:left; padding:9px 10px; border-radius:8px; background:transparent; border:0; color:var(--ink); font-size:14px; } .nav-dropdown button:hover { background:var(--lilac); } .header-actions { display:flex; align-items:center; gap:10px; } .cart { border:1px solid var(--ink); border-radius:999px; padding:10px 14px; background:transparent; font-size:14px; white-space:nowrap; } .nav-toggle { display:none; border:1px solid var(--ink); background:transparent; border-radius:10px; width:38px; height:38px; font-size:16px; align-items:center; justify-content:center; }
    .hero { margin:36px 0 78px; padding:72px clamp(26px,7vw,94px); min-height:455px; background:var(--lilac); border-radius:26px; display:grid; grid-template-columns:1.1fr .9fr; gap:35px; overflow:hidden; position:relative; } .hero:after { content:""; width:340px; height:340px; background:var(--peach); position:absolute; border-radius:50%; right:-70px; bottom:-120px; } .eyebrow { text-transform:uppercase; letter-spacing:.14em; font-size:12px; font-weight:bold; } h1,h2,h3 { font-family:Georgia,serif; margin:0; } h1 { font-size:clamp(38px,6vw,76px); line-height:.98; letter-spacing:-.055em; margin:20px 0; } .hero p { max-width:440px; color:var(--muted); line-height:1.6; font-size:17px; } .button { display:inline-block; margin-top:18px; background:var(--ink); color:#fff; padding:14px 22px; border-radius:999px; border:0; text-decoration:none; } .hero-art { z-index:1; display:grid; place-items:center; } .orb { width:min(285px,100%); aspect-ratio:1; border-radius:50% 50% 42% 58%; background:var(--rose); border:22px solid rgba(255,250,244,.7); display:grid; place-items:center; font-family:Georgia,serif; font-size:clamp(22px,4vw,34px); text-align:center; padding:38px; transform:rotate(-10deg); }
    .section-head { display:flex; justify-content:space-between; align-items:end; gap:18px; margin-bottom:26px; flex-wrap:wrap; } h2 { font-size:clamp(30px,4vw,42px); letter-spacing:-.04em; } .filters { display:flex; gap:9px; flex-wrap:wrap; } .filter { border:1px solid var(--line); background:transparent; color:var(--ink); padding:9px 14px; border-radius:999px; } .filter.active { background:var(--ink); color:#fff; border-color:var(--ink); } .filter .count { opacity:.6; margin-left:4px; font-size:12px; }
    .grid { display:grid; grid-template-columns:repeat(4,1fr); gap:16px; } .product { background:#fff; padding:13px; border-radius:18px; border:1px solid rgba(52,45,59,.07); } .product-visual { position:relative; height:205px; border-radius:12px; overflow:hidden; background:var(--lilac); cursor:zoom-in; } .product-visual img { width:100%; height:100%; object-fit:cover; display:block; transition:transform .35s ease; } .product-visual:hover img { transform:scale(1.06); } .zoom-badge { position:absolute; right:8px; bottom:8px; width:30px; height:30px; border-radius:50%; background:rgba(255,250,244,.92); display:grid; place-items:center; font-size:14px; box-shadow:0 2px 6px rgba(52,45,59,.18); } .angle-count { position:absolute; left:8px; top:8px; background:rgba(52,45,59,.72); color:#fff; font-size:11px; padding:4px 8px; border-radius:999px; letter-spacing:.02em; } .category-tag { position:absolute; left:8px; bottom:8px; background:rgba(255,250,244,.92); color:var(--ink); font-size:11px; padding:4px 9px; border-radius:999px; text-transform:uppercase; letter-spacing:.05em; font-weight:bold; } .product h3 { font-size:20px; margin:16px 0 7px; } .description { color:var(--muted); line-height:1.45; min-height:58px; font-size:13px; margin:0 0 9px; } .product-row { display:flex; justify-content:space-between; align-items:center; } .price { color:var(--muted); font-size:14px; } .add { border:0; background:transparent; color:#9e5478; font-weight:bold; padding:8px 0; }
    .story { margin:84px 0; background:var(--peach); border-radius:26px; padding:54px; display:grid; grid-template-columns:1fr 1fr; gap:46px; } .story h2 { font-size:clamp(30px,5vw,50px); } .story p { color:var(--muted); line-height:1.65; font-size:17px; max-width:450px; } .story-note { border-left:1px solid rgba(52,45,59,.22); padding-left:30px; font-family:Georgia,serif; font-size:clamp(19px,3vw,25px); align-self:center; }
    footer { border-top:1px solid var(--line); padding:50px 0 26px; display:grid; grid-template-columns:2fr 1fr 1fr; gap:30px; } footer p,footer a { color:var(--muted); text-decoration:none; line-height:1.8; font-size:14px; } footer h3 { font-size:17px; } .copyright { grid-column:1/-1; padding-top:18px; border-top:1px solid var(--line); color:var(--muted); font-size:12px; }

    /* Lightbox */
    .lightbox-overlay { position:fixed; inset:0; background:rgba(52,45,59,.82); backdrop-filter:blur(2px); display:none; align-items:center; justify-content:center; z-index:100; padding:24px; }
    .lightbox-overlay.open { display:flex; }
    .lightbox { width:min(920px,100%); max-height:90vh; background:var(--cream); border-radius:20px; padding:20px; display:grid; grid-template-rows:auto auto; gap:14px; overflow:auto; }
    .lightbox-top { display:flex; justify-content:space-between; align-items:center; gap:10px; }
    .lightbox-title { font-family:Georgia,serif; font-size:22px; }
    .lightbox-close { border:1px solid var(--line); background:#fff; border-radius:50%; width:34px; height:34px; font-size:16px; line-height:1; flex:0 0 auto; }
    .lightbox-main { position:relative; height:min(58vh,520px); border-radius:14px; overflow:hidden; background:var(--lilac); cursor:zoom-in; touch-action:none; }
    .lightbox-main img { width:100%; height:100%; object-fit:cover; display:block; transform-origin:center; transition:transform .12s ease-out; }
    .lightbox-main.zoomed img { cursor:zoom-out; }
    .lightbox-hint { position:absolute; bottom:10px; left:50%; transform:translateX(-50%); background:rgba(52,45,59,.72); color:#fff; font-size:11px; padding:5px 11px; border-radius:999px; pointer-events:none; }
    .lightbox-nav { position:absolute; top:50%; transform:translateY(-50%); border:0; width:38px; height:38px; border-radius:50%; background:rgba(255,250,244,.92); font-size:16px; display:grid; place-items:center; box-shadow:0 2px 6px rgba(52,45,59,.18); }
    .lightbox-prev { left:12px; } .lightbox-next { right:12px; }
    .lightbox-thumbs { display:flex; gap:9px; overflow-x:auto; padding-bottom:2px; }
    .lightbox-thumbs button { flex:0 0 auto; width:64px; height:64px; border-radius:10px; overflow:hidden; padding:0; border:2px solid transparent; background:none; }
    .lightbox-thumbs button.active { border-color:var(--ink); }
    .lightbox-thumbs img { width:100%; height:100%; object-fit:cover; display:block; }
    .lightbox-perspective { color:var(--muted); font-size:13px; }

    /* Tablet */
    @media(max-width:1024px) and (min-width:761px) {
      .grid { grid-template-columns:repeat(3,1fr); }
      .shell { width:min(100% - 32px, 940px); }
    }

    /* Mobile */
    @media(max-width:760px) {
      .shell { width:min(100% - 28px,600px); }
      nav { display:none; }
      nav.open { display:flex; flex-direction:column; align-items:stretch; position:absolute; top:100%; left:0; right:0; background:var(--cream); padding:16px 20px; border-bottom:1px solid var(--line); gap:6px; z-index:50; box-shadow:0 12px 20px rgba(52,45,59,.08); }
      nav.open .nav-link { padding:10px 2px; }
      .nav-item { width:100%; }
      .nav-item-trigger { width:100%; justify-content:space-between; padding:10px 2px; }
      .nav-dropdown { position:static; box-shadow:none; border:0; padding:2px 0 4px 12px; margin-top:2px; min-width:0; }
      .nav-toggle { display:flex; }
      header { padding:17px 0; }
      .hero { margin:22px 0 55px; min-height:auto; grid-template-columns:1fr; padding:42px 25px; }
      .hero-art { min-height:220px; }
      .orb { width:220px; }
      .section-head { align-items:start; flex-direction:column; }
      .grid { grid-template-columns:repeat(2,1fr); gap:10px; }
      .product { padding:10px; }
      .product-visual { min-height:155px; }
      .product h3 { font-size:17px; }
      .story { margin:58px 0; padding:32px 24px; grid-template-columns:1fr; gap:25px; }
      .story-note { padding-left:18px; }
      footer { grid-template-columns:1fr 1fr; }
      footer > :first-child { grid-column:1/-1; }
      .lightbox { padding:14px; }
      .lightbox-main { height:44vh; }
    }

    /* Small phones */
    @media(max-width:420px) {
      .hero { padding:32px 18px; }
      .grid { grid-template-columns:1fr; }
      .cart { padding:9px 12px; font-size:13px; }
      .lightbox-thumbs button { width:52px; height:52px; }
      .lightbox-nav { width:32px; height:32px; font-size:14px; }
    }
    .nav-dropdown a { display:block; text-align:left; padding:9px 10px; border-radius:8px; }
    .nav-dropdown a:hover { background:var(--lilac); }
  </style>
</head>
<body>
  <div class="notice">Entrega local el mismo día · Haz que el detalle llegue hoy</div>
  <main class="shell">
    <header>
      <a href="index.php" class="brand" id="brandHome" aria-label="Ir al inicio">Jenlu <span>Sv</span></a>
      <nav id="siteNav">
        <a href="index.php" class="nav-link" id="navHome">Inicio</a>
        <div class="nav-item">
          <button class="nav-link nav-item-trigger" id="regalosTrigger" aria-haspopup="true" aria-expanded="false">Regalos <span class="caret">▾</span></button>
          <div class="nav-dropdown" id="regalosDropdown"></div>
        </div>
        <a href="index.php#historia" class="nav-link">Nuestra idea</a>
        <a href="index.php#contacto" class="nav-link">Contacto</a>
      </nav>
      <div class="header-actions">
        <button class="cart" id="cart">Bolsa · 0</button>
        <button class="nav-toggle" id="navToggle" aria-label="Abrir menú" aria-expanded="false">☰</button>
      </div>
    </header>
    <section class="hero"><div><div class="eyebrow">Regalos de temporada</div><h1>Pequeños gestos.<br>Gran emoción.</h1><p>Arreglos y detalles creados para cada persona y cada ocasión que merece ser recordada.</p><a class="button" href="#regalos">Explorar regalos</a></div><div class="hero-art"><div class="orb">Una pausa para celebrar</div></div></section>
    <section id="regalos"><div class="section-head"><div><div class="eyebrow">La selección</div><h2>Regalos para hoy</h2></div><div class="filters" id="filters"></div></div><div class="grid" id="grid"></div></section>
    <section class="story" id="historia"><div><div class="eyebrow">Hecho para compartir</div><h2>Más que un regalo bonito.</h2><p>Una colección pensada para convertir las ocasiones cotidianas en algo especial: detalles suaves, tonos luminosos y una presentación que se siente personal.</p><a class="button" href="#contacto">Escríbenos</a></div><div class="story-note">“Un regalo puede decir mucho antes de que abras la tarjeta.”</div></section>
    <footer id="contacto"><div><a href="index.php" class="brand" id="brandHomeFooter" aria-label="Ir al inicio">Jenlu <span>Sv</span></a><p>Regalos para ella, para él y para cada fecha especial, a tu manera.</p></div><div><h3>Explora</h3><p><a href="index.php#regalos">Regalos</a><br><a href="index.php#historia">Nuestra idea</a><br><a href="index.php#contacto">Entregas</a></p></div><div><h3>Contacto</h3><p>hola@jenlusv.example<br>+503 0000 0000<br>San Salvador</p></div><div class="copyright">© 2026 Jenlu Sv. Prototipo conceptual.</div></footer>
  </main>

  <div class="lightbox-overlay" id="lightboxOverlay">
    <div class="lightbox">
      <div class="lightbox-top">
        <div><div class="lightbox-title" id="lbTitle"></div><div class="lightbox-perspective" id="lbPerspective"></div></div>
        <button class="lightbox-close" id="lbClose" aria-label="Cerrar">✕</button>
      </div>
      <div class="lightbox-main" id="lbMain">
        <img id="lbImage" alt="">
        <button class="lightbox-nav lightbox-prev" id="lbPrev" aria-label="Anterior">‹</button>
        <button class="lightbox-nav lightbox-next" id="lbNext" aria-label="Siguiente">›</button>
        <span class="lightbox-hint" id="lbHint">Toca o pasa el mouse para acercar</span>
      </div>
      <div class="lightbox-thumbs" id="lbThumbs"></div>
    </div>
  </div>

  <script>
    // Categorías por destinatario / ocasión. Cada producto tiene varias fotos
    // (distintas perspectivas / ángulos) en vez de una sola imagen.
    const CATEGORIES = [
      { id:'damas', label:'Damas' },
      { id:'caballeros', label:'Caballeros' },
      { id:'san-valentin', label:'San Valentín' },
      { id:'madres', label:'Día de las Madres' },
      { id:'padres', label:'Día del Padre' },
      { id:'fechas-especiales', label:'Fechas especiales' },
      { id:'personalizables', label:'Personalizables' }
    ];

    const fallbackProducts = [
      { id:1, category:'personalizables', name:'Caja a tu manera', price:38,
        description:'Fresas cubiertas de chocolate y macarons, armada con lo que tú elijas.',
        images:[
          { url:'https://images.unsplash.com/photo-1563729784474-d77dbb933a9e?auto=format&fit=crop&w=1000&q=80', label:'Vista frontal' },
          { url:'https://images.unsplash.com/photo-1571115177098-24ec42ed204d?auto=format&fit=crop&w=1000&q=80', label:'Detalle de fresas' },
          { url:'https://images.unsplash.com/photo-1548907040-4baa419e6b04?auto=format&fit=crop&w=1000&q=80', label:'Caja abierta' }
        ] },
      { id:2, category:'damas', name:'Ramo abril', price:46,
        description:'Ramo de tonos suaves para consentir a alguien especial.',
        images:[
          { url:'https://images.unsplash.com/photo-1523438885200-e635ba2c371e?auto=format&fit=crop&w=1000&q=80', label:'Ramo completo' },
          { url:'https://images.unsplash.com/photo-1518895949257-7621c3c786d7?auto=format&fit=crop&w=1000&q=80', label:'Vista superior' },
          { url:'https://images.unsplash.com/photo-1587049633312-d628ae50a8ae?auto=format&fit=crop&w=1000&q=80', label:'Detalle de pétalos' }
        ] },
      { id:3, category:'fechas-especiales', name:'Dulce abrazo', price:32,
        description:'Selección de fresas, flores y detalles dulces para cualquier ocasión.',
        images:[
          { url:'https://images.unsplash.com/photo-1562440499-64c9a111f713?auto=format&fit=crop&w=1000&q=80', label:'Set completo' },
          { url:'https://images.unsplash.com/photo-1544437150-6969fd1c1d4b?auto=format&fit=crop&w=1000&q=80', label:'Detalle de dulces' }
        ] },
      { id:4, category:'san-valentin', name:'Jardín en rosa', price:54,
        description:'Rosas frescas presentadas en una caja de regalo, ideal para el amor.',
        images:[
          { url:'https://images.unsplash.com/photo-1490750967868-88aa4486c946?auto=format&fit=crop&w=1000&q=80', label:'Vista frontal' },
          { url:'https://images.unsplash.com/photo-1518709268805-4e9042af2176?auto=format&fit=crop&w=1000&q=80', label:'Rosas de cerca' },
          { url:'https://images.unsplash.com/photo-1560269531-b8e75a29a8b5?auto=format&fit=crop&w=1000&q=80', label:'Caja cerrada' }
        ] },
      { id:5, category:'caballeros', name:'Set caballero', price:42,
        description:'Chocolates finos y un detalle clásico pensado para él.',
        images:[
          { url:'https://images.unsplash.com/photo-1563729784474-d77dbb933a9e?auto=format&fit=crop&w=1000&q=80', label:'Vista frontal' },
          { url:'https://images.unsplash.com/photo-1571115177098-24ec42ed204d?auto=format&fit=crop&w=1000&q=80', label:'Detalle' }
        ] },
      { id:6, category:'madres', name:'Ternura para mamá', price:48,
        description:'Un arreglo floral con dedicatoria, pensado para decir gracias.',
        images:[
          { url:'https://images.unsplash.com/photo-1523438885200-e635ba2c371e?auto=format&fit=crop&w=1000&q=80', label:'Ramo completo' },
          { url:'https://images.unsplash.com/photo-1518895949257-7621c3c786d7?auto=format&fit=crop&w=1000&q=80', label:'Vista superior' }
        ] },
      { id:7, category:'padres', name:'Fuerza y gratitud', price:44,
        description:'Combo de dulces y un detalle robusto para celebrar a papá.',
        images:[
          { url:'https://images.unsplash.com/photo-1562440499-64c9a111f713?auto=format&fit=crop&w=1000&q=80', label:'Set completo' },
          { url:'https://images.unsplash.com/photo-1544437150-6969fd1c1d4b?auto=format&fit=crop&w=1000&q=80', label:'Detalle' }
        ] }
    ];

    let current = 'all', localCount = 0, activeProducts = [];
    let lbState = { productIndex:0, imageIndex:0 };

    const grid = document.querySelector('#grid');
    const filtersEl = document.querySelector('#filters');
    const cart = document.querySelector('#cart');
    const nav = document.querySelector('#siteNav');
    const navToggle = document.querySelector('#navToggle');
    const regalosTrigger = document.querySelector('#regalosTrigger');
    const regalosDropdown = document.querySelector('#regalosDropdown');
    const money = value => new Intl.NumberFormat('en-US',{style:'currency',currency:'USD',maximumFractionDigits:0}).format(value);
    const categoryLabel = id => CATEGORIES.find(c=>c.id===id)?.label || id;

    // ---- Menú móvil ----
    function closeMobileNav(){
      nav.classList.remove('open');
      navToggle.setAttribute('aria-expanded', 'false');
      navToggle.textContent = '☰';
    }
    navToggle.addEventListener('click', () => {
      const isOpen = nav.classList.toggle('open');
      navToggle.setAttribute('aria-expanded', String(isOpen));
      navToggle.textContent = isOpen ? '✕' : '☰';
    });

    // ---- Dropdown "Regalos" con las categorías, reutilizado por el menú ----
    function closeCategoryDropdown(){
      regalosDropdown.classList.remove('open');
      regalosTrigger.setAttribute('aria-expanded', 'false');
    }
    function buildCategoryNav(){
      const items = [{ id:'all', label:'Ver todo' }, ...CATEGORIES];
      regalosDropdown.innerHTML = items.map(c => c.id === 'all'
        ? `<a href="index.php#regalos">${c.label}</a>`
        : `<a href="categoria.php?categoria=${encodeURIComponent(c.id)}">${c.label}</a>`
      ).join('');
    }
    regalosTrigger.addEventListener('click', (e) => {
      e.stopPropagation();
      const isOpen = regalosDropdown.classList.toggle('open');
      regalosTrigger.setAttribute('aria-expanded', String(isOpen));
    });
    document.addEventListener('click', (e) => {
      if (!e.target.closest('.nav-item')) closeCategoryDropdown();
    });
    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape') closeCategoryDropdown();
    });

    // Ir a una categoría desde el menú (o desde "Ver todo") y llevar al usuario a la sección
    function goToCategory(categoryId){
      current = categoryId;
      draw();
      document.querySelector('#regalos').scrollIntoView({ behavior:'smooth', block:'start' });
      closeCategoryDropdown();
      closeMobileNav();
    }

    // El logo funciona como botón de inicio: limpia el filtro y sube al tope de la página
    function goHome(e){
      e.preventDefault();
      current = 'all';
      draw();
      window.scrollTo({ top:0, behavior:'smooth' });
      closeCategoryDropdown();
      closeMobileNav();
    }
    document.querySelector('#brandHome').addEventListener('click', goHome);
    document.querySelector('#brandHomeFooter').addEventListener('click', goHome);
    document.querySelector('#navHome').addEventListener('click', goHome);

    nav.querySelectorAll('a').forEach(a => {
      if (a.id === 'navHome') return; // ya maneja su propio click con goHome
      a.addEventListener('click', closeMobileNav);
    });

    async function loadCart(){ try { const data=await fetch('api.php?action=cart').then(r=>r.json()); cart.textContent=`Bolsa · ${data.count}`; } catch { cart.textContent=`Bolsa · ${localCount}`; } }
    async function add(id){ try { const response=await fetch('api.php?action=cart',{method:'POST',headers:{'Content-Type':'application/json'},body:JSON.stringify({productId:id})}); const data=await response.json(); cart.textContent=`Bolsa · ${data.count}`; } catch { localCount++; cart.textContent=`Bolsa · ${localCount}`; } }

    function drawFilters(products){
      const counts = { all: products.length };
      CATEGORIES.forEach(c => counts[c.id] = products.filter(p=>p.category===c.id).length);
      const buttons = [{ id:'all', label:'Todo' }, ...CATEGORIES].filter(c => c.id==='all' || counts[c.id] > 0);
      filtersEl.innerHTML = buttons.map(c =>
        `<button class="filter${current===c.id?' active':''}" data-filter="${c.id}">${c.label}<span class="count">${counts[c.id]}</span></button>`
      ).join('');
      filtersEl.querySelectorAll('.filter').forEach(b=>b.onclick=()=>{ current=b.dataset.filter; draw(); });
    }

    async function draw(){
      let products = fallbackProducts;
      try {
        const data = await fetch(`api.php?action=products&category=${current}`).then(r=>r.json());
        products = data.products;
      } catch {
        products = current==='all' ? fallbackProducts : fallbackProducts.filter(p=>p.category===current);
      }
      activeProducts = products;
      drawFilters(fallbackProducts); // counts always reflect the full catalog
      grid.innerHTML = '';
      products.forEach((p, idx) => {
        const el = document.createElement('article');
        el.className = 'product';
        const cover = p.images?.[0]?.url || p.image;
        const angleCount = p.images?.length || 1;
        el.innerHTML = `
          <div class="product-visual" data-open="${idx}">
            <img src="${cover}" alt="${p.name}" loading="lazy">
            ${angleCount>1 ? `<span class="angle-count">${angleCount} vistas</span>` : ''}
            <span class="category-tag">${categoryLabel(p.category)}</span>
            <span class="zoom-badge">🔍</span>
          </div>
          <h3>${p.name}</h3>
          <p class="description">${p.description}</p>
          <div class="product-row"><span class="price">${money(p.price)}</span><button class="add">Añadir</button></div>`;
        el.querySelector('.add').onclick = () => add(p.id);
        el.querySelector('.product-visual').onclick = () => openLightbox(idx);
        grid.append(el);
      });
    }

    // ---- Lightbox: navegación entre perspectivas + acercamiento ----
    const overlay = document.querySelector('#lightboxOverlay');
    const lbMain = document.querySelector('#lbMain');
    const lbImage = document.querySelector('#lbImage');
    const lbTitle = document.querySelector('#lbTitle');
    const lbPerspective = document.querySelector('#lbPerspective');
    const lbThumbs = document.querySelector('#lbThumbs');
    const lbHint = document.querySelector('#lbHint');

    function openLightbox(productIndex){
      lbState = { productIndex, imageIndex:0 };
      renderLightbox();
      overlay.classList.add('open');
    }
    function closeLightbox(){ overlay.classList.remove('open'); lbMain.classList.remove('zoomed'); lbImage.style.transform=''; }

    function renderLightbox(){
      const product = activeProducts[lbState.productIndex];
      if (!product) return;
      const images = product.images && product.images.length ? product.images : [{ url:product.image, label:'Vista' }];
      const img = images[lbState.imageIndex];
      lbTitle.textContent = product.name;
      lbPerspective.textContent = img.label ? `${img.label} · ${lbState.imageIndex+1}/${images.length}` : `${lbState.imageIndex+1}/${images.length}`;
      lbImage.src = img.url;
      lbImage.alt = `${product.name} — ${img.label || ''}`;
      lbMain.classList.remove('zoomed');
      lbImage.style.transform = '';
      lbHint.style.display = '';
      lbThumbs.innerHTML = images.map((im, i) =>
        `<button class="${i===lbState.imageIndex?'active':''}" data-thumb="${i}"><img src="${im.url}" alt="${im.label||''}"></button>`
      ).join('');
      lbThumbs.querySelectorAll('button').forEach(b=>b.onclick=()=>{ lbState.imageIndex = Number(b.dataset.thumb); renderLightbox(); });
    }

    function stepImage(delta){
      const product = activeProducts[lbState.productIndex];
      const images = product.images && product.images.length ? product.images : [{url:product.image}];
      lbState.imageIndex = (lbState.imageIndex + delta + images.length) % images.length;
      renderLightbox();
    }

    // Zoom: sigue el cursor en desktop; toca para alternar en móvil.
    lbMain.addEventListener('mousemove', (e) => {
      if (!lbMain.classList.contains('zoomed')) return;
      const rect = lbMain.getBoundingClientRect();
      const x = ((e.clientX - rect.left) / rect.width) * 100;
      const y = ((e.clientY - rect.top) / rect.height) * 100;
      lbImage.style.transformOrigin = `${x}% ${y}%`;
    });
    lbMain.addEventListener('click', (e) => {
      const isZoomed = lbMain.classList.toggle('zoomed');
      lbHint.style.display = isZoomed ? 'none' : '';
      if (isZoomed){
        const rect = lbMain.getBoundingClientRect();
        const x = ((e.clientX - rect.left) / rect.width) * 100;
        const y = ((e.clientY - rect.top) / rect.height) * 100;
        lbImage.style.transformOrigin = `${x}% ${y}%`;
        lbImage.style.transform = 'scale(2.2)';
      } else {
        lbImage.style.transform = '';
      }
    });

    document.querySelector('#lbPrev').onclick = (e) => { e.stopPropagation(); stepImage(-1); };
    document.querySelector('#lbNext').onclick = (e) => { e.stopPropagation(); stepImage(1); };
    document.querySelector('#lbClose').onclick = closeLightbox;
    overlay.addEventListener('click', (e) => { if (e.target === overlay) closeLightbox(); });
    document.addEventListener('keydown', (e) => {
      if (!overlay.classList.contains('open')) return;
      if (e.key === 'Escape') closeLightbox();
      if (e.key === 'ArrowLeft') stepImage(-1);
      if (e.key === 'ArrowRight') stepImage(1);
    });

    buildCategoryNav();
    draw();
    loadCart();
  </script>
</body>
</html>
