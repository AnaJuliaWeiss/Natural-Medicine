<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../classes/PlantaClass.php';

class PlantaController {
    private $conn;
    private $planta;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->getConnection();
        $this->planta = new Planta($this->conn); // <- isso estava faltando em cima!
    }

    public function listarPlantas() {
        return $this->planta->listarTodas();
    }

    public function buscarPlanta($id) {
        return $this->planta->buscarPorId($id);
    }

    public function cadastrarPlanta($dados) {
        return $this->planta->salvar($dados);
    }

    public function atualizarPlanta($id, $dados) {
        return $this->planta->atualizar($id, $dados);
    }

    public function excluirPlanta($id) {
        return $this->planta->excluir($id);
    }
}
