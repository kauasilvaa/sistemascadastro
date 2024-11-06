<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Acompanhamento de Processos</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h1>Acompanhamento de Processos</h1>
    <?php
    // Exibir o resultado de criação (se houver)
    if (isset($resultado)) {
        echo "<p>$resultado</p>";
    }
    ?>
    <form method="POST" action="processos.php">
        <label>Data de Início:</label>
        <input type="date" name="data_inicio" required>

        <label>Quantidade:</label>
        <input type="number" name="quantidade" required>

        <label>Status do Processo:</label>
        <input type="text" name="status" required>

        <label>Localização Atual:</label>
        <input type="text" name="localizacao" required>

        <input type="submit" value="Cadastrar">
    </form>
</div>

<?php
// Incluir o controller para processar o formulário
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once 'MVC/Controllers/ProcessoController.php';
    $data_inicio = $_POST['data_inicio'];
    $quantidade = $_POST['quantidade'];
    $status = $_POST['status'];
    $localizacao = $_POST['localizacao'];

    $processoController = new ProcessoController();
    $resultado = $processoController->criarProcesso($data_inicio, $quantidade, $status, $localizacao);
}
?>
</body>
</html>
