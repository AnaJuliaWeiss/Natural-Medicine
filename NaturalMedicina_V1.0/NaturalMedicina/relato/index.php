<?php
require_once("Relato.class.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_relato = $_POST['id_relato'] ?? 0;
    $titulo = $_POST['titulo'] ?? "";
    $descricao = $_POST['descricao'] ?? "";
    $data_relato = $_POST['data_relato'] ?? "";
    $id_usuario = $_POST['id_usuario'] ?? 0;
    $id_planta = $_POST['id_planta'] ?? 0;
    $acao = $_POST['acao'] ?? "";

    $relato = new Relato($id_relato, $titulo, $descricao, $data_relato, $id_usuario, $id_planta);

    if ($acao == 'salvar') {
        $resultado = ($id_relato > 0) ? $relato->alterar() : $relato->inserir();
    } elseif ($acao == 'excluir') {
        $resultado = $relato->excluir();
    }

    if ($resultado)
        header("Location: index.php");
    else
        echo "Erro ao salvar dados.";
}
elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $formulario = file_get_contents('relatos.html');

    $id_relato = $_GET['id_relato'] ?? 0;
    $resultado = Relato::listar(1, $id_relato);

    if ($resultado) {
        $relato = $resultado[0];
        $formulario = str_replace('{id_relato}', $relato->getIdRelato(), $formulario);
        $formulario = str_replace('{titulo}', $relato->getTitulo(), $formulario);
        $formulario = str_replace('{descricao}', $relato->getDescricao(), $formulario);
        $formulario = str_replace('{data_relato}', $relato->getDataRelato(), $formulario);
        $formulario = str_replace('{id_usuario}', $relato->getIdUsuario(), $formulario);
        $formulario = str_replace('{id_planta}', $relato->getIdPlanta(), $formulario);
    } else {
        $formulario = str_replace('{id_relato}', 0, $formulario);
        $formulario = str_replace('{titulo}', '', $formulario);
        $formulario = str_replace('{descricao}', '', $formulario);
        $formulario = str_replace('{data_relato}', '', $formulario);
        $formulario = str_replace('{id_usuario}', '', $formulario);
        $formulario = str_replace('{id_planta}', '', $formulario);
    }

    echo $formulario;
    include('lista_relato.php');
}
?>