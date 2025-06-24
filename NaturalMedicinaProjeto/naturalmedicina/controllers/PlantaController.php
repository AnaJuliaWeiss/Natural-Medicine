<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../classes/PlantaClass.php';

class PlantaController {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    public function listarPlantas() {
        $query = "SELECT * FROM plantas";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function cadastrarPlanta($planta) {
        $query = "INSERT INTO plantas (nome_popular, nome_cientifico, descricao, uso_medicinal, efeitos_colaterais, modo_uso, imagem_url, fonte)
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);

        return $stmt->execute([
            $planta->getNomePopular(),
            $planta->getNomeCientifico(),
            $planta->getDescricao(),
            $planta->getUsoMedicinal(),
            $planta->getEfeitosColaterais(),
            $planta->getModoUso(),
            $planta->getImagemUrl(),
            $planta->getFonte()
        ]);
    }

    public function buscarPlantaPorId($id) {
        $query = "SELECT * FROM plantas WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function excluirPlanta($id) {
        $query = "DELETE FROM plantas WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$id]);
    }
}