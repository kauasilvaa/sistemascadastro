<?php
require_once 'MVC/Controllers/EstoqueController.php';
require_once 'MVC/Models/Estoquemodels.php';

$estoqueModel = new Estoque();
$estoqueController = new EstoqueController($estoqueModel);

// Processa o formulário de cadastro, atualização ou exclusão
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    $id = $_POST['id'] ?? null;
    $nome_produto = $_POST['produto'] ?? '';
    $categoria = $_POST['categoria'] ?? '';
    $data_entrada = $_POST['data_entrada'] ?? '';
    $data_saida = $_POST['data_saida'] ?? '';

    if ($action === 'create') {
        // Chama a função para criar o produto
        $resultado = $estoqueController->criarProduto($nome_produto, $categoria, $data_entrada, $data_saida);
        echo $resultado > 0 ? "Produto cadastrado com sucesso!" : "Erro ao cadastrar produto.";
    } elseif ($action === 'update') {
        // Chama a função para atualizar o produto
        $resultado = $estoqueController->atualizarProduto($id, $nome_produto, $categoria, $data_entrada, $data_saida);
        echo $resultado > 0 ? "Produto atualizado com sucesso!" : "Erro ao atualizar produto.";
    } elseif ($action === 'delete') {
        // Chama a função para deletar o produto
        $resultado = $estoqueController->deletarProduto($id);
        echo $resultado > 0 ? "Produto deletado com sucesso!" : "Erro ao deletar produto.";
    }
}

// Carrega a lista de produtos
$produtos = $estoqueController->listarProdutos();
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
    
    <!-- Formulário de cadastro -->
    <form method="POST" action="estoque.php">
        <input type="hidden" name="action" value="create">
        
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

    <!-- Tabela de produtos com opções de atualizar e deletar -->
    <h2>Lista de Produtos</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome do Produto</th>
            <th>Categoria</th>
            <th>Data de Entrada</th>
            <th>Data de Saída</th>
            <th>Ações</th>
        </tr>
        <?php foreach ($produtos as $produto): ?>
            <tr>
                <form method="POST" action="estoque.php">
                    <td><?= htmlspecialchars($produto['id']) ?></td>
                    <td><input type="text" name="produto" value="<?= htmlspecialchars($produto['nome_produto']) ?>"></td>
                    <td><input type="text" name="categoria" value="<?= htmlspecialchars($produto['categoria']) ?>"></td>
                    <td><input type="date" name="data_entrada" value="<?= htmlspecialchars($produto['data_entrada']) ?>"></td>
                    <td><input type="date" name="data_saida" value="<?= htmlspecialchars($produto['data_saida']) ?>"></td>
                    <td>
                        <input type="hidden" name="id" value="<?= $produto['id'] ?>">
                        <button type="submit" name="action" value="update">Atualizar</button>
                        <button type="submit" name="action" value="delete">Deletar</button>
                    </td>
                </form>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
</body>
</html>
