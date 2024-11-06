<?php
require_once '../../Controllers/ProcessoController.php';

$processoController = new ProcessoController();
$processos = $processoController->listarProcessos();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Acompanhamento de Processos</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <h2>Acompanhamento de Processos</h2>
    <table border="1">
        <tr><th>ID</th><th>Data de Início</th><th>Quantidade</th><th>Status</th><th>Localização</th></tr>
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
    <a href="../index.php">Voltar</a>
</body>
</html>
