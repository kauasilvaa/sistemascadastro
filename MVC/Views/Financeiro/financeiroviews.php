<?php
require_once '../../Controllers/FinanceiroController.php';

$financeiroController = new FinanceiroController();
$vendas = $financeiroController->listarFinanceiros();
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
        <tr><th>ID</th><th>Nome do Cliente</th><th>CPF</th><th>Valor Total</th><th>Data da Venda</th></tr>
        <?php foreach ($vendas as $venda): ?>
            <tr>
                <td><?= $venda['id'] ?></td>
                <td><?= htmlspecialchars($venda['nome_cliente']) ?></td>
                <td><?= htmlspecialchars($venda['cpf_cliente']) ?></td>
                <td><?= htmlspecialchars($venda['valor_total']) ?></td>
                <td><?= htmlspecialchars($venda['data_venda']) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <a href="../index.php">Voltar</a>
</body>
</html>
