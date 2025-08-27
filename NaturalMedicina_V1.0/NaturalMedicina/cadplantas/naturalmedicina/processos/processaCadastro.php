<?php
require_once '../config/database.php';
require_once '../classes/PlantaClass.php';
require_once '../controllers/PlantaController.php';

$db = new Database();
$conn = $db->getConnection();
$controller = new PlantaController();

$imagemPath = '';

if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
    $nomeImagem = time() . '_' . basename($_FILES['imagem']['name']);
    $caminhoDestino = '../uploads/' . $nomeImagem;

    if (move_uploaded_file($_FILES['imagem']['tmp_name'], $caminhoDestino)) {
        $imagemPath = $nomeImagem;
    }
}

$dados = [
    'nome_popular' => $_POST['nome_popular'] ?? '',
    'nome_cientifico' => $_POST['nome_cientifico'] ?? '',
    'uso_medicinal' => $_POST['uso_medicinal'] ?? '',
    'modo_uso' => $_POST['modo_uso'] ?? '',
    'dosagem' => $_POST['dosagem'] ?? '',
    'efeitos_colaterais' => $_POST['efeitos_colaterais'] ?? '',
    'beneficios' => $_POST['beneficios'] ?? '',
    'maleficios' => $_POST['maleficios'] ?? '',
    'imagem_url' => $imagemPath,
    'fonte' => $_POST['fonte'] ?? '',
    'categoria' => $_POST['categoria'] ?? '' // <<<< campo categoria
];

$controller->cadastrarPlanta($dados);

header('Location: ../views/pesquisa.php');
exit;
?>
