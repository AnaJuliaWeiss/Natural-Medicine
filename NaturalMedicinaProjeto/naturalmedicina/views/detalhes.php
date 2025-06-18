<?php
require_once '../controllers/PlantaController.php';
$id = $_GET['id'] ?? null;
$controller = new PlantaController();
$planta = $controller->buscar($id);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Detalhes da Planta</title>
    <style>
        body { font-family: Arial; background: #f0f9f0; padding: 30px; }
        h2 { color: #1b5e20; }
        .conteudo { background: #fff; padding: 20px; border-radius: 10px; max-width: 700px; margin: auto; box-shadow: 0 0 10px #ccc; }
        img { max-width: 100%; border-radius: 8px; margin-bottom: 10px; }
        p { margin: 8px 0; }
        strong { color: #2e7d32; }
        a { color: #2e7d32; display: inline-block; margin-top: 20px; }
    </style>
</head>
<body>
    <div class="conteudo">
        <h2><?= htmlspecialchars($planta['nome_popular']) ?></h2>
        <img src="../<?= htmlspecialchars($planta['imagem_url']) ?>" alt="Imagem da planta">
        <p><strong>Nome Científico:</strong> <?= htmlspecialchars($planta['nome_cientifico']) ?></p>
        <p><strong>Uso Medicinal:</strong> <?= nl2br(htmlspecialchars($planta['uso_medicinal'])) ?></p>
        <p><strong>Modo de Uso:</strong> <?= nl2br(htmlspecialchars($planta['modo_uso'])) ?></p>
        <p><strong>Dosagem:</strong> <?= htmlspecialchars($planta['dosagem']) ?></p>
        <p><strong>Efeitos Colaterais:</strong> <?= nl2br(htmlspecialchars($planta['efeitos_colaterais'])) ?></p>
        <p><strong>Benefícios:</strong> <?= nl2br(htmlspecialchars($planta['beneficios'])) ?></p>
        <p><strong>Malefícios:</strong> <?= nl2br(htmlspecialchars($planta['maleficios'])) ?></p>
        <p><strong>Fonte:</strong> <?= htmlspecialchars($planta['fonte']) ?></p>
        <a href="pesquisa.php">← Voltar à lista</a>
    </div>
</body>
</html>

