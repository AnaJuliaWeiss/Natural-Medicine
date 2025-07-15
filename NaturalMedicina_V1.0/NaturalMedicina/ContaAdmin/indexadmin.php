<?php
session_start();

// Verificação de acesso
if (!isset($_SESSION['tipo']) || $_SESSION['tipo'] !== 'admin') {
    header("Location: login.html");
    exit;
}

$nomeAdmin = $_SESSION['nome']; // Nome que veio do login
$idAdmin = $_SESSION['id_usuario']; // ID do admin

require_once("../Relatos/Classes/Database.class.php");
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Perfil do Administrador</title>
<!--<link rel="stylesheet" href="../css/perfils.css" /> -->
    <style>
        body* {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    .header {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  background-color: #daddd3;
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 20px 40px;         /* antes era 10px */
  box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
  z-index: 999;
  height: 100px;              /* altura fixa maior */
}

body {
  font-family: Arial, sans-serif;
  line-height: 1.6;
  background-color: #ffffff;
  color: #333;
  padding-top: 130px;        /* aumentamos esse valor para empurrar tudo pra baixo */
}

        .logo img {
            height: 150px;
           
        }

        .menu a {
            margin-left: 20px;
            text-decoration: none;
            color: #2d5e2d;
            font-weight: bold;
            font-size: 20px;
        }

        h1 {
            text-align: center;
            margin-top: 50px;
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
            <a href="../indexLogado.admins.php">Home</a>
            <a href="../sobre.html">Sobre</a>
            <a href="../logout.php">Sair</a>
        </nav>
    </header>
<br><br><br><br><br><br><br>
  

    <section class="foto-perfil">
         <img src="uploads/<?php echo htmlspecialchars($idAdmin); ?>.jpg?<?php echo time(); ?>" alt="Sua Foto de Perfil">
        <form action="upload.foto.php" method="POST" enctype="multipart/form-data">
            <input type="file" name="foto" accept="image/*">
            <button type="submit">Atualizar Foto</button>
        <h1>Olá, <?php echo htmlspecialchars($nomeAdmin); ?>!</h1>
        </form>
           </section>

    <section class="relatos">
        <h2>Planatas cadastradas pelo o Admin </h2>
        <table>
            <tr>
                <th>Planta</th>
                <th>Data</th>
                <th>Nome do admin</th>
            </tr>
            <?php
            $sql = "SELECT r.titulo, r.descricao, r.data_relato, u.nome 
                    FROM relatos r 
                    JOIN usuarios u ON r.id_usuario = u.id_usuario 
                    ORDER BY r.data_relato DESC";
            $stmt = Database::executar($sql, []);
            foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $relato) {
                echo "<tr>
                        <td>{$relato['titulo']}</td>
                        <td>{$relato['descricao']}</td>
                        <td>{$relato['data_relato']}</td>
                        <td>{$relato['nome']}</td>
                      </tr>";
            }
            ?>
        </table>
    </section>

    <section class="plantas">
        <h2>Plantas cadastradas por você</h2>
        <?php
        $sqlPlantas = "SELECT nome_popular, data_criacao 
                       FROM plantas 
                       WHERE criado_por = :id_admin 
                       ORDER BY data_criacao DESC";
        $stmtPlantas = Database::executar($sqlPlantas, [':id_admin' => $idAdmin]);
        $plantas = $stmtPlantas->fetchAll(PDO::FETCH_ASSOC);

        echo "<p>Total de plantas cadastradas: " . count($plantas) . "</p>";
        echo "<ul>";
        foreach ($plantas as $planta) {
            echo "<li><strong>{$planta['nome_popular']}</strong> — Criada em: {$planta['data_criacao']}</li>";
        }
        echo "</ul>";
        ?>
    </section>
</body>
</html>
