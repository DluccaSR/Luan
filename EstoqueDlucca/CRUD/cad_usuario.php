<?php
    require('../conn.php');

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $login = $_POST['login'];
    $senha = $_POST['senha'];
    $tipo_usuario = $_POST['tipo_usuario'];
    
    if (empty($login) || empty($senha)) {
        echo "Os valores não podem ser vazios";
    } else {
        $cad_usuario = $pdo->prepare("INSERT INTO usuario (nome, email, login, senha, tipo_usuario) 
        VALUES (:nome, :email, :login, :senha, :tipo_usuario)");
        $cad_usuario->execute(array(
            ':nome' => $nome,
            ':email' => $email,
            ':login' => $login,
            ':senha' => $senha,
            ':tipo_usuario' => $tipo_usuario
        ));

        echo "<script>
            alert('Usuário cadastrado com sucesso!');
            window.location.href = '../login.php';
        </script>";
    }
?>
