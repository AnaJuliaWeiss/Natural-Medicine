<?php
require '../php/conexao.php';
$id = $_GET['id'];
$planta = $pdo->query("SELECT * FROM plantas WHERE id_planta = $id")->fetch(PDO::FETCH_ASSOC);
?>

<h1><?= $planta['nome_popular'] ?></h1>
<img src="<?= $planta['imagem_url'] ?>" alt="<?= $planta['nome_popular'] ?>">
<p><strong>Nome Científico:</strong> <?= $planta['nome_cientifico'] ?></p>
<p><strong>Descrição:</strong> <?= $planta['descricao'] ?></p>
<p><strong>Uso Medicinal:</strong> <?= $planta['uso_medicinal'] ?></p>
<p><strong>Efeitos Colaterais:</strong> <?= $planta['efeitos_colaterais'] ?></p>
<p><strong>Modo de Uso:</strong> <?= $planta['modo_uso'] ?></p>
