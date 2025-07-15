<?php
require_once __DIR__ . '/../controllers/PlantaController.php';

$controller = new PlantaController();

$termoBusca = isset($_GET['busca']) ? trim($_GET['busca']) : '';
$plantas = $controller->listarPlantas();

// Filtra resultados se houver termo de busca
if (!empty($termoBusca)) {
    $plantas = array_filter($plantas, function ($planta) use ($termoBusca) {
        $termo = mb_strtolower($termoBusca);
        return mb_strpos(mb_strtolower($planta['nome_popular']), $termo) !== false ||
               mb_strpos(mb_strtolower($planta['nome_cientifico']), $termo) !== false;
    });
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Ver Plantas Medicinais</title>
  <link rel="stylesheet" href="../../../css/cadplant.css">
  <style>
    .search-box {
      text-align: center;
      margin: 30px auto 20px;
    }
    .search-box input[type="text"] {
      width: 50%;
      padding: 10px;
      border: 1px solid #2d5e2d;
      border-radius: 8px;
      font-size: 16px;
    }
    .search-box button {
      padding: 10px 16px;
      margin-left: 10px;
      background-color: #2d5e2d;
      color: white;
      border: none;
      border-radius: 8px;
      cursor: pointer;
    }
    .search-box button:hover {
      background-color: #3a763a;
    }
  </style>
</head>
<body>

<header class="header">
  <div class="logo"><img src="../../../assets/favicon/logo.png" alt="Logo" /></div>
  <nav class="menu">
    <a href="../../../indexLogado.php">Home</a>
    <a href="../../../Relatos/Relato/form_cad_relato.html">Relatos</a>
    <a href="../../../ContaAdmin/index.php">Conta</a>
  </nav>
</header>

<div class="container">
  <h2>Plantas Medicinais</h2>

  <div class="search-box">
    <form method="GET" action="">
      <input type="text" name="busca" placeholder="Buscar planta por nome popular ou científico" value="<?= htmlspecialchars($termoBusca) ?>">
      <button type="submit">Buscar</button>
    </form>
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
    <p style="text-align: center; margin-top: 30px;">Nenhuma planta encontrada com esse nome.</p>
  <?php endif; ?>
</div>

</body>
</html>
