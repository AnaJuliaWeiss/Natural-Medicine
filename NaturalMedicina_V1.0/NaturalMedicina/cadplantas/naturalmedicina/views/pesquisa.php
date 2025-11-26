<?php
require_once __DIR__ . '/../controllers/PlantaController.php';

$controller = new PlantaController();

$termoBusca = isset($_GET['busca']) ? trim($_GET['busca']) : '';
$categoria = isset($_GET['categoria']) ? trim($_GET['categoria']) : '';

$plantas = $controller->listarPlantas();


if (!empty($termoBusca)) {
    $plantas = array_filter($plantas, function ($planta) use ($termoBusca) {
        $termo = mb_strtolower($termoBusca);
        return mb_strpos(mb_strtolower($planta['nome_popular']), $termo) !== false ||
               mb_strpos(mb_strtolower($planta['nome_cientifico']), $termo) !== false;
    });
}


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
<style>
  header.header {
  background: linear-gradient(90deg, #3a7d44, #4caf50);
  position: sticky;
  top: 0;
  z-index: 999;
  box-shadow: 0 2px 8px rgba(0,0,0,0.06);
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 15px 30px;
  flex-wrap: wrap;
  gap: 20px;
}

.header-inner {
  display: flex;
  justify-content: space-between;
  align-items: center;
  gap: 1rem;
  height: 80px;
  padding: 0;
}

.logo {
  font-family: 'Playfair Display', serif;
  font-size: 26px;
  font-weight: 600;
  color: #fff;
  display: flex;
  align-items: center;
  gap: .5rem;
}

nav.menu {
  display: flex;
  gap: 2rem;
  align-items: center;
}

nav.menu a {
  color: #fff;
  text-decoration: none;
  font-weight: 600;
  font-size: 16px;
  padding: .25rem .35rem;
  transition: color .2s ease;
}
nav.menu a:hover { color: #d9f7d9; }

.btn-header {
  background: #fff;
  color: #3a7d44;
  padding: .6rem 1rem;
  border-radius: 8px;
  font-weight: 700;
  text-decoration: none;
  display: inline-block;
  transition: background .2s ease, transform .15s ease;
}
.btn-header:hover { background: #d9f7d9; transform: translateY(-2px); }

</style>
  <header class="header">
    <div class="logo">🌿 Natural Medicina</div>

    <form method="GET" action="" class="busca-form">
      <input type="text" name="busca" placeholder="Buscar planta..." value="<?= htmlspecialchars($termoBusca) ?>">
      <button type="submit">Buscar</button>
    </form>

    <nav class="menu">
      <a href="../../../indexLogado.php">Home</a>
      <a href="../../../Relatos/Relato/form_cad_relato.html">Relatos</a>
      <a href="../../../ContaUsuario/indexusuario.php">Conta</a>
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
            <a href="detalhes.usu.php?id=<?= $planta['id_planta'] ?>" class="planta-link">
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