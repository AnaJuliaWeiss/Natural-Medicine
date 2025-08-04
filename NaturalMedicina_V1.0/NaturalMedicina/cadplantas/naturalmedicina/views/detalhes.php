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
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: 'Arial', sans-serif;
      background-color: #ffffffff;
      color: #2e7d32;
      
    }

    .planta-detalhe {
      display: flex;
      flex-direction: row;
      flex-wrap: wrap;
      gap: 40px;
      padding: 40px;
      width: 100%;
      box-sizing: border-box;
      justify-content: center;
      align-items: flex-start;
    }

    .imagem img {
      width: 100%;
      max-width: 600px;
      border-radius: 12px;
      box-shadow: 0 0 12px rgba(0, 0, 0, 0.1);
      
    }

    .info {
      flex: 1;
      min-width: 300px;
      max-width: 800px;
    }

    .info h1 {
      font-size: 36px;
      margin-bottom: 0;
      color: #1b5e20;
    }

    .info h2 {
      font-size: 20px;
      font-style: italic;
      margin-top: 0;
      color: #388e3c;
      
    }

    .campo {
      margin: 20px 0;
      font-size: 18px;
      line-height: 1.6;
    }

    .campo strong {
      color: #2e7d32;
    }

    .botoes {
      margin-top: 30px;
    }

    .btn {
      display: inline-block;
      padding: 10px 20px;
      margin-right: 10px;
      border-radius: 8px;
      text-decoration: none;
      font-weight: bold;
      transition: background-color 0.3s;
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
    }

    .btn.voltar:hover {
      text-decoration: underline;
    }
  </style>
</head>

<body>
  <main class="planta-detalhe">
    <section class="imagem">
      <img src="../uploads/<?= htmlspecialchars($planta['imagem_url']) ?>" alt="<?= htmlspecialchars($planta['nome_popular']) ?>">
    </section>

    <section class="info">
      <h1><?= htmlspecialchars($planta['nome_popular']) ?></h1>
      <h2><em><?= htmlspecialchars($planta['nome_cientifico']) ?></em></h2>

       <div class="campo"><strong>Uso medicinal:</strong> <?= nl2br($planta['uso_medicinal']) ?></div>
       <div class="campo"><strong>Modo de uso:</strong> <?= nl2br($planta['modo_uso']) ?></div>
       <div class="campo"><strong>Dosagem:</strong> <?= nl2br($planta['dosagem']) ?></div>
       <div class="campo"><strong>Efeitos colaterais:</strong> <?= nl2br($planta['efeitos_colaterais']) ?></div>
       <div class="campo"><strong>Benefícios:</strong> <?= nl2br($planta['beneficios']) ?></div>
       <div class="campo"><strong>Malefícios:</strong> <?= nl2br($planta['maleficios']) ?></div>
       <div class="campo"><strong>Fonte:</strong> <?= nl2br($planta['fonte']) ?></div>

      <div class="botoes">
        <a href="editar.php?id=<?= $planta['id_planta'] ?>" class="btn editar">Editar</a>
        <a href="../processos/processaExcluir.php?id=<?= $planta['id_planta'] ?>"  class="btn excluir" onclick="return confirm('Tem certeza que deseja excluir esta planta?');" class="btn btn-excluir">Excluir</a>     
        <a href="pesquisa.php" class="btn voltar">⬅ Voltar para a Lista</a>
     
    </div>

     </section>
  </main>
</body>
</html>
