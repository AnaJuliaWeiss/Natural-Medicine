<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/Planta.php';

$db = new Database();
$conn = $db->conectar();

$planta = new Planta($conn);

$nome_popular = $_POST['nome_popular'];
$nome_cientifico = $_POST['nome_cientifico'];
$uso_medicinal = $_POST['uso_medicinal'];
$modo_uso = $_POST['modo_uso'];
$dosagem = $_POST['dosagem'];
$efeitos_colaterais = $_POST['efeitos_colaterais'];
$beneficios = $_POST['beneficios'];
$maleficios = $_POST['maleficios'];
$fonte = $_POST['fonte'];

// Upload da imagem
$imagem_nome = '';
if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
    $upload_dir = __DIR__ . '/../uploads/';
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    $imagem_nome = uniqid() . '_' . basename($_FILES['imagem']['name']);
    $caminho_imagem = $upload_dir . $imagem_nome;
    move_uploaded_file($_FILES['imagem']['tmp_name'], $caminho_imagem);
}

$planta->cadastrar([
    'nome_popular' => $nome_popular,
    'nome_cientifico' => $nome_cientifico,
    'uso_medicinal' => $uso_medicinal,
    'modo_uso' => $modo_uso,
    'dosagem' => $dosagem,
    'efeitos_colaterais' => $efeitos_colaterais,
    'beneficios' => $beneficios,
    'maleficios' => $maleficios,
    'fonte' => $fonte,
    'imagem_url' => $imagem_nome
]);

header("Location: ../index.php");
exit;
