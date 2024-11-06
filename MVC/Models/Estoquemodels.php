<?php
require_once 'db.php';

class Estoque {
    private $conn;
    private $table_name = "estoque";

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function criarProduto($nome_produto, $categoria, $data_entrada, $data_saida)
    {
        $sql = "INSERT INTO estoque (nome_produto, categoria, data_entrada, data_saida) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$nome_produto, $categoria, $data_entrada, $data_saida]);

        return $stmt->rowCount();
    }

    public function listarTodos()
    {
        $sql = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
