<?php
session_start();

// Verificação de acesso para usuário comum
if (!isset($_SESSION['tipo']) || $_SESSION['tipo'] !== 'usuario') {
    header("Location: login.html");
    exit;
}

$nomeUsuario = $_SESSION['nome'];
$idUsuario = $_SESSION['id_usuario'];

require_once("../Relatos/Classes/Database.class.php");
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Perfil do Usuário</title>
  <link rel="stylesheet" href="../css/perfils.css" />
  <style>
    body {
  background-image: url("../assets/img/Ramo de camomila sobre mesa rústica.png");
  background-size: cover;          /* Faz a imagem cobrir a tela */
  background-position: center;     /* Centraliza */
  background-repeat: no-repeat;    /* Evita repetição */
  background-attachment: fixed;    /* Fica fixa ao rolar */
  position: relative;
  font-family: 'Segoe UI', Arial, sans-serif;
  margin: 0;
  padding: 0;
  color: #333;
}

/* Escurece o fundo */
body::before {
  content: "";
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.25); /* ajuste aqui para mais ou menos escuridão */
  z-index: -1;                     /* Fica por trás do conteúdo */
  backdrop-filter: brightness(0.9);
}


    /* ========= HEADER ========= */
    header.header {
      background: linear-gradient(90deg, #3a7d44, #4caf50);
      position: sticky;
      top: 0;
      z-index: 999;
      box-shadow: 0 2px 8px rgba(0,0,0,0.08);
    }
    .header-inner {
      display: flex;
      justify-content: space-between;
      align-items: center;
      height: 80px;
      padding: 0 5%;
    }
    .logo {
      font-family: 'Playfair Display', serif;
      font-size: 26px;
      color: #fff;
    }
    nav.menu {
      display: flex;
      gap: 2rem;
    }
    nav.menu a {
      color: #fff;
      text-decoration: none;
      font-weight: 600;
      font-size: 16px;
      transition: color .2s ease;
    }
    nav.menu a:hover { color: #d9f7d9; }        

    /* ========= CONTEÚDO ========= */
    h1 {
      text-align: center;
      margin: 30px 0 10px;
      color: #2d5e2d;
      font-size: 28px;
    }

    section {
  background: rgba(255, 255, 255, 0.70); 
  backdrop-filter: blur(4px);            
  -webkit-backdrop-filter: blur(4px);   
  
  margin: 20px auto;
  padding: 30px;
  border-radius: 16px;
  max-width: 700px;
  box-shadow: 0 4px 14px rgba(0,0,0,0.10);
  transition: background 0.3s ease;
}


    
    .foto-perfil {
      text-align: center;
    }

    .foto-perfil img {
      width: 160px;
      height: 160px;
      object-fit: cover;
      border-radius: 50%;
      margin-top: 20px;
      border: 4px solid #2d5e2d;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }

    .foto-perfil input[type="file"] {
      display: none;
    }

    .foto-perfil label {
      display: inline-block;
      padding: 10px 20px;
      margin-top: 15px;
      background: #3a7d44;
      color: #fff;
      border-radius: 25px;
      cursor: pointer;
      transition: background 0.3s ease;
    }

    .foto-perfil label:hover {
      background: #2d5e2d;
    }

    .foto-perfil button {
      margin-top: 10px;
      padding: 10px 20px;
      border: none;
      border-radius: 25px;
      background: #4caf50;
      color: #fff;
      font-weight: bold;
      cursor: pointer;
      transition: background 0.3s ease;
    }

    .foto-perfil button:hover {
      background: #3a7d44;
    }

    
    .plantas h2 {
      text-align: center;
      color: #2d5e2d;
      margin-bottom: 15px;
    }

    .plantas p {
      text-align: center;
      font-style: italic;
      font-size: 20px;
      color: #2d5e2d;
      margin-top: 10px;
    }
  </style>
</head>
<body>
  <!-- HEADER -->
  <header class="header">
    <div class="container header-inner">
      <div class="logo">🌿 Natural Medicina</div>
      <nav class="menu">
        <a href="../indexLogado.php">Home</a>
        <a href="../Relatos/Relato/form_cad_relato.html">Relatos</a>
        <a href="../cadplantas/naturalmedicina/views/pesquisa.php">Catálogo</a>
        <a href="../logout.php">Sair</a>
      </nav>
    </div>
  </header>

  
  <section class="foto-perfil">
    <img src="uploads/<?php echo htmlspecialchars($idUsuario); ?>.jpg?<?php echo time(); ?>" alt="Sua Foto de Perfil">
   <form action="upload.foto.usu.php" method="POST" enctype="multipart/form-data"><h1>Olá, <?php echo htmlspecialchars($nomeUsuario); ?>!</h1>
      <label for="foto">📸 Escolher Foto</label>
      <input type="file" id="foto" name="foto" accept="image/*">
      <br>
      <button type="submit">Atualizar Foto</button>
    </form>
  </section>

  <section class="plantas">
    <h2>🌿 Frase para Inspirar</h2>
    <p>“Assim como as plantas, precisamos de tempo, paciência e cuidado para florescer.” 🌼</p>
  </section>

</body>
</html>
