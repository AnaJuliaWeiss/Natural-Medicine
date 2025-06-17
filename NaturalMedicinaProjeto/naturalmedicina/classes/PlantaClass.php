<?php
class Planta {
    private $conn;

    public $id;
    public $nome_popular;
    public $nome_cientifico;
    public $uso_medicinal;
    public $modo_uso;
    public $dosagem;
    public $efeitos_colaterais;
    public $beneficios;
    public $maleficios;
    public $imagem_url;
    public $fonte;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function listarTodas() {
        $sql = "SELECT * FROM plantas ORDER BY nome_popular ASC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarPorId($id) {
        $sql = "SELECT * FROM plantas WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function salvar($dados) {
        $sql = "INSERT INTO plantas
            (nome_popular, nome_cientifico, uso_medicinal, modo_uso, dosagem,
             efeitos_colaterais, beneficios, maleficios, imagem_url, fonte)
          VALUES
            (:nome_popular, :nome_cientifico, :uso_medicinal, :modo_uso, :dosagem,
             :efeitos_colaterais, :beneficios, :maleficios, :imagem_url, :fonte)";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute($dados);
        return $this->conn->lastInsertId();
    }

    public function atualizar($id, $dados) {
        $dados['id'] = $id;
        $sql = "UPDATE plantas SET
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
        return $stmt->execute($dados);
    }

    public function excluir($id) {
        $sql = "DELETE FROM plantas WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}