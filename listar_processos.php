<?php
require_once 'MVC/Controllers/ProcessoController.php';

$processoController = new ProcessoController();
$processos = $processoController->listarProcessos();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Processos</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Lista de Processos</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Data de Início</th>
            <th>Quantidade</th>
            <th>Status</th>
            <th>Localização</th>
            <th>Ações</th>
        </tr>
        <?php foreach ($processos as $processo): ?>
            <tr>
                <td><?= $processo['id'] ?></td>
                <td><?= htmlspecialchars($processo['data_inicio']) ?></td>
                <td><?= htmlspecialchars($processo['quantidade']) ?></td>
                <td><?= htmlspecialchars($processo['status']) ?></td>
                <td><?= htmlspecialchars($processo['localizacao']) ?></td>
                <td>
                    <form method="POST" action="processos.php">
                        <input type="hidden" name="id" value="<?= $processo['id'] ?>">
                        <input type="submit" name="edit" value="Editar">
                        <input type="submit" name="delete" value="Excluir" onclick="return confirm('Tem certeza que deseja excluir este processo?');">
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <a href="listagens.php">Voltar</a>
</body>
</html>
