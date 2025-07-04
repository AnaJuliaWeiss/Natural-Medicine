<?php
require_once '../controllers/PlantaController.php';

$controller = new PlantaController();
$id = $_GET['id'] ?? null;

if ($id) {
    // Opcional: Apagar imagem antiga
    $planta = $controller->buscarPlanta($id);
    if ($planta && !empty($planta['imagem_url'])) {
        $caminhoImagem = __DIR__ . '/../uploads/' . $planta['imagem_url'];
        if (file_exists($caminhoImagem)) {
            unlink($caminhoImagem);
        }
    }

    $controller->excluirPlanta($id);
}

header('Location: ../views/pesquisa.php');
exit;
