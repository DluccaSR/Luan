<?php
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['id'])) {
    die('Você não pode acessar esta página porque não está logado.<p><a href="login.php">Entrar</a></p>');
}

require('conn.php');

$usuarioId = $_SESSION['id'];

$consultaUsuario = $pdo->prepare('SELECT tipo_usuario FROM usuario WHERE id = :usuarioId');
$consultaUsuario->execute(array(':usuarioId' => $usuarioId));

$resultado = $consultaUsuario->fetch();

$tipoUsuario = $resultado['tipo_usuario'];

echo ("Tipo de Usuário: " . $tipoUsuario);

?>
