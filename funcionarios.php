<?php
require_once 'MVC/Controllers/FuncionarioController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome_completo = $_POST['nome_completo'];
    $cargo = $_POST['cargo'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];

    $funcionarioController = new FuncionarioController();
    echo $funcionarioController->criarFuncionario($nome_completo, $cargo, $email, $telefone);
}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Gestão de Funcionários</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h1>Gestão de Funcionários</h1>
    <form method="POST" action="funcionarios.php">
        <label>Nome Completo:</label>
        <input type="text" name="nome_completo" required>

        <label>Cargo:</label>
        <input type="text" name="cargo" required>

        <label>Email:</label>
        <input type="email" name="email" required>

        <label>Telefone de Contato:</label>
        <input type="text" name="telefone" required>

        <input type="submit" value="Cadastrar">
    </form>
</div>
</body>
</html>
