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
        $sql = "INSERT INTO " . $this->tabela . " (
            nome_popular, nome_cientifico, uso_medicinal, modo_uso,
            dosagem, efeitos_colaterais, beneficios, maleficios, imagem_url, fonte
        ) VALUES (
            :nome_popular, :nome_cientifico, :uso_medicinal, :modo_uso,
            :dosagem, :efeitos_colaterais, :beneficios, :maleficios, :imagem_url, :fonte
        )";

        $stmt = $this->conn->prepare($sql);

        $stmt->bindValue(':nome_popular', $dados['nome_popular']);
        $stmt->bindValue(':nome_cientifico', $dados['nome_cientifico']);
        $stmt->bindValue(':uso_medicinal', $dados['uso_medicinal']);
        $stmt->bindValue(':modo_uso', $dados['modo_uso']);
        $stmt->bindValue(':dosagem', $dados['dosagem']);
        $stmt->bindValue(':efeitos_colaterais', $dados['efeitos_colaterais']);
        $stmt->bindValue(':beneficios', $dados['beneficios']);
        $stmt->bindValue(':maleficios', $dados['maleficios']);
        $stmt->bindValue(':imagem_url', $dados['imagem_url']);
        $stmt->bindValue(':fonte', $dados['fonte']);

        return $stmt->execute();
    }

    public function atualizar($id, $dados) {
        $sql = "UPDATE " . $this->tabela . " SET 
            nome_popular = :nome_popular,
            nome_cientifico = :nome_cientifico,
            uso_medicinal = :uso_medicinal,
            modo_uso = :modo_uso,
            dosagem = :dosagem,
            efeitos_colaterais = :efeitos_colaterais,
            beneficios = :beneficios,
            maleficios = :maleficios,
            imagem_url = :imagem_url,
            fonte = :fonte
            WHERE id = :id";

        $stmt = $this->conn->prepare($sql);

        $stmt->bindValue(':id', $id);
        $stmt->bindValue(':nome_popular', $dados['nome_popular']);
        $stmt->bindValue(':nome_cientifico', $dados['nome_cientifico']);
        $stmt->bindValue(':uso_medicinal', $dados['uso_medicinal']);
        $stmt->bindValue(':modo_uso', $dados['modo_uso']);
        $stmt->bindValue(':dosagem', $dados['dosagem']);
        $stmt->bindValue(':efeitos_colaterais', $dados['efeitos_colaterais']);
        $stmt->bindValue(':beneficios', $dados['beneficios']);
        $stmt->bindValue(':maleficios', $dados['maleficios']);
        $stmt->bindValue(':imagem_url', $dados['imagem_url']);
        $stmt->bindValue(':fonte', $dados['fonte']);

        return $stmt->execute();
    }

    public function excluir($id) {
        $stmt = $this->conn->prepare("DELETE FROM " . $this->tabela . " WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
    