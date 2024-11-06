<?php
require_once 'db.php';

class Processo {
    private $conn;
    private $table_name = "processos";

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    
        public function criarProcesso($data_inicio, $quantidade, $status, $localizacao)
        {
            $sql = "INSERT INTO processos (data_inicio, quantidade, status, localizacao) VALUES (?, ?, ?, ?)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$data_inicio, $quantidade, $status, $localizacao]);
    
            return $stmt->rowCount();
        }
    
        public function listarProcessos()
        {
            $sql = "SELECT * FROM processos";
            $stmt = $this->conn->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    
        public function atualizarProcesso($id, $data_inicio, $quantidade, $status, $localizacao)
        {
            $sql = "UPDATE processos SET data_inicio = ?, quantidade = ?, status = ?, localizacao = ? WHERE id = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$data_inicio, $quantidade, $status, $localizacao, $id]);
    
            return $stmt->rowCount();
        }
    
        public function deletarProcesso($id)
        {
            $sql = "DELETE FROM processos WHERE id = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$id]);
    
            return $stmt->rowCount();
        }    

    public function listarTodos() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
