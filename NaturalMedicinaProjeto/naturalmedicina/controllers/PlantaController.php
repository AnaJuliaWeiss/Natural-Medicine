<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../classes/PlantaClass.php';

class PlantaController {
    private $planta;

    public function __construct() {
        $db = new Database();
        $this->planta = new Planta($db->getConnection());
    }

    public function listar() {
        return $this->planta->listarTodas();
    }

    public function buscar($id) {
        return $this->planta->buscarPorId($id);
    }

    public function cadastrar($dados) {
        return $this->planta->salvar($dados);
    }

    public function editar($id, $dados) {
        return $this->planta->atualizar($id, $dados);
    }

    public function excluir($id) {
        return $this->planta->excluir($id);
    }
}
