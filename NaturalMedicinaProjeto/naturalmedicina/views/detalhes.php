<?php
require_once '../controllers/PlantaController.php';

$id = $_GET['id'] ?? null;

$controller = new PlantaController();
$planta = $controller->buscarPlanta($id);

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
        body { font-family: Arial; background: #f0f9f0; padding: 30px; }
        h2 { color: #1b5e20; }
        .conteudo { background: #fff; padding: 20px; border-radius: 10px; max-width: 700px; margin: auto; box-shadow: 0 0 10px #ccc; }
        img { max-width: 100%; border-radius: 8px; margin-bottom: 10px; }
        p { margin: 8px 0; }
        strong { color: #2e7d32; }
        a { color: #2e7d32; display: inline-block; margin-top: 20px; text-decoration: none; }
        .botoes {
            margin-top: 20px;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            border-radius: 6px;
            color: white;
            text-decoration: none;
            margin-right: 10px;
            font-weight: bold;
            cursor: pointer;
        }
        .btn-editar { background-color: #4caf50; }
        .btn-editar:hover { background-color: #45a049; }
        .btn-excluir { background-color: #f44336; }
        .btn-excluir:hover { background-color: #d32f2f; }
        .btn-voltar {
            background-color: transparent;
            color: #2e7d32;
            font-weight: normal;
        }
        .btn-voltar:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <div class="conteudo">
        <h2><?= htmlspecialchars($planta['nome_popular']) ?></h2>

        <?php if (!empty($planta['imagem_url'])): ?>
            <img src="../uploads/<?= htmlspecialchars($planta['imagem_url']) ?>" alt="Imagem da planta">
        <?php else: ?>
            <img src="https://via.placeholder.com/600x400?text=Sem+Imagem" alt="Sem imagem">
        <?php endif; ?>

        <p><strong>Nome Científico:</strong> <?= htmlspecialchars($planta['nome_cientifico']) ?></p>
        <p><strong>Uso Medicinal:</strong> <?= nl2br(htmlspecialchars($planta['uso_medicinal'])) ?></p>
        <p><strong>Modo de Uso:</strong> <?= nl2br(htmlspecialchars($planta['modo_uso'])) ?></p>
        <p><strong>Dosagem:</strong> <?= htmlspecialchars($planta['dosagem']) ?></p>
        <p><strong>Efeitos Colaterais:</strong> <?= nl2br(htmlspecialchars($planta['efeitos_colaterais'])) ?></p>
        <p><strong>Benefícios:</strong> <?= nl2br(htmlspecialchars($planta['beneficios'])) ?></p>
        <p><strong>Malefícios:</strong> <?= nl2br(htmlspecialchars($planta['maleficios'])) ?></p>
        <p><strong>Fonte:</strong> <?= htmlspecialchars($planta['fonte']) ?></p>

        <div class="botoes">
            <a href="editar.php?id=<?= $planta['id'] ?>" class="btn btn-editar">Editar</a>
            <a href="../processos/processaExcluir.php?id=<?= $planta['id'] ?>" onclick="return confirm('Tem certeza que deseja excluir esta planta?');" class="btn btn-excluir">Excluir</a>
            <a href="pesquisa.php" class="btn btn-voltar">← Voltar à lista</a>
        </div>
    </div>
</body>
</html>
