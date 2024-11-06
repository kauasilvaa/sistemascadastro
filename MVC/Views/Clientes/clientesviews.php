<?php
require_once '../../Controllers/ClienteController.php';

$clienteController = new ClienteController();
$clientes = $clienteController->listarClientes();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Clientes</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <h2>Clientes</h2>
    <table border="1">
        <tr><th>ID</th><th>Nome</th><th>CPF</th><th>Data de Nascimento</th></tr>
        <?php foreach ($clientes as $cliente): ?>
            <tr>
                <td><?= $cliente['id'] ?></td>
                <td><?= htmlspecialchars($cliente['nome']) ?></td>
                <td><?= htmlspecialchars($cliente['cpf']) ?></td>
                <td><?= htmlspecialchars($cliente['data_nascimento']) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <a href="../index.php">Voltar</a>
</body>
</html>
