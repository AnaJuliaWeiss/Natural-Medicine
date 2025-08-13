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
  <style>
    body {

      
body {
  font-family: 'Merriweather', serif;
  background-color: #ffffff;
  color: #2e7d32;
  line-height: 1.8;
  font-size: 18px;
}

.planta-detalhe {
  display: flex;
  flex-wrap: wrap;
  gap: 40px;
  padding: 40px 5%;
  justify-content: center;
  align-items: flex-start;
  background-color: #f9f9f9;
}

.imagem-container {
  display: flex;
  flex-direction: column;
  align-items: center;
  flex: 1;
  min-width: 320px;
  max-width: 700px;
}

.imagem img {
  width: 100%;
  height: 100%;
  border-radius: 20px;
  object-fit: cover;
  box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
}

.modo-uso {
  margin-top: 20px;
  background-color: #ffffff;
  padding: 16px 20px;
  border-radius: 12px;
  box-shadow: 0 2px 8px rgba(0,0,0,0.05);
  font-size: 18px;
  width: 100%;
  box-sizing: border-box;
  color: #333;
}

.modo-uso strong {
  color: #1b5e20;
  font-size: 22px;
}

.info {
  flex: 1;
  min-width: 320px;
  max-width: 700px;

}

.info h1 {
  font-size: 20px;
  margin-bottom: 6px;
  color: #1b5e20;
  font-weight: 700;
}

.info h2 {
  font-size: 35px;    
  font-style: italic;
  margin-top: 0;
  margin-bottom: 20px;
  color: #4caf50;
  font-weight: 300;
}

.campo {
  margin-bottom: 0px;
  font-size: 18px;
  color: #333;  
}

.campo strong {
  display: block;
  font-weight: bold;
  color: #1b5e20;
  margin-bottom: 5px;
  font-size: 20px;
}

.campo2 strong {
  display: block;
  font-weight: bold;
  color: #1b5e20;
  margin-bottom: 5px;
  font-size: 25px;
}

.botoes {
  margin-top: 20px;
}

.btn {
  display: inline-block;
  padding: 12px 24px;
  margin-right: 12px;
  border-radius: 8px;
  text-decoration: none;
  font-weight: bold;
  font-size: 16px;
  transition: background-color 0.3s ease;
}

.btn.editar {
  background-color: #1976d2;
  color: white;
}
.btn.editar:hover {
  background-color: #115293;
}

.btn.excluir {
  background-color: #d32f2f;
  color: white;
}
.btn.excluir:hover {
  background-color: #9a0007;
}

.btn.voltar {
  margin-top: 40px;
  display: block;
  text-align: center;
  color: #388e3c;
  text-decoration: none;
  font-weight: bold;
  font-size: 17px;
}
.btn.voltar:hover {
  text-decoration: underline;
}
    
}
  </style>
  
</head>

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

      <div class="botoes">
        <a href="editar.php?id=<?= $planta['id_planta'] ?>" class="btn editar">Editar</a>
        <a href="../processos/processaExcluir.php?id=<?= $planta['id_planta'] ?>" class="btn excluir" onclick="return confirm('Tem certeza que deseja excluir esta planta?');">Excluir</a>
        <a href="pesquisa.php" class="btn voltar">⬅ Voltar para a Lista</a>
      </div>
    </section>
  </main>
</body>
</html>
