<?php
session_start();

$id = $_SESSION['id_usuario'];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['foto'])) {

    // Caminho da pasta
    $pastaUploads = __DIR__ . "./uploads/";

    // Verifica se a pasta "uploads" existe, se não, cria
    if (!is_dir($pastaUploads)) {
        mkdir($pastaUploads, 0777, true); // cria com permissão total
    }

    // Caminho completo do arquivo com nome do admin (ex: uploads/3.jpg)
    $caminho = $pastaUploads . "/{$id}.jpg";

    // Move a foto para a pasta
    if (move_uploaded_file($_FILES['foto']['tmp_name'], $caminho)) {
        header("Location: indexadmin.php");
        exit;
    } else {
        echo "Erro ao salvar a imagem.";
    }
}
?>
