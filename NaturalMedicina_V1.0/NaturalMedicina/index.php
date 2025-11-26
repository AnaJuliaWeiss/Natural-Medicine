<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Natural Medicina</title>


  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&family=Caladea:wght@400;600;700&display=swap" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet"/>
  <link rel="stylesheet" href="css/index_usu_adm.css">
</head>
<body>
<style>
 
.sobre {
  background: linear-gradient(to right, #f4f8f4, #e8f0eb);
  padding: 80px 20px;
}

.sobre-inner {
  display: flex;
  align-items: center;
  gap: 60px;
  justify-content: space-between;
  flex-wrap: wrap;
}

.sobre-content {
  flex: 1 1 450px;
}

.sobre-content h2 {
  font-size: 2.8rem;
  margin-bottom: 25px;
  color: #2f4f2f;
  font-family: 'Playfair Display', serif;
  letter-spacing: 1px;
}

.sobre-content p {
  margin-bottom: 18px;
  font-size: 1.1rem;
  line-height: 1.8;
  color: #2d2d2d;
  font-family: "Caladea", serif;
}


.sobre-img {
  flex: 1 1 420px;
  display: flex;
  justify-content: center;
}

.sobre-img img {
  max-width: 100%;
  width: 470px;
  border-radius: 20px;
  box-shadow: 0 10px 25px rgba(0,0,0,0.15);
  transition: transform .3s ease, box-shadow .3s ease;
}


.sobre-img img:hover {
  transform: scale(1.03);
  box-shadow: 0 14px 30px rgba(0,0,0,0.18);
}


@media (max-width: 900px) {
  .sobre-inner {
    flex-direction: column;
    text-align: center;
    gap: 40px;
  }

  .sobre-content h2 {
    font-size: 2.4rem;
  }

  .sobre-img img {
    width: 90%;
  }
}


</style>
 
  <header class="header">
    <div class="container header-inner">
      <div class="logo">🌿 Natural Medicina</div>

      <nav class="menu" role="navigation" aria-label="Menu principal">
        <a href="#curiosidades">Curiosidades</a>
        <a href="#relatos">Relatos</a>
        <a href="#sobre">Sobre</a>
      </nav>

      <a href="login.php" class="btn-header">Comece agora</a>
    </div>
  </header>

  
  <section class="hero">
    <div class="container hero-inner">
      <div class="hero-content">
        <h1>Descubra o poder<br>das plantas medicinais</h1>
        <p>Explore propriedades, usos e relatos de quem já sentiu os benefícios das plantas.</p>
      </div>
    </div>
  </section>



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

  <section id="relatos" class="relatos-section">
    <div class="container">
      <h1>Relatos dos familiares</h1>

      <div class="relatos-grid">
        <div class="relato-card">
          <div class="relato-header">
            <img src="assets/img/fotoperfil.avif" alt="Pessoa 1" class="relato-img">
            <div class="relato-nome">Juliana</div>
          </div>
          <p>O chá de camomila me ajudou a dormir melhor em noites de insônia. Usei por duas semanas e senti diferença.</p>
          <span>12/06/2025</span>
        </div>

        <div class="relato-card">
          <div class="relato-header">
            <img src="assets/img/fotoperfil.avif" alt="Pessoa 2" class="relato-img">
            <div class="relato-nome">Ana Júlia</div>
          </div>
          <p>Alecrim
          Coloquei um galhinho de alecrim verde em uma jarra de 1 litros de água deixei por um dia e tomei como água  saborisada. 
          Tive melhora nas minhas crises de ansiedade, nas dormência nas mãos que segundo médico era problema circulatório.  
          De tempo em tempo faço  uso, sem ser contínuo por muito tempo.</p>
          <span>08/09/2025</span>
        </div>

        <div class="relato-card">
          <div class="relato-header">
            <img src="assets/img/fotoperfil.avif" alt="Pessoa 3" class="relato-img">
            <div class="relato-nome">Luana</div>
          </div>
          <p>Usei compressa de lavanda para dor de cabeça e senti alívio leve. Ótimo como complemento.</p>
          <span>21/04/2025</span>
        </div>

        
  </section>

    
<section class="sobre" id="sobre">
  <div class="container sobre-inner">
    <div class="sobre-content">
      <h2>Sobre nós</h2>
      <p>
        A <strong>Natural Medicina</strong> é uma plataforma dedicada à disseminação de conhecimento sobre plantas medicinais e seus benefícios para a saúde e bem-estar. Nosso objetivo é fornecer informações confiáveis e baseadas em ciência, destacando como cada planta pode ser utilizada de maneira eficaz para promover equilíbrio e qualidade de vida.
      </p>
      <p>
        Cada planta em nossa plataforma é detalhadamente descrita, incluindo propriedades, usos recomendados, possíveis efeitos colaterais e formas seguras de integração na rotina. Estamos comprometidos em inspirar escolhas conscientes e saudáveis, aproximando as pessoas da natureza através do conhecimento.
      </p>
    </div>
    <div class="sobre-img">
      <img src="assets/img/fotofetec.jpg" alt="Imagem representando plantas medicinais">
    </div>
  </div>
</section>



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






 