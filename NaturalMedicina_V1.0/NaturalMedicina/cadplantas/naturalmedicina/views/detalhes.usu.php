<?php
require_once __DIR__ . '/../controllers/PlantaController.php';

$id = $_GET['id'] ?? null;
$controller = new PlantaController();
$planta = $controller->buscarPlanta($id);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title><?= htmlspecialchars($planta['nome_popular']) ?></title>
  <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../../../css/detalheplanta.css">

  
</head>

     <!-- HEADER -->
  <header class="header">
    <div class="container header-inner">
      <div class="logo">🌿 Natural Medicina</div>

      <a href="../../../cadplantas/naturalmedicina/views/pesquisa.php" class="btn-header">Home</a>
    </div>
  </header>

<body>
  <main class="planta-detalhe">
    <section class="imagem-container">
      <div class="imagem">
        <img src="../uploads/<?= htmlspecialchars($planta['imagem_url']) ?>" alt="<?= htmlspecialchars($planta['nome_popular']) ?>">
      </div>
      <div class="modo-uso">
        <strong>Modo de uso:</strong> <?= nl2br($planta['modo_uso']) ?>
      </div>
    </section>

    <section class="info">
      <h1><?= htmlspecialchars($planta['nome_popular']) ?></h1>
      <h2><em><?= htmlspecialchars($planta['nome_cientifico']) ?></em></h2>

      <div class="campo"><strong>Uso medicinal:</strong> <?= nl2br($planta['uso_medicinal']) ?></div>
      <div class="campo"><strong>Dosagem:</strong> <?= nl2br($planta['dosagem']) ?></div>
      <div class="campo"><strong>Efeitos colaterais:</strong> <?= nl2br($planta['efeitos_colaterais']) ?></div>
      <div class="campo"><strong>Benefícios:</strong> <?= nl2br($planta['beneficios']) ?></div>
      <div class="campo"><strong>Malefícios:</strong> <?= nl2br($planta['maleficios']) ?></div>
      
      <div class="campo2"><strong>Fonte:</strong> <?= nl2br($planta['fonte']) ?></div>

    </section>
  </main>
</body>
</html>
