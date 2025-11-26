<?php
session_start();

if (!isset($_SESSION['id_usuario'])) {
    header("Location: login.html");
    exit;
}

$idUsuario = $_SESSION['id_usuario'];

if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
    $uploadDir = './uploads/';
    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true); 
    }

    $extensao = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
    $nomeArquivo = $idUsuario . ".jpg"; 

    $caminhoFinal = $uploadDir . $nomeArquivo;

    
    move_uploaded_file($_FILES['foto']['tmp_name'], $caminhoFinal);

   
    header("Location: indexusuario.php");
    exit;
} else {
    echo "Erro ao enviar a imagem!";
}
?>
