<?php
require_once 'config/Database.php';
require_once 'models/Planta.php';

$database = new Database();
$db = $database->getConnection();

$planta = new Planta($db);
$plantas = $planta->buscarTodas();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <title>Lista de Plantas Medicinais</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 900px; margin: 20px auto; }
        h1 { text-align: center; }
        .container-cards {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }
        .card {
            width: 220px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 2px 2px 5px rgba(0,0,0,0.1);
            overflow: hidden;
            text-align: center;
            cursor: pointer;
            transition: transform 0.2s;
            background-color: white;
            text-decoration: none;
            color: black;
        }
        .card:hover {
            transform: scale(1.05);
            box-shadow: 3px 4px 10px rgba(0,0,0,0.2);
        }
        .card img {
            width: 100%;
            height: 140px;
            object-fit: cover;
        }
        .card h3 {
            padding: 10px 5px;
            font-size: 18px;
        }
        .btn-cadastrar {
            display: block;
            max-width: 220px;
            margin: 20px auto;
            background-color: #2d89ef;
            color: white;
            text-align: center;
            padding: 12px 0;
            border-radius: 6px;
            text-decoration: none;
            font-weight: bold;
        }
        .btn-cadastrar:hover {
            background-color: #1b5fbd;
        }
    </style>
</head>
<body>

<h1>Plantas Medicinais Cadastradas</h1>

<a href="views/cadastro.php" class="btn-cadastrar">Cadastrar Nova Planta</a>

<div class="container-cards">
    <?php if ($plantas && count($plantas) > 0): ?>
        <?php foreach ($plantas as $p): ?>
            <a href="views/detalhes.php?id=<?= $p['id'] ?>" class="card">
                <?php if (!empty($p['imagem_url'])): ?>
                    <img src="<?= htmlspecialchars($p['imagem_url']) ?>" alt="Imagem da planta <?= htmlspecialchars($p['nome_popular']) ?>">
                <?php else: ?>
                    <img src="images/default-plant.jpg" alt="Imagem padrão">
                <?php endif; ?>
                <h3><?= htmlspecialchars($p['nome_popular']) ?></h3>
            </a>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Nenhuma planta cadastrada.</p>
    <?php endif; ?>
</div>

</body>
</html>
