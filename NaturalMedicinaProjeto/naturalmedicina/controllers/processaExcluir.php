<?php
require_once '../config/database.php';
require_once '../models/Planta.php';

if (!isset($_GET['id'])) {
    echo "ID da planta não informado.";
    exit;
}

$db = new Database();
$conn = $db->getConnection();
$plantaModel = new Planta($conn);

$id = $_GET['id'];

if ($plantaModel->excluir($id)) {
    header("Location: ../index.php");
    exit;
} else {
    echo "Erro ao excluir a planta.";
}
