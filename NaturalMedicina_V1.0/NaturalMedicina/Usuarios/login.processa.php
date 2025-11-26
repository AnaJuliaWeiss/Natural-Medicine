<?php
require_once("../Relatos/Classes/Database.class.php");
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['password'];

    $sql = "SELECT * FROM usuarios WHERE email = :email LIMIT 1";
    $params = [':email' => $email];
    $stmt = Database::executar($sql, $params);
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario && password_verify($senha, $usuario['senha'])) {
       
        $_SESSION['id_usuario'] = $usuario['id_usuario'];
        $_SESSION['nome'] = $usuario['nome'];
        $_SESSION['tipo'] = $usuario['tipo'];

       
        if ($usuario['tipo'] === 'admin') {
            header("Location: ../indexLogado.admins.php");
        } else {
            header("Location: ../indexLogado.php");
        }
        exit;
    } else {
        echo "E-mail ou senha inválidos.";
           
       
    }
}
?>
