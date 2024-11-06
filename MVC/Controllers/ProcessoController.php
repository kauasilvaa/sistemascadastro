<?php
require_once 'MVC/Models/Processomodels.php';

class ProcessoController {
    private $processoModel;

    public function __construct() {
        $this->processoModel = new Processo();
    }

    public function criarProcesso($data_inicio, $quantidade, $status, $localizacao)
    {
        if (empty($data_inicio) || empty($quantidade) || empty($status) || empty($localizacao)) {
            return "Todos os campos são obrigatórios.";
        }

        $resultado = $this->processoModel->criarProcesso($data_inicio, $quantidade, $status, $localizacao);
        return $resultado > 0 ? "Processo criado com sucesso." : "Falha ao criar o processo.";
    }

    public function listarProcessos()
    {
        return $this->processoModel->listarProcessos();
    }

    public function atualizarProcesso($id, $data_inicio, $quantidade, $status, $localizacao)
    {
        if (empty($id) || empty($data_inicio) || empty($quantidade) || empty($status) || empty($localizacao)) {
            return "Todos os campos são obrigatórios.";
        }

        $resultado = $this->processoModel->atualizarProcesso($id, $data_inicio, $quantidade, $status, $localizacao);
        return $resultado > 0 ? "Processo atualizado com sucesso." : "Falha ao atualizar o processo.";
    }

    public function deletarProcesso($id)
    {
        if (empty($id)) {
            return "ID do processo é obrigatório.";
        }

        $resultado = $this->processoModel->deletarProcesso($id);
        return $resultado > 0 ? "Processo deletado com sucesso." : "Falha ao deletar o processo.";
    }
}
