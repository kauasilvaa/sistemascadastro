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
    <link rel="stylesheet" href="style.css"> <!-- Altere o caminho conforme necessário -->
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
        </tr>
        <?php foreach ($processos as $processo): ?>
            <tr>
                <td><?= $processo['id'] ?></td>
                <td><?= htmlspecialchars($processo['data_inicio']) ?></td>
                <td><?= htmlspecialchars($processo['quantidade']) ?></td>
                <td><?= htmlspecialchars($processo['status']) ?></td>
                <td><?= htmlspecialchars($processo['localizacao']) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <a href="listagens.php">Voltar</a>
</body>
</html>
