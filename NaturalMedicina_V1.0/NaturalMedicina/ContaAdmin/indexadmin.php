<?php
session_start();


if (!isset($_SESSION['tipo']) || $_SESSION['tipo'] !== 'admin') {
    header("Location: login.html");
    exit;
}

$nomeAdmin = $_SESSION['nome']; 
$idAdmin = $_SESSION['id_usuario'] ?? '../img/perfil_padrao.png';





require_once("../Relatos/Classes/Database.class.php");
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Perfil do Administrador</title>

    <link rel="stylesheet" href="../css/index_usu_adm.css">
</head>
<body>

 <style>
  
  body {
  background-image: url("../assets/img/Ramo\ de\ camomila\ sobre\ mesa\ rústica.png");
  background-size: cover;          
  background-position: center;     
  background-repeat: no-repeat;    
  background-attachment: fixed;   
  position: relative;
  font-family: 'Segoe UI', Arial, sans-serif;
  margin: 0;
  padding: 0;
  color: #333;
}

body::before {
  content: "";
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.25); 
  z-index: -1;                    
  backdrop-filter: brightness(0.9);
}
 /* HEADER  */
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

/*  Títulos */
h1, h2 {
  text-align: center;
  color: #2d5e2d;
  margin-bottom: 20px;
  letter-spacing: 0.5px;
}

/*  Seções  */
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
    /*  FOTO DE PERFIL  */
   .foto-perfil {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
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

/*  Botões do Admin  */

.acoes-admin {
    text-align: center;
    padding: 35px 25px;
}

.grid-botoes {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 18px;
    max-width: 500px;
    margin: 0 auto;
}

.botao-acao {
    background: #e8f5e9;
    color: #2d5e2d;
    padding: 14px;
    border-radius: 12px;
    font-size: 16px;
    font-weight: 600;
    text-decoration: none;
    box-shadow: 0 4px 10px rgba(0,0,0,0.08);
    transition: background 0.25s ease, transform 0.2s ease;
    display: flex;
    justify-content: center;
    align-items: center;
}

.botao-acao:hover {
    background: #d0ebd3;
    transform: translateY(-2px);
}

.botao-acao.sair {
    background: #ffe5e5;
    color: #b30000;
}

.botao-acao.sair:hover {
    background: #ffcccc;
}

    </style>
     <header class="header">
    <div class="container header-inner">
      <div class="logo">🌿 Natural Medicina</div>

        <nav class="menu">
        </nav>
      </div>
    </header>

   
   <section class="foto-perfil">
    <img src="uploads/<?php echo htmlspecialchars($idAdmin); ?>.jpg?<?php echo time(); ?>" alt="Sua Foto de Perfil">
   <form action="upload.foto.php" method="POST" enctype="multipart/form-data"><h1>Olá, <?php echo htmlspecialchars($nomeAdmin); ?>!</h1>
      <label for="foto">📸 Escolher Foto</label>
      <input type="file" id="foto" name="foto" accept="image/*">
      <br>
      <button type="submit">Atualizar Foto</button>
    </form>
  </section>

    <section class="acoes-admin">
    <h2>Painel do Administrador</h2>

    <div class="grid-botoes">
        <a href="../cadplantas/naturalmedicina/views/ver_plantas.php" class="botao-acao">
            📗 Cadastrar Planta
        </a>

        <a href="../Relatos/Relato/form_cad_relato.html" class="botao-acao">
            📝 Relatos
        </a>

        <a href="../indexLogado.admins.php" class="botao-acao">
            🏠 Home
        </a>

        <a href="../logout.php" class="botao-acao sair">
            🚪 Sair
        </a>
    </div>
</section>


</body>
</html>
