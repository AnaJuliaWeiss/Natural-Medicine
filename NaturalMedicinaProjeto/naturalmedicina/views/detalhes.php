<?php
require_once '../models/Planta.php';
require_once '../config/database.php';

if (!isset($_GET['id'])) {
    die("ID da planta não fornecido.");
}

$id = $_GET['id'];
$db = new Database();
$conn = $db->getConnection();
$plantaObj = new Planta($conn);
$planta = $plantaObj->buscarPorId($id);

if (!$planta) {
    die("Planta não encontrada.");
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title><?= $planta['nome_popular'] ?></title>
    <style>
        .container {
            max-width: 600px;
            margin: auto;
        }
        img {
            width: 100%;
            max-height: 300px;
            object-fit: cover;
        }
        .btns {
            margin-top: 20px;
        }
        .btns a {
            margin-right: 10px;
            padding: 8px 12px;
            background-color: #4CAF50;
            color: white;
            border-radius: 4px;
            text-decoration: none;
        }
        .btns form {
            display: inline;
        }
        .btns button {
            background-color: red;
            color: white;
            padding: 8px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1><?= $planta['nome_popular'] ?> (<?= $planta['nome_cientifico'] ?>)</h1>
        <img src="<?= $planta['imagem_url'] ?>" alt="<?= $planta['nome_popular'] ?>">
        <p><strong>Uso Medicinal:</strong> <?= $planta['uso_medicinal'] ?></p>
        <p><strong>Modo de Uso:</strong> <?= $planta['modo_uso'] ?></p>
        <p><strong>Dosagem:</strong> <?= $planta['dosagem'] ?></p>
        <p><strong>Efeitos Colaterais:</strong> <?= $planta['efeitos_colaterais'] ?></p>
        <p><strong>Benefícios:</strong> <?= $planta['beneficios'] ?></p>
        <p><strong>Malefícios:</strong> <?= $planta['maleficios'] ?></p>

        <div class="btns">
            <a href="../views/pesquisa.php">← Voltar à Lista</a>
            <form action="../controllers/excluirPlanta.php" method="post" onsubmit="return confirm('Tem certeza que deseja excluir esta planta?');">
                <input type="hidden" name="id" value="<?= $planta['id'] ?>">
                <button type="submit">Excluir</button>
            </form>
        </div>
    </div>
</body>
</html>
