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
    <link rel="stylesheet" href="css/perfil.css" />
</head>
<style>
    body {
    font-family: Arial, sans-serif;
    background-color: #f5f5f5;
    padding: 20px;
    margin: 0;
    color: #333;
}

h1 {
    color: #2d572c;
    font-size: 28px;
}

section {
    background-color: #fff;
    padding: 20px;
    margin-top: 25px;
    border-radius: 8px;
    box-shadow: 0 0 10px #ccc;
}

.foto-perfil {
    text-align: center;
}

.foto-perfil img {
    width: 150px;
    height: 150px;
    object-fit: cover;
    border-radius: 50%;
    border: 2px solid #2d572c;
    margin-top: 10px;
}

input[type="file"] {
    margin-top: 10px;
}

button {
    padding: 8px 16px;
    background-color: #2d572c;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

button:hover {
    background-color: #3c733a;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 15px;
}

table th, table td {
    border: 1px solid #ccc;
    padding: 8px;
    text-align: left;
}

table th {
    background-color: #2d572c;
    color: white;
}

</style>
<body>
    <h1>Bem-vindo, <?php echo htmlspecialchars($nomeAdmin); ?>!</h1>

    <!-- Foto de perfil -->
    <section class="foto-perfil">
        <form action="upload.foto.php" method="POST" enctype="multipart/form-data">
            <input type="file" name="foto" accept="image/*">
            <button type="submit">Atualizar Foto</button>
        </form>
      <img src="./uploads/?php echo $idAdmin; ?>.jpg" alt="Sua Foto de Perfil" width="150">
  </section>

    <section class="relatos">
        <h2>Relatos enviados pelos usuários</h2>
        <table border="1">
            <tr>
                <th>Título</th>
                <th>Descrição</th>
                <th>Data</th>
                <th>Usuário</th>
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
