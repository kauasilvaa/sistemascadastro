<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Listagens</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .button { 
            margin: 5px; 
            padding: 10px; 
            cursor: pointer; 
            background-color: #4CAF50; 
            color: white; 
            text-decoration: none; 
            display: inline-block; 
            border-radius: 5px;
        }
        .button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Listagens</h1>
    <div class="menu">
        <a href="listar_clientes.php" class="button">Clientes</a>
        <a href="listar_fornecedores.php" class="button">Fornecedores</a>
        <a href="listar_estoque.php" class="button">Estoque</a>
        <a href="listar_funcionarios.php" class="button">Funcionários</a>
        <a href="listar_financeiro.php" class="button">Financeiro</a>
        <a href="listar_processos.php" class="button">Processos</a>
    </div>
</div>

</body>
</html>
