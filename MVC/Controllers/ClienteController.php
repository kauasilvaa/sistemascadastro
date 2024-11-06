<?php
require_once 'MVC/Models/Clientemodels.php';

class ClienteController
{
    private $clienteModel;

    public function __construct()
    {
        $this->clienteModel = new Cliente();
    }

    public function criarCliente($nome, $cpf, $data_nascimento)
    {
        $resultado = $this->clienteModel->criarCliente($nome, $cpf, $data_nascimento);

        if ($resultado > 0) {
            echo "Cliente cadastrado com sucesso!";
        } else {
            echo "Erro ao cadastrar cliente.";
        }
    }

    public function listarClientes()
    {
        $clientes = $this->clienteModel->listarTodos();

        if (!empty($clientes)) {
            return $clientes;
        } else {
            echo "Nenhum cliente encontrado.";
            return [];
        }
    }

    public function atualizarCliente($id, $nome, $cpf, $data_nascimento)
    {
        $resultado = $this->clienteModel->atualizarCliente($id, $nome, $cpf, $data_nascimento);

        if ($resultado > 0) {
            echo "Cliente atualizado com sucesso!";
        } else {
            echo "Erro ao atualizar cliente ou nenhum dado foi alterado.";
        }
    }

    public function deletarCliente($id)
    {
        $resultado = $this->clienteModel->deletarCliente($id);

        if ($resultado > 0) {
            echo "Cliente deletado com sucesso!";
        } else {
            echo "Erro ao deletar cliente.";
        }
    }
}
?>
