<?php
require_once 'MVC/Models/Fornecedormodels.php';

class FornecedorController
{
    private $fornecedorModel;

    public function __construct($fornecedorModel = null)
    {
        $this->fornecedorModel = $fornecedorModel ?: new Fornecedor();
    }

    public function criarFornecedor($nome, $telefone, $email, $cnpj)
    {
        return $this->fornecedorModel->criarFornecedor($nome, $telefone, $email, $cnpj);
    }

    public function listarFornecedores()
    {
        return $this->fornecedorModel->listarTodos();
    }
}
?>
