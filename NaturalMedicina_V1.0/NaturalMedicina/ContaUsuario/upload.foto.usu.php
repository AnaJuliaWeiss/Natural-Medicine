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
        mkdir($uploadDir, 0777, true); // cria a pasta, se não existir
    }

    $extensao = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
    $nomeArquivo = $idUsuario . ".jpg"; // força .jpg

    $caminhoFinal = $uploadDir . $nomeArquivo;

    // Convertemos para .jpg mesmo se vier como .png (padrão simples)
    move_uploaded_file($_FILES['foto']['tmp_name'], $caminhoFinal);

    // Redireciona de volta ao perfil
    header("Location: indexusuario.php");
    exit;
} else {
    echo "Erro ao enviar a imagem!";
}
?>
