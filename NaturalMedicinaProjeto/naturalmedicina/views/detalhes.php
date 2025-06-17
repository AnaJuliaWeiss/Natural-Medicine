<?php
require_once '../controllers/PlantaController.php';
$controller = new PlantaController();
$id = $_GET['id'] ?? null;
$planta = $controller->buscar($id);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Detalhes da Planta</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2fff2;
            padding: 30px;
        }
        .conteudo {
            background: #fff;
            padding: 25px;
            border-radius: 8px;
            max-width: 700px;
            margin: auto;
        }
        h2 {
            color: #2e7d32;
        }
        img {
            max-width: 300px;
            margin-top: 15px;
        }
        p {
            margin-bottom: 10px;
        }
        a {
            display: block;
            margin-top: 20px;
            color: #00796b;
        }
    </style>
</head>
<body>
    <div class="conteudo">
        <h2><?= htmlspecialchars($planta['nome_popular']) ?></h2>
        <?php if (!empty($planta['imagem_url'])): ?>
            <img src="<?= htmlspecialchars($planta['imagem_url']) ?>" alt="Imagem">
        <?php endif; ?>
        <p><strong>Nome Científico:</strong> <?= htmlspecialchars($planta['nome_cientifico']) ?></p>
        <p><strong>Uso Medicinal:</strong> <?= nl2br(htmlspecialchars($planta['uso_medicinal'])) ?></p>
        <p><strong>Modo de Uso:</strong> <?= nl2br(htmlspecialchars($planta['modo_uso'])) ?></p>
        <p><strong>Dosagem:</strong> <?= htmlspecialchars($planta['dosagem']) ?></p>
        <p><strong>Efeitos Colaterais:</strong> <?= nl2br(htmlspecialchars($planta['efeitos_colaterais'])) ?></p>
        <p><strong>Benefícios:</strong> <?= nl2br(htmlspecialchars($planta['beneficios'])) ?></p>
        <p><strong>Malefícios:</strong> <?= nl2br(htmlspecialchars($planta['maleficios'])) ?></p>
        <p><strong>Fonte:</strong> <?= htmlspecialchars($planta['fonte']) ?></p>
        <a href="pesquisa.php">Voltar para lista</a>
    </div>
</body>
</html>
