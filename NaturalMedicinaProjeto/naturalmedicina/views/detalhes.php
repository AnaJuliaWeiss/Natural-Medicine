<?php
require_once '../config/Database.php';
require_once '../models/Planta.php';

if (!isset($_GET['id'])) {
    echo "ID da planta não fornecido.";
    exit;
}

$db = new Database();
$conn = $db->getConnection();

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
            margin: 40px auto;
            background-color: #f4f4f4;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 3px 3px 12px rgba(0,0,0,0.15);
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
        }

        .imagem {
            text-align: center;
            margin-bottom: 30px;
        }

        .imagem img {
            width: 300px;
            height: auto;
            border-radius: 10px;
            box-shadow: 2px 2px 8px rgba(0,0,0,0.2);
        }

        .info strong {
            display: inline-block;
            width: 180px;
        }

        .info p {
            margin-bottom: 10px;
        }

        .botoes {
            margin-top: 30px;
            text-align: center;
        }

        .botoes a {
            display: inline-block;
            margin: 0 10px;
            padding: 12px 20px;
            text-decoration: none;
            background-color: #2d89ef;
            color: white;
            border-radius: 8px;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .botoes a:hover {
            background-color: #1b5fbd;
        }

        .botoes .excluir {
            background-color: #e74c3c;
        }

        .botoes .excluir:hover {
            background-color: #c0392b;
        }
    </style>
</head>
<body>

    <h1><?= htmlspecialchars($planta['nome_popular']) ?></h1>

    <div class="imagem">
        <?php if (!empty($planta['imagem_url']) && file_exists("../" . $planta['imagem_url'])): ?>
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
        <a href="../index.php">Voltar à Lista</a>
        <a class="excluir" href="../controllers/processaExcluir.php?id=<?= $planta['id'] ?>" onclick="return confirm('Tem certeza que deseja excluir esta planta?')">Excluir</a>
    </div>

</body>
</html>
