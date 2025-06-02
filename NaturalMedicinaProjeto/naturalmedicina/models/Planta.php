<?php
class Planta {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Buscar todas as plantas
    public function buscarTodas() {
        $query = "SELECT * FROM plantas ORDER BY nome_popular ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Buscar planta por ID
    public function buscarPorId($id) {
        $query = "SELECT * FROM plantas WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Salvar nova planta
    public function salvar($dados) {
        $query = "INSERT INTO plantas (nome_popular, nome_cientifico, uso_medicinal, modo_uso, dosagem, efeitos_colaterais, beneficios, maleficios, imagem_url) 
                  VALUES (:nome_popular, :nome_cientifico, :uso_medicinal, :modo_uso, :dosagem, :efeitos_colaterais, :beneficios, :maleficios, :imagem_url)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nome_popular', $dados['nome_popular']);
        $stmt->bindParam(':nome_cientifico', $dados['nome_cientifico']);
        $stmt->bindParam(':uso_medicinal', $dados['uso_medicinal']);
        $stmt->bindParam(':modo_uso', $dados['modo_uso']);
        $stmt->bindParam(':dosagem', $dados['dosagem']);
        $stmt->bindParam(':efeitos_colaterais', $dados['efeitos_colaterais']);
        $stmt->bindParam(':beneficios', $dados['beneficios']);
        $stmt->bindParam(':maleficios', $dados['maleficios']);
        $stmt->bindParam(':imagem_url', $dados['imagem_url']);
        return $stmt->execute();
    }

    // Atualizar planta
    public function atualizar($id, $dados) {
        $query = "UPDATE plantas SET 
                    nome_popular = :nome_popular,
                    nome_cientifico = :nome_cientifico,
                    uso_medicinal = :uso_medicinal,
                    modo_uso = :modo_uso,
                    dosagem = :dosagem,
                    efeitos_colaterais = :efeitos_colaterais,
                    beneficios = :beneficios,
                    maleficios = :maleficios,
                    imagem_url = :imagem_url
                  WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nome_popular', $dados['nome_popular']);
        $stmt->bindParam(':nome_cientifico', $dados['nome_cientifico']);
        $stmt->bindParam(':uso_medicinal', $dados['uso_medicinal']);
        $stmt->bindParam(':modo_uso', $dados['modo_uso']);
        $stmt->bindParam(':dosagem', $dados['dosagem']);
        $stmt->bindParam(':efeitos_colaterais', $dados['efeitos_colaterais']);
        $stmt->bindParam(':beneficios', $dados['beneficios']);
        $stmt->bindParam(':maleficios', $dados['maleficios']);
        $stmt->bindParam(':imagem_url', $dados['imagem_url']);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    // Excluir planta
    public function excluir($id) {
        $query = "DELETE FROM plantas WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
