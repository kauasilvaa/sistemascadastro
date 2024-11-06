<?php
require_once 'MVC/Controllers/EstoqueController.php';
require_once 'MVC/Models/Estoquemodels.php';

$estoqueModel = new Estoque();
$estoqueController = new EstoqueController($estoqueModel);

// Processa o formulário de cadastro
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome_produto = $_POST['produto'];
    $categoria = $_POST['categoria'];
    $data_entrada = $_POST['data_entrada'];
    $data_saida = $_POST['data_saida'];

    // Chama a função para criar o produto
    $resultado = $estoqueController->criarProduto($nome_produto, $categoria, $data_entrada, $data_saida);

    if ($resultado > 0) {
        echo "Produto cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar produto.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Controle de Estoque</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h1>Controle de Estoque</h1>
    <form method="POST" action="estoque.php">
        <label>Nome do Produto:</label>
        <input type="text" name="produto" required>

        <label>Categoria:</label>
        <input type="text" name="categoria" required>

        <label>Data de Entrada:</label>
        <input type="date" name="data_entrada" required>

        <label>Data de Saída:</label>
        <input type="date" name="data_saida">

        <input type="submit" value="Cadastrar">
    </form>
</div>
</body>
</html>
