<?php
require_once 'db.php';


class Financeiro {
    private $conn;
    private $table_name = "financeiros"; // Alteração do nome da tabela

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function criarFinanceiro($nome_cliente, $cpf_cliente, $valor_total, $data_venda)
    {
        $sql = "INSERT INTO financeiros (nome_cliente, cpf_cliente, valor_total, data_venda) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$nome_cliente, $cpf_cliente, $valor_total, $data_venda]);

        return $stmt->rowCount();
    }
    
    public function listarFinanceiros() {
        $sql = "SELECT * FROM financeiro";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function atualizarFinanceiro($id, $nome_cliente, $cpf_cliente, $valor_total, $data_venda) {
        $sql = "UPDATE financeiro SET nome_cliente = ?, cpf_cliente = ?, valor_total = ?, data_venda = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$nome_cliente, $cpf_cliente, $valor_total, $data_venda, $id]);
        return $stmt->rowCount();
    }

    public function deletarFinanceiro($id) {
        $sql = "DELETE FROM financeiro WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->rowCount();
    }
}
