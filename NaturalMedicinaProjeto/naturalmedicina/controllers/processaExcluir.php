<?php
require_once '../config/database.php';
require_once '../models/Planta.php';

if (isset($_GET['id'])) {
    $db = new Database();
    $conn = $db->conectar();
    $planta = new Planta($conn);

    $id = $_GET['id'];

    // Buscar dados da planta para excluir a imagem
    $dados = $planta->buscarPorId($id);
    if ($dados && !empty($dados['imagem_url'])) {
        $caminhoImagem = '../uploads/' . $dados['imagem_url'];
        if (file_exists($caminhoImagem)) {
            unlink($caminhoImagem);
        }
    }

    $planta->excluir($id);
}

header('Location: ../views/lista.php');
exit;
