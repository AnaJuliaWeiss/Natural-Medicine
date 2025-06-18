<?php
require_once '../controllers/PlantaController.php';
$controller = new PlantaController();
$plantas = $controller->listar();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Pesquisa de Plantas</title>
    <style>
        body { font-family: Arial; background: #f0f0f0; margin: 30px; }
        h2 { color: #388e3c; }
        .planta { background: #fff; padding: 15px; border-radius: 10px; margin: 10px auto; max-width: 600px; box-shadow: 0 0 10px #bbb; }
        img { max-width: 100px; border-radius: 5px; }
        a { color: #2e7d32; text-decoration: none; display: inline-block; margin: 5px 10px 0 0; }
        .acoes { margin-top: 10px; }
        .btn { background: #2e7d32; color: white; padding: 6px 12px; border: none; border-radius: 4px; text-decoration: none; }
    </style>
</head>
<body>
    <h2>Plantas Medicinais Cadastradas</h2>
    <a href="cadastro.php" class="btn">+ Nova Planta</a>
    <?php foreach ($plantas as $planta): ?>
        <div class="planta">
            <h3><?= htmlspecialchars($planta['nome_popular']) ?></h3>
            <img src="../<?= htmlspecialchars($planta['imagem_url']) ?>" alt="Imagem da Planta">
            <div class="acoes">
                <a href="detalhes.php?id=<?= $planta['id'] ?>" class="btn">Ver Detalhes</a>
                <a href="../processos/processaExcluir.php?id=<?= $planta['id'] ?>" class="btn" onclick="return confirm('Deseja excluir esta planta?');">Excluir</a>
            </div>
        </div>
    <?php endforeach; ?>
</body>
</html>
