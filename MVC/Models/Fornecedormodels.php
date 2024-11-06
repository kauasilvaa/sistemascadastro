<?php
require_once 'db.php';

class Fornecedor {
    private $conn;
    private $table_name = "fornecedores";

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // Método para criar um novo fornecedor
    public function criarFornecedor($nome, $telefone, $email, $cnpj)
    {
        $sql = "INSERT INTO fornecedores (nome, telefone, email, cnpj) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$nome, $telefone, $email, $cnpj]);

        return $stmt->rowCount();
    }

    // Método para listar todos os fornecedores
    public function listarTodos()
    {
        $sql = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function atualizarProduto($id, $nome_produto, $categoria, $data_entrada, $data_saida)
    {
        $sql = "UPDATE estoque SET nome_produto = ?, categoria = ?, data_entrada = ?, data_saida = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$nome_produto, $categoria, $data_entrada, $data_saida, $id]);
    
        return $stmt->rowCount();
    }
    
    public function deletarProduto($id)
    {
        $sql = "DELETE FROM estoque WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
    
        return $stmt->rowCount();
    }
    
}
?>
