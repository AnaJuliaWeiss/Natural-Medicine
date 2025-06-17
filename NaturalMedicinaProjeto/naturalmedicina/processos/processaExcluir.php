<?php
require_once '../controllers/PlantaController.php';

$controller = new PlantaController();
$id = $_GET['id'] ?? null;
if ($id) {
    $controller->excluir($id);
}
header('Location: ../views/pesquisa.php');
exit;