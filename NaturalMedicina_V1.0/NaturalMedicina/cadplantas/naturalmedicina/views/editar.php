<?php
require_once '../controllers/PlantaController.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    header('Location: pesquisa.php');
    exit;
}

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
    <meta charset="UTF-8" />
    <title>Editar Planta - <?= htmlspecialchars($planta['nome_popular']) ?></title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #e6f9e6; padding: 20px; }
        form { max-width: 600px; margin: auto; background: white; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px #ccc; }
        label { display: block; margin-top: 10px; font-weight: bold; }
        input[type=text], textarea { width: 100%; padding: 8px; margin-top: 4px; border-radius: 4px; border: 1px solid #ccc; }
        input[type=file] { margin-top: 8px; }
        button { margin-top: 15px; background-color: #4caf50; color: white; padding: 10px 15px; border: none; border-radius: 6px; cursor: pointer; }
        button:hover { background-color: #45a049; }
        .imagem-atual { margin-top: 10px; }
        a { display: inline-block; margin-top: 15px; color: #2e7d32; text-decoration: none; }
    </style>
</head>
<body>

<h2>Editar Planta: <?= htmlspecialchars($planta['nome_popular']) ?></h2>

<form action="../processos/processaEditar.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= htmlspecialchars($planta['id_planta']) ?>">

    <label for="nome_popular">Nome Popular:</label>
    <input type="text" id="nome_popular" name="nome_popular" required value="<?= htmlspecialchars($planta['nome_popular']) ?>">

    <label for="nome_cientifico">Nome Científico:</label>
    <input type="text" id="nome_cientifico" name="nome_cientifico" required value="<?= htmlspecialchars($planta['nome_cientifico']) ?>">

    <label for="uso_medicinal">Uso Medicinal:</label>
    <textarea id="uso_medicinal" name="uso_medicinal" rows="3"><?= htmlspecialchars($planta['uso_medicinal']) ?></textarea>

    <label for="modo_uso">Modo de Uso:</label>
    <textarea id="modo_uso" name="modo_uso" rows="3"><?= htmlspecialchars($planta['modo_uso']) ?></textarea>

    <label for="dosagem">Dosagem:</label>
    <input type="text" id="dosagem" name="dosagem" value="<?= htmlspecialchars($planta['dosagem']) ?>">

    <label for="efeitos_colaterais">Efeitos Colaterais:</label>
    <textarea id="efeitos_colaterais" name="efeitos_colaterais" rows="3"><?= htmlspecialchars($planta['efeitos_colaterais']) ?></textarea>

    <label for="beneficios">Benefícios:</label>
    <textarea id="beneficios" name="beneficios" rows="3"><?= htmlspecialchars($planta['beneficios']) ?></textarea>

    <label for="maleficios">Malefícios:</label>
    <textarea id="maleficios" name="maleficios" rows="3"><?= htmlspecialchars($planta['maleficios']) ?></textarea>

    <label for="fonte">Fonte:</label>
    <input type="text" id="fonte" name="fonte" value="<?= htmlspecialchars($planta['fonte']) ?>">

    <label for="imagem">Imagem Atual:</label>
    <?php if (!empty($planta['imagem_url'])): ?>
        <div class="imagem-atual">
            <img src="../uploads/<?= htmlspecialchars($planta['imagem_url']) ?>" alt="Imagem atual" style="max-width: 200px; border-radius: 8px;">
        </div>
    <?php else: ?>
        <p>Sem imagem cadastrada.</p>
    <?php endif; ?>

    <label for="imagem">Alterar imagem (opcional):</label>
    <input type="file" id="imagem" name="imagem" accept="image/*">

    <button type="submit">Salvar alterações</button>
</form>

<a href="detalhes.php?id=<?= $planta['id_planta'] ?>">← Voltar aos detalhes</a>

</body>
</html>
