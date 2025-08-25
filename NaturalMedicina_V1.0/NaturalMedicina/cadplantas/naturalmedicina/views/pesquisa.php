<?php
require_once __DIR__ . '/../controllers/PlantaController.php';

$controller = new PlantaController();

$termoBusca = isset($_GET['busca']) ? trim($_GET['busca']) : '';
$plantas = $controller->listarPlantas();

// Filtra resultados se houver termo de busca
if (!empty($termoBusca)) {
    $plantas = array_filter($plantas, function ($planta) use ($termoBusca) {
        $termo = mb_strtolower($termoBusca);
        return mb_strpos(mb_strtolower($planta['nome_popular']), $termo) !== false ||
               mb_strpos(mb_strtolower($planta['nome_cientifico']), $termo) !== false;
    });
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Ver Plantas Medicinais</title>
  <link rel="stylesheet" href="../../../css/cadplant.css">
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&family=Caladea&display=swap" rel="stylesheet">

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    /* ========= CSS novo que você pediu ========= */
    body {
      font-family: 'Caladea', serif;
      background: #ffffff;
      color: #333;
      line-height: 1.6;
      min-height: 100vh;
    }

    .container {
      max-width: 1100px;
      margin: 40px auto;
      padding: 0 1.5rem;
      width: 100%;
    }

    header.header {
      background: linear-gradient(90deg, #3a7d44, #4caf50);
      position: sticky;
      top: 0;
      z-index: 999;
      box-shadow: 0 2px 8px rgba(0,0,0,0.06);
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 15px 30px;
      flex-wrap: wrap;
      gap: 20px;
    }

    .header-inner {
      display: flex;
      justify-content: space-between;
      align-items: center;
      gap: 1rem;
      height: 80px;
      padding: 0;
    }

    .logo {
      font-family: 'Playfair Display', serif;
      font-size: 26px;
      font-weight: 600;
      color: #fff;
      display: flex;
      align-items: center;
      gap: .5rem;
    }

    nav.menu {
      display: flex;
      gap: 2rem;
      align-items: center;
    }

    nav.menu a {
      color: #fff;
      text-decoration: none;
      font-weight: 600;
      font-size: 16px;
      padding: .25rem .35rem;
      transition: color .2s ease;
    }
    nav.menu a:hover { color: #d9f7d9; }

    .btn-header {
      background: #fff;
      color: #3a7d44;
      padding: .6rem 1rem;
      border-radius: 8px;
      font-weight: 700;
      text-decoration: none;
      display: inline-block;
      transition: background .2s ease, transform .15s ease;
    }
    .btn-header:hover { background: #d9f7d9; transform: translateY(-2px); }

    /* ========= CSS antigo (mantido) ========= */
    .busca-form {
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .busca-form input[type="text"] {
      padding: 8px 12px;
      font-size: 20px;
      border-radius: 6px;
      border: none;
      width: 400px;
      outline: none;
    }

    .busca-form button {
      padding: 8px 16px;
      background-color: #2e7d32;
      border: none;
      color: white;
      font-weight: bold;
      border-radius: 6px;
      cursor: pointer;
    }

    .busca-form button:hover {
      background-color: #4caf50;
    }

    .container h2 {
      text-align: center;
      font-size: 32px;
      color: #4caf50;
      margin-bottom: 30px;
    }

    .plantas-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 30px;
    }

    .planta-card {
      background-color: white;
      border-radius: 12px;
      box-shadow: 0 4px 14px rgba(0, 0, 0, 0.08);
      overflow: hidden;
      transition: transform 0.3s, box-shadow 0.3s;
      max-width: 350px;
      width: 100%;
      margin: 0 auto;
    }
    .planta-card img {
      width: 100%;
      height: 180px;
      object-fit: cover;
    }

    .planta-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 18px rgba(0, 0, 0, 0.15);
    }

    .planta-link {
      text-decoration: none;
      color: inherit;
      display: block;
      height: 100%;
    }

    .planta-card h3 {
      font-size: 20px;
      color: #1b5e20;
      margin: 12px;
    }

    .planta-card p {
      font-size: 16px;
      color: #4caf50;
      margin: 0 12px 16px 12px;
    }

    @media (max-width: 768px) {
      header.header {
        flex-direction: column;
        align-items: center;
      }

      nav.menu {
        flex-direction: column;
        align-items: center;
        gap: 10px;
      }

      .busca-form {
        justify-content: center;
      }
    }
  </style>
</head>
<body>

  <header class="header">
    <div class="logo">Natural Medicina</div>

    <form method="GET" action="" class="busca-form">
      <input type="text" name="busca" placeholder="Buscar planta..." value="<?= htmlspecialchars($termoBusca) ?>">
      <button type="submit">Buscar</button>
    </form>

    <nav class="menu">
      <a href="../../../indexLogado.php">Home</a>
      <a href="../../../Relatos/Relato/form_cad_relato.html">Relatos</a>
      <a href="../../../ContaUsuario/indexusuario.php">Conta</a>
    </nav>
  </header>

  <div class="container">
    <h2>Plantas Medicinais</h2>

    <?php if (!isset($plantas)) $plantas = []; ?>

    <?php if (count($plantas) > 0): ?>
      <div class="plantas-grid">
        <?php foreach ($plantas as $planta): ?>
          <div class="planta-card">
            <a href="detalhes.php?id=<?= $planta['id_planta'] ?>" class="planta-link">
              <?php if (!empty($planta['imagem_url'])): ?>
                <img src="../uploads/<?= htmlspecialchars($planta['imagem_url']) ?>" alt="<?= htmlspecialchars($planta['nome_popular']) ?>">
              <?php else: ?>
                <img src="https://via.placeholder.com/240x180?text=Sem+Imagem" alt="Sem imagem">
              <?php endif; ?>
              <h3><?= htmlspecialchars($planta['nome_popular']) ?></h3>
              <p><?= htmlspecialchars($planta['nome_cientifico']) ?></p>
            </a>
          </div>
        <?php endforeach; ?>
      </div>
    <?php else: ?>
      <p style="text-align: center; margin-top: 30px;">Nenhuma planta encontrada com esse nome.</p>
    <?php endif; ?>
  </div>

</body>
</html>
