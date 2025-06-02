<?php
require_once '../config/Database.php';
require_once '../models/Planta.php';

$database = new Database();
$db = $database->getConnection();

$planta = new Planta($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Tratamento da imagem
    $imagem_url = null;
    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
        $extensao = pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION);
        $nomeArquivo = uniqid() . '.' . $extensao;
        $diretorio = '../uploads/';

        if (!is_dir($diretorio)) {
            mkdir($diretorio, 0755, true);
        }

        $caminhoCompleto = $diretorio . $nomeArquivo;
        if (move_uploaded_file($_FILES['imagem']['tmp_name'], $caminhoCompleto)) {
            $imagem_url = 'uploads/' . $nomeArquivo;
        }
    }

    // Montar array de dados para salvar
    $dados = [
        'nome_popular' => $_POST['nome_popular'] ?? '',
        'nome_cientifico' => $_POST['nome_cientifico'] ?? '',
        'uso_medicinal' => $_POST['uso_medicinal'] ?? '',
        'modo_uso' => $_POST['modo_uso'] ?? '',
        'dosagem' => $_POST['dosagem'] ?? '',
        'efeitos_colaterais' => $_POST['efeitos_colaterais'] ?? '',
        'beneficios' => $_POST['beneficios'] ?? '',
        'maleficios' => $_POST['maleficios'] ?? '',
        'imagem_url' => $imagem_url
    ];

    if ($planta->salvar($dados)) {
        header('Location: ../index.php');
        exit;
    } else {
        echo "Erro ao cadastrar a planta.";
    }
} else {
    echo "Método inválido.";
}
