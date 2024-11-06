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

    // Novo método para atualizar fornecedor
    public function atualizarFornecedor($id, $nome, $telefone, $email, $cnpj)
    {
        return $this->fornecedorModel->atualizarFornecedor($id, $nome, $telefone, $email, $cnpj);
    }

    // Novo método para deletar fornecedor
    public function deletarFornecedor($id)
    {
        return $this->fornecedorModel->deletarFornecedor($id);
    }
}
?>
