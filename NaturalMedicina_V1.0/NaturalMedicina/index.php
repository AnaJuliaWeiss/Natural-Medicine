<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Natural Medicina</title>

  <!-- Fonts & icons -->
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&family=Caladea:wght@400;600;700&display=swap" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet"/>

  <style>
    /* ========= Reset básico ========= */
    * { box-sizing: border-box; margin: 0; padding: 0; }
    html,body { height: 100%; }
    img { max-width: 100%; height: auto; display: block; }

    /* ========= Tipografia & container ========= */
    body {
      font-family: 'Caladea', serif;
      background: #ffffff;
      color: #333;
      line-height: 1.6;
    }

    .container {
      max-width: 1100px;
      margin: 0 auto;
      padding: 0 1.5rem;
      width: 100%;
    }

    /* ========= HEADER ========= */
    header.header {
      background: linear-gradient(90deg, #3a7d44, #4caf50);
      position: sticky;
      top: 0;
      z-index: 999;
      box-shadow: 0 2px 8px rgba(0,0,0,0.06);
    }

    .header-inner {
      display: flex;
      justify-content: space-between;
      align-items: center;
      gap: 1rem;
      height: 80px;
      padding: 0 0;
    }

    .logo {
      font-family: 'Playfair Display', serif;
      font-size: 26px;
      color: #fff;
      display: flex;
      align-items: center;
      gap: .5rem;
    }

    nav.menu {
      display: flex;
      gap: 2rem;
      align-items:center;
    }

    nav.menu a {
      color: #fff;
      text-decoration: none;
      font-weight: 600;
      font-size: 16px;
      padding: .25rem .35rem;
      transition: color .2s ease;
    }
    nav.menu a:hover { color: #d9f7d9; }

    .btn-header {
      background: #fff;
      color: #3a7d44;
      padding: .6rem 1rem;
      border-radius: 8px;
      font-weight: 700;
      text-decoration: none;
      display: inline-block;
      transition: background .2s ease, transform .15s ease;
    }
    .btn-header:hover { background: #d9f7d9; transform: translateY(-2px); }

    /* ========= HERO ========= */
    .hero {
      background: linear-gradient(rgba(0,0,0,0.35), rgba(0,0,0,0.35)),
                  url("assets/img/camomila.jpg") center/cover no-repeat;
      color: #fff;
      min-height: 45vh;
      display: flex;
      align-items: center;
    }

    .hero .hero-inner { display:flex; align-items:center; gap:2rem; width:100%; padding: 3rem 0; }
    .hero-content { max-width: 64%; }
    .hero h1 { font-size: 2.6rem; line-height:1.05; margin-bottom:.6rem; font-weight:700; }
    .hero p { font-size: 1.05rem; margin-bottom:1rem; color:#f3f6f3; }
    .btn-green {
      background-color: #4caf50;
      color: #fff;
      padding: .9rem 1.4rem;
      border-radius: 8px;
      text-decoration: none;
      font-weight:700;
      display: inline-block;
    }
    .btn-green:hover { background-color: #3a7d44; }

    /* ========= CURIOSIDADES ========= */
    .curiosidades { padding: 2rem 0; }
    .curiosidades h2 { text-align:center; margin-bottom:1rem; color:#2c3e50; }
    .curiosidades-container {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
      gap: 1.25rem;
    }
    .curiosidade-card {
      background: #fff;
      border-radius: 10px;
      box-shadow: 0 6px 18px rgba(0,0,0,0.06);
      padding: 1rem;
      text-align: center;
    }
    .curiosidade-card img { height: 150px; object-fit: cover; border-radius: 8px; margin-bottom:.6rem; }
    .curiosidade-card h3 { margin-bottom:.4rem; color:#2c3e50; font-size:1.05rem; }
    .curiosidade-card p { color:#556; font-size:.95rem; }

    /* ========= HISTÓRIAS ========= */
    .historias { padding: 2rem 0; }
    .historias h2 { text-align:center; margin-bottom:1rem; color:#2c3e50; }

    .historias .content {
      display: flex;
      gap: 1.25rem;
      align-items: flex-start;
      padding: 1rem 0;
      background: transparent;
    }

    .historias .content img {
      flex: 0 0 360px;
      max-width: 360px;
      border-radius: 12px;
      object-fit: cover;
      box-shadow: 0 8px 22px rgba(0,0,0,0.06);
    }

    .historias .content .text { flex: 1 1 auto; }
    .historias .content .text h3 { margin-bottom:.5rem; color:#2c3e50; }
    .historias .content .text p { margin-bottom:1rem; color:#444; line-height:1.6; }

    /* História pequena separada (caso queira usar vários itens) */
    .historia-planta {
      display:flex;
      gap:1rem;
      align-items:flex-start;
      padding: 1rem;
      background: #f9f9f9;
      border-radius: 10px;
      box-shadow: 0 6px 18px rgba(0,0,0,0.04);
    }
    .historia-planta .historia-planta-foto { flex: 0 0 220px; max-width:220px; }
    .historia-planta .foto-historia { width:100%; border-radius:10px; object-fit:cover; }
    .historia-planta .historia-planta-texto { flex:1; padding-left:.25rem; }
    .historia-planta .historia-planta-texto p { color:#333; line-height:1.5; }

    /* ========= RELATOS ========= */
    .relatos-section { padding: 2rem 0; }
    .relatos-section h1 { text-align:center; margin-bottom:1rem; color:#2c3e50; }

    .relatos-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 20px;
      padding: 1rem 0;
    }

    .relato-card {
      background: #f9f9f9;
      border-radius: 12px;
      padding: 16px;
      box-shadow: 0 8px 22px rgba(0,0,0,0.06);
      display: flex;
      flex-direction: column;
      gap: .6rem;
      transition: transform .18s ease, box-shadow .18s ease;
      min-height: 140px;
    }
    .relato-card:hover { transform: translateY(-6px); box-shadow: 0 16px 36px rgba(0,0,0,0.10); }

    .relato-header { display:flex; align-items:center; gap:.8rem; }
    .relato-img { width:56px; height:56px; border-radius:50%; object-fit:cover; border:2px solid #eee; }
    .relato-nome { font-weight:700; color:#2c3e50; }
    .relato-card p { color:#333; font-size:.98rem; margin:0; }
    .relato-card span { color:#777; font-size:.88rem; font-style:italic; margin-top:.35rem; }

    /* ========= RODAPÉ ========= */
    footer .footer {
      background:#f3f3f3;
      padding: 1.25rem 0;
      margin-top: 2rem;
    }
    footer .footer p { text-align:center; margin-bottom:.5rem; font-weight:600; color:#2c3e50; }
    footer .links { display:flex; gap:.8rem; justify-content:center; }
    footer .links a { color:#2c3e50; font-size:1.15rem; text-decoration:none; }

    /* ========= RESPONSIVO ========= */
    @media (max-width: 992px) {
      .hero h1 { font-size: 2.2rem; }
      .historias .content img { flex: 0 0 300px; max-width:300px; }
    }

    @media (max-width: 768px) {
      .header-inner { flex-direction: column; height: auto; padding: .6rem 0; gap:.6rem; }
      nav.menu { flex-wrap: wrap; justify-content:center; gap:.6rem; }
      .hero { padding: 2rem 0; text-align:center; }
      .hero-content { margin: 0 auto; max-width: 100%; }

      /* empilha história: imagem em cima, texto embaixo */
      .historias .content { flex-direction: column; padding: 0; }
      .historias .content img { width: 100%; max-width: 100%; flex: 0 0 auto; }

      /* relatos: cards fluem naturalmente pelo grid */
      .relato-card { min-height: auto; }
      .historia-planta { flex-direction: column; align-items:center; text-align:center; }
      .historia-planta .historia-planta-foto { max-width: 100%; flex:0 0 auto; }
      .historia-planta .historia-planta-texto { padding-left:0; }
    }
  </style>
</head>
<body>

  <!-- HEADER -->
  <header class="header">
    <div class="container header-inner">
      <div class="logo">🌿 Natural Medicina</div>

      <nav class="menu" role="navigation" aria-label="Menu principal">
        <a href="#curiosidades">Curiosidades</a>
        <a href="#historias">Histórias</a>
        <a href="#relatos">Relatos</a>
        <a href="#sobre">Sobre</a>
      </nav>

      <a href="login.php" class="btn-header">Comece agora</a>
    </div>
  </header>

  <!-- HERO -->
  <section class="hero">
    <div class="container hero-inner">
      <div class="hero-content">
        <h1>Descubra o poder<br>das plantas medicinais</h1>
        <p>Explore propriedades, usos e relatos de quem já sentiu os benefícios das plantas.</p>
        <a href="#curiosidades" class="btn-green">Explorar plantas</a>
      </div>
    </div>
  </section>

  <!-- CURIOSIDADES -->
  <section id="curiosidades" class="curiosidades">
    <div class="container">
      <h2>Curiosidades das plantas</h2>
      <div class="curiosidades-container">
        <div class="curiosidade-card">
          <img src="assets/img/camomila.jpg" alt="Camomila">
          <h3>Os Segredos das Plantas Medicinais</h3>
          <p>Como diversas culturas usam plantas para promoção da saúde.</p>
        </div>
        <div class="curiosidade-card">
          <img src="assets/img/camomila.jpg" alt="Alecrim">
          <h3>Alecrim: Muito Além do Tempero</h3>
          <p>Propriedades do alecrim para memória e circulação.</p>
        </div>
        <div class="curiosidade-card">
          <img src="assets/img/camomila.jpg" alt="Ervas">
          <h3>A Magia das Ervas</h3>
          <p>Ervas e infusões populares em remédios caseiros.</p>
        </div>
        <div class="curiosidade-card">
          <img src="assets/img/camomila.jpg" alt="Camomila">
          <h3>Camomila Relaxante</h3>
          <p>Efeitos calmantes e terapêuticos da camomila.</p>
        </div>
        <div class="curiosidade-card">
          <img src="assets/img/camomila.jpg" alt="Hortelã">
          <h3>Hortelã Refrescante</h3>
          <p>Alívio digestivo e aroma revigorante.</p>
        </div>
       <div class="curiosidade-card">
          <img src="assets/img/camomila.jpg" alt="Hortelã">
          <h3>Hortelã Refrescante</h3>
          <p>Alívio digestivo e aroma revigorante.</p>
        </div>
         <div class="curiosidade-card">
          <img src="assets/img/camomila.jpg" alt="Hortelã">
          <h3>Hortelã Refrescante</h3>
          <p>Alívio digestivo e aroma revigorante.</p>
        </div>
       <div class="curiosidade-card">
          <img src="assets/img/camomila.jpg" alt="Hortelã">
          <h3>Hortelã Refrescante</h3>
          <p>Alívio digestivo e aroma revigorante.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- HISTÓRIAS -->
  <section id="historias" class="historias">
    <div class="container">
      <h2>Histórias de Cura com Plantas Medicinais</h2>

      <!-- bloco principal com imagem + text -->
      <div class="content">
        <div class="text">
          <h3>Como a Camomila Ajudou na Insônia</h3>
          <p>A camomila, conhecida por suas propriedades relaxantes, tem sido usada por gerações para tratar a insônia e promover uma boa noite de sono. Estudos indicam que o consumo regular do chá de camomila pode ajudar a reduzir o estresse.</p>

          <h3>O Poder do Gengibre Contra Náuseas</h3>
          <p>O gengibre é amplamente reconhecido por suas propriedades anti-inflamatórias e sua eficácia no alívio de náuseas, especialmente durante viagens ou tratamentos médicos.</p>

          <h3>Lavanda: Relaxamento em Forma de Planta</h3>
          <p>O aroma calmante da lavanda é utilizado em óleos essenciais e chás para promover relaxamento, aliviar dores de cabeça e melhorar a qualidade do sono.</p>

          <h3>O Segredo do Alecrim para a Memória</h3>
          <p>Acredita-se que o alecrim melhora a memória e a concentração. Usado em óleos essenciais ou infusões, ele é popular para aumentar o foco mental.</p>
        </div>

        <img src="assets/img/historias.webp" alt="História das plantas">
      </div>


    </div>
  </section>

  <!-- RELATOS -->
  <section id="relatos" class="relatos-section">
    <div class="container">
      <h1>Relatos dos familiares</h1>

      <div class="relatos-grid">
        <div class="relato-card">
          <div class="relato-header">
            <img src="assets/img/Ramo de camomila sobre mesa rústica.png" alt="Pessoa 1" class="relato-img">
            <div class="relato-nome">Pessoa 1</div>
          </div>
          <p>O chá de camomila me ajudou a dormir melhor em noites de insônia. Usei por duas semanas e senti diferença.</p>
          <span>12/06/2025</span>
        </div>

        <div class="relato-card">
          <div class="relato-header">
            <img src="assets/img/images.jpeg" alt="Pessoa 2" class="relato-img">
            <div class="relato-nome">Pessoa 2</div>
          </div>
          <p>O gengibre em cápsulas diminuiu minhas náuseas ao viajar — recomendo procurar orientação antes de usar.</p>
          <span>03/05/2025</span>
        </div>

        <div class="relato-card">
          <div class="relato-header">
            <img src="assets/img/foto3.jpg" alt="Pessoa 3" class="relato-img">
            <div class="relato-nome">Pessoa 3</div>
          </div>
          <p>Usei compressa de lavanda para dor de cabeça e senti alívio leve. Ótimo como complemento.</p>
          <span>21/04/2025</span>
        </div>

        <div class="relato-card">
          <div class="relato-header">
            <img src="assets/img/foto4.jpg" alt="Pessoa 4" class="relato-img">
            <div class="relato-nome">Pessoa 4</div>
          </div>
          <p>O óleo de alecrim me ajudou em momentos de concentração para estudar. Aroma estimulante.</p>
          <span>18/03/2025</span>
        </div>

        <div class="relato-card">
          <div class="relato-header">
            <img src="assets/img/foto5.jpg" alt="Pessoa 5" class="relato-img">
            <div class="relato-nome">Pessoa 5</div>
          </div>
          <p>Hortelã em chá, após refeições, diminuiu desconforto digestivo na família.</p>
          <span>09/02/2025</span>
        </div>

        <div class="relato-card">
          <div class="relato-header">
            <img src="assets/img/foto6.jpg" alt="Pessoa 6" class="relato-img">
            <div class="relato-nome">Pessoa 6</div>
          </div>
          <p>Compressas de camomila reduziram inflamação leve na pele em poucos dias.</p>
          <span>27/01/2025</span>
        </div>
      </div>
    </div>
  </section>

  <!-- RODAPÉ -->
  <footer id="sobre">
    <div class="container">
      <div class="footer">
        <p>Natural Medicina</p>
        <div class="links" aria-label="Redes sociais">
          <a href="#"><i class="fab fa-instagram"></i></a>
          <a href="#"><i class="fab fa-facebook-f"></i></a>
          <a href="#"><i class="fab fa-linkedin-in"></i></a>
          <a href="#"><i class="fab fa-whatsapp"></i></a>
        </div>
      </div>
    </div>
  </footer>

</body>
</html>
