<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once '../config/database.php';
require_once '../classes/PlantaClass.php';
require_once '../controllers/PlantaController.php';

$controller = new PlantaController();

$id = $_POST['id'] ?? null;
if (!$id) {
    die('ID da planta não foi enviado.');
}

$plantaAtual = $controller->buscarPlanta($id);
if (!$plantaAtual) {
    die('Planta não encontrada.');
}

$imagemPath = $plantaAtual['imagem_url'] ?? '';

// Verifica se enviou nova imagem
if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
    $nomeImagem = time() . '_' . basename($_FILES['imagem']['name']);
    $caminhoDestino = '../uploads/' . $nomeImagem;

    if (move_uploaded_file($_FILES['imagem']['tmp_name'], $caminhoDestino)) {
        // Apaga imagem antiga
        if (!empty($imagemPath)) {
            $imagemAntiga = '../uploads/' . $imagemPath;
            if (file_exists($imagemAntiga)) {
                unlink($imagemAntiga);
            }
        }
        $imagemPath = $nomeImagem;
    } else {
        die('Erro ao mover o arquivo da imagem.');
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
    'fonte' => $_POST['fonte'] ?? ''
];

$resultado = $controller->atualizarPlanta($id, $dados);

if ($resultado) {
    header("Location: ../views/detalhes.php?id=$id");
    exit;
} else {
    echo "Erro ao atualizar a planta.";
}
