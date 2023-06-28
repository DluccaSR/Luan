<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="page">
    <h1 style='color: #ffff'>Login</h1>
        <form method="POST" class="formLogin">
            <label for="text">Usuário</label>
            <input type="text" placeholder="Digite seu usuário" autofocus="true" />
            <label for="password">Senha</label>
            <input type="password" placeholder="Digite sua senha" />
            <a href="cadastrar_usuario.php">Novo Cadastro</a>
            <input type="submit" value="Acessar" class="btn" />
        </form>
    </div>
    
</body>
</html>