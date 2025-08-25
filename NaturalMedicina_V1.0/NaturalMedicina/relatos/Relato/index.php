<?php
require_once("../Classes/Relato.class.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_relato = $_POST['id_relato'] ?? 0;
    $descricao = $_POST['descricao'] ?? "";
    $data_relato = $_POST['data_relato'] ?? "";
    $acao = $_POST['acao'] ?? "";

    $relato = new Relato($id_relato, $descricao, $data_relato);

    if ($acao == 'salvar') {
        $resultado = ($id_relato > 0) ? $relato->alterar() : $relato->inserir();
    } elseif ($acao == 'excluir') {
        $resultado = $relato->excluir();
    }
}

// --- sempre carrega o formulário
$formulario = file_get_contents('form_cad_relato.html');

$id_relato = $_GET['id_relato'] ?? 0;
$resultado = Relato::listar(1, $id_relato);

if ($resultado) {
    $relato = $resultado[0];
    $formulario = str_replace('{id_relato}', $relato->getIdRelato(), $formulario);
    $formulario = str_replace('{descricao}', $relato->getDescricao(), $formulario);
    $formulario = str_replace('{data_relato}', $relato->getDataRelato(), $formulario);
} else {
    $formulario = str_replace('{id_relato}', 0, $formulario);
    $formulario = str_replace('{descricao}', '', $formulario);
    $formulario = str_replace('{data_relato}', '', $formulario);
}

// mostra formulário
echo $formulario;

// mostra lista de relatos logo abaixo
include('lista_relato.php');
?>
