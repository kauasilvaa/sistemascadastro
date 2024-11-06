<?php
require_once 'MVC/Controllers/FinanceiroController.php';

$financeiroController = new FinanceiroController();
$vendas = $financeiroController->listarFinanceiros();

// Processamento de formulário para atualização e exclusão
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['atualizar'])) {
        // Atualizar venda
        $id = $_POST['id'];
        $nome_cliente = $_POST['nome_cliente'];
        $cpf_cliente = $_POST['cpf_cliente'];
        $valor_total = $_POST['valor_total'];
        $data_venda = $_POST['data_venda'];
        $financeiroController->atualizarFinanceiro($id, $nome_cliente, $cpf_cliente, $valor_total, $data_venda);
    } elseif (isset($_POST['deletar'])) {
        // Deletar venda
        $id = $_POST['id'];
        $financeiroController->deletarFinanceiro($id);
    }
    // Atualizar a lista de vendas após a operação
    $vendas = $financeiroController->listarFinanceiros();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Relatório Financeiro</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <h2>Relatório Financeiro</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome do Cliente</th>
            <th>CPF</th>
            <th>Valor Total</th>
            <th>Data da Venda</th>
            <th>Ações</th>
        </tr>
        <?php foreach ($vendas as $venda): ?>
            <tr>
                <form method="POST" action="listar_financeiro.php">
                    <td><?= $venda['id'] ?>
                        <input type="hidden" name="id" value="<?= $venda['id'] ?>">
                    </td>
                    <td><input type="text" name="nome_cliente" value="<?= htmlspecialchars($venda['nome_cliente']) ?>"></td>
                    <td><input type="text" name="cpf_cliente" value="<?= htmlspecialchars($venda['cpf_cliente']) ?>"></td>
                    <td><input type="number" step="0.01" name="valor_total" value="<?= htmlspecialchars($venda['valor_total']) ?>"></td>
                    <td><input type="date" name="data_venda" value="<?= htmlspecialchars($venda['data_venda']) ?>"></td>
                    <td>
                        <button type="submit" name="atualizar">Atualizar</button>
                        <button type="submit" name="deletar" onclick="return confirm('Tem certeza que deseja deletar este registro?')">Deletar</button>
                    </td>
                </form>
            </tr>
        <?php endforeach; ?>
    </table>
    <a href="../index.php">Voltar</a>
</body>
</html>
