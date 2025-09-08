<?php
session_start();

// Verifica se está logado e é admin
if (!isset($_SESSION['tipo']) || $_SESSION['tipo'] !== 'admin') {
    header("Location: login.html");
    exit;

if (!isset($_SESSION['tipo']) || $_SESSION['tipo'] !== 'admin') {
    header("Location: login.html");
    exit;
}

}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Natural Medicina</title>

  <!-- Fonts & icons -->
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&family=Caladea:wght@400;600;700&display=swap" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet"/>
  <link rel="stylesheet" href="./css/index_usu_adm.css">
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

      <a href="./ContaAdmin/indexadmin.php" class="btn-header">Conta</a>
    </div>
  </header>

  <!-- HERO -->
  <section class="hero">
    <div class="container hero-inner">
      <div class="hero-content">
        <h1>Descubra o poder<br>das plantas medicinais</h1>
        <p>Explore propriedades, usos e relatos de quem já sentiu os benefícios das plantas.</p>
        <a href="./cadplantas/naturalmedicina/views/ver_plantas.php" class="btn-green">Explorar plantas</a>
      </div>
    </div>
  </section>

  <!-- CURIOSIDADES -->
  <section id="curiosidades" class="curiosidades">
    <div class="container">
      <h2>Curiosidades das plantas</h2>
      <div class="curiosidades-container">
        <div class="curiosidade-card">
        <a href="http://nazareuniluz.org.br/curiosidades-sobre-as-plantas-medicinais/" target="_blank">
        <img src="assets/img/plantas.jpg" alt="Camomila">
      </a>  
          <h3>Curiosidades sobre Plantas</h3>
          <p>Este cantinho está reservado para apresentar um breve e sucinto histórico das plantas medicinais mesmo antes da Era Cristã.</p>
        </div>
        <div class="curiosidade-card">
        <a href="http://www.acaatinga.org.br/plantas-da-caatinga-e-suas-propriedades-medicinais/?gad_source=1&gad_campaignid=22839069055&gbraid=0AAAAAC8sT9xtO3ifWuXxCxManNSaJwzi1&gclid=CjwKCAjw2vTFBhAuEiwAFaScwiVv_0rQpFjB5YUfqjCgviwVDx2eizN04KBqt8BcBgleIb4P2F0BuRoC-hQQAvD_BwE" target="_blank"> <img src="assets/img/caatinga.jpeg" alt="Alecrim"></a>
          <h3>Plantas da Caatinga</h3>
          <p>Suas propriedades medicinais, saberes e propriedades terapêuticas.</p>
        </div>
        <div class="curiosidade-card">
          <a href="https://super.abril.com.br/mundo-estranho/quais-sao-as-plantas-medicinais-mais-utilizadas/#google_vignette" target="_blank"> <img src="assets/img/aos.jpeg" alt="Ervas"></a>
          <h3>Quais são as plantas medicinais mais utilizadas no Brasil?</h3>
          <p>Conheça seis das plantas mais populares no país - aprovadas pela ciência e pelas nossas avós.</p>
        </div>
        <div class="curiosidade-card">
          <a href="https://revistacasaejardim.globo.com/paisagismo/noticia/2023/07/9-plantas-medicinais-indigenas-e-suas-propriedades-curativas.ghtml" target="_blank"> <img src="assets/img/indigenas.png" alt="Ervas"></a>
          <h3>Plantas medicinais indígenas</h3>
          <p>O conhecimento tradicional indígena ensina como utilizar espécies nativas ou de fácil acesso no Brasil para o tratamento e a prevenção de doenças</p>
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
