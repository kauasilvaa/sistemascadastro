<?php
require_once 'MVC/Controllers/FornecedorController.php';

$fornecedorController = new FornecedorController();
$fornecedores = $fornecedorController->listarFornecedores();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Processa a exclusão de um fornecedor
    if (isset($_POST['delete'])) {
        $fornecedorController->deletarFornecedor($_POST['id']);
        header("Location: listar_fornecedores.php"); // Recarrega a página para refletir as mudanças
        exit;
    }

    // Processa a atualização de um fornecedor
    if (isset($_POST['update'])) {
        $fornecedorController->atualizarFornecedor($_POST['id'], $_POST['nome'], $_POST['telefone'], $_POST['email'], $_POST['cnpj']);
        header("Location: listar_fornecedores.php"); // Recarrega a página para refletir as mudanças
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Fornecedores</title>
    <link rel="stylesheet" href="style.css">
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
            <th>Ações</th>
        </tr>
        <?php foreach ($fornecedores as $fornecedor): ?>
            <tr>
                <!-- Formulário para atualização -->
                <form method="post" action="listar_fornecedores.php">
                    <td><?= $fornecedor['id'] ?></td>
                    <td><input type="text" name="nome" value="<?= htmlspecialchars($fornecedor['nome']) ?>"></td>
                    <td><input type="text" name="telefone" value="<?= htmlspecialchars($fornecedor['telefone']) ?>"></td>
                    <td><input type="email" name="email" value="<?= htmlspecialchars($fornecedor['email']) ?>"></td>
                    <td><input type="text" name="cnpj" value="<?= htmlspecialchars($fornecedor['cnpj']) ?>"></td>
                    <td>
                        <input type="hidden" name="id" value="<?= $fornecedor['id'] ?>">
                        <button type="submit" name="update">Atualizar</button>
                    </td>
                </form>

                <!-- Formulário para exclusão -->
                <form method="post" action="listar_fornecedores.php">
                    <input type="hidden" name="id" value="<?= $fornecedor['id'] ?>">
                    <td><button type="submit" name="delete" onclick="return confirm('Deseja deletar este fornecedor?')">Deletar</button></td>
                </form>
            </tr>
        <?php endforeach; ?>
    </table>
    <a href="listagens.php">Voltar</a>
</body>
</html>
