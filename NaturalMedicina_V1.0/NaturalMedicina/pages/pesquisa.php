<?php
require '../php/conexao.php';
$plantas = $pdo->query("SELECT * FROM plantas")->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container">
    <?php foreach ($plantas as $planta): ?>
        <div class="planta">
            <a href="planta.php?id=<?= $planta['id_planta'] ?>">
                <img src="<?= $planta['imagem_url'] ?>" alt="<?= $planta['nome_popular'] ?>">
                <p><?= $planta['nome_popular'] ?></p>
            </a>
        </div>
    <?php endforeach; ?>
</div>
