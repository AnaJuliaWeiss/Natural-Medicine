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

    <link rel="stylesheet" href="../css/index_usu_adm.css">
    <style>
  

/* ========= Títulos ========= */
h1, h2 {
  text-align: center;
  color: #2d5e2d;
  margin-bottom: 20px;
  letter-spacing: 0.5px;
}

/* ========= Seções ========= */
section {
  background: #ffffff;
  margin: 30px auto;
  padding: 30px 25px;
  border-radius: 18px;
  max-width: 800px;
  box-shadow: 0 6px 20px rgba(0,0,0,0.08);
  transition: box-shadow 0.3s ease, transform 0.2s ease;
}
section:hover {
  box-shadow: 0 10px 30px rgba(0,0,0,0.12);
  transform: translateY(-2px);
}

/* ========= Foto do Perfil ========= */
.foto-perfil {
  text-align: center;
}
.foto-perfil img {
  width: 150px;
  height: 150px;
  object-fit: cover;
  border-radius: 50%;
  margin-bottom: 15px;
  border: 4px solid #2d5e2d;
  box-shadow: 0 4px 14px rgba(0,0,0,0.12);
  transition: transform 0.2s ease, box-shadow 0.2s ease;
}
.foto-perfil img:hover {
  transform: scale(1.07);
  box-shadow: 0 6px 16px rgba(0,0,0,0.15);
}

.foto-perfil button {
  margin-top: 12px;
  padding: 10px 20px;
  border: none;
  background-color: #2d5e2d;
  color: #fff;
  font-weight: 600;
  border-radius: 10px;
  cursor: pointer;
  transition: background 0.2s ease, transform 0.2s ease;
}
.foto-perfil button:hover {
  background-color: #256a25;
  transform: translateY(-2px);
}

/* ========= Tabelas ========= */
table {
  width: 100%;
  border-collapse: collapse;
  margin-top: 20px;
}
th, td {
  padding: 14px 16px;
  border-bottom: 1px solid #e0e0e0;
  text-align: left;
  font-size: 14px;
}
th {
  background-color: #2d5e2d;
  color: #fff;
  font-weight: 600;
  text-transform: uppercase;
}
tr:hover td {
  background: #f4faf4;
}

/* ========= Lista de plantas ========= */
.plantas ul {
  list-style: none;
  padding-left: 0;
  margin-top: 12px;
}
.plantas li {
  padding: 10px 14px;
  margin-bottom: 8px;
  border-radius: 10px;
  background-color: #f0fdf0;
  border-left: 4px solid #2d5e2d;
  transition: background 0.2s ease, transform 0.2s ease;
}
.plantas li:hover {
  background-color: #e8f7e8;
  transform: translateX(2px);
}
    </style>
</head>
<body>
     <header class="header">
    <div class="container header-inner">
      <div class="logo">🌿 Natural Medicina</div>

        <nav class="menu">
          <a href="../Relatos/Relato/form_cad_relato.html">Relatos</a>
          <a href="../cadplantas/naturalmedicina/views/ver_plantas.php">Plantas</a>
          <a href="../indexLogado.admins.php">Home</a>
          <a href="../sobre.html">Sobre</a>
          <a href="../logout.php">Sair</a>
        </nav>
      </div>
    </header>

    <section class="foto-perfil">
         <img src="uploads/<?php echo htmlspecialchars($idAdmin); ?>.jpg?<?php echo time(); ?>" alt="Sua Foto de Perfil">
        <form action="upload.foto.php" method="POST" enctype="multipart/form-data">
            <input type="file" name="foto" accept="image/*">
            <button type="submit">Atualizar Foto</button>
        </form>
        <h1>Olá, <?php echo htmlspecialchars($nomeAdmin); ?>!</h1>
    </section>

    <section class="relatos">
        <h2>Relatos cadastrados</h2>
        <table>
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
