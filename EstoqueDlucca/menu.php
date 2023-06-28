<?php require('protected.php'); ?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/menu.css">
    <title>Menu</title>
</head>
<body>
    <div class="navbar">
        <button class="navbar-button logout" onclick="location.href='logout.php'">Logout</button>
    </div>
    <div class="menu">
        <button class="menu-button tabela" onclick="location.href='tabela.php'">Tabela de Produtos</button>
        
        
        <?php if ($tipoUsuario === 'Admin' || $tipoUsuario === 'Funcionario') : ?>
            <button class="menu-button recentes" onclick="location.href='tabela_recentes.php'">Exibir Recentes</button>
            <button class="menu-button emprestimo" onclick="location.href='tabela_emprestimos.php'">Mostrar Empréstimos</button>
            <button class="menu-button defeitos" onclick="location.href='tabela_defeito.php'">Registro de Defeitos</button>
        <?php endif; ?>

        <?php if ($tipoUsuario === 'Usuario' || $tipoUsuario === 'Admin') : ?>
            <button class="menu-button chaves" onclick="location.href='tabela_chaves.php'">Chaves</button>
        <?php endif; ?>

        <?php if ($tipoUsuario === 'Admin' || $tipoUsuario === 'Funcionario') : ?>
            <button class="menu-button registro" onclick="location.href='tabela_registros.php'">Registros</button>
            <button class="menu-button registro" onclick="location.href='teste.php'">Teste</button>
        <?php endif; ?>
    </div>
</body>
</html>
