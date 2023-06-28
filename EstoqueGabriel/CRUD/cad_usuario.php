<?php
    require('../conn.php');


    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $login = $_POST['login'];
    $senha = $_POST['senha'];
   
    if(empty($login) || empty($senha)){
        echo "<script>
        Swal.fire({
           icon: 'error',
           title: 'erro',
           text: 'Não pode ter valores vázios !',
           confirmButtonText: 'OK',
           onClose: function() {
               window.location.href = '../cadastro.php';
           }
       }).then(function() {
           window.location.href = '../cadastro.php';
       });
       </script>";
    }else{
        $cad_usuario = $pdo->prepare("INSERT INTO usuario(nome,email ,login, senha) 
        VALUES(:nome, :email, :login, :senha)");
        $cad_usuario->execute(array(
            ':nome'=> $nome,
            ':email'=> $email,
            ':login'=> $login,
            ':senha'=> $senha
        ));

        echo "<script>
        alert('Usuario Cadastrado com sucesso!');
        window.location.href='../login.php';
        </script>";
    }
?>