<?php
require_once '../config/database.php';
require_once '../models/Planta.php';

$db = new Database();
$conn = $db->conectar();
$planta = new Planta($conn);

$id = $_GET['id'];
$dados = $planta->buscarPorId($id);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Detalhes da Planta</title>
    <style>
        body {
            font-family: Arial;
            padding: 20px;
        }
        img {
            max-width: 300px;
            height: auto;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <h2><?= htmlspecialchars($dados['nome_popular']) ?> (<?= htmlspecialchars($dados['nome_cientifico']) ?>)</h2>
    <img src="../uploads/<?= htmlspecialchars($dados['imagem_url']) ?>" alt="<?= htmlspecialchars($dados['nome_popular']) ?>">
    <p><strong>Uso Medicinal:</strong> <?= nl2br(htmlspecialchars($dados['uso_medicinal'])) ?></p>
    <p><strong>Modo de Uso:</strong> <?= nl2br(htmlspecialchars($dados['modo_uso'])) ?></p>
    <p><strong>Dosagem:</strong> <?= nl2br(htmlspecialchars($dados['dosagem'])) ?></p>
    <p><strong>Efeitos Colaterais:</strong> <?= nl2br(htmlspecialchars($dados['efeitos_colaterais'])) ?></p>
    <p><strong>Benefícios:</strong> <?= nl2br(htmlspecialchars($dados['beneficios'])) ?></p>
    <p><strong>Malefícios:</strong> <?= nl2br(htmlspecialchars($dados['maleficios'])) ?></p>
    <p><strong>Fonte:</strong> <?= nl2br(htmlspecialchars($dados['fonte'])) ?></p>
    <br>
    <a href="lista.php">Voltar à Lista</a>
</body>
</html>
