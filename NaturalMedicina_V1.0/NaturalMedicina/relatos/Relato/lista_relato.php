<?php
require_once("../Classes/Relato.class.php");

$lista = Relato::listar();
$tabela = file_get_contents('listagem_relato.html');
$item = file_get_contents('itens_listagem_relato.html');
$itens = '';

foreach ($lista as $relato) {
    $linha = str_replace('{id_relato}', $relato->getIdRelato(), $item);
    $linha = str_replace('{titulo}', $relato->getTitulo(), $linha);
    $linha = str_replace('{data_relato}', $relato->getDataRelato(), $linha);
    $linha = str_replace('{descricao}', $relato->getDescricao(), $linha);
    $linha = str_replace('{id_usuario}', $relato->getIdUsuario(), $linha);
    $linha = str_replace('{id_planta}', $relato->getIdPlanta(), $linha);
    $itens .= $linha;
}

$tabela = str_replace('{itens}', $itens, $tabela);
echo $tabela;
?>

?>