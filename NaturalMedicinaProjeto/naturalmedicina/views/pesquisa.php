<?php
require_once '../models/Planta.php';
require_once '../config/database.php';

$db = new Database();
$conn = $db->getConnection();
$plantaModel = new Planta($conn);
$plantas = $plantaModel->buscarTodas();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Pesquisa de Plantas Medicinais</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        h1 {
            text-align: center;
        }
        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }
        .card {
            border: 1px solid #ddd;
            border-radius: 10px;
            width: 220px;
            margin: 15px;
            text-align: center;
            padding: 10px;
            transition: box-shadow 0.3s;
            background-color: #f9f9f9;
        }
        .card:hover {
            box-shadow: 0 0 12px rgba(0,0,0,0.2);
        }
        .card img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            border-radius: 6px;
        }
        .card h3 {
            margin: 10px 0 5px;
            font-size: 18px;
        }
        .link {
            text-decoration: none;
            color: #333;
        }
    </style>
</head>
<body>

    <h1>Plantas Cadastradas</h1>

    <div class="container">
        <?php if (cou
