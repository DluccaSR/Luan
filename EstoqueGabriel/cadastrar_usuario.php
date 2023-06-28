<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap');

        body {
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 0;
            color: #023047;
        }

        .login {
            display: flex;
            flex-direction: column;
            align-items: center;
            align-content: center;
            justify-content: center;
            width: 100%;
            height: 100vh;
            background-color: #480ca8;
        }

        .form-login {
            display: flex;
            flex-direction: column;
            background-color: #fff;
            border-radius: 7px;
            padding: 40px;
            box-shadow: 10px 10px 40px rgba(0, 0, 0, 0.4);
            gap: 20px;
            width: 380px;
        }

        .area-login img {
            width: 420px;
        }

        .form-login h2 {
            padding: 0;
            margin: 0;
            font-weight: 500;
            font-size: 2.3em;
        }

        .form-login p {
            display: inline-block;
            font-size: 14px;
            color: #666;
            margin-bottom: 25px;
        }

        .form-login input {
            padding: 15px;
            font-size: 14px;
            border: 1px solid #ccc;
            margin-bottom: 10px;
            margin-top: 5px;
            border-radius: 4px;
            transition: all linear 160ms;
            outline: none;
        }

        .form-login input:focus {
            border: 1px solid #f72585;
        }

        .form-login label {
            font-size: 14px;
            font-weight: 600;
        }

        .form-login a {
            display: inline-block;
            margin-bottom: 20px;
            font-size: 13px;
            color: #555;
            transition: all linear 160ms;
        }

        .form-login a:hover {
            color: #f72585;
        }

        .btn {
            background-color: #f72585;
            color: #fff;
            font-size: 14px;
            font-weight: 600;
            border: none !important;
            transition: all linear 160ms;
            cursor: pointer;
            margin: 0 !important;
        }

        .btn:hover {
            transform: scale(1.05);
            background-color: #ff0676;
        }
    </style>
    <title>Tela de Cadastro</title>
</head>
<body>
    <div class="login">
        <h2 style='color: #ffff'>Cadastro </h2>
        <form method="post" action="CRUD/cad_usuario.php" class="form-login">
            <div class="box-user">
                <label>Usuário</label>
                <br>
                <input type="text" name="nome" placeholder="Usuário" required>
            </div>
            <div class="box-user">
                <label>Email</label>
                <br>
                <input type="email" name="email" placeholder="Email" required>
            </div>
            <div class="box-user">
                <label>Login</label>
                <br>
                <input type="text" name="login" placeholder="Login" required>
            </div>
            <div class="box-user">
                <label>Senha</label>
                <br>
                <input type="password" name="senha" placeholder="Senha" required>
            </div>
            <input type="submit" class="btn btn-green" value="Cadastrar">
            <input type="submit" class="btn btn-cad" value="Login" onclick="redirecionarParaOutraTela()">
        </form>
    </div>
    <script>
        function redirecionarParaOutraTela() {
            window.location.href = "login.php";
        }
    </script>
</body>
</html>
