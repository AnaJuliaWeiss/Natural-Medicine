<?php
class Planta {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function excluir($id) {
        $sql = "DELETE FROM plantas WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    // Outros métodos como buscarPorId(), etc.
     public function listarTodas() {
        $sql = "SELECT * FROM plantas";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarPorId($id) {
        $sql = "SELECT * FROM plantas WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function salvar($dados) {
        $sql = "INSERT INTO plantas (nome_popular, nome_cientifico, uso_medicinal, modo_uso, dosagem, efeitos_colaterais, beneficios, maleficios, imagem_url, referencia) 
                VALUES (:nome_popular, :nome_cientifico, :uso_medicinal, :modo_uso, :dosagem, :efeitos_colaterais, :beneficios, :maleficios, :imagem_url, :referencia)";

        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            ':nome_popular' => $dados['nome_popular'],
            ':nome_cientifico' => $dados['nome_cientifico'],
            ':uso_medicinal' => $dados['uso_medicinal'],
            ':modo_uso' => $dados['modo_uso'],
            ':dosagem' => $dados['dosagem'],
            ':efeitos_colaterais' => $dados['efeitos_colaterais'],
            ':beneficios' => $dados['beneficios'],
            ':maleficios' => $dados['maleficios'],
            ':imagem_url' => $dados['imagem_url'],
            ':referencia' => $dados['referencia']
        ]);
    }

    public function atualizar($dados) {
        $sql = "UPDATE plantas SET nome_popular = :nome_popular, nome_cientifico = :nome_cientifico, uso_medicinal = :uso_medicinal, modo_uso = :modo_uso, dosagem = :dosagem, efeitos_colaterais = :efeitos_colaterais, beneficios = :beneficios, maleficios = :maleficios, imagem_url = :imagem_url, referencia = :referencia WHERE id = :id";

        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            ':nome_popular' => $dados['nome_popular'],
            ':nome_cientifico' => $dados['nome_cientifico'],
            ':uso_medicinal' => $dados['uso_medicinal'],
            ':modo_uso' => $dados['modo_uso'],
            ':dosagem' => $dados['dosagem'],
            ':efeitos_colaterais' => $dados['efeitos_colaterais'],
            ':beneficios' => $dados['beneficios'],
            ':maleficios' => $dados['maleficios'],
            ':imagem_url' => $dados['imagem_url'],
            ':referencia' => $dados['referencia'],
            ':id' => $dados['id']
        ]);
    }
}

