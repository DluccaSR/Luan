<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>

</head>
<body>
    
</body>
</html>

<?php
    include("conn.php");
    $login = $_POST['login'];
    $senha = $_POST['senha'];

    $usuarios = $pdo->prepare('SELECT * FROM usuario where login=:login
    AND senha=:senha');
    $usuarios->execute(array(':login'=>$login,':senha'=>$senha));

    $rowTabela = $usuarios->fetchAll();
    
    if (empty($rowTabela)){
        echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'Erro!',
            text: 'Usuário e/ou senha inválidos!!!',
            confirmButtonText: 'OK',
            onClose: function() {
                history.back();
            }
        }).then(function() {
            history.back();
        });
        </script>";

    }else{
       
    $sessao = $rowTabela[0];

    if(!isset($_SESSION)) {
    session_start();
    }
    $_SESSION['id'] = $sessao['id'];
    $_SESSION['login'] = $sessao['login'];

    echo "<script>
    Swal.fire({
        icon: 'success',
        title: 'Bem-vindo!',
        text: 'Login bem-sucedido! Bem-vindo, " . $_SESSION['login'] . "!',
        confirmButtonText: 'OK',
        onClose: function() {
            window.location.href = 'menu.php';
        }
    }).then(function() {
        window.location.href = 'menu.php';
    });
    </script>";
    }

?>
