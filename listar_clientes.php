<?php
require_once 'MVC/Controllers/ClienteController.php';

$clienteController = new ClienteController();
$clientes = $clienteController->listarClientes();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Processa a exclusão de um cliente
    if (isset($_POST['delete'])) {
        $clienteController->deletarCliente($_POST['id']);
        header("Location: listar_clientes.php"); // Recarrega a página para refletir as mudanças
        exit;
    }

    // Processa a atualização de um cliente
    if (isset($_POST['update'])) {
        $clienteController->atualizarCliente($_POST['id'], $_POST['nome'], $_POST['cpf'], $_POST['data_nascimento']);
        header("Location: listar_clientes.php"); // Recarrega a página para refletir as mudanças
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Clientes</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Lista de Clientes</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>CPF</th>
            <th>Data de Nascimento</th>
            <th>Ações</th>
        </tr>
        <?php foreach ($clientes as $cliente): ?>
            <tr>
                <!-- Formulário para atualização e deleção do cliente -->
                <form method="post" action="listar_clientes.php">
                    <td><?= $cliente['id'] ?></td>
                    <td><input type="text" name="nome" value="<?= htmlspecialchars($cliente['nome']) ?>"></td>
                    <td><input type="text" name="cpf" value="<?= htmlspecialchars($cliente['cpf']) ?>"></td>
                    <td><input type="date" name="data_nascimento" value="<?= htmlspecialchars($cliente['data_nascimento']) ?>"></td>
                    <td>
                        <input type="hidden" name="id" value="<?= $cliente['id'] ?>">
                        <button type="submit" name="update">Atualizar</button>
                        <button type="submit" name="delete" onclick="return confirm('Deseja deletar este cliente?')">Deletar</button>
                    </td>
                </form>
            </tr>
        <?php endforeach; ?>
    </table>
    <a href="index.php">Voltar</a>
</body>
</html>
