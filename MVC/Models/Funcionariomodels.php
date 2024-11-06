<?php
require_once 'db.php';

class Funcionario {
    private $conn;
    private $table_name = "funcionarios";

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function criarFuncionario($nome_completo, $cargo, $email, $telefone) {
        $sql = "INSERT INTO funcionarios (nome_completo, cargo, email, telefone) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$nome_completo, $cargo, $email, $telefone]);
    }

    public function listarFuncionarios() {
        $sql = "SELECT * FROM funcionarios";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function atualizarFuncionario($id, $nome_completo, $cargo, $email, $telefone) {
        $sql = "UPDATE funcionarios SET nome_completo = ?, cargo = ?, email = ?, telefone = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$nome_completo, $cargo, $email, $telefone, $id]);
    }

    public function deletarFuncionario($id) {
        $sql = "DELETE FROM funcionarios WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$id]);
    }
}
