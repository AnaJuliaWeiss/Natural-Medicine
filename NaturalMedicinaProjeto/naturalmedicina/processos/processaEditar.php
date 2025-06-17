<?php
require_once '../controllers/PlantaController.php';

$controller = new PlantaController();

$id = $_POST['id'] ?? null;
$dados = [
    'nome_popular' => $_POST['nome_popular'] ?? '',
    'nome_cientifico' => $_POST['nome_cientifico'] ?? '',
    'uso_medicinal' => $_POST['uso_medicinal'] ?? '',
    'modo_uso' => $_POST['modo_uso'] ?? '',
    'dosagem' => $_POST['dosagem'] ?? '',
    'efeitos_colaterais' => $_POST['efeitos_colaterais'] ?? '',
    'beneficios' => $_POST['beneficios'] ?? '',
    'maleficios' => $_POST['maleficios'] ?? '',
    'imagem_url' => $_POST['imagem_url'] ?? '',
    'fonte' => $_POST['fonte'] ?? ''
];

if ($id) {
    $controller->editar($id, $dados);
}
header('Location: ../views/pesquisa.php');
exit;