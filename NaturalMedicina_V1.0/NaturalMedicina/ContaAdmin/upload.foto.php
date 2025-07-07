<?php
session_start();
$id = $_SESSION['id_usuario'];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['foto'])) {
    $caminho = "./uploads/ {$id}.jpg";
    move_uploaded_file($_FILES['foto']['tmp_name'], $caminho);
    header("Location: indexadmin.php");
    exit;
}
?>
