<?php
require_once 'MVC/Controllers/EstoqueController.php';

$estoqueModel = new Estoque();
$estoqueController = new EstoqueController($estoqueModel);
$produtos = $estoqueController->listarProdutos();

// Verifica se o formulário foi enviado para atualizar ou deletar um produto
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nome_produto = $_POST['nome_produto'];
    $categoria = $_POST['categoria'];
    $data_entrada = $_POST['data_entrada'];
    $data_saida = $_POST['data_saida'];

    if ($_POST['action'] === 'update') {
        // Atualiza o produto
        $resultado = $estoqueController->atualizarProduto($id, $nome_produto, $categoria, $data_entrada, $data_saida);
        echo $resultado > 0 ? "Produto atualizado com sucesso!" : "Erro ao atualizar produto.";
    } elseif ($_POST['action'] === 'delete') {
        // Deleta o produto
        $resultado = $estoqueController->deletarProduto($id);
        echo $resultado > 0 ? "Produto deletado com sucesso!" : "Erro ao deletar produto.";
    }
    // Recarrega a lista de produtos após a ação
    $produtos = $estoqueController->listarProdutos();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Estoque</title>
    <link rel="stylesheet" href="style.css"> <!-- Altere o caminho conforme necessário -->
</head>
<body>
    <h2>Lista de Estoque</h2>
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
                <form method="POST" action="listar_estoque.php">
                    <td><?= htmlspecialchars($produto['id']) ?></td>
                    <td><input type="text" name="nome_produto" value="<?= htmlspecialchars($produto['nome_produto']) ?>"></td>
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
    <a href="listagens.php">Voltar</a>
</body>
</html>
