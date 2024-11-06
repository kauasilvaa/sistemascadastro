<?php
require_once 'db.php';

class Fornecedor {
    private $conn;
    private $table_name = "fornecedores";

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function criarFornecedor($nome, $telefone, $email, $cnpj)
    {
        $sql = "INSERT INTO fornecedores (nome, telefone, email, cnpj) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$nome, $telefone, $email, $cnpj]);

        return $stmt->rowCount();
    }

    public function listarTodos()
    {
        $sql = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function atualizarFornecedor($id, $nome, $telefone, $email, $cnpj)
    {
        $sql = "UPDATE fornecedores SET nome = ?, telefone = ?, email = ?, cnpj = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$nome, $telefone, $email, $cnpj, $id]);

        return $stmt->rowCount();
    }

    public function deletarFornecedor($id)
    {
        $sql = "DELETE FROM fornecedores WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);

        return $stmt->rowCount();
    }
}
?>
