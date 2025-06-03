<?php
require_once ("Database.class.php");

class Relato {
    private $id_relato;
    private $titulo;
    private $descricao; 
    private $data_relato;
    private $id_usuario;
    private $id_planta;

    // construtor da classe
    public function __construct($id_relato, $titulo, $descricao, $data_relato, $id_usuario, $id_planta) {
        $this->id_relato = $id_relato;
        $this->titulo = $titulo;
        $this->descricao = $descricao;
        $this->data_relato = $data_relato;
        $this->id_usuario = $id_usuario;
        $this->id_planta = $id_planta;
    }

    // setters
    public function setIdRelato($id_relato){
        if ($id_relato < 0)
            throw new Exception("Erro, o ID do relato deve ser maior que 0!");
        $this->id_relato = $id_relato;
    }

    public function setTitulo($titulo){
        if ($titulo == "")
            throw new Exception("Erro, o título deve ser informado!");
        $this->titulo = $titulo;
    }

    public function setDescricao($descricao){
        $this->descricao = $descricao;
    }

    public function setDataRelato($data_relato){
        $this->data_relato = $data_relato;
    }

    public function setIdUsuario($id_usuario){
        $this->id_usuario = $id_usuario;
    }

    public function setIdPlanta($id_planta){
        $this->id_planta = $id_planta;
    }

    // getters
    public function getIdRelato(): int{
        return (int) $this->id_relato;
    }

    public function getTitulo(): string{
        return $this->titulo;
    }

    public function getDescricao(): string{
        return $this->descricao;
    }

    public function getDataRelato(): string{
        return $this->data_relato;
    }

    public function getIdUsuario(): int{
        return (int) $this->id_usuario;
    }

    public function getIdPlanta(): int{
        return (int) $this->id_planta;
    }

    // método mágico para imprimir um relato
    public function __toString(): string {
        return "Relato: $this->id_relato - $this->titulo
                - Data: $this->data_relato
                - Descrição: $this->descricao
                - Usuário: $this->id_usuario
                - Planta: $this->id_planta";
    }

    // insere um relato no banco
    public function inserir(): bool {
        $sql = "INSERT INTO relatos (titulo, descricao, data_relato, id_usuario, id_planta)
                VALUES (:titulo, :descricao, :data_relato, :id_usuario, :id_planta)";
        $parametros = array(
            ':titulo' => $this->getTitulo(),
            ':descricao' => $this->getDescricao(),
            ':data_relato' => $this->getDataRelato(),
            ':id_usuario' => $this->getIdUsuario(),
            ':id_planta' => $this->getIdPlanta()
        );
        return Database::executar($sql, $parametros) == true;
    }

    public static function listar($tipo=0, $info=''): array {
        $sql = "SELECT * FROM relatos";
        switch ($tipo) {
            case 0: break;
            case 1: $sql .= " WHERE id_relato = :info ORDER BY id_relato"; break;
            case 2: $sql .= " WHERE titulo LIKE :info ORDER BY titulo"; $info = '%'.$info.'%'; break;
        }
        $parametros = array();
        if ($tipo > 0)
            $parametros = [':info' => $info];

        $comando = Database::executar($sql, $parametros);
        $relatos = [];
        while ($registro = $comando->fetch()) {
            $relato = new Relato(
                $registro['id_relato'],
                $registro['titulo'],
                $registro['descricao'],
                $registro['data_relato'],
                $registro['id_usuario'],
                $registro['id_planta']
            );
            array_push($relatos, $relato);
        }
        return $relatos;
    }

    public function alterar(): bool {
        $sql = "UPDATE relatos SET 
                    titulo = :titulo, 
                    descricao = :descricao, 
                    data_relato = :data_relato,
                    id_usuario = :id_usuario,
                    id_planta = :id_planta
                WHERE id_relato = :id_relato";
        $parametros = array(
            ':id_relato' => $this->getIdRelato(),
            ':titulo' => $this->getTitulo(),
            ':descricao' => $this->getDescricao(),
            ':data_relato' => $this->getDataRelato(),
            ':id_usuario' => $this->getIdUsuario(),
            ':id_planta' => $this->getIdPlanta()
        );
        return Database::executar($sql, $parametros) == true;
    }

    public function excluir(): bool {
        $sql = "DELETE FROM relatos WHERE id_relato = :id_relato";
        $parametros = array(':id_relato' => $this->getIdRelato());
        return Database::executar($sql, $parametros) == true;
    }
}
?>
