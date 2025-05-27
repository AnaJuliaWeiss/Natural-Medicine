<?php
require_once '../config/database.php';
require_once '../models/Planta.php';

$db = new Database();
$conn = $db->conectar();
$planta = new Planta($conn);

$id = $_GET['id'] ?? null;

if (!$id) {
    echo "ID da planta não informado.";
    exit;
}

$dados = $planta->buscarPorId($id);
if (!$dados) {
    echo "Planta não encontrada.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Planta</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        form {
            max-width: 500px;
            margin: auto;
        }
        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }
        input[type="text"], textarea {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            box-sizing: border-box;
        }
        button {
            margin-top: 20px;
            padding: 10px;
            background-color: green;
            color: white;
            border: none;
            width: 100%;
            cursor: pointer;
        }
        a {
            display: block;
            text-align: center;
            margin-top: 15px;
        }
    </style>
</head>
<body>

    <h2>Editar Planta Medicinal</h2>

    <form action="../controllers/processaEditar.php" method="POST">
        <input type="hidden" name="id" value="<?= $dados['id'] ?>">

        <label>Nome Popular</label>
        <input type="text" name="nome_popular" value="<?= htmlspecialchars($dados['nome_popular']) ?>" required>

        <label>Nome Científico</label>
        <input type="text" name="nome_cientifico" value="<?= htmlspecialchars($dados['nome_cientifico']) ?>" required>

        <label>Uso Medicinal</label>
        <textarea name="uso_medicinal"><?= htmlspecialchars($dados['uso_medicinal']) ?></textarea>

        <label>Modo de Uso</label>
        <textarea name="modo_uso"><?= htmlspecialchars($dados['modo_uso']) ?></textarea>

        <label>Dosagem</label>
        <textarea name="dosagem"><?= htmlspecialchars($dados['dosagem']) ?></textarea>

        <label>Efeitos Colaterais</label>
        <textarea name="efeitos_colaterais"><?= htmlspecialchars($dados['efeitos_colaterais']) ?></textarea>

        <label>Benefícios</label>
        <textarea name="beneficios"><?= htmlspecialchars($dados['beneficios']) ?></textarea>

        <label>Malefícios</label>
        <textarea name="maleficios"><?= htmlspecialchars($dados['maleficios']) ?></textarea>

        <label>URL da Imagem</label>
        <input type="text" name="imagem_url" value="<?= htmlspecialchars($dados['imagem_url']) ?>">

        <label>Referência</label>
        <input type="text" name="referencia" value="<?= htmlspecialchars($dados['referencia']) ?>">

        <button type="submit">Salvar Alterações</button>
    </form>

    <a href="lista.php">Voltar à Lista</a>
    <a href="../controllers/processaExcluir.php?id=<?= $dados['id'] ?>" onclick="return confirm('Tem certeza que deseja excluir esta planta?')">
    <button style="background-color: red; color: white;">Excluir</button>
</a>


</body>
</html>
