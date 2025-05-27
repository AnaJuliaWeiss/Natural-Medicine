<?php
require 'conexao.php';

$nome = $_POST['nome_popular'];
$nome_cientifico = $_POST['nome_cientifico'];
$descricao = $_POST['descricao'];
$uso_medicinal = $_POST['uso_medicinal'];
$efeitos_colaterais = $_POST['efeitos_colaterais'];
$modo_uso = $_POST['modo_uso'];
$imagem = $_FILES['imagem']['name'];

// Salvar a imagem na pasta
$caminhoImagem = "../img/" . $imagem;
move_uploaded_file($_FILES['imagem']['tmp_name'], $caminhoImagem);

// Cadastrar no banco
$sql = "INSERT INTO plantas (nome_popular, nome_cientifico, descricao, uso_medicinal, efeitos_colaterais, modo_uso, imagem_url) 
        VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = $pdo->prepare($sql);
$stmt->execute([$nome, $nome_cientifico, $descricao, $uso_medicinal, $efeitos_colaterais, $modo_uso, $caminhoImagem]);

header("Location: ../pages/pesquisa.html");
exit;
?>
