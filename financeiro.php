<?php
require_once 'MVC/Controllers/FinanceiroController.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome_cliente = $_POST['nome_cliente'];
    $cpf_cliente = $_POST['cpf_cliente'];
    $valor_total = $_POST['valor_total'];
    $data_venda = $_POST['data_venda'];

    $controller = new FinanceiroController();
    $controller->criarFinanceiro($nome_cliente, $cpf_cliente, $valor_total, $data_venda);
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Relatório Financeiro</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h1>Relatório Financeiro</h1>
    <form method="POST" action="financeiro.php">
        <label>Nome do Cliente:</label>
        <input type="text" name="nome_cliente" required>

        <label>CPF do Cliente:</label>
        <input type="text" name="cpf_cliente" required>

        <label>Valor Total da Venda:</label>
        <input type="number" name="valor_total" required>

        <label>Data da Venda:</label>
        <input type="date" name="data_venda" required>

        <input type="submit" value="Cadastrar">
    </form>
</div>
</body>
</html>
