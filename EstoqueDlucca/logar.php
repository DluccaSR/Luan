<?php
session_start(); // Iniciar a sessão antes de qualquer saída

include("conn.php");

$login = $_POST['nome']; // Corrigido para "nome" em vez de "login"
$senha = $_POST['senha'];

$usuarios = $pdo->prepare('SELECT * FROM usuario WHERE login = :login AND senha = :senha');
$usuarios->execute(array(':login' => $login, ':senha' => $senha));

$rowTabela = $usuarios->fetchAll();

if (empty($rowTabela)) {
    echo "<script>
        alert('Usuário e/ou senha inválidos!!!');
        </script>";
} else {
    $sessao = $rowTabela[0];

    $_SESSION['id'] = $sessao['id'];
    $_SESSION['login'] = $sessao['login'];

    header("Location: menu.php");
    exit; // Terminar a execução do script após o redirecionamento
}
?>
