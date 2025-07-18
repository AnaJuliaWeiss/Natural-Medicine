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
