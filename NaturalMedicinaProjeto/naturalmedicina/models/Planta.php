<?php
class Planta {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function cadastrar($dados) {
        $sql = "INSERT INTO plantas 
        (nome_popular, nome_cientifico, uso_medicinal, modo_uso, dosagem, efeitos_colaterais, beneficios, maleficios, fonte, imagem_url) 
        VALUES 
        (:nome_popular, :nome_cientifico, :uso_medicinal, :modo_uso, :dosagem, :efeitos_colaterais, :beneficios, :maleficios, :fonte, :imagem_url)";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':nome_popular' => $dados['nome_popular'],
            ':nome_cientifico' => $dados['nome_cientifico'],
            ':uso_medicinal' => $dados['uso_medicinal'],
            ':modo_uso' => $dados['modo_uso'],
            ':dosagem' => $dados['dosagem'],
            ':efeitos_colaterais' => $dados['efeitos_colaterais'],
            ':beneficios' => $dados['beneficios'],
            ':maleficios' => $dados['maleficios'],
            ':fonte' => $dados['fonte'],
            ':imagem_url' => $dados['imagem_url']
        ]);
    }

    public function listarTodas() {
        $sql = "SELECT * FROM plantas ORDER BY id DESC";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
