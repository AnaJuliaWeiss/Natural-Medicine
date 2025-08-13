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
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet"> <!--Logo-->
  <link href="https://fonts.googleapis.com/css2?family=Caladea:wght@600&display=swap" rel="stylesheet"> <!--Texto-->


  </head>
<style>
  /* Reset geral */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: 'Caladea', serif;
  background-color: #ffffff;
  color: #333;
  line-height: 1.6;
}

/* HEADER */
.header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  background-color: #4caf50;
  padding: 1rem 2rem;
  height: 100px;
  flex-wrap: wrap;
}

.logo {
  font-family: 'Playfair Display', serif;
  font-weight: 600;
  font-size: 35px;
  color: #ffffff;
}

.header .menu a {
  margin: 0 1rem;
  color: #ffffff;
  text-decoration: none;
  font-weight: bold;
  font-size: 18px;
  transition: color 0.3s ease;
}

.header .menu a:hover {
  color: #e0f3dd;
}

/* HERO SECTION */
.hero {
  display: flex;
  flex-wrap: wrap;
  align-items: center;
  justify-content: space-between;
  padding: 4% 8%;
  gap: 2rem;
}

.hero-content {
  flex: 1;
  min-width: 300px;
  text-align: left;
}

.hero h1 {
  color: #4caf50;
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

.hero .btn-green {
  background-color: #4caf50;
  border: none;
  color: white;
  padding: 1rem 2rem;
  border-radius: 5px;
  cursor: pointer;
  transition: background 0.3s ease;
}

.hero .btn-green:hover {
  background-color: #4caf50;
}

.hero img {
  flex: 1;
  max-width: 450px;
  height: auto;
  border-radius: 10px;
}

/* CURIOSIDADES */
.curiosidades {
  padding: 4rem 2rem;
  background-color: #f9f9f9;
}

.curiosidades h2 {
  color: #040f0f;
  font-size: 36px;
  margin-bottom: 2rem;
  text-align: center;
}

.cards {
  display: flex;
  flex-wrap: wrap;
  gap: 2rem;
  justify-content: center;
}

.cards article {
  background: white;
  border: 2px solid #daddd3;
  border-radius: 10px;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
  padding: 1.5rem;
  text-align: center;
  width: 340px;
  transition: transform 0.3s ease;
}

.cards article:hover {
  transform: translateY(-5px);
}

.cards img {
  width: 100%;
  height: 200px;
  object-fit: cover;
  border-radius: 10px;
  margin-bottom: 1rem;
}

.cards h3 {
  font-size: 24px;
  color: #040f0f;
  margin-bottom: 10px;
}

.cards p {
  font-size: 18px;
  color: #000000bf;
  font-weight: bold;
  text-align: justify;
}

/* HISTÓRIAS */
.historias {
  padding: 4% 8%;
  background-color: #daddd3;
}

.historias h2 {
  color: #040f0f;
  font-size: 40px;
  margin-bottom: 2rem;
  text-align: center;
}

.historias .content {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-around;
  gap: 2rem;
}

.historias .text {
  max-width: 600px;
  padding: 1rem;
  color: #000000;
  font-size: 18px;
  text-align: justify;
}

.historias .text h3 {
  font-size: 22px;
  color: #4caf50;
  margin-top: 1rem;
  margin-bottom: 0.5rem;
}

.historias img {
  max-width: 500px;
  width: 100%;
  height: auto;
  border-radius: 10px;
}

/* Rodapé */
.footer {
  text-align: center;
  background: white;
  color: #040f0f;
  padding: 2rem 1rem;
}

.footer p {
  font-size: 22px;
  font-weight: bold;
  margin-bottom: 1rem;
}

.footer .links a {
  margin: 0 1rem;
  color: #040f0f;
  text-decoration: none;
  font-size: 2rem;
  transition: color 0.3s ease;
}

.footer .links a:hover {
  color: #4caf50;
}

/* RESPONSIVO */
@media (max-width: 768px) {
  .hero,
  .historias .content {
    flex-direction: column;
    text-align: center;
  }

  .hero img,
  .historias img {
    max-width: 100%;
  }

  .cards {
    flex-direction: column;
    align-items: center;
  }

  .header {
    flex-direction: column;
    height: auto;
    gap: 1rem;
  }

  .header .menu {
    display: flex;
    flex-direction: column;
    align-items: center;
  }

  .header .menu a {
    margin: 0.5rem 0;
  }
.historia-imagens {
  display: flex;
  justify-content: center;
  align-items: flex-end;
  gap: 20px;
  margin-top: 2rem;
  flex-wrap: wrap;
}

.escada {
  border-radius: 10px;
  object-fit: cover;
  width: 100%;
  max-width: 200px;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

/* Alturas diferentes para o efeito escada */
.escada1 {
  height: 220px;
} 

.escada2 {
  height: 180px;
}

.escada3 {
  height: 140px;
}


}

  
</style>
  <body>
    <header class="header">
      <div class="logo">Natural Medicina</div>
     <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">

      <nav class="menu">
        <a href="login.php">Conta</a>
        <a href="sobre.html">Sobre</a>
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

          
        </div>

        <section class="hero">
          <div class="hero-content">
            <h1>Nossos relatos</h1>
            <p>
              Compartilhar relatos sobre o uso de plantas medicinais é uma forma
              valiosa de transmitir saberes. Relatos reais inspiram curiosidade
              em quem busca alternativas naturais. Unir experiências pessoais com
              dados científicos enriquece o aprendizado. Por isso, seu relato pode
              fazer a diferença para muitas outras pessoas.
            </p>
          
          </div>
          <img
            src="assets/img/plantas-Brasil-cha.webp"
            alt="Imagem principal"
            height="590"
            width="590"
          />
        </section>
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
