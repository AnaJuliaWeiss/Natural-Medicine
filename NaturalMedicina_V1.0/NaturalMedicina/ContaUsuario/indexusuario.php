<?php
session_start();

// Verificação de acesso para usuário comum
if (!isset($_SESSION['tipo']) || $_SESSION['tipo'] !== 'usuario') {
    header("Location: login.html");
    exit;
}

$nomeUsuario = $_SESSION['nome'];
$idUsuario = $_SESSION['id_usuario'];

require_once("../Relatos/Classes/Database.class.php");
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Perfil do Usuário</title>
    <link rel="stylesheet" href="../css/perfils.css" />
    <style>
        body {
            background-color: #f4f9f4;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .header {
            background-color: #daddd3;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 15px 30px;
        }

        .logo img {
            height: 60px;
            width: auto;
        }

        .menu a {
            margin-left: 20px;
            text-decoration: none;
            color: #2d5e2d;
            font-weight: bold;
            font-size: 16px;
        }

        h1 {
            text-align: center;
            margin-top: 30px;
            color: #2d5e2d;
        }

        section {
            background: #ffffff;
            margin: 30px auto;
            padding: 20px;
            border-radius: 10px;
            max-width: 800px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        .foto-perfil {
            text-align: center;
        }

        .foto-perfil img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
            margin-top: 10px;
            border: 3px solid #2d5e2d;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th, td {
            padding: 10px 15px;
            border: 1px solid #ccc;
            text-align: left;
        }

        th {
            background-color: #2d5e2d;
            color: white;
        }

        .plantas ul {
            list-style: none;
            padding-left: 0;
        }

        .plantas li {
            padding: 5px 0;
            border-bottom: 1px solid #ddd;
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="logo">
            <img src="../assets/favicon/logo.png" alt="Logo Natural Medicina">
        </div>
        <nav class="menu">
            <a href="../Relatos/Relato/form_cad_relato.html">Relatos</a>
            <a href="../cadplantas/naturalmedicina/views/pesquisa.php">Plantas</a>
            <a href="../indexLogado.php">Home</a>
            <a href="../logout.php">Sair</a>
        </nav>
    </header>

    <h1>Olá, <?php echo htmlspecialchars($nomeUsuario); ?>!</h1>

    <section class="foto-perfil">
        <form action="upload.foto.usu.php" method="POST" enctype="multipart/form-data">
            <input type="file" name="foto" accept="image/*">
            <button type="submit">Atualizar Foto</button>
        </form>
     <img src="uploads/<?php echo htmlspecialchars($idUsuario); ?>.jpg?<?php echo time(); ?>" alt="Sua Foto de Perfil">
 </section>
  

    <section class="plantas">
    <h2>🌿 Frase para Inspirar</h2>
    <p style="text-align: center; font-style: italic; font-size: 20px; color: #2d5e2d; margin-top: 20px;">
        “Assim como as plantas, precisamos de tempo, paciência e cuidado para florescer.” 🌼
    </p>
</section>

</body>
</html>
