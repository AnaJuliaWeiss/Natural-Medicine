<?php
require_once '../config/database.php';
require_once '../models/Planta.php';

$db = new Database();
$conn = $db->conectar();

$planta = new Planta($conn);
$id = $_GET['id'];

$planta->excluir($id);
header("Location: ../views/lista.php");
?>
