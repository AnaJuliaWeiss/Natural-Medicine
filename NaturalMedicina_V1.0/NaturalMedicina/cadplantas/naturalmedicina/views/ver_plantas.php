<?php
require_once __DIR__ . '/../controllers/PlantaController.php';

$controller = new PlantaController();

$termoBusca = isset($_GET['busca']) ? trim($_GET['busca']) : '';
$categoria = isset($_GET['categoria']) ? trim($_GET['categoria']) : '';

$plantas = $controller->listarPlantas();

// Filtra  busca
if (!empty($termoBusca)) {
    $plantas = array_filter($plantas, function ($planta) use ($termoBusca) {
        $termo = mb_strtolower($termoBusca);
        return mb_strpos(mb_strtolower($planta['nome_popular']), $termo) !== false ||
               mb_strpos(mb_strtolower($planta['nome_cientifico']), $termo) !== false;
    });
}

// Filtra categoria 
if (!empty($categoria)) {
    $plantas = array_filter($plantas, function ($planta) use ($categoria) {
        return isset($planta['categoria']) && mb_strtolower($planta['categoria']) === mb_strtolower($categoria);
    });
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Ver Plantas Medicinais</title>
  <link rel="stylesheet" href="../../../css/plantaspesquisa.css">
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&family=Caladea&display=swap" rel="stylesheet">
  
</head>
<body>

  <header class="header">
    <div class="logo">🌿 Natural Medicina</div>

    <form method="GET" action="" class="busca-form">
      <input type="text" name="busca" placeholder="Buscar planta..." value="<?= htmlspecialchars($termoBusca) ?>">
      <button type="submit">Buscar</button>
    </form>

    <nav class="menu">
      <a href="../../../indexLogado.admins.php">Home</a>
      <a href="../views/cadastro.php">Cadastro de Plantas </a>
       </nav>
  </header>

  <div class="container">
    <h2>Plantas Medicinais</h2>

    <!-- Filtros -->
    <div class="filtros">
      <a href="pesquisa.php">Todas</a>
      <a href="pesquisa.php?categoria=raiz">Raiz</a>
      <a href="pesquisa.php?categoria=caule">Caule</a>
      <a href="pesquisa.php?categoria=folha">Folha</a>
      <a href="pesquisa.php?categoria=flor">Flor</a>
      <a href="pesquisa.php?categoria=fruto">Fruto</a>
      <a href="pesquisa.php?categoria=semente">Semente</a>
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

              <?php if (!empty($planta['categoria'])): ?>
                <a href="pesquisa.php?categoria=<?= urlencode($planta['categoria']) ?>" class="categoria-btn">
                  <?= ucfirst(htmlspecialchars($planta['categoria'])) ?>
                </a>
              <?php endif; ?>
            </a>
          </div>
        <?php endforeach; ?>
      </div>
    <?php else: ?>
      <p style="text-align:center; margin-top:30px;">Nenhuma planta encontrada com esse filtro.</p>
    <?php endif; ?>
  </div>

</body>
</html>
