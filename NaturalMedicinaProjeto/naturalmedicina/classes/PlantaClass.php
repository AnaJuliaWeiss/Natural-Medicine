<?php
class Planta {
    private $conn;
    private $tabela = "plantas";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function listarTodas() {
        $query = "SELECT * FROM " . $this->tabela . " ORDER BY nome_popular";
        return $this->conn->query($query)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarPorId($id) {
        $stmt = $this->conn->prepare("SELECT * FROM " . $this->tabela . " WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function salvar($dados) {
        $sql = "INSERT INTO " . $this->tabela . " (nome_popular, nome_cientifico, uso_medicinal, modo_uso, dosagem, efeitos_colaterais, beneficios, maleficios, imagem_url, fonte)
                VALUES (:nome_popular, :nome_cientifico, :uso_medicinal, :modo_uso, :dosagem, :efeitos_colaterais, :beneficios, :maleficios, :imagem_url, :fonte)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute($dados);
    }

    public function atualizar($id, $dados) {
        $sql = "UPDATE " . $this->tabela . " SET nome_popular = :nome_popular, nome_cientifico = :nome_cientifico, uso_medicinal = :uso_medicinal, modo_uso = :modo_uso, dosagem = :dosagem, efeitos_colaterais = :efeitos_colaterais, beneficios = :beneficios, maleficios = :maleficios, imagem_url = :imagem_url, fonte = :fonte WHERE id = :id";
        $dados['id'] = $id;
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute($dados);
    }

    public function excluir($id) {
        $stmt = $this->conn->prepare("DELETE FROM " . $this->tabela . " WHERE id = ?");
        return $stmt->execute([$id]);
    }
}