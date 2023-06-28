<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>Tela de Login</title>
</head>
<body>
    <div class="login">
        <h2>Cadastro</h2>
        <form method="post" action="CRUD/cad_usuario.php">
            <div class="box-user">
                <input type="text" name="nome" placeholder="Usuário" required>
                <label>Usuário</label>
            </div>
            <div class="box-user">
                <input type="email" name="email" placeholder="Email" required>
                <label>Email</label>
            </div>
            <div class="box-user">
                <input type="text" name="login" placeholder="Login" required>
                <label>Login</label>
            </div>
            <div class="box-user">
                <input type="password" name="senha" placeholder="Senha" required>
                <label>Senha</label>
            </div>
            <div class="box-user">
                <select name="tipo_usuario" id="tipo_usuario">
                    <option value="Admin">Admin</option>
                    <option value="Funcionario">Funcionário</option>
                    <option value="Usuario">Usuário</option>
                </select>
            </div>
            <input type="submit" class="btn btn-green" value="Cadastrar">
            <br>
            <br>
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
