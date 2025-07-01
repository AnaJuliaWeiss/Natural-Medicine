<?php
require_once '../config/database.php';
require_once '../classes/PlantaClass.php';
require_once '../controllers/PlantaController.php';

$db = new Database();
$conn = $db->getConnection();
$plantaModel = new Planta($conn);
$controller = new PlantaController();

// Upload da imagem
$imagemPath = '';
if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
    $nomeImagem = basename($_FILES['imagem']['name']);
    $caminhoDestino = '../uploads/' . $nomeImagem;

    if (move_uploaded_file($_FILES['imagem']['tmp_name'], $caminhoDestino)) {
        $imagemPath = 'uploads/' . $nomeImagem;
    }
}

// Coletar os dados do formulário
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
    'fonte' => $_POST['fonte'] ?? ''
];

// Cadastrar a planta usando o método correto
$controller->cadastrarPlanta($dados);

// Redirecionar para a página de pesquisa
header('Location: ../views/pesquisa.php');
exit;
