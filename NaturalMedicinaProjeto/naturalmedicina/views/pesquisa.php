<?php
require_once '../controllers/PlantaController.php';
$controller = new PlantaController();
$plantas = $controller->listar();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Plantas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e9fbe9;
            padding: 20px;
        }
        .planta {
            border: 1px solid #ccc;
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 6px;
            background-color: #fff;
        }
        img {
            max-width: 100px;
        }
        a {
            margin-right: 10px;
        }
        .botoes {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <h2>Plantas Medicinais Cadastradas</h2>
    <a href="cadastro.php">Cadastrar Nova Planta</a>
    <?php foreach ($plantas as $planta): ?>
        <div class="planta">
            <h3><?= htmlspecialchars($planta['nome_popular']) ?></h3>
            <?php if (!empty($planta['imagem_url'])): ?>
                <img src="<?= htmlspecialchars($planta['imagem_url']) ?>" alt="Imagem da planta">
            <?php endif; ?>
            <div class="botoes">
                <a href="detalhes.php?id=<?= $planta['id'] ?>">Ver Detalhes</a>
                <a href="../processos/processaExcluir.php?id=<?= $planta['id'] ?>" onclick="return confirm('Deseja excluir esta planta?')">Excluir</a>
            </div>
        </div>
    <?php endforeach; ?>
</body>
</html>
