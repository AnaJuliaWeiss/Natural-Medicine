<?php
session_start();

// Verifica se está logado e é admin
if (!isset($_SESSION['tipo']) || $_SESSION['tipo'] !== 'admin') {
    header("Location: login.php");
    exit;
    
}
if (!isset($_SESSION['tipo']) || $_SESSION['tipo'] !== 'usuario') {
    header("Location: login.php");
    exit;
    
}
?>
