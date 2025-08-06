
<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Natural Medicine</title>
    <link rel="stylesheet" href="css/index.css" />
    <link
      rel="shortcut icon"
      href="/assets/favicon/logo.png"
      type="image/x-icon"
    />
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
      rel="stylesheet"
    />
  </head>

  <body>
    <style>
/* Zera margens e paddings padrão dos navegadores e aplica box-sizing universal */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

/* Estilo base do body: define fonte, altura de linha e cores gerais */
body {
  font-family: Arial, sans-serif;
  line-height: 1.6;
  background-color: #ffffff;
  color: #333;
}

/* -------- HEADER (menu superior) -------- */

.header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  background-color: #daddd3;
  padding: 0.5rem 1rem; /* Reduz o espaço interno (padding) */
  flex-wrap: wrap;
  height: 80px; /* Diminui a altura da navbar */
}

/* Define largura menor da logo para combinar com o header reduzido */
.logo img {
  width: 120px; /* Era 200px, reduzido */
  max-width: 100%;
}

/* Estilo dos links do menu (mantido) */
.header .menu a {
  margin: 0 0.8rem; /* Reduz o espaço entre os itens do menu */
  color: #32620e;
  text-decoration: none;
  font-weight: bold;
  font-size: 18px; /* Um pouco menor para combinar com header reduzido */
  transition: color 0.3s ease;
}


/* -------- HERO SECTION (seção principal do topo) -------- */

.hero {
  display: flex;
  flex-wrap: wrap;
  align-items: center;
  justify-content: space-between;
  padding: 4% 8%;
  gap: 2rem; /* espaço entre texto e imagem */
}

/* Conteúdo textual do hero */
.hero-content {
  flex: 1;
  min-width: 300px; /* impede que fique pequeno demais */
}

.hero h1 {
  color: #32620e;
  font-size: 48px;
  font-weight: bold;
  margin-bottom: 1rem;
}

.hero p {
  color: #000000bf;
  font-size: 20px;
  font-weight: bold;
  margin-bottom: 2rem;
}

/* Botão verde do hero */
.hero .btn-green {
  background-color: #32620e;
  border: none;
  color: white;
  padding: 1rem 2rem;
  border-radius: 5px;
  cursor: pointer;
  transition: background 0.3s ease;
}

.hero .btn-green:hover {
  background-color: #204a0a;
}

/* Imagem ao lado do texto no hero */
.hero img {
  flex: 1;
  max-width: 400px;
  height: auto;
  border-radius: 10px;
}

/* -------- CURIOSIDADES SECTION -------- */

.curiosidades {
  padding: 4rem 2rem;
}

/* Título centralizado */
.curiosidades h2 {
  color: #040f0f;
  font-size: 32px;
  margin-bottom: 2rem;
  text-align: center;
}

/* Container dos cards */
.cards {
  display: flex;
  flex-wrap: wrap;
  gap: 2rem;
  justify-content: center;
}

/* Cada card */
.cards article {
  background: white;
  border-radius: 10px;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
  padding: 1.5rem;
  text-align: center;
  width: 350px;
  max-width: 100%;
  height: auto;
  transition: transform 0.3s ease;
}

/* Efeito ao passar o mouse no card */
.cards article:hover {
  transform: translateY(-5px); /* eleva o card um pouco */
}

/* Imagem dentro dos cards */
.cards img {
  width: 100%;
  border-radius: 10px;
  margin-bottom: 1rem;
}

/* Título de cada card */
.cards h3 {
  font-size: 22px;
  color: #040f0f;
  margin-bottom: 10px;
}

/* Texto dos cards */
.cards p {
  font-size: 18px;
  color: #000000bf;
  font-weight: bold;
  text-align: justify;
}

/* -------- HISTÓRIAS SECTION -------- */

.historias {
  padding: 4% 8%;
  background-color: #daddd3;
}

/* Título centralizado */
.historias h2 {
  color: #040f0f;
  font-size: 40px;
  margin-bottom: 2rem;
  text-align: center;
}

/* Container das histórias e imagem */
.historias .content {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 2rem;
}

/* Imagem da seção de histórias */
.historias img {
  max-width: 500px;
  border-radius: 10px;
  width: 100%;
  height: auto;
}

/* Texto da seção histórias */
.historias .text {
  max-width: 600px;
  padding: 1rem;
  color: #000000bf;
  font-size: 18px;
  text-align: justify;
}

/* -------- FOOTER -------- */

.footer {
  text-align: center;
  background: white;
  color: #040f0f;
  padding: 2rem 1rem;
}

/* Texto do rodapé */
.footer p {
  font-size: 22px;
  font-weight: bold;
  margin-bottom: 1rem;
}

/* Ícones sociais */
.footer .links a {
  margin: 0 1rem;
  color: #040f0f;
  text-decoration: none;
  font-size: 2rem;
  transition: color 0.3s ease;
}

.footer .links a:hover {
  color: #32620e;
}

/* -------- RESPONSIVIDADE -------- */

@media (max-width: 768px) {
  /* Hero e histórias viram coluna no mobile */
  .hero,
  .historias .content {
    flex-direction: column;
    text-align: center;
  }

  /* Imagens se adaptam ao tamanho da tela */
  .hero img,
  .historias img {
    max-width: 100%;
  }

  /* Cards se empilham verticalmente */
  .cards {
    flex-direction: column;
    align-items: center;
  }

  /* Header reorganizado para coluna */
  .header {
    flex-direction: column;
    align-items: flex-start;
    gap: 1rem;
  }

  .header .menu {
    display: flex;
    flex-direction: column;
  }

  .header .menu a {
    margin: 0.5rem 0;
  }
}


    </style>
    <header class="header">
      <div class="logo"><img src="assets/favicon/logo.png" alt="" /></div>
      <nav class="menu">
        <a href="./Relatos/Relato/form_cad_relato.html">Relatos</a>
        <a href="./cadplantas/naturalmedicina/views/pesquisa.php"> Plantas</a>
        <a href="sobre.html">Sobre</a>
        <a href="login.php">Conta</a>
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
        <img src="./assets/img/charelatos.png" alt="Imagem principal" />
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
              para quem busca aumentar o foco mental
            </p>
          </div>
           <div> <img src="assets/img/historias.webp" alt="História das plantas" /></div>
         
        </div>
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
        <img src="assets/img/plantas-Brasil-cha.webp" alt="Imagem principal" height="590" width="590" />
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
