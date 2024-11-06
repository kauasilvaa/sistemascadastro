<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Listagens</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .content { display: none; }
        .active { display: block; }
        .button { margin: 5px; padding: 10px; cursor: pointer; }
    </style>
</head>
<body>

<div class="container">
    <h1>Listagens</h1>
    <div class="menu">
        <button onclick="showContent('clientes')" class="button">Clientes</button>
        <button onclick="showContent('fornecedores')" class="button">Fornecedores</button>
        <button onclick="showContent('estoque')" class="button">Estoque</button>
        <button onclick="showContent('funcionarios')" class="button">Funcionários</button>
        <button onclick="showContent('financeiro')" class="button">Financeiro</button>
        <button onclick="showContent('processos')" class="button">Processos</button>
    </div>

    <div id="clientes" class="content">
        <?php include 'Clientes/clientesviews.php'; ?>
    </div>
    <div id="fornecedores" class="content">
        <?php include 'Fornecedores/fornecedores.php'; ?>
    </div>
    <div id="estoque" class="content">
        <?php include 'Estoque/estoque.php'; ?>
    </div>
    <div id="funcionarios" class="content">
        <?php include 'Funcionarios/funcionarios.php'; ?>
    </div>
    <div id="financeiro" class="content">
        <?php include 'Financeiro/financeiro.php'; ?>
    </div>
    <div id="processos" class="content">
        <?php include 'Processos/processos.php'; ?>
    </div>
</div>

<script>
function showContent(sectionId) {
    document.querySelectorAll('.content').forEach(section => {
        section.classList.remove('active');
    });
    document.getElementById(sectionId).classList.add('active');
}
</script>

</body>
</html>
