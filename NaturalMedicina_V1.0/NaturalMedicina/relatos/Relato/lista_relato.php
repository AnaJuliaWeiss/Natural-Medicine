<?php
require_once("../Classes/Relato.class.php");

$lista  = Relato::listar();
$tabela = file_get_contents('listagem_relato.html');
$item   = file_get_contents('itens_listagem_relato.html');
$itens  = '';

foreach ($lista as $relato) {
    $linha = str_replace('{data_relato}', $relato->getDataRelato(), $item);
    $linha = str_replace('{descricao}', nl2br(htmlspecialchars($relato->getDescricao())), $linha);
    $linha = str_replace('{nome}', htmlspecialchars($relato->getNome()), $linha);


    // Se você já tiver nome de usuário no objeto Relato:
    if (method_exists($relato, 'getNomeUsuario') && $relato->getNomeUsuario()) {
        $nome = $relato->getNomeUsuario();
    } else {
        $nome = "Pessoa " . $relato->getIdRelato();
    }
    $linha = str_replace('{nome}', $nome, $linha);

    $itens .= $linha;
}

echo str_replace('{itens}', $itens, $tabela);
    