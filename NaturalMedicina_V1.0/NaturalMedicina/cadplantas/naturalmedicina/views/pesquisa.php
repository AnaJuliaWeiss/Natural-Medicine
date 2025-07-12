<?php
require_once __DIR__ . '/../controllers/PlantaController.php';

$controller = new PlantaController();
$plantas = $controller->listarPlantas();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Plantas Medicinais</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e6f9e6;
            margin: 0;
            padding: 20px;
        }
        h2 {
            text-align: center;
            color: #2e7d32;
        }
        .container {
            max-width: 1000px;
            margin: 0 auto;
        }
        .plantas-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
            gap: 20px;
            margin-top: 30px;
        }
        .planta-card {
            background-color: #fff;
            border: 1px solid #c8e6c9;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
            padding: 16px;
            text-align: center;
            transition: 0.3s ease;
        }
        .planta-card:hover {
            transform: scale(1.02);
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        .planta-card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 10px;
        }
        .planta-card h3 {
            margin: 10px 0 5px;
            color: #388e3c;
        }
        .btn-cadastrar {
            display: inline-block;
            padding: 10px 20px;
            background-color: #43a047;
            color: white;
            border: none;
            border-radius: 8px;
            text-decoration: none;
            margin-top: 20px;
            transition: background-color 0.3s ease;
        }
        .btn-cadastrar:hover {
            background-color: #2e7d32;
        }
        .top-bar {
            text-align: right;
            margin-bottom: 10px;
        }
        a.planta-link {
            text-decoration: none;
            color: inherit;
            display: block;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Lista de Plantas Medicinais</h2>

    <div class="top-bar">
        <center><a href="cadastro.php" class="btn-cadastrar">Cadastrar nova planta</a></center>
    </div>

    <?php if (!isset($plantas)) $plantas = []; ?>

    <?php if (count($plantas) > 0): ?>
        <div class="plantas-grid">
            <?php foreach ($plantas as $planta): ?>
                <div class="planta-card">
                    <a href="detalhes.php?id=<?= $planta['id_planta'] ?>" class="planta-link">
                        <?php if (!empty($planta['imagem_url'])): ?>
                            <img src="../uploads/<?= htmlspecialchars($planta['imagem_url']) ?>" alt="<?= htmlspecialchars($planta['nome_popular']) ?>">
                        <?php else: ?>
                            <img src="https://via.placeholder.com/240x180?text=Sem+Imagem" alt="Sem imagem">
                        <?php endif; ?>
                        <h3><?= htmlspecialchars($planta['nome_popular']) ?></h3>
                        <p><em><?= htmlspecialchars($planta['nome_cientifico']) ?></em></p>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p style="text-align: center; margin-top: 30px;">Nenhuma planta cadastrada ainda.</p>
    <?php endif; ?>
</div>

</body>
</html>

