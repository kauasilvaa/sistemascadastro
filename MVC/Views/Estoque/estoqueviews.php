<?php
require_once 'MVC/Controllers/EstoqueController.php';
require_once 'MVC/Models/Estoquemodel.php';

$estoqueModel = new Estoque();
$estoqueController = new EstoqueController($estoqueModel);
$produtos = $estoqueController->listarProdutos();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Estoque</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <h2>Estoque</h2>
    <table border="1">
        <tr><th>ID</th><th>Nome do Produto</th><th>Categoria</th><th>Data de Entrada</th><th>Data de Saída</th></tr>
        <?php foreach ($produtos as $produto): ?>
            <tr>
                <td><?= $produto['id'] ?></td>
                <td><?= htmlspecialchars($produto['nome_produto']) ?></td>
                <td><?= htmlspecialchars($produto['categoria']) ?></td>
                <td><?= htmlspecialchars($produto['data_entrada']) ?></td>
                <td><?= htmlspecialchars($produto['data_saida']) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <a href="../index.php">Voltar</a>
</body>
</html>
