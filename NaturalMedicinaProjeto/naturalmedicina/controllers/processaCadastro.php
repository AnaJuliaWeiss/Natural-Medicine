<?php
require_once '../config/database.php';
require_once '../models/Planta.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $db = new Database();
    $conn = $db->conectar();
    $planta = new Planta($conn);

    // Upload da imagem
    $imagemNome = '';
    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = '../uploads/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        $imagemTmp = $_FILES['imagem']['tmp_name'];
        $imagemNome = uniqid() . '_' . basename($_FILES['imagem']['name']);
        $imagemCaminho = $uploadDir . $imagemNome;

        if (!move_uploaded_file($imagemTmp, $imagemCaminho)) {
            die("Erro ao fazer upload da imagem.");
        }
    }

    // Dados do formulário
    $dados = [
        'nome_popular' => $_POST['nome_popular'],
        'nome_cientifico' => $_POST['nome_cientifico'],
        'uso_medicinal' => $_POST['uso_medicinal'],
        'modo_uso' => $_POST['modo_uso'],
        'dosagem' => $_POST['dosagem'],
        'efeitos_colaterais' => $_POST['efeitos_colaterais'],
        'beneficios' => $_POST['beneficios'],
        'maleficios' => $_POST['maleficios'],
        'imagem_url' => $imagemNome, // Apenas o nome do arquivo
        'fonte' => $_POST['fonte']
    ];

    $planta->salvar($dados);

    header('Location: ../views/lista.php');
    exit;
}
?>
