<?php
session_start();

// Verifica se está logado e é usuário
if (!isset($_SESSION['tipo']) || $_SESSION['tipo'] !== 'usuario') {
    header("Location: login.php");
    exit;
}

// Verifica se está logado e é admin
if (!isset($_SESSION['tipo']) || $_SESSION['tipo'] !== 'usuario') {
    header("Location: login.php");
    exit;
    
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Natural Medicine</title>
  <link rel="stylesheet" href="css/index.css" />
  <link rel="shortcut icon" href="assets/favicon/logo.png" type="image/x-icon" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet" />
</head>
<body>
  <!-- todo o seu conteúdo HTML que você enviou aqui -->
  <header class="header">
    <div class="logo"><img src="assets/favicon/logo.png" alt="" /></div>
    <nav class="menu">
      <a href="./Relatos/Relato/form_cad_relato.html">Relatos</a>
      <a href="./cadplantas/naturalmedicina/views/ver_plantas.php"> Plantas</a>
      <a href="./ContaUsuario/indexusuario.php">Conta</a>
      <a href="sobre.html">Sobre</a>
      <a href="./logout.php">Sair</a>
    </nav>
  
  </header>

  <main>
     <section class="hero">
        <div class="hero-content">
          <h1>Natural Medicina</h1>
          <p>
            Natural Medicine é uma plataforma que oferece dados científicos
            sobre as espécies de plantas medicinais, ajudando usuários a
            entender como cada planta pode contribuir para a saúde e o
            bem-estar.
          </p>
          <button class="btn-green">Saiba mais</button>
        </div>
        <img src="assets/img/ImagemPrincipal.jpg" alt="Imagem principal" />
      </section>

      <section class="curiosidades">
        <h2>Curiosidades das plantas</h2>
        <div class="cards">
          <article>
            <img src="assets/img/ImagemC1.jpg" alt="Imagem 1" />
            <h3>Os Segredos das Plantas Medicinais</h3>
            <p>
              Explore como diversas culturas tradicionais utilizam plantas
              medicinais para curar.
            </p>
          </article>
          <article>
            <img src="assets/img/ImagemC2.webp" alt="Imagem 2" />
            <h3>Alecrim: Muito Além do Tempero</h3>
            <p>Descubra as propriedades medicinais do alecrim.</p>
          </article>
          <article>
            <img src="assets/img/ImagemC3.jpg" alt="Imagem 3" />
            <h3>A Magia das Ervas</h3>
            <p>Entenda como as ervas podem melhorar sua saúde.</p>
          </article>
        </div>
      </section>

      <section class="historias">
        <h2>Histórias de Cura com Plantas Medicinais</h2>
        <div class="content">
          <div class="text">
            <h3>Como a Camomila Ajudou na Insônia</h3>
            <p>
              A camomila, conhecida por suas propriedades relaxantes, tem sido
              usada por gerações para tratar a insônia e promover uma boa noite
              de sono. Estudos indicam que o consumo regular do chá de camomila
              pode ajudar a reduzir o estresse.
            </p>
            <br />
            <h3>O Poder do Gengibre Contra Náuseas</h3>
            <p>
              O gengibre é amplamente reconhecido por suas propriedades
              anti-inflamatórias e sua eficácia no alívio de náuseas,
              especialmente durante viagens ou tratamentos médicos como
              quimioterapia.
            </p>
            <br />
            <h3>Lavanda: Relaxamento em Forma de Planta</h3>
            <p>
              O aroma calmante da lavanda é utilizado em óleos essenciais e chás
              para promover relaxamento, aliviar dores de cabeça e melhorar a
              qualidade do sono de forma natural.
            </p>
            <br />
            <h3>O Segredo do Alecrim para a Memória</h3>
            <p>
              Acredita-se que o alecrim melhora a memória e a concentração.
              Usado em óleos essenciais ou infusões, ele é uma escolha popular
              para quem busca aumentar o foco mental.
            </p>
          </div>
          <img src="assets/img/historias.webp" alt="História das plantas" />
        </div>
      </section>

      <section class="hero">
        <div class="hero-content">
          <h1>Nossos relatos</h1>
          <p>
            Compartilhar relatos sobre o uso de plantas medicinais  é uma forma valiosa de transmitir saberes.
            Relatos reais inspiram  curiosidade em quem busca  alternativas naturais.
            Unir experiências pessoais com dados científicos enriquece  o aprendizado.
            Por isso, seu relato pode fazer a diferença para muitas outras pessoas.
            

          </p>
          <button class="btn-green" onclick="window.location.href='./Relatos/Relato/form_cad_relato.html'">Relatar</button>
        </div>
        <img src="assets/img/charelatos.png" alt="Imagem principal" height="590" width="590" />
      </section>
  </main>

  <footer>
    <div class="footer">
      <p>Natural Medicina</p>
      <div class="links">
        <a href="#"><i class="fab fa-instagram"></i></a>
        <a href="#"><i class="fab fa-facebook-f"></i></a>
        <a href="#"><i class="fab fa-linkedin-in"></i></a>
        <a href="#"><i class="fab fa-whatsapp"></i></a>
      </div>
    </div>
  </footer>
</body>
</html>

