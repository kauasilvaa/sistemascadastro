<?php
require_once 'MVC/Models/FuncionarioModels.php';

class FuncionarioController {
    private $funcionarioModel;

    public function __construct() {
        $this->funcionarioModel = new Funcionario();
    }

    public function criarFuncionario($nome_completo, $cargo, $email, $telefone) {
        return $this->funcionarioModel->criarFuncionario($nome_completo, $cargo, $email, $telefone)
            ? "Funcionário cadastrado com sucesso!"
            : "Erro ao cadastrar funcionário.";
    }

    public function listarFuncionarios() {
        return $this->funcionarioModel->listarFuncionarios();
    }

    public function atualizarFuncionario($id, $nome_completo, $cargo, $email, $telefone) {
        return $this->funcionarioModel->atualizarFuncionario($id, $nome_completo, $cargo, $email, $telefone)
            ? "Funcionário atualizado com sucesso!"
            : "Erro ao atualizar funcionário.";
    }

    public function deletarFuncionario($id) {
        return $this->funcionarioModel->deletarFuncionario($id)
            ? "Funcionário deletado com sucesso!"
            : "Erro ao deletar funcionário.";
    }
}
