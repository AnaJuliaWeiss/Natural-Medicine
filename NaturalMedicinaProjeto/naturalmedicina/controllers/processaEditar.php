<?php
require_once '../config/database.php';
require_once '../models/Planta.php';

$db = new Database();
$conn = $db->conectar();
$planta = new Planta($conn);

$dados = [
    'id' => $_POST['id'],
    'nome_popular' => $_POST['nome_popular'],
    'nome_cientifico' => $_POST['nome_cientifico'],
    'uso_medicinal' => $_POST['uso_medicinal'],
    'modo_uso' => $_POST['modo_uso'],
    'dosagem' => $_POST['dosagem'],
    'efeitos_colaterais' => $_POST['efeitos_colaterais'],
    'beneficios' => $_POST['beneficios'],
    'maleficios' => $_POST['maleficios'],
    'imagem_url' => $_POST['imagem_url'],
    'referencia' => $_POST['referencia']
];

$planta->atualizar($dados);

header('Location: ../views/lista.php');
exit;
?>