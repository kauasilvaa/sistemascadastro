<?php
require_once 'MVC/Controllers/FuncionarioController.php';

$funcionarioController = new FuncionarioController();
$funcionarios = $funcionarioController->listarFuncionarios();

// Processamento de formulário
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['atualizar'])) {
        // Atualizar funcionário
        $id = $_POST['id'];
        $nome_completo = $_POST['nome_completo'];
        $cargo = $_POST['cargo'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $mensagem = $funcionarioController->atualizarFuncionario($id, $nome_completo, $cargo, $email, $telefone);
    } elseif (isset($_POST['deletar'])) {
        // Deletar funcionário
        $id = $_POST['id'];
        $mensagem = $funcionarioController->deletarFuncionario($id);
    }
    // Atualizar a lista de funcionários após a operação
    $funcionarios = $funcionarioController->listarFuncionarios();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Funcionários</title>
    <link rel="stylesheet" href="style.css"> <!-- Altere o caminho conforme necessário -->
</head>
<body>
    <h2>Lista de Funcionários</h2>
    <?php if (isset($mensagem)) echo "<p>$mensagem</p>"; ?>
    
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome Completo</th>
            <th>Cargo</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>Ações</th>
        </tr>
        <?php foreach ($funcionarios as $funcionario): ?>
            <tr>
                <form method="POST" action="listar_funcionarios.php">
                    <td>
                        <?= $funcionario['id'] ?>
                        <input type="hidden" name="id" value="<?= $funcionario['id'] ?>">
                    </td>
                    <td><input type="text" name="nome_completo" value="<?= htmlspecialchars($funcionario['nome_completo']) ?>"></td>
                    <td><input type="text" name="cargo" value="<?= htmlspecialchars($funcionario['cargo']) ?>"></td>
                    <td><input type="email" name="email" value="<?= htmlspecialchars($funcionario['email']) ?>"></td>
                    <td><input type="text" name="telefone" value="<?= htmlspecialchars($funcionario['telefone']) ?>"></td>
                    <td>
                        <button type="submit" name="atualizar">Atualizar</button>
                        <button type="submit" name="deletar" onclick="return confirm('Tem certeza que deseja deletar este funcionário?')">Deletar</button>
                    </td>
                </form>
            </tr>
        <?php endforeach; ?>
    </table>
    <a href="listagens.php">Voltar</a>
</body>
</html>
