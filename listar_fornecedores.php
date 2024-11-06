<?php
require_once 'MVC/Controllers/FornecedorController.php';

$fornecedorController = new FornecedorController();
$fornecedores = $fornecedorController->listarFornecedores();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Fornecedores</title>
    <link rel="stylesheet" href="style.css"> <!-- Altere o caminho conforme necessário -->
</head>
<body>
    <h2>Lista de Fornecedores</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Telefone</th>
            <th>Email</th>
            <th>CNPJ</th>
        </tr>
        <?php foreach ($fornecedores as $fornecedor): ?>
            <tr>
                <td><?= $fornecedor['id'] ?></td>
                <td><?= htmlspecialchars($fornecedor['nome']) ?></td>
                <td><?= htmlspecialchars($fornecedor['telefone']) ?></td>
                <td><?= htmlspecialchars($fornecedor['email']) ?></td>
                <td><?= htmlspecialchars($fornecedor['cnpj']) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <a href="listagens.php">Voltar</a>
</body>
</html>
