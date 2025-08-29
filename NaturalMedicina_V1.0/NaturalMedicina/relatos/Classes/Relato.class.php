<?php
require_once ("Database.class.php");

class Relato {
    private $id_relato;
    private $nome;
    private $descricao; 
    private $data_relato;

    // construtor da classe
    public function __construct($id_relato, $nome, $descricao, $data_relato) {
        $this->id_relato = $id_relato;
        $this->nome = $nome;
        $this->descricao = $descricao;
        $this->data_relato = $data_relato;
    }

    // setters
    public function setIdRelato($id_relato){
        if ($id_relato < 0)
            throw new Exception("Erro, o ID do relato deve ser maior que 0!");
        $this->id_relato = $id_relato;
    }

    public function setNome($nome){ 
        $this->nome = $nome; 
    }

    public function setDescricao($descricao){
        $this->descricao = $descricao;
    }

    public function setDataRelato($data_relato){
        $this->data_relato = $data_relato;
    }

    // getters
    public function getIdRelato(): int{
        return (int) $this->id_relato;
    }

    public function getNome(): ?string {
    return $this->nome;
    }


    public function getDescricao(): string{
        return $this->descricao;
    }

    public function getDataRelato(): string{
        return $this->data_relato;
    }

    // método mágico para imprimir um relato
    public function __toString(): string {
        return "Relato: $this->id_relato
                - Nome: $this->nome
                - Data: $this->data_relato
                - Descrição: $this->descricao";
    }

    // insere um relato no banco
    public function inserir(): bool {
        $sql = "INSERT INTO relatos (nome, descricao, data_relato)
                VALUES (:nome, :descricao, :data_relato)";
        $parametros = array(
            ':nome' => $this->getNome(),
            ':descricao' => $this->getDescricao(),
            ':data_relato' => $this->getDataRelato()
        );
        return Database::executar($sql, $parametros) == true;
    }

    public static function listar($tipo=0, $info=''): array {
        $sql = "SELECT * FROM relatos";
        switch ($tipo) {
            case 0: break;
            case 1: $sql .= " WHERE id_relato = :info ORDER BY id_relato"; break;
            case 2: $sql .= " WHERE nome LIKE :info ORDER BY nome"; $info = '%'.$info.'%'; break;
        }
        $parametros = array();
        if ($tipo > 0)
            $parametros = [':info' => $info];

        $comando = Database::executar($sql, $parametros);
        $relatos = [];
        while ($registro = $comando->fetch()) {
            $relato = new Relato(
                $registro['id_relato'],
                $registro['nome'],
                $registro['descricao'],
                $registro['data_relato']
            );
            array_push($relatos, $relato);
        }
        return $relatos;
    }

    public function alterar(): bool {
        $sql = "UPDATE relatos SET 
                    descricao = :descricao, 
                    data_relato = :data_relato, 
                    nome = :nome
                WHERE id_relato = :id_relato";
        $parametros = array(
            ':id_relato' => $this->getIdRelato(),
            ':descricao' => $this->getDescricao(),
            ':data_relato' => $this->getDataRelato(),
            ':nome' => $this->getNome(),
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
