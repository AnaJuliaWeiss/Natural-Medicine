<?php require_once '../models/Planta.php'; ?>
<?php
$db = new PDO('mysql:host=localhost;dbname=plantas', 'root', '');
$planta = new Planta($db);
$plantas = $planta->listarTodas();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Plantas</title>
    <style>
        .card {
            border: 1px solid #ccc;
            border-radius: 10px;
            padding: 15px;
            margin: 10px;
            width: 200px;
            display: inline-block;
            text-align: center;
        }
        img {
            width: 100%;
            height: 150px;
            object-fit: cover;
        }
        .btn {
            display: inline-block;
            margin: 5px;
            padding: 8px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .add-btn {
            margin: 20px;
            padding: 10px;
            background-color: #2196F3;
        }
    </style>
</head>
<body>

<h2>Lista de Plantas Medicinais</h2>
<a href="cadastro.php" class="btn add-btn">Cadastrar Nova Planta</a>

<?php foreach ($plantas as $planta): ?>
    <div class="card">
    <img src="../uploads/<?= $planta['imagem_url'] ?>" alt="<?= $planta['nome_popular'] ?>" />
    <h3><?= $planta['nome_popular'] ?></h3>
    <a href="detalhes.php?id=<?= $planta['id'] ?>"><button>Ver Detalhes</button></a>
    <a href="editar.php?id=<?= $planta['id'] ?>"><button>Editar</button></a>
    <a href="../controllers/processaExcluir.php?id=<?= $planta['id'] ?>" onclick="return confirm('Tem certeza que deseja excluir esta planta?')">
        <button style="background-color: red; color: white;">Excluir</button>
    </a>
</div>

<?php endforeach; ?>

</body>
</html>
