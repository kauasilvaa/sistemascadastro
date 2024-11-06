<?php
require_once 'MVC/Models/Financeiromodels.php';

class FinanceiroController {
    private $financeiroModel;

    public function __construct() {
        $this->financeiroModel = new Financeiro();
    }

        // Função para criar um novo registro financeiro
        public function criarFinanceiro($nome_cliente, $cpf_cliente, $valor_total, $data_venda)
        {
            // Chama o método do model para criar o financeiro
            $resultado = $this->financeiroModel->criarFinanceiro($nome_cliente, $cpf_cliente, $valor_total, $data_venda);
            
            if ($resultado) {
                echo "Registro financeiro criado com sucesso!";
            } else {
                echo "Erro ao criar o registro financeiro.";
            }
        }
    
        // Função para listar todos os registros financeiros
        public function listarFinanceiros()
        {
            // Chama o método do model para listar todos os registros
            $financeiros = $this->financeiroModel->listarFinanceiros();
            
            if (count($financeiros) > 0) {
                return $financeiros;
            } else {
                echo "Nenhum registro encontrado.";
                return [];
            }
        }
    
        // Função para atualizar um registro financeiro
        public function atualizarFinanceiro($id, $nome_cliente, $cpf_cliente, $valor_total, $data_venda)
        {
            // Chama o método do model para atualizar o registro financeiro
            $resultado = $this->financeiroModel->atualizarFinanceiro($id, $nome_cliente, $cpf_cliente, $valor_total, $data_venda);
            
            if ($resultado) {
                echo "Registro financeiro atualizado com sucesso!";
            } else {
                echo "Erro ao atualizar o registro financeiro.";
            }
        }
    
        // Função para deletar um registro financeiro
        public function deletarFinanceiro($id)
        {
            // Chama o método do model para deletar o registro financeiro
            $resultado = $this->financeiroModel->deletarFinanceiro($id);
            
            if ($resultado) {
                echo "Registro financeiro deletado com sucesso!";
            } else {
                echo "Erro ao deletar o registro financeiro.";
            }
        }
    }    
    
