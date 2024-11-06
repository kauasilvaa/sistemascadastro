<?php
require_once 'MVC/Controllers/FornecedorController.php';
require_once 'MVC/Models/Fornecedormodels.php';

$fornecedorModel = new Fornecedor();
$fornecedorController = new FornecedorController($fornecedorModel);
$fornecedores = $fornecedorController->listarFornecedores();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Fornecedores</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <h2>Fornecedores</h2>
    <table border="1">
        <tr><th>ID</th><th>Nome</th><th>Telefone</th><th>Email</th><th>CNPJ</th></tr>
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
    <a href="../index.php">Voltar</a>
</body>
</html>
