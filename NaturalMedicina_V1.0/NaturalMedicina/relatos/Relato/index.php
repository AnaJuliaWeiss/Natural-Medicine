<?php
require_once("../Classes/Relato.class.php");

$mensagem = ""; // para feedback

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_relato = $_POST['id_relato'] ?? 0;
    $descricao = $_POST['descricao'] ?? "";
    $data_relato = $_POST['data_relato'] ?? "";
    $acao = $_POST['acao'] ?? "";
    $nome = $_POST['nome'] ?? "";

    $relato = new Relato($id_relato, $nome, $descricao, $data_relato);

    if ($acao == 'salvar') {
        $resultado = ($id_relato > 0) ? $relato->alterar() : $relato->inserir();
        $mensagem = $resultado 
            ? "<p style='color:green;'>✅ Relato salvo com sucesso!</p>" 
            : "<p style='color:red;'>❌ Erro ao salvar relato!</p>";
    } elseif ($acao == 'excluir') {
        $resultado = $relato->excluir();
        $mensagem = $resultado 
            ? "<p style='color:green;'>🗑️ Relato excluído com sucesso!</p>" 
            : "<p style='color:red;'>❌ Erro ao excluir relato!</p>";
    }
}

// --- sempre carrega o formulário
$formulario = file_get_contents('form_cad_relato.html');

$id_relato = $_GET['id_relato'] ?? 0;
$resultado = ($id_relato > 0) ? Relato::listar(1, $id_relato) : [];

if ($resultado) {
    $relato = $resultado[0];
    $formulario = str_replace('{id_relato}', $relato->getIdRelato(), $formulario);
    $formulario = str_replace('{descricao}', $relato->getDescricao(), $formulario);
    $formulario = str_replace('{data_relato}', $relato->getDataRelato(), $formulario);
    $formulario = str_replace('{nome}', $relato->getNome(), $formulario);

} else {
    $formulario = str_replace('{id_relato}', 0, $formulario);
    $formulario = str_replace('{descricao}', '', $formulario);
    $formulario = str_replace('{data_relato}', '', $formulario);
    $formulario = str_replace('{nome}', '', $formulario);

}

// mostra formulário
echo $formulario;



// mostra lista de relatos em cards
echo "<h2 style='text-align:center; color:#2e7d32; margin:30px 0;'>Relatos enviados</h2>";
include('lista_relato.php');
?>
