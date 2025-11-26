<?php
session_start();

$id = $_SESSION['id_usuario'];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['foto'])) {

    
    $pastaUploads = __DIR__ . "./uploads/";

    
    if (!is_dir($pastaUploads)) {
        mkdir($pastaUploads, 0777, true); 
    }

    
    $caminho = $pastaUploads . "/{$id}.jpg";

   
    if (move_uploaded_file($_FILES['foto']['tmp_name'], $caminho)) {
        header("Location: indexadmin.php");
        exit;
    } else {
        echo "Erro ao salvar a imagem.";
    }
}
?>
