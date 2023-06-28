<!DOCTYPE html>
<html>
<head>
    <title>Menu</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            background: url('img/correio.jpg');
			background-size: cover;
			font-family: Arial, sans-serif;
        }

        .menu {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            height: 90vh;
            padding: 20px;
        }

        .menu-button {
            position: relative;
            width: 180px;
            height: 180px;
            margin: 10px;
            font-size: 18px;
            font-weight: bold;
            text-align: center;
            color: #fff;
            background-color: #2C3E50;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            overflow: hidden;
            z-index: 1;
            transition: transform 0.3s, box-shadow 0.3s;
            transform: translateZ(0);
        }

        .menu-button::before,
        .menu-button::after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.2);
            opacity: 0;
            transition: transform 0.5s, opacity 0.3s;
            transform: scale(0.8);
        }

        .menu-button::before {
            transform-origin: top left;
        }

        .menu-button::after {
            transform-origin: bottom right;
        }

        .menu-button:hover {
            transform: scale(1.1);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
        }

        .menu-button:hover::before,
        .menu-button:hover::after {
            opacity: 1;
            transform: scale(1);
        }

        .tabela {
            background-color: #303F9F;
        }

        .emprestimo {
            background-color: #02a8e6;
        }

        .logout{
            right: -1770px;
            position: relative;
            margin: 20px;
            width: 80px;
            height: 35px;
            font-size: 18px;
            font-weight: bold;
            text-align: center;
            color: #fff;
            background-color: #ff5454;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            overflow: hidden;
            z-index: 1;
            transition: transform 0.3s, box-shadow 0.3s;
            transform: translateZ(0);
            
        }

        .logout:hover {
            background-color: #ff7575;
        }

    </style>
</head>
<body>
    <div class="navbar">
        <button class="navbar-button logout" onclick="location.href='logout.php'">Logout</button>
    </div>
    <div class="menu">
        <button class="menu-button emprestimo" onclick="location.href='tabela.php'">Tabela de Produtos</button>
        <button class="menu-button emprestimo" onclick="location.href='tabela_recentes.php'">Exibir Recentes</button>
        <button class="menu-button emprestimo" onclick="location.href='tabela_emprestimos.php'">Mostrar Empréstimos</button>
        <button class="menu-button emprestimo" onclick="location.href='tabela_defeito.php'">Registro de Defeitos</button>
        <button class="menu-button emprestimo" onclick="location.href='tabela_chaves.php'">Chaves</button>
        <button class="menu-button emprestimo" onclick="location.href='tabela_registros.php'">Registros</button>
        <button class="menu-button emprestimo" onclick="location.href='grafico.php'">grafico</button>
    </div>
</body>
</html>
