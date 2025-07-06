<?php
require_once(__DIR__ . '/../config/config.inc.php');
require_once(__DIR__ . '/../Relatos/Classes/Database.class.php');

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $confirmar_senha = $_POST['confirmar_senha'];
    
    // Recebe o tipo vindo do form (radio), ou assume 'usuario' se não existir
    $tipo = $_POST['tipo'] ?? 'usuario';
   



    if ($senha !== $confirmar_senha) {
        die("As senhas não coincidem.");
    }

    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuarios (nome, email, senha, tipo) VALUES (:nome, :email, :senha, :tipo)";
    $params = [
        ':nome' => $nome,
        ':email' => $email,
        ':senha' => $senha_hash,
        ':tipo' => $tipo
    ];

    try {
        $resultado = Database::executar($sql, $params);
        if ($resultado->rowCount() > 0) {
            // Salva dados na sessão
            $_SESSION['nome'] = $nome;
            $_SESSION['tipo'] = $tipo;

            // Redireciona conforme tipo
            if ($tipo === 'admin') {
                header("Location: ../indexLogado.admins.php");
            } else {
                header("Location: ../indexLogado.php");
            }
            exit;
        } else {
            echo "Erro ao cadastrar.";
        }
    } catch (PDOException $e) {
        echo "Erro no banco: " . $e->getMessage();
    }
} else {
    header("Location: ../cadastro.html");
    exit;
}

