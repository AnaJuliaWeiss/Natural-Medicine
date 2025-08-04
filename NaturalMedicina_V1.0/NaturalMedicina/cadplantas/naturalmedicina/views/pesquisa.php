<?php
require_once __DIR__ . '/../controllers/PlantaController.php';

$controller = new PlantaController();
$plantas = $controller->listarPlantas();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Lista de Plantas Medicinais</title>
  <link rel="stylesheet" href="../../../css/cadplant.css">
<style>
    /* Reset básico */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: 'Segoe UI', sans-serif;
  background-color: white;
  color: #2e7d32;
  min-height: 100vh;
}

/* Header com logo e menu */
.header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  background-color: #4caf50;
  padding: 15px 30px;
  box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
}

.header .logo img {
  height: 50px;
}

.header .menu a {
  color: white;
  text-decoration: none;
  margin-left: 20px;
  font-weight: bold;
  transition: color 0.3s;
}

.header .menu a:hover {
  color: #c8e6c9;
}

/* Container principal */
.container {
  max-width: 1200px;
  margin: 40px auto;
  padding: 0 20px;
}

.container h2 {
  text-align: center;
  font-size: 32px;
  color: #1b5e20;
  margin-bottom: 30px;
}

/* Botão cadastrar */
.top-bar {
  display: flex;
  justify-content: center; /* ← centraliza horizontalmente */
  margin-bottom: 20px;
}

.btn-cadastrar {
  background-color: #4caf50;
  color: white;
  padding: 12px 20px;
  border-radius: 8px;
  text-decoration: none;
  font-weight: bold;
  transition: background-color 0.3s;
}

.btn-cadastrar:hover {
  background-color: #388e3c;
}

/* Grid de cards */
.plantas-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  gap: 30px;
}

/* Cada card de planta */
.planta-card {
  background-color: white;
  border-radius: 12px;
  box-shadow: 0 4px 14px rgba(0, 0, 0, 0.08);
  overflow: hidden;
  transition: transform 0.3s, box-shadow 0.3s;
}

.planta-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 8px 18px rgba(0, 0, 0, 0.15);
}

.planta-link {
  text-decoration: none;
  color: inherit;
  display: block;
  height: 100%;
}

.planta-card img {
  width: 100%;
  height: 180px;
  object-fit: cover;
}

.planta-card h3 {
  font-size: 20px;
  color: #1b5e20;
  margin: 12px;
}

.planta-card p {
  font-size: 16px;
  color: #4caf50;
  margin: 0 12px 16px 12px;
}
/* Estilo para a barra de busca */
.busca-wrapper {
  display: flex;
  justify-content: center;
  align-items: center;
  margin-bottom: 30px;
  gap: 10px;
  flex-wrap: wrap;
}

.busca-wrapper input[type="text"] {
  padding: 10px 15px;
  font-size: 16px;
  border: 2px solid #c8e6c9;
  border-radius: 8px;
  outline: none;
  width: 250px;
  max-width: 90%;
  transition: border-color 0.3s;
}

.busca-wrapper input[type="text"]:focus {
  border-color: #66bb6a;
}

.busca-wrapper button {
  padding: 10px 20px;
  background-color: #4caf50;
  color: white;
  font-weight: bold;
  border: none;
  border-radius: 8px;
  cursor: pointer;
  transition: background-color 0.3s;
}

.busca-wrapper button:hover {
  background-color: #388e3c;
}

  </style>
</head>
<body>

<header class="header">
  <div class="logo"><img src="../../../assets/favicon/logo.png" alt="Logo" /></div>
  <nav class="menu">
   <nav class="menu">
   <a href="../../../indexLogado.admins.php">Home</a>
  <a href="../../../Relatos/Relato/form_cad_relato.html">Relatos</a>
  <a href="../../../ContaAdmin/indexadmin.php">Conta</a>

</nav>

  </nav>
</header>

<div class="container">
  <h2>Lista de Plantas Medicinais</h2>

  <div class="top-bar">
    <a href="cadastro.php" class="btn-cadastrar">Cadastrar nova planta</a>
  </div>

  <?php if (!isset($plantas)) $plantas = []; ?>

  <?php if (count($plantas) > 0): ?>
    <div class="plantas-grid">
      <?php foreach ($plantas as $planta): ?>
        <div class="planta-card">
          <a href="detalhes.php?id=<?= $planta['id_planta'] ?>" class="planta-link">
            <?php if (!empty($planta['imagem_url'])): ?>
              <img src="../uploads/<?= htmlspecialchars($planta['imagem_url']) ?>" alt="<?= htmlspecialchars($planta['nome_popular']) ?>">
            <?php else: ?>
              <img src="https://via.placeholder.com/240x180?text=Sem+Imagem" alt="Sem imagem">
            <?php endif; ?>
            <h3><?= htmlspecialchars($planta['nome_popular']) ?></h3>
            <p><?= htmlspecialchars($planta['nome_cientifico']) ?></p>
          </a>
        </div>
      <?php endforeach; ?>
    </div>
  <?php else: ?>
    <p style="text-align: center; margin-top: 30px;">Nenhuma planta cadastrada ainda.</p>
  <?php endif; ?>
</div>

</body>
</html>
