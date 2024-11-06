<?php
require_once 'MVC/Controllers/ProcessoController.php';

$processoController = new ProcessoController();
$resultado = "";

// Verifica se é uma operação de edição ou exclusão
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['edit'])) {
        // Carregar dados do processo para edição
        $processo = $processoController->listarProcessos();
        $processo = $processoController->listarProcessoPorId($_POST['id']); // Novo método para buscar pelo ID
    } elseif (isset($_POST['delete'])) {
        // Excluir o processo
        $resultado = $processoController->deletarProcesso($_POST['id']);
    } elseif (isset($_POST['update'])) {
        // Atualizar o processo
        $resultado = $processoController->atualizarProcesso(
            $_POST['id'],
            $_POST['data_inicio'],
            $_POST['quantidade'],
            $_POST['status'],
            $_POST['localizacao']
        );
    } else {
        // Criar novo processo
        $resultado = $processoController->criarProcesso(
            $_POST['data_inicio'],
            $_POST['quantidade'],
            $_POST['status'],
            $_POST['localizacao']
        );
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Acompanhamento de Processos</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h1>Acompanhamento de Processos</h1>
    <?php if (!empty($resultado)): ?>
        <p><?= $resultado ?></p>
    <?php endif; ?>

    <form method="POST" action="processos.php">
        <input type="hidden" name="id" value="<?= isset($processo['id']) ? $processo['id'] : '' ?>">

        <label>Data de Início:</label>
        <input type="date" name="data_inicio" value="<?= isset($processo['data_inicio']) ? $processo['data_inicio'] : '' ?>" required>

        <label>Quantidade:</label>
        <input type="number" name="quantidade" value="<?= isset($processo['quantidade']) ? $processo['quantidade'] : '' ?>" required>

        <label>Status do Processo:</label>
        <input type="text" name="status" value="<?= isset($processo['status']) ? $processo['status'] : '' ?>" required>

        <label>Localização Atual:</label>
        <input type="text" name="localizacao" value="<?= isset($processo['localizacao']) ? $processo['localizacao'] : '' ?>" required>

        <input type="submit" name="<?= isset($processo) ? 'update' : 'create' ?>" value="<?= isset($processo) ? 'Atualizar' : 'Cadastrar' ?>">
    </form>
</div>
</body>
</html>
