<?php
require_once __DIR__ . '/../models/Planta.php';
require_once __DIR__ . '/../config/database.php';

$db = new Database();
$conn = $db->conectar();

$planta = new Planta($conn);
$plantas = $planta->listarTodas();

require_once __DIR__ . '/../views/lista.php';
