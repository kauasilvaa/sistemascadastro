<?php
require_once 'MVC/Models/Estoquemodels.php';

class EstoqueController {
    private $estoqueModel;

    public function __construct($estoqueModel = null) {
        $this->estoqueModel = $estoqueModel ?: new Estoque();
    }

    public function criarProduto($nome_produto, $categoria, $data_entrada, $data_saida)
    {
        return $this->estoqueModel->criarProduto($nome_produto, $categoria, $data_entrada, $data_saida);
    }

    public function listarProdutos() {
        return $this->estoqueModel->listarTodos();
    }
}
?>
