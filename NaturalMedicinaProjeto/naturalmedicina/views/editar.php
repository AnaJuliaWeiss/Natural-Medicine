<?php
require_once '../config/database.php';
require_once '../models/Planta.php';

$db = new Database();
$conn = $db->getConnection();
$plantaModel = new Planta($conn);

if (!isset($_GET['id'])) {
    echo "ID da planta não especificado.";
    exit;
}

$planta = $plantaModel->buscarPorId($_GET['id']);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Planta</title>
</head>
<body>
    <h2>Editar Planta Medicinal</h2>
    <form action="../controllers/processaEditar.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $planta['id']; ?>">

        <label>Nome Popular:</label>
        <input type="text" name="nome_popular" value="<?php echo $planta['nome_popular']; ?>"><br>

        <label>Nome Científico:</label>
        <input type="text" name="nome_cientifico" value="<?php echo $planta['nome_cientifico']; ?>"><br>

        <label>Uso Medicinal:</label>
        <textarea name="uso_medicinal"><?php echo $planta['uso_medicinal']; ?></textarea><br>

        <label>Modo de Uso:</label>
        <textarea name="modo_uso"><?php echo $planta['modo_uso']; ?></textarea><br>

        <label>Dosagem:</label>
        <textarea name="dosagem"><?php echo $planta['dosagem']; ?></textarea><br>

        <label>Efeitos Colaterais:</label>
        <textarea name="efeitos_colaterais"><?php echo $planta['efeitos_colaterais']; ?></textarea><br>

        <label>Benefícios:</label>
        <textarea name="beneficios"><?php echo $planta['beneficios']; ?></textarea><br>

        <label>Malefícios:</label>
        <textarea name="maleficios"><?php echo $planta['maleficios']; ?></textarea><br>

        <label>Fonte:</label>
        <input type="text" name="fonte" value="<?php echo $planta['fonte']; ?>"><br>

        <label>Imagem:</label>
        <input type="file" name="imagem"><br>

        <button type="submit">Salvar Alterações</button>
    </form>
</body>
</html>
