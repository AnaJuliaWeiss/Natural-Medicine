<?php
require_once '../config/Database.php';
require_once '../models/Planta.php';

if (!isset($_GET['id'])) {
    echo "ID da planta não informado.";
    exit;
}

$database = new Database();
$conn = $database->getConnection();

$plantaModel = new Planta($conn);
$planta = $plantaModel->buscarPorId($_GET['id']);

if (!$planta) {
    echo "Planta não encontrada.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Detalhes da Planta</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 20px auto;
            background-color: #f9f9f9;
        }
        h1 { text-align: center; }
        .imagem {
            text-align: center;
            margin-bottom: 20px;
        }
        .imagem img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            border: 1px solid #ccc;
        }
        .info {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .info p {
            margin: 10px 0;
        }
        .botoes {
            margin-top: 20px;
            text-align: center;
        }
        .botoes a {
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            margin: 0 10px;
            color: white;
        }
        .voltar { background-color: #555; }
        .excluir { background-color: red; }
    </style>
</head>
<body>

<h1><?= htmlspecialchars($planta['nome_popular']) ?></h1>

<div class="imagem">
    <?php if (!empty($planta['imagem_url'])): ?>
        <img src="../<?= htmlspecialchars($planta['imagem_url']) ?>" alt="Imagem da planta">
    <?php else: ?>
        <img src="../images/default-plant.jpg" alt="Imagem padrão">
    <?php endif; ?>
</div>

<div class="info">
    <p><strong>Nome Científico:</strong> <?= htmlspecialchars($planta['nome_cientifico']) ?></p>
    <p><strong>Descrição:</strong> <?= nl2br(htmlspecialchars($planta['descricao'])) ?></p>
    <p><strong>Uso Medicinal:</strong> <?= nl2br(htmlspecialchars($planta['uso_medicinal'])) ?></p>
    <p><strong>Efeitos Colaterais:</strong> <?= nl2br(htmlspecialchars($planta['efeitos_colaterais'])) ?></p>
    <p><strong>Modo de Uso:</strong> <?= nl2br(htmlspecialchars($planta['modo_uso'])) ?></p>
</div>

<div class="botoes">
    <a href="../index.php" class="voltar">Voltar à Lista</a>
    <a href="../controllers/processaExcluir.php?id=<?= $planta['id'] ?>" class="excluir" onclick="return confirm('Tem certeza que deseja excluir esta planta?')">Excluir</a>
</div>

</body>
</html>

