<?php
require_once 'MVC/Controllers/FornecedorController.php';
require_once 'MVC/Models/Fornecedormodels.php';

$fornecedorModel = new Fornecedor();
$fornecedorController = new FornecedorController($fornecedorModel);

// Processa o formulário de cadastro
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $cnpj = $_POST['cnpj'];

    // Chama a função para criar o fornecedor
    $resultado = $fornecedorController->criarFornecedor($nome, $telefone, $email, $cnpj);

    if ($resultado > 0) {
        echo "Fornecedor cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar fornecedor.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Fornecedores</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h1>Cadastro de Fornecedores</h1>
    <form method="POST" action="fornecedores.php">
        <label>Nome:</label>
        <input type="text" name="nome" required>

        <label>Telefone:</label>
        <input type="text" name="telefone" required>

        <label>Email:</label>
        <input type="email" name="email" required>

        <label>CNPJ:</label>
        <input type="text" name="cnpj" required>

        <input type="submit" value="Cadastrar">
    </form>
</div>
</body>
</html>
