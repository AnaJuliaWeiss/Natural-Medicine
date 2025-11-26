<?php
require_once("../Relatos/Classes/Database.class.php"); 

class Usuario {
    private $nome;
    private $email;
    private $senha;
    private $tipo;

    public function __construct($nome, $email, $senha, $tipo = 'usuario') {
        $this->nome = $nome;
        $this->email = $email;
      
        $this->senha = password_hash($senha, PASSWORD_DEFAULT);
        $this->tipo = $tipo;
    }

    public function cadastrar() {
        $sql = "INSERT INTO usuario (nome, email, senha, tipo) VALUES (:nome, :email, :senha, :tipo)";
        $parametros = [
            ':nome' => $this->nome,
            ':email' => $this->email,
            ':senha' => $this->senha,
            ':tipo' => $this->tipo
        ];

        try {
            $resultado = Database::executar($sql, $parametros);
            return $resultado->rowCount() > 0;
        } catch (PDOException $e) {
            echo "Erro ao cadastrar: " . $e->getMessage();
            return false;
        }
    }

    public function getTipo() {
        return $this->tipo;
    }
}
?>
